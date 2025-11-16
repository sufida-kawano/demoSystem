        <?php include(dirname(__FILE__) . "/../head.php"); ?>

        <body>
            <div class="range-left"> <?php include(dirname(__FILE__) . "/../side.php"); ?> </div>
            <div class="range-right"> <?php include(dirname(__FILE__) . "/../header.php"); ?> <main>
                    <?php include(dirname(__FILE__) . "/../parts/message.php"); ?>
                    <!-- ーーーーーーー -->
                    <div class="width-98">
                        <div class="main-area">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="<?= SYSTEM_DIR;?>/project/operation">
                                    <button type="button" class="b-btn">案件登録</button>
                                </a>
                                <div class="w-25">検索&nbsp;<input id="keyword" type="text" class="form-control" onclick="search();"></div>
                            </div>
                            <div class="bg-white p-5 mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="80px;">No.</th>
                                            <th width="100px">進捗状況</th>
                                            <th width="150px">契約日</th>
                                            <th width="150px">営業種別</th>
                                            <th width="150px">制作方法</th>
                                            <th width="300px">会社名</th>
                                            <th width="300px">案件名</th>
                                            <th width="150px">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach((array)$viewList as $key => $value){ ?>
                                            <?php
                                                $contents = json_decode($value['contents_json'],true);
                                            ?>
                                            <tr>
                                                <td><?= $value['id'];?></td>
                                                <td><?= $contents['progress'];?></td>
                                                <td><?= $contents['contract_date'];?></td>
                                                <td><?= $contents['business_type'];?></td>
                                                <td><?= $contents['production_contents'];?></td>
                                                <td><?= $customerViewArr[$contents['company_name']];?></td>
                                                <td><?= $contents['project_name'];?></td>
                                                <td>
                                                    <a href="<?= SYSTEM_DIR; ?>/project/operation/<?= $value['id'];?>">
                                                        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-external-link-alt"></i></button>
                                                    </a>
                                                    <a href="<?= SYSTEM_DIR;?>/project/delete/<?= $value['id'];?>" onclick="return confirm('本当に削除してもよろしいですか？');">
                                                        <button type="button"class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
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
