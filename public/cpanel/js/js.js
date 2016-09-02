
$(document).ready(function(){
    $('.nav-vertical>ul>li>a').click(function(){
        $(this).next().slideToggle(300);
    });

    $('.tick').each(function () {
        if($(this).next().prop('checked')){
            $(this).addClass('active');
        }
    });

    $('.niceradio').bind('click',function(ev){
        ev.preventDefault();
        var name=$(this).children().children(":radio").prop("name")
        if(name.indexOf('[]')>0){
            name = name.substr(0,name.indexOf('[]'));
        }
        var path="*:checked[name="+name+"]";
        var oldChecked=$(path);
        oldChecked.prev().removeClass("active");
        oldChecked.attr("checked",false);
        var newChecked=$(this).children().children(":radio");
        newChecked.prev().addClass("active");
        newChecked.prop("checked",true);
    });

    $('.nicecheck').bind('click',function(ev){
        ev.preventDefault();
        
        var elem=$(this).children().children(":checkbox");
        if(elem.prop("checked")==true){
            elem.prev().removeClass("active");
            elem.prop("checked",false);
        }else{
            var name=$(this).children().children(":checkbox").prop("name")
            if(name.indexOf('[]')>0){
                name = name.substr(0,name.indexOf('[]'));
            }
            var path="*:checked[name="+name+"]";
            var oldChecked=$(path);
            oldChecked.prev().removeClass("active");
            oldChecked.prop("checked",false);
            elem.prev().addClass("active");
            elem.prop("checked",true);
        }


    });

    // Choose File ///////////////////////////////////////////////////////////////////////////
    $('.file .choosefile').bind('click', function () {          // baz kardan panjare
        $('.window').show();
    })
    $('.window .exit').bind('click', function () {              // bastan panjare
        $('.filestat p').html("");
        $('.filestat input').val("");
        $('.window').hide();
    })
    $('.window .submit').bind('click', function () {              // submit panjare
        var addr = $('.window .tmp').val().substr($('.window .tmp').val().indexOf('./img')) // in alamalyat baraie hazf noghte aval (../img->./img) baraie inke ax haa dar safhe index site dorost nemaiesh dade shavand
        $('.filestat p').html(addr );
        $('.filestat input').val( addr);
        $('.window').hide();
    })
    $('.window .content>*').hide();                             // ebteda tamamie mohtavaii ke dar element .content hast ra hide() mikonim
    $('.window .content>*').each(function () {                  // ba in func baraie har element daroon .content test mikonim ke index an ba index elementi ke dar class .tab class .active darad barabar bashad show() mikonim
        if($(this).index()==$('.window .tab .active').index())
            $(this).show();
    });
    $('.window .tab li').bind('click', function (e) {           // injad halat dynamic baraie tab ha
        var index = $(this).index()+1;
        $('.window .tab .active').removeClass('active');
        $(this).addClass('active');
        $('.window .content>*').hide();
        var selector=".window .content :nth-child("+index+")";
        $(selector).fadeIn(200);
    })

    $(".imagedir .dir img").bind('click', function () {
        $(this).parent().children('img').each(function () {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        $('.window .tmp').val($(this).attr('src'));         // taghir meghdar element hidden tmp baraie bargasht dadan address pic entekhabi be safhe asli ... element tmp movaghati ast

    })
    $(".uploadimage .choosefile").click(function () {       // shabih sazi click bar roie element file
        $(".uploadimage input[type='file']").click();
    })
    $(".uploadimage input[type='file']").on('change', function () { // in func baraie in ast ke rang element انتخاب فایل ra avaz konad
        var name = $(this).val()
        var index = name.lastIndexOf('.');
        var mimeType = name.substr(index+1);

        if(!(mimeType=='png' || mimeType=='gif' || mimeType=='jpg' )) {
            $(this).val("");
            alert('فقط تصاویر با فرمت png یا jpg یا gif را می توانید آپلود کنید')
        }
        if($(this).val().length>1){
            $(".uploadimage .choosefile").removeClass('btn-flat-default').addClass('btn-flat-green');
        }else{
            $(".uploadimage .choosefile").removeClass('btn-flat-green').addClass('btn-flat-default');
        }

    })

    $("#formUpload").on('submit',function(){                // ersal ba ajax
        event.preventDefault();
        var form_data = new FormData($(this).get(0));
        $.ajax({
            url:"./actions/upload.php",
            type : "POST",
            data : form_data,
            cache : false,
            contentType : false,
            processData : false,
            timeout:30000,
            enctype: 'multipart/form-data',
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress', function (e) {
                        if(e.lengthComputable){
                            $('.uploadimage .msg').html(parseInt((e.loaded/ e.total)*100)+"%");
                        }
                    })
                }
                return myXhr;
            },
            beforeSend: function () {
                if(!$(".uploadimage input[type='file']").val()){
                    $('.uploadimage .msg').html('فایلی بارگذاری نشده است');
                    return false
                }
            },
            success : function(e){
                $('.uploadimage .msg').html("فایل با موفقیت آپلود شد");
                $('.window .tmp').val(e);
            },
            error: function (e) {
                $('.uploadimage .msg').html(e);
            }
        })
    })
    // Choose File ///////////////////////////////////////////////////////////////////////////


});

