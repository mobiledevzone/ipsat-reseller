<?php $__env->startSection('title', __('Edit user')); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Edit User')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('users.index')); ?>"><?php echo e(__('Users')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Edit User')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            <?php echo Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'Put', 'enctype' => 'multipart/form-data']); ?>

                            <div class="form-group ">
                                <?php echo e(Form::label('name', __('Name'))); ?>

                                <div class="input-group ">
                                     
                                    <?php echo Form::text('name', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Name')]); ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo e(Form::label('email', __('Email'))); ?>

                                <div class="input-group">
                                     
                                    <?php echo Form::text('email', null, ['class' => 'form-control', ' required', 'placeholder' => __('Enter Email Address')]); ?>

                                </div>
                            </div>
                            <?php if(tenant('id') != null && $user->type != 'Admin'): ?>
                                <div class="form-group">
                                    <?php echo e(Form::label('roles', __('Role'))); ?>

                                    <div class="input-group ">

                                        <?php echo Form::select('roles', $roles, $user->type, ['class' => 'form-control', 'id' => 'role']); ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                            <div class="form-group" id="domain">
                                <?php echo e(Form::label('domains', __('Domain'))); ?>

                                <div class="input-group ">
                                    <?php echo Form::text('domains', isset($user_domain->domain) ? $user_domain->domain : '', ['class' => 'form-control', 'id' => 'domain', ' required', 'placeholder' => __('Enter domain name')]); ?>

                                </div>
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
<?php $__env->startPush('javascript'); ?>
    <script>
        $(document).on('change', '#role', function() {
            var roles = $(this).val();
            if (roles == 'Super Admin') {
                $('#domain').hide();
                $('#domain').val('');

            } else {
                $('#domain').show();
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/users/edit.blade.php ENDPATH**/ ?>