@php
use Carbon\Carbon;
$users = \Auth::user();
$currantLang = $users->currentLanguage();
@endphp
@extends('layouts.main')
@section('title', __('Dashboard'))
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Dashboard') }}</h1>
                <div class="section-header-breadcrumb">
                </div>
            </div>
            <div class="row">
                @if (tenant('id') == null)
                    @if (!env('STRIPE_KEY') || !env('STRIPE_SECRET'))
                        <div class="col-12">
                            <br>
                            <div class="alert alert-warning">{{ __('Please Set your Stripe key & Stripe Secret') }} - <a
                                    href="{{ route('setting', 'stripe-setting') }}">{{ __('Click') }}</a> </div>
                        </div>
                    @endif
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="users">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">

                                    <div class="card-header">
                                        <h4>{{ __('Total Admin') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $user }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @if (tenant('id') != null)
                    @if ((!\App\Facades\UtilityFacades::getsettings('STRIPE_KEY') || !\App\Facades\UtilityFacades::getsettings('STRIPE_SECRET')) && (Auth::user()->type == 'Super Admin'))
                        <div class="col-md-12">
                            <br>
                            <div class="alert alert-warning">{{ __('Please Set your Stripe key & Stripe Secret') }} - <a
                                    href="{{ route('setting', 'stripe-setting') }}">{{ __('Click') }}</a> </div>
                        </div>
                    @endif
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="users">

                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">

                                    <div class="card-header">
                                        <h4>{{ __('Total Users') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $user }}
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                @endif
                @if (tenant('id') == null)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="plans">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>{{ __('Plans') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $plan }}
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                @endif

                @if (tenant('id') != null)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="roles">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>{{ __('Roles') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $role }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @if (tenant('id') != null)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="plans">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>{{ __('Plan Expired Date') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ Carbon::parse($plan_expired_date)->format('d/m/Y') }}
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                @endif
                @if (tenant('id') == null)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('manage.language', [$currantLang]) }}">

                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>{{ __('Language') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $languages }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @if (tenant('id') == null)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Earning') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ __('$') . ' ' . $earning }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if (tenant('id') == null)

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Statistics') }}</h4>
                                <div class="card-header-action">
                                    <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">

                                        <label class="btn  active" id="option1">
                                            <input id="option1" type="radio" name="options" autocomplete="off" checked="">
                                            {{ __('Week') }}
                                        </label> <label class="btn  " id="option2">
                                            <input id="option2" type="radio" name="options" autocomplete="off" checked="">
                                            {{ __('Month') }}
                                        </label>
                                        <label class="btn " id="option3">
                                            <input id="option3" type="radio" name="options" autocomplete="off">
                                            {{ __('Year') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" height="75"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (tenant('id') != null)

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('Statistics') }}</h4>
                                <div class="card-header-action">
                                    <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">

                                        <label class="btn  active" id="option1">
                                            <input id="option1" type="radio" name="options" autocomplete="off" checked="">
                                            {{ __('Week') }}
                                        </label> <label class="btn  " id="option2">
                                            <input id="option2" type="radio" name="options" autocomplete="off" checked="">
                                            {{ __('Month') }}
                                        </label>
                                        <label class="btn " id="option3">
                                            <input id="option3" type="radio" name="options" autocomplete="off">
                                            {{ __('Year') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart" height="75"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </section>
    </div>
@endsection
@push('javascript')

    @if (tenant('id') == null)
        <script>
            "use strict";

            var statistics_chart = document.getElementById("myChart").getContext('2d');

            var myChart = new Chart(statistics_chart, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: '{{ __('Total Earning') }}',
                        data: [],
                        borderWidth: 5,
                        borderColor: '#6777ef',
                        backgroundColor: 'transparent',
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#6777ef',
                        pointRadius: 4
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            // ticks: {
                            //     stepSize: 5
                            // }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: '#fbfbfb',
                                lineWidth: 2
                            }
                        }]
                    },
                }
            })
            getChartData('week');

            $(document).on("click", "#option3", function() {
                getChartData('year');
            });

            $(document).on("click", "#option2", function() {
                getChartData('month');
            });
            $(document).on("click", "#option1", function() {
                getChartData('week');
            });


            function getChartData(type) {
                $.ajax({
                    url: "{{ route('get.chart.data') }}",
                    type: 'POST',
                    data: {
                        type: type,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(result) {
                        myChart.data.labels = result.lable;
                        myChart.data.datasets[0].data = result.value;
                        myChart.update()
                    },
                    error: function(data) {
                        console.log(data.responseJSON);
                    }

                });
            }
        </script>
    @endif
    @if (tenant('id') != null)

        <script>
            "use strict";

            var statistics_chart = document.getElementById("myChart").getContext('2d');

            var myChart = new Chart(statistics_chart, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: '{{ __('Total Users') }}',
                        data: [],
                        borderWidth: 5,
                        borderColor: '#6777ef',
                        backgroundColor: 'transparent',
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#6777ef',
                        pointRadius: 4
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false,
                                drawBorder: false,
                            },
                            ticks: {
                                stepSize: 5
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: '#fbfbfb',
                                lineWidth: 2
                            }
                        }]
                    },
                }
            })
            getChartData('week');

            $(document).on("click", "#option3", function() {
                getChartData('year');
            });

            $(document).on("click", "#option2", function() {
                getChartData('month');
            });
            $(document).on("click", "#option1", function() {
                getChartData('week');
            });


            function getChartData(type) {
                $.ajax({
                    url: "{{ route('get.chart.data') }}",
                    type: 'POST',
                    data: {
                        type: type,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(result) {
                        myChart.data.labels = result.lable;
                        myChart.data.datasets[0].data = result.value;
                        myChart.update()
                    },
                    error: function(data) {
                        console.log(data.responseJSON);
                    }

                });
            }
        </script>
    @endif
@endpush
