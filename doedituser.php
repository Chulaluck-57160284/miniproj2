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
if($conn ->connect_error){
	die('Connect error!');
}else{
	if($_POST['username']!=null&&$_POST['password']!=null&&$_POST['sex']){
		$id = $_POST['id'];
		$username  = $_POST['username']; 
		$password  = $_POST['password'];  
		$sex = $_POST['sex'];
		$img;//สร้างตัวเเปรมาเพื่อเก็บค่า เพราะตัวเเปร newimage ใช้ได้เเค่ใน if
		$imageupload = $_FILES['imageupload']['tmp_name'];  
		$imageupload_name = $_FILES['imageupload']['name']; 
		//$newimage->image_resize         = true ; // อนุญาติให้ย่อภาพได้
        // $newimage->image_x              = 20px ; // กำหนดความกว้างภาพเท่ากับ 400 pixel 
        //$newimage->image_ratio_y        = true; // ให้คำณวนความสูงอัตโนมัติ 	 
		if(isset($_POST['submit'])){  
			//echo "submit";
			if($imageupload!=null){  
				$arraypic = explode(".",$imageupload_name);//แบ่งชื่อไฟล์กับนามสกุลออกจากกัน  
				$lastname = strtolower($arraypic);  
				$filename = $arraypic[0];//ชื่อไฟล์  
				$filetype = $arraypic[1];//นามสกุลไฟล์ 
				//echo "come in"; 
				if($filetype=="jpg" || $filetype=="jpeg" || $filetype=="png"  
				|| $filetype=="gif"){  
				$newimage = $filename.".".$filetype;//รวมชื่อไฟล์กับนามสกุลเข้าด้วยกัน
				copy($imageupload,"uploads/".$newimage); //โฟลเดอร์สำหรับเก็บรูป/ไฟล์รูป
				$GLOBALS["img"] = $newimage;//ใช้ได้ทั้งไฟล์
				}else {  
				echo "<h3>ERROR : ไม่สามารถ Upload รูปภาพ</h3>";  
				}  
			}else{
				if($_POST['sex']=="man"){
					$img = "man.jpg";
				}else{
					$img = "woman.jpg";
				}
				//echo "no come";
			}  
		}
		//$showpic = "uploads/".$newimage; 
		$sql = "UPDATE Signup set 
	   username = '$username' , password = '$password',fileToUpload='$img',sex='$sex' where username = '$user'";
		//echo $sql;
		$conn ->query($sql);
		echo"Update a profile success.";
		echo"<meta http-equiv='refresh' content='0;URL=Login.php'>";
	}else{
		echo"Update a profile fail.";
		echo"<meta http-equiv='refresh' content='0;URL=edituser.php?username=$user'>";
	}	

}
?>
