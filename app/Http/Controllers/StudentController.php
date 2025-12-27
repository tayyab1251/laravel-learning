<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use function Symfony\Component\Clock\now;
use PDO;


class StudentController extends Controller
{
    // method to get all the students
    public function index(){
       $students =  DB::table('students')
            ->join('cities', 'students.city_id', '=', 'cities.city_id')
            ->select('students.student_id','students.name','students.age','students.email','students.phone','cities.name as city_id' )
            ->get();
       return view('index', ['students'=> $students]);
    }

    // method to return add-student form with cities data
    public function loadAddForm(){
        $cities = DB::table('cities')->select('city_id', 'name')->get();
        if(!empty($cities)){
            return view('add-user', ['cities' => $cities]);
        }
    }

    // method to validate user inputs and also create student record in database
    public function create(Request $req){
        $validated = $req->validate([
            'name'  => 'bail|required|string|min:3|max:20',
            'email' => 'bail|required|email|unique:students,email',
            'age'   => 'bail|required|integer|min:3|max:120',
            'phone' => 'bail|required|digits_between:10,15',
            'city_id' => 'bail|required|integer',
        ],['city_id.required' => 'City field is required.']);

        $insert = DB::table('students')->insert([
            // 'name'  => $req->name,
            // 'email' => $req->email,
            // 'age'   => $req->age,
            // 'phone' => $req->phone,
            // 'city_id' => $req->city_id,
            $validated
        ]);

        // check is insertion succeeded
        if(!$insert){
            return redirect('/')->with('fail', 'Failed to insert a student in database');  
        }
        return redirect('/')->with('success', 'Student has been inserted');  
    }

    // method to update student record
    public function loadUpdateStudentForm(Request $req){
        $student = DB::table('students')->select('student_id','name', 'age', 'email', 'phone', 'city_id')->where('student_id', '=', $req->id)->first();
        $cities = DB::table('cities')->select('city_id', 'name')->get();
        return view('edit-student', ['student' => $student, 'cities' => $cities]);     
    }

    // methof to handle student editing data
    public function update(Request $req, $id){
        $validated = $req->validate([
            'name'  => 'required|string|min:3|max:20',
            'email' => ['required','email',
                        Rule::unique('students', 'email')->ignore($id, 'student_id')],
            'age'   => 'required|integer|min:3|max:120',
            'phone' => 'required|digits_between:10,15',
            'city_id' => 'required|integer',
        ],
        ['city_id.required' => 'City field is required.']);

        DB::table('students')
        ->where('student_id', $id)
        ->update($validated);

        return redirect()->route('students.index');

    }

    // method to delete the student record
    public function destroy(Request $req){
        // return $req->id ;
        $delete = DB::table('students')->where('student_id', '=', $req->id)->delete();
        if(!$delete){
            // return redirect('/');
            return 'Failed to delete student';
        }

        return redirect('/');
    }
}