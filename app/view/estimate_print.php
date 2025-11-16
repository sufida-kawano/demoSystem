
<!DOCTYPE html>
<html class="no-js" lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>応信開発</title>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
        <link rel="stylesheet" href="assets/css/main.css" />
    <!--印刷用スタイルシート-->
    <style>
    @media print {
        .hidden-print {display: none;}
        .content-print{
                top:0 !IMPORTANT;
                left:0 !IMPORTANT;
                width:172mm !IMPORTANT;
                height:280mm !IMPORTANT;
                border:none !IMPORTANT;
                padding:0px !important;
                margin:0px !important;
                page-break-after: always;
        }
    }
    div{font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .tright{text-align: right;}
    .tleft{text-align: left;}
    .tcenter{text-align: center;}
    .fontsize3 > *{font-size: 3mm;}
    .fontsize4 > *{font-size: 4mm;}
    .fontsize2ex > *{font-size: 2ex;}
    .fontsmall > *{font-size: small;}
    .targets{font-size: 110%;}
    
    /**承認の名前を丸で囲む*/
    .maru{
        font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;
        border:1px solid #999999;
        -webkit-border-radius: 20px;/* width,heightの半分 */
        -moz-border-radius: 20px;
        border-radius: 20px;
    }
    div.box {
        display: -moz-inline-box; /*for Firefox 2*/
        display: inline-block; /*for modern*/
    }
    .seikyu{
        background: #006400;
        padding: 7px 25px;
        color:#ffffff;
        font-size:20px;
    }
    .nenget{
        border-top:2px solid #006400;
        border-bottom:2px solid #006400;
        padding: 2px 10px;
    }
    .infotable{font-size:3.3mm;}
    .infotable table{border:2px solid #006400;}
    .infotable table thead,.infotable table tfoot{border-top:2px solid #006400;border-bottom:2px solid #006400;}
    .yumincho{font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .default_font{font-family: Helvetica , "游ゴシック" , "Yu Gothic" , sans-serif;}
    .default_font2{font-family: "游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .mm3{font-size:3mm;}
    
    .fonttype1{padding:0px 8px;text-align: left;background:#444;color:#fff;font-size:25px;font-weight: 900;font-family: "游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .fonttype2{color:#000;font-size:12px;font-weight: 100;font-family: "游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .fonttype3{color:#000;font-size:12px;font-weight: 100;font-family: "游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .fonttype4{color:#000;font-size:12px;font-weight: 100;font-family: "游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .fonttype5{color:#000;font-size:12px;font-weight: 100;font-family: "游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .fonttype6{color:#000;font-size:12px;font-weight: 100;font-family: "游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .fonttype7{color:#000;font-size:25px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .fonttype8{color:#000;font-size:12px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .fonttype9{color:#000;font-size:11px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .fonttype10{color:#000;font-size:9px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    
    
    .backsubtitle{
        text-align: left;
        font-size:18px;
        background:#ddd;
        padding:5px 10px;
        font-family: "游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;
    }
    .producttable{
        border-collapse: collapse;
        width:100%;
        font-family: "游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;
        font-size:14px;
        margin-top:10px;
        line-height: 20px;
    }
    .producttable thead tr th{
        background:#f7f7f7;
    }
    .moneytable{
        width:280px;
        border-collapse: collapse;
        width:100%;
        font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;
        font-size:12px;
    }
    .td1{width:140px;text-align: right;background:#f7f7f7;}
    .td2{width:140px;text-align: right;}
    .td3{font-size:14px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    .td4{font-size:17px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;}
    
    hr:not(.nostyle) {
            border-top: 1px dashed #bbb;
            border-bottom: none;
            border-left: none;
            border-right: none;
    }
    hr:not(.nostyle):after {
            /*content: '　\002702　切り取り線　';*/
            display: inline-block;
            position: relative;
            top: -12px;
            left: 0px;
            padding: 0 3px;
            background: #FFF;
            color: #000;
            font-size: 10px;
            font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;
    }
	.nebiki{
		text-decoration: line-through;
	}
	.nebiki2{
		color:red;
	}
    </style>
  </head>
  <body>
    <div class="hidden-print" style="text-align:center;margin-bottom:20px;">
        <button type="button" class="default_font" style="font-size:18px;padding:5px 20px;" onclick="javascript:window.open('about:blank','_self').close();">このページを閉じる</button>
        <button type="button" class="default_font print" style="font-size:18px;padding:5px 20px;" onclick="window.print(); return false;">印刷</button>
    </div>
    <center>
                <div class='content-print' style='width:172mm;height:270mm;text-align:center;border: 1px solid #000000;padding:25px;margin-top:10px;position:relative;'>
                    <div style='text-align:left;margin-top:10px;'>
						<span class='fonttype1' style='float:left'>&nbsp;見&nbsp;積&nbsp;書&nbsp;</span>
						<img src='https://sample.stractive.jp/app/package/quotation/assets/img/logo.png' style='float:right;height:50px;'>
						<div style='clear:both;'></div>
					</div>
					

					
					
					<div style='margin-top:10px;'>
						<div style='float:left;width:70%;'>
							<div style='margin-right:10px;border:1px solid #000;padding:10px;text-align:left;color:#333;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;font-size:12px;'>
								株式会社テスト商事								&emsp;
								御中								<hr style='margin:4px 0px;'>
								作業予定期間：2日間								<hr style='margin:4px 0px;'>
								ご担当者様：大野								<hr style='margin:4px 0px;'>
								有効期限：2022-04-30								<hr style='margin:4px 0px;'>
								お支払条件：一括払							</div>
						</div>
						<div style='float:right;width:30%;text-align:right;white-space:pre;' class='fonttype3'><img src='https://sample.stractive.jp/app/package/quotation/assets/img/in.png' style='width:70px;height: 70px;position: absolute;left:620px;top:180px;'><!--
							-->発行日：2022-03-22<br><!--
							-->見積書No：220322-2<br><!--
							-->担当者：平良聡志朗<br><br><!--
							-->株式会社テストCOMPANY
代表取締役　テスト太郎
福岡市中央区天神1-1-25-201
TEL:092-000-0000<!--
						--></div>
						<div style='clear:both;'></div>
					</div>
                    
                    <div style='float:left;text-align: left;line-height: 17px;' class='fonttype6'></div>
                    <div style='float:left;text-align: left;line-height: 17px;' class='fonttype6'>
                    </div>
                    <div style='float:right;text-align: left;line-height: 17px;' class='fonttype6'>
                    </div>
                    <div style='float:right;text-align: left;line-height: 17px;' class='fonttype6'></div>
                    <div style='clear:both;'></div>
					
					<div class='fonttype3' style='margin-top:20px;text-align:left;'>
					件名：HP制作					</div>
                    <table class='producttable' border='1' style='margin:0px;'>
                        <thead>
                            <tr>
                                <th style='width:55%;'>項目</th>
                                <th style='width:9%;'>単価</th>
                                <th style='width:8%;'>数量</th>
                                <th style='width:8%;'>単位</th>
                                <th style='width:15%;'>小計</th>
                                <th style='width:5%;'>税率</th>
                            </tr>
                        </thead>
                        <tbody style="font-size:12px;">
						
						<tr><td style='text-align:left;padding:2px 6px;'>HP制作</td><td style='text-align:right;padding:2px 6px;'>200,000</td><td style='text-align:center;padding:2px 6px;'>1</td><td style='text-align:center;padding:2px 6px;'>式</td><td style='text-align:right;padding:2px 6px;'>200,000</td><td style='text-align:center;padding:2px 6px;'>10%</td></tr><tr><td style='text-align:left;padding:2px 6px;'></td><td style='text-align:right;padding:2px 6px;'></td><td style='text-align:center;padding:2px 6px;'></td><td style='text-align:center;padding:2px 6px;'></td><td style='text-align:right;padding:2px 6px;'></td><td style='text-align:center;padding:2px 6px;'>&emsp;</td></tr><tr><td style='text-align:left;padding:2px 6px;'></td><td style='text-align:right;padding:2px 6px;'></td><td style='text-align:center;padding:2px 6px;'></td><td style='text-align:center;padding:2px 6px;'></td><td style='text-align:right;padding:2px 6px;'></td><td style='text-align:center;padding:2px 6px;'>&emsp;</td></tr>						<!--
                            <tr><td>&emsp;1</td><td style='text-align:left;'>&nbsp;仕様・要求分析・企画</td><td style="text-align: right;">90,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">90,000&emsp;</td></tr>
                            <tr><td>&emsp;2</td><td style='text-align:left;'>&nbsp;環境構築</td><td style="text-align: right;">50,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">50,000&emsp;</td></tr>
                            <tr><td>&emsp;3</td><td style='text-align:left;'>&nbsp;システム設計</td><td style="text-align: right;">290,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">290,000&emsp;</td></tr>
                            <tr><td>&emsp;4</td><td style='text-align:left;'>&nbsp;開発</td><td style="text-align: right;">2,660,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">2,660,000&emsp;</td></tr>
                            <tr><td>&emsp;5</td><td style='text-align:left;'>&nbsp;テスト</td><td style="text-align: right;">260,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">260,000&emsp;</td></tr>
                            <tr><td>&emsp;6</td><td style='text-align:left;'>&nbsp;プロジェクト管理</td><td style="text-align: right;">130,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">130,000&emsp;</td></tr>
                            <tr><td>&emsp;7</td><td style='text-align:left;'>&nbsp;ドキュメント作成</td><td style="text-align: right;">-&nbsp;</td><td>-</td><td>-</td><td style="text-align: right;">-&emsp;</td></tr>
                            <tr><td>&emsp;8</td><td style='text-align:left;'>&nbsp;マニュアル作成・定着支援・その他</td><td style="text-align: right;">90,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">90,000&emsp;</td></tr>
                        -->
						</tbody>
                    </table>
					
                    <div style='float:right;text-align: left;margin-top:20px;white-space: nowrap;' class='fonttype4'>
                        <table border='1' class='moneytable'>
                            <tbody>
                                <tr><td class='td1'>金額&nbsp;</td><td class='td2'>200,000&nbsp;</td></tr>
                                <tr><td class='td1'>消費税(8%)&nbsp;</td><td class='td2'>0&nbsp;</td></tr>
                                <tr><td class='td1'>消費税(10%)&nbsp;</td><td class='td2'>20,000&nbsp;</td></tr>
                                <tr><td class='td1'>合計金額&nbsp;</td><td class='td2'>220,000&nbsp;</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div style='clear: both;'></div>
					
					<p style='font-size:13px;text-align:left;margin:10px 0px 0px 0px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;'>備考欄</p>
					<div style='white-space:pre;min-height:20mm;font-size:13px;border:1px dotted #999;padding:5px;text-align:left;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;'></div>
					
					
					<!--=======================================================================-->
					<div style='position:absolute;bottom:0px;left:0px;width:100%;'>
						<div style='padding:20px;'>
							<hr style='width:100%;border-top: 1px dashed #bbb;margin:15px 0px;'>
							<div style='text-align:center;font-size:20px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;'>
								発注書
								
								<p style='font-size:16px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;'></p>
								<div style='text-align:right;width:500px;margin:0px auto;border-bottom:2px solid #666;border-top:2px solid #666;margin-top:0px;font-size:14px;line-height:50px;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;'>
									印
								</div>
							</div>
						</div>
					</div>
					<!--=======================================================================-->
					
                    
                </div>
        
		
		
		
		
		
		
                <div class='content-print' style='width:172mm;height:270mm;text-align:center;border: 1px solid #000000;padding:25px;margin-top:20px;position:relative;display:none;'>
                    <br><br>
                    <div style='text-align: center;background:#555;' class='fonttype1'>&emsp;見&emsp;積&emsp;詳&emsp;細&emsp;</div>
                    
					
					<div style='margin-top:20px;'>
						<div style='float:left;width:70%;'>
							<div style='margin-right:10px;border:1px solid #000;padding:10px;text-align:left;color:#333;font-family:"游ゴシック体", "Yu Gothic", YuGothic, "ヒラギノ角ゴ Pro", "Hiragino Kaku Gothic Pro", "メイリオ", "Meiryo", sans-serif;font-size:12px;'>
								株式会社イングスJBS　様
								<hr style='margin:4px 0px;'>
								社内業務管理・効率化システムの詳細になります。<br>
							</div>
						</div>
						<div style='float:right;width:30%;text-align:right;' class='fonttype3'>
							発行日:2019年10月11日<br>
							見積書No.GN/94-243<br><br>
						</div>
						<div style='clear:both;'></div>
					</div>
                    
                    <div style='float:left;text-align: left;line-height: 17px;' class='fonttype6'></div>
                    <div style='float:left;text-align: left;line-height: 17px;' class='fonttype6'>
                    </div>
                    <div style='float:right;text-align: left;line-height: 17px;' class='fonttype6'>
                    </div>
                    <div style='float:right;text-align: left;line-height: 17px;' class='fonttype6'></div>
                    <div style='clear:both;'></div>
					
					
                    <table class='producttable' border='1' style='margin-top:20px;'>
                        <tbody style="font-size:12px;">
                            <tr><td style='text-align:left;background:#eee;' colspan='6'>&nbsp;1.仕様・要求分析・企画</td></tr>
							<tr><td>1.1</td><td style='text-align:left;'>&nbsp;ヒアリング・事前調査</td><td style="text-align: right;">90,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">90,000&emsp;</td></tr>
                            <tr><td style='text-align:left;background:#eee;' colspan='6'>&nbsp;2.環境構築</td></tr>
							<tr><td>2.1</td><td style='text-align:left;'>&nbsp;VPSサーバ構築・アクセス制限設定</td><td style="text-align: right;">0&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">0&emsp;</td></tr>
							<tr><td>2.2</td><td style='text-align:left;'>&nbsp;サーバ準備・基本設定</td><td style="text-align: right;">50,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">50,000&emsp;</td></tr>
                            <tr><td style='text-align:left;background:#eee;' colspan='6'>&nbsp;3.システム設計</td></tr>
                            <tr><td>3.1</td><td style='text-align:left;'>&nbsp;基本設計・詳細設計</td><td style="text-align: right;">190,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">190,000&emsp;</td></tr>
                            <tr><td>3.2</td><td style='text-align:left;'>&nbsp;データベース設計</td><td style="text-align: right;">100,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">100,000&emsp;</td></tr>
                            <tr><td style='text-align:left;background:#eee;' colspan='6'>&nbsp;4.開発</td></tr>
							<tr><td>4.1</td><td style='text-align:left;'>&nbsp;ユーザーマスタ</td><td style="text-align: right;">0&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">0&emsp;</td></tr>
							<tr><td>4.2</td><td style='text-align:left;'>&nbsp;仕入マスタ</td><td style="text-align: right;">0&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">0&emsp;</td></tr>
							<tr><td>4.3</td><td style='text-align:left;'>&nbsp;商品マスタ</td><td style="text-align: right;">150,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">150,000&emsp;</td></tr>
							<tr><td>4.4</td><td style='text-align:left;'>&nbsp;顧客マスタ</td><td style="text-align: right;">100,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">100,000&emsp;</td></tr>
							<tr><td>4.5</td><td style='text-align:left;'>&nbsp;見積作成・受注管理</td><td style="text-align: right;">300,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">300,000&emsp;</td></tr>
							<tr><td>4.6</td><td style='text-align:left;'>&nbsp;カレンダー</td><td style="text-align: right;">250,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">250,000&emsp;</td></tr>
							<tr><td>4.7</td><td style='text-align:left;'>&nbsp;出荷表</td><td style="text-align: right;">100,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">100,000&emsp;</td></tr>
							<tr><td>4.8</td><td style='text-align:left;'>&nbsp;返却管理</td><td style="text-align: right;">100,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">100,000&emsp;</td></tr>
							<tr><td>4.10</td><td style='text-align:left;'>&nbsp;外部借受</td><td style="text-align: right;">120,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">120,000&emsp;</td></tr>
							<tr><td>4.11</td><td style='text-align:left;'>&nbsp;※&nbsp;特殊処理（割引権限・仮おさえ補おさえ連動）</td><td style="text-align: right;">100,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">100,000&emsp;</td></tr>
							<tr><td>4.12</td><td style='text-align:left;'>&nbsp;外部連携</td><td style="text-align: right;">420,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">420,000&emsp;</td></tr>
							<tr><td>4.13</td><td style='text-align:left;'>&nbsp;返却表・納品書・受領書・請求書</td><td style="text-align: right;">175,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">175,000&emsp;</td></tr>
							<tr><td>4.14</td><td style='text-align:left;'>&nbsp;返却確認書・レンタル規約・仕入れ機材購入申込書</td><td style="text-align: right;">80,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">80,000&emsp;</td></tr>
							<tr><td>4.15</td><td style='text-align:left;'>&nbsp;売掛管理</td><td style="text-align: right;">235,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">235,000&emsp;</td></tr>
							<tr><td>4.16</td><td style='text-align:left;'>&nbsp;仮払申請・出張精算</td><td style="text-align: right;">80,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">80,000&emsp;</td></tr>
							<tr><td>4.17</td><td style='text-align:left;'>&nbsp;経理用CSV</td><td style="text-align: right;">100,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">100,000&emsp;</td></tr>
							<tr><td>4.18</td><td style='text-align:left;'>&nbsp;集計・分析</td><td style="text-align: right;">280,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">280,000&emsp;</td></tr>
							<tr><td>4.19</td><td style='text-align:left;'>&nbsp;各種データ取込</td><td style="text-align: right;">70,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">70,000&emsp;</td></tr>
                            <tr><td style='text-align:left;background:#eee;' colspan='6'>&nbsp;5.テスト</td></tr>
							<tr><td>5.1</td><td style='text-align:left;'>&nbsp;システムテスト（内部テスト）</td><td style="text-align: right;">260,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">260,000&emsp;</td></tr>
                            <tr><td style='text-align:left;background:#eee;' colspan='6'>&nbsp;6.プロジェクト管理</td></tr>
							<tr><td>6.1</td><td style='text-align:left;'>&nbsp;工程管理・人事スケジュール管理</td><td style="text-align: right;">130,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">130,000&emsp;</td></tr>
                            <tr><td style='text-align:left;background:#eee;' colspan='6'>&nbsp;7.ドキュメント作成</td></tr>
							<tr><td style='text-align:left;' colspan='6'>-</td></tr>
                            <tr><td style='text-align:left;background:#eee;' colspan='6'>&nbsp;8.マニュアル作成・定着支援・その他</td></tr>
							<tr><td>8.1</td><td style='text-align:left;'>&nbsp;操作マニュアル</td><td style="text-align: right;">0&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">0&emsp;</td></tr>
							<tr><td>8.1</td><td style='text-align:left;'>&nbsp;定着支援・定着サポート</td><td style="text-align: right;">90,000&nbsp;</td><td>1</td><td>式</td><td style="text-align: right;">90,000&emsp;</td></tr>
   
                        </tbody>
                    </table>
					
                    
                </div>
		
		
		
		
		
		
		
		
		
		
    </center>
  
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--JavaScript-->
<script>
$(function(){
    //印刷
    $('.print').on('click', function(){
	if(window.confirm('印刷設定で余白をなしに設定してください。\n\n\n\n※印刷する際、上下に日付やURLがある場合\nブラウザの設定を変更してください\n\n【IE】メニューから『印刷』→『ページ設定』→ ヘッダーとフッターを空にする\n\n【Chrome】　『印刷プレビュー』→『詳細設定』→『ヘッダーとフッター』のチェックを外す\n\n【FireFox】メニューから『印刷』→『ページ設定』→ ヘッダーとフッターを空にする')){
            window.print();
	}
      return false;
    });
    //日付更新
    $('.datewrite').on('click', function(){
	if(!window.confirm('現在の印刷画面の日付を一括で変更します。\n\n\n 実際のデータには影響を与えません。')){
            return false;
	}
       var datetext = $("#datetextbox").val();//日付
       
       //スラッシュがあるか調べる
       if (datetext.indexOf('/') != -1) {
            var datetext = datetext.replace( "/" , "年" ) ;//スラッシュを「年」にする
            var datetext = datetext.replace( "/" , "月" ) ;//スラッシュを「月」にする
            var datetext = datetext+"日";//最後を「日」にする
       }
       
       $(".dateprint").text(datetext);
      return false;
    });
});
</script>
<!--JavaScript-->  
  <script src="footer.js"></script>
</body>
</html>