<?php

namespace App\Http\Controllers;

use App\Models\Limit;
use Illuminate\Support\Facades\DB;

class CalculatePercent extends Controller
{

    public function index()
    {
        $date = now()->format('Y-m-d');
        $limits = Limit::whereRaw("'$date' between start_from and ifnull(end_to, current_date())")
            ->get()
            ->toArray();

        foreach ($limits as $e) {
            $this->exec($e);
        }
    }

    public function exec($e)
    {
        if ($e['limit_for'] == 'casino') {
            $stat = "exec SetTaxableBetCount @StartDate = '{$e['start_from']}', @EndDate = '{$e['end_to']}', @GameType = 'Casino',  @EligibleMinAmount = '{$e['eligible_amount_min']}', @EligibleMaxAmount = '{$e['eligible_amount_max']}';;";
            DB::connection('sqlsrv')->statement($stat);
        } else {
            $stat = "exec SetTaxableBetCount @StartDate = '{$e['start_from']}', @EndDate = '{$e['end_to']}', @GameType = 'SportBook',  @EligibleMinAmount = '{$e['eligible_amount_min']}', @EligibleMaxAmount = '{$e['eligible_amount_max']}';";
            DB::connection('sqlsrv')->statement($stat);
        }

        DB::connection('sqlsrv')->statement($this->updateStatement($e));

        if ($e['limit_for'] == 'casino') {
            $stat = "exec SetTaxableWinningAmount @StartDate = '{$e['start_from']}', @EndDate = '{$e['end_to']}', @GameType = 'Casino';";
            DB::connection('sqlsrv')->statement($stat);
        } else {
            $stat = "exec SetTaxableWinningAmount @StartDate = '{$e['start_from']}', @EndDate = '{$e['end_to']}', @GameType = 'SportBook';";
            DB::connection('sqlsrv')->statement($stat);
        }
    }


    public function summery()
    {

        $today = now()->format('Y-m-d');

        $stmt = "exec UpdateBetStatistics @StatisticsDate = '$today'";
        DB::connection('sqlsrv')->statement($stmt);
        $stmt = "exec UpdateBetStatisticsCopy @CurrentDate = '$today'";
        DB::connection('sqlsrv')->statement($stmt);
        $this->index();
    }

