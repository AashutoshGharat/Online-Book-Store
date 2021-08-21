<?php
$con = mysqli_connect("localhost","root","","bookstore");
?>

<html>
<head></head>

<body>
<form method="post" action="insert_books.php" enctype="multipart/form-data">


<table width="700" align="center" border="2">

<tr>
<td><h2>Insert new Books:<h2></td>
</tr>

<tr>
<td><input type="text" name="book_id" placeholder="book id" required></td>
</tr>

<tr>
<td><input type="text" name="author_name" placeholder="author name" required></td>
</tr>

<tr>
<td><input type="file" name="book_image" required></td>
</tr>

<tr>
<td><input type="text" name="book_name" placeholder="book name" required></td>
</tr>

<tr>
<td><input type="text" name="book_price" placeholder="book price" required></td>
</tr>

<tr>
<td>
<select name="book_cat">
<option>Select a Category</option>
  <?php
  $get_cats = "select * from categories";
  $run_cats = mysqli_query($con, $get_cats);
  while($row_cats = mysqli_fetch_array($run_cats)){
	  $cat_id=$row_cats['cat_id'];
	  $cat_name=$row_cats['cat_name'];
	  $cat_link = $row_cats['cat_link'];
	  
    echo "<option value='$cat_id'>$cat_name</option>";
  }

?>

</select>

</td>
</tr>

<tr>
<td><input type="submit" name="insert_book" value="Insert Book"></td>
</tr>

</table>

</form>

</body>

</html>


<?php

if(isset($_POST['insert_book'])){
	
	$book_id = $_POST['book_id'];
	$author_name = $_POST['author_name'];
	$book_name = $_POST['book_name'];
	$book_price = $_POST['book_price'];
	$cat_id = $_POST['cat_id'];

	
	$book_image = $_FILES['book_image']['name'];
	
	$temp_name = $_FILES['book_image']['tmp_name'];
	
		
	move_uploaded_file($temp_name,"img/$book_image");
	$insert_book = "insert into homebooks (book_id,author_name,book_image,book_name,book_price,cat_id) value (
	'$book_id','$author_name','$book_image','$book_name','$book_image','$book_price','$cat_id')";
	
	$run_book = mysqli_query($con,$insert_book);
	
	if($insert_book)
	{
	echo "<script>alert('successfull')</script>";
	}
}




?>