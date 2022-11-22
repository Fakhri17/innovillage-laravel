<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
	{
        $hydroStatistik = $this->readApiData("/api/data_statistik");
        $weather = $this->readWeatherApi("/weather", "surabaya");
        return view('dashboard.index', [
            'hydroStatistik' => $hydroStatistik->data,
            'weather' => $weather,
        ]);
    }
}