    function updateStatement($e)
    {
        $stmt = '';
        if ($e['limit_for'] == 'online_sport') {
            $stmt = "UPDATE sc
            SET 
                sc.OnlineTurnover = s.OnlineTurnover * ({$e['turnover']} * 0.01),        
                sc.OnlineWinning = s.OnlineWinning * ({$e['winning']} * 0.01),          
                sc.OnlineTurnoverBetCount = s.OnlineTurnoverBetCount * ({$e['bet_no']} * 0.01),
                sc.OnlineWinningBetCount = s.OnlineWinningBetCount * ({$e['winning_no']} * 0.01), 
                sc.OnlineGgr = (s.OnlineTurnover * ({$e['turnover']} * 0.01)) - (s.OnlineWinning * ({$e['winning']} * 0.01)),          
                sc.OnlineGgrTax = ((s.OnlineTurnover * ({$e['turnover']} * 0.01)) - (s.OnlineWinning * ({$e['winning']} * 0.01))) * ({$e['tax_ggr']} * 0.01), 
                sc.OnlineWinningTax = s.OnlineWinning * ({$e['tax_winning']} * 0.01),
                sc.EligibleOnlineWinnigCount = s.EligibleOnlineWinningBetCount * ({$e['eligible_bet_display_percent']} * 0.01),
				sc.MinAmount = {$e['eligible_amount_min']},
				sc.MaxAmount = {$e['eligible_amount_max']}
            FROM 
                [StatisticsCopy] sc
            INNER JOIN 
                [Statistics] s
                ON sc.StatisticsDate = s.StatisticsDate
                AND sc.GameType = s.GameType
            WHERE 
                s.StatisticsDate BETWEEN '{$e['start_from']}' AND '{$e['end_to']}'
                AND s.GameType = 'SportBook';
        ";
        } else if ($e['limit_for'] == 'retail_sport') {
            $stmt = "WITH Calc AS (
                SELECT
                    s.StatisticsDate,
                    s.GameType,
                    s.RetailTurnover * ({$e['turnover']} * 0.01) AS RetailTurnover,
                    s.RetailWinning * ({$e['winning']} * 0.01) AS RetailWinning,
                    s.RetailTurnoverBetCount * ({$e['bet_no']} * 0.01) AS RetailTurnoverBetCount,
                    s.RetailWinningBetCount * ({$e['winning_no']} * 0.01) AS RetailWinningBetCount,
                    ((s.RetailTurnover * ({$e['turnover']} * 0.01)) - (s.RetailWinning * ({$e['winning']} * 0.01))) AS RetailGgr,
                    (((s.RetailTurnover * ({$e['turnover']} * 0.01)) - (s.RetailWinning * ({$e['winning']} * 0.01))) * {$e['tax_ggr']} * 0.01) AS RetailGgrTax,
                    s.RetailWinning * ({$e['tax_winning']} * 0.01) AS RetailWinningTax,
				    s.EligibleRetailWinningBetCount * ({$e['eligible_bet_display_percent']} * 0.01) AS EligibleRetailWinnigCount
                FROM
                    [Statistics] s
                WHERE
                    s.StatisticsDate BETWEEN '{$e['start_from']}' AND '{$e['end_to']}'
                    AND s.GameType = 'SportBook'
            )
            UPDATE sc
            SET
                sc.RetailTurnover = c.RetailTurnover,
                sc.RetailWinning = c.RetailWinning,
                sc.RetailTurnoverBetCount = c.RetailTurnoverBetCount,
                sc.RetailWinningBetCount = c.RetailWinningBetCount,
                sc.RetailGgr = c.RetailGgr,
                sc.RetailGgrTax = c.RetailGgrTax,
                sc.RetailWinningTax = c.RetailWinningTax,
                sc.EligibleRetailWinnigCount = c.EligibleRetailWinnigCount
            FROM
                [StatisticsCopy] sc
            INNER JOIN
                Calc c
                ON sc.StatisticsDate = c.StatisticsDate
                AND sc.GameType = c.GameType;
            ";
        } else {
            $stmt = "WITH Calc AS (
                SELECT
                    s.StatisticsDate,
                    s.GameType,
					s.EligibleOnlineWinningBetCount,
					s.EligibleRetailWinningBetCount,
                    s.OnlineTurnover * ({$e['turnover']} * 0.01) AS OnlineTurnover,
                    s.OnlineTurnoverBetCount * ({$e['bet_no']} * 0.01) AS OnlineTurnoverBetCount,
                    s.OnlineWinningBetCount * ({$e['winning_no']} * 0.01) AS OnlineWinningBetCount,
                    ((s.OnlineTurnover * ({$e['turnover']} * 0.01)) - (s.OnlineWinning * ({$e['winning']} * 0.01))) AS OnlineGgr,
                    (((s.OnlineTurnover * ({$e['turnover']} * 0.01)) - (s.OnlineWinning * ({$e['winning']} * 0.01))) * {$e['tax_ggr']} * 0.01) AS OnlineGgrTax,
                    s.OnlineWinning * ({$e['winning']} * 0.01) AS OnlineWinning,
                    s.OnlineWinning * ({$e['tax_winning']} * 0.01) AS OnlineWinningTax,
                    
                    s.RetailTurnover * ({$e['turnover']} * 0.01) AS RetailTurnover,
                    s.RetailWinning * ({$e['winning']} * 0.01) AS RetailWinning,
                    s.RetailTurnoverBetCount * ({$e['bet_no']} * 0.01) AS RetailTurnoverBetCount,
                    s.RetailWinningBetCount * ({$e['winning_no']} * 0.01) AS RetailWinningBetCount,
                    ((s.RetailTurnover * ({$e['turnover']} * 0.01)) - (s.RetailWinning * ({$e['winning']} * 0.01))) AS RetailGgr,
                    (((s.RetailTurnover * ({$e['turnover']} * 0.01)) - (s.RetailWinning * ({$e['winning']} * 0.01))) * {$e['tax_ggr']} * 0.01) AS RetailGgrTax,
                    s.RetailWinning * ({$e['tax_winning']} * 0.01) AS RetailWinningTax
                FROM
                    [Statistics] s
                WHERE
                    s.StatisticsDate BETWEEN '{$e['start_from']}' AND '{$e['end_to']}'
                    AND s.GameType = 'Casino'
            )
            UPDATE sc
            SET
                sc.OnlineTurnover = c.OnlineTurnover,
                sc.OnlineWinning = c.OnlineWinning,
                sc.OnlineTurnoverBetCount = c.OnlineTurnoverBetCount,
                sc.OnlineWinningBetCount = c.OnlineWinningBetCount,
                sc.OnlineGgr = c.OnlineGgr,
                sc.OnlineGgrTax = c.OnlineGgrTax,
                sc.OnlineWinningTax = c.OnlineWinningTax,
                sc.RetailTurnover = c.RetailTurnover,
                sc.RetailWinning = c.RetailWinning,
                sc.RetailTurnoverBetCount = c.RetailTurnoverBetCount,
                sc.RetailGgr = c.RetailGgr,
                sc.RetailGgrTax = c.RetailGgrTax,
                sc.RetailWinningBetCount = c.RetailWinningBetCount,
                sc.RetailWinningTax = c.RetailWinningTax,
				sc.MinAmount = {$e['eligible_amount_min']},
				sc.MaxAmount = {$e['eligible_amount_max']},
				sc.EligibleOnlineWinnigCount = c.EligibleOnlineWinningBetCount * ({$e['eligible_bet_display_percent']} * 0.01),
				sc.EligibleRetailWinnigCount = c.EligibleRetailWinningBetCount * ({$e['eligible_bet_display_percent']} * 0.01)
            FROM
                [StatisticsCopy] sc
            INNER JOIN
                Calc c
                ON sc.StatisticsDate = c.StatisticsDate
                AND sc.GameType = c.GameType;
            ";
        }

        return $stmt;
    }
}
