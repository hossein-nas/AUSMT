@extends('cpanel.master')

@section('title')
    ثبت همایش یا سیمنار
@endsection

@section('content')
    <div class="form-group">
        <form >
            <div class="item">
                <p class="input">عنوان اصلی همایش یا سمینار را وارد کنید :</p>
                <input type="text" name="title">
            </div>

            <div class="item">
                <p>توضیحات همایش یا سیمنار را در کادر زیر وارد کنید :</p>
                <textarea name="" id="post_content" ></textarea>
            </div>

            <button type="submit" class="btn btn-flat-green btn-large float-left btn-wide" id="submit">ثبت همایش یا سمینار</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('cpanel/js/ck/ckeditor.js')}}"></script>
    <script src="{{asset('cpanel/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('cpanel/js/checkbox.js')}}"></script>
    <script src="{{asset('cpanel/js/radiobtn.js')}}"></script>
    <script>
        CKEDITOR.replace('post_content',{'language':'fa','height':300,'toolbarCanCollapse ':'true'});
    </script>
@endsection