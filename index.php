<?php
session_start();
if(!empty($_SESSION['username'])){
  echo"<meta http-equiv='refresh' content='0;URL=index2.php'>";
}else 
if(empty($_GET['page'])){
  //echo"<mata http-equiv='refresh' content='0;URL=sort.php'>";
  echo"<meta http-equiv='refresh' content='0;URL=sort.php'>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Baby Blog</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
  
</head>
<body>

  <div class="container-fluid" >
    <div class="row">
      <div class="col-sm-12"><div id="header">
        <BR>
          <table style="width:80%; border:none; margin-left: 110px">
            <tr>
              <td><img src="pic/people.png" width="90px"></td>
              <td colspan=5><font size="48pt" color="white">Baby Blog</font></td>
            </tr>
          </table>       
          <hr width="90%">
          <div class="container-fluid" style="width:90%">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php?page=1" style="color:white;font-size: 14pt;">HOME</a></li>
              <li><a href="#" style="color:gray;font-size: 14pt;">PRIVATE</a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:gray;font-size: 14pt;">USER <span class="caret"></span></a>
              </li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color:gray;font-size: 14pt;">ARTICLE <span class="caret"></span></a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="color:white;font-size: 14pt;">
              <li><a href="SignUp.html" style="color:white;font-size: 14pt;"><span class="glyphicon glyphicon-user"></span>SIGN UP</a></li>
              <li><a href="Login.php" style="color:white;font-size: 14pt;"><span class="glyphicon glyphicon-log-in"></span>LOGIN</a></li>
            </ul>
          </div>
        </div></div>

        <div class="col-sm-8"><div id="content">
          <BR><BR>
            <?php
            $host = "localhost";
            $username = "it57160284";
            $password = "it57160284";
            $database = "it57160284";
            $conn = mysqli_connect($host,$username,$password,$database);
            $conn -> query("SET NAMES UTF8");
            $sql = "SELECT * FROM content WHERE page = '".$_GET['page']."' ORDER BY datetime DESC";
            $result = $conn->query($sql);
            $nub=0;
            $page=$_GET['page'];
            while($row = $result->fetch_object()){                
              $nub++;
              echo "<h1>$row->topic</h1>";
              echo "<h4>by "."$row->username"."</h4>";
              echo "<h6><span class= \"glyphicon glyphicon-time\"></span>Posted on "."$row->datetime"."</h6>";
              echo "<hr>";
              echo "<div class=\"container\" style=\"width:650px;margin-left:0px\">";
              echo"<div class=\"well\">"."$row->article"."</div>";
              echo"</div>";
              echo "&nbsp;&nbsp;<a href =article.php?id=$row->id><button type=\"button\" class=\"btn btn-primary active\">Read more<span class=\"glyphicon glyphicon-chevron-right\"></span></button></a>";             
            }
        /*if($page==0||$page==null){
          echo "<a href=\"index.php?page=1\" <button type=\"button\" class=\"btn btn-default\">ถัดไป</button></a>";
        } */     
        echo "<hr>";
        if($_GET['page']!=1){
         $page = $_GET['page']-1;
         //echo $page;
         echo "<a href=\"index.php?page=$page\" <button type=\"button\" class=\"btn btn-default\"style=\"margin-right:0px;\"><span class=\"glyphicon glyphicon-arrow-left\"></span>BACK&nbsp;</button></a>";
       }
       if($nub>4){
        $page = $_GET['page']+1;
        echo "<a href=\"index.php?page=$page\"<button type=\"button\" class=\"btn btn-default\" style=\"margin-left:500px;\">NEXT&nbsp;<span class=\"glyphicon glyphicon-arrow-right\"></span></button></a>";
      }
      echo "<BR><BR>";          
      ?>


    </div></div>
    
    <div class="col-sm-4"><div id="right">
      <BR><BR>
        <div class="well" style="width:80%">
          <h4>Blog Search</h4>
          <form action="find.php" method="post" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="find" class="form-control">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
              </span>
            </div>
            <!-- /.input-group -->
          </form>  
        </div>

          <div class=well style="width:80%">
            <h4>Blog Categories</h4>
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled">
                  <?php
                  $month1 = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน");
                  for($i=1;$i<=6;$i++){
                    $time1 = "SELECT COUNT(topic) FROM content WHERE status='s1' and MONTH(datetime)=$i";
                    $result = $conn->query($time1);
                    while($row = $result->fetch_array()){ 
            //echo $row[0];  
                      echo "<li>$month1[$i](<a href=\"time.php?id=$i\">$row[0]</a>)";
                      echo "</li>";
                    }
                  }
                  ?>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled">
                  <?php
                  $month2 = array("","","","","","","","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                  for($j=7;$j<=12;$j++){
                    $time2 = "SELECT COUNT(topic) FROM content WHERE MONTH(datetime)=$j";
                    $result2 = $conn->query($time2);
                    while($row2 = $result2->fetch_array()){ 
            //echo $row[0];  
                      echo "<li>$month2[$j](<a href=\"time.php?id=$j\">$row2[0]</a>)";
                      echo "</li>";
                    }
                  }
                  ?>
                </ul>
              </div>


            </div> </div>

            
            <div class="well" style="width:80%">
              <h4>Baby Blog</h4>
              <p>บล็อกนี้ถูกสร้างขึ้นเพื่อเป็นเเหล่งพบปะพูดคุยระหว่างสมาชิก ถ้าท่านใดสนใจจะเป็นส่วนหนึ่งของพวกเรา สามารถสมัครสมาชิกได้ตั้งเเต่วันนี้ พวกเราต้องการคุณ มาเป็นส่วนหนึ่งด้วยกันเถอะน่ะค่ะ</p>
            </div>

          </div></div>
          <div class="col-sm-12"><div id ="footer">
            <BR>Copyright@นางสาวจุฬาลักษณ์  วทนะรัตน์ คณะวิทยาการสารสนเทศ สาขาสารสนเทศ 57160284
            </div>
          </div>

        </div>
      </div>
      
    </body>
    </html>