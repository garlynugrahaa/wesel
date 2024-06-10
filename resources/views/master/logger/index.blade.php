@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Wesel') }} | {{ $Title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Logger') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('logger.index') }}">{{ __('Data') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <a href="{{ route('logger.create') }}" class="btn btn-primary float-right">
                            <span class="fas fa-plus"></span> {{ __('Create') }}
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudLogger" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('Area') }}</th>
                                    <th class="text-center">{{ __('Date') }}</th>
                                    <th class="text-center">{{ __('Time') }}</th>
                                    <th class="text-center">{{ __('Category') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
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
        var datatable = $('#crudLogger').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('logger.ajax') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'area', name: 'area', width: '15%', class: 'text-center' },
                { data: 'date', name: 'date', width: '10%', class: 'text-center' },
                { data: 'time', name: 'time', width: '10%', class: 'text-center' },
                { data: 'category', name: 'category', class: 'text-center' },
                { data: 'action', name: 'action', orderable: true, searchable: true, width: '5%' }
            ]
        })
    </script>
@endpush