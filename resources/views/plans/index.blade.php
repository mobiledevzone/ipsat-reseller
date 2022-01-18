@php
use Carbon\Carbon;
use App\Models\Setting;

$currency_symbol = tenancy()->central(function ($tenant) {
    return Setting::whereNull('tenant_id')
        ->where('key', 'currency_symbol')
        ->first()->value;
});
@endphp
@extends('layouts.main')
@section('title', __('Plans'))
@section('content')
    @hasrole('Super Admin')
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>{{ __('Plans List') }}</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                        <div class="breadcrumb-item">{{ __('Plans') }}</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row ">
                        <div class="col-12">
                            <div class="card p-3">
                                <div class="table-responsive py-4 dropdown_2">
                                    {{ $dataTable->table(['width' => '100%']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endhasrole
    @hasrole('Admin')
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>{{ __('Pricing') }}</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></div>
                        <div class="breadcrumb-item">{{ __('Plans') }}</div>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">{{ __('Pricing') }}</h2>
                    <p class="section-lead">
                        {{ __('Price components are very important for SaaS projects or other projects.') }}</p>
                    <div class="row">
                        @foreach ($plans as $plan)
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="pricing">
                                    <div class="pricing-title">
                                        {{ $plan->name }}
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>
                                                {{ $currency_symbol . '' . $plan->price }}
                                            </div>
                                            <div>{{ $plan->duration . ' ' . $plan->durationtype }}</div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">{{ $plan->max_users . ' ' . __('users') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($plan->id != 1)
                                        <div class="pricing-cta">
                                            @if ($plan->id == $user->plan_id && !empty($user->plan_expired_date))
                                                <a href="javascript:void(0)" data-id="{{ $plan->id }}"
                                                    data-amount="{{ $plan->price }}">{{ __('Expire at') }}
                                                    {{ Carbon::parse($user->plan_expired_date)->format('d/m/Y') }}</a>
                                            @else
                                                <a href="javascript:void(0)" class="subscribe_plan"
                                                    data-id="{{ $plan->id }}"
                                                    data-amount="{{ $plan->price }}">{{ __('Subscribe') }}
                                                    <i class="fas fa-arrow-right"></i></a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    @endhasrole
@endsection
@hasrole('Super Admin')
    @push('css')
        @include('layouts.includes.datatable_css')
    @endpush
    @push('javascript')
        @include('layouts.includes.datatable_js')
        {{ $dataTable->scripts() }}
    @endpush
@endhasrole
@hasrole('Admin')

@push('javascript')
<script src="https://js.stripe.com/v3/"></script>
    <script>
          const stripe = Stripe('{{ env('STRIPE_KEY') }}');
           

            var price  = $(this).data('amount');
        
        var plan_id  = $(this).data('id');

        var data = {
            "_token": "{{ csrf_token() }}",
            'price': price,
            'plan_id': plan_id,
        }

        $.ajax({
            url: "{{ route('stripe.pending.pay') }}",
            method: 'POST',
            data: data,
            dataType: "json",
            success: function(data) {
                console.log(data);
                setLoading(true);
                createCheckoutSession(plan_id,data.order_id).then(function(data) {
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
    
            // var modal = $('#common_modal');

        });

        const createCheckoutSession = function(plan_id,order_id) {
            return fetch("{{ route('stripe.session') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify({
                    createCheckoutSession: 1,
                    plan_id: plan_id,
                    order_id:order_id,
                }),
            }).then(function(result) {
                console.log(result);
                return result.json();
            });
        };

        // Handle any errors returned from Checkout
        const handleResult = function(result) {
            if (result.error) {
                showMessage(result.error.message);
            }

            setLoading(false);
        };

        // Show a spinner on payment processing
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                // payBtn.disabled = true;
                // document.querySelector("#spinner").classList.remove("hidden");
                // document.querySelector("#buttonText").classList.add("hidden");
            } else {
                // Enable the button and hide spinner
                // payBtn.disabled = false;
                // document.querySelector("#spinner").classList.add("hidden");
                // document.querySelector("#buttonText").classList.remove("hidden");
            }
        }

        // Display message
        function showMessage(messageText) {
            const messageContainer = document.querySelector("#paymentResponse");

            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;

            setTimeout(function() {
                messageContainer.classList.add("hidden");
                messageText.textContent = "";
            }, 5000);
        }
    </script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script>
        // Send Stripe Token to Server
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');

            // Add Stripe Token to hidden input
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit form
            form.submit();
        }
    </script>
@endpush
@endif