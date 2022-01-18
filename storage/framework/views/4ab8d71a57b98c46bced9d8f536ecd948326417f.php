<div class="dropdown d-inline">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <?php echo e(__('Action')); ?>

    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="<?php echo e(route('roles.show', $role->id)); ?>">
            <i class="fa fa-key"></i> <?php echo e(__('Add Permission')); ?>

        </a>
        <a class="dropdown-item" href="<?php echo e(route('roles.edit', $role->id)); ?>">
            <i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?>

        </a>
        <a href="#" class="dropdown-item  text-danger" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>"
            onclick="confirm('<?php echo e(__('Are You sure ?')); ?>')?document.getElementById('delete-form-<?php echo e($role->id); ?>').submit():'';"><i
                class="fas fa-trash"></i> <?php echo e(__('Delete')); ?></a>
        <?php echo Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'id' => 'delete-form-' . $role->id]); ?>

        <?php echo Form::close(); ?>


    </div>
</div>
<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/roles/action.blade.php ENDPATH**/ ?>