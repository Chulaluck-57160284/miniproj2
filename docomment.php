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
	if($_POST['reply']!=null){
		$id = $_POST['id'];
		$reply  = $_POST['reply']; 
		$datetime = date("Y-m-d H:i:s");
		$username = $_SESSION['username'];
		$sql = "INSERT INTO comment(reply,datetime,username,id) VALUES('$reply','$datetime','$username','$id')";
		//echo $sql;
		$conn ->query($sql);
		//echo $id;
		echo"add a comment blog success.";
		echo"<meta http-equiv='refresh' content='0;URL=article2.php?id=$id'>";
	}else{
		echo"Please input article";
		echo"<meta http-equiv='refresh' content='0;URL=article2.php?id=$id'>";
	}
}
