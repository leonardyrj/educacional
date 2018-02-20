<?php

namespace SON\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use SON\Forms\ClassInformationForm;
use SON\Http\Controllers\Controller;
use SON\Models\ClassInformation;
use SON\Models\Subject;


class ClassInformationsController extends Controller
{
    use FormBuilderTrait;

    public function index()
    {
        $class_informations = ClassInformation::paginate();
        return view('admin.class_informations.index',compact('class_informations'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $form = $this->form(ClassInformationForm::class,[
            'url' => route('admin.class_informations.store'),
            'method' => 'POST'
        ]);

        return view('admin.class_informations.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var Form $form */
        $form = $this->form(ClassInformationForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        Subject::create($data);
        $request->session()->flash('message','Disciplina criada com sucesso');
        return redirect()->route('admin.subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(ClassInformation $class_information)
    {
        return view('admin.class_information.show', compact('subject'));
    }


    public function edit(ClassInformation $class_information)
    {
        $form = $this->form(ClassInformationForm::class, [
            'url' => route('admin.class_informations.update',['class_information' => $class_information->id]),
            'method' => 'PUT',
            'model' => $class_information
        ]);

        return view('admin.class_informations.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function update(ClassInformation $class_information)
    {
        /** @var Form $form */
        $form = $this->form(ClassInformationForm::class);

        if (!$form->isValid()) {
            return redirect()
                ->back()
                ->withErrors($form->getErrors())
                ->withInput();
        }

        $data = $form->getFieldValues();
        $class_information->update($data);
        session()->flash('message','Disciplina editada com sucesso');
        return redirect()->route('admin.class_informations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \SON\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassInformation $class_information)
    {
        $class_information->delete();
        session()->flash('message','Disciplina excluída com sucesso');
        return redirect()->route('admin.class_information.index');
    }
}
