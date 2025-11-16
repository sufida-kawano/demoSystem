<?php
    $nowUrl = explode("/", $_GET['url'])[0];
?>
<article>
    <div class="side-area">
        <div class="side-conteiner">
            <!-- ロゴ -->
            <div class="mb-4">
                <a href="<?php echo SYSTEM_DIR; ?>/todo">
                    <img src="<?= SYSTEM_DIR;?>/public/image/logo.png" alt="ロゴ" class="system_logo">
                </a>
            </div>
            <!-- メニュー -->
            <ul class="side-menu">
                <a href="<?php echo SYSTEM_DIR; ?>/todo">
                    <li class="d-flex align-items-center gap-3 <?= $nowUrl == 'todo' ? 'active' : '';?>">
                        <i class="far fa-calendar-alt"></i>
                        TODOリスト
                    </li>
                </a>
                <a href="<?php echo SYSTEM_DIR; ?>/apo">
                    <li class="d-flex align-items-center gap-3 <?= $nowUrl == 'apo' ? 'active' : '';?>">
                        <i class="far fa-calendar-check"></i>
                        アポイントメント管理
                    </li>
                </a>
                <a href="<?php echo SYSTEM_DIR; ?>/customer">
                    <li class="d-flex align-items-center gap-3 <?= $nowUrl == 'customer' ? 'active' : '';?>">
                        <i class="far fa-address-card"></i>
                        顧客管理
                    </li>
                </a>
                <a href="javascript:alert('現在、作成中');">
                    <li class="d-flex align-items-center gap-3 <?= $nowUrl == 'estimate' ? 'active' : '';?>">
                        <i class="fas fa-book"></i>
                        見積書管理
                    </li>
                </a>
                <!-- <a href="<?php echo SYSTEM_DIR; ?>/estimate">
                    <li class="d-flex align-items-center gap-3 <?= $nowUrl == 'estimate' ? 'active' : '';?>">
                        <i class="fas fa-book"></i>
                        見積管理
                    </li>
                </a> -->
                <a href="<?php echo SYSTEM_DIR; ?>/invoice">
                    <li class="d-flex align-items-center gap-3 <?= $nowUrl == 'invoice' ? 'active' : '';?>">
                        <i class="fas fa-book"></i>
                        請求書管理
                    </li>
                </a>
            </ul>
        </div>
    </div>
</article>