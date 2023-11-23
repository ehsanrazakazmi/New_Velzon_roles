
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.role'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Tables
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Roles
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <!-- Session messeges -->
    <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Role</h4>
                </div>

                <!-- Card's Body starts -->
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <?php echo Form::model($role, ['method' => 'PATCH', 'route' => ['role.update', encrypt($role->id)]]); ?>

                                <div class="mb-3">
                                    <label for="basicInput" class="form-label">Name: </label>
                                    <?php echo Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']); ?>

                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <?php echo Form::textarea('description', $role->description ?? null, ['placeholder' => 'Description', 'class' => 'form-control', 'rows' => '2' ]); ?>

                                </div>

                                <div class="mb-3">
                                    <label for="choices-multiple-default" class="form-label text-muted">Permissions</label>
                                    <br>
                                    <?php echo Form::select('permission[]', $permission->pluck('name', 'name'), $role->permissions->pluck('name'), ['class' => 'js-example-basic-multiple', 'multiple' => 'multiple']); ?>

                                </div>

                                <button type="submit" class="btn btn-success btn-sm mt-2">Update</button>
                                <a style="margin-left:3px;" class="btn btn-danger btn-sm mt-2" type="button" href="<?php echo e(url('/roles/list')); ?>">Cancel</a>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div><!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <!-- Choices.js JS -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="<?php echo e(URL::asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/list.js/list.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('assets/js/pages/listjs.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/modal.init.js')); ?>"></script>

    <!-- datatable CDN-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/select2.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New-velzon-15-11-2023\resources\views/User-Management/Roles/edit.blade.php ENDPATH**/ ?>