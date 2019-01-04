
<!DOCTYPE html>
<html lang="en">


  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>訪客登記</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="css/half-slider.css" rel="stylesheet"> -->

  </head>

  <body style="background-color: #eeeeee">
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="web/admin.html">社區管理系統</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="web/self.php">個人資料</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link " href="Visiter.php">訪客登記<!-- <span class="sr-only">(current)</span> --></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../bootstrap-4.1.1/docs/4.1/examples/grid/management.php">住戶資料</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="facility.php">管理設施</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <br><br><br>
    

    
    <div align="center">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" >新增訪客名單</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo" >訪客離開</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3" data-whatever="@mdo" >刪除紀錄</button>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Visiter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="VisiterPost.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name:</label>
                <input type="text" class="form-control" name="Name" id="Name" required>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">ID:</label>
                <input type="text" class="form-control" name="ID" id="ID" required>
                <!-- <textarea class="form-control" id="message-text"></textarea> -->
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">證件:</label>
                <input type="text" class="form-control" name="Prove" id="Prove" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">EnterTime:</label>
                <input type="datetime-local" class="form-control" name="EnterTime" id="EnterTime" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">LeaveTime:</label>
                <input type="datetime-local" class="form-control" name="LeaveTime" id="LeaveTime" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">VisiterLeave</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="VisiterUpdate.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="message-text" class="col-form-label">ID:</label>
                <input type="text" class="form-control" name="ID" id="ID" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">LeaveTime:</label>
                <input type="datetime-local" class="form-control" name="LeaveTime" id="LeaveTime" required>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Visiter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="VisiterDelete.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="message-text" class="col-form-label">ID:</label>
                <input type="text" class="form-control" name="ID" id="ID" required>
                <!-- <textarea class="form-control" id="message-text"></textarea> -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <br>

    <div>
      <table border="3" align="center" width="80%" bgcolor="#333333"  >
        <tr>
          <td align="center"><font color="white">名字</font></td>
          <td align="center"><font color="white">ID</font></td>
          <td align="center"><font color="white">證件</font></td>
          <td align="center"><font color="white">進入時間</font></td>
          <td align="center"><font color="white">離開時間</font></td>
        </tr>
        <?php 
          echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
          require("Link.php");
          $result="SELECT Name,ID,Prove,EnterTime,LeaveTime FROM Visiter";
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
    <footer class="py-5 bg-dark" style="position: fixed;bottom: 0px;right: 0px;left: 0px;height: 96px">
      <div class="container">
        <p class="m-0 text-center text-white" align="center">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
