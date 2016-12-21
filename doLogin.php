<meta charset="utf8">
<?php
session_start();

$host = "localhost";
$username = "it57160284";
$password = "it57160284";
$database = "it57160284";

$conn = mysqli_connect($host,$username,$password,$database);
$conn->query("set names utf8");

if($conn->connect_error){
	die('Connect error!');
}else{
	if($_POST['username']!=null&&$_POST['password']){
		$user = $_POST['username'];
		$sql = "SELECT * from Signup where username = '$user'";
		$result = $conn->query($sql);
		$row=$result->fetch_object();
		if($_POST['username']==$row->username){
			if($_POST['password']==$row->password){
				$_SESSION['username']=$row->username;	
				$_SESSION['password']=$row->password;
				$_SESSION['img']=$row->fileToUpload;
				//echo $_session['username'];
				echo"Correct";
				echo"<meta http-equiv='refresh' content='0;URL=index2.php?page=1'>";
			}else{
				echo"Password incorrect";
				echo"<meta http-equiv='refresh' content='0;URL=Login.php'>";
			}
		}else{
			echo"Plase Sign Up";
			echo"<meta http-equiv='refresh' content='0;URL=SignUp.html'>";
		}
		
	
	}
	
}
?>