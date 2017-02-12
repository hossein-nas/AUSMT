<section class="hot-news">
    <ul>

        @foreach($hot_news as $hot)
            <li><a href="/{{$hot->posttype->name}}/{{$hot->hifen_title}}">{{$hot->title}}</a></li>
        @endforeach
    </ul>
</section>