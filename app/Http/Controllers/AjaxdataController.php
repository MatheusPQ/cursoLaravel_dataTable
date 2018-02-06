<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DataTables;

class AjaxdataController extends Controller
{
    function index()
    {
     return view('student.ajaxdata');
     //http://127.0.0:8000/ajaxdata
    }

    function getdata()
    {
        $students = Student::select('id', 'first_name', 'last_name');
        return Datatables::of($students)
        ->addColumn('action', function($student){
            return '<a href="#" class="btn btn-xs btn-primary edit"
            id="'.$student->id.'"><i class="glyphicon glyphicon-edit">
            </i> Edit</a>'; //Vai gerar uma coluna dinâmicamente com btn + id
        })
        ->make(true);
    }
}
