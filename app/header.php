<style>
    .dropdown-menu {
        top: -3px;
        left: -32px;
    }

    .dropdown-toggle {
        background: none;
        border-style: none;
        color: #000;
    }

    .show>.btn-secondary.dropdown-toggle {
        background: none;
        border-style: none;
        color: #000;
    }

    .dropdown-menu {
        will-change: transform;
        background: rgb(255, 255, 255);
        position: absolute;
        right: 55px;
        width: 200px;
        font-family: 游ゴシック,"Yu Gothic",YuGothic,"Hiragino Kaku Gothic ProN","Hiragino Kaku Gothic Pro",メイリオ,Meiryo,"ＭＳ ゴシック",sans-serif;
        border-radius: 4px;
        z-index: 999999;
        box-shadow: rgb(0 0 0 / 20%) 0px 2px 10px;
        padding: 0;
        line-height: 15px;
        text-align: center;
        top: 8px;
        left: 0px;
        transform: translate3d(-37px, 36px, 0px);
    }

    .dropdown-item {
        padding: 10px !important;
        border-bottom: 2px solid #eee;
    }
</style>
<!-- ヘッダーメニュー -->
<header>
    <div class="header-pt">
        <div class="flex-between align-items-center">
            <div class="flex-left"></div>
            <div class="flex-right">
                <!-- menu -->
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo SYSTEM_DIR; ?>/public/image/profile_icon.png" style="width:30px;">&emsp;設定
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?php echo SYSTEM_DIR; ?>/account">マイページ</a></li>
                        <li><a class="dropdown-item" href="<?php echo SYSTEM_DIR; ?>/login/logout">ログアウト</a></li>
                    </ul>
                </div>
                <!-- end menu -->
            </div>
        </div>
    </div>
</header>