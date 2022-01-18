<?php $__env->startSection('title', __('Create user')); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Create Users')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('users.index')); ?>"><?php echo e(__('Users')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Create Users')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            <?php echo Form::open(['route' => 'users.store', 'method' => 'Post', 'enctype' => 'multipart/form-data']); ?>

                            <div class="form-group ">
                                <?php echo e(Form::label('name', __('Name'))); ?>

                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <?php echo Form::text('name', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Name')]); ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('email', __('Email'))); ?>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                    <?php echo Form::text('email', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Email Address')]); ?>

                                </div>
                            </div>
                            <div class="form-group ">
                                <?php echo e(Form::label('password', __('Password'))); ?>

                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <?php echo Form::password('password', ['class' => 'form-control', ' required', 'placeholder' => __('Enter Password')]); ?>

                                </div>
                            </div>
                            <div class="form-group ">
                                <?php echo e(Form::label('confirm-password', __('Confirm Password'))); ?>

                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                    <?php echo e(Form::password('confirm-password', ['class' => 'form-control', ' required', 'placeholder' => __('Enter Confirm Password')])); ?>

                                </div>
                            </div>
                            <?php if(tenant('id') != null): ?>
                                <div class="form-group">
                                    <?php echo e(Form::label('roles', __('Role'))); ?>

                                    <div class="input-group ">
                                        <?php echo Form::select('roles', $roles, null, ['class' => 'form-control']); ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                            <div class="form-group">
                                <?php echo e(Form::label('domains', __('Domain'))); ?>

                                <div class="input-group ">
                                    <?php echo Form::text('domains', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter domain name')]); ?>

                                </div>
                                <span><?php echo e(__('how to add-on domain in your hosting panel.')); ?><a href="<?php echo e(Storage::url('pdf/adddomain.pdf')); ?>" class="m-2" target="_blank"><?php echo e(__('Document')); ?></a></span>
                            </div>
                            <?php endif; ?>
                            <div class="btn-flt">
                                <a href="<?php echo e(route('users.index')); ?>" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/users/create.blade.php ENDPATH**/ ?>