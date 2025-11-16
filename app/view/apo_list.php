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
                        <div class="main-area">
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" class="b-btn" data-bs-toggle="modal" data-bs-target="#createModal">アポ登録</button>
                                <div class="w-25">検索&nbsp;<input id="keyword" type="text" class="form-control" onclick="search();"></div>
                            </div>
                            <div class="row">
                                <?php foreach((array)$apoArr as $key => $value){ ?>
                                    <?php
                                        $contents = json_decode($value['contents_json'],true);
                                    ?>
                                    <div class="col-4 mb-5">
                                        <div class="bg-white p-3">
                                            <iframe src="https://maps.google.co.jp/maps?output=embed&q=<?=$contents['post_code']?><?=$contents['address']?>" width="100%" height="300" frameborder="0" scrolling="no" ></iframe>
                                            <p>顧客名：<?= $customerNameArr[$contents['customer_name']];?></p>
                                            <p>訪問日：<?= $contents['visit_date'];?><?= $contents['visit_time'];?></p>
                                            <p>訪問要件：<?= $contents['visit_title'];?></p>
                                            <p>〒<?= $contents['post_code'];?></p>
                                            <p>住所：<?= $contents['address'];?></p>
                                            <hr>
                                            <div style="text-align:right;">
                                                <a href="<?= SYSTEM_DIR; ?>/apo/operation/<?= $value['id'];?>">
                                                    <button type="button" class="btn btn-outline-secondary"><i class="fas fa-external-link-alt"></i></button>
                                                </a>
                                                <a href="<?= SYSTEM_DIR;?>/apo/delete/<?= $value['id'];?>" onclick="return confirm('本当に削除してもよろしいですか？');">
                                                    <button type="button" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- 登録　Modal -->
            <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <form action="<?=SYSTEM_DIR?>/apo/processing" method="post">
                    <div class="modal-dialog" style="max-width:800px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">登録</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-3">
                                        訪問日
                                        <input type="date" class="form-control" name="contents[visit_date]">
                                    </div>
                                    <div class="col-3">
                                        訪問時間
                                        <input type="text" class="form-control" name="contents[visit_time]" placeholder="00:00">
                                    </div>
                                    <div class="col-12">
                                        訪問用件
                                        <input type="text" class="form-control" name="contents[visit_title]">
                                    </div>
                                    <div class="col-4">
                                        顧客名
                                        <select class="form-select" name="contents[customer_name]">
                                            <option value="">-</option>
                                            <?php foreach((array)$customerArr as $key => $value){?>
                                                <?php
                                                    $contents = json_decode($value['contents_json'],true);
                                                ?>
                                                <option value="<?= $value['id'];?>"><?= $contents['company_name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        担当者
                                        <input type="text" class="form-control" name="contents[manager_name]" >
                                    </div>
                                    <div class="col-12"></div>
                                    <div class="col-3">
                                        郵便番号
                                        <input type="text" class="form-control" name="contents[post_code]">
                                    </div>
                                    <div class="col-9">
                                        住所
                                        <input type="text" class="form-control" name="contents[address]">
                                    </div>
                                    <div class="col-12">
                                        備考
                                        <textarea class="form-control" name="contents[contents]" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary">登録</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script src="<?php echo SYSTEM_DIR; ?>/public/js/public.js"></script>
            <script src ="https://cdn.jsdelivr.net/gh/DeuxHuitHuit/quicksearch/dist/jquery.quicksearch.min.js"></script>
            <script>
                function search(){
                    $('#keyword').quicksearch('.row .col-4');
                }
            </script>
        </body>
        </html>