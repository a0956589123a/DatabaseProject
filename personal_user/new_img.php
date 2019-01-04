<?php
session_start();
header("Content-Type:text/html; charset=utf-8");

require_once(dirname(__FILE__) . "/config.php");

function uploadfile($file_id,$uploaddir,$file_name){

  if (!file_exists($uploaddir)){
    mkdir($uploaddir);
  }
  if ($_FILES[$file_id]['error'] === UPLOAD_ERR_OK){

    # 檢查檔案是否已經存在
    if (file_exists($uploaddir.$file_name)){
      echo '檔案已存在。<br/>';
      return 0;
    } else {
      $file = $_FILES[$file_id]['tmp_name'];
      $dest = $uploaddir . $file_name;
      # 將檔案移至指定位置
      rename($file, $dest);
      return 1;
    }
  } else {
   echo '錯誤代碼：' . $_FILES[$file_id]['error'] . '<br/>';
   return 0;

  }
}

$account = $_SESSION['account'];
uploadfile("progressbarTW_img","../picture/",$_FILES["progressbarTW_img"]['name']);

$file_at = "http://163.13.128.72/website/picture/".$_FILES["progressbarTW_img"]['name'];
$sql = "UPDATE resident SET resident.img_path='$file_at' WHERE resident.rID='$account'";//上傳圖片路徑到資料庫裏面的指令
$result = mysqli_query($link,$sql)or die('Error in query');//執行指令
mysqli_close($link);//最後要關起來


header('location:personal_imfor.php');
?>