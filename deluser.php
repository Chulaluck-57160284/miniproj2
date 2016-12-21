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
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row">
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
session_start();
$user = $_SESSION['username'];
$input=0;
if(!empty($_POST['s1'])){
  $input=1;
}
if(!empty($_POST['s2'])){
  $input=2;
}
if($input==0){

  echo "<form method=\"post\" action=\"deluser.php?username=$user\">";
  echo "<h1>เเบบฟอร์มยกเลิกการลงทะเบียน</h1>";
  echo "<h6>*ถ้ายกเลิกการลงทะเบียนข้อมูลจะหาย*</h1>";
  echo"<button type=\"submit\" value=\"Yes\" name =\"s1\" class=\"btn btn-danger\">Delete</button>";
  echo"<button type=\"reset\" value=\"No\" name = \"s2\" class=\"btn btn-primary\">Cancel</button>";
  echo "</form>";
}
if($input==1){
  $host = "localhost";
  $username = "it57160284";
  $password = "it57160284";
  $db = "it57160284";

  $conn = new mysqli($host,$username,$password,$db);
  $conn ->query("set name utf8");
  if($conn ->connect_error){
    die('Connect error!');
  }else{
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "DELETE FROM Signup WHERE username = Chulaluck";
    //echo $sql;
    $conn ->query($sql);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['img']);
    echo"Delete a  user success.";
    echo"<meta http-equiv='refresh' content='0;URL=index.php?page=1'>";
    //ติด forign key
  }
}
if($input==2){
  echo "Cancel to delete a user .";
  echo "<meta http-equiv='refresh' content='0;URL=index2.php?page=1'>";
}
?>
    </div></div> 
    </div>
  </div>
</body>
</html>
