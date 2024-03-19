<?php 	 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("location: login.php");
	exit;
}

require  'function.php';

// pagination
// konfig
$jumlahDataPerhalaman = 4;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");


// tombol cari diklik
if( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">

	<link rel="stylesheet" href="style.css" />
  <style>
    body{
      min-height: 100%;
      background-color: #f5f5f5;
    }
  </style>
	<title>Halaman Admin</title>
</head>
<body class="text-center">
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

<h1>Peminjaman Buku Perpustakaan UNSAP</h1>


<br>
<!-- navigasi -->

<?php if( $halamanAktif > 1) : ?>
	<a href="?halaman=<?= $halamanAktif - 1;  ?>">&laquo;</a>
<?php endif; ?>


<?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<a href="?halaman=<?= $i;  ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
	<?php else : ?>
		<a href="?halaman=<?= $i;  ?>"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>


<?php if( $halamanAktif < $jumlahHalaman ) : ?>
	<a href="?halaman=<?= $halamanAktif + 1;  ?>">&raquo;</a>
<?php endif; ?>

<!-- table -->
<div class="col-md-9 mx-auto">
        <div class="card mt-3">
            <div class="card-header bg-info text-light">Data Input Penyewaan Buku</div>
                <div class="card-body bg-rgb(202, 209, 208)"></div>
                  <div class="col-md-6 mx-auto">
                      <form method="post">
                          <div class="input-grup mb-2">
                              <input type="text" name="keyword" class="form-control" placeholder="Masukan kata kunci!" autocomplete="off">
                            <button class="btn btn-primary mx-auto" name="cari" type="submit">Cari</button>
                          </div>
                      </form>
                  </div>
                    <table class="table table-success table-striped">
                      <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Gambar</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Buku</th>
                      </tr>				
                      <?php $i = 1; ?>
                      <?php foreach( $mahasiswa as $row ) : ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td>
                          <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Edit</a>
                                          <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-danger" onclick="return confirm('Mou kimarimashita ka?');">Hapus</a>
                        </td>
                        <td><img src="pic/<?= $row["gambar"]; ?>" width="50"></td>
                        <td><?= $row["nim"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["jurusan"]; ?></td>
                        <td><?= $row["buku"]; ?></td>
                      </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
					          </table>
          <!-- akhir -->
				
        		<div class="card-footer bg-info"></div>
                     
                      </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>