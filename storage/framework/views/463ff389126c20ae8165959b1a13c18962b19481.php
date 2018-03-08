<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h3>Editar Senha</h3>
            <?php echo form($form->add('salvar', 'submit',[
                'attr' => ['class' => 'btn btn-primary btn-block']
            ])); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>