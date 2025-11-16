        <?php include(dirname(__FILE__) . "/../head.php"); ?>
        <body>
            <div class="range-left"> <?php include(dirname(__FILE__) . "/../side.php"); ?> </div>
            <div class="range-right"> <?php include(dirname(__FILE__) . "/../header.php"); ?>
                <main>
                    <?php include(dirname(__FILE__) . "/../parts/message.php"); ?>
                    <div class="width-98">
                        <form action="<?=SYSTEM_DIR?>/customer/processing/<?=$targetId?>" method="post" enctype="multipart/form-data">
                            <div class="main-area">
                                <div class="bg-white p-5 mt-3">
                                    <div class="row">
                                        <div class="col-12"> 会社名<br>
                                            <input type="text" class="form-control" name="contents[company_name]"
                                                value="<?= $contents['company_name'];?>" data-input = 'text'>
                                        </div>
                                        <div class="col-6"> 法人番号<br>
                                            <input type="text" class="form-control" name="contents[company_number]"
                                                value="<?= $contents['company_number'];?>" data-input = 'text'>
                                        </div>
                                        <div class="col-6"> 適格請求書番号<br>
                                            <input type="text" class="form-control" name="contents[invoice_number]"
                                                value="<?= $contents['invoice_number'];?>" data-input = 'text'>
                                        </div>
                                        <div class="col-6"> 名前<br>
                                            <input type="text" class="form-control" name="contents[name]"
                                                value="<?= $contents['name'];?>" data-input = 'text'>
                                        </div>
                                        <div class="col-6"> ふりがな<br>
                                            <input type="text" class="form-control" name="contents[kana]"
                                                value="<?= $contents['kana'];?>" data-input = 'text'>
                                        </div>
                                        <div class="col-6"> Tel<br>
                                            <input type="text" class="form-control" name="contents[tel]"
                                                value="<?= $contents['tel'];?>" data-input = 'tel'>
                                        </div>
                                        <div class="col-6"> Email<br>
                                            <input type="text" class="form-control" name="contents[email]"
                                                value="<?= $contents['email'];?>" data-input = 'email'>
                                        </div>
                                        <div class="col-3"> 郵便番号<br>
                                            <input type="text" class="form-control" name="contents[post_code]"
                                                value="<?= $contents['post_code'];?>" data-input = 'text'>
                                        </div>
                                        <div class="col-9"> 住所<br>
                                            <input type="text" class="form-control" name="contents[address]"
                                                value="<?= $contents['address'];?>" data-input = 'text'>
                                        </div>
                                        <div class="col-9"> ホームページURL<br>
                                            <input type="url" class="form-control" name="contents[url]"
                                                value="<?= $contents['url'];?>" data-input = 'url'>
                                        </div>
                                        <div class="col-12"> 備考 <textarea class="form-control" name="contents[memo]"
                                                rows="5" data-input = 'text'><?= $contents['memo'];?></textarea>
                                        </div>
                                        <div class="col-12 mt-5 text-center">
                                            <?php if($targetId){ ?>
                                                <button type="submit" class="g-btn">更新をする</button>
                                            <?php }else{ ?>
                                                <button type="submit" class="b-btn">登録をする</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </body>

        <!-- <script>
            $(document).on('focus','.form-control',function(){
                let data = $(this).data('input');
                if(data == 'text'){
                    if($(this).val() == ''){
                        $(this).prev().before("<div class=''>未入力です。</div>");
                    }
                }
            });
        </script> -->
    </html>
