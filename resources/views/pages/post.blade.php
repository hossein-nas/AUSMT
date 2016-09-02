@extends('app')
@section('content')
    <section class="post">
        <div class="post_content">


            @yield('post-section')

            <div class="comments-box">
                <article class="comment">
                    <div class="header">
                        <section class="name">محمدرضا هدایتی</section>
                        <section class="date">23:57 - چهار شنبه 3 تیر 95 </section>
                    </div>
                    <div class="reply">
							<span>بعد این سی گیگی که دانلود کردی سرعتتو میارن پایین و عملا بی استفاده میشه نت ولی 8 تومن
میدی میای رو طرح بالاتر که دوباره تا سی گیگ بعدی سرعتت میشه مثل قبل</span>
                    </div>
                    <div class="cm">
                        سقف ها برای مصرف منصفانه است دوست عزیز- یعنی برای مثال تا ۳۰ گیگ می تونید
                        با سرعت ۸ مگی که دارید دانلود کنید اما اگر دانلود دیتاتون از ۳۰ گیگابایت بیشتر
                        بشه سرعت اینترنتتون میاد پایین و فرضا میشه ۲ مگابیت (ولی همچنان محدودیت
                        حجمی ندارید و نیاز به خرید حجم اضافی نیست)
                    </div>
                    <span class="rep"></span>
                </article>

                <article class="comment">
                    <div class="header">
                        <section class="name">محمدرضا هدایتی</section>
                        <section class="date">23:57 - چهار شنبه 3 تیر 95 </section>
                    </div>

                    <div class="cm">
                        سقف ها بر
                    </div>
                    <span class="rep"></span>
                </article>

                <article class="write-comment">
                    <form action="post">
                        <input type="text" name="name" placeholder="نام و نام خانوادگی">
                        <input type="email" name="email" placeholder="آدرس الکترونیکی">
                        <textarea name="cm_content" id="cm_content" placeholder="نظر خود را اینجا وارد کنید"></textarea>
                        <input type="submit" name="submit" value="ثبت نظر">
                    </form>
                </article>
            </div>
        </div>
        <div class="post_sidebar">
            <div id="fast-menu">
                <section>
                    <a href="#">
                        <img src="{{asset('img/system-amozeshi.png')}}" alt="سیستم آموزشی">
                        <p>سیستم آموزشی</p>
                    </a>
                </section>
                <section>
                    <a href="#">
                        <img src="{{asset('img/system-taghzie.png')}}" alt="سیستم آموزشی">
                        <p>سیستم تغذیه</p>
                    </a>
                </section>
                <section>
                    <a href="#">
                        <img src="{{asset('img/post-electronic.png')}}" alt="سیستم آموزشی">
                        <p>پست الکترونیک</p>
                    </a>
                </section>
                <section>
                    <a href="#">
                        <img src="{{asset('img/system-sabtnam.png')}}" alt="سیستم آموزشی">
                        <p>سیستم ثبت نام</p>
                    </a>
                </section>
                <section>
                    <a href="#">
                        <img src="{{asset('img/taghvim-amozeshi.png')}}" alt="سیستم آموزشی">
                        <p>تقویم آموزشی</p>
                    </a>
                </section>
            </div>
            <section id="hot-news">
                <ul>
                    @foreach($hot_news as $hot)
                        <li><a href="/{{ConvPostType($hot->post_type)}}/{{$hot->hifen_title}}">{{$hot->title}}</a></li>
                    @endforeach
                </ul>
            </section>
        </div>

    </section>
@stop