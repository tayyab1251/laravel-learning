<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

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

    public function createStudent(){
        $queryState = DB::table('students')->insert(
            ['name' => 'Tayyab',
            'age'  => 12,
            'email' => 'tayyasabir72@gmail.com',
            'phone' => '03000441251',
            'city_id' => 2 
            ]
        );

        if(!$queryState){
            return 'Failed to insert new record';
        }
        
        return 'New Record has been inserted';
    }
}
