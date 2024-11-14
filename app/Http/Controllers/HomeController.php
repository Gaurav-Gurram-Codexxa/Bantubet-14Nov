<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        return view('home');
    }

    public function changeLocale(Request $request)
    {
        auth()->user()->update(['language' => $request->locale]);
        return response()->json(['message' => 'success']);
    }

    public function bkp_data()
    {
        $fp = fopen(public_path('bantubet_202307024.csv'), 'w');
        DB::connection('sqlsrv')->table('Bet')
            ->select(['Bet.*', DB::raw("SWITCHOFFSET([Created], '+01:00') as CreatedAngola"), DB::raw("SWITCHOFFSET([CalcDate], '+01:00') as CalcDateAngola")])
            ->orderBy('Id')
            ->where(DB::raw("CONVERT(
                date,
                SWITCHOFFSET([Created], '+01:00')
            )"), '=', '2023-07-24')
            ->chunk(10000, function ($rows) use ($fp) {
                foreach ($rows as $r) {
                    fputcsv($fp, (array)$r);
                }
            });
        fclose($fp); /**/
    }

    public function updateSetting(Request $request)
    {
        User::query()->update(['timezone' => $request->timezone, 'currency' => $request->currency]);
        return response()->json(['message' => 'success']);
    }

    public function dashboard(Request $request)
    {
        /*
          online Source 6 => new mobile, 16 => android, 42 => web  
           offline Source 98 => betshop 
          4
         */


        $type = DB::connection('sqlsrv')
            ->select(
                "SELECT SUM(SingleBet) as SingleBet,
                SUM(MultipleBet) as MultipleBet,
                SUM(SystemBet) as SystemBet,
                SUM(ChainBet) as ChainBet
				FROM [dbo].[BetCoutStatisticsCopy]
            WHERE
                
                [StatisticsDate] BETWEEN '{$request->start}' AND '{$request->end}';",
            );

        $type = $type[0];

        $cnt = [
            'sngl' => $type->SingleBet,
            'mltpl' => $type->MultipleBet,
            'systm' => $type->SystemBet,
            'chn' => $type->ChainBet,

        ];

        $data = [
            'stat' => $this->sportBookData($request->start, $request->end),
            'casino' => $this->casinoData($request->start, $request->end),
            'cnt' => $cnt
        ];

        return response()->json($data);
    }

    function formatCurrency($amount)
    {
        $formattedCurrency = '';
        if ($amount < 0)
            $formattedCurrency = '(' . number_format(abs($amount), 2) . ')';
        else
            $formattedCurrency = number_format($amount, 2);

        return auth()->user()->currency == 'usd' ?
            '<span class="currency">$</span>' . $formattedCurrency : $formattedCurrency . '<span class="currency">Kz</span>';
    }

    function sportBookData($start, $end)
    {
		
	$rangeStart = '2024-01-01';
	$rangeEnd = '2024-09-30';
	$specialRangeStart = '2024-01-01';
    $specialRangeEnd = '2024-09-30';	
		
	$currency_conversion = auth()->user()->currency == 'usd' ? 0.0020 : 1;
		
	if (($start >= $specialRangeStart && $end <= $specialRangeEnd) || ($start <= $specialRangeEnd && $end >= $specialRangeStart)) 
    {
        // Handle custom date range that overlaps or falls within the specified range
        $stat = DB::connection('sqlsrv')
            ->select(
                "WITH TaxablebetData AS (
                    SELECT
                        SUM(CASE WHEN [Mode] = 'Online' THEN TaxAmount ELSE 0 END) as EligibleOnlineWinnigAmount,
                        SUM(CASE WHEN [Mode] = 'Retail' THEN TaxAmount ELSE 0 END) as EligibleRetailWinnigAmount,
                        COUNT(CASE WHEN [Mode] = 'Online' THEN BetID ELSE NULL END) as EligibleOnlineWinnigCount,
                        COUNT(CASE WHEN [Mode] = 'Retail' THEN BetID ELSE NULL END) as EligibleRetailWinnigCount
                    FROM [dbo].[Taxablebet]
                    WHERE
                        [GameType] = 'SportBook' AND
                        CAST([CalculationDate] as DATE) BETWEEN '$start' AND '$end'
                ),
                StatsData AS (
                    SELECT
                        SUM(EligibleOnlineWinnigAmount) as EligibleOnlineWinnigAmount,
                        SUM(EligibleRetailWinnigAmount) as EligibleRetailWinnigAmount,
                        SUM(EligibleOnlineWinnigCount) as EligibleOnlineWinnigCount,
                        SUM(EligibleRetailWinnigCount) as EligibleRetailWinnigCount
                    FROM [dbo].[StatisticsCopy]
                    WHERE
                        [GameType] = 'SportBook' AND
                        [StatisticsDate] BETWEEN '$start' AND '$end'
                )
                SELECT
                    tb.EligibleOnlineWinnigAmount + COALESCE(sd.EligibleOnlineWinnigAmount, 0) as EligibleOnlineWinnigAmount,
                    tb.EligibleRetailWinnigAmount + COALESCE(sd.EligibleRetailWinnigAmount, 0) as EligibleRetailWinnigAmount,
                    tb.EligibleOnlineWinnigCount + COALESCE(sd.EligibleOnlineWinnigCount, 0) as EligibleOnlineWinnigCount,
                    tb.EligibleRetailWinnigCount + COALESCE(sd.EligibleRetailWinnigCount, 0) as EligibleRetailWinnigCount,
                    sc.OnlineTurnover,
                    sc.RetailTurnover,
                    sc.OnlineWinning,
                    sc.RetailWinning,
                    sc.OnlineTurnoverBetCount,
                    sc.RetailTurnoverBetCount,
                    sc.OnlineWinningBetCount,
                    sc.RetailWinningBetCount,
                    sc.OnlineGgr,
                    sc.OnlineGgrTax,
                    sc.OnlineWinningTax,
                    sc.RetailGgr,
                    sc.RetailGgrTax,
                    sc.RetailWinningTax
                FROM
                    TaxablebetData tb
                CROSS JOIN
                    StatsData sd
                JOIN
                    (SELECT
                        SUM(OnlineTurnover) as OnlineTurnover,
                        SUM(RetailTurnover) as RetailTurnover,
                        SUM(OnlineWinning) as OnlineWinning,
                        SUM(RetailWinning) as RetailWinning,
                        SUM(OnlineTurnoverBetCount) as OnlineTurnoverBetCount,
                        SUM(RetailTurnoverBetCount) as RetailTurnoverBetCount,
                        SUM(OnlineWinningBetCount) as OnlineWinningBetCount,
                        SUM(RetailWinningBetCount) as RetailWinningBetCount,
                        SUM(OnlineGgr) as OnlineGgr,
                        SUM(OnlineGgrTax) as OnlineGgrTax,
                        SUM(OnlineWinningTax) as OnlineWinningTax,
                        SUM(RetailGgr) as RetailGgr,
                        SUM(RetailGgrTax) as RetailGgrTax,
                        SUM(RetailWinningTax) as RetailWinningTax
                    FROM [dbo].[StatisticsCopy]
                    WHERE
                        [GameType] = 'SportBook' AND
                        [StatisticsDate] BETWEEN '$start' AND '$end') sc
                ON 1 = 1;"
            );
		
		$eligible_tax_online = $stat[0]->EligibleOnlineWinnigAmount * $currency_conversion;
        $eligible_tax_retail = $stat[0]->EligibleRetailWinnigAmount * $currency_conversion;
		
		$eligible_online = $stat[0]->EligibleOnlineWinnigCount * $currency_conversion;
        $eligible_offline = $stat[0]->EligibleRetailWinnigCount * $currency_conversion;
		
    }		
    else
    {
        // Handle date range outside the custom range
        $stat = DB::connection('sqlsrv')
            ->select(
                "SELECT
                    SUM(OnlineTurnover) as OnlineTurnover,
                    SUM(RetailTurnover) as RetailTurnover,
                    SUM(OnlineWinning) as OnlineWinning,
                    SUM(RetailWinning) as RetailWinning,
                    SUM(OnlineTurnoverBetCount) as OnlineTurnoverBetCount,
                    SUM(RetailTurnoverBetCount) as RetailTurnoverBetCount,
                    SUM(OnlineWinningBetCount) as OnlineWinningBetCount,
                    SUM(RetailWinningBetCount) as RetailWinningBetCount,
                    SUM(OnlineGgr) as OnlineGgr,
                    SUM(OnlineGgrTax) as OnlineGgrTax,
                    SUM(OnlineWinningTax) as OnlineWinningTax,
                    SUM(RetailGgr) as RetailGgr,
                    SUM(RetailGgrTax) as RetailGgrTax,
                    SUM(RetailWinningTax) as RetailWinningTax,
                    SUM(EligibleOnlineWinnigAmount) as EligibleOnlineWinnigAmount,
                    SUM(EligibleRetailWinnigAmount) as EligibleRetailWinnigAmount,
                    SUM(EligibleOnlineWinnigCount) as EligibleOnlineWinnigCount,
                    SUM(EligibleRetailWinnigCount) as EligibleRetailWinnigCount
                FROM [dbo].[StatisticsCopy]
                WHERE
                    [GameType] = 'SportBook' AND
                    [StatisticsDate] BETWEEN '$start' AND '$end';"
            );	
		
		
		/*$statbet = DB::connection('sqlsrv')->select("
				SELECT 
					SUM(CASE WHEN CashDeskId IS NOT NULL THEN TaxAmount ELSE 0 END) AS EligibleRetailWinnigAmount,
					COUNT(CASE WHEN CashDeskId IS NOT NULL THEN Bet.Id END) AS EligibleRetailWinnigCount,
					SUM(CASE WHEN CashDeskId IS NULL THEN TaxAmount ELSE 0 END) AS EligibleOnlineWinnigAmount,
					COUNT(CASE WHEN CashDeskId IS NULL THEN Bet.Id END) AS EligibleOnlineWinnigCount
				FROM 
					Bet
				JOIN 
					StatisticsCopy ON StatisticsCopy.StatisticsDate = CONVERT(DATE, Bet.CalcDate)
				WHERE
					CONVERT(DATE, SWITCHOFFSET(Bet.CalcDate, '+01:00')) BETWEEN '$start' AND '$end'
					AND WinningAmount BETWEEN StatisticsCopy.MinAmount AND StatisticsCopy.MaxAmount
					AND TaxAmount > 0
					AND State != 3
					AND StatisticsCopy.GameType = 'SportBook'
					AND (Source = 6 OR Source = 98);
			");*/
		
		// +04:00
		// CAST(Bet.CalcDate AS DATE) BETWEEN '$start' AND '$end'
		// Currently using the timezone of +01:00
		
		
		
$statbet = DB::connection('sqlsrv')->select("
    SELECT 
        SUM(CASE WHEN CashDeskId IS NOT NULL THEN TaxAmount ELSE 0 END) AS EligibleRetailWinnigAmount,
        COUNT(CASE WHEN CashDeskId IS NOT NULL THEN Bet.Id END) AS EligibleRetailWinnigCount,
        SUM(CASE WHEN CashDeskId IS NULL THEN TaxAmount ELSE 0 END) AS EligibleOnlineWinnigAmount,
        COUNT(CASE WHEN CashDeskId IS NULL THEN Bet.Id END) AS EligibleOnlineWinnigCount
    FROM 
        Bet
    JOIN 
        StatisticsCopy ON StatisticsCopy.StatisticsDate = CONVERT(DATE, SWITCHOFFSET(Bet.CalcDate, '+01:00'))
    WHERE
        CONVERT(DATE, SWITCHOFFSET(Bet.CalcDate, '+01:00')) BETWEEN '$start' AND '$end'
        AND TaxAmount > 0
        AND State != 3
        AND StatisticsCopy.GameType = 'SportBook'
        AND (Source = 6 OR Source = 98)
        AND (
            Bet.Id = 4568964551 OR 
            (WinningAmount BETWEEN StatisticsCopy.MinAmount AND StatisticsCopy.MaxAmount AND Bet.Id != 4568964551)
        );
");




			$eligible_tax_online = $statbet[0]->EligibleOnlineWinnigAmount * $currency_conversion;
			$eligible_tax_retail = $statbet[0]->EligibleRetailWinnigAmount * $currency_conversion;

			$eligible_online = $statbet[0]->EligibleOnlineWinnigCount * $currency_conversion;
			$eligible_offline = $statbet[0]->EligibleRetailWinnigCount * $currency_conversion;
		
    }


        

        $stat = $stat[0];

        $turnover_pre = $stat->OnlineTurnover * $currency_conversion;
        $turnover_live = $stat->RetailTurnover * $currency_conversion;
        $turnover_total = $turnover_pre + $turnover_live;

        $winning_pre = $stat->OnlineWinning * $currency_conversion;
        $winning_live = $stat->RetailWinning * $currency_conversion;
        $winning_total = $winning_pre + $winning_live;
		
		//$ggr_pre = max(0, $stat->OnlineGgr) * $currency_conversion;
		//$ggr_live = max(0, $stat->RetailGgr) * $currency_conversion;
		//$ggr_total = $ggr_pre + $ggr_live;


        $ggr_pre = $stat->OnlineGgr * $currency_conversion;
        $ggr_live = $stat->RetailGgr * $currency_conversion;
        $ggr_total = $ggr_pre + $ggr_live;
		
		
		$ggr_tax_pre = max(0, $stat->OnlineGgrTax) * $currency_conversion;
        $ggr_tax_live = max(0, $stat->RetailGgrTax) * $currency_conversion;
        $ggr_tax_total = $ggr_tax_pre + $ggr_tax_live;


        //$ggr_tax_pre = $stat->OnlineGgrTax * $currency_conversion;
        //$ggr_tax_live = $stat->RetailGgrTax * $currency_conversion;
        //$ggr_tax_total = $ggr_tax_pre + $ggr_tax_live;

        
        //$eligible_tax_online = $statbet->EligibleOnlineWinnigAmount * $currency_conversion;
        //$eligible_tax_retail = $statbet->EligibleRetailWinnigAmount * $currency_conversion;
        $eligible_tax_total = $eligible_tax_online + $eligible_tax_retail;


        $turnover_pre = $this->formatCurrency($turnover_pre);
        $turnover_live = $this->formatCurrency($turnover_live);
        $turnover_total = $this->formatCurrency($turnover_total);

        $winning_pre = $this->formatCurrency($winning_pre);
        $winning_live = $this->formatCurrency($winning_live);
        $winning_total = $this->formatCurrency($winning_total);

        $ggr_pre = $this->formatCurrency($ggr_pre);
        $ggr_live = $this->formatCurrency($ggr_live);
        $ggr_total = $this->formatCurrency($ggr_total);

        $ggr_tax_pre = $this->formatCurrency($ggr_tax_pre);
        $ggr_tax_live = $this->formatCurrency($ggr_tax_live);
        $ggr_tax_total = $this->formatCurrency($ggr_tax_total);
		
		$win_tax_pre = $eligible_tax_online * .2;
        $win_tax_live = $eligible_tax_retail * .2;
        $win_tax_total = $win_tax_pre + $win_tax_live;

        $eligible_tax_online = $this->formatCurrency($eligible_tax_online);
        $eligible_tax_retail = $this->formatCurrency($eligible_tax_retail);
        $eligible_tax_total = $this->formatCurrency($eligible_tax_total);

        

        $win_tax_pre = $this->formatCurrency($win_tax_pre);
        $win_tax_live = $this->formatCurrency($win_tax_live);
        $win_tax_total = $this->formatCurrency($win_tax_total);

        $bet_online = $stat->OnlineTurnoverBetCount;
        $bet_offline = $stat->RetailTurnoverBetCount;
        $bet_total = $bet_online + $bet_offline;

        $win_online = $stat->OnlineWinningBetCount;
        $win_offline = $stat->RetailWinningBetCount;
        $win_total = $win_online + $win_offline;

        //$eligible_online = $statbet->EligibleOnlineWinnigCount * $currency_conversion;
        //$eligible_offline = $statbet->EligibleRetailWinnigCount * $currency_conversion;
        $eligible_total = $eligible_online + $eligible_offline;

        return [
            'trnvr-pr' => $turnover_pre,
            'trnvr-lv' => $turnover_live,
            'trnvr-t' => $turnover_total,

            'wng-pr' => $winning_pre,
            'wng-lv' => $winning_live,
            'wng-t' => $winning_total,

            'ggr-pr' => $ggr_pre,
            'ggr-lv' => $ggr_live,
            'ggr-t' => $ggr_total,

            'tx-pr' => $ggr_tax_pre,
            'tx-lv' => $ggr_tax_live,
            'tx-t' => $ggr_tax_total,

            'txw-pr' => $win_tax_pre,
            'txw-lv' => $win_tax_live,
            'txw-t' => $win_tax_total,

            'bt-pr' => number_format($bet_online, 0),
            'bt-lv' => number_format($bet_offline, 0),
            'bt-t' => number_format($bet_total, 0),

            'nw-pr' => number_format($win_online, 0),
            'nw-lv' => number_format($win_offline, 0),
            'nw-t' => number_format($win_total, 0),

            'txwa-pr' => $eligible_tax_online,
            'txwa-lv' => $eligible_tax_retail,
            'txwa-t' => $eligible_tax_total,

            'txwc-pr' => number_format($eligible_online, 0),
            'txwc-lv' => number_format($eligible_offline, 0),
            'txwc-t' => number_format($eligible_total, 0),
        ];
    }

function casinoData($start, $end)
{
    $rangeStart = '2024-01-01';
    $rangeEnd = '2024-09-30';
    $specialRangeStart = '2024-01-01';
    $specialRangeEnd = '2024-09-30';    
    
    // Validate input date range
    if (($start >= $specialRangeStart && $end <= $specialRangeEnd) || ($start <= $specialRangeEnd && $end >= $specialRangeStart)) 
    {
        $stat = DB::connection('sqlsrv')->select(
            "WITH CasinoTaxablebetData AS (
                SELECT
                    SUM(CASE WHEN [Mode] = 'Live Casino' THEN TaxAmount ELSE 0 END) as EligibleOnlineWinnigAmount,
                    SUM(CASE WHEN [Mode] = 'Slots' THEN TaxAmount ELSE 0 END) as EligibleRetailWinnigAmount,
                    COUNT(CASE WHEN [Mode] = 'Live Casino' THEN PlayerID ELSE NULL END) as EligibleOnlineWinnigCount,
                    COUNT(CASE WHEN [Mode] = 'Slots' THEN PlayerID ELSE NULL END) as EligibleRetailWinnigCount
                FROM [dbo].[CasinoTaxable]
                WHERE
                    CAST([CalculationDate] as DATE) BETWEEN '$start' AND '$end'
            ),
            StatsData AS (
                SELECT
                    0 as EligibleOnlineWinnigAmount,
                    0 as EligibleRetailWinnigAmount,
                    0 as EligibleOnlineWinnigCount,
                    0 as EligibleRetailWinnigCount
                FROM [dbo].[StatisticsCopy]
                WHERE
                    [GameType] = 'Casino' AND
                    [StatisticsDate] BETWEEN '$start' AND '$end'
            )
            SELECT
                tb.EligibleOnlineWinnigAmount + COALESCE(sd.EligibleOnlineWinnigAmount, 0) as EligibleOnlineWinnigAmount,
                tb.EligibleRetailWinnigAmount + COALESCE(sd.EligibleRetailWinnigAmount, 0) as EligibleRetailWinnigAmount,
                tb.EligibleOnlineWinnigCount + COALESCE(sd.EligibleOnlineWinnigCount, 0) as EligibleOnlineWinnigCount,
                tb.EligibleRetailWinnigCount + COALESCE(sd.EligibleRetailWinnigCount, 0) as EligibleRetailWinnigCount,
                sc.OnlineTurnover,
                sc.RetailTurnover,
                sc.OnlineWinning,
                sc.RetailWinning,
                sc.OnlineTurnoverBetCount,
                sc.RetailTurnoverBetCount,
                sc.OnlineWinningBetCount,
                sc.RetailWinningBetCount,
                sc.OnlineGgr,
                sc.OnlineGgrTax,
                sc.OnlineWinningTax,
                sc.RetailGgr,
                sc.RetailGgrTax,
                sc.RetailWinningTax
            FROM
                CasinoTaxablebetData tb
            CROSS JOIN
                StatsData sd
            JOIN
                (SELECT
                    SUM(OnlineTurnover) as OnlineTurnover,
                    SUM(RetailTurnover) as RetailTurnover,
                    SUM(OnlineWinning) as OnlineWinning,
                    SUM(RetailWinning) as RetailWinning,
                    SUM(OnlineTurnoverBetCount) as OnlineTurnoverBetCount,
                    SUM(RetailTurnoverBetCount) as RetailTurnoverBetCount,
                    SUM(OnlineWinningBetCount) as OnlineWinningBetCount,
                    SUM(RetailWinningBetCount) as RetailWinningBetCount,
                    SUM(OnlineGgr) as OnlineGgr,
                    SUM(OnlineGgrTax) as OnlineGgrTax,
                    SUM(OnlineWinningTax) as OnlineWinningTax,
                    SUM(RetailGgr) as RetailGgr,
                    SUM(RetailGgrTax) as RetailGgrTax,
                    SUM(RetailWinningTax) as RetailWinningTax
                FROM [dbo].[StatisticsCopy]
                WHERE
                    [GameType] = 'Casino' AND
                    [StatisticsDate] BETWEEN '$start' AND '$end') sc
            ON 1 = 1;"
        );

        // Check if results are valid
        if (empty($stat)) {
            return []; // Handle no data case
        }

        $stat = $stat[0]; // Get the first result

    } else {
        $stat = DB::connection('sqlsrv')->select(
            "SELECT
                SUM(OnlineTurnover) as OnlineTurnover,
                SUM(RetailTurnover) as RetailTurnover,
                SUM(OnlineWinning) as OnlineWinning,
                SUM(RetailWinning) as RetailWinning,
                SUM(OnlineTurnoverBetCount) as OnlineTurnoverBetCount,
                SUM(RetailTurnoverBetCount) as RetailTurnoverBetCount,
                SUM(OnlineWinningBetCount) as OnlineWinningBetCount,
                SUM(RetailWinningBetCount) as RetailWinningBetCount,
                SUM(OnlineGgr) as OnlineGgr,
                SUM(OnlineGgrTax) as OnlineGgrTax,
                SUM(OnlineWinningTax) as OnlineWinningTax,
                SUM(RetailGgr) as RetailGgr,
                SUM(RetailGgrTax) as RetailGgrTax,
                SUM(RetailWinningTax) as RetailWinningTax,
                0 as EligibleOnlineWinnigAmount,
                0 as EligibleRetailWinnigAmount,
                0 as EligibleOnlineWinnigCount,
                0 as EligibleRetailWinnigCount
            FROM [dbo].[StatisticsCopy]
            WHERE
                [GameType] = 'Casino' AND
                [StatisticsDate] BETWEEN '$start' AND '$end';"
        );

        // Check if results are valid
        if (empty($stat)) {
            return []; // Handle no data case
        }

        $stat = $stat[0]; // Get the first result
    }

    $currency_conversion = auth()->user()->currency == 'usd' ? 0.0020 : 1;

    // Handle the case where stat might not have the expected properties
    $turnover_online = ($stat->OnlineTurnover ?? 0) * $currency_conversion;
    $turnover_retail = ($stat->RetailTurnover ?? 0) * $currency_conversion;
    $turnover_total = $turnover_online + $turnover_retail;

    $winning_online = ($stat->OnlineWinning ?? 0) * $currency_conversion;
    $winning_retail = ($stat->RetailWinning ?? 0) * $currency_conversion;
    $winning_total = $winning_online + $winning_retail;

    $ggr_online = ($stat->OnlineGgr ?? 0) * $currency_conversion;
    $ggr_retail = ($stat->RetailGgr ?? 0) * $currency_conversion;
    $ggr_total = $ggr_retail + $ggr_online;

    $ggr_tax_online = max(0, ($stat->OnlineGgrTax ?? 0)) * $currency_conversion;
    $ggr_tax_retail = max(0, ($stat->RetailGgrTax ?? 0)) * $currency_conversion;
    $ggr_tax_total = $ggr_tax_online + $ggr_tax_retail;

    // Format currency
    $turnover_online = $this->formatCurrency($turnover_online);
    $turnover_retail = $this->formatCurrency($turnover_retail);
    $turnover_total = $this->formatCurrency($turnover_total);

    $winning_online = $this->formatCurrency($winning_online);
    $winning_retail = $this->formatCurrency($winning_retail);
    $winning_total = $this->formatCurrency($winning_total);

    $ggr_online = $this->formatCurrency($ggr_online);
    $ggr_retail = $this->formatCurrency($ggr_retail);
    $ggr_total = $this->formatCurrency($ggr_total);

    $ggr_tax_online = $this->formatCurrency($ggr_tax_online);
    $ggr_tax_retail = $this->formatCurrency($ggr_tax_retail);
    $ggr_tax_total = $this->formatCurrency($ggr_tax_total);

    $bet_online = $stat->OnlineTurnoverBetCount ?? 0;
    $bet_offline = $stat->RetailTurnoverBetCount ?? 0;
    $bet_total = $bet_online + $bet_offline;

    $win_online = $stat->OnlineWinningBetCount ?? 0;
    $win_offline = $stat->RetailWinningBetCount ?? 0;
    $win_total = $win_online + $win_offline;

    $eligible_tax_online = ($stat->EligibleOnlineWinnigAmount ?? 0) * $currency_conversion;
    $eligible_tax_retail = ($stat->EligibleRetailWinnigAmount ?? 0) * $currency_conversion;
    $eligible_tax_total = $eligible_tax_online + $eligible_tax_retail;

    $win_tax_online = $eligible_tax_online * 0.2;
    $win_tax_retail = $eligible_tax_retail * 0.2;
    $win_tax_total = $win_tax_online + $win_tax_retail;

    $win_tax_online = $this->formatCurrency($win_tax_online);
    $win_tax_retail = $this->formatCurrency($win_tax_retail);
    $win_tax_total = $this->formatCurrency($win_tax_total);

    $eligible_tax_online = $this->formatCurrency($eligible_tax_online);
    $eligible_tax_retail = $this->formatCurrency($eligible_tax_retail);
    $eligible_tax_total = $this->formatCurrency($eligible_tax_total);

    $eligible_online = $stat->EligibleOnlineWinnigCount ?? 0;
    $eligible_offline = $stat->EligibleRetailWinnigCount ?? 0;
    $eligible_total = $eligible_online + $eligible_offline;

    return [
        'c-live-revenue' => $turnover_online,
        'c-slot-revenue' => $turnover_retail,
        'c-total-revenue' => $turnover_total,

        'c-live-winning' => $winning_online,
        'c-slot-winning' => $winning_retail,
        'c-total-winning' => $winning_total,

        'c-live-ggr' => $ggr_online,
        'c-slot-ggr' => $ggr_retail,
        'c-total-ggr' => $ggr_total,

        'c-live-ggr-tax' => $ggr_tax_online,
        'c-slot-ggr-tax' => $ggr_tax_retail,
        'c-total-ggr-tax' => $ggr_tax_total,

        'c-live-winning-tax' => $win_tax_online,
        'c-slot-winning-tax' => $win_tax_retail,
        'c-total-winning-tax' => $win_tax_total,

        'c-live-bet' => number_format($bet_online, 0),
        'c-slot-bet' => number_format($bet_offline, 0),
        'c-total-bet' => number_format($bet_total, 0),

        'c-live-win' => number_format($win_online, 0),
        'c-slot-win' => number_format($win_offline, 0),
        'c-total-win' => number_format($win_total, 0),

        'c-txwa-pr' => $eligible_tax_online,
        'c-txwa-lv' => $eligible_tax_retail,
        'c-txwa-t' => $eligible_tax_total,

        'c-txwc-pr' => number_format($eligible_online, 0),
        'c-txwc-lv' => number_format($eligible_offline, 0),
        'c-txwc-t' => number_format($eligible_total, 0),
    ];
}

	
	
}
