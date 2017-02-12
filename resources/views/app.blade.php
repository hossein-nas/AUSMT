<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>@yield('title','دانشگاه فناوری های نوین آمل')</title>
	{!! Html::style('css/main.css')!!}
	@yield('styles')
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include('favicon')
</head>
<body>


<div class="container">
	<header>
		<div class="logo"><img src="{{asset('img/amol_logo.png')}}" alt="LOGO"></div>
		<img class="uni-name" src="{{asset('img/amol_name.png')}}" alt="AMOL UNIVERSITY SPECIAL MODERN TECHNOLOGIES">
		<div class="lang">
			<a href="#">EN</a>
			<a class='acitve' href="#">FA</a>
		</div>
		<div class="search-box">
			<input type="text">
			<button><img src="{{asset('img/search_btn.png')}}" alt=""/></button>
		</div>
		<div class="time-box">
			<div>
				<p class="day">{{$jalali->format('%A')}}</p>
				<p class="date"><span>{{toPersianNums($jalali->format('%d'))}}</span>{{$jalali->format('%B')}}</p>
			</div>
			<p class="time">
				<span class="min">{{toPersianNums($jalali->format('%M'))}}</span>
				<span class="seperator">:</span>
				<span class="hour">{{toPersianNums($jalali->format('%H'))}}</span>
			</p>
		</div>
	</header>

	@include('partial/nav')

	@yield('content')

	@include('partial.footer')

</div>
<!-- java script  -->

{!! Html::script('js/jq.js')!!}
<?php
$cashe = rand(100, 1000);
?>
{!! Html::script("js/mainjs-min.js?v=$cashe")!!}
@yield('scripts')
<!-- java script  -->
</body>
</html>