@extends('app')
@section('content')
    <section class="post">
        <div class="post_content">


            @yield('post-section')


        </div>
        <div class="post_sidebar">

            @if(count($f_menu))
                <div id="fast-menu">
                    @foreach($f_menu as $key => $it)
                        <section >
                            <a href="{{$it['href']}}">
                                <img src="{{$it['image']}}" alt="{{$it['name']}}">
                                <p>{{$it['name']}}</p>
                            </a>
                        </section>
                    @endforeach
                </div>
            @endif

            <section id="hot-news">
                <ul>
                    @foreach($hot_news as $hot)
                        <li><a href="/{{$hot->posttype->name}}/{{$hot->hifen_title}}">{{$hot->title}}</a></li>
                    @endforeach
                </ul>
            </section>
        </div>
    </section>
@stop