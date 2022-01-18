@php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$languages = Utility::languages();
@endphp
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            <div class="d-sm-none d-lg-inline-block"><i class="fa fa-globe"></i></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            @foreach ($languages as $language)
                <a class="dropdown-item @if ($language == $currantLang) text-danger @endif"
                    href="{{ route('change.language', $language) }}">{{ Str::upper($language) }}</a>
            @endforeach
        </div>
    </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (tenant('id') == null)
                    <img alt="image"
                        src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                        class="rounded-circle mr-1">
                @else
                    @if (config('filesystems.default') == 'local')

                        <img id="avatar-img" class="rounded-circle mr-1"
                            src="{{ Auth::user()->avatar ? Storage::url(tenant('id') . '/' . Auth::user()->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                            alt="User profile picture">
                    @else
                        <img id="avatar-img" class="rounded-circle mr-1"
                            src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                            alt="User profile picture">
                    @endif
                @endif
                <div class="d-sm-none d-lg-inline-block">{{ __('Hi,') }} {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('profile.index', Auth::user()->id) }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> {{ __('Profile') }}
                </a>


                <div class="dropdown-divider"></div>
                <a class="dropdown-item has-icon text-danger" href="javascript:void(0)"
                    onclick="document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>
                <form action="{{ route('logout') }}" method="POST" id="logout-form"> @csrf </form>
            </div>
        </li>
    </ul>
</nav>
