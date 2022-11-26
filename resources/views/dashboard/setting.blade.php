@extends('_layouts.base')

@section('title', "Dashboard Setting")

@php
    $dataController = $hydroDataController[array_key_last($hydroDataController)];
    date_default_timezone_set("Asia/Jakarta");
    $timeOn = $dataController->time_on;
    $timeOff = $dataController->time_off;
    $timeNow = date("H:i:s");
    $strTimeOn = strtotime($timeOn);
    $strTimeOff = strtotime($timeOff);
    $strTimeNow = strtotime($timeNow);
@endphp


@section('content')
{{-- {{dd ($hydroDataController)}} --}}
    <div class="my-20">
      <div class="container">
        <div class="card">
          <div class="card-header py-3">
            <h3 class="mb-0">Setting Menu</h3>
          </div>
          <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="{{ url("/dashboard/setting/update") }}">
              @csrf
              @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              @if (session('success'))
                <div class="my-5 alert alert-success">
                    {{ session('success') }}
                </div>
              @endif
              <div class="mb-3">
                <div>
                  <h4 class="mb-3 font-bold">Atur Tanggal Tanam  </h4>
                  <div class="w-lg-1/4">
                    <label class="form-label mb-0" for="datePickerPlant">Tanggal Tanam saat ini:  {{ $dataController->planting_date }} </label>
                    <div class="input-group">
                      <span class="p-4 input-group-text bg-orange-400 text-white"><i class="ti ti-calendar-event" style="font-size: 27px;"></i></span>
                      <input type="text" name="plantDate" class="form-control" id="datePickerPlant" placeholder="Masukkan Tanggal">
                    </div>      
                  </div>
                </div>
                <hr class="my-5 bg-secondary"/>
                <h4 class="mb-3 font-bold">PPM</h4>
                <div class="row mb-3 align-items-center">
                  <div class="col">
                    <div class="mb-3">
                      <label class="form-label mb-0" for="ppmInputMax">PPM max : {{ $dataController->data_ppm->max_ppm }} </label>
                      <input type="number" name="ppmMax" id="ppmInputMax" class="form-control" placeholder="PPM MAKSIMAL">
                    </div>
                    <div class="">
                      <label class="form-label mb-0" for="ppmInputMin">PPM min : {{ $dataController->data_ppm->min_ppm }} </label>
                      <input type="number" name="ppmMin" id="ppmInputMin" class="form-control" placeholder="PPM MINIMAL">
                    </div>
                  </div>
                  <div class="col">
                   <p>PPM saat ini</p>
                   <h1>{{ $dataController->data_ppm->ppm_value }}</h1>
                  </div>  
                </div>
                <hr class="my-5 bg-secondary"/>
                <h4 class="mb-3 font-bold">PH</h4>
                <div class="row align-items-center mb-3">
                  <div class="col">
                    <div class="mb-3">
                      <label class="form-label mb-0" for="phInputMax">PH max : {{ $dataController->data_ph->max_ph }}</label>
                      <input type="number" name="phMax" step="0.1" id="phInputMax" class="form-control" placeholder="PH MAKSIMAL">
                    </div>
                    <div class="">
                      <label class="form-label mb-0" for="phInputMin">PH min : {{ $dataController->data_ph->min_ph }}</label>
                      <input type="number" name="phMin" step="0.1" id="phInputMin" class="form-control" placeholder="PH MINIMAL">
                    </div>
                  </div>
                  <div class="col">
                    <p>PH saat ini</p>
                    <h1>{{ $dataController->data_ph->ph_value }}</h1>
                  </div>  
                </div>
                <hr class="my-5 bg-secondary"/>
                <h4 class="mb-3 font-bold">Pompa</h4>
                <div class="row align-items-center mb-5">
                  <div class="col">
                    <div class="mb-5">
                      <label class="form-label mb-0" for="timeOfPompa">Waktu Mati : {{ $timeOff }}</label>
                      <div class="input-group">
                        <span class="p-4 input-group-text bg-orange-400 text-white"><i class="ti ti-alarm" style="font-size: 27px;"></i></span>
                        <input type="text" name="timeOff" class="form-control" id="timeOfPompa" placeholder="Waktu Mati">
                      </div>      
                    </div>
                    <div class="">
                      <label class="form-label mb-0" for="timeOnPompa">Waktu Nyala : {{ $timeOn }}</label>
                      <div class="input-group">
												<span class="p-4 input-group-text bg-orange-400 text-white"><i class="ti ti-alarm" style="font-size: 27px;"></i></span>
												<input type="text" name="timeOn" class="form-control" id="timeOnPompa" placeholder="Waktu Hidup">
                      </div>      
                    </div>
                  </div>
                  <div class="col">
                    <p>Status Pompa</p>
                    @if ($dataController->pompa != 0)
                      <h1>Hidup ( nyala )</h1>
                    @else
                      <h1>Mati</h1>
                    @endif
                  </div>
                </div>
                <a href="{{ url("/dashboard") }}" class="btn btn-warning me-lg-3">Lihat Statistik</a>
                <button type="submit" class="btn btn-warning me-lg-3">Save Change</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
  <script>
    flatpickr('#datePickerPlant', {
      dateFormat: "Y-m-d",
    });
    flatpickr('#timeOfPompa', {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      time_24hr: true
    });
    flatpickr('#timeOnPompa', {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      time_24hr: true
    });
  </script>
@endsection