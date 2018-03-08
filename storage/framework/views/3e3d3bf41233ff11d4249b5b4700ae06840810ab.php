<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h3>Editar turma</h3>
            <?php echo form($form->add('edit','submit', [
                'attr' => ['class' => 'btn btn-primary btn-block'],
                'label' => Icon::create('floppy-disk').'&nbsp;&nbsp;Editar'
            ])); ?>

        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>