<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-dark.png')); ?>" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/logo-sm.png')); ?>" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/logo-light.png')); ?>" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span><?php echo app('translator')->get('translation.menu'); ?></span></li>


                <!-- User Management -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-user-fill"></i> <span><?php echo app('translator')->get('translation.user-management'); ?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo e(route('index.page')); ?>" class="nav-link <?php echo e(request()->is('roles/*') ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.role'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('product.index')); ?>" class="nav-link <?php echo e(request()->is('product/*') ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.products'); ?></a>
                            </li>
                            
                                
                            <li class="nav-item">
                                <?php if(auth()->user()->hasRole('Admin')): ?>
                                <a href="<?php echo e(route('user.index')); ?>" class="nav-link <?php echo e(request()->is('user/*') ? 'active' : ''); ?>"><?php echo app('translator')->get('translation.users'); ?></a>
                                <?php endif; ?>
                            </li>
                            
                        </ul>
                    </div>
                </li> 
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<?php /**PATH C:\xampp\htdocs\New-velzon-15-11-2023\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>