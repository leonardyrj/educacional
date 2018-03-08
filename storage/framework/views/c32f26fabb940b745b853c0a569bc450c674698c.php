<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h3>Novo Usuário</h3>
            <?php echo Button::primary('Novo')->asLinkTo(route('admin.users.create')); ?>

        </div>
        <div class="row">
            <?php echo Table::withContents($users->items())->callback('Ações', function($field,$model){
                $linkEdit = route('admin.users.edit',['user' => $model->id]);
                $linkShow = route('admin.users.show',['user' => $model->id]);
                return Button::link(Icon::pencil().' Editar')->asLinkTo($linkEdit).'|'.Button::link(Icon::folderOpen().' Ver')->asLinkTo($linkShow);
            }); ?>

        </div>

        <?php echo $users->links();; ?>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>