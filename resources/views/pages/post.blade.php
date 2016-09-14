@extends('app')
@section('content')
    <section class="post">
        <div class="post_content">


            @yield('post-section')


        </div>
        <div class="post_sidebar">
            <div id="fast-menu">
                <section>
                    <a href="#">
                        <img src="{{asset('img/system-amozeshi.png')}}" alt="سیستم آموزشی">
                        <p>سیستم آموزشی</p>
                    </a>
                </section>
                <section>
                    <a href="#">
                        <img src="{{asset('img/system-taghzie.png')}}" alt="سیستم آموزشی">
                        <p>سیستم تغذیه</p>
                    </a>
                </section>
                <section>
                    <a href="#">
                        <img src="{{asset('img/post-electronic.png')}}" alt="سیستم آموزشی">
                        <p>پست الکترونیک</p>
                    </a>
                </section>
                <section>
                    <a href="#">
                        <img src="{{asset('img/system-sabtnam.png')}}" alt="سیستم آموزشی">
                        <p>سیستم ثبت نام</p>
                    </a>
                </section>
                <section>
                    <a href="#">
                        <img src="{{asset('img/taghvim-amozeshi.png')}}" alt="سیستم آموزشی">
                        <p>تقویم آموزشی</p>
                    </a>
                </section>
            </div>
            <section id="hot-news">
                <ul>
                    @foreach($hot_news as $hot)
                        <li><a href="/{{ConvPostType($hot->post_type)}}/{{$hot->hifen_title}}">{{$hot->title}}</a></li>
                    @endforeach
                </ul>
            </section>
        </div>

    </section>
@stop