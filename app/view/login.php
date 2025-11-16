<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ログイン</title>
        <link href="<?php echo SYSTEM_DIR; ?>/public/css/reset.css" rel="stylesheet" type="text/css">
        <link href="<?php echo SYSTEM_DIR; ?>/public/css/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo SYSTEM_DIR; ?>/public/css/login.css" rel="stylesheet" type="text/css">
        <!-- Font Awesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <!--bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
        </script>
        <!--**************************** -->
    </head>
    <body class="login-bk-color">
        <main class="form-signin">
            <div class="login-body">
                <form action="<?=SYSTEM_DIR?>/login/cheak" method="post">
                    <img src="<?= SYSTEM_DIR;?>/public/image/logo.png" alt="ロゴ" width="100%">
                    <?php
                    // エラーメッセージが空でなければメッセージを表示
                    if ($errmessage != '') {
                        echo "<p class='alert alert-warning mb-3 '>$errmessage</p>";
                    }
                    ?> <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="login_id" placeholder="name@example.com">
                        <label for="floatingInput"> ID</label>
                    </div>
                    <div class="form-floating mt-3">
                        <input type="password" class="form-control" id="floatingPassword" name="login_password" placeholder="パスワード">
                        <label for="floatingPassword">パスワード</label>
                    </div>
                    <button class="w-100 b-btn">ログイン</button>
                </form>
            </div>
        </main>
    </body>
</html>