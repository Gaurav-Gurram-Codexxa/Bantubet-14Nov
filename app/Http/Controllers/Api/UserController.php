<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponser;

    public function store(Request $request)
    {
        $request->validate([
            'preferences' => 'required',
        ]);

       auth()->user()->update([
        'preferences' => $request->preferences
       ]);

        return $this->success([], 'Preferences updated successfully');
    }
}
