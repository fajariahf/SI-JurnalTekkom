-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 10:51 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jurnaltekkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_jurnal` varchar(255) NOT NULL,
  `nama_jurnal` varchar(128) NOT NULL,
  `ISSN` varchar(30) NOT NULL,
  `volume` varchar(5) NOT NULL,
  `nomor` int(3) NOT NULL,
  `bulan` varchar(9) NOT NULL,
  `tahun` int(5) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `DOI` varchar(255) NOT NULL,
  `alamat_web_jurnal` varchar(255) NOT NULL,
  `alamat_web_artikel` varchar(255) NOT NULL,
  `terindeks_di` varchar(255) NOT NULL,
  `file_jurnal` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_nilai`, `id_user`, `judul_jurnal`, `nama_jurnal`, `ISSN`, `volume`, `nomor`, `bulan`, `tahun`, `penerbit`, `DOI`, `alamat_web_jurnal`, `alamat_web_artikel`, `terindeks_di`, `file_jurnal`, `date_created`) VALUES
(21, 1, 14, 'The spatio-temporal trends of urban growth and surface urban heat islandsover two decades in the Semarang Metropolitan Region', 'Sustainable Cities and Society', '2210-6707', 'Volum', 101432, 'Februari', 2019, 'ELSEVIER', 'https://doi.org/10.1016/j.scs.2019.101432 ', 'https://www.journals.elsevier.com/sustainable-cities-and-society', 'https://www.sciencedirect.com/science/article/pii/S2210670718313969?via=ihub', 'Scopus/Scimagojr/SJR=1,1 (2019) Impact Factor Clarivate Analytics (WoS): 4,6 (2019) dan Q1.', 'lee2009.pdf', 1581268938),
(34, 0, 148, '1', '1', '1', '1', 1, 'September', 1, '1', '1', '1', '1', '12', 'BAB_I_rev_1.pdf', 1581590098),
(35, 0, 4, '1234', '1234', '1234', '1234', 1234, 'Desember', 1234, '1234', '1234', '1234', '1234', '1234', 'BAB_I_rev_1.pdf', 1582021225),
(36, 0, 4, 'a', 'a', 'a', 'a', 0, 'Maret', 0, 'a', 'a', 'a', 'a', 'a', 'BAB I rev 1.pdf', 1582907904),
(37, 0, 4, 'bbbbbbb', 'b', 'b', 'b', 0, 'April', 0, 'b', 'b', 'b', 'b', 'b', 'BAB_II_rev_1.pdf', 1582982734);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_jurnal`
--

CREATE TABLE `nilai_jurnal` (
  `id_nilai` int(11) NOT NULL,
  `id_jurnal` int(11) NOT NULL,
  `id_reviewer` int(11) NOT NULL,
  `stat_reviewer` varchar(3) NOT NULL,
  `kelengkapan_isi` int(3) NOT NULL,
  `ruanglingkup` int(3) NOT NULL,
  `kecukupan` int(3) NOT NULL,
  `kelengkapan_unsur` int(3) NOT NULL,
  `file_penilaian` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_jurnal`
--

INSERT INTO `nilai_jurnal` (`id_nilai`, `id_jurnal`, `id_reviewer`, `stat_reviewer`, `kelengkapan_isi`, `ruanglingkup`, `kecukupan`, `kelengkapan_unsur`, `file_penilaian`, `date_created`) VALUES
(1, 21, 3, 'R1', 4, 10, 12, 12, '', 1581155496),
(2, 21, 145, 'R2', 4, 9, 10, 12, '', 1581248938),
(6, 34, 3, 'R1', 4, 9, 10, 12, '', 1582636799),
(7, 34, 3, 'R2', 1, 9, 12, 12, '', 1582642385),
(9, 36, 3, 'R1', 4, 4, 4, 4, '', 1582968353),
(10, 36, 3, 'R2', 8, 8, 8, 8, '', 1582968432);

-- --------------------------------------------------------

--
-- Table structure for table `penulis_jurnal`
--

