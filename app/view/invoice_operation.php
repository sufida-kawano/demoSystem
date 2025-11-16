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
                        <form action="<?=SYSTEM_DIR?>/invoice/processing/<?=$targetId?>" method="post">
                            <div class="main-area">
                                <div class="bg-white p-5 mt-3">
                                    <div class="row">
                                        <div class="col-3">
                                            ステータス
                                            <select name="contents[status]" class="form-select">
                                                <option value="提出未" <?= $contents['status'] == '提出未' ? 'selected' : '';?>>提出未</option>
                                                <option value="提出済" <?= $contents['status'] == '提出済' ? 'selected' : '';?>>提出済</option>
                                                <option value="入金済" <?= $contents['status'] == '入金済' ? 'selected' : '';?>>入金済</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            発行日
                                            <input type="date" class="form-control" name="contents[target_date]" value="<?= $contents['target_date'];?>">
                                        </div>
                                        <div class="col-3">
                                            お支払期日
                                            <input type="date" class="form-control" name="contents[payment_method]" value="<?= $contents['payment_method'];?>">
                                        </div>
                                        <div class="col-12">
                                            摘要
                                            <input type="text" class="form-control" name="contents[summary]" value="<?= $contents['summary'];?>">
                                        </div>
                                        <div class="col-12 mt-3 bg-h">取引先情報</div>
                                        <div class="col-3">
                                            顧客名
                                            <select name="contents[customer_id]" class="form-select">
                                                <option value="">-</option>
                                                <?php foreach((array)$customerArr as $key => $value){?>
                                                    <?php
                                                        $customerContents = json_decode($value['contents_json'],true);
                                                    ?>
                                                    <option value="<?= $value['id']; ?>" <?= $value['id'] == $contents['customer_id'] ? 'selected' : '';?>><?= $customerContents['company_name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-1">
                                            敬称
                                            <select name="contents[client_keisho]" class="form-select">
                                                <option value="御中" <?= $contents['client_keisho'] == '御中' ? 'selected' : '';?>>御中</option>
                                                <option value="殿" <?= $contents['client_keisho'] == '殿' ? 'selected' : '';?>>殿</option>
                                                <option value="様" <?= $contents['client_keisho'] == '様' ? 'selected' : '';?>>様</option>
                                            </select>
                                        </div>
                                        <div class="col-12"></div>
                                        <div class="col-12 mt-3 bg-h">提出元情報</div>
                                        <div class="col-3">
                                            氏名
                                            <input type="text" class="form-control" name="contents[representative_name]" value="<?= $contents['representative_name'];?>">
                                        </div>
                                        <div class="col-3">
                                            電話番号
                                            <input type="tel" class="form-control" name="contents[tel]" value="<?= $contents['tel'];?>">
                                        </div>
                                        <div class="col-3">
                                            メールアドレス
                                            <input type="email" class="form-control" name="contents[email]" value="<?= $contents['email'];?>">
                                        </div>
                                        <div class="col-12"></div>
                                        <div class="col-3">
                                            郵便番号
                                            <input type="text" class="form-control" name="contents[post_code]" value="<?= $contents['post_code'];?>">
                                        </div>
                                        <div class="col-9">
                                            住所
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
                                        <div class="col-12 mt-3 bg-h">備考</div>
                                        <div class="col-12">
                                            備考
                                            <textarea class="form-control" name="contents[memo]" rows="5"><?= $contents['memo'];?></textarea>
                                        </div>
                                        <div class="col-12 mt-5 bg-h">計算処理</div>
                                    </div>

                                    <!-- ----------------------------------------------------------------------------------------------------------------- -->
                                    <div class="row" id='copyarea' style="display: none;">
                                        <!-- 項目名、単価、数量、単位、合計、税率のフォーム -->
                                        <div class="col-4">
                                            項目
                                            <input type="text" class="form-control item" name="subContents[][item]" value="">
                                        </div>
                                        <div class="col-2">
                                            単価
                                            <input type="number" class="form-control price" name="subContents[][price]" value="">
                                        </div>
                                        <div class="col-1">
                                            数量
                                            <input type="number" class="form-control quantity" name="subContents[][quantity]" value="">
                                        </div>
                                        <div class="col-1">
                                            単位
                                            <select class="form-control unit" name="subContents[][unit]">
                                                <option value=""></option>
                                                <option value="式" selected>式</option>
                                                <option value="ページ">ページ</option>
                                                <option value="人">人</option>
                                                <option value="人日">人日</option>
                                                <option value="日">日</option>
                                                <option value="個">個</option>
                                                <option value="回">回</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            合計
                                            <input type="text" class="form-control total" name="subContents[][total]" value="" readonly>
                                        </div>
                                        <div class="col-1">
                                            税率(%)
                                            <select class="form-select tax-rate" name="subContents[][tax_rate]">
                                                <option value=""></option>
                                                <option value="10" selected>10</option>
                                                <option value="8">8</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- この下に要素を追加していく -->
                                    <div id='addarea'>
                                        <?php foreach ($subContents as $rowIndex => $item) { ?>
                                            <?php if (is_array($item)) {  ?>
                                                <div class="row">
                                                    <div class="col-4">
                                                        項目<?= $subContents[$rowIndex]['item']; ?>
                                                        <input type="text" class="form-control item" name="subContents[<?= $rowIndex; ?>][item]" value="<?= $subContents[$rowIndex]['item']; ?>">
                                                    </div>
                                                    <div class="col-2">
                                                        単価
                                                        <input type="text" class="form-control price" name="subContents[<?= $rowIndex;?>][price]" value="<?= $subContents[$rowIndex]['price']; ?>">
                                                    </div>
                                                    <div class="col-1">
                                                        数量
                                                        <input type="number" class="form-control quantity" name="subContents[<?= $rowIndex;?>][quantity]" value="<?= $subContents[$rowIndex]['quantity']; ?>">
                                                    </div>
                                                    <div class="col-1">
                                                        単位
                                                        <select class="form-control unit" name="subContents[<?= $rowIndex;?>][unit]">
                                                            <option value=""></option>
                                                            <option value="式" <?= ($subContents[$rowIndex]['unit'] === '式') ? 'selected' : '' ?>>式</option>
                                                            <option value="ページ" <?= ($subContents[$rowIndex]['unit'] === 'ページ') ? 'selected' : '' ?>>ページ</option>
                                                            <option value="人" <?= ($subContents[$rowIndex]['unit'] === '人') ? 'selected' : '' ?>>人</option>
                                                            <option value="人日" <?= ($subContents[$rowIndex]['unit'] === '人日') ? 'selected' : '' ?>>人日</option>
                                                            <option value="日" <?= ($subContents[$rowIndex]['unit'] === '日') ? 'selected' : '' ?>>日</option>
                                                            <option value="個" <?= ($subContents[$rowIndex]['unit'] === '個') ? 'selected' : '' ?>>個</option>
                                                            <option value="回" <?= ($subContents[$rowIndex]['unit'] === '回') ? 'selected' : '' ?>>回</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-3">
                                                        合計
                                                        <input type="text" class="form-control total" name="subContents[<?= $rowIndex; ?>][total]" value="<?= $subContents[$rowIndex]['total']; ?>" readonly>
                                                    </div>
                                                    <div class="col-1">
                                                        税率(%)
                                                        <select class="form-select tax-rate" name="subContents[<?= $rowIndex;?>][tax_rate]">
                                                            <option value=""></option>
                                                            <option value="10" <?= ($subContents[$rowIndex]['tax_rate'] === '10') ? 'selected' : '' ?>>10</option>
                                                            <option value="8" <?= ($subContents[$rowIndex]['tax_rate'] === '8') ? 'selected' : '' ?>>8</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <!-- ボタングループ -->
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary addbtn" type="button" style="margin-top: 15px;">入力フォーム追加</button>
                                            <button class="btn btn-danger deletebtn" type="button" style="margin-top: 15px;">最後の1行を消去</button>
                                        </div>
                                    </div>
                                    <!-- 合計計算 -->
                                    <div class="row">
                                        <div class="col-2">
                                            端数処理
                                            <select class="form-select rounding" name="subContents[rounding]">
                                                <option value="round" <?= ($subContents['rounding'] === 'round') ? 'selected' : '' ?>>四捨五入</option>
                                                <option value="floor" <?= ($subContents['floor'] === 'floor') ? 'selected' : '' ?>>切り捨て</option>
                                                <option value="ceil" <?= ($subContents['ceil'] === 'ceil') ? 'selected' : '' ?>>切り上げ</option>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            小計
                                            <input type="text" class="form-control subtotal" name="subContents[subtotal]" value="<?= $subContents['subtotal'];?>" readonly>
                                        </div>
                                        <div class="col-2">
                                            消費税(8%)
                                            <input type="text" class="form-control tax-8" name="subContents[tax_8]" value="<?= $subContents['tax_8'];?>" readonly>
                                        </div>
                                        <div class="col-2">
                                            消費税(10%)
                                            <input type="text" class="form-control tax-10" name="subContents[tax_10]" value="<?= $subContents['tax_10'];?>" readonly>
                                        </div>
                                        <div class="col-2">
                                            合計金額
                                            <input type="text" class="form-control total-amount" name="subContents[total_amount]" value="<?= $subContents['total_amount'];?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
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
            <script>
                $(document).ready(function() {
                    var rowCount = $('#addarea .row').length; // 行の番号を保持する変数

                    // 入力フォームの追加
                    $('.addbtn').click(function() {
                        var copyform = $('#copyarea').html();
                        var newRow = $(copyform).clone();
                        newRow.find(':input').each(function(index, element) {
                            var newName = $(element).attr('name').replace(/\[\]/, '[' + rowCount + ']');
                            $(element).attr('name', newName);
                            $(element).val('');
                        });
                        rowCount++; // 行の番号をインクリメント
                        var newRowHTML = $('<div>').append(newRow).html();
                        $('#addarea').append("<div class='row'>" + newRowHTML + "</div>");
                        totalcal();
                    });

                    // フォームを送信する際に非表示の要素を無効化する
                    $('form').submit(function() {
                        $('#copyarea').find(':input').prop('disabled', true);
                    });

                    // 入力フォームの削除（下から）
                    $(document).on('click', '.deletebtn', function() {
                        if ($('#addarea .row').length > 0) {
                            $('#addarea .row').last().remove();
                            totalcal();
                        }
                    });

                    // 各入力欄の変更時に合計金額を計算する
                    $(document).on('change', '.price, .quantity, .total, .tax-rate, .rounding', function() {
                        totalcal();
                    });

                    // 初期状態での計算処理
                    totalcal();

                    // 端数処理方法の変更時に合計金額を計算するイベントリスナー
                    $(document).on('change', '.rounding', function() {
                        totalcal();
                    });

                    // 合計金額を計算する関数
                    function totalcal() {
                        var money_sub = 0;
                        var money_tax8 = 0;
                        var money_tax10 = 0;
                        var money_total = 0;
                        var tax_method = $('.rounding').val();

                        // 各行に対する計算処理
                        $('#addarea .row').each(function(index, element) {
                            var money = parseFloat($(element).find('.price').val()) || 0;
                            var item = parseInt($(element).find('.quantity').val()) || 0;
                            var parameters = parseInt($(element).find('.tax-rate').val()) || 0;

                            var total = money * item;
                            $(element).find('.total').val(total);

                            money_sub += total;
                            if (parameters == 8) {
                                money_tax8 += total * 0.08;
                            }
                            if (parameters == 10) {
                                money_tax10 += total * 0.10;
                            }
                        });

                       // 税金の四捨五入、切り捨て、切り上げ処理（各税金ごとに適用）
                        money_tax8 = applyRounding(money_tax8, tax_method);
                        money_tax10 = applyRounding(money_tax10, tax_method);

                        // 小計と合計金額の四捨五入、切り捨て、切り上げ処理
                        money_sub = applyRounding(money_sub, tax_method);
                        money_total = applyRounding(money_sub + money_tax8 + money_tax10, tax_method);

                        // 税金計算の四捨五入、切り捨て、切り上げを行う関数
                        function applyRounding(amount, method) {
                            if (method === 'round') {
                                return Math.round(amount);
                            } else if (method === 'floor') {
                                return Math.floor(amount);
                            } else if (method === 'ceil') {
                                return Math.ceil(amount);
                            }
                            return amount;
                        }

                        // 合計金額の計算
                        money_total = money_sub + money_tax8 + money_tax10;

                        $('.subtotal').val(money_sub);
                        $('.tax-8').val(money_tax8);
                        $('.tax-10').val(money_tax10);
                        $('.total-amount').val(money_total);
                    }
                });
            </script>

        </body>
        </html>