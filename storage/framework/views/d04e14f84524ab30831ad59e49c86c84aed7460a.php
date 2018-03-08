<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h3>Administração de alunos na turma</h3>
            <class-student class-information="<?php echo e($class_information->id); ?>"></class-student>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>