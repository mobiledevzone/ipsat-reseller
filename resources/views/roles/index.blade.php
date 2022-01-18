@extends('layouts.main')
@section('title', __('Roles'))
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Roles List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Roles') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row ">
                    <div class="col-12">
                        <div class="card p-3">
                            <div class="table-responsive py-4 dropdown_3">
                                {{ $dataTable->table(['width' => '100%']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('css')
    @include('layouts.includes.datatable_css')
@endpush
@push('javascript')
    @include('layouts.includes.datatable_js')
    {{ $dataTable->scripts() }}
@endpush
