<?php $__env->startSection('title', __('Edit module')); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Edit Module')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1> <?php echo e(__('Edit Module')); ?>

                </h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('modules.index')); ?>"><?php echo e(__('Modules')); ?></a>
                    </div>
                    <div class="breadcrumb-item"> <?php echo e(__('Edit Module')); ?>

                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-4 m-auto">
                        <div class="card p-4">
                            <form class="form-horizontal" method="POST"
                                action="<?php echo e(route('modules.update', $module->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="form-group">
                                    <label for="name"><?php echo e(__('Name')); ?></label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e($module->name); ?>"
                                        placeholder="<?php echo e(__('Name')); ?>" required>
                                    <?php if($errors->has('module')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('module')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <a href="<?php echo e(route('modules.index')); ?>"
                                    class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                                <button type="submit" class="btn btn-primary  "><?php echo e(__('Update')); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/module/edit.blade.php ENDPATH**/ ?>