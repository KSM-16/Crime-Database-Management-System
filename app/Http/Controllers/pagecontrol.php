<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagecontrol extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function page(){
        return view('page');
    }
    public function insert(){
        return view('insert');
    }
    public function nav(){
        return view('nav');
    }
    public function footer(){
        return view('footer');
    }
    public function search(){
        return view('search');
    }
    public function reporter(){
        return view('reporter');
    }
    public function victim(){
        return view('victim');
    }
    public function suspect(){
        return view('suspect');
    }
    public function criminal(){
        return view('criminal');
    }
    public function update(){
        return view('update');
    }
    public function ucrime(){
        return view('ucrime');
    }
    public function ucriminal(){
        return view('ucriminal');
    }
    public function uvictim(){
        return view('uvictim');
    }
    public function ususpect(){
        return view('ususpect');
    }
    public function ureport(){
        return view('ureport');
    }
    public function delete(){
        return view('delete');
    }
}
