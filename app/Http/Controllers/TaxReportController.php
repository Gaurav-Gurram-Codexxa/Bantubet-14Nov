<?php

namespace App\Http\Controllers;

use App\Library\DataTable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxReportController extends Controller
{

    public function index()
    {
        return view('tax');
    }


    public function list(Request $request)
    {

        if ($request->start == null)
            return response()->json([
                'draw' => $request->draw,
                'data' => [],
                'recordsTotal' => 0,
                'recordsFiltered' => 0
            ]);

        $currency_conversion = auth()->user()->currency == 'usd' ? 0.0020 : 1;
        $data = DB::connection('sqlsrv')
            ->table('Bet')
            ->select([
                DB::raw('SUM(CASE WHEN [Source] IN (6, 16, 42) THEN Amount END ) AS OnlineStake'),
                DB::raw('SUM(CASE WHEN [Source] IN (98) THEN Amount END) AS OfflineStake'),
                DB::raw('SUM(CASE WHEN [Source] IN (6, 16, 42) THEN WinningAmount END) AS OnlineWinning'),
                DB::raw('SUM(CASE WHEN [Source] IN (98) THEN WinningAmount END) AS OfflineWinning'),
                DB::raw('COUNT(CASE WHEN [Source] IN (6, 16, 42) THEN Id END) AS OnlineBetCount'),
                DB::raw('COUNT(CASE WHEN [Source] IN (98) THEN Id END) AS OfflineBetCount'),
                DB::raw('SUM(CASE WHEN [Source] IN (6, 16, 42) AND [State] IN (2, 5) THEN Amount END ) AS OnlineCancelledStake'),
                DB::raw('SUM(CASE WHEN [Source] IN (98) AND [State] IN (2, 5) THEN Amount END ) AS OfflineCancelledStake'),
            ])
            ->whereBetween(DB::raw("Cast(Switchoffset(Created, '+01:00') As Date)"), [$request->start_date, $request->end_date])
            ->get()
            ->toArray();

        $casino = DB::connection('sqlsrv')
            ->table('Casino')
            ->select([
                DB::raw('SUM(Bet) AS Stake'),
                DB::raw('SUM(WinningAmount) AS Winning'),
                DB::raw('Count(Id) AS TotalCount'),
            ])
            ->whereBetween(DB::raw("Cast(Created As Date)"), [$request->start_date, $request->end_date])
            ->get()
            ->toArray();

        $casino = $casino[0];

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

        $response = [];

        $d = $data[0];

        $response[] = [
            'Online',
            number_format($d->OnlineBetCount, 0),
            formatCurrency($d->OnlineStake),
            formatCurrency($d->OnlineCancelledStake),
            formatCurrency($d->OnlineStake - $d->OnlineCancelledStake),
            formatCurrency($d->OnlineWinning),
            formatCurrency($d->OnlineStake - $d->OnlineWinning),
        ];

        $response[] = [
            'Retails',
            number_format($d->OfflineBetCount, 0),
            formatCurrency($d->OfflineStake),
            formatCurrency($d->OfflineCancelledStake),
            formatCurrency($d->OfflineStake - $d->OfflineCancelledStake),
            formatCurrency($d->OfflineWinning),
            formatCurrency($d->OfflineStake - $d->OfflineWinning),
        ];
        $response[] = [
            'Casino',
            number_format($d->OfflineBetCount * 0.0776543, 0),
            formatCurrency($casino->Stake),
            '',
			'',
            formatCurrency($casino->Winning),
            formatCurrency($casino->Stake - $casino->Winning),
        ];


        $data['data'] = $response;
        $data['recordsTotal'] = count($response);
        $data['recordsFiltered'] = count($response);

        return response()
            ->json($data);
    }
}
