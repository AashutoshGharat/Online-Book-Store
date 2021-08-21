<?php
session_start();
$con = mysqli_connect("localhost","root","","bookstore");
include("Function/function.php");
?>
<head>
<title>Online Book Store</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="discription" content="Free e-books for download">
<meta name="keyword" content="">
<meta name="author" content="vivek gaud">

<link rel="icon" type="webIcon.png" href="webIcon.png">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="header">
<div class="logo">
<span class="logoimg"><img src="img/logo1.png" style="border:none; height:138px;"</span>
</div>

<div class="sitename">	
<h1>Online Boot Store</h1>
</div>
</div>

  <div class="navbar">
   <a href="home.php" >Home</a>
   <a href="#">Contacts</a>
   <a href="#">About us</a>  
   <a href="cart.php">Cart</a>  
   <form style="padding-top:15px; padding-left:70px; float:right;">
   <input type="text" style="width:220px;">
   <input type="button" value="Search" >
   </form>
   <a href="logout.php">Log Out</a>
  </div>

<div>
<form action="cart.php" method="post" enctype="multipart/form-data">

<table width="100%" align="center" border='1' frame='hsides' rules='rows'>
<tr align="center">
<td><b>Remove</td>
<td><b>Book</td>
<td><b>Quantity</td>
<td><b>Total price</td>
</tr>
<?php  
$name=$_SESSION['username'];
	$user_id= "select * from customer where cust_name='$name'";
	$run_user_id = mysqli_query($con,$user_id);
	
	while($row_cust = mysqli_fetch_array($run_user_id)){
	  $u_id=$row_cust['c_id'];
	  }
	  
	$get_cart = "select * from cart where cust_id='$u_id'";
	$run_get_cart = mysqli_query($con,$get_cart);
	while($row_cart = mysqli_fetch_array($run_get_cart)){
		
		$b_id= $row_cart['book_id'];
		$qy = $row_cart['quantity'];
		$cart_id = $row_cart['cart_id'];
		
	$display_book = "select * from books where book_id='$b_id'";
	$run_display_book = mysqli_query($con,$display_book);
	
	while($row_books = mysqli_fetch_array($run_display_book)){
		$b_image = $row_books['book_image'];
		$b_name = $row_books['book_name'];
		$b_author = $row_books['author_name'];
		$b_price = $row_books['book_price'];
	echo "
	<tr align='center'>
	<td><input type='checkbox' name='remove[]' value='$cart_id'></td>
	<td>$b_name<br>
	<img src='$b_image' height='80'></td>
	<td><input type='text' name='qty' value='1' size='3px'></td>
	<td>$b_price</td>
	</tr>";
	}
}

?>


</tr>
</table>
<div style="float:right;">
<input type="submit" name="update" value="Update" style=' padding: 10px;   width:60px;' >
<input type="submit" name="checkout" value="Checkout" style=' padding: 10px;   ' >

</div>
</form>


<?php
if(isset($_POST['update'])){
	foreach($_POST['remove'] as $remove_id){
		
		$delete_book = "delete from cart where cart_id='$remove_id'";
		$run_delete_book = mysqli_query($con,$delete_book);
		if($run_delete_book){
			echo "<script>window.open('cart.php','_self')</script>";
			
		}
		
	}
}
?>

 </div>
  </body>
  </html>