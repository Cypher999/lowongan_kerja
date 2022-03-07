-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 02:36 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbloker`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--
CREATE DATABASE IF NOT EXISTS`dbloker`;
USE `dbloker`;
CREATE TABLE `berkas` (
  `id_berkas` varchar(6) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `tgl_berkas` datetime NOT NULL,
  `nm_topik` varchar(30) NOT NULL,
  `ket` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_user`, `tgl_berkas`, `nm_topik`, `ket`) VALUES
('CvapJU', 'USO02', '2021-01-08 02:46:28', 'adds', 'addsqwe'),
('hl5n7P', 'Cf80f', '2021-01-17 03:30:41', 'berkas contoh', 'ini cuma contoh gak usah serius amat napa'),
('Jm9RKr', 'USO02', '2021-01-17 02:40:29', 'tessssss', 'wqwerew'),
('OdDMtd', 'USO02', '2021-01-17 08:47:13', 'Cuma testing doang', 'the quick brown fox jumps over the lazy dog the quick brown fox jumps over the lazy dog the quick brown fox jumps over the lazy dog the quick brown fox jumps over the lazy dog the quick brown fox jumps over the lazy dog the quick brown fox jumps over the lazy dog');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `kd_bid` varchar(5) NOT NULL,
  `bidang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`kd_bid`, `bidang`) VALUES
('-', '--tidak ada--'),
('aghwe', 'tes_bidang'),
('bid01', 'Otomotif'),
('bid02', 'Kuliner'),
('bid03', 'Pariwisata'),
('bid04', 'Real Estate'),
('bid05', 'Finansial'),
('bid06', 'komputer'),
('bid07', 'Toko dan perdagangan'),
('bid08', 'Manufaktur');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` varchar(10) NOT NULL,
  `no_induk` varchar(20) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `nm_com` varchar(50) NOT NULL,
  `list_ben` varchar(255) NOT NULL,
  `kd_bid` varchar(5) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `profil` varchar(2000) NOT NULL,
  `prov` varchar(25) NOT NULL,
  `kab` varchar(25) NOT NULL,
  `kec` varchar(25) NOT NULL,
  `des` varchar(25) NOT NULL,
  `lok` varchar(125) NOT NULL,
  `alt_map` varchar(500) NOT NULL,
  `hari_kerja` varchar(25) NOT NULL,
  `jam_kerja` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `no_induk`, `id_user`, `nm_com`, `list_ben`, `kd_bid`, `skill`, `profil`, `prov`, `kab`, `kec`, `des`, `lok`, `alt_map`, `hari_kerja`, `jam_kerja`, `status`) VALUES
