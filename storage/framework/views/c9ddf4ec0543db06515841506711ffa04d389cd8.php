<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/admin.css')); ?>" rel="stylesheet">


</head>
<body>
    <div id="app">
        <?php
            $navbar = Navbar::withBrand(config('app.name'), route('admin.dashboard'))->inverse();
            if(Auth::check()){
                if(\Gate::allows('admin')){
                    $arrayLinks = [
                        ['link' => route('admin.users.index'), 'title' => 'Usuários'],
                        ['link'=> route('admin.class_informations.index'), 'title' => 'Classes'],
                    ];
                    $navbar->withContent(Navigation::links($arrayLinks));

                }

                $arrayLinksRight =[
                    [
                        Auth::user()->name,
                        [
                            [
                                'link' => route('admin.users.settings.edit'),
                                'title' => 'Configurações'
                            ],
                            [
                                'link' => route('logout'),
                                'title' => 'Logout',
                                'linkAttributes' => [
                                    'onclick' => "event.preventDefault();document.getElementById(\"form-logout\").submit();"
                                ]
                            ]
                        ]
                    ]
                ];

                $navbar->withContent(Navigation::links($arrayLinksRight)->right());

                $formLogout = FormBuilder::plain([
                    'id' => 'form-logout',
                    'url' => route('logout'),
                    'method' => 'POST',
                    'style' => 'display:none'
                ]);
            }
        ?>

        <?php echo $navbar; ?>


        <?php if(Auth::check()): ?>
            <?php echo form($formLogout); ?>

        <?php endif; ?>
        <?php if(Session::has('message')): ?>
            <div class="container hidden-print">
                <?php echo Alert::success(Session::get('message'))->close(); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
</body>
</html>
