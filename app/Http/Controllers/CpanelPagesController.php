<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Incoming_event as Incoming;
use Morilog\Jalali\jDateTime;

class CpanelPagesController extends Controller
{
    public function post(){
        return view('cpanel.pages.new_post');
    }

    public function page(){
        return view('cpanel.pages.new_page');
    }

    public function notification(){
        return view('cpanel.pages.new_notfication');
    }

    public function seminar(){
        return view('cpanel.pages.new_seminar');
    }

    public function incoming(){
        return view('cpanel.pages.new_incoming');
    }
    public function manageposts(){
        $allPosts['post'] = Post::where('post_type',1)->latest()->get();
        $allPosts['notfication'] = Post::where('post_type',3)->latest()->get();
        $allPosts['seminar'] = Post::where('post_type',4)->latest()->get();
        $allPosts['other'] = Post::where('post_type',5)->latest()->get();
        $allPosts['incoming'] = Incoming::latest()->get();
        return view('cpanel.pages.manageposts',compact('allPosts'));
    }
    public function store(Request $request){
        $request['user_id']=1;
        $request['hifen_title']=seoUrl($request['title']);
        $rules=[
            'title'     =>  'required|min:3',
            'hifen_title'     =>  'unique:posts',
            'content'   =>  'required|min:50',
            'image'         => 'required'
        ];
        $messages=[
            'title.required'    =>  'شما باید فیلد عنوان را کامل کنید.',
            'hifen_title.unique'    =>  'شما قبلا یک عنوان با این نام ثبت کرده اید، یک عنوان متمایز انتخاب کنید.',
            'title.min'    =>  'در فیلد عنوان شما میباست حداقل ۳ کاراکتر باید وارد نمایید.',
            'content.required'    =>  'بدون وارد کردن محتوای نمیتوانید خبری را ثبت نمایید.',
            'content.min'    =>  'محتوای یک خبر میباست حداقل ۵۰ کاراکتر باشد.',
            'image.required'    =>  'تصویر شاخص انتخاب نشده است.',
        ];
        if(!file_exists(public_path().$request['image']))
            $request['image']='img/no-thumbnail.svg';
        $this->validate($request,$rules,$messages);
//        echo "<pre>";
//        var_dump($request);
        Post::create($request->all());
        return redirect('/admin-panel/manageposts/');
    }

    public function delete_post($title_snake){
        $post=Post::where('hifen_title',$title_snake);
        $post->delete();
        return 'ok';
    }

    public function storeIncoming(Request $request)
    {
        $request['user_id']=1;
        if(!jDateTime::checkDate($request['year'], $request['month'],$request['day']))
            $request['expired_date']='';
        else{
            $greg=jDateTime::toGregorian($request['year']+1300, $request['month'],$request['day']);
            $request['expired_date']= $greg[0].'-'.$greg[1].'-'.$greg[2].' 00:00:00' ;
        }

        $request['hifen_title']=seoUrl($request['title']);
        $rules=[
            'title'         =>  'required|min:3',
            'hifen_title'   =>  'unique:posts',
            'content'       =>  'required|min:50',
            'expired_date'  =>  'required|date'
        ];
        $messages=[
            'title.required'    =>  'شما باید فیلد عنوان را کامل کنید.',
            'hifen_title.unique'    =>  'شما قبلا یک عنوان با این نام ثبت کرده اید، یک عنوان متمایز انتخاب کنید.',
            'title.min'    =>  'در فیلد عنوان شما میباست حداقل ۳ کاراکتر باید وارد نمایید.',
            'content.required'    =>  'بدون وارد کردن محتوای نمیتوانید خبری را ثبت نمایید.',
            'content.min'    =>  'محتوای یک خبر میباست حداقل ۵۰ کاراکتر باشد.',
            'expired_date.required'    =>  'تاریخ انتشار را باید به درستی وارد نمایید.',
            'expired_date.date'    =>  'تاریخ انتشار را باید به درستی وارد نمایید.',
        ];

        $this->validate($request,$rules,$messages);
        Incoming::create($request->all());
        return redirect('/admin-panel/manageposts/');
    }

}
