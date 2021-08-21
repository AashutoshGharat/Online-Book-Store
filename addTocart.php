<?php
session_start();
$con = mysqli_connect("localhost","root","","bookstore");
include("Function/function.php");


$name=$_SESSION['username'];
	$user_id= "select * from customer where cust_name='$name'";
	$run_user_id = mysqli_query($con,$user_id);
	while($row_cust = mysqli_fetch_array($run_user_id)){
	  $u_id=$row_cust['c_id'];
	  }
 
    $buy_id=$_GET['add_cart'];
    $retrive = "select * from books where book_id='$buy_id'";
    $run_retrive = mysqli_query($con,$retrive);
    while($row_retrive = mysqli_fetch_array($run_retrive)){
	   $author_name=$row_retrive['author_name']; 
	   $book_image = $row_retrive['book_image'];
	   $book_price = $row_retrive['book_price'];
	   $book_name = $row_retrive['book_name'];

   }
   
    $check_book = "select * from cart where cust_id='$u_id' AND book_id='$buy_id'";
    $run_check_book = mysqli_query($con,$check_book);
    if(mysqli_num_rows($run_check_book)>0){
	   echo "<script>alert('Already present in cart please select other book ')</script>";
	   }
	   else{
		   $cart_insert= "insert into cart (cust_id,book_id) value ($u_id,$buy_id) ";
		   $run_cart_insert = mysqli_query($con,$cart_insert);
		   echo "<script>alert('Book added to cart')</script>
		   <script>window.open('home.php','_self')</script>";
		   }
	

?>
 