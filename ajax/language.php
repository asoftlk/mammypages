<?php
include "../connect.php";
if(isset($_POST['lang'])){
$language = $_POST['lang'];
if($language=="eng"){
	$data= mysqli_query($conn, "SELECT category FROM article_category");
	$list=array();
	while($row=mysqli_fetch_array($data)){
		$list[] = $row['category'];
	}
	print json_encode($list);
}
if($language=="sin"){
	$data= mysqli_query($conn, "SELECT category FROM article_category_sinhala");
	$list=array();
	while($row=mysqli_fetch_array($data)){
		$list[] = $row['category'];
	}
	print json_encode($list, JSON_UNESCAPED_UNICODE);
}
if($language=="tam"){
	$data= mysqli_query($conn, "SELECT category FROM article_category_tamil");
	$list=array();
	while($row=mysqli_fetch_array($data)){
		$list[] = $row['category'];
		
	}
	print  json_encode($list, JSON_UNESCAPED_UNICODE);
}
}
if(isset($_POST['langselected'])){
 $langselected = $_POST['langselected'];
 $list=array();
 if (in_array("English", $langselected)){
	 $data= mysqli_query($conn, "SELECT category FROM article_category");
	while($row=mysqli_fetch_array($data)){
		$list[] = $row['category'];
	}
 }
 if (in_array("sinhala", $langselected)){
	 $data= mysqli_query($conn, "SELECT category FROM article_category_sinhala");
	while($row=mysqli_fetch_array($data)){
		$list[] = $row['category'];
	}
 } 
 if (in_array("tamil", $langselected)){
	 $data= mysqli_query($conn, "SELECT category FROM article_category_tamil");
	while($row=mysqli_fetch_array($data)){
		$list[] = $row['category'];
	}
 }
 
 print  json_encode($list, JSON_UNESCAPED_UNICODE);
}
?>