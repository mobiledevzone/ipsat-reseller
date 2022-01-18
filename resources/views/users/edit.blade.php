@extends('layouts.main')
@section('title', __('Edit user'))

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Edit User') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Edit User') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'Put', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group ">
                                {{ Form::label('name', __('Name')) }}
                                <div class="input-group ">
                                     
                                    {!! Form::text('name', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Name')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('email', __('Email')) }}
                                <div class="input-group">
                                     
                                    {!! Form::text('email', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Email Address')]) !!}
                                </div>
                            </div>
                            @if (tenant('id') != null && $user->type != 'Admin')
                                <div class="form-group">
                                    {{ Form::label('roles', __('Role')) }}
                                    <div class="input-group ">

                                        {!! Form::select('roles', $roles, $user->type, ['class' => 'form-control', 'id' => 'role']) !!}
                                    </div>
                                </div>
                            @endif
                            @hasrole('Super Admin')
                            <div class="form-group" id="domain">
                                {{ Form::label('domains', __('Domain')) }}
                                <div class="input-group ">
                                    {!! Form::text('domains', isset($user_domain->domain) ? $user_domain->domain : '', ['class' => 'form-control', 'id' => 'domain', ' required', 'placeholder' => __('Enter domain name')]) !!}
                                </div>
                            </div>
                            @endhasrole
                            <div class="btn-flt">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
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
