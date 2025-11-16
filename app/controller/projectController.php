<?php
class project
{
    public function __construct() {
        loginCheck();
    }
    public function action_index()
    {
        // 顧客マスタDBからデータの取得
        $viewList = ORM::for_table('project')->where('delete_flg',0)->order_by_desc('id')->find_array();
        $customerList = ORM::for_table('customer')->where('delete_flg',0)->find_array();

        $contentsArr = array();
        $customerViewArr = array();
        foreach((array)$customerList as $key => $value){
            $contentsArr = json_decode($value['contents_json'],true);
            $customerViewArr[$value['id']] = $contentsArr['company_name'];
        }

        $resultMeg = false;
        $resultNum = false;
        if(isset($_SESSION['result'])){
            // メッセージ
            $resultMeg = $_SESSION['result']['message'];
            $resultNum = $_SESSION['result']['num'];
            // セッションを削除
            unset($_SESSION['result']);
        }
        //View呼び出し
        include_once(dirname(__FILE__). "/../view/project_list.php");
    }
    // 登録・更新ページ
    public function action_operation($targetId)
    {
        $targetId = $targetId === '' ? null : $targetId;
        $projectObj = ORM::for_table('project')->where('id',$targetId)->find_one();
        $contents = json_decode($projectObj->contents_json,true);
        $documentContents = json_decode($projectObj->document_contents_json,true);
        $mailContents = json_decode($projectObj->mail_contents_json,true);
        $supportContents = json_decode($projectObj->support_contents_json,true);
        $customerList = ORM::for_table('customer')->where('delete_flg',0)->find_array();

        $resultMeg = false;
        $resultNum = false;
        if(isset($_SESSION['result'])){
            // メッセージ
            $resultMeg = $_SESSION['result']['message'];
            $resultNum = $_SESSION['result']['num'];
            // セッションを削除
            unset($_SESSION['result']);
        }

        //View呼び出し
        include_once(dirname(__FILE__). "/../view/project_operation.php");
    }
    // 登録・更新処理
    public function action_processing($targetId)
    {
        $contents = isset($_POST['contents']) ? $_POST['contents'] : array();
        $mailContents = isset($_POST['mailContents']) ? $_POST['mailContents'] : array();
        $supportContents = isset($_POST['supportContents']) ? $_POST['supportContents'] : array();
        $projectForm = isset($_POST['project_form']) ? 1 : 0;
        $documentForm = isset($_POST['document_form']) ? 1 : 0;
        $mailForm = isset($_POST['mail_form']) ? 1 : 0;
        $supportForm = isset($_POST['support_form']) ? 1 : 0;


        // ファイルアップロード
        try {
            if ($documentForm) {
                // アップロードされたファイルの情報を取得
                $fileContentsArr = $_FILES['documentContents'];

                // フォルダを作成
                $targetFolder = "./public/uploads/document/$targetId/";
                if (!file_exists($targetFolder)) {
                    mkdir($targetFolder, 0777, true);
                }
                // var_dump($fileContentsArr);

                $documentContents['document_file'] = array(); // サポートコンテンツの配列にファイル名を追加するための配列
                foreach ($fileContentsArr['name']['document_file'] as $fileKey => $fileNameValue) {
                    $newFileName =  date('Y_m_d'). '_' . $fileNameValue;

                    // アップロードされた一時ファイルの情報を取得
                    $fileTmpName = $fileContentsArr['tmp_name']['document_file'][$fileKey];

                    // ファイル保存
                    if (move_uploaded_file($fileTmpName, $targetFolder . $newFileName)) {
                        // ファイル名を追加
                        $fileData['machining_file_name'] = $newFileName;
                        $fileData['original_file_name'] = $fileNameValue;
                        $documentContents['document_file'][$fileKey] = $fileData;
                    }
                }
            }
        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }

        // ファイルアップロード
        try {
            if ($supportForm) {
                // アップロードされたファイルの情報を取得
                $fileContentsArr = $_FILES['supportContents'];

                // フォルダを作成
                $targetFolder = "./public/uploads/project/$targetId/";
                if (!file_exists($targetFolder)) {
                    mkdir($targetFolder, 0777, true);
                }
                $supportContents['support_file'] = array(); // サポートコンテンツの配列にファイル名を追加するための配列

                foreach ($fileContentsArr['name']['support_file'] as $supportFileKey => $fileNamesArr) {
                    foreach ($fileNamesArr as $fileKey => $fileNameValue) {
                        // ファイル名にユニークなIDを追加
                        $uniqueID = uniqid();
                        $fileExtension = pathinfo($fileNameValue, PATHINFO_EXTENSION); // ファイルの拡張子を取得
                        $newFileName = $uniqueID . '_' . $fileNameValue;

                        // アップロードされた一時ファイルの情報を取得
                        $fileTmpName = $fileContentsArr['tmp_name']['support_file'][$supportFileKey][$fileKey];

                        // ファイル保存
                        if (move_uploaded_file($fileTmpName, $targetFolder . $newFileName)) {
                            // サポートコンテンツにファイル名を追加
                            $fileData['machining_file_name'] = $newFileName;
                            $fileData['original_file_name'] = $fileNameValue;
                            $supportContents['support_file'][$supportFileKey][$fileKey] = $fileData;
                        }
                    }
                }
            }
        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }

        try {
            $projectObj = ORM::for_table('project')->where('id',$targetId)->find_one();
            $supportContentsDB = json_decode($projectObj->support_contents_json,true);
            $documentContentsDB = json_decode($projectObj->document_contents_json,true);

            if($projectObj){
                $projectObj->updated_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '更新が完了しました';
                $_SESSION['result']['num'] = 2;
            }else{
                $projectObj = ORM::for_table('project')->create();
                $projectObj->created_at = date('Y-m-d H:i:s');
                $_SESSION['result']['message'] = '登録が完了しました';
                $_SESSION['result']['num'] = 1;
            }
            if($projectForm){
                $projectObj->contents_json = json_encode($contents,true);
            }else if($documentForm){
                $documentContents['document_file'] = array_merge($documentContents['document_file'], (array)$documentContentsDB['document_file']);
                $projectObj->document_contents_json = json_encode($documentContents,true);
            }else if($mailForm){
                $projectObj->mail_contents_json = json_encode($mailContents,true);
            } else {
                $supportContents['support_file'] += (array)$supportContentsDB['support_file'];
                $projectObj->support_contents_json = json_encode($supportContents, true);
            }
            $projectObj->save();
            $targetId = $projectObj->id;

        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/project/operation/$targetId");
    }
    public function action_delete($targetId)
    {
        try {
            // idiorm 接続
            $projectObj = ORM::for_table('project')->where('id',$targetId)->find_one();
            $projectObj->delete_flg =1;
            $projectObj->deleted_at = date('Y-m-d H:i:s');
            $projectObj->save();
            $_SESSION['result']['message'] = '削除が完了しました';
            $_SESSION['result']['num'] = 3;


        } catch (Exception $e) {
            echo 'エラー内容: ',  $e->getMessage(), "\n";
            exit;
        }
        redirectUrl("/project");
    }
}
