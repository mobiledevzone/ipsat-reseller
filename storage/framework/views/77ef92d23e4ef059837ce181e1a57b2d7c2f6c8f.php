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
                                            class="nav-link active"><?php echo e(__('Storage')); ?></a></li>
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
                        <form id="setting-form" action="<?php echo e(route('settings/s3-setting/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4> <?php echo e($t); ?></h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="status_toggle"><?php echo e(__('Local')); ?></label>
                                            <label class="custom-radio col-3 mt-2 ">
                                                <input name="settingtype" class="custom-switch-input" type="radio"
                                                    value="local" checked
                                                    <?php echo e(Utility::getsettings('settingtype') == 'local' ? 'checked' : 'unchecked'); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                            <label for="status_toggle"><?php echo e(__('S3 setting')); ?></label>
                                            <label class="custom-radio col-3 mt-2 ">
                                                <input name="settingtype" class="custom-switch-input" type="radio"
                                                    value="s3"
                                                    <?php echo e(Utility::getsettings('settingtype') == 's3' ? 'checked' : 'unchecked'); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div id="s3"
                                        class="desc <?php echo e(Utility::getsettings('settingtype') == 's3' ? 'block' : 'd-none'); ?>">
                                        <p class="text-muted"> <?php echo e(__('S3 Setting')); ?></p>
                                        <div class="">
                                        <div class=" row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="s3_key"><?php echo e(__('S3 Key')); ?></label>
                                                    <input type="text" name="s3_key" class="form-control"
                                                        value="<?php echo e(Utility::getsettings('s3_key')); ?>"
                                                        placeholder="<?php echo e(__('S3 Key')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="s3_secret"><?php echo e(__('S3 Secret')); ?></label>
                                                    <input type="text" name="s3_secret" class="form-control"
                                                        value="<?php echo e(Utility::getsettings('s3_secret')); ?>"
                                                        placeholder="<?php echo e(__('S3 Secret')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="s3_region"><?php echo e(__('S3 Region')); ?></label>
                                                    <input type="text" name="s3_region" class="form-control"
                                                        value="<?php echo e(Utility::getsettings('s3_region')); ?>"
                                                        placeholder="<?php echo e(__('S3 Region')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="s3_bucket"><?php echo e(__('S3 Bucket')); ?></label>
                                                    <input type="text" name="s3_bucket" class="form-control"
                                                        value="<?php echo e(Utility::getsettings('s3_bucket')); ?>"
                                                        placeholder="<?php echo e(__('S3 Bucket')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="s3_url"><?php echo e(__('S3 URL')); ?></label>
                                                    <input type="text" name="s3_url" class="form-control"
                                                        value="<?php echo e(Utility::getsettings('s3_url')); ?>"
                                                        placeholder="<?php echo e(__('S3 URL')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="s3_endpoint"><?php echo e(__('S3 Endpoint')); ?></label>
                                                    <input type="text" name="s3_endpoint" class="form-control"
                                                        value="<?php echo e(Utility::getsettings('s3_endpoint')); ?>"
                                                        placeholder="<?php echo e(__('S3 Endpoint')); ?>">
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
<?php $__env->startPush('javascript'); ?>
    <script>
        $(document).on('click', "input[name='settingtype']", function() {
            var test = $(this).val();
            if (test == 's3') {
                $("#s3").fadeIn(500);
                $("#s3").removeClass('d-none');
            } else {
                $("#s3").fadeOut(500);
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/settings/storage-setting.blade.php ENDPATH**/ ?>