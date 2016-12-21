 <?php
    session_start(); 
    if(empty($_SESSION['username'])){
        echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
    }else{
      $img=$_SESSION['img'];
      $user = $_SESSION['username'];
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
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12"><div id="header">
      <BR>
        <table style="width:80%; border:none; margin-left: 110px">
          <tr>
            <td><div class="profile"><img src ="uploads\<?php echo $img; ?>"></td>
            <td colspan=5><font size="48pt" color="white"><?php echo $user; ?></font></td>
          </tr>
        </table>       
        <hr width="90%">
                <div class="container-fluid" style="width:90%">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php" style="color:white;font-size: 14pt;">HOME</a></li>
            <li><a href="private.php" style="color:white;font-size: 14pt;">PRIVATE</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"style="color:white;font-size: 14pt;">USER<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="edituser.php">EDIT</a></li>
                  <li><a href="deluser.php">DELETE</a></li>
                </ul>
              </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"style="color:white;font-size: 14pt;">ARTICLE<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="add.php">ADD</a></li>
                  <li><a href="editarticle2.php">EDIT</a></li>
                  <li><a href="del.php">DELETE</a></li>
                </ul>
              </li>
          </ul>
          <ul class="nav navbar-nav navbar-right" style="color:white;font-size: 14pt;">
            <li><a href="Logout.php" style="color:white;font-size: 14pt;"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</a></li>
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
    $conn->query("SET NAMES UTF8");

    /*if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
    echo "pass";
    }*/
    //$user = $_SESSION['username'];
    $sql = "SELECT * FROM Signup WHERE username = '$user'";
    //อย่าลืมถ้าข้อความเป็นสตริงเเล้วไม่ได้ใส่ '' เวลาfetch จะfetchไม่ออก หน้าจอขาว
    //echo $user;
    $result = $conn->query($sql);
    //$id =$_GET['id'];
    $row=$result->fetch_object();
    //$row = mysql_fetch_object($result); //เเบบออบเจ็ค
    //if($result){echo "true";}else{echo "false";}
    //mysql_free_result($result); 
    ?>
      <FORM role="form" method="post" action="doedituser.php?id=<?php echo $_GET['username']; ?>" enctype="multipart/form-data">
      <div class="form-group">
      <h1>เเบบฟอร์มเเก้ไขการลงทะเบียน</h1>
      <INPUT TYPE="hidden" NAME="id" value="<?php echo $id?>">
      <label for="username">Username :</label>
      <input type="text" class="form-control" id="username" name="username" 
         value="<?php echo $row->username; ?>">
      <label for="password">Password :</label>
      <input type="text" class="form-control" id="password" name="password" 
         value="<?php echo $row->password; ?>"><BR>
      <input name="imageupload" type="file" size="35"/>
       <label for="sex">Sex :</label>
       <input type="radio" name="sex" value="man" style="width:20px" required>Man
       <input type="radio" name="sex" value="woman" style="width:20px" required>Woman
       <BR>
       <!--ห้ามลบเด็ดขาด ไม่งั้นรูปจะไม่ขึ้น-->
       <input type="submit" name="submit" value="Submit" class="btn btn-primary">
      <input type="reset" name= "reset" class="btn btn-primary">
      </div>
    </FORM>
    </div></div>
    </div>
  </div>

</body>
</html>