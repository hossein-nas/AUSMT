<nav>
    <ul>
        {{--<li><a href="#">صفحه اصلی</a></li>
        <li><a href="#">درباره دانشگاه</a></li>
        <li><span class="expand">دانشکده ها</span>
            <ul class="menu">
                <li>دامپزشکی</li>
                <li>زیست فناوری</li>
                <li><p>فنی مهندسی</p>
                    <ul class="sub-menu">
                        <li>حسین نصیری</li>
                        <li>حسین نصیری</li>
                        <li>حسین نصیری</li>
                    </ul>
                </li>
                <li>گیاهان دارویی</li>
            </ul>
        </li>
        <li ><span class="expand">هیئت علمی ها</span>
            <ul class="menu">
                <li>دکتر صمصامی</li>
                <li>دکتر نظری</li>
                <li>دکتر نیموری</li>
            </ul>
        </li>--}}
        @foreach($navbar as $nav)
            @if($nav['childs'])
                <li><span class="expand">{{$nav['name']}}</span>
                    <ul class="menu">
                    @foreach($nav['childs'] as $child)
                        @if($child['childs'])
                            <li><p >{{$child['name']}}</p>
                            <ul class="sub-menu">
                            @foreach($child['childs'] as $subChilds)
                                <li><a href="{{$subChilds['href']}}">{{$subChilds['name']}}</a></li>
                            @endforeach
                            </ul>
                            </li>
                        @else
                            <li><a href="{{$child['href']}}">{{$child['name']}}</a></li>
                        @endif
                    @endforeach
                    </ul>
                </li>
            @else
                <li><a class="root" href="{{$nav['href']}}">{{$nav['name']}}</a></li>
            @endif
        @endforeach
    </ul>
</nav>