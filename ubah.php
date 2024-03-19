<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("location: login.php");
	exit;
}
require 'function.php';

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];



// cek apakah tombol submit ditekan atau belum
if( isset($_POST["submit"]) ) {
	// ambil data dari form 
	

	// query insert data 
	

	// cek data berhasul ditambahkan


	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
			</script>
		";

	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php';
			</script>
		";
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">

	 <!-- my css -->
	<link rel="stylesheet" href="style.css" />
	<title>Ubah Data Mahasiswa</title>
	<style>
    body{
      min-height: 100%;
      background-color: #f5f5f5;
    }
  </style>
</head>
<body>
 <!-- Navigasi Bar -->
 <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: rgb(1, 204, 240)">
      <div class="container">
        <a class="navbar-brand" href="index.php"
          >Unsap <br />
          Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tambah.php">Request</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Log out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir navbar -->

	<br>
	<h3 class="text-center">Ubah Data Diri</h3>
<br>
	<!-- form -->
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
        	<div class="card-header bg-info text-light">Form Input Penyewaan Barang</div>
                <div class="card-body">
                    <!-- form -->
					<form action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
					<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
							<div class="mb-3">
								<label for="nama" class="form-label">Nama</label>
								<input type="text" name="nama" class="form-control" id="nama" required value="<?= $mhs["nama"]; ?>">
							</div>
							<div class="mb-3">
								<label for="nim" class="form-label">NIM</label>
								<input type="text" name="nim" class="form-control" id="nim" required value="<?= $mhs["nim"]; ?>">
							</div>
							<div class="mb-3">
								<label for="email"class="form-label" >Email</label>
								<input type="text" name="email" class="form-control" id="email" value="<?= $mhs["email"]; ?>">
							</div>
							<div class="mb-3">
								<label for="jurusan"class="form-label" >Jurusan</label>
								<input type="text" name="jurusan" class="form-control" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
							</div>
							<div class="mb-3">
								<label for="buku"class="form-label" >Buku</label>
								<input type="text" name="buku" class="form-control" id="buku" value="<?= $mhs["buku"]; ?>">
							</div>
							<div class="mb-3">
								<label for="gambar"class="form-label" >Gambar</label>
								<input type="file" name="gambar" id="gambar" class="form-control">
							</div>
							<div class="mb-3 text-center">
								<button class="btn btn-primary" type="submit" name="submit">Submit</button>
							</div>
						
					</form>
						<!-- akhir -->
						</div>
        		<div class="card-footer bg-info"></div>

          	</div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>