<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CasinoTaxableBetController extends Controller
{
    public function index()
    {
        return view('casino-taxable-bet');
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
		
        $count = DB::connection('sqlsrv')->select("select sum(EligibleOnlineWinnigCount + EligibleRetailWinnigCount) as Total from [StatisticsCopy] where [StatisticsDate] between '$startDate' and '$endDate'");
		
		$cc = DB::connection('sqlsrv')->select("
			SELECT COUNT(PlayerID) AS Total 
			FROM [CasinoTaxable] 
			WHERE CAST([CalculationDate] AS DATE) BETWEEN ? AND ?", [$startDate, $endDate]);

		$rangeStart = '2024-01-01';
		$rangeEnd = '2024-09-30';

		//if ($startDate >= $rangeStart && $endDate <= $rangeEnd) 
		//{	
			
		if ($request->bet_id != '') 
		{
		$data['recordsFiltered'] = $data['recordsTotal'] = $cc[0]->Total;
		$records = DB::connection('sqlsrv')->select("exec PaginatedCasinoTaxableDataByID @Offset = {$request->start}, @StartDate = '$startDate', @EndDate = '$endDate', @BetId = '$betId'");
		}
		else
		{
		$data['recordsFiltered'] = $data['recordsTotal'] = $cc[0]->Total;
		$records = DB::connection('sqlsrv')->select("exec PaginatedCasinoTaxableData @Offset = {$request->start}, @StartDate = '$startDate', @EndDate = '$endDate'");
		}
			
		//}
		/*else
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
	}*/

        $data['data'] = collect($records)->map(function ($d) use ($state, $type, $currency) {
            return [
                $d->ClientId,
				$d->Game,
                formatCurrency($d->BetAmount, $currency),
                formatCurrency($d->WinningAmount, $currency),
				formatCurrency($d->TaxAmount, $currency),
                $state[$d->Status],
                $d->CalculationDate == null ? '' : Carbon::parse($d->CalculationDate)->format('Y/m/d H:i:s'),
            ];
        });

        return response()->json($data);
    }
}
