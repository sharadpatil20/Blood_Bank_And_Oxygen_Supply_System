<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Project medicine</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Your description">
<meta name="keywords" content="Your keywords">
<meta name="author" content="Your name">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/superslides.css" rel="stylesheet">
<link href="css/prettyPhoto.css" rel="stylesheet">
<link href="css/isotope.css" rel="stylesheet">
<link rel="stylesheet" href="css/animate.min.css">
<link href="css/style.css" rel="stylesheet">
<link href="css/media.css" rel="stylesheet">

<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/superfish.js"></script>

<script src="js/jquery.queryloader2.js"></script>

<script src="js/jquery.superslides.js"></script>

<script src="js/jquery.caroufredsel.js"></script>
<script src="js/jquery.touchSwipe.min.js"></script>

<script src="js/jquery.ui.totop.js"></script>
<script src="js/jquery.equalheights.js"></script>

<script src="js/jquery.parallax-1.1.3.resize.js"></script>

<script src="js/SmoothScroll.js"></script>

<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>

<script src="js/cform.js"></script>

<script src="js/scripts.js"></script>

</head>
<style>
table, th, td {
  /* border: 1px solid black; */
  border-collapse: collapse;
}
th, td {
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 20px;
  padding-right: 20px;
}
</style>
<?php 
$user = $_SESSION['user'];
$con = mysqli_connect("localhost","root","","bloodoxy");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

    $sql = "SELECT * FROM profile where uname = '".$user."'";
    $result = $con->query($sql);
   
    if ($result->num_rows > 0) 
    {
        $row1 = $result -> fetch_row();
        $uname = $row1['1'];
    }
    $sql = "SELECT * FROM bloodorder where supplier = '".$uname."'";
    $result = $con->query($sql);
    //mysqli_close($con);    
?>
<body>
<div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <!-- blue line -->
        <div class="col-lg-12-top">
        
        </div> 
         <!-- End of blue line -->
        
        <div class="navbar navbar-merab">
           <div class="container">
            <div class="col-lg-12">
                
            </div>
</div>
        </div>
<?php include "usermenu.php" ?>
    
<div id="users"></div>
    
    <div class="container" style="margin-top:100px; height:600px;">
            <div class="row">
        
        <div class="col-md-12">
            <center><h2><span class="merabi"></h2></center><br>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-primary" style="height:450px;margin-top:0px;">
    <div class="panel-heading" role="tab" id="headingOne" >
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Your Orders
        </a>
      </h4>
      
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body" style="height:300px">
            <div class="row" >
        <div class="col-xs-8 col-md-6">
            
        </div>
             <div style="border: 3px solid blue;height:370px; width:1100px;background-color:#EBF5FB; ">
                  <br>
                   <h5 style="margin-left:20px;font-size:15px; font-weight:bold;text-align:left;color:black"> 
                   <?php 
                        echo "<span style='color:red'> Welcome back, ".$_SESSION["user"]." !! </span>";
                   ?>
                   <?php 
                       
                       if($_SESSION['pic']=='None')
                          $fn="profilepics/logo.png";
                       else        
                          $fn = "profilepics/".$_SESSION['pic'];
                       echo "<img src=".$fn." height=30 width=30 />";
            
                   ?>
                  </h5>                
                  <hr>
                  <div style="overflow-y: scroll;border: 3px solid pink;margin-top:-30px;margin-left:50px;height:250px; width:1000px; background-color:white;;text-align:center">
                  <table border="1" style="margin-left:30px;margin-top:10px;font-size:12px">
                    <tr style="background-color:lightgray"> 
                      <td> Order No </td>
                      <td width="130"> Items </td> 
                      <td width="100"> Price </td>
                      <td width="100"> Quantity </td>
                      <td width="100"> Total </td>
                      <td width="120"> Date of order </td>
                      <td width="120"> Status </td>
                      <td width="280"> Change Status </td>
                    </tr>  
                    <?php
                      
                      $sql = "SELECT * FROM profile where uname = '".$user."'";
                      $result = $con->query($sql);
                      
                      if ($result->num_rows > 0) 
                      {
                          $row1 = $result -> fetch_row();
                          $uname = $row1['1'];
                      }
                      #echo $uname;
                      $sql = "SELECT * FROM oxyorder where supplier='Super Industries'";
                      $result = $con->query($sql);
                       
                      if ($result->num_rows > 0) 
                      {
                        $n = $result->num_rows;
                        $i = 0;
                        while($i<$n)
                        {
                          $row1 = $result->fetch_row();
                          $total = $row1['5'] * $row1['6'];
                          echo "<tr><td>".$row1['0']."</td><td>".$row1['3']."</td><td>".$row1['6'].
                          "</td><td>".$row1['5']."</td><td>".$total."</td><td>".$row1['7']."</td><td>".$row1['8'].
                          "</td><td><a href=accepted.php?id=".$row1['0'].">Accepted</a>  |  
                          <a href=rejected.php?id=".$row1['0'].">Rejected</a> |  <a href=shipped.php?id=".$row1['0'].">Shipped</a></td></td></tr>";
                          $i++;
                        } 
                      }                   
                  
                  ?>
                  </table>
                    </div>       
              </div>


            
         </div>
        </div>
    </div>
  </div>

  </div>

    </div>
  </div>           
          <p class="text"> <br><br>
          </p>
            </div>
      </div>
    </div>
    </div>
</div>
</div>
</div>
 </div>
  
    <script src="js/bootstrap.min.js"></script>
</body>
</html>