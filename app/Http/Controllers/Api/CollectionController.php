<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $collections = auth()->user()
            ->collections()
            ->withCount('quotes')
            ->get();
        return $this->success($collections, 'Successfully get all collections');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $collection = Collection::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);

        return $this->success([
            'collection' => $collection
        ], 'Collection Created Successfully');
    }

    public function show(Collection $collection)
    {
        $collection = $collection->quotes;
        return $this->success($collection, 'Successfully get collection\'s quotes');
    }

    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $collection->update(['name' => $request->name]);
        return $this->success($collection, 'Successfully updated collections');
    }

    public function destroy(Collection $collection)
    {
        $collection->delete();
        return $this->success([], 'Successfully deleted collections');
    }

    public function addQuote(Collection $collection, int $quote)
    {
        $collection->quotes()->attach($quote);
        return   $this->success([], 'Successfully quote added to collection');
    }

    public function deleteQuote(Collection $collection, int $quote)
    {
        $collection->quotes()->detach($quote);
        return   $this->success([], 'Successfully quote deleted from collection');
    }
}
