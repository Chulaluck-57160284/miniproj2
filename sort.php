<?php

		$host="localhost";
          $username="it57160284";
          $password="it57160284";
          $db="it57160284";
          $conn=new mysqli($host,$username,$password,$db);
          $conn->query("SET NAMES UTF8");
          $sql="SELECT * FROM content ORDER BY datetime  desc";
         
          $result=$conn->query($sql);

          $page=1;
          $nub=0;

          while($row = $result->fetch_object()){
          		
          $host2="localhost";
          $username2="it57160284";
          $password2="it57160284";
          $db2="it57160284";
          $conn2=new mysqli($host2,$username2,$password2,$db2);
          $conn2->query("SET NAMES UTF8");

          if($row->status==="s1"){
               $nub++;    	
          	if($nub==6){
          			$page++;
                         $nub=1;
          	}
          $sql2="UPDATE content 
          SET id=$row->id,username='$row->username',topic='$row->topic',
          status='$row->status',article='$row->article',datetime='$row->datetime',page='$page' 
          WHERE id=$row->id";

          
          if($conn2->query($sql2)){
          	
          }else{
          	echo "ไม่ได้";
          }

      }else{
      	$sql2="UPDATE content 
          SET id=$row->id,username='$row->username',topic='$row->topic',
          status='$row->status',article='$row->article',datetime='$row->datetime',page=0 
          WHERE id=$row->id";

          
          if($conn2->query($sql2)){
          	
          }else{
          	echo "ไม่ได้";
          }

      }

          	//echo $page;

          }

          if(!empty($_GET['in2'])){
               echo '<meta http-equiv= "refresh" content="0; url=index2.php?page=1"/>';
          }

          if(empty($_GET['page'])){
               echo '<meta http-equiv= "refresh" content="0; url=index.php?page=1"/>';

          }else if(empty($_GET['in2'])){
               echo '<meta http-equiv= "refresh" content="0; url=index.php?page=$_GET[\'page\']/>';
          }

?>