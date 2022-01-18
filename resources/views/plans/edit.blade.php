@extends('layouts.main')
@section('title', __('Create plan'))
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit Plan') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('plans.index') }}">{{ __('Plans') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Edit Plan') }}</div>
                </div>
            </div>
            <div class="section-body"> 
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            {!! Form::model($plan,['route' => ['plans.update', $plan->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}

                            <div class="form-group  ">
                                {{ Form::label('name', __('Name')) }}
                                <div class="input-group ">
                                    {!! Form::text('name', null, ['placeholder' => __('Name'), 'class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group  ">
                                {{ Form::label('price', __('Price')) }}
                                <div class="input-group ">
                                    {!! Form::text('price', null, ['placeholder' => __('Price'), 'class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group ">
                                {{ Form::label('duration', __('Duration')) }}
                                <div class="row">
                                    <div class="input-group col-md-6">
                                        {!! Form::number('duration', null, ['placeholder' => __('duration'), 'class' => 'form-control', 'required']) !!}
                                    </div>
                                    <div class="input-group col-md-6">
                                        <select class="form-control" size="1" name="durationtype">
                                            <option selected value="Month">{{ __('Month') }}</option>
                                            <option value="Year">{{ __('Year') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  ">
                                {{ Form::label('max_users', __('Maximum users')) }}
                                <div class="input-group ">
                                    {!! Form::number('max_users', null, ['placeholder' => __('Maximum users'), 'class' => 'form-control', 'required']) !!}
                                </div>
                            </div>
                            <div class="btn-flt">
                                <a href="{{ route('plans.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('javascript')
    <script>
        $(document).on('change', '#role', function() {
            var roles = $(this).val();
            if (roles == 'Super Admin') {
                $('#domain').hide();
                $('#domain').val('');
            } else {
                $('#domain').show();
            }
        });
    </script>
@endpush