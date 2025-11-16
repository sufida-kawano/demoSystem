        <?php include(dirname(__FILE__) . "/../head.php"); ?>

        <body>
            <div class="range-left"> <?php include(dirname(__FILE__) . "/../side.php"); ?> </div>
            <div class="range-right"> <?php include(dirname(__FILE__) . "/../header.php"); ?> <main>
                    <?php include(dirname(__FILE__) . "/../parts/message.php"); ?>
                    <div class="width-98">
                        <div class="main-area">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="<?= SYSTEM_DIR;?>/customer/operation">
                                    <button type="button" class="b-btn">顧客登録</button>
                                </a>
                                <div class="w-25">検索&nbsp;<input id="keyword" type="text" class="form-control"
                                        onclick="search();"></div>
                            </div>
                            <div class="bg-white p-5 mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="100">No.</th>
                                            <th width="300">会社名</th>
                                            <th width="200">名前</th>
                                            <th width="200">Tel</th>
                                            <th width="300">Email</th>
                                            <th width="150">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach((array)$viewList as $key => $value){ ?>
                                            <?php
                                                $contents = json_decode($value['contents_json'],true);
                                            ?>
                                            <tr>
                                                <td><?= $value['id'];?></td>
                                                <td><?= $contents['company_name'];?></td>
                                                <td><?= $contents['name'];?></td>
                                                <td><?= $contents['tel'];?></td>
                                                <td><?= $contents['email'];?></td>
                                                <td>
                                                    <a href="<?= SYSTEM_DIR; ?>/customer/operation/<?= $value['id'];?>">
                                                        <button type="button" class="btn btn-outline-secondary"><i class="fas fa-external-link-alt"></i></button>
                                                    </a>
                                                    <a href="<?= SYSTEM_DIR;?>/customer/delete/<?= $value['id'];?>" onclick="return confirm('本当に削除してもよろしいですか？');">
                                                        <button type="button" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></button>
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
