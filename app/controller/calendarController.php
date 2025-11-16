<?php
class calendar
{
    public function __construct() {
        loginCheck();
    }
    public function action_index()
    {
        $calendarArr = ORM::for_table('calendar')->where('delete_flg',0)->order_by_desc('id')->find_array();
        //View呼び出し
        include_once(dirname(__FILE__). "/../view/calendar.php");
    }
    public function action_create($targetId)
    {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
        $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
        $memo = isset($_POST['memo']) ? $_POST['memo'] : '';

        try {
            // idiorm 接続
            $calendarObj = ORM::for_table('calendar')->where('id',$targetId)->find_one();
            if($calendarObj){
                $calendarObj->updated_at = date('Y-m-d H:i:s');
            }else{
                $calendarObj = ORM::for_table('calendar')->create();
                $calendarObj->created_at = date('Y-m-d H:i:s');
            }
            $calendarObj->title = $title;
            $calendarObj->start_date = $start_date;
            $calendarObj->end_date = $end_date;
            $calendarObj->memo = $memo;
            $calendarObj->save();
        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/front");
    }
    // public function action_delete($targetId)
    // {
    //     try {
    //         // idiorm 接続
    //         $memoObj = ORM::for_table('memo')->where('id',$targetId)->find_one();
    //         $memoObj->delete_flg =1;
    //         $memoObj->deleted_at = date('Y-m-d H:i:s');
    //         $memoObj->save();
    //     } catch (Exception $e) {
    //         echo 'エラー内容: ',  $e->getMessage(), "\n";
    //         exit;
    //     }
    //     redirectUrl("/front");
    // }
}
?>