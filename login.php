<?php 

session_start();

if ( isset($_SESSION["login"]) ) {
	header("location: index.php");
	exit;
}

require 'function.php';

if ( isset($_POST["login"]) ) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");



	// cek username
	if ( mysqli_num_rows($result) === 1 ) {
		
		// cek pw
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;
			header("location: index.php");
			exit;
		}
	}


	$error = true;
}

?>
<!DOCTYPE html>
<html lang="id" dir="rtr">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous" />

    <!-- my css -->
    <link rel="stylesheet" href="style2.css" />


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
    </style>

	<title>Log In</title>
</head>



<body class="text-center">

<!-- form -->
	<?php if (isset($error) ) : ?>
		<p style="color: red; font-style: italic;" class="text-center">username dan pw salah cook</p>
	<?php endif; ?>

<section class="container-fluid">
  <section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-4">
		<form action="" method="post">	
					<img class="mb-4" src="img/Otaku.png" alt="umaru" width="80" height="80" />
					<h1 class="h3 mb-3 font-weight-normal text-center">Please sign in :D</h1>
					<label for="username" class="sr-only text-left"> </label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
					<label for="password" class="sr-only text-left"></label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Password" required /> <br>	
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button> <br><br>
					<a href="registrasi.php">Jika belum mendaftar klik disini!</a>
		</form>
	</section>
  </section>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>



</body>
</html>