
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.grid-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('assets/libs/gridjs/gridjs.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Users
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Edit Users
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Row start -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">              
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0 flex-grow-1">Edit New User</h4>
                    <a href="<?php echo e(route('user.index')); ?>" class="btn btn-outline-success waves-effect waves-light px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Go to Users Index</a>
                </div>
                <div class="card-body">
                    <?php echo Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', encrypt($user->id)]]); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <?php echo Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']); ?>

                                </div>
                
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <?php echo Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']); ?>

                                </div>
                
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Confirm Password:</label>
                                    <?php echo Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="iconInput" class="form-label">Email:</label>
                                    <div class="form-icon">
                                        <?php echo Form::text('email', null, ['placeholder' => 'example@gmail.com', 'class' => 'form-control form-control-icon', 'id' => 'iconInput']); ?>

                                        <i class="ri-mail-unread-line"></i>
                                    </div>
                                </div>
                
                                <div class="mb-3">
                                    <label for="roles" class="form-label">Role:</label>
                                    <?php echo Form::select('roles[]', $roles, $userRole, ['class' => 'form-control']); ?>

                                </div>
                
                            </div>
                        </div>
                        <button type="submit" class="btn rounded-pill btn-success waves-effect waves-light mt-3">Update</button>
                    <?php echo Form::close(); ?>

                </div><!-- end card-body -->
                            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/gridjs/gridjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/gridjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New-velzon-15-11-2023\resources\views/User-Management/Users/edit.blade.php ENDPATH**/ ?>