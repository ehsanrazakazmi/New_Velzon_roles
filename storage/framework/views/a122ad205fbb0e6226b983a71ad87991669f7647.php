
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Users
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            List 
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- row starts from here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0"><strong>Users</strong></h4>
                    <div class="col-sm-auto">
                        <div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User create')): ?>                        
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                id="create-btn" data-bs-target="#showModal">
                                    <i class="ri-add-line align-bottom me-1"></i> Add
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User list')): ?>
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Roles</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e(++$i); ?></td>
                                    <td class="text-center"><?php echo e($user->name); ?></td>
                                    <td class="text-center"><?php echo e($user->email); ?></td>
                                    <td class="text-center"><?php echo e($user->roles[0]->name); ?></td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User edit')): ?>
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"><a href="<?php echo e(route('user.edit', encrypt( $user->id))); ?>" class="text-white"><i class="ri-edit-line"></i></a></button>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User delete')): ?> 
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal"
                                                data-bs-target="#deleteRecordModal<?php echo e($user->id); ?>"><i
                                                class="ri-delete-bin-5-line"></i></button>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <div class="modal fade zoomIn" id="deleteRecordModal<?php echo e($user->id); ?>"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" id="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mt-2 text-center">
                                                                <script src="https://cdn.lordicon.com/lordicon-1.4.1.js"></script>
                                                                <lord-icon
                                                                src="https://cdn.lordicon.com/wpyrrmcq.json"
                                                                trigger="hover"
                                                                style="width:250px;height:250px">
                                                            </lord-icon>
                                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                <h4>Are you Sure ?</h4>
                                                                <p class="text-muted mx-4 mb-0">Are you Sure You want to
                                                                    Remove this Record ?</p>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                                <button type="button" class="btn w-sm btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                                
                                                                
                                                                <?php echo Form::open(['method' => 'DELETE','route' => ['user.destroy', encrypt($user->id)],'style'=>'display:inline']); ?>

                                                                <?php echo Form::submit('Delete it!', ['class' => 'btn w-sm btn-danger', 'id' => 'delete-record']); ?>

                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
            <!-- end col -->
        </div><!-- end col -->
    </div><!-- end row -->

    <!-- Modal starts here-->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add Role Here...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
        
                <?php echo Form::open(array('route' => 'user.store','method'=>'POST')); ?>

                <div class="modal-body mx-4 my-2"> <!-- Adjust margin as needed -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <div class="form-icon">
                            <?php echo Form::text('email', null, array('placeholder' => 'example@gmail.com','class' => 'form-control form-control-icon', 'id'=>'iconInput')); ?>

                            <i class="ri-mail-unread-line"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <?php echo Form::password('password', array('placeholder' => 'Password','class' => 'form-control')); ?>

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Confirm-password</label>
                        <?php echo Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')); ?>

                    </div>
                    <div class="mb-3">
                        <strong>Role:</strong>
                        <?php echo Form::select('roles[]', $roles,[], array('class' => 'form-control')); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User create')): ?>
                            <button type="submit" class="btn btn-success" id="add-btn">Add User</button>
                        <?php endif; ?>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    <!-- Modal ends here-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/list.js/list.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js')); ?>"></script>

    <!-- listjs init -->
    <script src="<?php echo e(URL::asset('assets/js/pages/listjs.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    <!-- Datatables CDN-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="<?php echo e(URL::asset('assets/js/pages/datatables.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New-velzon-15-11-2023\resources\views/User-Management/Users/list.blade.php ENDPATH**/ ?>