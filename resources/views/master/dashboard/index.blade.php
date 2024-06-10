@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Wesel') }} | {{ __('Dashboard') }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="hero bg-primary text-white">
                <div class="hero-inner">
                    <h2>Welcome Back, {{ Auth::user()->name }}!</h2>
                    <p class="lead">May you always be happy.</p>
                </div>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header">
                  <h4>Machine 1</h4>
                </div>
                <div class="card-body">
                    @foreach($Machine1 as $M1) 
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-primary">
                                        <i class="fas fa-bolt"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Total Volts</h4>
                                        </div>
                                        <div class="card-body">
                                            {{ $M1->voltage; }} {{ __('V') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-primary">
                                        <i class="fas fa-plug"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Total Ampere</h4>
                                        </div>
                                        <div class="card-body">
                                            {{ $M1->current; }} {{ __('A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header">
                  <h4>Machine 2</h4>
                </div>
                <div class="card-body">
                    @foreach($Machine2 as $M2) 
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-primary">
                                        <i class="fas fa-bolt"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Total Volts</h4>
                                        </div>
                                        <div class="card-body">
                                            {{ $M2->voltage; }} {{ __('V') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-primary">
                                        <i class="fas fa-plug"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Total Ampere</h4>
                                        </div>
                                        <div class="card-body">
                                            {{ $M2->current; }} {{ __('A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header">
                  <h4>Machine 1</h4>
                </div>
                <div class="card-body">
                    @foreach($Machine1 as $M1) 
                        @if($M1->category == 'Alarm') 
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-danger">
                                        <div class="card-icon bg-danger">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($M1->category == 'Warning')
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-warning">
                                        <div class="card-icon bg-warning">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header">
                  <h4>Machine 2</h4>
                </div>
                <div class="card-body">
                    @foreach($Machine2 as $M2) 
                        @if($M2->category == 'Alarm') 
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-danger">
                                        <div class="card-icon bg-danger">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($M2->category == 'Warning')
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-warning">
                                        <div class="card-icon bg-warning">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header">
                  <h4>Machine 1</h4>
                </div>
                <div class="card-body">
                    @foreach($Machine1 as $M1) 
                        @if($M1->relay1 == '1' && $M1->relay2 == '1') 
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-primary">
                                        <div class="card-icon bg-primary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-success">
                                        <div class="card-icon bg-success">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($M1->relay1 == '1' && $M1->relay2 == '0')
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-primary">
                                        <div class="card-icon bg-primary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($M1->relay1 == '0' && $M1->relay2 == '1')
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-success">
                                        <div class="card-icon bg-success">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-header">
                  <h4>Machine 2</h4>
                </div>
                <div class="card-body">
                    @foreach($Machine2 as $M2) 
                        @if($M2->relay1 == '1' && $M2->relay2 == '1') 
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-primary">
                                        <div class="card-icon bg-primary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-success">
                                        <div class="card-icon bg-success">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($M2->relay1 == '1' && $M2->relay2 == '0')
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-primary">
                                        <div class="card-icon bg-primary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($M2->relay1 == '0' && $M2->relay2 == '1')
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-success">
                                        <div class="card-icon bg-success">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1 bg-secondary">
                                        <div class="card-icon bg-secondary">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Machine 1</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChartMachine1" height="158"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Machine 2</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChartMachine2" height="158"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx1 = document.getElementById("myChartMachine1").getContext('2d');
        var myChartMachine1 = new Chart(ctx1, {
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
                },
                {
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
                url: "{{ route('dashboard.chart-machine1') }}",
                method: 'GET',
                success: function(data) {
                    myChartMachine1.data.labels = data.map(function(item) {
                        return item.label;
                    });

                    myChartMachine1.data.datasets[0].data = data.map(function(item) {
                        return item.voltage;
                    });

                    myChartMachine1.data.datasets[1].data = data.map(function(item) {
                        return item.current;
                    });


                    myChartMachine1.update();
                }
            });
        });

        var ctx2 = document.getElementById("myChartMachine2").getContext('2d');
        var myChartMachine2 = new Chart(ctx2, {
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
                },
                {
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
                url: "{{ route('dashboard.chart-machine2') }}",
                method: 'GET',
                success: function(data) {
                    myChartMachine2.data.labels = data.map(function(item) {
                        return item.label;
                    });

                    myChartMachine2.data.datasets[0].data = data.map(function(item) {
                        return item.voltage;
                    });

                    myChartMachine2.data.datasets[1].data = data.map(function(item) {
                        return item.current;
                    });


                    myChartMachine2.update();
                }
            });
        });
    </script>
@endpush