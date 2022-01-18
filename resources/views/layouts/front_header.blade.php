<head>
    <meta charset="utf-8">
    <title>@yield('title') | {{ Utility::getsettings('app_name') }}</title>
    <link rel="icon" href="{{ Utility::getpath(Utility::getsettings('favicon_logo')) }}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing/landstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css ') }}">

</head>

<body class="">
    <nav class="navbar navbar-reverse navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand smooth"
                href="{{ route('landingpage') }}">{{ Utility::getsettings('app_name') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-lg-center d-block d-md-flex">
                    <li class="nav-item"><a href="{{ route('landingpage') }}" class="nav-link">{{__('Home')}}</a>
                    <li class="nav-item"><a href="{{ url('/') }}/#plans" class="nav-link">{{__('Plans')}}</a>
                    </li>
                    <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link"
                            target="_blank">{{__('Login')}}</a></li>

                    </li>
                </ul>
            </div>
        </div>
    </nav>