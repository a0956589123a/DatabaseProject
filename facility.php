<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>管理設施</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/half-slider.css" rel="stylesheet">

  </head>

  <body style="background-color: #eeeeee">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="web/admin.html">社區管理系統</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item active"> -->
            <li class="nav-item">
              <a class="nav-link" href="web/self.php">個人資料</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Visiter.php">訪客登記</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../bootstrap-4.1.1/docs/4.1/examples/grid/management.php">住戶資料</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link " href="facility.php">管理設施</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br>
    <div>
      <table border="3" align="center" width="80%" bgcolor="#333333"  >
        <tr>
          <td align="center"><font color="white">名字</font></td>
          <td align="center"><font color="white">借用設施</font></td>
          <td align="center"><font color="white">借用設備</font></td>
          <td align="center"><font color="white">借用時間</font></td>
          <td align="center"><font color="white">使用時數</font></td>
        </tr>
        <?php 
          echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
          require("Link.php");
          // $sql = "SELECT distinct * FROM resident NATURAL JOIN management_fee NATURAL JOIN login WHERE resident.rID='".$account."'";
          $result="SELECT resident.name,facility.category ,device.name,using_record.date_time ,using_record.hours FROM using_record, resident , device,facility WHERE resident.rID=using_record.rID AND using_record.dID=device.dID AND using_record.fID=facility.fID";
          $result_exist=mysqli_query($link,$result);
          // echo $result_exist;
          while ($result_array=mysqli_fetch_row($result_exist))
          { 
            echo '<tr>';
              echo "<td align='center'><font color='white'>",$result_array[0],"</font></td>";
              echo "<td align='center'><font color='white'>",$result_array[1],"</font></td>";
              echo "<td align='center'><font color='white'>",$result_array[2],"</font></td>";
              echo "<td align='center'><font color='white'>",$result_array[3],"</font></td>";
              echo "<td align='center'><font color='white'>",$result_array[4],"</font></td>";
            echo '</tr>';
          }
        
        ?>
        

      </table>
    </div>
    
      

    





    <!-- Footer -->
    <footer class="py-5 bg-dark" style="position: fixed;bottom: 0px;right: 0px;left: 0px">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
