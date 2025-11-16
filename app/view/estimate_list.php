        <?php include(dirname(__FILE__) . "/../head.php"); ?>

        <body>
            <div class="range-left"> <?php include(dirname(__FILE__) . "/../side.php"); ?> </div>
            <div class="range-right"> <?php include(dirname(__FILE__) . "/../header.php"); ?>
                <main>
                    <?php include(dirname(__FILE__) . "/../parts/message.php"); ?>
                    <div class="width-98">
                        <div class="main-area">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="<?= SYSTEM_DIR; ?>/invoice/operation"><button type="button" class="b-btn">見積書登録</button></a>
                                <div class="w-25">検索&nbsp;<input id="keyword" type="text" class="form-control" onclick="search();"></div>
                            </div>
                            <div class="bg-white p-5 mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">ステータス</th>
                                            <th scope="col">発行日</th>
                                            <th scope="col">お支払期日</th>
                                            <th scope="col">顧客名</th>
                                            <th scope="col">摘要</th>
                                            <th scope="col">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach((array)$invoiceArr as $key => $value){ ?>
                                            <?php
                                                $contents = json_decode($value['contents_json'],true);
                                            ?>
                                            <tr style="<?= $contents['status'] == '提出未' ? 'background:#ffff005e;' : ($contents['status'] == '入金済' ? 'background:#eee;' : '');?>">
                                                <td><?= $value['id'];?></td>
                                                <td><?= $contents['status'];?></td>
                                                <td><?= $contents['target_date'];?></td>
                                                <td><?= $contents['payment_method'];?></td>
                                                <td><?= $customerNameArr[$contents['customer_id']];?></td>
                                                <td><?= $contents['summary'];?></td>
                                                <td>
                                                    <a href="<?= SYSTEM_DIR; ?>/invoice/operation/<?= $value['id'];?>">
                                                        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-external-link-alt"></i></button>
                                                    </a>
                                                    <a href="<?= SYSTEM_DIR; ?>/invoice/print/<?= $value['id'];?>">
                                                        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-print"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <script src="<?php echo SYSTEM_DIR; ?>/public/js/public.js"></script>
            <script src="https://cdn.jsdelivr.net/gh/DeuxHuitHuit/quicksearch/dist/jquery.quicksearch.min.js"></script>
            <script>
                function search() {
                    $('#keyword').quicksearch('table tbody tr');
                }
            </script>
        </body>
        </html>