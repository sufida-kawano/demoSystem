        <?php include(dirname(__FILE__) . "/../head.php"); ?>
        <body>
            <div class="range-left">
                <?php include(dirname(__FILE__) . "/../side.php"); ?>
            </div>
            <div class="range-right">
                <?php include(dirname(__FILE__) . "/../header.php"); ?>
                <main>
                    <!-- 結果アラート -->
                    <?php if(isset($_SESSION['message'])){ ?>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </symbol>
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </symbol>
                        </svg>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24"><use xlink:href="#check-circle-fill"/></svg>
                            <strong><?= $resultMeg;?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <!-- ーーーーーーー -->
                    <div class="width-98">
                        <div class="main-area">
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" class="b-btn" data-bs-toggle="modal" data-bs-target="#createModal">TODO登録</button>
                                <div class="w-25">検索&nbsp;<input id="keyword" type="text" class="form-control" onclick="search();"></div>
                            </div>
                            <div class="bg-white p-5 mt-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">いつから〜いつまで</th>
                                            <th scope="col">タイトル</th>
                                            <th scope="col">内容</th>
                                            <th scope="col">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach((array)$todoArr as $key => $value){ ?>
                                            <?php
                                                $contents = json_decode($value['contents_json'],true);
                                            ?>
                                            <tr>
                                                <th scope="row"><?= ++$key;?></th>
                                                <td><?= $contents['start_date'];?>〜<?= $contents['end_date'];?></td>
                                                <td><?= $contents['todo'];?></td>
                                                <td><?= $contents['contents'];?></td>
                                                <td>
                                                    <a href="<?= SYSTEM_DIR; ?>/todo/complete/<?= $value['id'];?>">
                                                        <?php if($value['complete_flg'] == 0){ ?>
                                                            <button type="button" class="btn btn-outline-secondary">未完了</button>
                                                        <?php }else{?>
                                                            <button type="button" class="btn btn-outline-secondary" disabled>完了</button>
                                                        <?php } ?>
                                                    </a>
                                                    <a href="<?= SYSTEM_DIR; ?>/todo/edit/<?= $value['id'];?>"><button type="button" class="btn btn-outline-secondary">詳細</button></a>
                                                    <a href="<?= SYSTEM_DIR;?>/todo/delete/<?= $value['id'];?>"><button type="button" class="btn btn-outline-danger">削除</button></a>
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
           
            <!-- 登録　Modal -->
            <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <form action="<?=SYSTEM_DIR?>/todo/execution" method="post">
                    <div class="modal-dialog" style="max-width:800px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">登録</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-3">
                                        いつから
                                        <input type="date" class="form-control" name="contents[start_date]">
                                    </div>
                                    <div class="col-3">
                                        いつまで
                                        <input type="date" class="form-control" name="contents[end_date]">
                                    </div>
                                    <div class="col-12">
                                        タイトル
                                        <input type="text" class="form-control" name="contents[todo]" >
                                    </div>
                                    <div class="col-12">
                                        内容
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
                    $('#keyword').quicksearch('table tbody tr');
                }
            </script>
        </body>
        </html>