<?php

namespace App\Http\Controllers;

use App\Post;
use App\Incoming_event as Incoming;
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
        $post->visit++;
        $post->save();
        return view('pages.postview.posts',compact('post'));
    }
    public function notfication($hifen) {
        $notfication = Post::where(['post_type'=>3,'hifen_title'=>$hifen])->first();
        $notfication->visit++;
        $notfication->save();
        return view('pages.postview.notfications',compact('notfication'));
    }
    public function seminar($hifen) {
        $seminar = Post::where(['post_type'=>4,'hifen_title'=>$hifen])->first();
        $seminar->visit++;
        $seminar->save();
        return view('pages.postview.seminars',compact('seminar'));
    }
    public function incoming($hifen) {
        $incoming = Incoming::where(['hifen_title'=>$hifen])->first();
        return view('pages.postview.incoming',compact('incoming'));
    }

}
