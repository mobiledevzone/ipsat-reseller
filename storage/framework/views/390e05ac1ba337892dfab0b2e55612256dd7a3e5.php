<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card card-primary">
        <div class="card-header">
            <h4><?php echo e(__('Login')); ?></h4>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="email"><?php echo e(__('E-Mail Address')); ?></label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                        autocomplete="email" autofocus>
                </div>
                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label"><?php echo e(__('Password')); ?></label>
                        <div class="float-right">
                            <?php if(Route::has('password.request')): ?>
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required
                        autocomplete="current-password">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me"><?php echo e(__('Remember Me')); ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        <?php echo e(__('Login')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php if(tenant()): ?>
    <div class="mt-5 text-muted text-center">
        <?php echo e(__('Donot have an account?')); ?> <a href="<?php echo e(route('register')); ?>"><?php echo e(__('Create One')); ?></a>
    </div>
    <?php endif; ?>
    <div class="simple-footer">
        © 2021 <?php echo e(config('app.name')); ?>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/auth/login.blade.php ENDPATH**/ ?>