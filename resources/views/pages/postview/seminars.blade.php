@extends('pages.post')
<?php
$comments = $seminar->comments()->verifiedCm();
$post_id = $seminar->id;
?>
@section('post-section')
    <img src="{{asset($seminar->image)}}" alt="{{$seminar->title}}">
    <h1 class="title"><a href="/{{$seminar->posttype->name}}/{{$seminar->hifen_title}}">{{$seminar->title}}</a></h1>
    <div class="content">
        {!! $seminar->content !!}
    </div>
    <div class="details">
        <ul>
            <li>{{toPersianNums($jalali->forge($seminar->created_at->timestamp)->format("%A %e %B %Y"))}}</li>
            <li>{{$seminar->user->name}}</li>
            <li>{{toPersianNums($seminar->created_at->format('H:i'))}}</li>
        </ul>
    </div>
    @include('pages.postview.includes.comments')

@stop

