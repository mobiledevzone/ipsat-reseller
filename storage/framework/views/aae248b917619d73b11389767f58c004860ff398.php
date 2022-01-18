<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(Utility::getsettings('app_name')); ?></title>
    <link rel="icon" href="<?php echo e(Utility::getpath(Utility::getsettings('favicon_logo'))); ?>" type="image/png">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fontawesome/css/all.min.css')); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap-social/bootstrap-social.css')); ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/izitoast/css/iziToast.min.css ')); ?>">
<?php echo $__env->yieldPushContent('css '); ?>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?php echo e(Utility::getpath(Utility::getsettings('app_logo'))); ?>" alt="logo" width="200">
                        </div>

                        <?php echo $__env->yieldContent('content'); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/izitoast/js/iziToast.min.js')); ?>"></script>

    <?php echo $__env->make('layouts.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('javascript'); ?>
</body>

</html>
<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/layouts/app.blade.php ENDPATH**/ ?>