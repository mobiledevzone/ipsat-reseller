<!DOCTYPE html>
<html lang="en">

    @section('title')

    {{__('Privacy Policy') }}
    @endsection
    
        @include('layouts.front_header')

    <div class="hero-mini hero-mini-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h1>{{__('Privacy Policy')}}</h1>

                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <article class="article article-detail article-noshadow">
                        <div class="p-0">
                            <div>
                                {!! Utility::getsettings('privacy') !!}
                            </div>

                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
   
    @include('layouts.front_footer')

</body>

</html>
