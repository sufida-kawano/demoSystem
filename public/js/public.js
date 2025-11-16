    // **************************************
    // 削除
    // **************************************
    $('.delete_btn').hide();
    $(document).on('click', '.altitude-open', function() {
        $('.delete_btn').fadeToggle();
    });
    // **************************************
    // サイドバー
    // **************************************
    // // メニュー　表示・非表示
    // $('.sub-menu').hide();
    // $(document).on('click', '.main-menu', function() {
    //     $(this).next().slideToggle();
    //     //  dropdown
    // });
    // //  メニュー　表示・非表示
    // $('.sub-menu ul').hide();
    // $(document).on('click', '.sub-menu01', function() {
    //     $(this).next().slideToggle();
    // });
    // // 対象のページの時にメニューを表示
    // $('#parent-active').next().css('display', 'block');
    // $('#child-active').css('display', 'block');
    // $('#page-active').css('background-color', '#203864');
    // **************************************
    // style画面
    // **************************************

    // タイプにチェックをすると、成果目標の設定エリアが表示----------------------------------------------
    $('.store-show01').hide();
    $(document).on('click', '.ck1', function() {
        if (!$(this).prop('checked') == false) {
            $('.store-show01').show();
        } else {
            $('.store-show01').hide();
        }
    });

    $('.store-show02').hide();
    $(document).on('click', '.ck2', function() {
        if (!$(this).prop('checked') == false) {
            $('.store-show02').show();
        } else {
            $('.store-show02').hide();
        }
    });

    // 目標ボタンを押下すると、報酬設定が表示------------------------------------------------------------
    $('.target01').hide();
    $(document).on('click', '.objective_btn', function() {
        $('.target01').show();
    });

    $('.target02').hide();
    $(document).on('click', '.objective_btn2', function() {
        $('.target02').show();
    });

    // チェックされていたら、背景色を白
    //チェックされていない場合は、背景色をグレー
    $('.ck-cheak').css('background', '#e9ecef');
    $('.ck-cheak').find($("input[type='number']")).hide();
    $(document).on('click', '.ck-cheak', function() {
        $(this).css('background', '#fff');
        $(this).find($("input[type='number']")).show();
    });

    // SP メニュー表示
    $(document).on('click', '#sp-menu-togle', function() {
        $('article').show();
        $(this).addClass('sp-menu-close');
        $(this).text('閉じる');
    });
    $(document).on('click', '.sp-menu-close', function() {
        $('article').hide();
        $(this).removeClass('sp-menu-close');
        $(this).text('MENU');
    });
    