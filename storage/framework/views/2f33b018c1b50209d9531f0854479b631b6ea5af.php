<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <a class="navbar-brand smooth"
                    href="<?php echo e(route('landingpage')); ?>"><?php echo e(Utility::getsettings('app_name')); ?></a>
                <div class="pr-lg-5">
                    <p> <?php echo (Utility::getsettings('footer_page_content')); ?></p>

                    <p>&copy;<?php echo e(Utility::getsettings('app_name')); ?>. <?php echo e(__('With')); ?> <i
                            class="fas fa-heart text-danger"></i>
                        <?php echo e(__('from India')); ?></p>
                    <div class="mt-4 social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">

                    <div class="col-md-9">
                        <ul>
                            <h4><?php echo e(__('Company')); ?></h4>
                            <li><a href="<?php echo e(route('privacypolicy')); ?>"><?php echo e(__('Privacy Policy')); ?></a></li>
                            <li><a href="<?php echo e(route('contactus')); ?>"><?php echo e(__('Contact Us')); ?></a></li>
                            <li><a href="<?php echo e(route('termsandconditions')); ?>"><?php echo e(__('Terms And Conditions')); ?></a></li>
                            <li><a href="<?php echo e(route('faq')); ?>"><?php echo e(__('FAQs')); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


<script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/popper.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/modules/izitoast/js/iziToast.min.js')); ?>"></script>
<?php echo $__env->make('layouts.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/layouts/front_footer.blade.php ENDPATH**/ ?>