<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(Utility::getsettings('app_name')); ?></title>
    <link rel="icon" href="<?php echo e(Utility::getpath(Utility::getsettings('favicon_logo'))); ?>" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fontawesome/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/landing/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/landing/landstyle.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/izitoast/css/iziToast.min.css ')); ?>">

</head>

<body class="">
    <nav class="navbar navbar-reverse navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand smooth"
                href="<?php echo e(route('landingpage')); ?>"><?php echo e(Utility::getsettings('app_name')); ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto align-items-lg-center d-block d-md-flex">
                    <li class="nav-item"><a href="<?php echo e(route('landingpage')); ?>" class="nav-link"><?php echo e(__('Home')); ?></a>
                    <li class="nav-item"><a href="<?php echo e(url('/')); ?>/#plans" class="nav-link"><?php echo e(__('Plans')); ?></a>
                    </li>
                    <li class="nav-item"><a href="<?php echo e(url('/home')); ?>" class="nav-link"
                            target="_blank"><?php echo e(__('Login')); ?></a></li>

                    </li>
                </ul>
            </div>
        </div>
    </nav><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/layouts/front_header.blade.php ENDPATH**/ ?>