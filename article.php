 <?php
    session_start(); 
    $user=$_SESSION['username'];   

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
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container-fluid">
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
              <li class="active"><a href="index.php" style="color:white;font-size: 14pt;">HOME</a></li>
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
        <?php
       $host = "localhost";
       $username = "it57160284";
       $password = "it57160284";
       $database = "it57160284";
       $conn = mysqli_connect($host,$username,$password,$database);
       $conn -> query("SET NAMES UTF8");
       $id = $_GET['id'];
       $sql = "SELECT * FROM content where id = $id";
       $sql2 = "SELECT * FROM comment WHERE id=$id";
       $sql3 = "SELECT fileToUpload FROM comment,content,Signup  where comment.id=$id and
        content.id=$id and comment.username=Signup.username";
       $result  = $conn->query($sql);
       $result2 = $conn->query($sql2);
       $result3 = $conn->query($sql3);

      while($row = $result->fetch_object()){           
        echo "<h1>$row->topic</h1>";
        echo "<h4>by "."$row->username"."</h4>";
        echo "<h6><span class= \"glyphicon glyphicon-time\"></span>Posted on "."$row->datetime"."</h6>";
        echo "<hr>";
        echo "<div class=\"container\" style=\"width:650px;margin-left:0px\">";
        echo"<div class=\"well\">"."$row->article"."</div>";
        echo"</div>";  
      }
      $sql4 = "SELECT COUNT(reply) FROM comment where id = $id";
      $result4 = $conn->query($sql4);
      $row4 = $result4->fetch_array();
      echo"<p><span class=\"badge\">$row4[0]</span> Comments:</p><br>"; 
      while($row2 = $result2->fetch_object()){              
        echo"<div class=\"row\">"; 
        $row3 = $result3->fetch_object(); 
        //echo $row3->fileToUpload;       
        echo"<div class=\"col-sm-2 text-center\">";
        echo"<div class=\"profile\">";
        echo"<img src = \"uploads\\$row3->fileToUpload\">";
        //เอ๊ะบอกว่า เป็นphpอยู่เเล้วไม่ต้องใส่อีก
        echo"</div>";
        echo"</div>";
        echo" <div class=\"col-sm-10\">"; 
        echo"<h4>"."$row2->username "."<small>"."$row2->datetime"."</small></h4>"; 
        echo"<p>"."$row2->reply"."</p>"; 
        echo"<br>"; 
        echo"</div>"; 
        echo"</div>"; 
      }    
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