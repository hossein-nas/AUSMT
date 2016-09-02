<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about(){
        $name = "Hossein Nasiri";
        return view('pages.about',["first"=>"Hossein","last"=>"Nasiri"]);
    }
    public function showMe(){
        return "this is about page";
    }

    // post
    public function post($hifen) {
        $post = Post::where(['post_type'=>1,'hifen_title'=>$hifen])->first();
        return view('pages.postview.posts',compact('post'));
    }
    public function notfication($hifen) {
        $notfication = Post::where(['post_type'=>3,'hifen_title'=>$hifen])->first();
        return view('pages.postview.notfications',compact('notfication'));
    }

}
