<?php
include_once 'db_connect.php';

if(isset($_POST["email"])){
    $email=$_POST["email"];
	$mysql="SELECT * FROM subscribers WHERE sub_Email='$email' AND sub_Status='Subscribed'";
	$verifyEmail = mysqli_query($connect, $mysql);
	echo mysqli_num_rows($verifyEmail);
}
?>
<?php
