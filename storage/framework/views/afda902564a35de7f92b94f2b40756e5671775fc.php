<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h3>Ver disciplina</h3>
            <?php
                $linkEdit = route('admin.subjects.edit',['subject' => $subject->id]);
                $linkDelete = route('admin.subjects.destroy',['subject' => $subject->id]);
            ?>
            <?php echo Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit); ?>

            <?php echo Button::danger(Icon::remove().' Excluir')->asLinkTo($linkDelete)
                ->addAttributes([
                    'onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"
                ]); ?>

            <?php
                $formDelete = FormBuilder::plain([
                    'id' => 'form-delete',
                    'url' => $linkDelete,
                    'method' => 'DELETE',
                    'style' => 'display:none'
                ])
            ?>
            <?php echo form($formDelete); ?>

            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td><?php echo e($subject->id); ?></td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td><?php echo e($subject->name); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>