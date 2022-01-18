@extends('layouts.app')
@section('title', __('Register'))
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Register') }}</h4>
        </div>
        <div class="card-body">
            <form method="POST" id="request_form" action="{{ route('requestdomain.store') }}">
                @csrf
                <div class="form-group ">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label for="password" class="d-block">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password" required>
                    <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password2" class="d-block">{{ __('Password Confirmation') }}</label> <input
                        id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                </div>
                <div class="form-group">
                    {{ Form::label('domains', __('Domain configration')) }}
                    <div class="input-group ">
                        {!! Form::text('domains', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter domain name')]) !!}
                    </div>
                    <span>{{ __('how to add-on domain in your hosting panel.') }}<a
                            href="{{ Storage::url('pdf/adddomain.pdf') }}" class="m-2"
                            target="_blank">{{ __('Document') }}</a></span>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" required name="agree" class="custom-control-input" id="agree">
                        <label class="custom-control-label" for="agree">{{ __('I agree with the') }}<a
                                href="{{ route('termsandconditions') }}" class="m-2"
                                target="_blank">{{ __('terms and conditions') }}</a></label>
                    </div>
                    @if ($plan_id == 1)
                    <div class="form-group">
                        <input type="hidden" id="plan_id" name="plan_id" value="{{ $plan_id }}">
                        <button type="submit" class=" btn btn-primary btn-lg btn-block">
                            {{ __('Submit') }}
                        </button>
                    </div>
                @else
                    <div class="form-group">
                        <input type="hidden" id="plan_id" name="plan_id" value="{{ $plan_id }}">
                        <button type="button" class="subscribe_plan btn btn-primary btn-lg btn-block">
                            {{ __('Register') }}
                        </button>
                    </div>
                @endif

            </form>
        </div>
    </div>
    <div class="simple-footer">
        © 2021 {{ config('app.name') }}
    </div>
@endsection

@push('javascript')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    $(document).on('click', '.subscribe_plan', function(evt) {
        checked = $("input[type=checkbox]:checked").length;
            if (!checked) {
                iziToast.error({
                    title: '{{ __('Error!') }}',
                    message: "{{ __('Please check terms and conditions') }}",
                    position: 'topRight'
                });
                return false;
            }
        var plan_id = $('#plan_id').val()
        var formdata = $('#request_form').serialize();
        $.ajax({
            url: "{{ route('requestdomain.store') }}",
            method: 'POST',
            data: formdata,
            dataType: "json",
            success: function(data) {
                console.log(data);
                createCheckoutSession(plan_id, data.domainrequest_id, data.order_id).then(function(
                    data) {
                    if (data.sessionId) {
                        stripe.redirectToCheckout({
                            sessionId: data.sessionId,
                        }).then(handleResult);
                    } else {
                        handleResult(data);
                    }
                });
            }
        });
    });
    const handleResult = function(result) {
        if (result.error) {
            showMessage(result.error.message);
        }

        setLoading(false);
    };



        function setLoading(isLoading) {
            if (isLoading) {

            } else {

            }
        }

        function showMessage(messageText) {
            const messageContainer = document.querySelector("#paymentResponse");

            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;

            setTimeout(function() {
                messageContainer.classList.add("hidden");
                messageText.textContent = "";
            }, 5000);
        }
        const createCheckoutSession = function(plan_id, domainrequest_id, order_id) {
            return fetch("{{ route('pre.stripe.session') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify({
                    createCheckoutSession: 1,
                    plan_id: plan_id,
                    order_id: order_id,
                    domain_id: domainrequest_id
                }),
            }).then(function(result) {
                console.log(result);
                return result.json();
            });
        };
    </script>
@endpush
