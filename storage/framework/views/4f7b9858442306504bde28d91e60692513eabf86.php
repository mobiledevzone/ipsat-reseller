<?php
use Carbon\Carbon;
$users = \Auth::user();
$currantLang = $users->currentLanguage();
?>

<?php $__env->startSection('title', __('Dashboard')); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/jqvmap/dist/jqvmap.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Dashboard')); ?></h1>
                <div class="section-header-breadcrumb">
                </div>
            </div>
            <div class="row">
                <?php if(tenant('id') == null): ?>
                    <?php if(!env('STRIPE_KEY') || !env('STRIPE_SECRET')): ?>
                        <div class="col-12">
                            <br>
                            <div class="alert alert-warning"><?php echo e(__('Please Set your Stripe key & Stripe Secret')); ?> - <a
                                    href="<?php echo e(route('setting', 'stripe-setting')); ?>"><?php echo e(__('Click')); ?></a> </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="users">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">

                                    <div class="card-header">
                                        <h4><?php echo e(__('Total Admin')); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e($user); ?>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(tenant('id') != null): ?>
                    <?php if((!\App\Facades\UtilityFacades::getsettings('STRIPE_KEY') || !\App\Facades\UtilityFacades::getsettings('STRIPE_SECRET')) && (Auth::user()->type == 'Super Admin')): ?>
                        <div class="col-md-12">
                            <br>
                            <div class="alert alert-warning"><?php echo e(__('Please Set your Stripe key & Stripe Secret')); ?> - <a
                                    href="<?php echo e(route('setting', 'stripe-setting')); ?>"><?php echo e(__('Click')); ?></a> </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="users">

                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">

                                    <div class="card-header">
                                        <h4><?php echo e(__('Total Users')); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e($user); ?>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                <?php endif; ?>
                <?php if(tenant('id') == null): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="plans">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo e(__('Plans')); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e($plan); ?>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                <?php endif; ?>

                <?php if(tenant('id') != null): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="roles">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo e(__('Roles')); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e($role); ?>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(tenant('id') != null): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="plans">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo e(__('Plan Expired Date')); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e(Carbon::parse($plan_expired_date)->format('d/m/Y')); ?>

                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                <?php endif; ?>
                <?php if(tenant('id') == null): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href="<?php echo e(route('manage.language', [$currantLang])); ?>">

                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo e(__('Language')); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo e($languages); ?>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if(tenant('id') == null): ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4><?php echo e(__('Earning')); ?></h4>
                                </div>
                                <div class="card-body">
                                    <?php echo e(__('$') . ' ' . $earning); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(tenant('id') == null): ?>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Statistics')); ?></h4>
                                <div class="card-header-action">
                                    <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">

                                        <label class="btn  active" id="option1">
                                            <input id="option1" type="radio" name="options" autocomplete="off" checked="">
                                            <?php echo e(__('Week')); ?>

                                        </label> <label class="btn  " id="option2">
                                            <input id="option2" type="radio" name="options" autocomplete="off" checked="">
                                            <?php echo e(__('Month')); ?>

                                        </label>
                                        <label class="btn " id="option3">
                                            <input id="option3" type="radio" name="options" autocomplete="off">
                                            <?php echo e(__('Year')); ?>

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
            <?php endif; ?>

            <?php if(tenant('id') != null): ?>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Statistics')); ?></h4>
                                <div class="card-header-action">
                                    <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">

                                        <label class="btn  active" id="option1">
                                            <input id="option1" type="radio" name="options" autocomplete="off" checked="">
                                            <?php echo e(__('Week')); ?>

                                        </label> <label class="btn  " id="option2">
                                            <input id="option2" type="radio" name="options" autocomplete="off" checked="">
                                            <?php echo e(__('Month')); ?>

                                        </label>
                                        <label class="btn " id="option3">
                                            <input id="option3" type="radio" name="options" autocomplete="off">
                                            <?php echo e(__('Year')); ?>

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
            <?php endif; ?>

        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('javascript'); ?>

    <?php if(tenant('id') == null): ?>
        <script>
            "use strict";

            var statistics_chart = document.getElementById("myChart").getContext('2d');

            var myChart = new Chart(statistics_chart, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: '<?php echo e(__('Total Earning')); ?>',
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
                    url: "<?php echo e(route('get.chart.data')); ?>",
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
    <?php endif; ?>
    <?php if(tenant('id') != null): ?>

        <script>
            "use strict";

            var statistics_chart = document.getElementById("myChart").getContext('2d');

            var myChart = new Chart(statistics_chart, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: '<?php echo e(__('Total Users')); ?>',
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
                    url: "<?php echo e(route('get.chart.data')); ?>",
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
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/dashboard/home.blade.php ENDPATH**/ ?>