<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $hydroDataController = $this->readApiData('api/controller');
        return view('dashboard.setting', [
           'hydroDataController' => $hydroDataController->data,
        ]);
    }
}
