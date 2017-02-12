    @if(count($f_menu))
        <div class="fast-menu">
            @foreach($f_menu as $key => $it)
                <section >
                    <a href="{{$it['href']}}">
                        <img src="{{$it['image']}}" alt="{{$it['name']}}">
                        <p>{{$it['name']}}</p>
                    </a>
                </section>
            @endforeach
        </div>
    @endif
    {{--<section>
        <a href="#">
            <img src="./img/system-amozeshi.png" alt="سیستم آموزشی">
            <p>سیستم آموزشی</p>
        </a>
    </section>
    <section>
        <a href="#">
            <img src="./img/system-taghzie.png" alt="سیستم آموزشی">
            <p>سیستم تغذیه</p>
        </a>
    </section>
    <section>
        <a href="#">
            <img src="./img/post-electronic.png" alt="سیستم آموزشی">
            <p>پست الکترونیک</p>
        </a>
    </section>
    <section>
        <a href="#">
            <img src="./img/system-sabtnam.png" alt="سیستم آموزشی">
            <p>سیستم ثبت نام</p>
        </a>
    </section>
    <section>
        <a href="#">
            <img src="./img/taghvim-amozeshi.png" alt="سیستم آموزشی">
            <p>تقویم آموزشی</p>
        </a>
    </section>--}}
