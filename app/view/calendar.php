<?php include(dirname(__FILE__) . "/../head.php"); ?>
<!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script> -->
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {

        buttonText: {
            today: '今月',
            month: '月',
            list: 'リスト'
            },

        displayEventTime: false,
        googleCalendarApiKey: 'AIzaSyDd5TNVs4UcuJbLDSzEJAhlvHpsGdfl6Bs',
            events: {
                googleCalendarId: 'y.sufida', // カレンダーのIDのみを指定します
                display: 'background',
                color:"#fffbf8",
                classNames: 'gcal-event',
            },
        eventClick: function(arg) {
            window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');
            arg.jsEvent.preventDefault()
        },

        locale: 'ja',
        contentHeight: 'auto',


            dayCellContent: function(e) {
                e.dayNumberText = e.dayNumberText.replace('日', '');
            }
        });
        calendar.render();
    });
</script> -->
<body>
    <div class="range-left">
        <!-- サイドバー -->
        <?php include(dirname(__FILE__) . "/../side.php"); ?>
    </div>
    <div class="range-right">
        <!-- ヘッダーメニュー -->
        <?php include(dirname(__FILE__) . "/../header.php"); ?>
        <!--メイン -->
        <main class="mt-3">
            <div class="width-98">
                <div class="main-area">
                    <!-- <button type="button" class="b-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">スケジュール登録</button> -->
                    <!-- <div id='calendar' class="bg-white p-5 mt-3"></div> -->
                    <iframe src="https://calendar.google.com/calendar/embed?src=y.sufida%40gmail.com&ctz=Asia%2FTokyo" style="border: 0" width="100%" height="800" frameborder="0" scrolling="no"></iframe>
                </div>
            </div>
        </main>
    </div>
    <!-- Modal -->
    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form action="<?=SYSTEM_DIR?>/front/create" method="post">
            <div class="modal-dialog" style="max-width:800px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="w-100">
                            <div class="row">
                                <div class="col-12">
                                    タイトル<br>
                                    <input type="text" name="title" class="form-control" value="">
                                </div>
                                <div class="col-6">
                                    開始日<br>
                                    <input type="datetime-local" name="start_date" class="form-control" value="">
                                </div>
                                <div class="col-6">
                                    終了日<br>
                                    <input type="datetime-local" name="end_date" class="form-control" value="">
                                </div>
                                <div class="col-12">
                                    メモ<br>
                                    <textarea class="form-control" name="memo" id="" cols="30" rows="10"></textarea>
                                </div>
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
    </div> -->
    <script src="<?php echo SYSTEM_DIR; ?>/public/js/public.js"></script>
</body>
</html>