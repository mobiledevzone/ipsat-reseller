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
                    <?php echo e(__('You can adjust all')); ?> <?php echo e($t); ?> <?php echo e(__('here')); ?>

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
                                            class="nav-link "><?php echo e(__('App Setting')); ?></a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('setting', 'storage-setting')); ?>"
                                            class="nav-link "><?php echo e(__('Storage')); ?></a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('setting', 'mail-setting')); ?>"
                                            class="nav-link "><?php echo e(__('Email')); ?></a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('setting', 'chat-setting')); ?>"
                                            class="nav-link active"><?php echo e(__('Chat')); ?></a></li>
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
                        <form id="setting-form" action="<?php echo e(route('settings/pusher-setting/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4> <?php echo e($t); ?></h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted"> <?php echo e(__('Pusher Setting')); ?> <a href="https://pusher.com/"
                                            class="m-2" target="_blank"><?php echo e(__('Document')); ?></a> </p>
                                    <div class="">
                                        <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Pusher App ID')); ?></label>
                                                <input type="text" name="pusher_id" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('pusher_id')); ?>" required
                                                    placeholder="<?php echo e(__('Pusher App ID')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Pusher Key')); ?></label>
                                                <input type="text" name="pusher_key" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('pusher_key')); ?>" required
                                                    placeholder="<?php echo e(__('Pusher Key')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Pusher Secret')); ?></label>
                                                <input type="text" name="pusher_secret" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('pusher_secret')); ?>" required
                                                    placeholder="<?php echo e(__('Pusher Secret')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Pusher Cluster')); ?></label>
                                                <input type="text" name="pusher_cluster" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('pusher_cluster')); ?>" required
                                                    placeholder="<?php echo e(__('Pusher Cluster')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <label for="status_toggle"><?php echo e(__('Status')); ?></label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="custom-switch mt-2 custom-left float-right">
                                                        <input name="pusher_status" class="custom-switch-input"
                                                            type="checkbox"
                                                            <?php echo e(Utility::getsettings('pusher_status') ? 'checked' : 'unchecked'); ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/settings/chat-setting.blade.php ENDPATH**/ ?>