<?php $__env->startSection('title', __('Create module')); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Create Module')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Create Module')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('modules.index')); ?>"><?php echo e(__('Modules')); ?></a>
                    </div>
                    <div class="breadcrumb-item"><?php echo e(__('Create Module')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            <form class="form-horizontal" method="POST" action="<?php echo e(route('modules.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="name"><?php echo e(__('Name')); ?></label>
                                    <input type="text" name="name" class="form-control" id="password"
                                        placeholder="<?php echo e(__('Name')); ?>" required>
                                    <?php if($errors->has('module')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('module')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="name"><?php echo e(__('Permission')); ?></label>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="managepermission" value="M">
                                        <label class="custom-control-label" for="managepermission">
                                            <?php echo e(__('Manage')); ?>

                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline ">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="createpermission" value="C">
                                        <label class="custom-control-label" for="createpermission">
                                            <?php echo e(__('Create')); ?>

                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="editpermission" value="E">
                                        <label class="custom-control-label" for="editpermission">
                                            <?php echo e(__('Edit')); ?>

                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="deletepermission" value="D">
                                        <label class="custom-control-label" for="deletepermission">
                                            <?php echo e(__('Delete')); ?>

                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" name="permissions[]" class="custom-control-input"
                                            id="showpermission" value="S">
                                        <label class="custom-control-label" for="showpermission">
                                            <?php echo e(__('Show')); ?>

                                        </label>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('modules.index')); ?>"
                                    class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                                <button type="submit" class="btn btn-primary   "><?php echo e(__('Create')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/module/create.blade.php ENDPATH**/ ?>