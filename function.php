<?php  

// koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar1");



function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}



function tambah($data) {
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$buku = htmlspecialchars($data["buku"]);

	// up gmbr
	$gambar = upload();
	if( !$gambar ) {
		return false;
	}




	$query = "INSERT INTO mahasiswa
				VALUES 
				('', '$nama', '$nim', '$email', '$jurusan', '$gambar', '$buku')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {
	
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek jktdk ada gmbe
	if( $error === 4) {
		echo "<script>
				alert('Shashin wo tsuika shinasai yo, AHO!!!');
			</script>";
		return false;
	}




	// cek apkh yd di up adlh gmbr
	$ektensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ektensiGambarValid) ) {
		echo "<script>
				alert('toukou suru no ga shashin janai!');
			</script>";
		return false;
	}

	// cek jika ukuran terlalu besar 
	if( $ukuranFile > 1000000) {
		echo "<script>
				alert('saizu ooki sugi~');
			</script>";
		return false;
	}





	// lolos gmbr sesuai kriteria
	// generate nama baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;
	
	move_uploaded_file($tmpName, 'pic/' . $namaFileBaru);

	return $namaFileBaru;









}



function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}





function ubah($data) {
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$email = htmlspecialchars($data["email"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$buku = htmlspecialchars($data["buku"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	

	// cek apkh user pick new file
	if ( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	



	$query = "UPDATE mahasiswa SET 
				nama ='$nama',
				nim = '$nim',
				email = '$email',
				jurusan = '$jurusan',
				buku = '$buku',
				gambar = '$gambar'
			WHERE id = $id
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}



function cari($keyword) {
	$query = "SELECT * FROM mahasiswa
				WHERE
				nama LIKE '%$keyword%' OR 
				nim LIKE '%$keyword%' OR
				buku LIKE '%$buku' OR
				jurusan LIKE '%$keyword%'   
			";
	return query($query);		
}


function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);




	// cek username ada atau blm
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sama dgn org lain;O');
			</script>";
		return false;
	}



	// cek konfirmasi pw
	if ( $password !== $password2 ) {
		echo "<script>
				alert('pw td cuco;D');
			</script>";
		return false;
	}


	// enskripsi pw
	$password = password_hash($password, PASSWORD_DEFAULT);
	// tambah ke DB
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");


	return mysqli_affected_rows($conn);

	// tambah user baru ke DB


}


?>