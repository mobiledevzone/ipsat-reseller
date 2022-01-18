 <script>
<?php if( session('failed')): ?>
    iziToast.error({
        title: '<?php echo e(__('Error!')); ?>',
        message: "<?php echo e(session('failed')); ?>",
        position: 'topRight'
    });
<?php endif; ?>

<?php if( session('errors')): ?>
    iziToast.error({
        title: '<?php echo e(__('Error!')); ?>',
        message: "<?php echo e(session('errors')); ?>",
        position: 'topRight'
    });
<?php endif; ?>

<?php if( session('successful')): ?>
    iziToast.success({
        title: '<?php echo e(__('Success')); ?>',
        message: '<?php echo e(session("successful")); ?>',
        position: 'topRight'
    });
<?php endif; ?>

<?php if( session('success')): ?>
    iziToast.success({
        title: '<?php echo e(__('Success')); ?>',
        message: '<?php echo e(session("success")); ?>',
        position: 'topRight'
    });
<?php endif; ?>
<?php if( session('warning')): ?>
    iziToast.warning({
        title: '<?php echo e(__('Ohh!')); ?>',
        message: '<?php echo e(session("warning")); ?>',
        position: 'topRight'
    });
<?php endif; ?>
</script>
<script>
<?php if(session('status')): ?>
    iziToast.info({
    title: '<?php echo e(__('Information')); ?>',
    message: '<?php echo e(session("status")); ?>',
    position: 'topRight'
  });
<?php endif; ?>
</script>


<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/layouts/includes/alerts.blade.php ENDPATH**/ ?>