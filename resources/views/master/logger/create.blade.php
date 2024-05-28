@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Wesel') }} | {{ $Title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Logger') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('logger.create') }}">{{ __('Create') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <form action="{{ route('logger.store') }}" method="post">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Area*') }}</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ old('area') }}" id="area" name="area" class="form-control" required="" placeholder="Example : Machine 1">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('logger.index') }}" class="btn btn-warning">{{ __('Back') }}</a>
                        <button type="reset" class="btn btn-danger">{{ __('Reset') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection