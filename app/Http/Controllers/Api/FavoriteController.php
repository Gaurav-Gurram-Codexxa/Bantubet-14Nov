<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FavoriteQuote;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $collections = auth()->user()->favorites;
        return $this->success($collections, 'Successfully get all Favorites');
    }

    public function store(Request $request)
    {
        $request->validate([
            'quote_id' => 'required',
        ]);

       auth()->user()->favorites()->attach($request->quote_id);

        return $this->success([], 'Successfully added to favorite');
    }

    public function destroy(int $favorite)
    {

        auth()->user()->favorites()->detach($favorite);


        return $this->success([], 'Successfully removed from favorite');
    }
}
