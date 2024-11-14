<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OrderHistory;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscriptionController extends Controller
{
    function index(Request $request)
    {
        $data = Subscription::all();
        return response()->json([
            'success' => true,
            'message' => 'subscription get successfully',
            'data' => $data
        ], Response::HTTP_OK);
    }

    function subscribe(Subscription $subscription)
    {
        $user_id = auth()->user()->id;
        $subscription_name = $subscription->name;
        $subscription_end = Carbon::now()->addDays($subscription->duration);;
        $subscription = $subscription->price;
        $data = OrderHistory::create(compact(
            'user_id',
            'subscription_name',
            'subscription_end',
            'subscription',
        ));
        return response()->json([
            'success' => true,
            'message' => 'subscribed successfully',
            'data' => $data
        ], Response::HTTP_OK);
    }
}
