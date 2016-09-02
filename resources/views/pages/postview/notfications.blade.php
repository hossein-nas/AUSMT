@extends('pages.post')

@section('post-section')
    <img src="{{asset($notfication->image)}}" alt="post image">
    <h1 class="title"><a href="/{{ConvPostType($notfication->post_type)}}/{{$notfication->hifen_title}}">{{$notfication->title}}</a></h1>
    <div class="content">
        {{$notfication->content}}
    </div>
    <div class="details">
        <ul>
            <li>{{$jalali->forge($notfication->created_at->timestamp)->format("%A %e %B %Y")}}</li>
            <li>{{$notfication->user->name}}</li>
            <li>{{$notfication->created_at->format('H:i')}}</li>
        </ul>
    </div>
@stop