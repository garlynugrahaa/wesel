@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Wesel') }} | {{ $Title }}</title>
@endsection

@foreach($Wesel as $LR)
    @section('section-head')
        <ol class="breadcrumb bg-primary text-white-all">
            <li class="breadcrumb-item">{{ __('Master') }}</li>
            <li class="breadcrumb-item">{{ __('Logger') }}</li>
            <li class="breadcrumb-item">{{ $LR->area }}</li>
            <li class="breadcrumb-item"><a href="{{ route('logger.show', $LR->id) }}">{{ __('Data') }}</a></li>
        </ol>
    @endsection

    @section('section-body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="crudLoggerDetail" class="table table-striped w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ __('No') }}</th>
                                        <th class="text-center">{{ __('Date') }}</th>
                                        <th class="text-center">{{ __('Time') }}</th>
                                        <th class="text-center">{{ __('Voltage') }}</th>
                                        <th class="text-center">{{ __('Current') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            var datatable = $('#crudLoggerDetail').DataTable({
                LRocessing: true,
                serverSide: true,
                ajax: "{{ route('logger.ajax-show', $LR->id) }}",
                columns: [
                    { data: 'no', name: 'no', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                    }, width: '5%', class: 'text-center' },
                    { data: 'date', name: 'date', width: '10%', class: 'text-center' },
                    { data: 'time', name: 'time', width: '10%', class: 'text-center' },
                    { data: 'voltage', name: 'voltage', class: 'text-center' },
                    { data: 'current', name: 'current', class: 'text-center' },
                ]
            })
        </script>
    @endpush
@endforeach