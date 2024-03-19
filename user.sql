-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2022 pada 11.27
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$0wiKiaS4R0om8JT4FGRHuudBX/MoDanXYIqipWlR7N9Y8CnUzh8zC'),
(3, 'agung1', '$2y$10$cfih5PtJoO9RTZu/OxMNDODiuM6wVlBrByF8w8LHXpU3JlJB7jOfy'),
(4, 'user1', '$2y$10$k25wfL.m9mUvzSm/43VLe.bDBNmRS1JioIEqAfvZGqN.qOFK.rTdK'),
(5, 'user2', '$2y$10$TxzWBlJ7.j0h5chK35CJZuoe3v2ev6L.D5JArggipscgg6YK4UPTW'),
(6, 'user5', '$2y$10$H6YoRRHHLsBp9dh66D61kORw2eJlz8Ghk.FoNhDdDtaHnWYv5THN.'),
(7, 'bvi', '$2y$10$Wf12tG387CNTfGK5/awUke7KfFeoefh/DqlEv627dQ4CMUQ1IR.pC'),
(8, 'gabuddd', '$2y$10$bglxzW1X9czAnQvC2MfFk.RMhqOeOddaleLqDd1TlTs2EqnyL2hJa'),
(9, 'stress', '$2y$10$wmu3bplLR22MSe2t9XQIledg74EXdSWVJ32F795P65Z.jTRXQO.8C'),
(10, 'nangii-nangii', '$2y$10$B.lRLn9oocuB9Qic7zkDt.T3meISlNeNp0QPrrDwI49np573Au95.'),
(11, 'kyuuun', '$2y$10$Ym4YB17llFkulKOSelGkZunoN/KFyjWs42TTsPY2xi95c/enHdBHO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
