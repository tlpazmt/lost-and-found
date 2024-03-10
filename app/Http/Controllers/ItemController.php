<?php

namespace App\Http\Controllers;

use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ItemResource::collection(Item::all());
    }

    public function store(StoreItemRequest $request): ItemResource
    {
        return new ItemResource(Item::create($request->validated()));
    }

    public function update(UpdateItemRequest $request, Item $item): ItemResource
    {
        $item->update($request->validated());

        return new ItemResource($item);
    }

    public function show(Item $item): ItemResource
    {
        return new ItemResource($item);
    }
}
