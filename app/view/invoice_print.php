
<!DOCTYPE html>
<html class="no-js" lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>【請求書】<?= $customerContents['company_name']; ?>御中</title>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!--印刷用スタイルシート-->
        <style>
            *{
                font-family: '游ゴシック体', 'Yu Gothic', YuGothic, 'ヒラギノ角ゴ Pro', 'Hiragino Kaku Gothic Pro', 'メイリオ', 'Meiryo', sans-serif;
            }
            p{
                margin-bottom:0px !important;
                font-size:12px;
            }
            table td,table th{
                font-size:12px;
                padding:3px 5px !important;
                vertical-align: middle;
            }
            table th{
                background:#eee !important;
            }
            .client-area p{
                font-size:14px;
            }
            .client-area .client-name{
                font-size:16px;
                font-weight: bold;
            }
            .content-print{
                width: 172mm;
                height: 270mm;
                border: 1px solid #000000;
                padding: 30px;
                margin-top: 10px;
                position: relative;
                margin:0 auto;
            }
            .hidden-print {
                text-align: center;
                margin: 30px 0px;
            }
            .inkan-area{
                width: 80px;
                margin-left: auto;
                border: 1px dotted;
                padding: 10px;
                text-align: center;
            }

            @media print {
                .hidden-print {display: none;}
                .content-print{
                    top:0 !IMPORTANT;
                    left:0 !IMPORTANT;
                    width:100% !IMPORTANT;
                    height:255mm !IMPORTANT;
                    border:none !IMPORTANT;
                    padding:0px !important;
                    margin:0px !important;
                    page-break-after: always;
                }
            }
        </style>
    </head>
    <body>
        <div class="hidden-print">
            <button type="button" class="btn btn-dark" onclick="window.history.back();">このページを閉じる</button>
            <button type="button" class="btn btn-primary" onclick="window.print(); return false;">印刷</button>
        </div>
        <div class='content-print'>
            <div class="d-flex gap-5">
                <div class="w-50 left-box pt-3 client-area">
                    <p class="border-bottom client-name mb-3"><?= $customerContents['company_name']; ?>&nbsp;<?= $contents['client_keisho'];?></p>
                    <p>代表者名：<?= $customerContents['name'];?>&nbsp;様</p>
                    <p>TEL：<?= $customerContents['tel'];?></p>
                    <p>Email：<?= $customerContents['email'];?></p>
                    <p>〒<?= $customerContents['post_code'];?></p>
                    <p><?= $customerContents['address'];?></p>
                </div>
                <div class="w-50 right-box">
                    <div class="bg-dark p-2 h5 text-white text-center">請求書</div>
                    <div style="text-align:right;" class="mt-3">
                        <p>発行日:<?= $contents['target_date'];?></p>
                        <p class="mb-3">請求書No.<?= date('ymd',  strtotime($contents['target_date'])).'-'.$targetId;?></p>
                        <p class="">氏名：<?= $contents['representative_name'];?></p>
                        <p class="">TEL：<?= $contents['tel'];?></p>
                        <p class="">Email：<?= $contents['email'];?></p>
                        <p class="">〒<?= $contents['post_code'];?></p>
                        <p class=""><?= $contents['address'];?></p>
                        <div class="mt-3 inkan-area">
                            <img src="<?= SYSTEM_DIR;?>/public/image/inkan.png" style="width:50px;height:50px;object-fit:cover;">
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align:left;">
                <u>ご請求金額　　¥<?= number_format($subContents['total_amount']);?></u>
            </div>
            <div style='text-align:left;font-size:14px;margin-top:20px;'>ご請求内容は以下の通りになります。</div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="500px" style="text-align:center;">項目</th>
                        <th width="150px" style="text-align:center;">単価</th>
                        <th width="80px" style="text-align:center;">数量</th>
                        <th width="100px" style="text-align:center;">単位</th>
                        <th width="150px" style="text-align:center;">小計</th>
                        <th width="80px" style="text-align:center;">税率</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subContents as $rowIndex => $item) { ?>
                        <?php if (is_array($item)) {  ?>
                            <tr>
                                <td><?= $subContents[$rowIndex]['item']; ?></td>
                                <td style="text-align:right;"><?= number_format($subContents[$rowIndex]['price']); ?></td>
                                <td style="text-align:center;"><?= $subContents[$rowIndex]['quantity']; ?></td>
                                <td style="text-align:center;"><?= $subContents[$rowIndex]['unit']; ?></td>
                                <td style="text-align:right;"><?= number_format($subContents[$rowIndex]['total']); ?></td>
                                <td style="text-align:center;"><?= $subContents[$rowIndex]['tax_rate']; ?>%</td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-flex gap-3">
                <div class="w-50">
                    <p>【振込先】</p>
                    <p class="">銀行名：<?= $contents['bank_name'];?></p>
                    <p class="">支店：<?= $contents['branch_name'];?></p>
                    <p class="">店番：<?= $contents['salesperson'];?></p>
                    <p class="">口座番号：<?= $contents['account_number'];?></p>
                    <p class="">振込名義人：<?= $contents['holder_name'];?></p>
                    <p>振込手数料は、ご負担ください。</p>
                    <p class="">お支払期限：<?= $contents['payment_method'];?></p>
                </div>
                <table class="table table-bordered w-50" style="text-align:right;">
                    <tbody>
                        <tr>
                            <th width="40%" style="font-weight: normal;text-align:right;">金額</th>
                            <td width="60%"><?= number_format($subContents['subtotal']);?>円</td>
                        </tr>
                        <tr>
                            <th style="font-weight: normal;text-align:right;">消費税(8%) </th>
                            <td><?= number_format($subContents['tax_8']);?>円</td>
                        </tr>
                        <tr>
                            <th style="font-weight: normal;text-align:right;">消費税(10%) </th>
                            <td><?= number_format($subContents['tax_10']);?>円</td>
                        </tr>
                        <tr>
                            <th style="font-weight: normal;text-align:right;">合計金額</th>
                            <td><?= number_format($subContents['total_amount']);?>円</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <p>備考欄</p>
                <div style="min-height:20mm;font-size:13px;border:1px dotted #999;padding:5px;text-align:left;">
                    <?= $contents['memo'];?>
                </div>
            </div>
        </div>
    </body>
</html>