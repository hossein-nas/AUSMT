@extends('pages.post')
<?php
$comments = $incoming->comments()->verifiedCm();
$post_id = $incoming->id;
?>
@section('post-section')
{{--    <img src="{{asset($incoming->image)}}" alt="{{$incoming->title}}">--}}
    <h1 class="title"><a href="/{{$incoming->posttype->name}}/{{$incoming->hifen_title}}">{{$incoming->title}}</a></h1>
    <div class="content">
    {!! $incoming->content !!}
    </div>
    <div class="details">
        <ul>
            <li>{{toPersianNums($jalali->forge($incoming->created_at->timestamp)->format("%A %e %B %Y"))}}</li>
            <li>{{$incoming->user->name}}</li>
            <li>{{toPersianNums($incoming->created_at->format('H:i'))}}</li>
        </ul>
    </div>
    @include('pages.postview.includes.comments')
@stop

