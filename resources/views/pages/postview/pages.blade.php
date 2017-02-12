@extends('pages.post')

@section('post-section')
    <h1 class="title"><a href="/{{$page->posttype->name}}/{{$page->hifen_title}}">{{$page->title}}</a></h1>
    <div class="content">
        {!! $page->content !!}
    </div>
@stop

