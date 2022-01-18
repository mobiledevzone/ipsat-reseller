<?php $__env->startSection('title', __($t)); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e($t); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><a href="<?php echo e(route('settings')); ?>"><?php echo e(__('Settings')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e($t); ?></div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title"><?php echo e(__('All About')); ?> <?php echo e($t); ?></h2>
                <p class="section-lead">
                    <?php echo e(__('You can adjust all ')); ?><?php echo e($t); ?> <?php echo e(__('here')); ?>

                </p>
                <div id="output-status"></div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo e(__('Jump To')); ?></h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item"><a href="<?php echo e(route('setting', 'app-setting')); ?>"
                                            class="nav-link active"><?php echo e(__('App Setting')); ?></a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('setting', 'storage-setting')); ?>"
                                            class="nav-link"><?php echo e(__('Storage')); ?></a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('setting', 'mail-setting')); ?>"
                                            class="nav-link"><?php echo e(__('Email')); ?></a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('setting', 'chat-setting')); ?>"
                                            class="nav-link"><?php echo e(__('Chat')); ?></a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('setting', 'general-setting')); ?>"
                                            class="nav-link"><?php echo e(__('General')); ?></a></li>
                                    <?php if(\Auth::user()->type == 'Super Admin'): ?>
                                    <li class="nav-item "><a href="<?php echo e(route('setting', 'stripe-setting')); ?>"
                                            class="nav-link"><?php echo e(__('Stripe')); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form id="setting-form" action="<?php echo e(route('settings/app-name/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4> <?php echo e($t); ?></h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted"> <?php echo e(__('App Name')); ?> <?php echo e(__('& App Logo')); ?></p>
                                    <div class="">
                                    <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('App application name')); ?> </label>
                                                <input type="text" name="app_name" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('app_name')); ?>"
                                                    placeholder="<?php echo e(__('App application name')); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group bg-light text-center">
                                                <img id="app-dark-logo"
                                                    class="img img-responsive my-5 w-100 justify-content-center text-center"
                                                    src="<?php echo e(Utility::getpath('logo/app-logo.png')); ?>" alt="App_logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Select Logo')); ?></label>
                                                <input type="file" name="app_logo" class="form-control"
                                                    value="Select Logo">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group bg-light text-center">
                                                <img id="app-dark-logo"
                                                    class="img img-responsive my-5 w-100 justify-content-center text-center"
                                                    src="<?php echo e(Utility::getpath('logo/app-small-logo.png')); ?>"
                                                    alt="app_small_logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Select small Logo')); ?></label>
                                                <input type="file" name="app_small_logo" class="form-control"
                                                    value="Select Small  Logo">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group bg-light text-center">
                                                <img id="app-dark-logo"
                                                    class="img img-responsive my-5 w-100 justify-content-center text-center"
                                                    src="<?php echo e(Utility::getpath('logo/app-favicon-logo.png')); ?>"
                                                    alt="favicon_logo">
                                            </div>
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Select favicon Logo')); ?></label>
                                                <input type="file" name="favicon_logo" class="form-control"
                                                    value="Select Favicon Logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" type="submit"
                                    id="save-btn"><?php echo e(__('Save Changes')); ?></button>
                                <a href="<?php echo e(route('settings')); ?>" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/settings/app-setting.blade.php ENDPATH**/ ?>