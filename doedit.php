<html><head><meta charset = "utf8"></head></html>
<?php
session_start();
$user = $_SESSION['username'];
$host = "localhost";
$username = "it57160284";
$password = "it57160284";
$database = "it57160284";
$conn = mysqli_connect($host,$username,$password,$database);
$conn->query("SET NAMES UTF8");
$conn ->query($sql);
$result = $conn->query($sql);
if($_POST['topic']!=null&&$_POST['article']!=null&&$_POST['status']!=null){
	$topic  = $_POST['topic'];
	$article  = $_POST['article'];
	$status  = $_POST['status'];
	$id = $_GET['id'];
	$sql = "UPDATE content set 
	topic = '$topic' , article = '$article'  , status = '$status' where id = $id"; 

	if($conn->query($sql)){
		echo "update a blog success.";
		echo "<meta http-equiv='refresh' content='0; URL=editarticle2.php?username=$user'>";
	}else{
		echo "update a blog fail.";
		echo "<meta http-equiv='refresh' content='0; URL=editarticle2.php?username=$user'>";
	}
}else{
	echo"Please input form";
	echo"<meta http-equiv='refresh' content='0;URL=edit.php?id=".$_POST['username']."'>";
	//echo"<meta http-equiv='refresh' content='0;URL=index .php'>";
}
?>
