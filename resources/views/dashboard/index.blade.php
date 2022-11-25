@extends('_layouts.base')

@section('title', "Dashboard")

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
                  <div class="font-weight-medium">
                    10 Hari
                  </div>
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
      </div>
      <div class="row my-10">
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">PPM</div>
              </div>
              <div class="h1 mb-3">75</div>
              <div class="progress progress-sm" style="height: 10px;">
                <div class="progress-bar progress-bar-animated bg-orange-400" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  <span class="visually-hidden">75% Complete</span>
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
              <div class="h1 mb-3">75</div>
              <div class="progress progress-sm" style="height: 10px;">
                <div class="progress-bar progress-bar-animated bg-orange-400" 
                  style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="subheader">SUHU</div>
              </div>
              <div class="row align-items-center">
                <div class="col-auto">
                  <span class="bg-orange-400 text-white avatar">
                    <i class="ti ti-temperature"  style="font-size: 27px;"></i>
                  </span>
                </div>
                <div class="col-auto">
                  <div class="h1">{{ intval($weather->main->temp) - 273 }}<span>&#8451;</span></div>
                  <div class="font-weight-medium">Suhu saat ini</div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="my-10">
        <div class="row">
          <div class="col-lg-10">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="subheader">Volume Air</div>
                </div>
                <div class="h1 mb-3">75 %</div>
                <div class="progress progress-sm" style="height: 10px;">
                  <div class="progress-bar progress-bar-animated bg-orange-400" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    <span class="visually-hidden">75% Complete</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2">
            <div class="card">
              <div class="card-body">
                <p class="mb-0">Status Pompa</p>
                <p class="mb-2">Saat Ini</p>
                <h2>Mati</h2>
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