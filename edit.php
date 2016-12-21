 <?php
    session_start(); 
    $img=$_SESSION['img'];
    if(empty($_SESSION['username'])){
        echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
    }else{
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
    $host = "localhost";
    $username = "it57160284";
    $password = "it57160284";
    $database = "it57160284";
    $conn = mysqli_connect($host,$username,$password,$database);
    $conn ->query("SET NAMES UTF8");
    $conn ->query($sql,$link);
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM content WHERE id = ".$_GET['id']."";
    $result = $conn->query($sql);
    //if($result){echo "true";}else{echo "false";}
    //$id =$_GET['id'];
    $row=$result->fetch_object();
    ?>
      <FORM role="form" method="post" action="doedit.php?id=<?php echo $_GET['id']; ?>">
      <div class="form-group">
      <h1>เเบบฟอร์มเเก้ไขบทความ</h1>
      <INPUT TYPE="hidden" NAME="id" value="<?php echo $id?>">
      <label for="topic">Topic :</label>
      <input type="text" class="form-control" id="topic" name="topic" value="<?php echo $row->topic; ?>">
      <label for="Comment">Comment :</label>
      <textarea class="form-control" rows="5" id="comment" name="article"><?php echo "$row->article"; ?></textarea><BR> 
      <label for="status">Status :</label>
      <select name="status">
      <option value="s1">สถานะเผยเเพร่</option>
      <option value="s2">สถานะไม่เผยเเพร่</option>
      </select>
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-primary">Cancel</button>
      </div>
    </FORM>
    </div></div>
  
   
    </div>
  </div>

</body>
</html>