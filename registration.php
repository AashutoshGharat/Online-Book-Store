<?php

$db = mysqli_connect("localhost","root","","bookstore");


$name= $_POST['userid'];
$mobile= $_POST['mobile'];
$address= $_POST['address'];
$pass= $_POST['pswrd'];

$value = "select * from customer where cust_name='$name' and cust_mobile='$mobile'";
$exevalue = mysqli_query($db,$value);

$result = mysqli_num_rows($exevalue);

if($result==1){
	echo " <script>alert('Use different username and mobile number')</script>";
}
else{
	$insert = "insert into customer (cust_name,cust_mobile,cust_add,cust_pass) values ('$name','$mobile','$address',$pass)";
	$exeinsert = mysqli_query($db,$insert);
	echo "<script>alert('Successful Signup')</script>
	<script>window.open('loginPage.php','_self')</script>";
	
}
?>