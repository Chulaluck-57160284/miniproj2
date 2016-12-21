<?php
session_start(); 
$host = "localhost";
$username = "it57160284";
$password = "it57160284";
$database = "it57160284";

$conn = mysqli_connect($host,$username,$password,$database);
$conn ->query("set names utf8");
if($conn ->connect_error){
	die('Connect error!');
}else{
	if($_POST['topic']!=null&&$_POST['article']!=null){
		//$id = $_POST['id'];
		$topic  = $_POST['topic']; 
		$article  = $_POST['article'];  
		$datetime = date("Y-m-d H:i:s");
		$status =$_POST['status'];
		$username = $_SESSION['username'];
		$sql = "INSERT INTO content(topic,article,datetime,username,status) VALUES('$topic','$article','$datetime','$username','$status')";
		//echo $sql;
		$conn ->query($sql);
		echo"Insert a article blog success.";
		echo"<meta http-equiv='refresh' content='0;URL=sort.php?in2=1'>";
	}else{
		echo"Please input article";
		echo"<meta http-equiv='refresh' content='0;URL=add.html'>";
	}
}
