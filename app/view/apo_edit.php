        <?php include(dirname(__FILE__) . "/../head.php"); ?>
        <body>
            <div class="range-left">
                <?php include(dirname(__FILE__) . "/../side.php"); ?>
            </div>
            <div class="range-right">
                <?php include(dirname(__FILE__) . "/../header.php"); ?>
                <main>
                    <?php include(dirname(__FILE__) . "/../parts/message.php"); ?>
                    <div class="width-98">
                        <form action="<?=SYSTEM_DIR?>/apo/processing/<?=$targetId?>" method="post">
                            <div class="main-area">
                                <!-- <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="g-btn">アポ更新</button>
                                </div> -->
                                <div class="bg-white p-5 mt-3">
                                    <div class="row">
                                        <div class="col-3">
                                            訪問日
                                            <input type="date" class="form-control" name="contents[visit_date]" value="<?=$contents['visit_date']?>">
                                        </div>
                                        <div class="col-3">
                                            訪問時間
                                            <input type="text" class="form-control" name="contents[visit_time]" value="<?=$contents['visit_time']?>" placeholder="00:00">
                                        </div>
                                        <div class="col-12">
                                            訪問用件
                                            <input type="text" class="form-control" name="contents[visit_title]" value="<?=$contents['visit_title']?>">
                                        </div>
                                        <div class="col-4">
                                            顧客名
                                            <select class="form-select" name="contents[customer_name]">
                                                <option value="">-</option>
                                                <?php foreach((array)$customerArr as $key => $value){?>
                                                    <?php
                                                        $customerContents = json_decode($value['contents_json'],true);
                                                    ?>
                                                    <option value="<?= $value['id']; ?>" <?= $value['id'] == $contents['customer_name'] ? 'selected' : '';?>><?= $customerContents['company_name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            担当者
                                            <input type="text" class="form-control" name="contents[manager_name]" value="<?=$contents['manager_name']?>">
                                        </div>
                                        <div class="col-12"></div>
                                        <div class="col-3">
                                            郵便番号
                                            <input type="text" class="form-control" name="contents[post_code]" value="<?=$contents['post_code']?>">
                                        </div>
                                        <div class="col-9">
                                            住所
                                            <input type="text" class="form-control" name="contents[address]" value="<?=$contents['address']?>">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <iframe src="https://maps.google.co.jp/maps?output=embed&q=<?=$contents['post_code']?><?=$contents['address']?>" width="100%" height="400" frameborder="0" scrolling="no" ></iframe>
                                        </div>
                                        <div class="col-12">
                                            備考
                                            <textarea class="form-control" name="contents[contents]" rows="5"><?=$contents['contents']?></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-5 text-center">
                                            <button type="submit" class="g-btn" name="support_form">更新をする</button>
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