<?php

namespace SON\Http\Controllers\Api;

use Illuminate\Http\Request;
use SON\Http\Controllers\Controller;
use SON\Models\Student;

class StudentsController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index(Request $request)
    {
        $search = $request->get('q');
        return !$search ? [] :
            Student::whereHas('user',function($query) use ($search){
                $query->where('users.name','LIKE',"%{$search}%");
            })->take(10)->get();
    }
}
