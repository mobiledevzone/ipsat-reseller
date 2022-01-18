@extends('layouts.main')
@section('title', __('Languages'))
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Manage Languages') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Languages') }}</div>
                </div>
            </div>

            <div class="section-body">

                <div id="output-status"></div>
                <div class="row">
                    <div class="col-md-12 p-0 m-0">
                        <div class="card p-o">
                            <div class="card-header">
                                <div class="col-lg-6  custom_left">

                                    <h4>{{ __('Language') }}</h4>
                                </div>
                                <div class="col-lg-6  custom_right">

                                    <a href="#!" class="btn float-right custom-left btn-danger text-light btn-lg" data-toggle="tooltip" data-original-title="{{__('Delete')}}" 
                                    data-confirm="{{__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')}}"
                                     data-confirm-yes="document.getElementById('delete-form-{{$currantLang}}').submit();">
                                        <i class="fas fa-trash"></i> {{ __('Delete')}}
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['lang.destroy', $currantLang],'id'=>'delete-form-'.$currantLang]) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('create.language', [$currantLang]) }}" class="btn custom-left float-right btn-primary text-light btn-lg" id="create">{{__('Create')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">

                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    @foreach ($languages as $lang)
                                    
                                        <li class="nav-item">
                                            <a href="{{ route('manage.language', [$lang]) }}"
                                                class="nav-link {{ $currantLang == $lang ? 'active' : '' }}">{{ Str::upper($lang) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card" id="settings-card">

                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item shadow mb-3 mr-2">
                                            <a class="nav-link active" id="account-details-tab" data-toggle="tab"
                                                href="#account-details" role="tab" aria-controls="account-details"
                                                aria-selected="false">{{ __('Labels') }}</a>
                                        </li>
                                        <li class="nav-item shadow mb-3 mr-2">
                                            <a class="nav-link" id="login-details-tab" data-toggle="tab" href="#login-details"
                                                role="tab" aria-controls="login-details"
                                                aria-selected="false">{{ __('Message') }}</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3 mx-0">
                                        <div class="tab-pane active" id="account-details" role="tabpanel"
                                            aria-labelledby="account-details-tab">
                                            <form method="post" class="form-horizontal" action="{{route('store.language.data',[$currantLang])}}">
                                                @csrf
                                                <div class="row form-group">
                                                    @foreach($arrLabel as $label => $value)
                                                        <div class="col-md-6">
                                                            <div class="mt-3">
                                                                <label class="form-control-label" for="example3cols1Input">{{$label}} </label>
                                                                <input type="text" class="form-control" name="label[{{$label}}]" value="{{$value}}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <div class="col-lg-12 text-right mt-3">
                                                        <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>

                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="login-details" role="tabpanel"
                                            aria-labelledby="login-details-tab">
                                            <form method="post" action="{{route('store.language.data',[$currantLang])}}">
                                                @csrf
                                                <div class="row form-group">
                                                    @foreach($arrMessage as $fileName => $fileValue)
                                                        <div class="col-lg-12">
                                                            <h3>{{ucfirst($fileName)}}</h3>
                                                        </div>
                                                        @foreach($fileValue as $label => $value)
                                                            @if(is_array($value))
                                                                @foreach($value as $label2 => $value2)
                                                                    @if(is_array($value2))
                                                                        @foreach($value2 as $label3 => $value3)
                                                                            @if(is_array($value3))
                                                                                @foreach($value3 as $label4 => $value4)
                                                                                    @if(is_array($value4))
                                                                                        @foreach($value4 as $label5 => $value5)
                                                                                            <div class="col-md-6">
                                                                                                <div class="mt-3">
                                                                                                    <label class="form-control-label">{{$fileName}}.{{$label}}.{{$label2}}.{{$label3}}.{{$label4}}.{{$label5}}</label>
                                                                                                    <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}][{{$label3}}][{{$label4}}][{{$label5}}]" value="{{$value5}}">
                                                                                                </div>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    @else
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mt-3">
                                                                                                <label class="form-control-label">{{$fileName}}.{{$label}}.{{$label2}}.{{$label3}}.{{$label4}}</label>
                                                                                                <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}][{{$label3}}][{{$label4}}]" value="{{$value4}}">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            @else
                                                                                <div class="col-lg-6">
                                                                                    <div class="mt-1">
                                                                                        <label class="form-control-label">{{$fileName}}.{{$label}}.{{$label2}}.{{$label3}}</label>
                                                                                        <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}][{{$label3}}]" value="{{$value3}}">
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                        @endforeach
                                                                    @else
                                                                        <div class="col-lg-6">
                                                                            <div class="mt-1">
                                                                                <label class="form-control-label">{{$fileName}}.{{$label}}.{{$label2}}</label>
                                                                                <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}][{{$label2}}]" value="{{$value2}}">
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <div class="col-lg-6">
                                                                    <div class="mt-1">
                                                                        <label class="form-control-label">{{$fileName}}.{{$label}}</label>
                                                                        <input type="text" class="form-control" name="message[{{$fileName}}][{{$label}}]" value="{{$value}}">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                                <div class="col-lg-12 text-right mt-3">
                                                    <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('style')
    <link href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
@endpush


@push('script')
    <script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script>
        $(".inputtags").tagsinput('items');
        $(".custom_select").select2();
    </script>
@endpush
