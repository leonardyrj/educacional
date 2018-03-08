<?php

namespace SON\Models;

use Illuminate\Database\Eloquent\Model;

class ClassTeaching extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'subject_id',
        'class_information_id',
        'teacher_id'
    ];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function classInformation(){
        return $this->belongsTo(ClassInformation::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function toArray()
    {
        $data = parent::toArray;

    }
}
