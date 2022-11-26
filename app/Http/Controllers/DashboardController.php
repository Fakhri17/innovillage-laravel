<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
	{
        $hydroStatistik = $this->readApiData("/api/data_statistik");
        $hydroController = $this->readApiData("/api/controller");
        $weather = $this->readWeatherApi("/weather", "surabaya");
        return view('dashboard.index', [
            'hydroStatistik' => $hydroStatistik->data,
            'hydroController' => $hydroController->data,
            'weather' => $weather,
        ]);
    }
}
