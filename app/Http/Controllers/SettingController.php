<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $hydroDataController = $this->readApiData('api/controller');
        return view('dashboard.setting', [
           'hydroDataController' => $hydroDataController->data,
        ]);
    }

    public function updatePpmMax(Request $request){
        $max_ppm = $request['ppmMax'];
        $apiUrl = 'https://ponic.my.id/api/controller/update/max_ppm';
        Http::post($apiUrl, [
            'max_ppm' => $max_ppm,
        ]);

        return redirect('/dashboard/setting')->with('success', 'berhasil');
    }

    public function updatePpmMin(Request $request){
        $min_ppm = $request['ppmMin'];
        $apiUrl = 'https://ponic.my.id/api/controller/update/min_ppm';
        Http::post($apiUrl, [
            'min_ppm' => $min_ppm,
        ]);

        return redirect('/dashboard/setting')->with('success', 'berhasil');
    }
}
