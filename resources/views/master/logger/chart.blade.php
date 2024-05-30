@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Wesel') }} | {{ __('Chart') }}</title>
@endsection

@foreach($Wesel as $LR)
    @section('section-head')
        <ol class="breadcrumb bg-primary text-white-all">
            <li class="breadcrumb-item">{{ __('Master') }}</li>
            <li class="breadcrumb-item">{{ __('Logger') }}</li>
            <li class="breadcrumb-item">{{ $LR->area }}</li>
            <li class="breadcrumb-item"><a href="{{ route('logger.chart', $LR->id) }}">{{ __('Data') }}</a></li>
        </ol>
    @endsection

    @section('section-body')
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12 mt-lg-0 mt-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Voltage ') . $LR->area }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="chartVoltage" height="170"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12 mt-lg-0 mt-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Current ') . $LR->area }}</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="chartCurrent" height="170"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <script>
            var ctx1 = document.getElementById('chartVoltage').getContext('2d');
            var chartVoltage = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Voltage (V)',
                        data: [],
                        fill: false,
                        borderColor: 'blue',
                        pointRadius: 5,
                        pointBackgroundColor: 'blue',
                        pointBorderColor: 'white',
                    }]
                },
                options: {
                    
                }
            });

            $(document).ready(function() {
                $.ajax({
                    url: "{{ route('logger.chart-voltage', $LR->id) }}",
                    method: 'GET',
                    success: function(data) {
                        chartVoltage.data.labels = data.map(function(item) {
                            return item.label;
                        });

                        chartVoltage.data.datasets[0].data = data.map(function(item) {
                            return item.value;
                        });

                        chartVoltage.update();
                    }
                });
            });

            var ctx2 = document.getElementById('chartCurrent').getContext('2d');
            var chartCurrent = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Current (A)',
                        data: [],
                        fill: false,
                        borderColor: 'blue',
                        pointRadius: 5,
                        pointBackgroundColor: 'blue',
                        pointBorderColor: 'white',
                    }]
                },
                options: {
                    
                }
            });

            $(document).ready(function() {
                $.ajax({
                    url: "{{ route('logger.chart-current', $LR->id) }}",
                    method: 'GET',
                    success: function(data) {
                        chartCurrent.data.labels = data.map(function(item) {
                            return item.label;
                        });
                        
                        chartCurrent.data.datasets[0].data = data.map(function(item) {
                            return item.value;
                        });

                        chartCurrent.update();
                    }
                });
            });
        </script>
    @endpush
@endforeach