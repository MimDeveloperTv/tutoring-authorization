<?php

namespace App\Http\Controllers;

use App\Models\UserCollection;
use App\Traits\ResponseTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class UserCollectionController extends Controller
{
    use ResponseTemplate;
    public function index(Request $request)
    {
        $collections = UserCollection::paginate($request->pre_page);
        $this->setData($collections);
        return $this->response();
    }

    public function store(Request $request)
    {
        $collection = UserCollection::create([
             'name' => $request->name,
             'domain' => $request->domain
        ]);
        $this->setData($collection);
        return $this->response();
    }

    public function show($id)
    {
        $collection = UserCollection::find($id);
        $this->setData($collection);
        return $this->response();
    }

    public function generateApiKey($id)
    {
        $api_key = time().Str::random(30);
        $collection = UserCollection::find($id);
        $collection->api_key = hash('sha256', $api_key);
        $collection->save();
        $collection->api_key = $api_key;
        $this->setData($collection);
        return $this->response();
    }
}
