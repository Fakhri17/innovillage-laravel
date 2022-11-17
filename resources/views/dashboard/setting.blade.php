@extends('_layouts.base')

@section('title', "Dashboard Setting")

@section('content')
{{-- {{dd ($hydroDataController)}} --}}
    <div class="my-20">
      <div class="container">
        <div class="card">
          <div class="card-header py-3">
            <h3 class="mb-0">Setting Menu</h3>
          </div>
          <div class="card-body">
            <form action="">
              <div class="mb-3">
                <div>
                  <h4 class="mb-3 font-bold">Atur Tanggal Tanam</h4>
                  <div class="input-group w-lg-1/4">      
                    <span class="p-4 input-group-text bg-orange-400 text-white"><i class="ti ti-calendar-event" style="font-size: 27px;"></i></span>
                    <input type="text" class="form-control" id="datePickerPlant" placeholder="Masukkan Tanggal">
                  </div>
                </div>
                <hr class="my-5 bg-secondary"/>
                <h4 class="mb-3 font-bold">PPM</h4>
                <div class="row mb-3 align-items-center">
                  <div class="col">
                    <div class="mb-3">
                      <label class="form-label mb-0" for="ppmInputMax">{{ $hydroDataController[0]->data_ppm->max_ppm }} ppm max</label>
                      <input type="number" name="ppmValueMax" id="ppmInputMax" class="form-control" placeholder="PPM MAKSIMAL">
                    </div>
                    <div class="">
                      <label class="form-label mb-0" for="ppmInputMin">{{ $hydroDataController[0]->data_ppm->min_ppm }} ppm min</label>
                      <input type="number" name="ppmValueMin" id="ppmInputMin" class="form-control" placeholder="PPM MINIMAL">
                    </div>
                  </div>
                  <div class="col">
                   <p>PPM saat ini</p>
                   <h1>{{ $hydroDataController[0]->data_ppm->ppm_value }}</h1>
                  </div>  
                </div>
                <hr class="my-5 bg-secondary"/>
                <h4 class="mb-3 font-bold">PH</h4>
                <div class="row align-items-center mb-3">
                  <div class="col">
                    <div class="mb-3">
                      <label class="form-label mb-0" for="phInputMax">{{ $hydroDataController[0]->data_ph->max_ph }} ph max</label>
                      <input type="number" name="phValueMax" id="phInputMax" class="form-control" placeholder="PH MAKSIMAL">
                    </div>
                    <div class="">
                      <label class="form-label mb-0" for="phInputMin">{{ $hydroDataController[0]->data_ph->min_ph }} ph min</label>
                      <input type="number" name="phValueMin" id="phInputMin" class="form-control" placeholder="PH MINIMAL">
                    </div>
                  </div>
                  <div class="col">
                    <p>PH saat ini</p>
                    <h1>{{ $hydroDataController[0]->data_ph->ph_value }}</h1>
                  </div>  
                </div>
                <hr class="my-5 bg-secondary"/>
                <h4 class="mb-3 font-bold">Pompa</h4>
                <div class="row align-items-center mb-5">
                  <div class="col">
                    <div class="mb-5">
                      <label class="form-label mb-0" for="timeOfPompa">Waktu Mati</label>
                      <div class="input-group">
                        <span class="p-4 input-group-text bg-orange-400 text-white"><i class="ti ti-alarm" style="font-size: 27px;"></i></span>
                        <input type="text" class="form-control" id="timeOfPompa" placeholder="Waktu Mati">
                      </div>      
                    </div>
                    <div class="">
                      <label class="form-label mb-0" for="timeOnPompa">Waktu Nyala</label>
                      <div class="input-group">
												<span class="p-4 input-group-text bg-orange-400 text-white"><i class="ti ti-alarm" style="font-size: 27px;"></i></span>
												<input type="text" class="form-control" id="timeOnPompa" placeholder="Waktu Hidup">
                      </div>      
                    </div>
                  </div>
                  <div class="col">
                    <p>Status Pompa</p>
                    <h1>Mati</h1>
                  </div>
                </div>
                <a type="submit" href="#" class="btn btn-warning me-lg-3">Save Change</a>
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
      dateFormat: "d-m-Y",
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