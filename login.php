<?php include('config2.php');?>
<?php
	session_start();
	if (@$_GET['msg']) {
		echo "Вы зарегистрированы";
	}
	if (isset($_SESSION['authentication'])) {
	  header('Location: admin.php');
	  exit();
	}
	if (!empty($_POST['login']) && !empty($_POST['pass'])) {
		$login = htmlspecialchars(trim($_POST['login']));
		$pass = htmlspecialchars(trim($_POST['pass']));
		$salt = 'taiestisuvalinetekst';
		$kryp = crypt ($pass, $salt);
		$paring = "SELECT * FROM users WHERE login='$login' AND pass='$kryp'";
		$output = mysqli_query ($connection, $paring);
		
		if (mysqli_num_rows($output)==1) {
			$_SESSION['authentication'] = 'whatever';
			header('Location: admin.php');
		} else {
			echo "неправильный логин или пароль";
		}
	}  
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<!-- Bootstrap CSS -->
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<title>Вход</title>
	</head>
	<body>
		<h1>Вход</h1>
		<form method="post">
  			<div class="mb-3">
    			<label class="form-label">Login</label>
    			<input type="text" name="login" class="form-control" >	
  			</div>
  			<div class="mb-3">
   				<label class="form-label">Password</label>
    			<input type="password" class="form-control" name="pass">
  			</div>

  			<button type="submit" class="btn btn-primary">Войти</button>
		</form>

	</body>
</html>

