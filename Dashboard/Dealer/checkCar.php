<?php
require_once '../../db_connect.php';
if(isset($_POST["product_name"],$_POST["product_cate"],$_POST["product_size"]))
{
	$name=$_POST["product_name"];
	$cate=$_POST["product_cate"];
	$size=$_POST["product_size"];
	
	$mysql="SELECT * FROM products where Product_Name='$name' AND Product_Size='$size' AND CategoryId='$cate' AND Product_Status!='-1'";
	$verifyProd=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyProd);
}
?>
<?php
if(isset($_POST["up_product_name"],$_POST["up_product_cate"],$_POST["up_product_size"]))
{
	$name=$_POST["up_product_name"];
	$cate=$_POST["up_product_cate"];
	$size=$_POST["up_product_size"];
	
	$mysql="SELECT * FROM products where Product_Name='$name' AND Product_Size='$size' AND CategoryId='$cate' AND Product_Status!='-1'";
	$verifyUpProd=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyUpProd);
}
?>
<?php
if(isset($_POST["cid"])){
	require_once '../../db_connect.php';
	$mysql="Select * from cars where car_ID='".$_POST['cid']."';
	$verifyCat=mysqli_query($connect,$mysql);
	echo mysqli_num_rows($verifyCat);
}
?>