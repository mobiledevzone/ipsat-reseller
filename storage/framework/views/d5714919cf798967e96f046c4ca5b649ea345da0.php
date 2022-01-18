<?php
$users = \Auth::user();
$currantLang = $users->currentLanguage();
$languages = Utility::languages();
?>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
            </li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            <div class="d-sm-none d-lg-inline-block"><i class="fa fa-globe"></i></div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="dropdown-item <?php if($language == $currantLang): ?> text-danger <?php endif; ?>"
                    href="<?php echo e(route('change.language', $language)); ?>"><?php echo e(Str::upper($language)); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <?php if(tenant('id') == null): ?>
                    <img alt="image"
                        src="<?php echo e(Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/img/avatar/avatar-1.png')); ?>"
                        class="rounded-circle mr-1">
                <?php else: ?>
                    <?php if(config('filesystems.default') == 'local'): ?>

                        <img id="avatar-img" class="rounded-circle mr-1"
                            src="<?php echo e(Auth::user()->avatar ? Storage::url(tenant('id') . '/' . Auth::user()->avatar) : asset('assets/img/avatar/avatar-1.png')); ?>"
                            alt="User profile picture">
                    <?php else: ?>
                        <img id="avatar-img" class="rounded-circle mr-1"
                            src="<?php echo e(Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : asset('assets/img/avatar/avatar-1.png')); ?>"
                            alt="User profile picture">
                    <?php endif; ?>
                <?php endif; ?>
                <div class="d-sm-none d-lg-inline-block"><?php echo e(__('Hi,')); ?> <?php echo e(Auth::user()->name); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="<?php echo e(route('profile.index', Auth::user()->id)); ?>" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> <?php echo e(__('Profile')); ?>

                </a>


                <div class="dropdown-divider"></div>
                <a class="dropdown-item has-icon text-danger" href="javascript:void(0)"
                    onclick="document.getElementById('logout-form').submit()">
                    <i class="fas fa-sign-out-alt"></i>
                    <?php echo e(__('Logout')); ?>

                </a>
                <form action="<?php echo e(route('logout')); ?>" method="POST" id="logout-form"> <?php echo csrf_field(); ?> </form>
            </div>
        </li>
    </ul>
</nav>
<?php /**PATH /Applications/MAMP/htdocs/ipsat_reseller/resources/views/layouts/header.blade.php ENDPATH**/ ?>