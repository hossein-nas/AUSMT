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
            <article class="slide-show">
                <ul>
                    <?Php $i='active' ?>
                    @foreach($posts as $post)
                        <li class="{{$i}}"><a href="/{{ConvPostType($post->post_type)}}/{{$post->hifen_title}}">
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
                        <li class="{{$i}}"><a href="/{{ConvPostType($post->post_type)}}/{{$post->hifen_title}}">{{$post->title}}</a></li>
                        <?php $i='' ?>
                    @endforeach
                </ul>
            </article>
            <article class="readmore">
                <a href="/readmore/posts">مشاهده خبرهای بیشتر</a>
            </article>
        </div>

        {{-- POST Section END --}}

        <div class="notice slideshow">
            <article class="slide-show">
                <ul>
                    <?Php $i='active' ?>
                    @foreach($notfications as $notfication)
                        <li class="{{$i}}"><a href="/{{ConvPostType($notfication->post_type)}}/{{$notfication->hifen_title}}">
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
                        <li class="{{$i}}"><a href="/{{ConvPostType($notfication->post_type)}}/{{$notfication->hifen_title}}">{{$notfication->title}}</a></li>
                        <?php $i='' ?>
                    @endforeach
                </ul>
            </article>
            <article class="readmore">
                <a href="/readmore/notfications">مشاهده خبرهای بیشتر</a>
            </article>
        </div>


        <div class="conference">
            <article class="slide-show">
                <ul>
                    <?Php $i='active' ?>
                    @foreach($seminars as $seminar)
                        <li class="{{$i}}"><a href="/{{ConvPostType($seminar->post_type)}}/{{$seminar->hifen_title}}">
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
                        <li class="{{$i}}"><a href="/{{ConvPostType($seminar->post_type)}}/{{$seminar->hifen_title}}">{{$seminar->title}}</a></li>
                        <?php $i='' ?>
                    @endforeach
                </ul>
            </article>
            <article class="readmore">
                <a href="/readmore/seminars">مشاهده خبرهای بیشتر</a>
            </article>
        </div>
        <div class="incoming-events">
            @foreach($incomings as $in)
            <section>
                <a href="/incoming/{{$in->hifen_title}}">
                    <div class="day">
                        <span>{{$jalali->forge($in->created_at->timestamp)->format("%d")}}</span>
                        <span>{{$jalali->forge($in->created_at->timestamp)->format("%B")}}</span>
                    </div>
                    <p>{{$in->title}}</p>
                </a>
            </section>
            @endforeach
        </div>
        <div class="other"></div>
    </div>

</div>