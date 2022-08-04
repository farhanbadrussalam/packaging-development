<?php  
session_start();

if (!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}
?>

<html>
<head>
	<title>Halaman Login</title>	
	<link rel="stylesheet" type="text/css" href="container.css">	
</head>
<body>

	<div class="container">	
		<h1>Login</h1>	

	<form action="login.php" method="POST"

		
			<tr>
				<td>User Id</td>
				<td><input type="text" name="user_id" placeholder="Masukkan User Id..."" required="" autofocus=""></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pwd" required=""></td>
			</tr>

			<tr>
				<td></td>
				<button type="submit">LOGIN</button>
			</tr>
		
	</form>

	<?php if(isset($_GET['pesan'])) {  ?>
	<label style="color:red;"><?php echo $_GET['pesan']; ?></label>
	<?php } ?>	
	</center>

	</div>
</body>
</html>