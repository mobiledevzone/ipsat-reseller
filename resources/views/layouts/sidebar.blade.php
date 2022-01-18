@php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$languages = Utility::languages();
@endphp
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="{{ Utility::getpath('logo/app-logo.png') }}" class="app-logo w-50">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ Utility::getpath('logo/app-small-logo.png') }}" class="app-logo w-50">
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('home') }}" class="nav-link ">
                    <i class="fas fa-home text-primary"></i><span>{{ __('Dashboard') }}</span></a>
            </li>
            @can('manage-user')
                <li>
                    <a href="{{ route('users.index') }}" class="nav-link "><i
                            class="fas fa-users text-primary"></i><span>{{ __('Users') }}</span></a>
                </li>
            @endcan
            @can('manage-role')
                <li>
                    <a href="{{ route('roles.index') }}" class="nav-link "><i
                            class="fas fa-key text-primary"></i><span>{{ __('Roles') }}</span></a>
                </li>
            @endcan
            @hasrole('Super Admin')
                <li>
                    <a href="{{ route('requestdomain.index') }}" class="nav-link "><i
                            class="fas fa-arrow-circle-right text-primary"></i><span>{{ __('Domain Request') }}</span></a>
                </li>
            @endhasrole
            
            @can('manage-module')
                <li>
                    <a href="{{ route('modules.index') }}" class="nav-link "><i
                            class="fas fa-fire text-primary"></i><span>{{ __('Modules') }}</span></a>
                </li>
            @endcan
            @can('manage-plan')
                <li>
                    <a href="{{ route('plans.index') }}" class="nav-link "><i
                            class="fas fa-money-check-alt text-primary"></i><span>{{ __('Plans') }}</span></a>
                </li>

            @endcan
            @can('manage-transaction')
                @if (Auth::user()->type == 'Super Admin')
                    <li>
                        <a href="{{ route('sales.index') }}" class="nav-link "><i
                                class="fas fa-money-bill-wave-alt text-primary"></i><span>{{ __('Transactions ') }}</span></a>
                    </li>
                @endif
            @endcan
            @can('manage-setting')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('settings') }}">
                        <i class="fas fa-cog text-primary"></i>
                        <span class="nav-link-text">{{ __('Settings') }}</span>
                    </a>
                </li>
            @endcan
            @can('manage-chat')
                @if (Utility::getsettings('pusher_status') == '1')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chat') }}">
                            <i class="fas fa-comments text-primary"></i>
                            <span class="nav-link-text">{{ __('Chats') }}</span>
                        </a>
                    </li>
                @endif
            @endcan
            @if (Auth::user()->type == 'Super Admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landing.page') }}">
                        <i class="fas fa-th-large text-primary"></i>
                        <span class="nav-link-text">{{ __('Landing Page') }}</span>
                    </a>
                </li>
            @endif
            @can('manage-language')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('manage.language', [$currantLang]) }}">
                        <i class="fas fa-globe text-primary"></i>
                        <span class="nav-link-text">{{ __('Manage Language') }}</span>
                    </a>
                </li>
            @endcan
        </ul>
    </aside>
</div>
