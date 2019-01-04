<?php
	session_start();
	require_once("../Link.php");
	$user = $_SESSION["account"];
	$sql = "Select * From admin Where username = '$user'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$name = $row["name"];
	$phone = $row["phone"];
	$line = $row["line"];
	$password = $row["password"];
?>	
	
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Self</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/half-slider.css" rel="stylesheet">
	
	
  </head>

  <body>
	
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">個人資料</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="admin.html">首頁
                <span class="sr-only">(current)</span>
              </a>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">登出</a>
			</li>
          </ul>
        </div>
      </div>
    </nav>

    

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <br>
		<form action="modify.php" method="post">
				<div class="form-group">
					<label for="exampleInputPassword1">帳號</label>
					<input  class="form-control-plaintext" name="username" value=<?php echo "'$user'"?> >
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">姓名</label>
					<input class="form-control" name="name" value=<?php echo "'$name'"?>>
					
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">電話</label>
					<input class="form-control" name="phone" value=<?php echo "'$phone'"?>>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Line</label>
					<input class="form-control" name="line" value=<?php echo "'$line'"?>>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">密碼</label>
					<input type="password" class="form-control" name="password" value=<?php echo "'$password'"?>>
				</div>
				
				<input type="submit" class="btn btn-primary" value = "修改">
			</form>
      </div>
    </section>

    
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>

