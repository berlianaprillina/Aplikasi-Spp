<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: blue">
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" style="color: black; background-color: blue" value="LOGIN">
 
			<br/>
			<br/>
			<center>
				
			</center>
		</form>
		
	</div>
 
 
</body>
</html>