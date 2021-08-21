<?php
$con = mysqli_connect("localhost","root","","bookstore");
?>
<html>
<head>

<title>login page</title>

<link rel="stylesheet" type="text/css" href="Function/loginStyle.css"> </head>
<link rel="icon" type="webIcon.png" href="webIcon.png">
<body>
<h1>Login</h1>

<form method="post" action="validation.php" >
<div class="loginDiv">
Username:<input type="text" name="userid" class="userid" /><br><br>
Password:<input type="password" name="pswrd" class="userid" /><br><br>
<input type="submit" value="Login" class="btn" />
<input type="button" value="Signup" class="btn1" onClick="location.href='signupPage.php'" /><br><br>
<p>Forgot your password? <u style="color:#f1c40f;">Click Here!</u></p>
</div>
</forum>

<script src="Function/loginScript.js" type="text/javascript">

</script>
</body>
</html>
