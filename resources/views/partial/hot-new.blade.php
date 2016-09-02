<section class="hot-news">
    <ul>

        @foreach($hot_news as $hot)
            <li><a href="/{{ConvPostType($hot->post_type)}}/{{$hot->hifen_title}}">{{$hot->title}}</a></li>
        @endforeach
    </ul>
</section>