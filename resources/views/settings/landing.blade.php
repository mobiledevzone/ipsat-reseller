@extends('layouts.main')
@section('title', __('Landing Page'))
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Landing Page') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                    <div class="breadcrumb-item">{{ __('Landing Page') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-6 m-auto">
                        <div class="card p-4">
                            {!! Form::open(['route' => 'landing.page.store', 'method' => 'Post', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group ">
                                {{ Form::label('footer_page_content', __('Footer page Content')) }}
                                <div class="input-group ">
                                    {!! Form::textarea('footer_page_content', Utility::getsettings('footer_page_content'), ['class' => 'form-control', 'placeholder' => __('Enter Footer page Content')]) !!}
                                </div>
                            </div>
                            <div class="form-group ">
                                {{ Form::label('privacy', __('Privacy Page Content')) }}
                                <div class="input-group ">
                                    {!! Form::textarea('privacy', Utility::getsettings('privacy'), ['class' => 'form-control', 'placeholder' => __('Enter Privacy page Content')]) !!}
                                </div>
                            </div>
                            <div class="form-group ">
                                {{ Form::label('contact_us', __('Contact Us Page Content')) }}
                                <div class="input-group ">
                                    {!! Form::textarea('contact_us', Utility::getsettings('contact_us'), ['class' => 'form-control', 'placeholder' => __('Contact Us Page Content')]) !!}
                                </div>
                            </div>
                            <div class="form-group ">
                                {{ Form::label('term_condition', __('Term&Condition page Content')) }}
                                <div class="input-group ">
                                    {!! Form::textarea('term_condition', Utility::getsettings('term_condition'), ['class' => 'form-control', 'placeholder' => __('Enter Term&condition page Content')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('faq_page_content', __('FAQ')) }}
                                <div class="input-group">

                                    {!! Form::textarea('faq_page_content', Utility::getsettings('faq_page_content'), ['class' => 'form-control', 'placeholder' => __('Enter FAQ Content')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('contact_email', __('Contact Email')) }}
                                <div class="input-group">

                                    {!! Form::text('contact_email', Utility::getsettings('contact_email'), ['class' => 'form-control', 'placeholder' => __('Enter Contact Email')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('latitude', __('Latitude')) }}
                                <div class="input-group">

                                    {!! Form::text('latitude', Utility::getsettings('latitude'), ['class' => 'form-control', 'placeholder' => __('Enter Latitude')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('longitude', __('Longitude')) }}
                                <div class="input-group">

                                    {!! Form::text('longitude', Utility::getsettings('longitude'), ['class' => 'form-control', 'placeholder' => __('Enter Longitude')]) !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="status_toggle">{{ __('Captcha Status') }}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="custom-switch mt-2 custom-left float-right">
                                            <input name="captcha_status" class="custom-switch-input" type="checkbox"
                                                {{ Utility::getsettings('captcha_status') ? 'checked' : 'unchecked' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="captcha_setting"
                                class="{{ Utility::getsettings('captcha_status') != 0 ? 'block' : 'd-none' }}">
                                <div class="form-group">
                                    {{ Form::label('recaptcha_key', __('Recaptcha Key')) }}

                                    <div class="input-group">

                                        {!! Form::text('recaptcha_key', Utility::getsettings('recaptcha_key'), ['class' => 'form-control', 'placeholder' => __('Enter recaptcha key')]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('recaptcha_secret', __('Recaptcha Secret')) }}
                                    <div class="input-group">

                                        {!! Form::text('recaptcha_secret', Utility::getsettings('recaptcha_secret'), ['class' => 'form-control', 'placeholder' => __('Enter recaptcha secret')]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="btn-flt">
                                <a href="{{ route('home') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
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
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('footer_page_content', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('footer_page_content', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script><script>
        CKEDITOR.replace('privacy', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script><script>
        CKEDITOR.replace('contact_us', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script><script>
        CKEDITOR.replace('term_condition', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script><script>
        CKEDITOR.replace('faq_page_content', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script>
        $(document).on('click', "input[name$='captcha_status']", function() {
            if (this.checked) {
                $('#captcha_setting').fadeIn(500);

                $("#captcha_setting").removeClass('d-none');
                $("#captcha_setting").addClass('d-block');
            } else {
                $('#captcha_setting').fadeOut(500);

                $("#captcha_setting").removeClass('d-block');
                $("#captcha_setting").addClass('d-none');

            }
        });
    </script>
@endpush
