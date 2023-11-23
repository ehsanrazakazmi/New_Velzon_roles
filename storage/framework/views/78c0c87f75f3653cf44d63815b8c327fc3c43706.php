<!-- Success Session Message -->
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> <?php echo e($message); ?>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- Warning Session Message -->
<?php if($message = Session::get('warning')): ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Warning!</strong> <?php echo e($message); ?>

  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<!-- Validation issue -->
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

<!-- Alert problem -->
<?php if($message = Session::get('alert')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\New-velzon-15-11-2023\resources\views/partials/session.blade.php ENDPATH**/ ?>