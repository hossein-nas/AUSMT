<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CpanelPagesController extends Controller
{
    public function post(){
        return view('cpanel.pages.new_post');
    }

    public function page(){
        return view('cpanel.pages.new_page');
    }

    public function notification(){
        return view('cpanel.pages.new_page');
    }

    public function seminar(){
        return view('cpanel.pages.new_seminar');
    }

    public function incoming(){
        return view('cpanel.pages.new_incoming');
    }
    public function manageposts(){
        return view('cpanel.pages.manageposts');
    }
}
