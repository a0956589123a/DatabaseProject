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
  <meta charset="utf-8">
  <style>

#Sidebar {
    line-height:30px;
    background-color: #e0e0e0;
    height:930px;
    width:370px;
    float:left;
    padding:15px;
    text-align:center;
}
#body {
    width:700px;
    height:930px;
    float:left;
    padding:10px; 
   
}

#footer {
    background-color:#222222;
    color:white;
    clear:both;
    text-align:center;
    
    height: 120px;
    line-height:100px ;
}
body {
    margin:0;
    padding:0;
    background: #000 url(../background.jpg) center center fixed no-repeat;
    -moz-background-size: cover;
    background-size: cover;
    
}

.form-group { 
  position: relative;
  width:500px; 
  height:80px;
   
}

input,label{
  position: relative; 
  left:50px;
}
button{
  position: relative;
  left:50px;
  width:500px; 
  height:50px;
}
p{
  position: relative; 
  left:50px;
}
h3{
  position: relative;
  left:50px;
}
img{
  position: relative;
  max-width: 300px; 
  max-height: 200px;
}
.form-group-gender{
  width:500px; 
    height:50px;
}
.form-img{
  width:350px; 
    height:270px;
}
.custom-file{
   position: relative;
   text-align:center;
}

</style>
  <title>
    個人資訊
  </title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">
</script>
</head>
<body>
  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../web/index_out.php">社區管理系統</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href=".html"></a>
            </li>
      <li class="nav-item">
        <a class="nav-link" href="personal_imfor.php">個人資料</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../facility/facility.php">借用設施</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">登出</a>
      </li>

          </ul>
        </div>
      </div>
    </nav>
    
  <br>
  <br>
  <div id='Sidebar'>
  <form id = 'information_img' action="new_img.php" method="post" enctype="multipart/form-data">
    <div class = 'form-img' >
      <a><img id="preview_progressbarTW_img" src="./picture/預設.jpg"></a>
      
      <br><br>
      
      <div class="custom-file" >
        <input class="custom-file-input" name="progressbarTW_img" type="file" id="imgInp" accept="image/gif, image/jpeg, image/png" style="display: none">
        <button type="button" class='btn btn-dark' onclick="imgInp.click()" style='position: relative;left:0px;width:250px; height:40px;'>檔案上傳</button>
      </div>
      
    </div>
  </form>
  </div>
  <div id='body'>  
    <div id='body_form'>
      
     
    <form id = 'information' action="personal_infor_save.php" enctype="multipart/form-data" method="post">
        <div>
          <h3  style="font-weight:bold;">個人資料</h3>
          <p>於此顯示您的個人資料，修改過後，請按下方確認鍵，以免遺失</p>
        </div >

        <div class="form-group row" style = 'width:500px;height:30px;'>
          <label for="static_account" class="col-sm-2 col-form-label">帳號</label>
          <div class="col-sm-10">
            <input type="text" readonly class="form-control-plaintext" name='static_account' id="static_account" value="">
          </div>
        </div>

        <div class="form-group">
          <label for="InputPassword1" >密碼<small id="emailHelp" class="form-text text-muted">請兩次輸入密碼要相同</small></label>
          <input type="password" class="form-control" name="InputPassword1" id="InputPassword1" value = ''>
        </div>

        <div class="form-group">
          <label for="InputPassword2">再次確認密碼</label>
          <input type="password" class="form-control" name="InputPassword2" id="InputPassword2" value = ''>
        </div>

        <div class="form-group">
          <label for="name">住戶姓名</label>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="name" id='name' value="">
        </div>

        <div class="form-group-gender" >
          <label for="gender">性別：</label>
          <div class="form-check form-check-inline" style="left: 50px">
            <input class="form-check-input" type="radio" name="gender" id='genderman'value="man" >
            <label class="form-check-label" style="left:0px;">男</label>
          </div>
          <div class="form-check form-check-inline" style="left: 50px">
            <input class="form-check-input" type="radio" name="gender"  id='genderwoman' value="woman" >
            <label class="form-check-label" style="left:0px;">女</label>
          </div>
        </div>

        <div class="form-group">
          <label for="phone">聯絡電話</label>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name='phone' id='phone' value="">
        </div>

        <div class="form-group">
          <label for="name">Email</label>
          <input type="Email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name='Email' id='Email' value="">
        </div>
        <div class="form-group">
          <label for="Parking-grid">停車場編號</label>
          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name='Parking-grid' id='Parking-grid' value="">
        </div>

        <div class="form-group row" style = 'width:500px;height:50px;'>
          <label for="static_management_fee" class="col-sm-4 col-form-label" style = 'width:100px;height:30px;'>是否有繳管理費：</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control-plaintext" name="static_management_fee" id="static_management_fee" value="">
          </div>
        </div>
        <button type="button" class="btn btn-primary " onclick="submit_infor()">確認</button>
      </form>
      </div>  
    </div>
    
  <div id='footer'>
     <p style="left:0px;">聯絡管理員：02-2345-6789 分機 014</p>
  </div>
  <script src="./ajax.js"></script>
  <script type="text/javascript">


    $("#imgInp").change(function(){
      //當檔案改變後，做一些事

    

     readURL(this);   // this代表<input id="imgInp">
     var filepath = this.value.split('\\');
     var filename = filepath[filepath.length - 1];
     $("#img_txt").text(filename);
    
    $('#information_img').submit();
    
   });
    function upload(input){
      alert(input.files[0]);
      

      

    }
    function readURL(input){
      if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
           $("#preview_progressbarTW_img").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);

  }
}
    function submit_infor(){
      var pass1 = $('#InputPassword1').val();
      var pass2 = $('#InputPassword2').val();
      
      if (pass1==pass2){
        $('#information').submit();
      }
      else{
        alert('兩次輸入密碼不相同!');
      }
    }
  </script>
    
</body>
</html>