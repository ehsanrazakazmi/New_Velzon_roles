
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.role'); ?>
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
            Tables
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Roles
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0"><strong>Roles</strong></h4>
                    <div class="col-sm-auto">
                        <div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                id="create-btn" data-bs-target="#showModal">
                                <i class="ri-add-line align-bottom me-1"></i> Add
                            </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                


                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>


                
                <div class="card-body">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
                                
                            <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center" data-sort="customer_name">No.</th>
                                        <th class="text-center" data-sort="email">Name</th>
                                        <th class="text-center" data-sort="email">Desciption</th>
                                        <th class="text-center" data-sort="email">Permissions</th>
                                        <th class="text-center" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        
                                        <td class="text-center" data-search="<?php echo e($role->id); ?>"><?php echo e($role->id); ?></td>
                                        <td class="text-center" data-search="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></td>
                                        <td class="text-center" data-search="<?php echo e($role->description); ?>"><?php echo e($role->description); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('role.pr', $role->id)); ?>">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </td>
                                        
                                        <td>
                                            <?php if($role->name != 'Admin'): ?>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <div class="edit">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-edit')): ?>
                                                    <button class="btn btn-sm btn-success"><a href="<?php echo e(route('role.edit', $role->id)); ?>" class="text-white"><i class="ri-edit-line"></i></a></button>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-delete')): ?> 
                                                <div class="remove">
                                                    <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal<?php echo e($role->id); ?>"><i class="ri-delete-bin-5-line"></i></button>


                                                    
                                                    
                                                </div>
                                                <?php endif; ?>
                                            </div>

                                            
                                            <!-- Modal -->
                                            <div class="modal fade zoomIn" id="deleteRecordModal<?php echo e($role->id); ?>" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                                            id="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mt-2 text-center">
                                                                <script src="https://cdn.lordicon.com/lordicon-1.3.0.js"></script>
                                                                <lord-icon
                                                                src="https://cdn.lordicon.com/skkahier.json"
                                                                trigger="hover"
                                                                style="width:250px;height:250px">
                                                            </lord-icon>
                                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                <h4>Are you Sure ?</h4>
                                                                <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                                            
                                                            <form method="post" action="<?php echo e(route('role.distroy', ['id' => $role->id])); ?>" method="POST">
                                                                <?php echo method_field('DELETE'); ?>
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end modal -->
                                            <?php endif; ?>
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                    

                </div><!-- end card -->
                



            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->


    
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add Role Here...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                
                    




                    <form method="POST" action="<?php echo e(route('role.store')); ?>">
                        <?php echo csrf_field(); ?>
                    
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                    
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control"></textarea>
                            </div>
                    
                            <div>
                                <label for="permissions" class="form-label">Permissions</label>
                                <select class="js-example-basic-multiple" name="permission[]" multiple="multiple">
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->name); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                                <button type="submit" class="btn btn-success" id="add-btn">Add Role</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                    
                    
            </div>
        </div>
    </div>


    


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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\New-velzon-15-11-2023\resources\views/User-Management/Roles/list.blade.php ENDPATH**/ ?>