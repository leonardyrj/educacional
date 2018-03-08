<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php $__env->startComponent('admin.users.tabs-component',['user' => $form->getModel()]); ?>
                    <h3>Editar  Usuário</h3>
                    <?php echo form($form->add('Edit', 'submit',[
                        'attr' => ['class' => 'btn btn-primary btn-block'],
                        'label' => 'Editar'
                    ])); ?>


                <?php echo $__env->renderComponent(); ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>