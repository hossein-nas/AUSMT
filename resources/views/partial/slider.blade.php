<div class="slider">

    <ul class="slides">
        @foreach($Items as $item)
        <li>
            <img src="{!!$item->image!!}" />
            <a href="/{{$item->posttype->name}}/{{$item->hifen_title}}"> {{$item->title}} </a>
        </li>
        @endforeach
    </ul>
</div>