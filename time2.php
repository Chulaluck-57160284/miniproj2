 <?php
    session_start(); 
    if(empty($_SESSION['username'])){
        echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
    }else{
      $user = $_SESSION['username'];
      $img=$_SESSION['img'];
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

  <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12"><div id="header">
        <BR>
          <table style="width:80%; border:none; margin-left: 110px">
            <tr>
              <td><div class="profile"><img src ="uploads\<?php echo $img; ?>"></div></td>
              <td colspan=5><font size="48pt" color="white"><?php echo $user; ?></font></td>
            </tr>
          </table>       
          <hr width="90%">
          <div class="container-fluid" style="width:90%">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index2.php?page=1" style="color:white;font-size: 14pt;">HOME</a></li>
              <li><a href="private.php" style="color:white;font-size: 14pt;">PRIVATE</a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"style="color:white;font-size: 14pt;">USER <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="edituser.php?username=<?php echo $user; ?>">EDIT</a></li>
                  <li><a href="deluser.php?username=<?php echo $user; ?>">DELETE</a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"style="color:white;font-size: 14pt;">ARTICLE <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="add.php">ADD</a></li>
                  <li><a href="editarticle2.php">EDIT</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="color:white;font-size: 14pt;">
              <li><a href="Logout.php" style="color:white;font-size: 14pt;"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</a></li>
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
            for($yy=2014;$yy<=2020;$yy++){
              $sql = "SELECT * FROM content WHERE status='s1' and YEAR(datetime)='$yy' and MONTH(datetime)= ".$_GET['id']."  ORDER BY datetime DESC";
              //echo $sql;
              $result = $conn->query($sql);
              $page=$_GET['page'];
              $mm;
              if($_GET['id']=='1')$mm = "มกราคม";
              else if($_GET['id']=='2')$mm = "กุมภาพันธ์";
              else if($_GET['id']=='3')$mm = "มีนาคม";
              else if($_GET['id']=='4')$mm = "เมษายน";
              else if($_GET['id']=='5')$mm = "พฤษภาคม";
              else if($_GET['id']=='6')$mm = "มิถุนายน";
              else if($_GET['id']=='7')$mm = "กรกฎาคม";
              else if($_GET['id']=='8')$mm = "สิงหาคม";
              else if($_GET['id']=='9')$mm = "กันยายน";
              else if($_GET['id']=='10')$mm = "ตุลาคม";
              else if($_GET['id']=='11')$mm = "พฤศจิกายน";
              else if($_GET['id']=='12')$mm = "ธันวาคม";
             
              
              while($row = $result->fetch_object()){ 
                $i++;               
                if($row->topic!=null){
                if($i==1)
                echo "<center><U><H1>บทความที่คุณค้นหาในเดือน".$mm."ปี".$yy."</H1></U></center>"; 
                
                echo "<h1>$row->topic</h1>";
                echo "<h4>by "."$row->username"."</h4>";
                echo "<h6><span class= \"glyphicon glyphicon-time\"></span>Posted on "."$row->datetime"."</h6>";
                echo "<hr>";
                echo "<div class=\"container\" style=\"width:650px;margin-left:0px\">";
                echo"<div class=\"well\">"."$row->article"."</div>";
                echo"</div>";
                echo "&nbsp;&nbsp;<a href =article2.php?id=$row->id><button type=\"button\" class=\"btn btn-primary active\">Read more<span class=\"glyphicon glyphicon-chevron-right\"></span></button></a>";            
              }
              
             }
             $i=0; 
            }
      echo "<BR><BR>";          
      ?>


    </div></div>
    
    <div class="col-sm-4"><div id="right">
      <BR><BR>
      <div class="well" style="width:80%">
          <h4>Blog Search</h4>
          <form action="find2.php" method="post" class="sidebar-form">
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
                echo "<li>$month1[$i](<a href=\"time2.php?id=$i\">$row[0]</a>)";
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
                echo "<li>$month2[$j](<a href=\"time2.php?id=$j\">$row2[0]</a>)";
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