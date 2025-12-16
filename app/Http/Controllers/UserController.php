<?php

namespace App\Http\Controllers;


class UserController extends Controller
{
    // function that loads when user visits index page (/)
    public function welcomUser(){
        // return 'Welcome Back!!';
        return view('welcome', ['message' => 'welcome back']);
    }

    // display hellow to user with its id | like-----> [Hello 1]
    public function greetUserWithId($id){
        return view('user', ['id' => $id]);
    }
}
