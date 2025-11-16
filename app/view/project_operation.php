        <?php include(dirname(__FILE__) . "/../head.php"); ?>

        <body>
            <div class="range-left"> <?php include(dirname(__FILE__) . "/../side.php"); ?> </div>
            <div class="range-right"> <?php include(dirname(__FILE__) . "/../header.php"); ?>
                <main>
                    <?php include(dirname(__FILE__) . "/../parts/message.php"); ?>
                    <!-- ーーーーーーー -->
                    <div class="width-98">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">案件詳細</button>
                            </li>
                            <?php if(isset($targetId)){ ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="document-tab" data-bs-toggle="tab" data-bs-target="#document" type="button" role="tab" aria-controls="document" aria-selected="false">資料アップロード</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">メール情報</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">対応内容</button>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form action="<?=SYSTEM_DIR?>/project/processing/<?=$targetId?>" method="post">
                                    <div class="main-area">
                                        <div class="bg-white p-5">
                                            <div class="row">
                                                <div class="col-2">
                                                    進捗状況
                                                    <select name="contents[progress]" class="form-select">
                                                        <option value="未着手" <?= ($contents['progress'] === '未着手') ? 'selected' : ''; ?>>未着手</option>
                                                        <option value="着手済み" <?= ($contents['progress'] === '着手済み') ? 'selected' : ''; ?>>着手済み</option>
                                                        <option value="納品済み" <?= ($contents['progress'] === '納品済み') ? 'selected' : ''; ?>>納品済み</option>
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    契約日
                                                    <input type="date" class="form-control" name="contents[contract_date]" value="<?= $contents['contract_date'];?>">
                                                </div>
                                                <div class="col-2">
                                                    営業種別
                                                    <select name="contents[business_type]" class="form-select">
                                                        <option value="">-</option>
                                                        <option value="直営業" <?= ($contents['business_type'] === '直営業') ? 'selected' : ''; ?>>直営業</option>
                                                        <option value="ココナラ" <?= ($contents['business_type'] === 'ココナラ') ? 'selected' : ''; ?>>ココナラ</option>
                                                        <option value="ランサーズ" <?= ($contents['business_type'] === 'ランサーズ') ? 'selected' : ''; ?>>ランサーズ</option>
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    制作方法
                                                    <select name="contents[production_contents]" class="form-select">
                                                        <option value="">-</option>
                                                        <option value="HTML" <?= ($contents['production_contents'] === 'HTML') ? 'selected' : ''; ?>>HTML</option>
                                                        <option value="WordPress" <?= ($contents['production_contents'] === 'WordPress') ? 'selected' : ''; ?>>WordPress</option>
                                                        <option value="システム" <?= ($contents['production_contents'] === 'システム') ? 'selected' : ''; ?>>システム</option>
                                                    </select>
                                                </div>
                                                <div class="col-2">
                                                    価格
                                                    <input type="text" class="form-control" name="contents[price]" value="<?= $contents['price'];?>">
                                                </div>
                                                <div class="col-5">
                                                    会社名
                                                    <select name="contents[company_name]" class="form-select">
                                                        <option value="">-</option>
                                                        <?php foreach((array)$customerList as $key => $customerValue){ ?>
                                                            <?php
                                                                $customerContents = json_decode($customerValue['contents_json'],true);
                                                            ?>
                                                            <option value="<?= $customerValue['id'] ?>" <?= $customerValue['id'] == $contents['company_name'] ? 'selected' : ''; ?>>
                                                                <?= $customerContents['company_name'] ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    案件名
                                                    <input type="text" class="form-control" name="contents[project_name]" value="<?= $contents['project_name'];?>">
                                                </div>
                                                <div class="col-12">
                                                    案件URL
                                                    <input type="url" class="form-control" name="contents[url]" value="<?= $contents['url'];?>">
                                                </div>
                                                <div class="col-12">
                                                    案件概要
                                                    <textarea class="form-control" name="contents[project_summary]" rows="5"><?= $contents['project_summary'];?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    サーバー情報
                                                    <textarea class="form-control" name="contents[server_info]" rows="15"><?= $contents['server_info'];?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    ドメイン情報
                                                    <textarea class="form-control" name="contents[domain_info]" rows="15"><?= $contents['domain_info'];?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    FTP情報
                                                    <textarea class="form-control" name="contents[ftp_info]" rows="15"><?= $contents['ftp_info'];?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    データベース情報
                                                    <textarea class="form-control" name="contents[db_info]" rows="15"><?= $contents['db_info'];?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    ログイン情報
                                                    <textarea class="form-control" name="contents[login_info]" rows="15"><?= $contents['login_info'];?></textarea>
                                                </div>
                                                <div class="col-6">
                                                    仮環境情報
                                                    <textarea class="form-control" name="contents[temporary_environment]" rows="15"><?= $contents['temporary_environment'];?></textarea>
                                                </div>
                                                <div class="col-12">
                                                    備考
                                                    <textarea class="form-control" name="contents[memo]" rows="10"><?= $contents['memo'];?></textarea>
                                                </div>
                                                <div class="col-12 mt-5 text-center">
                                                    <?php if($targetId){ ?>
                                                        <button type="submit" class="g-btn" name="project_form">更新をする</button>
                                                    <?php }else{ ?>
                                                        <button type="submit" class="b-btn" name="project_form">登録をする</button>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="document" role="tabpanel" aria-labelledby="document-tab">
                                <form action="<?=SYSTEM_DIR?>/project/processing/<?=$targetId?>" method="post" enctype="multipart/form-data">
                                    <div class="main-area">
                                        <div class="bg-white p-5">
                                            <div class="row">
                                                <div class="col-6">
                                                    資料アップロード
                                                    <input type="file" name="documentContents[document_file][]" class="form-control" multiple>
                                                </div>
                                                <div class="col-12">
                                                    一覧
                                                    <ul>
                                                        <?php foreach((array)$documentContents['document_file'] as $fileKey => $fileValue){ ?>
                                                            <li>
                                                                <?= ++$fileKey;?>.&emsp;<a href="<?= SYSTEM_DIR; ?>/public/uploads/document/<?= $targetId;?>/<?= $fileValue['machining_file_name'];?>" target="break"><?= $fileValue['original_file_name'];?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-5 text-center">
                                                    <button type="submit" class="g-btn" name="document_form">更新をする</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form action="<?=SYSTEM_DIR?>/project/processing/<?=$targetId?>" method="post">
                                    <div class="main-area">
                                        <div class="bg-white p-5">
                                            <?php for($i = 1; $i <= 10; $i++){ ?>
                                                <div class="row">
                                                    <div class="col-2">
                                                        利用者名
                                                        <input type="text" name="mailContents[name][<?= $i;?>]" class="form-control" value="<?= $mailContents["name"][$i];?>">
                                                    </div>
                                                    <div class="col-2">
                                                        サーバー名（ホスト）
                                                        <input type="text" name="mailContents[server_name][<?= $i;?>]" class="form-control" value="<?= $mailContents["server_name"][$i];?>">
                                                    </div>
                                                    <div class="col-2">
                                                        ユーザー名
                                                        <input type="text" name="mailContents[user_name][<?= $i;?>]" class="form-control" value="<?= $mailContents["user_name"][$i];?>">
                                                    </div>
                                                    <div class="col-2">
                                                        パスワード
                                                        <input type="text" name="mailContents[password][<?= $i;?>]" class="form-control" value="<?= $mailContents["password"][$i];?>">
                                                    </div>
                                                    <div class="col-1">
                                                        Port:IMAP
                                                        <input type="text" name="mailContents[imap][<?= $i;?>]" class="form-control" value="<?= $mailContents["imap"][$i];?>">
                                                    </div>
                                                    <div class="col-1">
                                                        Port:POP
                                                        <input type="text" name="mailContents[pop][<?= $i;?>]" class="form-control" value="<?= $mailContents["pop"][$i];?>">
                                                    </div>
                                                    <div class="col-1">
                                                        Port:SMTP
                                                        <input type="text" name="mailContents[smtp][<?= $i;?>]" class="form-control" value="<?= $mailContents["smtp"][$i];?>">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-12 mt-5 text-center">
                                                    <button type="submit" class="g-btn" name="mail_form">更新をする</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <form action="<?=SYSTEM_DIR?>/project/processing/<?=$targetId?>" method="post" enctype="multipart/form-data">
                                    <div class="main-area">
                                        <div class="bg-white p-5">
                                            <?php for($i = 1; $i <= 10; $i++){ ?>
                                                <div class="row mb-5">
                                                    <div class="col-3">
                                                        対応日
                                                        <input type="date" name="supportContents[support_date][<?= $i;?>]" class="form-control" value="<?= $supportContents["support_date"][$i];?>">
                                                    </div>
                                                    <div class="col-9">
                                                        対応概要
                                                        <input type="text" name="supportContents[support_summary][<?= $i;?>]" class="form-control" value="<?= $supportContents["support_summary"][$i];?>">
                                                    </div>
                                                    <div class="col-12">
                                                        対応内容
                                                        <textarea class="form-control" name="supportContents[support_contents][<?= $i;?>]" rows="5"><?= $supportContents["support_contents"][$i];?></textarea>
                                                    </div>
                                                    <div class="col-6">
                                                        添付資料
                                                        <input type="file" name="supportContents[support_file][<?= $i;?>][]" class="form-control" multiple>
                                                    </div>
                                                    <div class="col-12">
                                                        資料一覧
                                                        <ul class="d-flex flex-wrap gap-3">
                                                            <?php foreach((array)$supportContents['support_file'][$i] as $fileKey => $fileValue){ ?>
                                                                <li>
                                                                    <a href="<?= SYSTEM_DIR; ?>/public/uploads/project/<?= $targetId;?>/<?= $fileValue['machining_file_name'];?>" target="break"><?= $fileValue['original_file_name'];?></a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 mt-5 text-center">
                                                    <button type="submit" class="g-btn" name="support_form">更新をする</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </body>

        </html>
