<?php
include "connect.php";
 $productcat = $_POST['productcat'];
 $text="";
 for($i=0; $i<count($productcat); $i++){
	 if(count($productcat)-1== $i){
		 $text .= " productcategory LIKE '".$productcat[$i]."'";
	 }
	 else{
		$text .= " productcategory LIKE '".$productcat[$i]."' OR ";
	 }
 }
if(isset($productcat)){
	$query = "SELECT Productname, productid FROM products WHERE " . $text;
	$data= mysqli_query($conn, $query);
	$list=array();
	while($row=mysqli_fetch_array($data)){
		$list[] = $row;
	}
	print json_encode($list);
}
?>