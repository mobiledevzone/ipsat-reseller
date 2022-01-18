<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <a class="navbar-brand smooth"
                    href="{{ route('landingpage') }}">{{ Utility::getsettings('app_name') }}</a>
                <div class="pr-lg-5">
                    <p> {!!(Utility::getsettings('footer_page_content'))!!}</p>

                    <p>&copy;{{ Utility::getsettings('app_name') }}. {{__('With')}} <i
                            class="fas fa-heart text-danger"></i>
                        {{__('from India')}}</p>
                    <div class="mt-4 social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">

                    <div class="col-md-9">
                        <ul>
                            <h4>{{__('Company')}}</h4>
                            <li><a href="{{ route('privacypolicy') }}">{{__('Privacy Policy')}}</a></li>
                            <li><a href="{{ route('contactus') }}">{{__('Contact Us')}}</a></li>
                            <li><a href="{{ route('termsandconditions') }}">{{__('Terms And Conditions')}}</a></li>
                            <li><a href="{{ route('faq') }}">{{__('FAQs')}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
@include('layouts.includes.alerts')
