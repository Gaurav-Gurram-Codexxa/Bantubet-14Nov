<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Quote;

class OwnQuoteController extends Controller
{
    use ApiResponser;

    public function index(Request $request)
    {
        $own_quotes = auth()->user()->ownQuotes;
        return $this->success($own_quotes, 'Successfully get own Quotes');
    }

    public function store(Request $request)
    {
        $request->validate([
            'quote' => 'required',
        ]);

        $own_quote = Quote::create([
            'category_id' => 0,
            'user_id' => auth()->user()->id,
            'quote' => $request->quote,
            'is_free' => 0,
            'image' => '',
            'type' => 'own',
            'author' => $request->author,
        ]);

        return $this->success($own_quote, 'Successfully created own Quotes');
    }

    public function update(Request $request, Quote $own_quote)
    {
        $own_quote->update([
            'quote' => $request->quote,
            'author' => $request->author,
        ]);
        return $this->success($own_quote, 'Successfully updated own Quotes');
    }

    public function destroy(Quote $own_quote)
    {
        $own_quote->delete();
        return $this->success([], 'Successfully get own Quotes');
    }
}
