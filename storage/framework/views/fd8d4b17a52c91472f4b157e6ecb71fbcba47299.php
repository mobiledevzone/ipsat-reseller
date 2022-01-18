<?php
$currency = tenancy()->central(function ($tenant) {
    return Utility::getsettings('currency_symbol');
});
?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<!DOCTYPE html>
<html lang="en">




<?php echo $__env->make('layouts.front_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="hero-wrapper" id="top">
    <div class="hero">
        <div class="container">
            <div class="text text-center text-lg-left">
                <h1><?php echo e(__('Tenancy for Laravel')); ?></h1>
                <p class="lead">
                    <?php echo e(__('A flexible multi-tenancy package for Laravel. Single & multi-database tenancy, automatic &
                    manual mode, event-based architecture. Integrates perfectly with other packages.')); ?>

                </p>

            </div>
            <div class="image d-none d-lg-block">
                <img src="<?php echo e(asset('css/landing/ill.svg')); ?>" alt="img">
            </div>
        </div>
    </div>
</div>

<section id="design" class="section-design">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block">
                <img src="<?php echo e(asset('assets/img/undraw_processing_qj6a.svg')); ?>" alt="user flow"
                    class="img-fluid">
            </div>
            <div class="col-lg-7 pl-lg-5 col-md-12">
                <h2><?php echo e(__('Save your time for other')); ?> <span class="text-primary"><?php echo e(__('important things')); ?></span><?php echo e(__(', not')); ?> <span
                        class="text-primary"><?php echo e(__('dashboard')); ?></span> <?php echo e(__('design')); ?></h2>
                <p class="lead"><?php echo e(__('Your idea has other things that need to be prioritized, do not waste your
                    time only on the dashboard design. will speed up your project to design a clean dashboard
                    interface.')); ?></p>
                <div class="mt-4">

                </div>
            </div>
        </div>
    </div>
</section>



<section id="components" class="section-design section-design-right">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 pr-lg-5 pr-0">
                <h2><?php echo e(__('Where')); ?> <span class="text-primary">does</span> it <span class="text-primary">come</span> from?
                    <span class="text-primary"></span>

                    <p class="lead"><?php echo e(__('Contrary to popular belief, Lorem Ipsum is not simply random text.
                        It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years
                        old.
                        Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one
                        of the more obscure Latin words,
                        consectetur, from a Lorem Ipsum passage, and going through the cites of the word in
                        classical literature, discovered the undoubtable source.
                        Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                        Extremes of Good and Evil) by Cicero, written in 45 BC.
                        This book is a treatise on the theory of ethics, very popular during the Renaissance. The
                        first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                        comes from a line in section 1.10.32.')); ?></p>
                    <div class="mt-4">

                    </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div class="abs-images">
                    <img src="<?php echo e(asset('assets/img/countries.png')); ?>" alt="user flow"
                        class="img-fluid rounded dark-shadow">
                    <img src="<?php echo e(asset('assets/img/ticket.png')); ?>" alt="user flow"
                        class="img-fluid rounded dark-shadow">
                    <img src="<?php echo e(asset('assets/img/user.png')); ?>" alt="user flow"
                        class="img-fluid rounded dark-shadow">
                </div>
            </div>
        </div>
    </div>
</section>



<section id="support-us" class="support-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 d-none d-lg-block pr-lg-5 pr-sm-0">
                <div class="d-flex align-items-center h-100 justify-content-center abs-images-2">
                    <img src="<?php echo e(asset('assets/img/setting.png')); ?>" alt="image"
                        class="img-fluid rounded dark-shadow">
                    <img src="<?php echo e(asset('assets/img/plan.png')); ?>" alt="image" class="img-fluid rounded dark-shadow">
                    <img src="<?php echo e(asset('assets/img/dash.png')); ?>" alt="image" class="img-fluid rounded dark-shadow">
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <h2><?php echo e(__('Automatic tenancy')); ?> <span class="text-primary"></span></h2>
                <p class="lead"><?php echo e(__('Instead of forcing you to change how you write your code, the package by
                    default bootstraps tenancy automatically, in the background.
                    Database connections are switched, caches are separated, filesystems are prefixed, etc.')); ?></p>
                <ul class="list-icons">
                    <li>
                        <span class="card-icon bg-primary text-white">
                            <i class="fas fa-box-open"></i>
                        </span>
                        <span><?php echo e(__('Out of the box, the package makes the following things tenant-aware: databases,
                            caches, filesystems, queues, redis stores.
                            This means that if you have already written your app and are looking to make it
                            multi-tenant, you do not have to change anything!')); ?></span>
                    </li>
                    <li>
                        <span class="card-icon bg-primary text-white">
                            <i class="fas fa-fire"></i>
                        </span>
                        <span><?php echo e(__('Since the automatic mode changes the default database connection, most other packages
                            will use this connection too.')); ?> </span>
                    </li>
                    <li>
                        <span class="card-icon bg-primary text-white">
                            <i class="fas fa-stopwatch"></i>
                        </span>
                        <span><?php echo e(__('Many other tenancy packages have a terrible track record when it comes to testability.
                            We find that unacceptable.
                            With this package, you can test everything.')); ?> </span>
                    </li>
                    <li>
                        <span class="card-icon bg-primary text-white">
                            <i class="fas fa-heart"></i>
                        </span>
                        <span>
                            <?php echo e(__('Prefer specifying database connections instead of changing the default connection? No
                            problem, we have model traits prepared.')); ?></span>
                    </li>
                    <li>
                        <span class="card-icon bg-primary text-white">
                            <i class="fas fa-rocket"></i>
                        </span>
                        <span><?php echo e(__('Allowed to create a multi-tenant SaaS application.')); ?></span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>

<section class="download-section" class="bg-white" id="plans">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h2 class="section-title"><?php echo e(__('Pricing')); ?></h2>
                <p class="section-lead">
                    <?php echo e(__('Price components are very important for SaaS projects or other projects.')); ?></p>
            </div>

        </div>
    </div>
</section>

<section class="before-footer">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="pricing">
                        <div class="pricing-title">
                            <?php echo e($plan->name); ?>

                        </div>
                        <div class="pricing-padding">
                            <div class="pricing-price">
                                <div>
                                    <?php echo e($currency . '' . $plan->price); ?>

                                </div>
                                <div><?php echo e($plan->duration . ' ' . $plan->durationtype); ?></div>
                            </div>

                        </div>
                        <?php if($plan->id == 1): ?>

                            <div class="pricing-cta">

                                <a href="<?php echo e(route('requestdomain.create', Crypt::encrypt(['plan_id' => $plan->id]))); ?>"
                                    class="subscribe_plan" data-id="<?php echo e($plan->id); ?>"
                                    data-amount="<?php echo e($plan->price); ?>"><?php echo e(__('free')); ?>

                                    <i class="fas fa-arrow-right"></i></a>

                            </div>
                        <?php elseif($plan->id != 1): ?>

                            <div class="pricing-cta">

                                <a href="<?php echo e(route('requestdomain.create', Crypt::encrypt(['plan_id' => $plan->id]))); ?>"
                                    class="subscribe_plan" data-id="<?php echo e($plan->id); ?>"
                                    data-amount="<?php echo e($plan->price); ?>"><?php echo e(__('Subscribe')); ?>

                                    <i class="fas fa-arrow-right"></i></a>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<?php echo $__env->make('layouts.front_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>

</html>
<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/welcome.blade.php ENDPATH**/ ?>