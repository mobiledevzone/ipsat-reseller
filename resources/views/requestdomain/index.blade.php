@extends('layouts.main')
@section('title', __('Domain Request'))
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Domain Request List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Domain Request') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row ">
                    <div class="col-12">
                        <div class="card py-2 px-3 pb-3 mt-3">
                            <div class="table-responsive py-4 pb-5" style="padding-top: 50px !important">
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
    <script>
    $(function() {
        $('body').on('click', '.reason', function() {
            var action = $(this).data('action');
            var modal = $('#common_modal');
            $.get(action, function(response) {
                modal.find('.modal-title').html('{{ __('Disapprove Reason') }}');
                modal.find('.modal-body').html(response.html);
                modal.modal('show');
            })
        });
    });
</script>

@endpush