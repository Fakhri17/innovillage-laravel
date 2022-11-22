<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     /**
     * @param $uri
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @see https://dev.to/kingsconsult/how-to-consume-restful-apis-in-laravel-8-and-laravel-7-4gii
     */
    protected function readApiData($uri) {
        $client = new Client(); //GuzzleHttp\Client
        $apiUrl = env('PONIC_API_URL') . $uri;
        $response = $client->request('GET', $apiUrl, [
            'verify'  => false,
        ]);

        return json_decode($response->getBody());
    }

    protected function readWeatherApi($uri, $city){
        $client = new Client(); //GuzzleHttp\Client
        $apiUrl = env('OPENWEATHERMAP_API_URL') . $uri;
        $response = $client->request('GET', $apiUrl, [
            'query' => [
                'q' => $city,
                'appid' => env('OPENWEATHERMAP_API_KEY'),
                'lang' => "id",
            ],
        ]);

        return json_decode($response->getBody());
    }
}
