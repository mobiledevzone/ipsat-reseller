<div class="dropdown d-inline">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <?php echo e(__('Action')); ?>

    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="plans/<?php echo e($plan->id); ?>/edit" id="edit-user"
            data-action="plans/<?php echo e($plan->id); ?>/edit"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item  text-danger" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>"
            onclick="confirm('<?php echo e(__('Are You sure ?')); ?>')?document.getElementById('delete-form-<?php echo e($plan->id); ?>').submit():'';"><i
                class="fas fa-trash"></i> <?php echo e(__('Delete')); ?></a>
        <?php echo Form::open(['method' => 'DELETE', 'route' => ['plans.destroy', $plan->id], 'id' => 'delete-form-' . $plan->id]); ?>

        <?php echo Form::close(); ?>

    </div>
</div>
<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/plans/action.blade.php ENDPATH**/ ?>