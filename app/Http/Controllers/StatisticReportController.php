<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticReportController extends Controller
{

    public function index()
    {
        return view('statistic-report');
    }


    public function list(Request $request)
    {
        if (!isset($request->start_date))
            return response()
                ->json([
                    'data' => [],
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                ]);

        function formatCurrency($amount)
        {
            $conversion = auth()->user()->currency == 'usd' ? 0.0020 : 1;
            $amount = $amount * $conversion;
            $formattedCurrency = '';
            if ($amount < 0)
                $formattedCurrency = '(' . number_format(abs($amount), 2) . ')';
            else
                $formattedCurrency = number_format($amount, 2);

            return auth()->user()->currency == 'usd' ?
                '<span class="currency">$</span>' . $formattedCurrency : $formattedCurrency . '<span class="currency">Kz</span>';
        }

        $col = 'Amount';
        $con = '';
        $conColTotal = 'turnover';
        $conColCount = 'bet_no';

        if ($request->type == 'winning') {
            $col = 'WinningAmount';
            $con = 'AND [State] = 4';
            $conColTotal = 'winning';
            $conColCount = 'winning_no';
        }

        $data['draw'] = $request->draw;

        $query = DB::connection('sqlsrv')
            ->table('StatisticsCopy');
        $data['recordsFiltered'] = $data['recordsTotal'] = 0;


        $query->select([
            DB::raw("SUM(CASE WHEN GameType = 'Casino' THEN OnlineTurnover + RetailTurnover END) as CasinoAmount"),
            DB::raw("SUM(CASE WHEN GameType = 'Casino' THEN OnlineTurnoverBetCount + RetailTurnoverBetCount END) as CasinoCount"),
            DB::raw("SUM(CASE WHEN GameType = 'SportBook' THEN OnlineTurnover END) as OnlineTurnoverAmount"),
            DB::raw("SUM(CASE WHEN GameType = 'SportBook' THEN RetailTurnover END) as RetailTurnoverAmount"),
            DB::raw("SUM(CASE WHEN GameType = 'SportBook' THEN OnlineTurnoverBetCount END) as OnlineTurnoverBetCount"),
            DB::raw("SUM(CASE WHEN GameType = 'SportBook' THEN RetailTurnoverBetCount END) as RetailTurnoverBetCount"),
            'StatisticsDate',
        ])->whereBetween('StatisticsDate',  ["{$request->start_date}", "{$request->end_date}"])
            ->groupBy('StatisticsDate')
            ->orderBy('StatisticsDate');

        $newData = $query->get();

        $data['recordsFiltered'] = $data['recordsTotal'] = $newData->count();


        $data['data'] = $newData->map(fn ($d, $i) => [
            Carbon::parse($d->StatisticsDate)->format('d-m-Y'),
            number_format(($d->CasinoCount), 0),
            formatCurrency($d->CasinoAmount),
            number_format($d->OnlineTurnoverBetCount, 0),
            formatCurrency($d->OnlineTurnoverAmount),
            number_format($d->RetailTurnoverBetCount, 0),
            formatCurrency($d->RetailTurnoverAmount),
        ]);

        return response()
            ->json($data);
    }
}
