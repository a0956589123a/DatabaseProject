<?php 
session_start();
require(dirname(__FILE__) . "/config.php");
if (!isset($_SESSION['account']))
{
    mysqli_close($link);
    header('Location: ../web/login.html');
}
$account = $_SESSION['account'];
$query = "SELECT resident.rID FROM resident WHERE resident.rID = '$account'";
$result = mysqli_query($link,$query);

if (!mysqli_num_rows($result))
{
    // No match for guid
  mysqli_close($link);
  header('Location: ../web/login.html');
}
mysqli_close($link);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>借用設施</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
 
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
	body {
    margin:0;
    padding:0;
    background: #000 url(../background.jpg) center center fixed no-repeat;
    -moz-background-size: cover;
    background-size: cover;
    height: 100%;
}
#id_wrapper {
    /* 設定高度最小為100%, 如果內容區塊很多, 可以長大 */
    min-height: 100%;
    /* 位置設為relative, 作為footer區塊位置的參考 */
    position: relative;
}

#id_header {
    /* 設定header的高度 */
    height: 40px;
    box-sizing: border-box;
}

#id_content {
    /* 留出header及footer區塊的空間 */
    padding-top: 40px;
    padding-bottom: 120px;
    text-align:center;
}

#id_footer {
    /* 設定footer的高度 */
    height: 120px;
    box-sizing: border-box;
    /* 設定footer絕對位置在底部 */
    position: fixed;
    bottom: 0px;
    /* 展開footer寬度 */
    width: 100%;
    background-color:#222222;
    color:white;
    clear:both;
    text-align:center;
    line-height:100px ;
}
.device_checkbox_hidden{ 
overflow: hidden; 
width: 0; 
height: 0; 
border:none; 
}
</style>

</head>
<body>
	<!---
        <nav class="site-header sticky-top py-1" >
            <ul>
                <li><a class="active" href="#home">HOME</a></li>
                <li><a href="./personal_imfor.html">個人資料</a></li>
                <li><a href="./equipment.html">借用設施</a></li>
                <li style = 'float:right;'><a href="#about" >登出</a></li>
            </ul>
        </nav>
        --->
<div id="id_wrapper">       
    <div id='id_header'>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../web/index_out.php">社區管理系統</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href=".html"></a>
            </li>
			<li class="nav-item">
				<a class="nav-link" href="../personal_user/personal_imfor.php">個人資料</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="facility.php">借用設施</a>
			</li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">登出</a>
      </li>

          </ul>
        </div>
      </div>
    </nav>
    </div>
    <br>
    <div id="id_content">
        <h2 style="font-weight:bold">借用紀錄</h2>
        <br>

        <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">編號</th>
            <th scope="col">借用設施</th>
            <th scope="col">借用器材</th>
            <th scope="col">開始時間</th>
            <th scope="col">使用時數</th>
          </tr>
        </thead>
        <tbody>
          <?php

          require(dirname(__FILE__) . "/config.php");
          $account = $_SESSION['account'];//$_COOKIE['account'];
          $sql = "SELECT facility.category,device.name,using_record.date_time,using_record.hours FROM using_record NATURAL JOIN facility NATURAL JOIN device WHERE using_record.rID = '$account'";//指令
          $result = mysqli_query($link,$sql)or die ('Error in query');//執行指令
          $num=0;
          if(mysqli_num_rows($result)){
              while($row = mysqli_fetch_row($result)){
                  $num +=1;
                  echo "<tr><th scope=\"row\">".$num."</th><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
              }
          }
          else{
            echo '尚未借用設施!!';
          }
          mysqli_close($link);
          ?>
          
        </tbody>
      </table>
     <div align="center">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >借用登記</button>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"style='text-align:left;'>
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">借用設施</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="facility_save_infor.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="place" class="col-form-label">設施:</label>
                <select class="custom-select" onchange='getequip()' id="place" name="place">
                   <option selected>選取設施...</option>
                   <?php
                    require(dirname(__FILE__) . "/config.php");
                    $sql = "SELECT fID,category FROM facility";//尋找account將序列值修改的指令
                    $result = mysqli_query($link,$sql);//執行指令
                    if(mysqli_num_rows($result)){
                      while($row = mysqli_fetch_row($result)){
                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                      }
                    }
                    mysqli_close($link);//最後要關起來
                   ?>
                </select>
              </div>
              <div class="form-group" id='device'>
                <label for="message-text" class="col-form-label" id='device_infor'>設備:</label>
                
                <!-- <textarea class="form-control" id="message-text"></textarea> -->
              </div>
              <div class="form-group">
                <label for="date" class="col-form-label">借用日期:</label>
                <input type="date" class="form-control" id="date" name="date">
              </div>
              <div class="form-group">
                <label for="time" class="col-form-label">借用時間:</label>
                <input type="time" class="form-control" id="time" name="time">
              </div>
              <div class="form-group">
                <label for="hours" class="col-form-label">借用時數:</label>
                <input type="number" class="form-control" id="hours" name="hours">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                <button type="submit" class="btn btn-primary">登記</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer id='id_footer'>
     <p style="left:0px;">聯絡管理員：02-2345-6789 分機 014</p>
  </footer>
</div>
<script type="text/javascript">
	function getequip(){
		var place_select=document.getElementById("place");
		var place_index=place_select.selectedIndex ;
		var place_value = place_select.options[place_index].value;
	
		
$.ajax({
    url: "load_facility_infor.php",
    type: "GET",
    data:{
    	place:place_value,
    },
    success: function(data){
        $('.device_checkbox').remove();
        $('#device_infor').after(data);
    },  
    error: function(){
        alert("error");
    }             
});
}  
	
</script>
</body>
</html>