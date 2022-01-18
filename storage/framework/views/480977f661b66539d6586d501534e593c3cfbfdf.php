<?php
$lang = \App\Facades\UtilityFacades::getValByName('default_language');
?>

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
                                            class="nav-link "><?php echo e(__('Chat')); ?></a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('setting', 'general-setting')); ?>"
                                            class="nav-link active"><?php echo e(__('General')); ?></a></li>
                                    <?php if(\Auth::user()->type == 'Super Admin'): ?>
                                        <li class="nav-item "><a href="<?php echo e(route('setting', 'stripe-setting')); ?>"
                                                                 class="nav-link"><?php echo e(__('Stripe')); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form id="setting-form" action="<?php echo e(route('settings/auth-settings/update')); ?>"
                            enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4> <?php echo e($t); ?></h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted"> <?php echo e(__('General Setting')); ?></p>
                                    <div class="">
                                        <div class=" row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <div class="col-md-8">
                                                    <strong
                                                        class="d-block"><?php echo e(__('Two Factor Authentication')); ?></strong>
                                                    <?php echo e(!Utility::getsettings('2fa') ? 'Activate' : 'Deactivate'); ?>

                                                    <?php echo e(__('Two Factor Authentication')); ?>

                                                </div>
                                                <div class="col-md-4">
                                                    <label class="custom-switch mt-2  custom-left float-right">
                                                        <input name="two_factor_auth" class="custom-switch-input"
                                                            type="checkbox"
                                                            <?php echo e(Utility::getsettings('2fa') ? 'checked' : 'unchecked'); ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </div>
                                                <?php if(!extension_loaded('imagick')): ?>
                                                    <small>
                                                        <?php echo e(__('Note: for 2FA your server must have Imagick.')); ?> <a
                                                            href="https://www.php.net/manual/en/book.imagick.php"
                                                            target="_new"><?php echo e(__('Imagick Document')); ?></a>
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <strong class="d-block"><?php echo e(__('RTL Setting')); ?></strong>
                                        <?php echo e(Utility::getsettings('rtl') == '0' ? __('Activate') : __('Deactivate')); ?>

                                        <?php echo e(__('RTL setting for application.')); ?>

                                    </div>
                                    <div class="col-md-4">
                                        <label class="custom-switch custom-left  mt-2 float-right">
                                            <input name="rtl_setting" class="custom-switch-input" type="checkbox"
                                                <?php echo e(Utility::getsettings('rtl') == '1' ? 'checked' : 'unchecked'); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label for="name"><?php echo e(__('Default Language')); ?></label>
                                        <select name="default_language" id="default_language" class="form-control select2">
                                            <?php $__currentLoopData = \App\Facades\UtilityFacades::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e($language); ?>">
                                                    <?php echo e(Str::upper($language)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date_format"><?php echo e(__('Date Format')); ?></label>
                                    <select name="date_format" class="form-control">
                                        <option value="M j, Y"
                                            <?php echo e(Utility::getsettings('date_format') == 'M j, Y' ? 'selected' : ''); ?>>
                                            <?php echo e(__('Jan 1, 2020')); ?></option>
                                        <option value="d-M-y"
                                            <?php echo e(Utility::getsettings('date_format') == 'd-M-y' ? 'selected' : ''); ?>>
                                            <?php echo e(__('01-Jan-20')); ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="time_format"><?php echo e(__('Time Format')); ?></label>
                                    <select name="time_format" class="form-control">
                                        <option value="g:i A"
                                            <?php echo e(Utility::getsettings('time_format') == 'g:i A' ? 'selected' : ''); ?>>
                                            <?php echo e(__('hh:mm AM/PM')); ?></option>
                                        <option value="H:i:s"
                                            <?php echo e(Utility::getsettings('time_format') == 'H:i:s' ? 'selected' : ''); ?>>
                                            <?php echo e(__('HH:mm:ss')); ?></option>
                                    </select>
                                </div>
                                 <?php if(\Auth::user()->type == 'Super Admin'): ?>
                                <div class="form-group">
                                    <label for="name"><?php echo e(__('Currency Name')); ?></label>
                                    <input type="text" name="currency" class="form-control"
                                        value="<?php echo e(Utility::getsettings('currency')); ?>" required
                                        placeholder="<?php echo e(__('Currency name')); ?>">
                                        <p><?php echo e(__('The name of currency is to be taken frome this document.')); ?> <a href="https://stripe.com/docs/currencies" class="m-2" target="_blank"><?php echo e(__('Document')); ?></a> </p>
                                </div>
                                <div class="form-group">
                                    <label for="name"><?php echo e(__('Currency Symbol')); ?></label>
                                    <input type="text" name="currency_symbol" class="form-control"
                                        value="<?php echo e(Utility::getsettings('currency_symbol')); ?>" required
                                        placeholder="<?php echo e(__('currency Symbol')); ?>">
                                </div>
                                <?php endif; ?>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/settings/general-setting.blade.php ENDPATH**/ ?>