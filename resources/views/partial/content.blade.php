<div class="content">
    <div class="navbar">
        <ul>
            <li class="active" data-rel="news">اخبار دانشگاه</li>
            <li data-rel="notice">اطـــلاعیه ها</li>
            <li data-rel="conference">همایشها و سمینارها</li>
            <li data-rel="incoming-events">رویدادهای پیش رو</li>
            <li data-rel="other">اخبار متفرقه</li>
        </ul>
    </div>

    <div class="body">

        {{-- POST Section --}}
        <div class="news slideshow">
            @if($posts->count())
                <article class="slide-show">
                    <ul>
                        <?Php $i='active' ?>
                        @foreach($posts as $post)
                            <li class="{{$i}}"><a href="{{route($post->posttype->name,$post->hifen_title)}}">
                                    <img src="{{$post->image}}" alt="{{$post->title}}"/>
                                    <div class="details">
                                        <span class="view">{{$post->visit}} بار بازدید</span>
                                        <span class="date">{{$jalali->forge($post->created_at->timestamp)->ago()}}</span>
                                    </div>
                                </a></li>
                            <?php $i='' ?>
                        @endforeach
                    </ul>
                </article>
                <article class="links">
                    <ul>
                        <?Php $i='active' ?>
                        @foreach($posts as $post)
                            <li class="{{$i}}"><a href="{{route($post->posttype->name,$post->hifen_title)}}">{{$post->title}}</a></li>
                            <?php $i='' ?>
                        @endforeach
                    </ul>
                </article>
                <article class="readmore">
                    <a href="/readmore/posts">مشاهده خبرهای بیشتر</a>
                </article>
            @else
                <span class="no-content"> محتوایی برای نمایش نیست.  </span>
            @endif
        </div>

        {{-- POST Section END --}}

        <div class="notice slideshow">
            @if($notfications->count())
                <article class="slide-show">
                    <ul>
                        <?Php $i='active' ?>
                        @foreach($notfications as $notfication)
                            <li class="{{$i}}"><a href="{{route($notfication->posttype->name,$notfication->hifen_title)}}">
                                    <img src="{{$notfication->image}}" alt="{{$notfication->title}}"/>
                                    <div class="details">
                                        <span class="view">{{$notfication->visit}} بار بازدید</span>
                                        <span class="date">{{$jalali->forge($notfication->created_at->timestamp)->ago()}}</span>
                                    </div>
                                </a></li>
                            <?php $i='' ?>
                        @endforeach
                    </ul>
                </article>
                <article class="links">
                    <ul>
                        <?Php $i='active' ?>
                        @foreach($notfications as $notfication)
                            <li class="{{$i}}"><a href="{{route($notfication->posttype->name,$notfication->hifen_title)}}">{{$notfication->title}}</a></li>
                            <?php $i='' ?>
                        @endforeach
                    </ul>
                </article>
                <article class="readmore">
                    <a href="/readmore/notfications">مشاهده خبرهای بیشتر</a>
                </article>
            @else
                <span class="no-content"> محتوایی برای نمایش نیست.  </span>
            @endif
        </div>


        <div class="conference">
            @if($seminars->count())
                <article class="slide-show">
                    <ul>
                        <?Php $i='active' ?>
                        @foreach($seminars as $seminar)
                            <li class="{{$i}}"><a href="{{route($seminar->posttype->name,$seminar->hifen_title)}}">
                                    <img src="{{$seminar->image}}" alt="{{$seminar->title}}"/>
                                    <div class="details">
                                        <span class="view">{{$seminar->visit}} بار بازدید</span>
                                        <span class="date">{{$jalali->forge($seminar->created_at->timestamp)->ago()}}</span>
                                    </div>
                                </a></li>
                            <?php $i='' ?>
                        @endforeach
                    </ul>
                </article>
                <article class="links">
                    <ul>
                        <?Php $i='active' ?>
                        @foreach($seminars as $seminar)
                            <li class="{{$i}}"><a href="{{route($seminar->posttype->name,$seminar->hifen_title)}}">{{$seminar->title}}</a></li>
                            <?php $i='' ?>
                        @endforeach
                    </ul>
                </article>
                <article class="readmore">
                    <a href="/readmore/seminars">مشاهده خبرهای بیشتر</a>
                </article>
            @else
                <span class="no-content"> محتوایی برای نمایش نیست.  </span>
            @endif
        </div>
        <div class="incoming-events">
            @if($incomings->count())
                @foreach($incomings as $in)
                    <section>
                        <a href="{{route($in->posttype->name,$in->hifen_title)}}">
                            <div class="day">
                                <span>{{$jalali->forge($in->expired_at->timestamp)->format("%e")}}</span>
                                <span>{{$jalali->forge($in->expired_at->timestamp)->format("%B")}}</span>
                            </div>
                            <div class="wrapper"><p>{{$in->title}}</p></div>
                        </a>
                    </section>
                @endforeach
            @else
                <span class="no-content"> محتوایی برای نمایش نیست.  </span>
            @endif
        </div>
        <div class="other">
            @if($others->count())
                <ul>
                    @foreach($others as $oth)
                        <li><a href="{{route($oth->posttype->name,$oth->hifen_title)}}">{{$oth->title}}</a></li>
                    @endforeach
                </ul>
                @else
                    <span class="no-content"> محتوایی برای نمایش نیست.  </span>
            @endif
        </div>
    </div>

</div>