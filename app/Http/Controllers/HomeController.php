<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('login');
    }

    public function index(){
        // dd('Hola mundo'); // dump and die -> muestra y finaliza
        return view('home.index');
    }

    public function login(){
        return view('home.login');
    }
}
