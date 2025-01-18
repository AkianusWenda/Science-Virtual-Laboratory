-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2024 pada 11.40
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emomart`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `idjawaban` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idkuis` int(11) NOT NULL,
  `benar` varchar(255) NOT NULL,
  `salah` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`idjawaban`, `idsiswa`, `idkuis`, `benar`, `salah`, `nilai`, `waktu`) VALUES
(4, 1, 3, '1', '0', '100.00', '2024-06-15 21:32:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabandetail`
--

CREATE TABLE `jawabandetail` (
  `idjawabandetail` int(11) NOT NULL,
  `idjawaban` int(11) NOT NULL,
  `idsoal` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawabandetail`
--

INSERT INTO `jawabandetail` (`idjawabandetail`, `idjawaban`, `idsoal`, `jawaban`) VALUES
(4, 4, '7', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabanessay`
--

CREATE TABLE `jawabanessay` (
  `idjawabanessay` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idkuis` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawabanessay`
--

INSERT INTO `jawabanessay` (`idjawabanessay`, `idsiswa`, `idkuis`, `waktu`) VALUES
(3, 1, 3, '2024-06-15 21:32:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabanessaydetail`
--

CREATE TABLE `jawabanessaydetail` (
  `idjawabanessaydetail` int(11) NOT NULL,
  `idjawabanessay` int(11) NOT NULL,
  `idsoalessay` int(11) NOT NULL,
  `jawabanessay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawabanessaydetail`
--

INSERT INTO `jawabanessaydetail` (`idjawabanessaydetail`, `idjawabanessay`, `idsoalessay`, `jawabanessay`) VALUES
(5, 3, 2, 'asd'),
(6, 3, 3, '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabanpraktik`
--

CREATE TABLE `jawabanpraktik` (
  `idjawabanpraktik` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `idkuis` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jawabanpraktik`
--

INSERT INTO `jawabanpraktik` (`idjawabanpraktik`, `idsiswa`, `idkuis`, `deskripsi`, `file`, `waktu`) VALUES
(2, 1, 3, '<p>asd123</p>\r\n', 'pdf-test-1.pdf', '2024-06-15 21:32:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `idkelompok` int(11) NOT NULL,
  `kelompok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`idkelompok`, `kelompok`) VALUES
(1, 'Kelompok 1'),
(2, 'Kelompok 2'),
(3, 'Kelompok 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuis`
--

CREATE TABLE `kuis` (
  `idkuis` int(11) NOT NULL,
  `idkelompok` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `tanggal` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuis`
--

INSERT INTO `kuis` (`idkuis`, `idkelompok`, `judul`, `isi`, `tanggal`, `status`) VALUES
(1, 16, 'Evaluasi Minggu Pertama Pengenalan Pemograman Dasar', '<p>Jawablah soal pilihan ganda ini dengan benar.</p>\r\n', '2022-10-30', 'Aktif'),
(2, 1, 'Tugas Tulisan Bahasa', '<p>Sambel</p>\r\n', '2022-11-05', 'Aktif'),
(3, 1, 'Evaluasi Bab 3 Bahasa Indonesia', '<p>-</p>\r\n', '2024-06-16', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuisnilai`
--

CREATE TABLE `kuisnilai` (
  `idkuisnilai` int(11) NOT NULL,
  `idkuis` int(11) NOT NULL,
  `idsiswa` int(11) NOT NULL,
  `nilaipilihanganda` text NOT NULL,
  `nilaiessay` text NOT NULL,
  `nilaipraktik` text NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuisnilai`
--

INSERT INTO `kuisnilai` (`idkuisnilai`, `idkuis`, `idsiswa`, `nilaipilihanganda`, `nilaiessay`, `nilaipraktik`, `waktu`) VALUES
(2, 3, 0, '100', '90', '90', '2024-06-27 14:31:02'),
(3, 3, 1, '100', '91', '90', '2024-06-27 14:36:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `idmateri` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `foto` text NOT NULL,
  `file` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`idmateri`, `judul`, `isi`, `foto`, `file`, `tanggal`) VALUES
(2, 'Pembahasan Bahasa Bab 3', '<p>Program adalah pernyataan yang disusun menjadi satu kesatuan prosedur yang berupa urutan langkah yang disusun secara logis dan sistematis untuk menyelesaikan masalah.</p>\r\n\r\n<p>Menurut P. Insap Santosa, program adalah kumpulan instruksi atau perintah yang disusun sedemikian rupa sehingga mempunyai urutan nalar yang tepat untuk menyelesaikan suatu persoalan. Instruksi (statement) yang dimaksud adalah syntax (cara penulisan) sesuai dengan bahasa pemrograman yang digunakan yang mempunyai komponen-komponen : input, Output, Proses, Percabangan dan Perulangan.</p>\r\n', 'person_image_20200727072638.png', 'Dasar-Pemrograman-Modul-1-Pengenalan-Pemrograman.pdf', '2022-10-29'),
(3, 'Materi Pengenalan Bahasa Indonesia', '<p>tes</p>\r\n', 'Wheel-Loader-Komatsu-WA200_8_photo.png', 'Fashion-Transparent-Cat-Eye-Glasses-Frame-Women-Black-Eyeglasses-Frame-Vintage-Clear-Lens-Glasses-Nerd-Optical.jpg_Q90.jpg_.webp', '2022-11-05'),
(5, 'Materi Fisika', '<p>-</p>\r\n', 'bola.jpg', '96600-47139-4449-13215-1-pb-(1).pdf', '2024-06-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

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

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `nowa`, `username`, `level`) VALUES
(2, 'Administrator', 'admin@gmail.com', 'admin', '08941289821', '<p>Jl. Sudirman, Jakarta</p>\r\n', '08491289421', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(11) NOT NULL,
  `idkelompok` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nis` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `jeniskelamin` text NOT NULL,
  `tempatlahir` text NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `level` text NOT NULL,
  `materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `idkelompok`, `nama`, `nis`, `password`, `jeniskelamin`, `tempatlahir`, `tanggallahir`, `alamat`, `foto`, `level`, `materi`) VALUES
(1, 1, 'Sugeng', '123', '123', 'Laki - Laki', 'Palembang', '2000-07-07', 'Jl. Palembang', 'user.jpg', 'Siswa', ''),
(2, 1, 'Alex', '000', 'alex', 'Laki - Laki', 'Palembang', '2000-07-07', 'Jl. Palembang', 'user.jpg', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `idsoal` int(11) NOT NULL,
  `idkuis` int(11) NOT NULL,
  `soal` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `kunci` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`idsoal`, `idkuis`, `soal`, `a`, `b`, `c`, `d`, `kunci`) VALUES
(1, 1, '<p>Sebuah teknik komunikasi standar untuk mengekspresikan instruksi kepada komputer disebut..</p>\r\n', 'a', 'b', 'c', 'd', 'B'),
(2, 1, '<p>Fungsi dari pseucode adalah..</p>\r\n', 'Mudah-mudahan', 'Sulit dipahami', 'Komplikasi', 'Mudah dipahami', 'D'),
(3, 1, '<p>Contoh dari bilangan Integer adalah..</p>\r\n', '1', '-22', '0', 'Benar semua', 'D'),
(6, 2, '<p>Apakah anda suka makan bakwan</p>\r\n', 'Sangat Suka', 'Suka', 'Biasa Saja', 'Tidak Suka', 'A'),
(7, 3, '<p>Apakah bahasa jawa termasuk bahasa indonesia</p>\r\n', 'Ya', 'Tidak', 'Bukan', 'Salah', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soalessay`
--

CREATE TABLE `soalessay` (
  `idsoalessay` int(11) NOT NULL,
  `idkuis` int(11) NOT NULL,
  `soalessay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `soalessay`
--

INSERT INTO `soalessay` (`idsoalessay`, `idkuis`, `soalessay`) VALUES
(2, 3, '<p>Sebutkan hal-hal yang dipersiapkan dalam menyusun proposal!</p>\r\n'),
(3, 3, '<p>Sebutkan hal-hal yang dipersiapkan dalam pidato!</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `idvideo` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `file` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`idvideo`, `judul`, `isi`, `file`, `tanggal`) VALUES
(1, 'Pengenalan Bahasa Indonesia Bab 2', '<p>Berikut kode - kode keren CMD :</p>\r\n\r\n<p>1. color view (color a)<br />\r\n2. net<br />\r\n3. netsh<br />\r\n4. ping<br />\r\n5. tracert<br />\r\n6. nslookup<br />\r\n7. telnet<br />\r\n8. route<br />\r\n9. netsat<br />\r\n10. attrib<br />\r\n11. dir<br />\r\n12. ipconfig</p>\r\n', 'videoplayback.mp4', '2022-10-30'),
(2, 'Belajar Biologi', '<p>-</p>\r\n', 'bandicam 2024-06-03 12-00-47-100.mp4', '2024-06-03'),
(3, 'ASD', '<p>tes</p>\r\n', '27 Bulan Mei Versi Arab.mp4', '2024-06-16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`idjawaban`);

--
-- Indeks untuk tabel `jawabandetail`
--
ALTER TABLE `jawabandetail`
  ADD PRIMARY KEY (`idjawabandetail`);

--
-- Indeks untuk tabel `jawabanessay`
--
ALTER TABLE `jawabanessay`
  ADD PRIMARY KEY (`idjawabanessay`);

--
-- Indeks untuk tabel `jawabanessaydetail`
--
ALTER TABLE `jawabanessaydetail`
  ADD PRIMARY KEY (`idjawabanessaydetail`);

--
-- Indeks untuk tabel `jawabanpraktik`
--
ALTER TABLE `jawabanpraktik`
  ADD PRIMARY KEY (`idjawabanpraktik`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`idkelompok`);

--
-- Indeks untuk tabel `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`idkuis`);

--
-- Indeks untuk tabel `kuisnilai`
--
ALTER TABLE `kuisnilai`
  ADD PRIMARY KEY (`idkuisnilai`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`idmateri`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`idsoal`);

--
-- Indeks untuk tabel `soalessay`
--
ALTER TABLE `soalessay`
  ADD PRIMARY KEY (`idsoalessay`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`idvideo`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `idjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jawabandetail`
--
ALTER TABLE `jawabandetail`
  MODIFY `idjawabandetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jawabanessay`
--
ALTER TABLE `jawabanessay`
  MODIFY `idjawabanessay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jawabanessaydetail`
--
ALTER TABLE `jawabanessaydetail`
  MODIFY `idjawabanessaydetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jawabanpraktik`
--
ALTER TABLE `jawabanpraktik`
  MODIFY `idjawabanpraktik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `idkelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kuis`
--
ALTER TABLE `kuis`
  MODIFY `idkuis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kuisnilai`
--
ALTER TABLE `kuisnilai`
  MODIFY `idkuisnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `idmateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `idsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `soalessay`
--
ALTER TABLE `soalessay`
  MODIFY `idsoalessay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `idvideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
