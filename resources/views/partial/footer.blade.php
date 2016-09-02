<footer>
    <section class="three-part">
        <h3>دسترسی سریع</h3>
        <ul>
            @foreach($fast_links as $link)
            <li><a href="{{ $link->value }}">{{ $link->name }}</a></li>
            @endforeach
        </ul>
    </section>
    <section class="three-part">
        <h3>پیوند ها</h3>
        <ul>
            @foreach($links as $link)
                <li><a href="{{ $link->value }}">{{ $link->name }}</a></li>
            @endforeach
        </ul>
    </section>
    <section class="three-part">
        <a href="#"> <img id="amol-logo" src="{{asset('img/amol_name_footer.png')}}" alt="دانشگاه فناوری های نوین آمل"> </a>
        <table>
            <tr>
                <td colspan="2">آدرس: مازندران، آمل، خیابان طالقانی، اباذر35</td>
            </tr>
            <tr>
                <td>تلفن :</td>
                <td>011-44153452</td>
            </tr>
            <tr>
                <td>کد پستی :</td>
                <td>4615863111</td>
            </tr>
            <tr>
                <td>نمابر :</td>
                <td>011-44271054</td>
            </tr>
            <tr>
                <td>پست الکترونیک :</td>
                <td>info@ausmt.ac.ir</td>
            </tr>
        </table>
    </section>
    <p class="copyright">
        تمامی محتوای سایت برای دانشگاه تخصصی فناوری های نوین آمل محفوظ میباشد
        <a href="/designer/">طراحی و توسعه : حسین نصیری</a>
    </p>
</footer>