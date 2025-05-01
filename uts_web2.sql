-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Bulan Mei 2025 pada 06.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_web2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`) VALUES
(1, 'Teknik Informatika'),
(3, 'Akutansi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `jurusan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `jurusan_id`) VALUES
(1, 'Riyan Nur Hidayat', '32231009', 1),
(5, 'Dhimas Rahmat', '32231006', 1),
(8, 'Alfa', '32231001', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(11) NOT NULL,
  `nama_mk` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama_mk`, `sks`) VALUES
(1, 'Sistem Terdistribusi', 3),
(3, 'jaringan', 5),
(5, 'TRPL', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `mata_kuliah_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `mahasiswa_id`, `mata_kuliah_id`, `nilai`) VALUES
(1, 1, 1, 90),
(3, 5, 3, 90);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `mata_kuliah_id` (`mata_kuliah_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
