<?php

namespace SON\Forms;

use Kris\LaravelFormBuilder\Form;
use Carbon\Carbon;

class ClassInformationForm extends Form
{
    public function buildForm()
    {

        $date_format = function($value){
            return ($value && $value instanceof Carbon) ? $value->format('Y-m-d') : $value ;
        };


        $this
            ->add('date_start', 'date', array(
                'label' => 'Data Início',
                'rules' => 'required|date',
                'value' => $date_format
            ))
            ->add('date_end', 'date', [
                'label' => 'Data Final',
                'rules' => 'required|date',
                'value' => $date_format
            ])
            ->add('cycle', 'number', [
                'label' => 'Ciclo',
                'rules' => 'required|integer'
            ])
            ->add('subdivision', 'number', [
                'label' => 'Sub-divisão',
                'rules' => 'integer'
            ])
            ->add('semester', 'number', [
                'label' => 'Semestre (1 ou 2)',
                'rules' => 'required|in:1,2'
            ])
            ->add('year', 'number', [
                'label' => 'Ano',
                'rules' => 'required|integer'
            ]);
    }
}
