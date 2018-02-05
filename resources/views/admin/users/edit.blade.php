@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @component('admin.users.tabs-component',['user' => $form->getModel()])
                    <h3>Editar  Usuário</h3>
                    {!!
                    form($form->add('Edit', 'submit',[
                        'attr' => ['class' => 'btn btn-primary btn-block'],
                        'label' => 'Editar'
                    ]))
                     !!}

                @endcomponent
            </div>
        </div>
    </div>

@endsection