<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SportBookController extends Controller
{

    public function index()
    {
        return view('sport-book');
    }


    public function list(Request $request)
    {
        $timezone = auth()->user()->timezone;
        $currency = auth()->user()->currency;
        $setting = Setting::find(1);

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

        $query = DB::connection('sqlsrv')
            ->table('Bet');
        $data['recordsFiltered'] = $data['recordsTotal'] = 200;

        $query->select([
            'Id',
            'ClientId',
            'CurrencyId',
            'Amount',
            'Price',
            DB::raw("Switchoffset([Created], '+01:00') AS created"),
            DB::raw("Switchoffset([CalcDate], '+01:00') AS calcDate"),
            'WinningAmount',
            'SelectionCount',
            'PossibleWin',
            'Type',
            'State',
            'BonusAmount',
        ]);

        if ($request->bet_id != '') {
            $query->where('Id', '=', $request->bet_id);
        } else {
            $query->where(function ($q) use ($setting) {
                $q->where('Amount', '<', $setting->stake_amount)
                    ->where('WinningAmount', '<', $setting->winning_amount);
            });
        }

        if ($request->start_date) {
            $query->where(DB::raw("Switchoffset([Created], '+01:00')"), '>=', DB::raw("CONVERT(datetimeoffset, '{$request->start_date}:00.0000 +01:00')"))
                ->where(DB::raw("Switchoffset([Created], '+01:00')"), '<', DB::raw("CONVERT(datetimeoffset, '{$request->end_date}:00.0000 +01:00')"));
        } else {
            $query->where('Created', null);
        }

        $query->offset($request->start ?? 0)
            ->limit(20)
            ->orderBy('Id', 'desc');

        $data['data'] = $query->get()->map(function ($d) use ($state, $type, $currency) {
            $ggr = abs($d->Amount - $d->WinningAmount);
            return [
                $d->Id,
                $d->ClientId,
                formatCurrency($d->Amount, $currency),
                formatCurrency($d->PossibleWin),
                $d->SelectionCount,
                number_format($d->Price, 2),
                formatCurrency($d->WinningAmount, $currency),
                $type[$d->Type],
                formatCurrency($ggr, $currency),
                $state[$d->State],
                Carbon::parse($d->created)->format('Y/m/d H:i:s'),
                $d->calcDate == null ? '' : Carbon::parse($d->calcDate)->format('Y/m/d H:i:s'),
                formatCurrency($d->BonusAmount),
            ];
        });

        return response()->json($data);
    }
}
