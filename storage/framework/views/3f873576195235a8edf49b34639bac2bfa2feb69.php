<?php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$languages = Utility::languages();
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <img src="<?php echo e(Utility::getpath('logo/app-logo.png')); ?>" class="app-logo w-50">
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="<?php echo e(Utility::getpath('logo/app-small-logo.png')); ?>" class="app-logo w-50">
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo e(route('home')); ?>" class="nav-link ">
                    <i class="fas fa-home text-primary"></i><span><?php echo e(__('Dashboard')); ?></span></a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-user')): ?>
                <li>
                    <a href="<?php echo e(route('users.index')); ?>" class="nav-link "><i
                            class="fas fa-users text-primary"></i><span><?php echo e(__('Users')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-role')): ?>
                <li>
                    <a href="<?php echo e(route('roles.index')); ?>" class="nav-link "><i
                            class="fas fa-key text-primary"></i><span><?php echo e(__('Roles')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                <li>
                    <a href="<?php echo e(route('requestdomain.index')); ?>" class="nav-link "><i
                            class="fas fa-arrow-circle-right text-primary"></i><span><?php echo e(__('Domain Request')); ?></span></a>
                </li>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-module')): ?>
                <li>
                    <a href="<?php echo e(route('modules.index')); ?>" class="nav-link "><i
                            class="fas fa-fire text-primary"></i><span><?php echo e(__('Modules')); ?></span></a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-plan')): ?>
                <li>
                    <a href="<?php echo e(route('plans.index')); ?>" class="nav-link "><i
                            class="fas fa-money-check-alt text-primary"></i><span><?php echo e(__('Plans')); ?></span></a>
                </li>

            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-transaction')): ?>
                <?php if(Auth::user()->type == 'Super Admin'): ?>
                    <li>
                        <a href="<?php echo e(route('sales.index')); ?>" class="nav-link "><i
                                class="fas fa-money-bill-wave-alt text-primary"></i><span><?php echo e(__('Transactions ')); ?></span></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-setting')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('settings')); ?>">
                        <i class="fas fa-cog text-primary"></i>
                        <span class="nav-link-text"><?php echo e(__('Settings')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-chat')): ?>
                <?php if(Utility::getsettings('pusher_status') == '1'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('chat')); ?>">
                            <i class="fas fa-comments text-primary"></i>
                            <span class="nav-link-text"><?php echo e(__('Chats')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(Auth::user()->type == 'Super Admin'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('landing.page')); ?>">
                        <i class="fas fa-th-large text-primary"></i>
                        <span class="nav-link-text"><?php echo e(__('Landing Page')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage-language')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('manage.language', [$currantLang])); ?>">
                        <i class="fas fa-globe text-primary"></i>
                        <span class="nav-link-text"><?php echo e(__('Manage Language')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </aside>
</div>
<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>