@extends('cpanel.master')

@section('title')
    مدیریت محتوای ارسال شده
@endsection


@section('content')

    <div class="nav-menu">
        <div class="header">
            <ul>
                <li><a href="#news" >اخبــار</a></li>
                <li><a href="#notification" >اطلاعیــه هـا</a></li>
                <li><a href="#seminar" >همایش و سیمنـار هـا</a></li>
                <li><a href="#incoming"  >پیشـآمد ها</a></li>
                <li><a href="#other" >متفرقـه</a></li>
            </ul>
        </div>
        <div class="body">
            <div id="news">             @include('cpanel.pages.includes.news')              </div>
            <div id="notification">     @include('cpanel.pages.includes.notfication')       </div>
            <div id="seminar">          @include('cpanel.pages.includes.seminar')       </div>
            <div id="incoming">         @include('cpanel.pages.includes.incoming')       </div>
            <div id="other">            @include('cpanel.pages.includes.other')       </div>
        </div>
    </div>



@endsection


@section('scripts')
    <script src="{{asset('cpanel/js/nav_menu.js')}}"></script>
@endsection