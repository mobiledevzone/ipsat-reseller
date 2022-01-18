<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(Utility::getsettings('rtl') == '1' ? 'rtl' : ''); ?>"
    lan="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(Utility::getsettings('app_name')); ?></title>
    <link rel="icon" href="<?php echo e(Utility::getpath('logo/app-favicon-logo.png')); ?>" type="image/png">


    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fontawesome/css/all.min.css')); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/weather-icon/css/weather-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/weather-icon/css/weather-icons-wind.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/summernote/summernote-bs4.css')); ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/izitoast/css/iziToast.min.css ')); ?>">
    <?php if(Utility::getsettings('rtl') == '1'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>
    <?php echo $__env->yieldPushContent('css'); ?>

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="modal fade" role="dialog" id="common_modal">
                <div class="modal-dialog " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/sweetalert/sweetalert.min.js')); ?>"></script>
    <!-- JS Libraies -->
    <script src="<?php echo e(asset('assets/modules/simple-weather/jquery.simpleWeather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/chart.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/modules/summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/modules/izitoast/js/iziToast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.inputmask.bundle.js')); ?>"></script>
    <?php echo $__env->make('layouts.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('javascript'); ?>
</body>

</html>
<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/layouts/main.blade.php ENDPATH**/ ?>