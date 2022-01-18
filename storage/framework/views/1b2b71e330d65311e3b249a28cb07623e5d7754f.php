<?php $__env->startSection('title', __('Domain Request')); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Domain Request List')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Domain Request')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row ">
                    <div class="col-12">
                        <div class="card py-2 px-3 pb-3 mt-3">
                            <div class="table-responsive py-4 pb-5" style="padding-top: 50px !important">
                                <?php echo e($dataTable->table(['width' => '100%'])); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <?php echo $__env->make('layouts.includes.datatable_css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('javascript'); ?>
    <?php echo $__env->make('layouts.includes.datatable_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo e($dataTable->scripts()); ?>

    <script>
    $(function() {
        $('body').on('click', '.reason', function() {
            var action = $(this).data('action');
            var modal = $('#common_modal');
            $.get(action, function(response) {
                modal.find('.modal-title').html('<?php echo e(__('Disapprove Reason')); ?>');
                modal.find('.modal-body').html(response.html);
                modal.modal('show');
            })
        });
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/requestdomain/index.blade.php ENDPATH**/ ?>