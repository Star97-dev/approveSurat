-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 09:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rivan`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_req` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_req`, `filename`, `file`, `status`) VALUES
(1, 26, 1, 'Surat Permohonan Kredit', '220103_Surat_Permohonan_Kredit.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_rekap`
--

CREATE TABLE `detail_rekap` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_rekap` int(11) NOT NULL,
  `id_req` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0 = Not Aprrove, 1 = Approved, 2 = Rejected'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_rekap`
--

INSERT INTO `detail_rekap` (`id`, `id_user`, `id_rekap`, `id_req`, `filename`, `file`, `status`) VALUES
(319, 27, 114, 1, 'Surat Permohonan Kredit', 'req-220104Surat_Permohonan_Kredit.png', 1),
(320, 27, 114, 2, 'Akta Pendirian Perusahaan', 'req-220104Akta_Pendirian_Perusahaan.pdf', 0),
(321, 27, 114, 3, 'Pengesahan Akta Pendirian', NULL, NULL),
(322, 27, 114, 4, 'Perubahan Akta/Anggaran Dasar', NULL, NULL),
(323, 27, 114, 5, 'Pengesahan Akta Perubahan', NULL, NULL),
(324, 27, 114, 6, 'TDP(Tanda Daftar Perusahaan)', NULL, NULL),
(325, 27, 114, 7, 'NPWP', NULL, NULL),
(326, 27, 114, 8, 'SIUP(Surat Ijin Usaha Perdagangan)', NULL, NULL),
(327, 27, 114, 9, 'SIUJK(Surat Ijin Jasa Kontruksi)', NULL, NULL),
(328, 27, 114, 10, 'SKDU(Surat Keterangan Domisili Perusahaan)', NULL, NULL),
(329, 27, 114, 11, 'Keanggotaan REI/Apersi', NULL, NULL),
(330, 27, 114, 12, 'Struktur Organisasi dan Personilnya', NULL, NULL),
(331, 27, 114, 13, 'Curriculum Vitae dan Pas Foto Pengurus', NULL, NULL),
(332, 27, 114, 14, 'Foto Copy KTP Pengurus Perusahaan', NULL, NULL),
(333, 27, 114, 15, 'Foto Copy NPWP Pengurus Perusahaan', NULL, NULL),
(334, 27, 114, 16, 'Ijin Lokasi dari BPN Setempat', NULL, NULL),
(335, 27, 114, 17, 'IMB(Ijin Mendirikan Bangunan)', NULL, NULL),
(336, 27, 114, 18, 'Bukti Penguasaan Tanah Lokasi Proyek(SHGB)', NULL, NULL),
(337, 27, 114, 19, 'Site Plan yang telah disahkan', NULL, NULL),
(338, 27, 114, 20, 'Keterangan Penggunaan Jalan dan Saluran Desa', NULL, NULL),
(339, 27, 114, 21, 'Surat Keterangan Bebas Banjir(Peil Banjir)', NULL, NULL),
(340, 27, 114, 22, 'Rekomendasi PLN', NULL, NULL),
(341, 27, 114, 23, 'Rekomendasi PDAM(jika menggunakan air PAM)', NULL, NULL),
(342, 27, 114, 24, 'Hasil Test Air bersih dari Laboratorium', NULL, NULL),
(343, 27, 114, 25, 'Gambar teknis rumah, sarana prasarana', NULL, NULL),
(344, 27, 114, 26, 'Gambar teknis rumah tipe', NULL, NULL),
(345, 27, 114, 27, 'Daftar Nominatif konsumen', NULL, NULL),
(346, 27, 114, 28, 'Dasar Taksasi Tanah(Copy PBB, SPPH)', NULL, NULL),
(347, 27, 114, 29, 'Brosur Marketing Penjualan', NULL, NULL),
(348, 27, 114, 30, 'Rencana jumlah rumah yang akan dibangun per type', NULL, NULL),
(349, 26, 115, 1, 'Surat Permohonan Kredit', 'req-220104Surat_Permohonan_Kredit.jpg', 1),
(350, 26, 115, 2, 'Akta Pendirian Perusahaan', NULL, NULL),
(351, 26, 115, 3, 'Pengesahan Akta Pendirian', 'req-220104Pengesahan_Akta_Pendirian.png', 1),
(352, 26, 115, 4, 'Perubahan Akta/Anggaran Dasar', NULL, NULL),
(353, 26, 115, 5, 'Pengesahan Akta Perubahan', NULL, NULL),
(354, 26, 115, 6, 'TDP(Tanda Daftar Perusahaan)', NULL, NULL),
(355, 26, 115, 7, 'NPWP', NULL, NULL),
(356, 26, 115, 8, 'SIUP(Surat Ijin Usaha Perdagangan)', NULL, NULL),
(357, 26, 115, 9, 'SIUJK(Surat Ijin Jasa Kontruksi)', NULL, NULL),
(358, 26, 115, 10, 'SKDU(Surat Keterangan Domisili Perusahaan)', NULL, NULL),
(359, 26, 115, 11, 'Keanggotaan REI/Apersi', NULL, NULL),
(360, 26, 115, 12, 'Struktur Organisasi dan Personilnya', NULL, NULL),
(361, 26, 115, 13, 'Curriculum Vitae dan Pas Foto Pengurus', NULL, NULL),
(362, 26, 115, 14, 'Foto Copy KTP Pengurus Perusahaan', NULL, NULL),
(363, 26, 115, 15, 'Foto Copy NPWP Pengurus Perusahaan', NULL, NULL),
(364, 26, 115, 16, 'Ijin Lokasi dari BPN Setempat', NULL, NULL),
(365, 26, 115, 17, 'IMB(Ijin Mendirikan Bangunan)', NULL, NULL),
(366, 26, 115, 18, 'Bukti Penguasaan Tanah Lokasi Proyek(SHGB)', NULL, NULL),
(367, 26, 115, 19, 'Site Plan yang telah disahkan', NULL, NULL),
(368, 26, 115, 20, 'Keterangan Penggunaan Jalan dan Saluran Desa', NULL, NULL),
(369, 26, 115, 21, 'Surat Keterangan Bebas Banjir(Peil Banjir)', NULL, NULL),
(370, 26, 115, 22, 'Rekomendasi PLN', NULL, NULL),
(371, 26, 115, 23, 'Rekomendasi PDAM(jika menggunakan air PAM)', NULL, NULL),
(372, 26, 115, 24, 'Hasil Test Air bersih dari Laboratorium', NULL, NULL),
(373, 26, 115, 25, 'Gambar teknis rumah, sarana prasarana', NULL, NULL),
(374, 26, 115, 26, 'Gambar teknis rumah tipe', NULL, NULL),
(375, 26, 115, 27, 'Daftar Nominatif konsumen', NULL, NULL),
(376, 26, 115, 28, 'Dasar Taksasi Tanah(Copy PBB, SPPH)', NULL, NULL),
(377, 26, 115, 29, 'Brosur Marketing Penjualan', NULL, NULL),
(378, 26, 115, 30, 'Rencana jumlah rumah yang akan dibangun per type', NULL, NULL),
(379, 26, 116, 1, 'Surat Permohonan Kredit', NULL, NULL),
(380, 26, 116, 2, 'Akta Pendirian Perusahaan', 'req-220104Akta_Pendirian_Perusahaan.jpg', 0),
(381, 26, 116, 3, 'Pengesahan Akta Pendirian', NULL, NULL),
(382, 26, 116, 4, 'Perubahan Akta/Anggaran Dasar', 'req-220104Perubahan_AktaAnggaran_Dasar.pdf', 0),
(383, 26, 116, 5, 'Pengesahan Akta Perubahan', NULL, NULL),
(384, 26, 116, 6, 'TDP(Tanda Daftar Perusahaan)', NULL, NULL),
(385, 26, 116, 7, 'NPWP', NULL, NULL),
(386, 26, 116, 8, 'SIUP(Surat Ijin Usaha Perdagangan)', NULL, NULL),
(387, 26, 116, 9, 'SIUJK(Surat Ijin Jasa Kontruksi)', NULL, NULL),
(388, 26, 116, 10, 'SKDU(Surat Keterangan Domisili Perusahaan)', NULL, NULL),
(389, 26, 116, 11, 'Keanggotaan REI/Apersi', NULL, NULL),
(390, 26, 116, 12, 'Struktur Organisasi dan Personilnya', NULL, NULL),
(391, 26, 116, 13, 'Curriculum Vitae dan Pas Foto Pengurus', NULL, NULL),
(392, 26, 116, 14, 'Foto Copy KTP Pengurus Perusahaan', NULL, NULL),
(393, 26, 116, 15, 'Foto Copy NPWP Pengurus Perusahaan', NULL, NULL),
(394, 26, 116, 16, 'Ijin Lokasi dari BPN Setempat', NULL, NULL),
(395, 26, 116, 17, 'IMB(Ijin Mendirikan Bangunan)', NULL, NULL),
(396, 26, 116, 18, 'Bukti Penguasaan Tanah Lokasi Proyek(SHGB)', NULL, NULL),
(397, 26, 116, 19, 'Site Plan yang telah disahkan', NULL, NULL),
(398, 26, 116, 20, 'Keterangan Penggunaan Jalan dan Saluran Desa', NULL, NULL),
(399, 26, 116, 21, 'Surat Keterangan Bebas Banjir(Peil Banjir)', NULL, NULL),
(400, 26, 116, 22, 'Rekomendasi PLN', NULL, NULL),
(401, 26, 116, 23, 'Rekomendasi PDAM(jika menggunakan air PAM)', NULL, NULL),
(402, 26, 116, 24, 'Hasil Test Air bersih dari Laboratorium', NULL, NULL),
(403, 26, 116, 25, 'Gambar teknis rumah, sarana prasarana', NULL, NULL),
(404, 26, 116, 26, 'Gambar teknis rumah tipe', NULL, NULL),
(405, 26, 116, 27, 'Daftar Nominatif konsumen', NULL, NULL),
(406, 26, 116, 28, 'Dasar Taksasi Tanah(Copy PBB, SPPH)', NULL, NULL),
(407, 26, 116, 29, 'Brosur Marketing Penjualan', NULL, NULL),
(408, 26, 116, 30, 'Rencana jumlah rumah yang akan dibangun per type', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `branch` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `status` int(2) NOT NULL COMMENT '0 = ''Not Submited'', 1 = ''submited/not approve'', 2 = ''Approved'', 3 = ''Rejected''',
  `pks` varchar(100) DEFAULT NULL,
  `note` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id`, `id_user`, `name`, `branch`, `date`, `status`, `pks`, `note`) VALUES
(114, 27, 'user', 'BTN Cawang', '2022-01-04', 1, NULL, NULL),
(115, 26, 'Satria Anugerah', 'BTN Tangerang', '2022-01-04', 2, 'pks-220104satPKS.pdf', 'done'),
(116, 26, 'Satria Anugerah', 'BTN Cawang', '2022-01-04', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE `requirement` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirement`
--

INSERT INTO `requirement` (`id`, `name`) VALUES
(1, 'Surat Permohonan Kredit'),
(2, 'Akta Pendirian Perusahaan'),
(3, 'Pengesahan Akta Pendirian'),
(4, 'Perubahan Akta/Anggaran Dasar'),
(5, 'Pengesahan Akta Perubahan'),
(6, 'TDP(Tanda Daftar Perusahaan)'),
(7, 'NPWP'),
(8, 'SIUP(Surat Ijin Usaha Perdagangan)'),
(9, 'SIUJK(Surat Ijin Jasa Kontruksi)'),
(10, 'SKDU(Surat Keterangan Domisili Perusahaan)'),
(11, 'Keanggotaan REI/Apersi'),
(12, 'Struktur Organisasi dan Personilnya'),
(13, 'Curriculum Vitae dan Pas Foto Pengurus'),
(14, 'Foto Copy KTP Pengurus Perusahaan'),
(15, 'Foto Copy NPWP Pengurus Perusahaan'),
(16, 'Ijin Lokasi dari BPN Setempat'),
(17, 'IMB(Ijin Mendirikan Bangunan)'),
(18, 'Bukti Penguasaan Tanah Lokasi Proyek(SHGB)'),
(19, 'Site Plan yang telah disahkan'),
(20, 'Keterangan Penggunaan Jalan dan Saluran Desa'),
(21, 'Surat Keterangan Bebas Banjir(Peil Banjir)'),
(22, 'Rekomendasi PLN'),
(23, 'Rekomendasi PDAM(jika menggunakan air PAM)'),
(24, 'Hasil Test Air bersih dari Laboratorium'),
(25, 'Gambar teknis rumah, sarana prasarana'),
(26, 'Gambar teknis rumah tipe'),
(27, 'Daftar Nominatif konsumen'),
(28, 'Dasar Taksasi Tanah(Copy PBB, SPPH)'),
(29, 'Brosur Marketing Penjualan'),
(30, 'Rencana jumlah rumah yang akan dibangun per type');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `password`, `role_id`, `date_created`) VALUES
(22, 'admin', '2147483647', 'admin@gmail.com', '$2y$10$xFQlUtnKDDjE6LG/Y3rZWO6IJFiGHnZwPM7NXo2Fff1Tm8sBDf4Z.', 1, '2021-11-25'),
(23, 'Rivan', '354654654', 'rivan@gmail.com', '$2y$10$BdbAyyXke7CwLbdgQOyL8eo3SdQWPuSK7DZiSqYResVDIm8OFulnC', 2, '2021-11-25'),
(26, 'Satria Anugerah', '081775275111', 'satriaanugerah94@gmail.com', '$2y$10$/VU0CV/rHNBC.iAxvAQFieWjqVE9eFi.EE8b1QPeCevhT2wBVNH9m', 2, '2021-11-28'),
(27, 'user', '02124545154', 'user@gmail.com', '$2y$10$.bic7Fe./0pMNAQFeYmhXuChUwXbNMSmnZ4E2sr7pya5xXPOug8xu', 2, '2021-12-06'),
(28, 'badnen', '0165465465', 'badnen@mail.com', '$2y$10$bYPW7vY88f0VmRZ1KhgbtubDKnIFLO7Fy8NCFN2FPUaMM9mMB8IAa', 2, '2021-12-07'),
(29, 'user 2', '08757587487', 'user2@gmail.com', '$2y$10$gfvUNfSPKXSlXxX69uA/U.QOH4Fywk3IRo5f/btxruGKygwKq6qay', 2, '2021-12-15');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Partner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_rekap`
--
ALTER TABLE `detail_rekap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_rekap_ibfk_1` (`id_rekap`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_req` (`id_req`);

--
-- Indexes for table `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `requirement`
--
ALTER TABLE `requirement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_rekap`
--
ALTER TABLE `detail_rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=409;

--
-- AUTO_INCREMENT for table `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `requirement`
--
ALTER TABLE `requirement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_rekap`
--
ALTER TABLE `detail_rekap`
  ADD CONSTRAINT `detail_rekap_ibfk_1` FOREIGN KEY (`id_rekap`) REFERENCES `rekap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_rekap_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `detail_rekap_ibfk_4` FOREIGN KEY (`id_req`) REFERENCES `requirement` (`id`);

--
-- Constraints for table `rekap`
--
ALTER TABLE `rekap`
  ADD CONSTRAINT `rekap_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