CREATE TABLE `penulis_jurnal` (
  `id_pj` int(11) NOT NULL,
  `id_jurnal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(3) DEFAULT NULL,
  `kredit_penulis` decimal(39,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis_jurnal`
--

INSERT INTO `penulis_jurnal` (`id_pj`, `id_jurnal`, `id_user`, `status`, `kredit_penulis`) VALUES
(20, 34, 148, 'P2', '13.8000'),
(22, 21, 4, 'P1', '21.9000'),
(23, 34, 4, 'P1', '20.7000'),
(24, 36, 148, 'P1', '14.4000'),
(25, 36, 4, 'P2', '9.6000'),
(26, 35, 14, 'P1', NULL),
(30, 21, 148, 'P2', '14.6000'),
(31, 37, 4, 'P1', NULL),
(32, 37, 148, 'P2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_jurnal` int(11) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_name` varchar(10) NOT NULL,
  `pendidikan_tertinggi` varchar(2) NOT NULL,
  `pangkat` varchar(128) NOT NULL,
  `gol_ruang` varchar(128) NOT NULL,
  `jab_fungsional` varchar(128) NOT NULL,
  `fakultas` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `unit_kerja` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_jurnal`, `nip`, `name`, `email`, `image`, `password`, `role_name`, `pendidikan_tertinggi`, `pangkat`, `gol_ruang`, `jab_fungsional`, `fakultas`, `jurusan`, `unit_kerja`, `is_active`, `date_created`) VALUES
(1, 0, '1', 'Admin', '1@gmail.com', 'IMG_20180805_172448.jpg', '$2y$10$dkvFCo2wr.z0fC4F9xDgC.J.qoYPstQHkgDQ0E85Z2f0O03d9Ft4G', 'Admin', 'S1', 'Pembina', 'IV-A', 'Lektor Kepala', 'Teknik', 'Teknik Komputer', 'Fakultas Teknik, Departemen Teknik Komputer', 1, 1578082568),
(2, 0, '2', 'Operator 1', '2@gmail.com', 'IMG_20180805_172448.jpg', '$2y$10$/G3pLJyV98f5fw/89VYJfOajWzk5dwQ1/hzW1r.ZgSbEK9m2Svz4S', 'Operator', '', '', '', '', '', '', '', 1, 1579735075),
(3, 0, '3', 'pakkk12', '3@gmail.com', 'Screenshot_2019-06-26-19-26-39-963_com_instagram_android.png', '$2y$10$AJ7Yl1bQ0jMdLrruyqJMcuI62kLm7qpXA8FwSTRbnYgYJ5fSUDfBC', 'Reviewer', '', '', '', '', 'Teknik', 'Teknik Komputer', '', 1, 1582020081),
(4, 0, '444', 'Dosen', '4@gmail.com', 'Screenshot_20180427_171719.jpg', '$2y$10$1KbK5SJeAIDntYE4RnuHjOuwU/DFhuWpy2Kw5ueID1/OkRXnEBW7e', 'Dosen', 'S3', 'Pembina', 'IV-A', 'Lektor Kepala', 'Teknik', 'Teknik Komputer', 'Fakultas Teknik, Departemen Teknik Komputer', 1, 1578523821),
(14, 0, 'H.7.19850407201', 'Dr. Anang Wahyu Sejati, ST, MT', 'ffnasution@student.ce.undip.ac.id', 'default.jpg', '$2y$10$bTCuMR3gb6Y68SHVWvyngeaiHbC4EtZqpUQPPKGWbiUmD4xSYc6NO', 'Dosen', '', '', '', '', '', '', '', 1, 1581146227),
(145, 0, '21120115120052', 'Reviewer 2', 'fajariahfitriani@gmail.com', 'default.jpg', '$2y$10$n3vp20uHUHUQauO1topcC.uLLo9yI7u8gy9p4ZD3hJmR.6JvcbXBq', 'Reviewer', '', '', '', '', '', '', '', 1, 1581248605),
(148, 0, '1', 'dosen 1', 'dosen1@gmail.com', 'default.jpg', '$2y$10$MQ25C.IvTgl9q4MhSlx7Fu2mvrTLIn8hovpUp.G9q2jkWP9G9yPO6', 'Dosen', '', '', '', '', '', '', '', 1, 1581589467),
(149, 0, '2', '2', 'rev2@gmail.com', 'default.jpg', '$2y$10$EuYVf8FHym/8zH1xx56nk.U8F.O5PdTrOlOU3XRPm3uwi3OWlKZHG', 'Reviewer', 'S2', 'Pembina', 'IV-A', 'Lektor Kepala', 'Teknik', 'Teknik Komputer', 'Fakultas Teknik, Departemen Teknik Komputer', 0, 1582020261);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(1, 'ffnasution2@gmail.com', '4iFxaMiXC4hkhs+lTyxytKK0nnmrcIRmJfLaUT14uFA=', 1578509104),
(2, 'putri@gmail.com', 'O/NlD8Wc1zfcvFXbexBGYKMYsknw6XRnDuBS61zY04w=', 1579296974),
(3, 'ffnasution2@gmail.com', 'cMLOrTlyaXFZPkeaiDB+KqnyVh79OxByst0DhHQkA28=', 1579735254);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jumlah`
-- (See below for the actual view)
--
CREATE TABLE `view_jumlah` (
`id_jurnal` int(11)
,`total` decimal(39,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jumlahpenulis`
-- (See below for the actual view)
--
CREATE TABLE `view_jumlahpenulis` (
`id_jurnal` int(11)
,`Jumlah` bigint(21)
,`total` decimal(39,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jumlahreviewer`
-- (See below for the actual view)
--
CREATE TABLE `view_jumlahreviewer` (
`id_user` int(11)
,`id_jurnal` int(11)
,`judul_jurnal` varchar(255)
,`ISSN` varchar(30)
,`volume` varchar(5)
,`nomor` int(3)
,`bulan` varchar(9)
,`tahun` int(5)
,`file_jurnal` varchar(255)
,`Q` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jurnal`
-- (See below for the actual view)
--
CREATE TABLE `view_jurnal` (
`id_jurnal` int(11)
,`id_user` int(11)
,`name` varchar(128)
,`judul_jurnal` varchar(255)
,`nama_jurnal` varchar(128)
,`ISSN` varchar(30)
,`volume` varchar(5)
,`nomor` int(3)
,`bulan` varchar(9)
,`tahun` int(5)
,`penerbit` varchar(128)
,`DOI` varchar(255)
,`alamat_web_jurnal` varchar(255)
,`alamat_web_artikel` varchar(255)
,`terindeks_di` varchar(255)
,`file_jurnal` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_nilaijurnal`
-- (See below for the actual view)
--
CREATE TABLE `view_nilaijurnal` (
`judul_jurnal` varchar(255)
,`id_nilai` int(11)
,`id_jurnal` int(11)
,`id_reviewer` int(11)
,`stat_reviewer` varchar(3)
,`kelengkapan_isi` int(3)
,`ruanglingkup` int(3)
,`kecukupan` int(3)
,`kelengkapan_unsur` int(3)
,`file_penilaian` varchar(255)
,`date_created` int(11)
,`total` decimal(39,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_nilaipenulis`
-- (See below for the actual view)
--
CREATE TABLE `view_nilaipenulis` (
`id_user` int(11)
,`status` varchar(3)
,`kredit_penulis` decimal(39,4)
,`judul_jurnal` varchar(255)
,`id_nilai` int(11)
,`id_jurnal` int(11)
,`id_reviewer` int(11)
,`stat_reviewer` varchar(3)
,`kelengkapan_isi` int(3)
,`ruanglingkup` int(3)
,`kecukupan` int(3)
,`kelengkapan_unsur` int(3)
,`file_penilaian` varchar(255)
,`date_created` int(11)
,`total` decimal(39,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_penulisjurnal`
-- (See below for the actual view)
--
CREATE TABLE `view_penulisjurnal` (
`id_pj` int(11)
,`id_jurnal` int(11)
,`id_user` int(11)
,`status` varchar(3)
,`kredit_penulis` decimal(39,4)
,`judul_jurnal` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_jumlah`
--
DROP TABLE IF EXISTS `view_jumlah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah`  AS  select `jurnal`.`id_jurnal` AS `id_jurnal`,sum((`nilai_jurnal`.`kelengkapan_isi` + `nilai_jurnal`.`ruanglingkup` + `nilai_jurnal`.`kecukupan` + `nilai_jurnal`.`kelengkapan_unsur`) / 2) AS `total` from (`jurnal` left join `nilai_jurnal` on(`jurnal`.`id_jurnal` = `nilai_jurnal`.`id_jurnal`)) group by `jurnal`.`id_jurnal` ;

-- --------------------------------------------------------

--
-- Structure for view `view_jumlahpenulis`
--
DROP TABLE IF EXISTS `view_jumlahpenulis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlahpenulis`  AS  select `penulis_jurnal`.`id_jurnal` AS `id_jurnal`,count(case when `penulis_jurnal`.`id_jurnal` > 0 then `penulis_jurnal`.`id_jurnal` else NULL end) AS `Jumlah`,`view_jumlah`.`total` AS `total` from (`penulis_jurnal` left join `view_jumlah` on(`view_jumlah`.`id_jurnal` = `penulis_jurnal`.`id_jurnal`)) group by `penulis_jurnal`.`id_jurnal` ;

-- --------------------------------------------------------

--
-- Structure for view `view_jumlahreviewer`
--
DROP TABLE IF EXISTS `view_jumlahreviewer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlahreviewer`  AS  select `jurnal`.`id_user` AS `id_user`,`jurnal`.`id_jurnal` AS `id_jurnal`,`jurnal`.`judul_jurnal` AS `judul_jurnal`,`jurnal`.`ISSN` AS `ISSN`,`jurnal`.`volume` AS `volume`,`jurnal`.`nomor` AS `nomor`,`jurnal`.`bulan` AS `bulan`,`jurnal`.`tahun` AS `tahun`,`jurnal`.`file_jurnal` AS `file_jurnal`,count(case when `nilai_jurnal`.`id_jurnal` > 0 then `nilai_jurnal`.`id_jurnal` else NULL end) AS `Q` from (`jurnal` left join `nilai_jurnal` on(`jurnal`.`id_jurnal` = `nilai_jurnal`.`id_jurnal`)) group by `jurnal`.`id_user`,`jurnal`.`id_jurnal`,`jurnal`.`judul_jurnal`,`jurnal`.`ISSN`,`jurnal`.`volume`,`jurnal`.`nomor`,`jurnal`.`bulan`,`jurnal`.`tahun`,`jurnal`.`file_jurnal` ;

-- --------------------------------------------------------

--
-- Structure for view `view_jurnal`
--
DROP TABLE IF EXISTS `view_jurnal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jurnal`  AS  select `jurnal`.`id_jurnal` AS `id_jurnal`,`user`.`id_user` AS `id_user`,`user`.`name` AS `name`,`jurnal`.`judul_jurnal` AS `judul_jurnal`,`jurnal`.`nama_jurnal` AS `nama_jurnal`,`jurnal`.`ISSN` AS `ISSN`,`jurnal`.`volume` AS `volume`,`jurnal`.`nomor` AS `nomor`,`jurnal`.`bulan` AS `bulan`,`jurnal`.`tahun` AS `tahun`,`jurnal`.`penerbit` AS `penerbit`,`jurnal`.`DOI` AS `DOI`,`jurnal`.`alamat_web_jurnal` AS `alamat_web_jurnal`,`jurnal`.`alamat_web_artikel` AS `alamat_web_artikel`,`jurnal`.`terindeks_di` AS `terindeks_di`,`jurnal`.`file_jurnal` AS `file_jurnal` from (`jurnal` left join `user` on(`user`.`id_user` = `jurnal`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_nilaijurnal`
--
DROP TABLE IF EXISTS `view_nilaijurnal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nilaijurnal`  AS  select `jurnal`.`judul_jurnal` AS `judul_jurnal`,`nilai_jurnal`.`id_nilai` AS `id_nilai`,`nilai_jurnal`.`id_jurnal` AS `id_jurnal`,`nilai_jurnal`.`id_reviewer` AS `id_reviewer`,`nilai_jurnal`.`stat_reviewer` AS `stat_reviewer`,`nilai_jurnal`.`kelengkapan_isi` AS `kelengkapan_isi`,`nilai_jurnal`.`ruanglingkup` AS `ruanglingkup`,`nilai_jurnal`.`kecukupan` AS `kecukupan`,`nilai_jurnal`.`kelengkapan_unsur` AS `kelengkapan_unsur`,`nilai_jurnal`.`file_penilaian` AS `file_penilaian`,`nilai_jurnal`.`date_created` AS `date_created`,`view_jumlah`.`total` AS `total` from ((`nilai_jurnal` left join `view_jumlah` on(`nilai_jurnal`.`id_jurnal` = `view_jumlah`.`id_jurnal`)) left join `jurnal` on(`jurnal`.`id_jurnal` = `view_jumlah`.`id_jurnal`)) group by `view_jumlah`.`id_jurnal` ;

-- --------------------------------------------------------

--
-- Structure for view `view_nilaipenulis`
--
DROP TABLE IF EXISTS `view_nilaipenulis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_nilaipenulis`  AS  select `user`.`id_user` AS `id_user`,`penulis_jurnal`.`status` AS `status`,`penulis_jurnal`.`kredit_penulis` AS `kredit_penulis`,`view_nilaijurnal`.`judul_jurnal` AS `judul_jurnal`,`view_nilaijurnal`.`id_nilai` AS `id_nilai`,`view_nilaijurnal`.`id_jurnal` AS `id_jurnal`,`view_nilaijurnal`.`id_reviewer` AS `id_reviewer`,`view_nilaijurnal`.`stat_reviewer` AS `stat_reviewer`,`view_nilaijurnal`.`kelengkapan_isi` AS `kelengkapan_isi`,`view_nilaijurnal`.`ruanglingkup` AS `ruanglingkup`,`view_nilaijurnal`.`kecukupan` AS `kecukupan`,`view_nilaijurnal`.`kelengkapan_unsur` AS `kelengkapan_unsur`,`view_nilaijurnal`.`file_penilaian` AS `file_penilaian`,`view_nilaijurnal`.`date_created` AS `date_created`,`view_nilaijurnal`.`total` AS `total` from ((`penulis_jurnal` left join `view_nilaijurnal` on(`penulis_jurnal`.`id_jurnal` = `view_nilaijurnal`.`id_jurnal`)) left join `user` on(`user`.`id_user` = `penulis_jurnal`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_penulisjurnal`
--
DROP TABLE IF EXISTS `view_penulisjurnal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_penulisjurnal`  AS  select `penulis_jurnal`.`id_pj` AS `id_pj`,`penulis_jurnal`.`id_jurnal` AS `id_jurnal`,`penulis_jurnal`.`id_user` AS `id_user`,`penulis_jurnal`.`status` AS `status`,`penulis_jurnal`.`kredit_penulis` AS `kredit_penulis`,`jurnal`.`judul_jurnal` AS `judul_jurnal` from (`penulis_jurnal` left join `jurnal` on(`penulis_jurnal`.`id_jurnal` = `jurnal`.`id_jurnal`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `nip` (`id_user`),
  ADD KEY `id_nilai` (`id_nilai`);

--
-- Indexes for table `nilai_jurnal`
--
ALTER TABLE `nilai_jurnal`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_jurnal` (`id_jurnal`),
  ADD KEY `id` (`id_reviewer`);

--
-- Indexes for table `penulis_jurnal`
--
ALTER TABLE `penulis_jurnal`
  ADD PRIMARY KEY (`id_pj`),
  ADD KEY `id_jurnal` (`id_jurnal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jurnal` (`id_jurnal`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `nilai_jurnal`
--
ALTER TABLE `nilai_jurnal`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penulis_jurnal`
--
ALTER TABLE `penulis_jurnal`
  MODIFY `id_pj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
