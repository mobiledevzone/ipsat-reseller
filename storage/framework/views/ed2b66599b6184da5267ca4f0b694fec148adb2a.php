<div class="dropdown d-inline">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <?php echo e(__('Action')); ?>

    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="users/<?php echo e($user->id); ?>/edit" id="edit-user"
            data-action="users/<?php echo e($user->id); ?>/edit"><i class="fa fa-edit"></i> <?php echo e(__('Edit')); ?></a>

        <a class="dropdown-item" target="_blank" href="users/<?php echo e($user->id); ?>/impersonate" id="edit-user"
                data-action="users/<?php echo e($user->id); ?>/impersonate"><i class="fa fa-user-secret"></i> <?php echo e(__('Impersonate')); ?></a>

        <a href="#" class="dropdown-item  text-danger" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>"
            onclick="confirm('<?php echo e(__('Are You sure ?')); ?>')?document.getElementById('delete-form-<?php echo e($user->id); ?>').submit():'';"><i
                class="fas fa-trash"></i> <?php echo e(__('Delete')); ?></a>
        <?php echo Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'id' => 'delete-form-' . $user->id]); ?>

        <?php echo Form::close(); ?>


    </div>
</div>
<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/users/action.blade.php ENDPATH**/ ?>