@extends('cpanel.master')

@section('title')
  ایجاد اطلاعیه جدید
@endsection

@section('content')
    <div class="form-group">
        <form >
            <div class="item">
                <p class="input">عنوان اطلاعیه را دارید وارد کنید :</p>
                <input type="text" name="title">
            </div>

            <div class="item disable">
                <p class="input">نام و نام خانوادگی نویسنده :</p>
                <input type="text" name="author">
            </div>

            <div class="item">
                <p>محتوای اطلاعیه را در کادر زیر وارد کنید :</p>
                <textarea name="" id="post_content" ></textarea>
            </div>
            <div class="checkbox block">
                <label for="radiobtn"><input type="checkbox" name="hot_news"> آیا اطلاعیه مهم ای است؟ </label>
            </div>
            <div class="checkbox block sep">
                <label for="radiobtn"><input type="checkbox" name="slideshow">به اسلاید شو اضافه شود؟ </label>
            </div>
            <button type="submit" class="btn btn-flat-green btn-large float-left btn-wide" id="submit">ثبت اطلاعیه</button>
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