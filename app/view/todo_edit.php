        <?php include(dirname(__FILE__) . "/../head.php"); ?>
        <body>
            <div class="range-left">
                <?php include(dirname(__FILE__) . "/../side.php"); ?>
            </div>
            <div class="range-right">
                <?php include(dirname(__FILE__) . "/../header.php"); ?>
                <main>
                    <div class="width-98">
                        <form action="<?=SYSTEM_DIR?>/todo/execution/<?=$targetId?>" method="post">
                            <div class="main-area">
                                <!-- <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit" class="g-btn">TODO更新</button>
                                </div> -->
                                <div class="bg-white p-5 mt-3">
                                    <div class="row">
                                        <div class="col-3">
                                            いつから
                                            <input type="date" class="form-control" name="contents[start_date]" value="<?= $contents['start_date'];?>">
                                        </div>
                                        <div class="col-3">
                                            いつまで
                                            <input type="date" class="form-control" name="contents[end_date]" value="<?= $contents['end_date'];?>">
                                        </div>
                                        <div class="col-12">
                                            タイトル
                                            <input type="text" class="form-control" name="contents[todo]" value="<?= $contents['todo'];?>">
                                        </div>
                                        <div class="col-12">
                                            内容
                                            <textarea class="form-control" name="contents[contents]" rows="5"><?= $contents['contents'];?></textarea>
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