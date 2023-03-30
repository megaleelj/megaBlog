<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $city = $request->input('city');
        $client = new Client();
        if(!$city){
            $city = 'wolverhampton';
        }
        $response = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather', [
            'query' => [
                'q' => $city,
                'units' => 'metric',
                'appid' => '0410918e27c256803f5ff7f6ff796111'
            ]
        ]);
    
        $data = json_decode($response->getBody(), true);
    
        return view('welcome', ['data' => $data]);
    }
    
    
}

