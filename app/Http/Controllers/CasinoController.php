<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CasinoController extends Controller
{

    public function index()
    {
        return view('casino');
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

        $data['draw'] = $request->draw;

        $query = DB::connection('sqlsrv')
            ->table('Casino');
        $data['recordsFiltered'] = $data['recordsTotal'] = 0;

        $query->select([
            'Id',
            'TransactionId',
            'TransactionType',
            'Created',
            'PlayerId',
            'Bet',
            'RelatedBetId',
            'WinningAmount',
            'GameId',
            'Game',
            'Provider',
			'Status'
        ]);

        if ($request->bet_id != '') {
            $query->where('RelatedBetId', '=', $request->bet_id);
        } else {
            $query->where(function ($q) use ($setting) {
                $q->where('Bet', '<', $setting->stake_amount)
                    ->where('WinningAmount', '<', $setting->winning_amount);
            });
        }

        if ($request->start_date) {
            $query->where(DB::raw("Cast([Created] as Date)"), '>=', DB::raw("CONVERT(date, '{$request->start_date}')"))
                ->where(DB::raw("Cast([Created] as Date)"), '<=', DB::raw("CONVERT(date, '{$request->end_date}')"));
        } else {
            $query->where('Created', null);
        }

        $query->offset($request->start ?? 0)
            ->limit(20)
            ->orderBy('Id', 'desc');
	

        $data['data'] = $query->get()->map(function ($d) use ($currency) {
            $ggr = abs($d->Bet - $d->WinningAmount);
            return [
                Carbon::parse($d->Created)->format('d/m/Y'),
                $d->PlayerId,
                $d->Game,
                formatCurrency($d->Bet, $currency),
                formatCurrency($d->WinningAmount, $currency),
                $d->TransactionType,
                $d->TransactionId,
                $d->RelatedBetId,
                $d->Status,
                $ggr
            ];
        });
		
		return response()->json($data);
		
    }
}
