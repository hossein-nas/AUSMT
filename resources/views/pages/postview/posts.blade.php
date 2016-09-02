@extends('pages.post')

@section('post-section')
    <img src="{{asset($post->image)}}" alt="post image">
    <h1 class="title"><a href="/{{ConvPostType($post->post_type)}}/{{$post->hifen_title}}">{{$post->title}}</a></h1>
    <div class="content">
    {{$post->content}}
    </div>
    <div class="details">
    <ul>
    <li>{{$jalali->forge($post->created_at->timestamp)->format("%A %e %B %Y")}}</li>
    <li>{{$post->user->name}}</li>
    <li>{{$post->created_at->format('H:i')}}</li>
    </ul>
    </div>
@stop