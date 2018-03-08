<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h3>Listagem de disciplinas</h3>
            <?php echo Button::primary('Nova disciplina')->asLinkTo(route('admin.subjects.create')); ?>

        </div>
        <div class="row">
            <?php echo Table::withContents($subjects->items())

            ->callback('Ações', function($field,$model){
                $linkEdit = route('admin.subjects.edit',['subject' => $model->id]);
                $linkShow = route('admin.subjects.show',['subject' => $model->id]);
                return Button::link(Icon::create('pencil').' Editar')->asLinkTo($linkEdit).'|'.
                    Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Ver')->asLinkTo($linkShow);
            }); ?>



        </div>

        <?php echo $subjects->links(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>