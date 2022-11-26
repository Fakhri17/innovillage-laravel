@extends('_layouts.base')

@section('title', "Dashboard")

@php
    $plantDate = new DateTime($hydroController[0]->planting_date);
    $dateNow = new DateTime(date("Y-m-d"));
    $interval = $plantDate->diff($dateNow);
    $datetime1 = strtotime($hydroController[0]->planting_date);
    $datetime2 = strtotime(date("Y-m-d"));
    $secs = $datetime2 - $datetime1;// == <seconds between the two times>
    $days = $secs / 86400;
@endphp

@section('content')

  <div class="my-20">
    <div class="container">
      <div class="mb-5">
        <h1>Welcome to dashboard menu</h1>
      </div>
      <div class="row justify-content-start">
        <div class="col-auto d-flex align-items-stretch">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-orange-400 text-white avatar">
                    <i class="ti ti-calendar-event"  style="font-size: 27px;"></i>
                  </span>
                </div>
                <div class="col">
                  <div class="font-bolder">
                    Hari Tanam
                  </div>
                  @if ($days >= 0)
                    <div class="font-weight-medium">
                      {{ $interval->days + 1 }} Hari
                    </div>
                  @else
                    <div class="font-weight-medium">
                      {{ $days - 1}} hari
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto d-flex align-items-stretch">
          <div class="card card-sm">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-orange-400 text-white avatar">
                    <i class="ti ti-cloud"  style="font-size: 27px;"></i>
                  </span>
                </div>
                <div class="col">
                  <div class="font-weight-medium">
                    Kondisi Cuaca
                  </div>
                  <div class="font-bolder text-capitalize">
                    {{ $weather->weather[0]->description }}
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto d-flex align-items-stretch">
          <div class="card">
            <div class="card-body">
             
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-orange-400 text-white avatar">
                    <i class="ti ti-temperature"  style="font-size: 27px;"></i>
                  </span>
                </div>
                <div class="col-auto">
                  <p class="h3">{{ intval($weather->main->temp) - 273 }}<span>&#8451;</span></p>
                  <div class="font-weight-medium">Suhu saat ini</div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="row my-10">
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">PPM</div>
              </div>
              <div class="h1 mb-3">{{ $hydroStatistik[0]->ppm }}</div>
              <div class="progress progress-sm" style="height: 10px;">
                <div class="progress-bar progress-bar-animated bg-orange-400" style="width: {{ $hydroStatistik[0]->ppm }}px" role="progressbar" aria-valuenow="{{ $hydroStatistik[0]->ppm }}" aria-valuemin="0" aria-valuemax="99999">
                  <span class="visually-hidden">{{ $hydroStatistik[0]->ppm }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">PPH</div>
              </div>
              <div class="h1 mb-3">{{ $hydroStatistik[0]->ph }}</div>
              <div class="progress progress-sm" style="height: 10px;">
                <div class="progress-bar progress-bar-animated bg-orange-400" 
                  style="width: {{ $hydroStatistik[0]->ph }}px" role="progressbar" aria-valuenow="{{ $hydroStatistik[0]->ph }}" aria-valuemin="0" aria-valuemax="99999">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <p class="mb-0">Status Pompa</p>
              <p class="mb-2">Saat Ini</p>
              @if ($hydroController[0]->pompa != 0)
                <h2>Hidup ( nyala )</h2>
              @else
                <h2>Mati</h2>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="my-10">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="subheader">Volume Air</div>
                </div>
                <div class="h1 mb-3">{{ $hydroStatistik[0]->v_air }} %</div>
                <div class="progress progress-sm" style="height: 10px;">
                  <div class="progress-bar progress-bar-animated bg-orange-400" style="width: {{ $hydroStatistik[0]->v_air }}px" role="progressbar" aria-valuenow="{{ $hydroStatistik[0]->v_air }}" aria-valuemin="0" aria-valuemax="99999">
                    <span class="visually-hidden">{{ $hydroStatistik[0]->v_air }}% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <a href="{{ url("/logout") }}" class="btn btn-warning me-lg-3">Logout</a>
        <a href="{{ url("/dashboard/setting") }}" class="btn btn-warning">Pengaturan</a>
      </div>
    </div>
  </div>
@endsection