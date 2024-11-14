<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class TaxableBetController extends Controller
{

    public function index()
    {
        return view('taxable-bet');
    }


    public function list(Request $request)
    {
        $timezone = auth()->user()->timezone;
        $currency = auth()->user()->currency;
        $setting = Setting::find(1);

        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $endDate = Carbon::parse($request->end_date)->format('Y-m-d');
        $minAmount = 100000;
        $maxAmount = 500000;
        function formatCurrency($amount, $currency = 'aoa')
        {
            $conversion = $currency == 'usd' ? 0.0020 : 1;
            $amount = $amount * $conversion;
            $formattedCurrency = '';
            if ($amount < 0)
                $formattedCurrency = '(' . number_format(abs($amount), 2) . ')';
            else
                $formattedCurrency = number_format($amount, 2);

            return $currency == 'usd' ?
                '<span class="currency">$</span>' . $formattedCurrency : $formattedCurrency . '<span class="currency">Kz</span>';
        }

        $state = [
            1 => '<span class="bc-table-label accepted">Accepted</span>',
            2 => '<span class="bc-table-label return">Returned</span>',
            3 => '<span class="bc-table-label lost">Lost</span>',
            4 => '<span class="bc-table-label win">Won</span>',
            5 => '<span class="bc-table-label cashout">Cash Out</span>'
        ];

        $type = [
            1 => 'Single',
            2 => 'Multiple',
            3 => 'System (11-14)',
            4 => 'Chain',
            50 => 'Bet Builder'
        ];

        $data['draw'] = $request->draw;
		
    	$betId = $request->bet_id ? (string)$request->bet_id : null;
		
        //$count = DB::connection('sqlsrv')->select("select sum(EligibleOnlineWinnigCount + EligibleRetailWinnigCount) as Total from [StatisticsCopy] where [StatisticsDate] between '$startDate' and '$endDate'");
		
		
		$count = DB::connection('sqlsrv')->select("
			SELECT 
				EligibleOnlineWinnigCount,
				EligibleRetailWinnigCount,
				(EligibleOnlineWinnigCount + EligibleRetailWinnigCount) AS Total
			FROM (
				SELECT 
					COUNT(CASE WHEN CashDeskId IS NOT NULL THEN Bet.Id END) AS EligibleOnlineWinnigCount,
					COUNT(CASE WHEN CashDeskId IS NULL THEN Bet.Id END) AS EligibleRetailWinnigCount
				FROM 
					Bet
				JOIN 
					StatisticsCopy ON StatisticsCopy.StatisticsDate = CONVERT(DATE, Bet.CalcDate)
				WHERE
					CAST(Bet.CalcDate AS DATE) BETWEEN '$startDate' AND '$endDate'
					AND WinningAmount BETWEEN StatisticsCopy.MinAmount AND StatisticsCopy.MaxAmount
					AND TaxAmount > 0
					AND State != 3
					AND StatisticsCopy.GameType = 'SportBook'
					AND (Source = 6 OR Source = 98)
			) AS Counts;
		");		
	
		$cc = DB::connection('sqlsrv')->select("
			SELECT COUNT(BetID) AS Total 
			FROM [Taxablebet] 
			WHERE CAST([CalculationDate] AS DATE) BETWEEN ? AND ?", [$startDate, $endDate]);

		$rangeStart = '2024-01-01';
		$rangeEnd = '2024-09-30';

		if ($startDate >= $rangeStart && $endDate <= $rangeEnd) 
		{	
			
		if ($request->bet_id != '') 
		{
		$data['recordsFiltered'] = $data['recordsTotal'] = $cc[0]->Total;
		$records = DB::connection('sqlsrv')->select("exec PaginatedTaxableDataByID @Offset = {$request->start}, @StartDate = '$startDate', @EndDate = '$endDate', @BetId = '$betId'");
		}
		else
		{
		$data['recordsFiltered'] = $data['recordsTotal'] = $cc[0]->Total;
		$records = DB::connection('sqlsrv')->select("exec PaginatedTaxableData @Offset = {$request->start}, @StartDate = '$startDate', @EndDate = '$endDate'");
		}
			
		}
		else
		{	
		  if ($request->bet_id != '') 
		  {
		$data['recordsFiltered'] = $data['recordsTotal'] = $count[0]->Total;			  
		$records = DB::connection('sqlsrv')->select("exec GetPaginatedDataByBetId @Offset = {$request->start}, @StartDate = '$startDate', @EndDate = '$endDate', @BetId = '$betId'"); 
		  }
		else
		{
		$data['recordsFiltered'] = $data['recordsTotal'] = $count[0]->Total;
		$records = DB::connection('sqlsrv')->select("exec GetPaginatedData @Offset = {$request->start}, @StartDate = '$startDate', @EndDate = '$endDate'");
		}
			
	}

        $data['data'] = collect($records)->map(function ($d) use ($state, $type, $currency) {
            $ggr = abs($d->Amount - $d->WinningAmount);
            return [
                $d->Id,
                $d->ClientId,
                formatCurrency($d->Amount, $currency),
                formatCurrency($d->PossibleWin),
                $d->SelectionCount,
                number_format($d->Price, 2),
                formatCurrency($d->WinningAmount, $currency),
				formatCurrency($d->TaxAmount, $currency),
                $type[$d->Type],
                formatCurrency($ggr, $currency),
                $state[$d->State],
                Carbon::parse($d->Created)->timezone('+01:00')->format('Y/m/d H:i:s'),
               // $d->CalcDate == null ? '' : Carbon::parse($d->CalcDate)->format('Y/m/d H:i:s'),
				$d->CalcDate == null ? '' : Carbon::parse($d->CalcDate)->timezone('+01:00')->format('Y/m/d H:i:s'),

                formatCurrency($d->BonusAmount),
            ];
        });

        return response()->json($data);
    }
	
	public function exportSportBook(Request $request)
	{
		$startDate = $request->get('start_date');
		$endDate = $request->get('end_date');
		$betId = $request->get('bet_id');
		
	}
}
