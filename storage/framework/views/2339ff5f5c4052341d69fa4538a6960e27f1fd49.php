<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <h3>Usuário - <?php echo e($user->name); ?></h3>
            <?php echo Button
                    ::normal('Listar usuários')
                    ->appendIcon(Icon::thList())
                    ->asLinkTo(route('admin.users.index'))
                    ->addAttributes([
                        'class' => 'hidden-print'
                    ]); ?>

            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">#</th>
                    <td><?php echo e($user->id); ?></td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td><?php echo e($user->name); ?></td>
                </tr>
                <tr>
                    <th scope="row">E-mail</th>
                    <td><?php echo e($user->email); ?></td>
                </tr>
                <tr>
                    <th scope="row">Password</th>
                    <td><?php echo Badge::withContents($user->password); ?></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>