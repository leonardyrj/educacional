<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h3>Adicionar disciplina e professor na turma</h3>
            <class-teaching class-information="<?php echo e($class_information->id); ?>"></class-teaching>
            <br/><br/>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>