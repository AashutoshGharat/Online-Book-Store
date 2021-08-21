<?php
session_start();
$con = mysqli_connect("localhost","root","","bookstore");
?>
<html>
<head>

<title>signup page</title>

<link rel="stylesheet" type="text/css" href="Function/loginStyle.css"> </head>
<link rel="icon" type="webIcon.png" href="webIcon.png">
<body>
<h1>Sign Up</h1>

<form method="post" action="registration.php" >
<div class="signupDiv">
Username:<input type="text" name="userid" class="userid" /><br><br>
Mobile No:<input type="text" name="mobile" class="userid" /><br><br>
Address:<input type="text" name="address" class="userid" /><br><br>
Password:<input type="password" name="pswrd" class="userid" /><br><br>
<input type="submit"  value="Signup" class="btn" />
<input type="button" onClick="location.href='loginPage.php'" value="Cancel" class="btn1" /><br><br>
<p>Forgot your password? <u style="color:#f1c40f;">Click Here!</u></p>
</div>
</forum>

<script src="Function/loginScript.js" type="text/javascript">

</script>
</body>
</html>
