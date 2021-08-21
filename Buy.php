<?php
$con = mysqli_connect("localhost","root","","bookstore");
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
  <?php
  $buy_id=$_GET['add_cart'];
  $retrive = "select * from books where book_id='$buy_id'";
  $run_retrive = mysqli_query($con,$retrive);
   while($row_retrive = mysqli_fetch_array($run_retrive)){
	   $author_name=$row_retrive['author_name']; 
	   $book_image = $row_retrive['book_image'];
	   $book_price = $row_retrive['book_price'];
	   $book_name = $row_retrive['book_name'];
	   echo "
	   <span style='float: left; width: 40%; padding: 15px 200px; '>
	   <img src='$book_image'>
	   <h4>Author:$author_name</h4>
	   <h4>Price:$book_price Rs</h4></span>";
   }
  
  ?>
  
  <form style="padding:15px 600px;"> 
  <input type="text" placeholder="Name" style="width:250px; height:20px; padding-left:5px;" required ><br><br>
   <input type="text" placeholder="Mobile Number" style="width:250px; height:20px; padding-left:5px;" required  ><br><br>
   <input type="email" placeholder="Email" style="width:250px; height:20px; padding-left:5px;" required  ><br><br>
   <input type="text" placeholder="Address" style="width:250px; height:20px; padding-left:5px;" required  ><br><br>
   <input  type="radio" value="cash"  name="payment">Paytm
   <input  type="radio" value="card" name="payment">Card<br><br>
   <input type="button" name="Confirm" value="Confirm" onclick="location.href='home.php'" style="width:70px; height:20px; padding-left:5px;" >
   <input type="button" name="Cancel" value="cancel" onclick="location.href='home.php'"  style="width:70px; height:20px; padding-left:5px;" >
   
  
  </form>
 </div>
  </body>
  </html>