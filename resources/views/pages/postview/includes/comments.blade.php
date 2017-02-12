<div class="comments-box" id="all-comments">

	@if($comments->count())
		@foreach($comments->get() as $comment)
			<article class="comment" id="num-{{$comment->id}}">
				<div class="header">
					<section class="name">{{$comment->username}}</section>
					<section
							class="date">{{$jalali->forge($comment->created_at->timestamp)->format("%H:%M - %A %e %B %y")}}</section>
				</div>
				@if($comment->hasParent())
					<div class="reply" data-parent="num-{{$comment->parent->id}}">
                            <span>
                                {{$comment->parent->content}}
                            </span>
					</div>
				@endif
				<div class="cm">
					{{$comment->content}}
				</div>
				<span class="rep"></span>
			</article>
		@endforeach
	@else
		<span class="no-comment">
            <span>فعلا نظری ثبت نشده ...</span>
        </span>
	@endif

	<article class="write-comment" id="write-comment">
		{!! Form::open(['url'=>'comment/create/']) !!}
		{!! Form::hidden('post_id',$post_id) !!}
		{!! Form::hidden('parent_id',0) !!}
		{!! Form::text('username',NULL,['placeholder'=>'نام و نام خانوادگی']) !!}
		{!! Form::email('email',NULL,['placeholder'=>'آدرس الکترونیکی']) !!}
		{!! Form::textarea('content',NULL,['placeholder'=>'نظر خود را اینجا وارد کنید','id'=>'cm_content','rows'=>5]) !!}
		{!! Form::submit('ثبت نظر') !!}
		{!! Form::close() !!}
	</article>
	@if($errors->any())
		<ul class="errors">
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif
</div>

@section('scripts')
	{!! Html::script('js/comments.js')!!}
@endsection