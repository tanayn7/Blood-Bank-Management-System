<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
	body{
		margin: 0px;
		padding: 0px;
		/* background-image: url(image.jpg);
		background-repeat: no-repeat;
		background-size: contain;
		background-position: center; */
		background-color: #dc1d1d ;
		background: radial-gradient(#dc1d1d , red);
	}
</style>
<body>
     <form action="login.php" method="post">
     	<h2 style="letter-spacing: 8px;">ADMIN LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Email</label>
     	<input type="email" name="uname" placeholder="Email" required><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="#" class="ca">Only for a admin</a>
     </form>
</body>
</html>