@extends('app')
@section('title')
	ورود به پنل کاربری
@endsection

@section('styles')
	{!! Html::style('css/Auth/Auth.css')!!}
@endsection


@section('content')
	<div class="container">
		<div class="row">
			<div class="login">
				<div class="header">ورود به پنل کاربری</div>
				{{Form::open(['class'=>'form-horizontal'])}}
				<div class="form-group">
					{{ Form::label('نام کاربری') }}
					<div class="input">
						{{Form::password('username')}}
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('رمزعبور') }}
					<div class="input">
						{{Form::password('password')}}
					</div>
				</div>
				{{Form::submit('ورود',null,['id'=>'submit'])}}
				{{Form::close()}}
			</div>
		</div>
	</div>

@endsection