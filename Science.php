<?php
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

  <div class="menu">
  <ul class="list">
  <h1>CATEGORIES</h1><br>
   <?php getCats(); ?>
  </ul>
</div>

<div class="main">
  <h1>Science & Technology</h1>
  
  <div class="row">
  
  <?php
  
  $get_ENGbooks = "select * from books where cat_id=6 order by rand() LIMIT 0,6";
  $run_ENGbooks = mysqli_query($con, $get_ENGbooks);
  while($row_ENGbooks = mysqli_fetch_array($run_ENGbooks)){
	  $book_id=$row_ENGbooks['book_id'];
	  $author_name=$row_ENGbooks['author_name'];
	  $book_price = $row_ENGbooks['book_price'];
	  $book_image = $row_ENGbooks['book_image'];
	  $book_name = $row_ENGbooks['book_name'];
	  
	 
    echo "
	<div class='column'>
	<h5 >$book_name</h5>
	<img src='$book_image' alt='$book_name' style='width=100%'>
	<h6>Price:$book_price</h6>
	<a href='Buy.php?add_cart=$book_id'><span><button style=' padding: 10px;   width:60px;'>Buy</button></span></a>
	<a href='addTocart.php?add_cart=$book_id'><span style='padding-left:25px;'><button style=' padding: 10px;   '>Add To Cart</button></span></a>

	</div>";
  }
  
  ?>

  </div>
  
  </div>
  
  </div>
  </html>