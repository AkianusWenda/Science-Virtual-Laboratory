-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 31 Bulan Mei 2025 pada 23.29
-- Versi server: 10.11.10-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Struktur dan data semua tabel

-- Tabel `jawaban`
CREATE TABLE `jawaban` (
  `idjawaban` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idkuis` int(11) NOT NULL,
  `benar` varchar(255) NOT NULL,
  `salah` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `skor` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `sekolah` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `jawaban` (`idjawaban`, `idsiswa`, `idkuis`, `benar`, `salah`, `nilai`, `skor`, `waktu`, `nama`, `kelas`, `sekolah`) VALUES
(3, 0, 1, '0', '0', '0.00', '37', '2025-05-31 04:50:54', 'Abdillah Muhaimin', 'muhaiminpoetra03@gmail.com', '08543274729304'),
(4, 0, 1, '0', '0', '0.00', '34', '2025-05-31 04:56:09', 'Fauzan', 'Ojan@gmail.com', '08231687345878');

-- Tabel `jawabandetail`
CREATE TABLE `jawabandetail` (
  `idjawabandetail` int(11) NOT NULL,
  `idjawaban` int(11) NOT NULL,
  `idsoal` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `jawabandetail` (`idjawabandetail`, `idjawaban`, `idsoal`, `jawaban`) VALUES
(35, 3, '17', 'C'), (36, 3, '18', 'C'), (37, 3, '20', 'B'), (38, 3, '21', 'C'), (39, 3, '22', 'B'),
(40, 3, '23', 'A'), (41, 3, '24', 'C'), (42, 3, '25', 'B'), (43, 3, '26', 'C'), (44, 3, '27', 'B'),
(45, 3, '28', 'C'), (46, 3, '29', 'D'), (47, 3, '30', 'A'), (48, 3, '31', 'B'), (49, 3, '32', 'C'),
(50, 4, '17', 'A'), (51, 4, '18', 'A'), (52, 4, '20', 'A'), (53, 4, '21', 'C'), (54, 4, '22', 'D'),
(55, 4, '23', 'A'), (56, 4, '24', 'C'), (57, 4, '25', 'B'), (58, 4, '26', 'C'), (59, 4, '27', 'B'),
(60, 4, '28', 'C'), (61, 4, '29', 'D'), (62, 4, '30', 'A'), (63, 4, '31', 'B'), (64, 4, '32', 'C');

-- Tabel `kuis`
CREATE TABLE `kuis` (
  `idkuis` int(11) NOT NULL,
  `idkelompok` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `tanggal` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `kuis` (`idkuis`, `idkelompok`, `judul`, `isi`, `tanggal`, `status`) VALUES
(1, 0, 'Soal Uji Coba', '<p>Jawablah pertanyaan dibawah ini dengan memilih jawab yang tepat!</p>\r\n', '2025-03-12', 'Aktif');

-- Tabel `kuisnilai`
CREATE TABLE `kuisnilai` (
  `idkuisnilai` int(11) NOT NULL,
  `idkuis` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `nilaipilihanganda` text NOT NULL,
  `nilaiessay` text NOT NULL,
  `nilaipraktik` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabel `materi`
CREATE TABLE `materi` (
  `idmateri` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `foto` text NOT NULL,
  `file` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `materi` (`idmateri`, `judul`, `isi`, `foto`, `file`, `tanggal`) VALUES
(6, 'Siklus Air', '<div class=\"interacty_padding\" ...</iframe></div></div>', 'Lanskap.jpg', 'Home Page SVL.pdf', '2025-01-18'),
(7, 'Sifat Cahaya', '<div class=\"interacty_padding\" ...</iframe></div></div>', 'Screenshot 2025-05-30 125158.png', 'Home Page SVL.pdf', '2025-01-18'),
(9, 'Organ Tubuh Manusia', '<div class=\"sketchfab-embed-wrapper\"> ...</iframe></div>', 'Screenshot 2025-05-30 130817.png', '', '2025-01-18'),
(10, 'Sehatkan paru-parumu?', '<div class=\"interacty_padding\" ...</iframe></div></div>', 'Screenshot 2025-05-30 192127.png', '', '2025-01-18');

-- Tabel `pengguna`
CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `nowa` text NOT NULL,
  `username` text NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `nowa`, `username`, `level`) VALUES
(2, 'Administrator', 'admin@gmail.com', 'admin', '08941289821', '<p>Jl. Sudirman, Jakarta</p>\r\n', '08491289421', 'admin', 'Admin');

-- Tabel `soal`
CREATE TABLE `soal` (
  `idsoal` int(11) NOT NULL,
  `idkuis` int(11) NOT NULL,
  `soal` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `kunci` varchar(255) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `soal` (`idsoal`, `idkuis`, `soal`, `a`, `b`, `c`, `d`, `kunci`, `gambar`) VALUES
(17, 1, '<p>Kumpulan titik-titik air kecil ...</p>', 'Kabut', 'Embun', 'Awan', 'Salju', 'C', ''),
(18, 1, '<p>Proses perputaran air ...</p>', 'Daur Mineral', 'Siklus Batuan', 'SIklus Air', 'Daur Karbon', 'C', ''),
(20, 1, 'Tahapan awal dari siklus air ...</p>', 'Presipitasi', 'Evaporasi', 'Kondensasi', 'Infiltrasi', 'B', ''),
(21, 1, '<p>Jika suatu wilayah mengalami ...</p>', 'Kondensasi', 'Presipitasi', 'Transpirasi', 'Runoff', 'C', '');

-- Penutup
ALTER TABLE `jawaban` ADD PRIMARY KEY (`idjawaban`);
ALTER TABLE `jawabandetail` ADD PRIMARY KEY (`idjawabandetail`);
ALTER TABLE `kuis` ADD PRIMARY KEY (`idkuis`);
ALTER TABLE `kuisnilai` ADD PRIMARY KEY (`idkuisnilai`);
ALTER TABLE `materi` ADD PRIMARY KEY (`idmateri`);
ALTER TABLE `pengguna` ADD PRIMARY KEY (`id`);
ALTER TABLE `soal` ADD PRIMARY KEY (`idsoal`);

ALTER TABLE `jawaban` MODIFY `idjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `jawabandetail` MODIFY `idjawabandetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
ALTER TABLE `kuis` MODIFY `idkuis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `kuisnilai` MODIFY `idkuisnilai` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `materi` MODIFY `idmateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
ALTER TABLE `pengguna` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `soal` MODIFY `idsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

COMMIT;
