@extends('pages.post')
<?php
$comments = $notfication->comments()->verifiedCm();
$post_id = $notfication->id;
?>

@section('post-section')
    <img src="{{asset($notfication->image)}}" alt="{{$notfication->title}}">
    <h1 class="title"><a
                href="/{{$notfication->posttype->name}}/{{$notfication->hifen_title}}">{{$notfication->title}}</a></h1>
    <div class="content">
        {!! $notfication->content !!}
    </div>
    <div class="details">
        <ul>
            <li>{{toPersianNums($jalali->forge($notfication->created_at->timestamp)->format("%A %e %B %Y"))}}</li>
            <li>{{$notfication->user->name}}</li>
            <li>{{toPersianNums($notfication->created_at->format('H:i'))}}</li>
        </ul>
    </div>
    @include('pages.postview.includes.comments')

@stop