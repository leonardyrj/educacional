<?php
    $tabs = [
       ['title' => 'Informações','link' => route('admin.users.edit',['user' => $user->id])],
       ['title' => 'Perfil','link' => route('admin.users.profile.edit',['user' => $user->id])],
    ]
?>

<h3>Gerenciar usuário</h3>
<div class="text-right">
    <?php echo Button::link('Listar usuários')->asLinkTo(route('admin.users.index')); ?>

</div>
<?php echo \Navigation::tabs($tabs); ?>

<div>
    <?php echo $slot; ?>

</div>