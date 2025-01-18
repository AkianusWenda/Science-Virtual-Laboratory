-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 02:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dysmenorrheainsights`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

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
  `email` varchar(255) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`idjawaban`, `idsiswa`, `idkuis`, `benar`, `salah`, `nilai`, `skor`, `waktu`, `nama`, `email`, `nohp`) VALUES
(1, 0, 1, '0', '0', '0.00', '', '2024-12-21 16:01:31', 'Fitri', 'fitri@gmail.com', '08591029052'),
(3, 0, 1, '0', '0', '0.00', '', '2024-12-21 16:09:00', 'Fitri', 'fitri@gmail.com', '085901252'),
(4, 0, 1, '0', '0', '0.00', '34', '2024-12-23 15:07:03', 'Budiman', 'budiman@gmail.com', '080592152');

-- --------------------------------------------------------

--
-- Table structure for table `jawabandetail`
--

CREATE TABLE `jawabandetail` (
  `idjawabandetail` int(11) NOT NULL,
  `idjawaban` int(11) NOT NULL,
  `idsoal` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawabandetail`
--

INSERT INTO `jawabandetail` (`idjawabandetail`, `idjawaban`, `idsoal`, `jawaban`) VALUES
(1, 1, '1', 'A'),
(2, 1, '2', 'A'),
(3, 1, '3', 'A'),
(4, 1, '4', 'A'),
(5, 1, '5', 'A'),
(6, 1, '6', 'A'),
(7, 1, '7', 'A'),
(8, 1, '8', 'A'),
(9, 1, '9', 'A'),
(10, 1, '10', 'D'),
(21, 3, '1', 'C'),
(22, 3, '2', 'B'),
(23, 3, '3', 'D'),
(24, 3, '4', 'C'),
(25, 3, '5', 'C'),
(26, 3, '6', 'C'),
(27, 3, '7', 'C'),
(28, 3, '8', 'C'),
(29, 3, '9', 'C'),
(30, 3, '10', 'C'),
(31, 4, '1', 'C'),
(32, 4, '2', 'B'),
(33, 4, '3', 'C'),
(34, 4, '4', 'C'),
(35, 4, '5', 'C'),
(36, 4, '6', 'D'),
(37, 4, '7', 'D'),
(38, 4, '8', 'D'),
(39, 4, '9', 'D'),
(40, 4, '10', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
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
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`idkuis`, `idkelompok`, `judul`, `isi`, `tanggal`, `status`) VALUES
(1, 0, 'Kuis “Cara Melindungi Diri dari Kejahatan Seksual”', '<p>-</p>\r\n', '2024-12-12', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kuisnilai`
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

-- --------------------------------------------------------

--
-- Table structure for table `materi`
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
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`idmateri`, `judul`, `isi`, `foto`, `file`, `tanggal`) VALUES
(1, 'Pentingnya Menjaga Kesehatan Reproduksi Saat Mentruasi', '<p><a href=\"https://promkes.kemkes.go.id/phbs\"><strong>Kesehatan&nbsp;</strong></a>reproduksi adalah kondisi sehat secara psikis,sosial, dan fisik, yang berhubungan dengan fungsi, proses, dan sistem reproduksi, baik pada pria maupun wanita untuk bisa bertanggung jawab dalam memelihara dan&nbsp;<em>menjaga organ reproduksi.</em>&nbsp;Khususnya bagi yang mengalami masa menstruasi, tentu penting sekali menjaga kesehatan reproduksi saat menstruasi. Mengingat saat menstruasi, organ intim rentan sekali terpapar oleh bakteri.</p>\r\n\r\n<h3><strong>Apa Itu Menstruasi?</strong></h3>\r\n\r\n<p>Menstruasi adalah tanda pubertas yang terjadi pada wanita. Proses menstruasi merupakan proses peluruhan lapisan bagian dalam pada dinding rahim wanita (endometrium) yang mengandung banyak pembuluh darah dan umumnya berlangsung selama 5-7 hari setiap bulannya. Biasanya siklus menstruasi berlangsung hingga usia 50 tahun. Adapun masa pasca berhenti menstruasi dinamakan sebagai menopause.</p>\r\n\r\n<p>Pada beberapa wanita, ada yang merasakan nyeri haid atau kram, yang juga disebut sebagai&nbsp;<em>dismenore</em>.Untuk menekan rasa sakit, cukup dilakukan kompres hangat, olahraga teratur, dan istirahat yang cukup. Apabila nyeri haid yang dirasakan sampai mengganggu aktivitas sehari-hari, bisa diberikan obat anti peradangan yang bersifat non steroid atau berkonsultasi langsung dengan tenaga&nbsp;<a href=\"https://promkes.kemkes.go.id/promosi-kesehatan\"><em>kesehatan</em></a>.</p>\r\n\r\n<p>Saat menstruasi,&nbsp;<em>minumlah 1 tablet penambah darah (tablet Fe)</em>&nbsp;selama menstruasi setiap hari dan sekali seminggu ketika tidak menstruasi. Hal ini bertujuan untuk mencegah timbulnya anemia akibat kurangnya zat besi (Fe).</p>\r\n\r\n<p>Sementara itu, tingkat kalium yang rendah dalam tubuh dapat mengakibatkan siklus haid tidak teratur, timbulnya gangguan menstruasi yang sangat menyakitkan, baik menjelang siklus maupun selama siklus menstruasi. Oleh karena itu, dianjurkan untuk mengonsumsi sejumlah makanan yang tinggi kalium, seperti ubi jalar,pisang, salmon, kismis, kacang, dan yoghurt. Proses makanan yang dikukus atau dipanggang juga bisa menambah asupan kalium dalam tubuh.</p>\r\n\r\n<p>Selain itu,&nbsp;<strong>kebersihan organ intim</strong>&nbsp;saat menstruasi juga penting dilakukan dengan:</p>\r\n\r\n<ol>\r\n	<li>Mengganti pembalut sebanyak 3-5 kali dalam sehari.</li>\r\n	<li>Membersihkan organ intim terlebih dulu sebelum mengganti pembalut.</li>\r\n	<li>Cuci tangan sampai bersih usai membuang pembalut serta sebelum mengganti pembalut.</li>\r\n	<li>Rutin mengganti celana dalam untuk menghindari resiko tidak nyaman di area kewanitaan. Pastikan memakai celana dalam yang terbuat dari bahan yang menyerap keringat.</li>\r\n</ol>\r\n', 'b3188e381_menstruasi.jpg', 'Lorem_Ipsum.pdf', '2024-06-12'),
(4, 'Gangguan Menstruasi dan Cara Mengatasinya', '<p><strong>Jenis Gangguan Menstruasi:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Dismenore</strong>: Nyeri hebat di perut bagian bawah saat menstruasi.</li>\r\n	<li><strong>Amenorea</strong>: Tidak mengalami menstruasi sama sekali.\r\n	<ul>\r\n		<li>Amenorea primer: Belum menstruasi hingga usia 16 tahun.</li>\r\n		<li>Amenorea sekunder: Menstruasi terhenti selama 3 bulan atau lebih pada wanita yang sebelumnya haid.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Menoragia</strong>: Pendarahan menstruasi yang sangat banyak dan berkepanjangan.</li>\r\n	<li><strong>Oligomenorea</strong>: Siklus menstruasi yang sangat jarang (lebih dari 35 hari sekali).</li>\r\n	<li><strong>PMS (Pre-Menstrual Syndrome)</strong>: Perubahan fisik dan emosional sebelum menstruasi, seperti mudah marah, lelah, atau sakit kepala.</li>\r\n</ol>\r\n\r\n<p><strong>Cara Mengatasi Gangguan Menstruasi:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Untuk Dismenore</strong>:\r\n\r\n	<ul>\r\n		<li>Kompres hangat di perut bagian bawah.</li>\r\n		<li>Minum obat pereda nyeri seperti ibuprofen (sesuai anjuran dokter).</li>\r\n		<li>Lakukan olahraga ringan, seperti yoga.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Untuk PMS</strong>:\r\n	<ul>\r\n		<li>Kurangi konsumsi kafein dan makanan asin.</li>\r\n		<li>Tidur yang cukup dan kelola stres.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Untuk Menoragia</strong>:\r\n	<ul>\r\n		<li>Konsultasikan ke dokter, terutama jika pendarahan sangat banyak hingga menyebabkan anemia.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Amenorea</strong>:\r\n	<ul>\r\n		<li>Segera periksa ke dokter jika belum haid di usia 16 tahun atau haid tiba-tiba berhenti.</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<p><strong>Kapan Harus ke Dokter?</strong></p>\r\n\r\n<ul>\r\n	<li>Nyeri menstruasi sangat hebat hingga mengganggu aktivitas.</li>\r\n	<li>Siklus menstruasi tidak teratur dalam waktu lama.</li>\r\n	<li>Pendarahan berlangsung lebih dari 7 hari atau sangat banyak.</li>\r\n	<li>Belum haid di usia 16 tahun.</li>\r\n</ul>\r\n', 'mengenali-darah-haid-dan-penyakit-yang-menyertainya-0-alodokter (1).jpg', 'Lorem_Ipsum.pdf', '2024-12-20'),
(5, 'Mitos dan Fakta tentang Menstruasi', '<p>Menstruasi sering kali dikelilingi oleh berbagai mitos yang belum tentu benar. Edukasi yang tepat penting untuk menghilangkan kesalahpahaman dan membantu perempuan memahami tubuh mereka dengan lebih baik. Berikut adalah beberapa mitos umum tentang menstruasi dan fakta ilmiah yang meluruskannya.</p>\r\n\r\n<p><strong>Mitos dan Faktanya:</strong></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Mitos: Tidak Boleh Berolahraga saat Menstruasi.</strong><br />\r\n	<strong>Fakta:</strong> Berolahraga ringan seperti berjalan kaki, yoga, atau stretching justru dapat membantu meredakan nyeri haid (dismenore) dan memperbaiki suasana hati. Namun, hindari aktivitas yang terlalu berat jika tubuh merasa lelah.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Mitos: Menstruasi Adalah Proses Pembuangan Darah Kotor.</strong><br />\r\n	<strong>Fakta:</strong> Darah menstruasi bukanlah darah kotor. Darah tersebut adalah peluruhan lapisan dinding rahim yang tidak dibutuhkan karena tidak ada pembuahan. Ini adalah proses alami tubuh dan merupakan tanda sistem reproduksi yang sehat.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Mitos: Tidak Boleh Mandi atau Keramas saat Menstruasi.</strong><br />\r\n	<strong>Fakta:</strong> Mandi atau keramas saat menstruasi sangat dianjurkan untuk menjaga kebersihan tubuh dan mencegah infeksi. Gunakan air hangat jika ingin merasa lebih nyaman.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Mitos: Tidak Boleh Minum Air Dingin saat Menstruasi.</strong><br />\r\n	<strong>Fakta:</strong> Minum air dingin tidak berpengaruh terhadap menstruasi. Faktanya, tubuh membutuhkan cairan yang cukup selama menstruasi untuk mencegah dehidrasi.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Mitos: Perempuan Tidak Subur saat Menstruasi.</strong><br />\r\n	<strong>Fakta:</strong> Meski jarang, kehamilan tetap dapat terjadi jika hubungan seksual dilakukan selama menstruasi, terutama pada perempuan dengan siklus yang tidak teratur. Sperma dapat bertahan hingga 5 hari di dalam tubuh.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Mitos: Tidak Boleh Menggunakan Pembalut Lebih dari 8 Jam.</strong><br />\r\n	<strong>Fakta:</strong> Ini bukan mitos, melainkan saran yang benar. Pembalut harus diganti setiap 4-6 jam untuk mencegah infeksi dan bau tidak sedap. Jika aliran darah banyak, ganti lebih sering.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Mitos: Nyeri Haid Berarti Tidak Subur.</strong><br />\r\n	<strong>Fakta:</strong> Nyeri haid tidak berkaitan dengan kesuburan. Namun, jika nyeri sangat hebat hingga mengganggu aktivitas, bisa menjadi tanda kondisi seperti endometriosis, dan perlu konsultasi dengan dokter.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p><strong>Kesimpulan:</strong> Menstruasi adalah proses alami yang tidak perlu ditakuti atau dianggap tabu. Dengan memahami fakta, perempuan dapat menjaga kesehatan reproduksi mereka dengan lebih baik. Mari kita hilangkan mitos dan menyebarkan edukasi yang benar!</p>\r\n', 'darah-menstruasi-sedikit-mungkin-ini-penyebabnya-0-alodokter.jpg', 'Lorem_Ipsum.pdf', '2024-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
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
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `nowa`, `username`, `level`) VALUES
(2, 'Administrator', 'admin@gmail.com', 'admin', '08941289821', '<p>Jl. Sudirman, Jakarta</p>\r\n', '08491289421', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

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

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`idsoal`, `idkuis`, `soal`, `a`, `b`, `c`, `d`, `kunci`, `gambar`) VALUES
(1, 1, '<p>Seberapa sering Anda merasakan nyeri selama menstruasi?</p>\r\n', 'Tidak pernah', 'Kadang-kadang', 'Sering', 'Selalu', 'D', ''),
(2, 1, '<p>Berapa lama nyeri berlangsung saat menstruasi?</p>\r\n', 'Kurang dari 1 jam', '1-3 jam', '3-6 jam', 'Lebih dari 6 jam', 'C', ''),
(3, 1, '<p>Seberapa intens nyeri yang Anda rasakan saat menstruasi?</p>\r\n', 'Tidak terasa nyeri', 'Nyeri ringan', 'Nyeri sedang', 'Nyeri berat', 'D', ''),
(4, 1, '<p>Apakah nyeri saat menstruasi mengganggu aktivitas harian Anda (seperti bekerja atau belajar)?</p>\r\n', 'Tidak mengganggu', 'Sedikit mengganggu', 'Cukup mengganggu', 'Sangat mengganggu', 'C', ''),
(5, 1, '<p>Apakah Anda membutuhkan obat penghilang nyeri selama menstruasi?</p>\r\n', 'Tidak pernah', 'Kadang-kadang', 'Sering', 'Selalu', 'A', ''),
(6, 1, '<p>Apakah Anda pernah mengalami mual atau muntah selama menstruasi?</p>\r\n', 'Tidak pernah', 'Sering', 'Kadang-kadang', 'Selalu', 'B', ''),
(7, 1, '<p>Seberapa sering Anda merasa lelah berlebihan selama menstruasi?</p>\r\n', 'Tidak pernah', 'Sering', 'Kadang-kadang', 'Selalu', 'B', ''),
(8, 1, '<p>Apakah Anda mengalami sakit punggung atau nyeri pinggul selama menstruasi?</p>\r\n', 'Tidak pernah', 'Kadang-kadang', 'Sering', 'Selalu', 'B', ''),
(9, 1, '<p>Seberapa sering Anda merasa suasana hati berubah drastis (emosional) selama menstruasi?</p>\r\n', 'Tidak pernah', 'Kadang-kadang', 'Sering', 'Selalu', 'D', ''),
(10, 1, '<p>Seberapa sering Anda harus beristirahat total (tidak beraktivitas) karena nyeri menstruasi?</p>\r\n', 'Tidak pernah', 'Kadang-kadang', 'Sering', 'Selalu', 'C', '');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `idvideo` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `file` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`idvideo`, `judul`, `isi`, `file`, `tanggal`) VALUES
(1, 'Video Edukasi Tentang Menstruasi', '<p>-</p>\r\n', 'video1.mp4', '2024-12-06'),
(2, 'Penjelasan Nyeri Saat Menstruasi', '<p><strong>Nyeri saat menstruasi</strong> atau dismenore adalah rasa sakit yang terjadi di perut bagian bawah selama periode menstruasi. Nyeri ini biasanya muncul sebelum atau selama menstruasi dan dapat berupa kram ringan hingga nyeri hebat yang menjalar ke punggung bawah atau paha. Dismenore sering disebabkan oleh kontraksi rahim untuk meluruhkan lapisan dinding rahim. Nyeri ini normal, tetapi jika sangat parah atau disertai gejala lain, seperti mual, muntah, atau pingsan, sebaiknya konsultasikan ke dokter untuk memastikan tidak ada kondisi medis yang mendasari, seperti endometriosis atau fibroid rahim.</p>\r\n', 'Nyeri saat Mens_ Kok bisa_ ini penjelasannya.mp4', '2024-12-20'),
(3, 'Siklus dan Fase Menstruasi', '<p>Siklus menstruasi adalah rangkaian perubahan alami yang terjadi dalam tubuh perempuan setiap bulan untuk mempersiapkan kehamilan. Siklus ini dihitung dari hari pertama menstruasi hingga hari pertama menstruasi berikutnya, dengan rata-rata berlangsung 28 hari, tetapi normal jika berkisar antara 21-35 hari.</p>\r\n', 'SIKLUS DAN FASE MENSTRUASI.mp4', '2024-12-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`idjawaban`);

--
-- Indexes for table `jawabandetail`
--
ALTER TABLE `jawabandetail`
  ADD PRIMARY KEY (`idjawabandetail`);

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`idkuis`);

--
-- Indexes for table `kuisnilai`
--
ALTER TABLE `kuisnilai`
  ADD PRIMARY KEY (`idkuisnilai`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`idmateri`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`idsoal`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`idvideo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `idjawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jawabandetail`
--
ALTER TABLE `jawabandetail`
  MODIFY `idjawabandetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `idkuis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kuisnilai`
--
ALTER TABLE `kuisnilai`
  MODIFY `idkuisnilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `idmateri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `idsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `idvideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
