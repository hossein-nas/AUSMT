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
            <div id="news"> @include('cpanel.pages.includes.news')</div>
            <div id="notification"></div>
            <div id="seminar">همایش و سیمنـار هـا</div>
            <div id="incoming">پیشـآمد ها</div>
            <div id="other">متفرقـه</div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{asset('cpanel/js/nav_menu.js')}}"></script>
@endsection