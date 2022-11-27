<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $hydroDataController = $this->readApiData('/api/controller');
        return view('dashboard.setting', [
           'hydroDataController' => $hydroDataController->data,
        ]);
    }

    public function updatePonic(Request $request){
        // This for get data submit
        $plantDate = $request['plantDate'];
        $max_ppm = $request['ppmMax'];
        $min_ppm = $request['ppmMin'];
        $max_ph = $request['phMax'];
        $min_ph = $request['phMin'];
        $time_off = $request['timeOff'];
        $time_on = $request['timeOn'];
        $dataPompa = $request['dataPompa'];
        $valuePompa = $dataPompa == 'on' ? 1 : 0;

        // This For Url Api
        $urlPlantDate = env('PONIC_API_URL') . '/api/controller/update/planting_date';
        $urlPpmMax = env('PONIC_API_URL') . '/api/controller/update/max_ppm';
        $urlPpmMin = env('PONIC_API_URL') . '/api/controller/update/min_ppm';
        $urlPhMax = env('PONIC_API_URL') . '/api/controller/update/max_ph';
        $urlPhMin = env('PONIC_API_URL') . '/api/controller/update/min_ph';
        $urlTimeOff = env('PONIC_API_URL') . '/api/controller/update/time_off';
        $urlTimeOn = env('PONIC_API_URL') . '/api/controller/update/time_on';
        $urlPompa = env('PONIC_API_URL') . '/api/controller/update/pompa';


        // Post Data
        if ($plantDate) {
            Http::post($urlPlantDate, [
                'planting_date' => $plantDate,
            ]);
        }
        if ($max_ppm) {
            Http::post($urlPpmMax, [
                'max_ppm' => $max_ppm,
            ]);
        }
        if ($min_ppm) {
            Http::post($urlPpmMin, [
                'min_ppm' => $min_ppm,
            ]);
        }
        if ($max_ph) {
            Http::post($urlPhMax, [
                'max_ph' => $max_ph,
            ]);
        }
        if ($min_ph) {
            Http::post($urlPhMin, [
                'min_ph' => $min_ph,
            ]);
        }
        if ($time_off) {
            Http::post($urlTimeOff, [
                'time_off' => $time_off.":00",
            ]);
        }
        if ($time_on) {
            Http::post($urlTimeOn, [
                'time_on' => $time_on.":00",
            ]);
        }
        Http::post($urlPompa, [
            'pompa' => $valuePompa,
        ]);
       
       

        return redirect('/dashboard/setting')->with('success', 'Update data berhasil');
    }

}
