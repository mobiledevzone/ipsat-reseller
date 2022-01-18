<!DOCTYPE html>
<html lang="en">

    @section('title')

    {{__('Terms And Conditions') }}
    @endsection
    
        @include('layouts.front_header')
        
    <div class="hero-mini hero-mini-sm">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h1>{{__('Terms And Conditions')}}</h1>

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
                                {!! Utility::getsettings('term_condition') !!}
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
