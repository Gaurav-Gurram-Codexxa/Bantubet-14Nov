<?php

namespace App\Http\Controllers;

use App\Library\DataTable;
use App\Models\Limit;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LimitController extends Controller
{

    public function index()
    {
        $data = [
            'sport' => Setting::find(1),
            'casino' => Setting::find(2),
        ];
        return view('limit', $data);
    }

    public function store(Request $request)
    {
        $start_from = $request->start_from;
        $limit_for = $request->limit_for;
        $end_to = $request->end_to;
        $turnover = $request->turnover;
        $winning = $request->winning;
        $ggr = $request->ggr ?? 100;
        $tax_ggr = $request->tax_ggr;
        $tax_winning = $request->tax_winning;
        $winning_no = $request->winning_no;
        $bet_no = $request->bet_no;
        $single = $request->single ?? 100;
        $multiple = $request->multiple ?? 100;
        $system = $request->system ?? 100;
        $chain = $request->chain ?? 100;
        $eligible_amount_min = $request->eligible_amount_min ?? 0;
        $eligible_amount_max = $request->eligible_amount_max ?? 0;
        $eligible_bet_display_percent = $request->eligible_bet_display_percent ?? 0;


        $data = compact(
            'limit_for',
            'start_from',
            'end_to',
            'turnover',
            'winning',
            'ggr',
            'tax_ggr',
            'tax_winning',
            'winning_no',
            'bet_no',
            'single',
            'multiple',
            'system',
            'chain',
            'eligible_amount_min',
            'eligible_amount_max',
            'eligible_bet_display_percent'
        );

        Limit::create($data);
        (new CalculatePercent)->exec($data);
        return response()->json(['message' => 'success']);
    }

    public function update(Request $request, Limit $limit)
    {
        $start_from = $request->start_from;
        $limit_for = $request->limit_for;
        $end_to = $request->end_to;
        $turnover = $request->turnover;
        $winning = $request->winning;
        $ggr = $request->ggr ?? 100;
        $tax_ggr = $request->tax_ggr;
        $tax_winning = $request->tax_winning;
        $winning_no = $request->winning_no;
        $bet_no = $request->bet_no;
        $single = $request->single;
        $multiple = $request->multiple;
        $system = $request->system;
        $chain = $request->chain;
        $eligible_amount_min = $request->eligible_amount_min ?? 0;
        $eligible_amount_max = $request->eligible_amount_max ?? 0;
        $eligible_bet_display_percent = $request->eligible_bet_display_percent ?? 0;

        $data  = compact(
            'limit_for',
            'start_from',
            'end_to',
            'turnover',
            'winning',
            'ggr',
            'tax_ggr',
            'tax_winning',
            'winning_no',
            'bet_no',
            'single',
            'multiple',
            'system',
            'chain',
            'eligible_amount_min',
            'eligible_amount_max',
            'eligible_bet_display_percent'
        );



        $limit->update($data);
        (new CalculatePercent)->exec($data);

        return response()->json(['message' => 'success']);
    }

    public function destroy(Limit $limit)
    {
        $data = array_merge($limit->toArray(), array_fill_keys([
            'turnover',
            'winning',
            'ggr',
            'tax_ggr',
            'tax_winning',
            'winning_no',
            'bet_no',
            'single',
            'multiple',
            'system',
            'chain',
            'eligible_amount_min',
            'eligible_amount_max',
            'eligible_bet_display_percent',
        ], 100));

        $data['end_to'] = $data['end_to'] ?? now()->format('Y-m-d');
        $stmt = (new CalculatePercent)->updateStatement($data);
        DB::connection('sqlsrv')->statement($stmt);
        $limit->delete();
        return response()->json(['message' => 'success']);
    }


    public function list(Request $request)
    {
        $config = [
            'table' => 'limits',
            'columns' => [
                'start_from',
                'end_to',
                'turnover',
                'winning',
                'ggr',
                'tax_ggr',
                'tax_winning',
                'single',
                'multiple',
                'system',
                'chain',
                'winning_no',
                'bet_no',
                'id',
                'limit_for',
                'eligible_amount_min', 'eligible_amount_max', 'eligible_bet_display_percent'
            ],
            'search_by' => [],
            'order_by' => [],
            'where' => [],
            'joins' => [],
            'default_order' =>
            ['Id' => 'desc'],
        ];

        $data = DataTable::getData($config);

        $response = [];

        foreach ($data['data'] as $d) {
            $json = json_encode($d);
            $response[] = [
                str_replace('_', ' ', $d->limit_for),
                $d->start_from,
                $d->end_to,
                $d->turnover,
                $d->winning,
                $d->ggr,
                $d->tax_ggr,
                $d->tax_winning,
                $d->single,
                $d->multiple,
                $d->system,
                $d->chain,
                "<span title='Edit' class='fa fa-pencil' onclick='editLimit($json)'></span>&nbsp;&nbsp;&nbsp;&nbsp;<span title='Delete' class='fa fa-trash' onclick='deleteLimit($d->id)'></span>"
            ];
        }

        $data['data'] = $response;

        return response()
            ->json($data);
    }

    public function updateStakeLimit(Request $request)
    {
        Setting::find(1)->update(['stake_amount' => $request->sport_stake_amount, 'winning_amount' => $request->sport_winning_amount]);
        Setting::find(2)->update(['stake_amount' => $request->casino_stake_amount, 'winning_amount' => $request->casino_winning_amount]);
        return response()
            ->json(['message' => 'success']);
    }
}
