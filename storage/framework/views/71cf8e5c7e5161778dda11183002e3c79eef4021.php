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
                                            class="nav-link active"><?php echo e(__('Email')); ?></a></li>
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
                        <form id="setting-form" action="<?php echo e(route('settings/email-setting/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4> <?php echo e($t); ?></h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted"> <?php echo e(__('Email Setting')); ?></p>
                                    <div class="">
                                        <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Mail Mailer')); ?></label>
                                                <input type="text" name="mail_mailer" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_mailer')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Mailer')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Mail Host')); ?></label>
                                                <input type="text" name="mail_host" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_host')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Host')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Mail Port')); ?></label>
                                                <input type="text" name="mail_port" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_port')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Port')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Mail Username')); ?></label>
                                                <input type="email" name="mail_username" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_username')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Username')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Mail Password')); ?></label>
                                                <input type="password" name="mail_password" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_password')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Password')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Mail Encryption')); ?></label>
                                                <input type="text" name="mail_encryption" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_encryption')); ?>" required
                                                    placeholder="<?php echo e(__('Mail Encryption')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Mail From Address')); ?></label>
                                                <input type="text" name="mail_from_address" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_from_address')); ?>" required
                                                    placeholder="<?php echo e(__('Mail From Address')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name"><?php echo e(__('Mail From Name')); ?></label>
                                                <input type="text" name="mail_from_name" class="form-control"
                                                    value="<?php echo e(Utility::getsettings('mail_from_name')); ?>" required
                                                    placeholder="<?php echo e(__('Mail From Name')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <input type="hidden" name="tenant_id" value="<?php echo e(tenant('id')); ?>">
                                <button class="btn btn-primary" type="submit"
                                    id="save-btn"><?php echo e(__('Save Changes')); ?></button>
                                    <a class="btn  btn-info" href="<?php echo e(route('setting', 'test-mail')); ?>">
                                        <?php echo e(__('Send Test Mail')); ?></a>

                                <a href="<?php echo e(route('settings')); ?>" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/settings/mail-setting.blade.php ENDPATH**/ ?>