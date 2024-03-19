-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2022 pada 11.25
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nim` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `buku` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`, `buku`) VALUES
(1, 'Zaeni Mubarokah', 'A210927', 'Zaeni@gmail.com', 'Teknik Informatika', 'logo FTI.png', 'Metode Penelitian Sekolah'),
(3, 'Agung Karya Nugraha', 'A22000133', 'agungkn13@gmail.com', 'Teknik Informatika', 'agung.jpg', 'Novel: Harry Potter'),
(28, 'Carlan Nata', 'A1.100234', 'kutubuku@yahoo.com', 'PGSD', 'me.jpg', 'PHP untuk Pemula'),
(30, 'Karina Putri', 'A32201776', 'karina@gmail.com', 'DKV', '6293887acd2fe.jpg', 'Dasar-dasar Pemrograman'),
(31, 'Nahrulsyah', 'A3527638', 'nahrul@gmail.com', 'Pendidikan Matematika', '6293886206993.jpg', 'Kalkulus Lanjutan'),
(32, 'Ramdan Ginanjar', 'A35276388', 'ramdan@gmal.com', 'Pendidikan Fisika', '629386e561f68.jpg', 'Quantum Pshiycs'),
(34, 'Abygail', 'A1.100234', 'kutubuku123@yahoo.com', 'Akuntansi', 'IMG_20210617_102859.jpg', 'Pengantar Akuntansi'),
(35, 'Fajar Budiman', 'A1200298', 'agan@gmail.com', 'Sastra Jepang', '62937dfa01de6.jpg', 'Minna no Nihongo 2'),
(36, 'Asep Jatnika', 'A2.200123', 'asep@gmail.com', 'DKV', '629400b4f12df.jpg', 'Renaisancce Art'),
(37, 'Farid Fatah Alamsyah', 'A43456566', 'farid@gmail.com', 'DKV', '629cc193584ba.jpg', 'Dasar 3D Modeling dengan Blend');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
