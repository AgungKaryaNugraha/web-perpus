<?php  
require 'function.php';
// register
if ( isset($_POST["register"]) ) {
	
	if ( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru telah terdaftar, silahkan untuk masuk halaman log in >_<');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo mysqli_error($conn);
	}


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
	


<section class="container-fluid">
  <section class="row justify-content-center">
    <section class="col-12 col-sm-6 col-md-4">
		<form action="" method="post">	
					<img class="mb-4" src="img/Otaku.png" alt="umaru" width="80" height="80" />
					<h1 class="h3 mb-3 font-weight-normal text-center">Please sign up :D</h1>
					<label for="username" class="sr-only text-left"> </label>
					<input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
					<label for="password" class="sr-only text-left"></label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Password!">
					<label for="password2" class="sr-only text-left"></label>
					<input type="password" name="password2" id="password2" class="form-control"
					placeholder="Konfirmasi password" required /> <br>	
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Sign up</button>
					<br><br>
					<a href="login.php">Saya sudah mempunyai akun</a>

		</form>
	</section>
  </section>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	

</body>
</html>