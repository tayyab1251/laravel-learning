<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    // function to get all the students
    public function students(){
       $students =  DB::table('students')
            ->join('cities', 'students.city_id', '=', 'cities.city_id')
            ->select('students.student_id','students.name','students.age','students.email','students.phone','cities.name as city_id' )
            ->get();
       return view('students', ['students'=> $students]);
    }
}
