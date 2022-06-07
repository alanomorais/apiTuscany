<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apiTuscanyController extends Controller
{
    public function index()
    {
        return 'apiTuscany';
    }

    public function categories($language = null, $id = null)
    {
        $endpoint = "categories";
        
        if(empty($language)){
            $response = $this->getData($endpoint);
        }else{
            $param = "language={$language}";
            $response = $this->getData($endpoint,$param);
        }
        
        $array = [];
        if($response->response[0]->category_id == 9){
            foreach ($response->response[0]->products as $key => $value) {
                $array[$key] = $value;
            }
        }
        dd($array);



        return view('categories',compact('response'));
    }

    public function productInfo($product)
    {
    }

    public function getData($endpoint, $param = null)
    {
        if (!empty($param)) {
            $url = "https://stage.tuscanyleather.it/api/v1/{$endpoint}?{$param}";
        } else {
            $url = "https://stage.tuscanyleather.it/api/v1/{$endpoint}";
        }

        $response = Http::withHeaders($this->getHeaders())->get($url);
        $client = json_decode($response);

        return $client;
    }

    private function getHeaders()
    {
        $headers = [
            'Authorization' => "Bearer ". env('access_token')
        ];
        return $headers;
    }
}
