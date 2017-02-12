@extends('pages.post')
<?php
$comments = $post->comments()->verifiedCm();
$post_id = $post->id;
?>
@section('post-section')
    <img src="{{asset($post->image)}}" alt="{{$post->title}}">
    <h1 class="title"><a href="/{{$post->posttype->name}}/{{$post->hifen_title}}">{{$post->title}}</a></h1>
    <div class="content">
        {!! $post->content !!}
    </div>
    <div class="details">
        <ul>
            <li>{{toPersianNums($jalali->forge($post->created_at->timestamp)->format("%A %e %B %Y"))}}</li>
            <li>{{$post->user->name}}</li>
            <li>{{toPersianNums($post->created_at->format('H:i'))}}</li>
        </ul>
    </div>
    @include('pages.postview.includes.comments')

@stop

