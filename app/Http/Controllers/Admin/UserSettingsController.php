<?php
/**
 * Created by PhpStorm.
 * User: leonardy
 * Date: 31/01/2018
 * Time: 11:03
 */

namespace SON\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use SON\Forms\UserSettingsForm;
use SON\Http\Controllers\Controller;

class UserSettingsController
{
    use FormBuilderTrait;


    public function edit()
    {
        /** @var Form $form */
        $form = $this->form(UserSettingsForm::class,[
            'url'   => route('admin.users.settings.update'),
            'method'=> 'PUT'
        ]);


        return view('admin.users.settings', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     * @internal param User $user
     * @internal param int $id
     */
    public function update(Request $request)
    {
        /** @var Form $form */
        $form = $this->form(UserSettingsForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $data = $form->getFieldValues();
        $data['password'] = bcrypt($data['password']);
        \Auth::user()->update($data);
        $request->session()->flash('message', 'Senha alterada com sucesso');
        return redirect()->route('admin.users.settings.edit');
    }
}