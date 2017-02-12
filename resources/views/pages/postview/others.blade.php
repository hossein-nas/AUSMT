@extends('pages.post')
<?php
$comments = $other->comments()->verifiedCm();
$post_id = $other->id;
?>
@section('post-section')
    <img src="{{asset($other->image)}}" alt="{{$other->title}}">
    <h1 class="title"><a href="/{{$other->posttype->name}}/{{$other->hifen_title}}">{{$other->title}}</a></h1>
    <div class="content">
        {!! $other->content !!}
    </div>
    <div class="details">
        <ul>
            <li>{{toPersianNums($jalali->forge($other->created_at->timestamp)->format("%A %e %B %Y"))}}</li>
            <li>{{$other->user->name}}</li>
            <li>{{toPersianNums($other->created_at->format('H:i'))}}</li>
        </ul>
    </div>
    @include('pages.postview.includes.comments')

@stop

