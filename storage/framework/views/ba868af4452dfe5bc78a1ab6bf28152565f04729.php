<?php $__env->startSection('title', __('Settings')); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Settings')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Settings')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title"><?php echo e(__('Overview')); ?></h2>
                <p class="section-lead">
                    <?php echo e(__('Organize and adjust all settings about this site.')); ?>

                </p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(__('App Setting')); ?></h4>
                                <p><?php echo e(__('Logo & App Name Setting')); ?></p>
                                <a href="<?php echo e(route('setting', 'app-setting')); ?>"
                                    class="card-cta"><?php echo e(__('Change Setting')); ?> <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fab fa-aws"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(__('Storage Setting')); ?></h4>
                                <p><?php echo e(__('AWS,S3 Storage Configuration')); ?></p>
                                <a href="<?php echo e(route('setting', 'storage-setting')); ?>"
                                    class="card-cta"><?php echo e(__('Change Setting')); ?> <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(__('Email')); ?></h4>
                                <p><?php echo e(__('Email SMTP settings, notifications and others related to email.')); ?></p>
                                <a href="<?php echo e(route('setting', 'mail-setting')); ?>"
                                    class="card-cta"><?php echo e(__('Change Setting')); ?> <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(__('Chat Setting')); ?></h4>
                                <p><?php echo e(__('Pusher Setting')); ?></p>
                                <a href="<?php echo e(route('setting', 'chat-setting')); ?>"
                                    class="card-cta"><?php echo e(__('Change Setting')); ?> <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(__('General')); ?></h4>
                                <p><?php echo e(__('General Setting')); ?></p>
                                <a href="<?php echo e(route('setting', 'general-setting')); ?>"
                                    class="card-cta"><?php echo e(__('Change Setting')); ?> <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php if(\Auth::user()->type == 'Super Admin'): ?>
                    <div class="col-lg-6">
                        <div class="card card-large-icons">
                            <div class="card-icon bg-primary text-white">
                                <i class="fab fa-stripe"></i>
                            </div>
                            <div class="card-body">
                                <h4><?php echo e(__('Stripe')); ?></h4>
                                <p><?php echo e(__('Stripe Setting')); ?></p>
                                <a href="<?php echo e(route('setting', 'stripe-setting')); ?>"
                                    class="card-cta"><?php echo e(__('Change Setting')); ?> <i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/settings/index.blade.php ENDPATH**/ ?>