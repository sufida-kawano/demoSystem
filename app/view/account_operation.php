        <?php include(dirname(__FILE__) . "/../head.php"); ?>

        <body>
            <div class="range-left"> <?php include(dirname(__FILE__) . "/../side.php"); ?> </div>
            <div class="range-right"> <?php include(dirname(__FILE__) . "/../header.php"); ?>
                <main>
                    <?php include(dirname(__FILE__) . "/../parts/message.php"); ?>
                    <!-- ーーーーーーー -->
                    <div class="width-98">
                        <form action="<?=SYSTEM_DIR?>/account/processing/<?=$targetId?>" method="post" enctype="multipart/form-data">
                            <div class="main-area">
                                <div class="bg-white p-5 mt-3">
                                    <div class="row">
                                        <div class="col-12 mt-3 bg-h">アカウント情報</div>
                                        <div class="col-10">
                                            会社名<br>
                                            <input type="text" class="form-control" name="contents[company_name]" value="<?= $contents['company_name'];?>">
                                        </div>
                                        <div class="col-12"></div>
                                        <div class="col-3">
                                            名前<br>
                                            <input type="text" class="form-control" name="contents[name]" value="<?= $contents['name'];?>">
                                        </div>
                                        <div class="col-3">
                                            ふりがな<br>
                                            <input type="text" class="form-control" name="contents[kana]" value="<?= $contents['kana'];?>">
                                        </div>
                                        <div class="col-12"></div>
                                        <div class="col-3">
                                            Tel<br>
                                            <input type="tel" class="form-control" name="contents[tel]" value="<?= $contents['tel'];?>">
                                        </div>
                                        <div class="col-3">
                                            Email<br>
                                            <input type="email" class="form-control" name="contents[email]" value="<?= $contents['email'];?>">
                                        </div>
                                        <div class="col-12"></div>
                                        <div class="col-3">
                                            郵便番号<br>
                                            <input type="text" class="form-control" name="contents[post_code]" value="<?= $contents['post_code'];?>">
                                        </div>
                                        <div class="col-9">
                                            住所<br>
                                            <input type="text" class="form-control" name="contents[address]" value="<?= $contents['address'];?>">
                                        </div>
                                        <div class="col-12 mt-3 bg-h">銀行情報</div>
                                        <div class="col-4">
                                            銀行名
                                            <input type="text" class="form-control" name="contents[bank_name]" value="<?= $contents['bank_name'];?>">
                                        </div>
                                        <div class="col-3">
                                            支店名
                                            <input type="text" class="form-control" name="contents[branch_name]" value="<?= $contents['branch_name'];?>">
                                        </div>
                                        <div class="col-2">
                                            店番
                                            <input type="text" class="form-control" name="contents[salesperson]" value="<?= $contents['salesperson'];?>">
                                        </div>
                                        <div class="col-4">
                                            口座番号
                                            <input type="text" class="form-control" name="contents[account_number]" value="<?= $contents['account_number'];?>">
                                        </div>
                                        <div class="col-4">
                                            名義人
                                            <input type="text" class="form-control" name="contents[holder_name]" value="<?= $contents['holder_name'];?>">
                                        </div>
                                        <div class="col-12 mt-3 bg-h">ログイン情報</div>
                                        <div class="col-4">
                                            ログインID
                                            <input type="text" class="form-control" name="login_id" value="<?= $login_id;?>">
                                        </div>
                                        <div class="col-4">
                                            ログインパスワード
                                            <input type="text" class="form-control" name="login_password" value="<?= $login_password;?>">
                                        </div>
                                        <div class="col-12 mt-5 text-center">
                                            <button type="submit" class="g-btn">更新をする</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </body>

        </html>
