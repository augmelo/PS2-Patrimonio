@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{--
    <div class="row">
    @foreach(config('patrimony.counters') as $counter)
    <div class="col-xl-3 col-md-6 mb-4">

       
            <div class="card border-left-primary py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ $counter['label'] }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $counter['model']::count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-{{ $counter['icon'] }} fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        

    </div>
    @endforeach
   
</div>

<div class="row">
    <div class="col-xl-8 col-lg-7">

        <div class="card">
            <div class="card-header bg-white border-0">
                <h6 class="m-0 font-weight-bold text-primary">
                    Patrimônios cadastrados durante 2021
                </h6>
            </div>
            <div class="card-body">
                <div id="chart" style="height: 300px;"></div>
            </div>
        </div>

    </div>
</div>
--}}
@endsection

@push('js')
    <script src="{{ asset('vendor/chart.js/Chart.bundle.js') }}"></script>
@endpush