('cowbUcj1Ki', '', 'pbc7L', 'wert', 'adssadew', 'bid02', '112233', 'qwqqw', 'd', 'we', 'f', 'e', 'a', '2231213', 'sds', 'wwq', 1),
('ghrte637wj', '231092384ojofdoiwer3', 'USO03', 'Mustibisa Jaya Abad', 'Uang transport [NEW_NUM] Tunjangan kesehatan [NEW_NUM] Uang makan [NEW_NUM] Uang transport [NEW_NUM] lainnya', 'bid01', 'las,mesin, bengkel, reparasi', 'The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog [NEWLINE] The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog [NEWLINE] The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog, The quick brown fox jumps over the lazy dog', 'Jambi', 'Tebo', 'kec a', 'desa a', 'provinsi jambi kabupaten tebo kecamatan a desa a', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12472.776210958777!2d-89.83461357010256!3d38.59840357388368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x887608efb672ce45%3A0x473b5d14afe0968c!2s105%20Bow%20Dr%2C%20Lebanon%2C%20IL%2062254%2C%20Amerika%20Serikat!5e0!3m2!1sid!2sid!4v1609854398619!5m2!1sid!2sid', 'Senin - minggu', '00:00 - 23:00', 1),
('khrte637wj', '905864', 'SZmN2', 'Perusahaan sukamundur', 'ben1[NEW_NUM]\r\nben2[NEW_NUM]\r\nben3[NEW_NUM]\r\nben4[NEW_NUM]', 'bid06', 'satu,dua,tiga', 'lorem ipsum warablala', 'las vegas', 'triskelion', 'asgard', 'wakanda', 'desa wakanda kecamatan asgard kabupaten triskelion provinsi las vegas', 'http://12345', 'setiap hari', '00:00 - 23:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_tes`
--

CREATE TABLE `hasil_tes` (
  `id_jwb` varchar(6) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `id_soal` varchar(8) NOT NULL,
  `jawaban` varchar(1) DEFAULT NULL,
  `tgl_tes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_tes`
--

INSERT INTO `hasil_tes` (`id_jwb`, `id_user`, `id_soal`, `jawaban`, `tgl_tes`) VALUES
('2f13IV', 'Cf80f', '67kl9fSX', 'A', '2021-01-17 03:48:58'),
('A5v4yu', 'USO02', '2345BCDE', 'C', '2021-01-09 05:12:56'),
('bCdv0z', 'USO02', '5678efgh', 'A', '2021-01-09 05:12:56'),
('isF8Dx', 'Cf80f', '6789fSWE', 'C', '2021-01-17 03:48:58'),
('o0HsDk', 'USO02', '3456cdef', 'B', '2021-01-09 05:12:56'),
('oxF1IA', 'USO02', '6789fghi', 'B', '2021-01-09 05:12:56'),
('SQPVIC', 'Cf80f', 'dJ77eaYY', 'D', '2021-01-19 07:16:28'),
('W3f3dD', 'Cf80f', '67kl9fSW', 'D', '2021-01-17 03:48:58'),
('yF6Vxb', 'USO02', '1234abcd', 'D', '2021-01-09 05:12:56'),
('yHNkY6', 'Cf80f', 'Xo6Nh75w', 'B', '2021-01-19 07:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id_interview` varchar(6) NOT NULL,
  `id_lam` varchar(5) NOT NULL,
  `tgl_online` datetime NOT NULL,
  `tgl_offline` datetime NOT NULL,
  `link_zoom` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id_interview`, `id_lam`, `tgl_online`, `tgl_offline`, `link_zoom`) VALUES
('8QULAF', 'vwXCB', '2021-01-13 02:01:00', '2020-12-28 01:03:00', 'ahdshdihiqwrwer'),
('lCYYvo', '6RlOO', '2021-02-09 03:04:00', '2021-02-01 09:09:00', 'http://2121.com');

-- --------------------------------------------------------

--
-- Table structure for table `lamaran`
--

CREATE TABLE `lamaran` (
  `id_lam` varchar(5) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `id_loker` varchar(5) NOT NULL,
  `tgl_lam` datetime NOT NULL,
  `stat_lam` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamaran`
--

INSERT INTO `lamaran` (`id_lam`, `id_user`, `id_loker`, `tgl_lam`, `stat_lam`) VALUES
('2Qcj3', 'USO02', 'fg658', '2021-01-08 06:06:08', 'C'),
('A65WU', 'USO02', '7cD1E', '2021-01-20 04:11:54', 'X'),
('n6zEN', 'Cf80f', 'R2IWm', '2021-01-19 07:13:13', 'B'),
('pNmm0', 'USO02', 'R2IWm', '2021-01-19 02:51:46', 'C'),
('pyNwW', 'USO02', 'fg657', '2021-01-08 08:26:23', 'B'),
('vwXCB', 'Cf80f', 'fg658', '2021-01-17 03:38:18', 'B'),
('Yj5RX', 'yuNIb', 'fg657', '2021-02-25 01:12:31', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `low_ker`
--

CREATE TABLE `low_ker` (
  `id_loker` varchar(5) NOT NULL,
  `id_company` varchar(10) NOT NULL,
  `nm_job` varchar(50) NOT NULL,
  `prov` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `des` varchar(20) NOT NULL,
  `alt_map` varchar(500) NOT NULL,
  `sal_min` float DEFAULT NULL,
  `sal_max` float DEFAULT NULL,
  `tgl_submit` datetime NOT NULL,
  `exp` varchar(25) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `jam_ker` varchar(10) NOT NULL,
  `rinc_kul` varchar(2000) NOT NULL,
  `tg_jw` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `low_ker`
--

INSERT INTO `low_ker` (`id_loker`, `id_company`, `nm_job`, `prov`, `kab`, `kec`, `des`, `alt_map`, `sal_min`, `sal_max`, `tgl_submit`, `exp`, `tempat`, `jam_ker`, `rinc_kul`, `tg_jw`) VALUES
('7cD1E', 'khrte637wj', 'kerja', 'ss', 'ww', 'ee', 'rr', '1dswe', 1, 2, '2021-01-19 06:07:32', '4 bulan', 'qw', '12-12', 'satu[new_num]\r\nsatu[new_num]', 'dua[new_num]\r\ndua[new_num]\r\ndua[new_num]'),
('aN2Db', 'ghrte637wj', 'sda', 'www', 'eee', 'ere', '34', 'wrerew', 12, 13, '2021-01-20 04:17:57', '4 bulan', 'sfsdsd', '111', 'ss', 'dd'),
('fg657', 'ghrte637wj', 'IT Specialist', 'Jambi', 'Tebo', 'a', 'a', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12472.776210958777!2d-89.83461357010256!3d38.59840357388368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x887608efb672ce45%3A0x473b5d14afe0968c!2s105%20Bow%20Dr%2C%20Lebanon%2C%20IL%2062254%2C%20Amerika%20Serikat!5e0!3m2!1sid!2sid!4v1609854398619!5m2!1sid!2sid', 1200000, 5000000, '2021-01-06 00:00:00', '2 Tahun', 'Jalan 123 kayupatah desa aaaa kecamatan bbbb kabupaten tebo provinsi jambi', '00:0023:59', 'Minimal Lulusan D3 Ilmu manajemen informatika[new_num]Berpengalaman selama 6 bulan dibidang spesialis IT dan yang berhubungan[new_num]Berusia antara 18-30 tahun[new_num]Bersedia bekerja dengan sistem shift, meskipun hari libur[new_num]Bersedia ditempatkan di Lokasi (on site)\r\n', 'Memiliki keahlian dibidang IT security[new_num]Mampu menjaga sistem komputer agar tetap efisien[new_num]Mampu mencari bug dan kerentanan di sistem\r\n'),
('fg658', 'ghrte637wj', 'Penetration Tester', 'Jambi', 'Kerinci', 'Sitinjau Laut', 'Hiang karya', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12472.776210958777!2d-89.83461357010256!3d38.59840357388368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x887608efb672ce45%3A0x473b5d14afe0968c!2s105%20Bow%20Dr%2C%20Lebanon%2C%20IL%2062254%2C%20Amerika%20Serikat!5e0!3m2!1sid!2sid!4v1609854398619!5m2!1sid!2sid', 1200000, 5000000, '2021-01-06 00:00:00', '2 Tahun', 'Jalan 123 kayupatah desa aaaa kecamatan bbbb kabupaten tebo provinsi jambi', '00:0023:59', 'Minimal Lulusan D3 Ilmu manajemen informatika[new_num]Berpengalaman selama 6 bulan dibidang spesialis IT dan yang berhubungan[new_num]Berusia antara 18-30 tahun[new_num]Bersedia bekerja dengan sistem shift, meskipun hari libur[new_num]Bersedia ditempatkan di Lokasi (on site)\r\n', 'Memiliki keahlian dibidang IT security[new_num]Mampu menjaga sistem komputer agar tetap efisien[new_num]Mampu mencari bug dan kerentanan di sistem[new_num]Mampu melakukan maintenance[new_num]Sanggup bekerja dibawah tekanan\r\n'),
('R2IWm', 'ghrte637wj', 'fa', 'da', 'ea', 'rra', 'ta', 'rdfa', 12, 102, '2021-01-18 09:25:04', '22 bulan', 'sfds', '11d', 'a[new_num]\r\nb[new_num]\r\nc[new_num]\r\nc[new_num]\r\nd[new_num]', 'a[new_num]\r\nab[new_num]\r\nac[new_num]\r\nca[new_num]\r\nad[new_num]');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `ktp` varchar(20) NOT NULL,
  `id_user` varchar(5) NOT NULL,
  `alt_leng` varchar(255) NOT NULL,
  `prov` varchar(25) NOT NULL,
  `kab` varchar(25) NOT NULL,
  `kec` varchar(25) NOT NULL,
  `desa` varchar(25) NOT NULL,
  `exp` varchar(60) NOT NULL,
  `pend_ter` varchar(15) NOT NULL,
  `skill` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`ktp`, `id_user`, `alt_leng`, `prov`, `kab`, `kec`, `desa`, `exp`, `pend_ter`, `skill`) VALUES
('3453', 'Cf80f', 'asdsdasd', '12', 'ewwe', 'asas', 'qewqwe', '12[split]M[split]ddd', 'D3', ' dassdadssd'),
('4563', 'EJZ5k', '', '', '', '', '', '', '', ''),
('12321', 'GZHXy', '', '', '', '', '', '', '', ''),
('0812321', 'h4JJn', '', '', '', '', '', '', '', ''),
('12', 'tN4kw', '', '', '', '', '', '', '', ''),
('15010203', 'USO02', 'Desa a Kecamatan B Kabupaten C Provinsi D ', 'd', 'c', 'b', 'a', '4[split]B[split]P', 'D3', '       spam chat, deface website'),
('0899999', 'vZYdd', '', '', '', '', '', '', '', ''),
('77876', 'yuNIb', 'bnmbjhghj', 'ppppp', 'uuu', 'jhhjhj', 'bgf', '12[split]M[split]adsad', 'S2', ' bjgkgkh,kkk'),
('122', 'z9KsJ', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` varchar(8) NOT NULL,
  `id_loker` varchar(5) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `pil_a` varchar(100) NOT NULL,
  `pil_b` varchar(100) NOT NULL,
  `pil_c` varchar(100) NOT NULL,
  `pil_d` varchar(100) NOT NULL,
  `pil_ben` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `id_loker`, `soal`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `pil_ben`) VALUES
('1234abcd', 'fg657', 'Ini soal pertama', 'pilihan 1', 'pilihan 2', 'pilihan 3', 'pilihan 4', 'D'),
('2345BCDE', 'fg657', 'Ini soal kedua', 'Ini pilihan 1', 'Ini pilihan 2', 'Ini pilihan 3', 'Ini pilihan 4', 'C'),
('3456cdef', 'fg657', 'Ini soal ketiga', 'pilihan 1', 'pilihan 2', 'pilihan 3', 'pilihan 4', 'B'),
('5678efgh', 'fg657', 'Ini soal keempat', 'Ini pilihan 1', 'Ini pilihan 2', 'Ini pilihan 3', 'Ini pilihan 4', 'A'),
('6789fghi', 'fg657', 'Ini soal kelima', 'Ini pilihan 1', 'Ini pilihan 2', 'Ini pilihan 3', 'Ini pilihan 4', 'B'),
('6789fSWE', 'fg658', 'Ini soal pertama', 'Ini pilihan 1', 'Ini pilihan 2', 'Ini pilihan 3', 'Ini pilihan 4', 'B'),
('67kl9fSW', 'fg658', 'Ini soal kedua', 'Ini pilihan 1', 'Ini pilihan 2', 'Ini pilihan 3', 'Ini pilihan 4', 'C'),
('67kl9fSX', 'fg658', 'Ini soal ketiga', 'Ini pilihan 1', 'Ini pilihan 2', 'Ini pilihan 3', 'Ini pilihan 4', 'A'),
('dJ77eaYY', 'R2IWm', 'soal kedua', 'pilihan 1', 'pilihan 2', 'pilihan 3', 'ow', 'A'),
('Xo6Nh75w', 'R2IWm', 'soal pertama', 'pilihan 1', 'pilihan 2', 'pilihan 3', 'pilihan 4', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(5) NOT NULL,
  `nm_user` varchar(30) NOT NULL,
  `nm_lengkap` varchar(30) NOT NULL,
  `tipe_user` varchar(1) NOT NULL,
  `jekel` varchar(1) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `per_1` varchar(30) NOT NULL,
  `per_2` varchar(30) NOT NULL,
  `jaw_1` varchar(30) NOT NULL,
  `jaw_2` varchar(30) NOT NULL,
  `verified` int(1) NOT NULL,
  `kd_ver` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `nm_lengkap`, `tipe_user`, `jekel`, `no_hp`, `email`, `password`, `per_1`, `per_2`, `jaw_1`, `jaw_2`, `verified`, `kd_ver`) VALUES
('Cf80f', 'user_baru', 'user baru diedit', 'P', 'L', '087', '234r_0000@gmail.com', '202cb962ac59075b964b07152d234b70', '1ds', '2ass', '11weqewq', '22dsaf', 1, 'DmwBF11LOYsb0tyaetZH7ea9Pf9e0MKt9dU6GVkAJJSKWdPEND'),
('EJZ5k', 'gghg', 'df', 'P', 'L', '453', 'shandysanfisher@gmail.com', '202cb962ac59075b964b07152d234b70', 'fsdfsd', 'adsads', 'sddsf', 'fdssfdfds', 0, '11gzKxX04GefUGxEdKi9j6XjSqam0ygDM9VAKDEILPGlOdYb2g'),
('pbc7L', 'ddss', 'awes', 'C', 'L', '123', 'awe@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '2', '11', '222', 1, 'nPmp7Hv4WySIuVuqpPEBIlv3CFKJIDjDMOecoCRpCZKLXbCDPe'),
('QUOfc', 'fsd', 'sfd', 'C', 'L', '2323', 'archerykerinci@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'ads', 'dsa', 'dsa', 'das', 0, 'vMJTaRprrenODagTR4nRpN4HvnTpeDbvPUNoBYTNxYcGTn6etx'),
('SZmN2', 'qqq', 'Aladeen', 'C', 'L', '123', 'a34@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '2', '11', '22', 1, 'EkexYz8yeQScI2KfamZ0Libu9omnk50g1hVNSYZ1TVAefSwGbf'),
('USO01', 'ROOT', '', 'A', '*', '12321', 'a@gmail.com', '29305444dbc99ed4fe1e2418c5421983', 'Siapa pembuat program ini', 'Tipe PHP yang dipakai', 'Sandi m irvan', 'PHP 7.4', 1, 'HJKSDFDHKJSHDFIUHREWNJKN2L3N1L3N2N3LKN2LKN3L'),
('USO02', 'User Pelamar', 'Ahmad jaenab prikitiew', 'P', 'P', '0899999999', 'ddddd@gmail.com', 'ab56b4d92b40713acc5af89985d4b786', 'Ini pertanyaan 1', 'Ini pertanyaan 2', 'Ini jawaban 1', 'Ini jawaban 2', 1, 'HJKSDFDHKJSHDFIUHREWNJKN2L3N1L3N2N3LKN2LKN3L'),
('vZYdd', 'qqqweqwe', 'dsaweq', 'P', 'L', '08999', 'sandi.irvan.27.99@gmail.com', '202cb962ac59075b964b07152d234b70', '111', '222', '222', '333', 0, 'u9LOyl0Yr2iCbMbZWOK7zoVKO9bFKQxqCQLWDJ6TtDBB95bOxb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`kd_bid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`no_induk`);

--
-- Indexes for table `hasil_tes`
--
ALTER TABLE `hasil_tes`
  ADD PRIMARY KEY (`id_jwb`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id_interview`);

--
-- Indexes for table `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`id_lam`);

--
-- Indexes for table `low_ker`
--
ALTER TABLE `low_ker`
  ADD PRIMARY KEY (`id_loker`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
