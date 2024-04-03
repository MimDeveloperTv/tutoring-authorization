<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionAccessModelRequest;
use App\Http\Resources\CollectionAccessModelResource;
use App\Models\CollectionAccessModel;

class CollectionAccessModelController extends Controller
{
    public function index()
    {
        return CollectionAccessModelResource::collection(CollectionAccessModel::all());
    }

    public function store(CollectionAccessModelRequest $request)
    {
        return new CollectionAccessModelResource(CollectionAccessModel::create($request->validated()));
    }

    public function show(CollectionAccessModel $collectionAccessModel)
    {
        return new CollectionAccessModelResource($collectionAccessModel);
    }

    public function update(CollectionAccessModelRequest $request, CollectionAccessModel $collectionAccessModel)
    {
        $collectionAccessModel->update($request->validated());

        return new CollectionAccessModelResource($collectionAccessModel);
    }

    public function destroy(CollectionAccessModel $collectionAccessModel)
    {
        $collectionAccessModel->delete();

        return response()->json();
    }
}
