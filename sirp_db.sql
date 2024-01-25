-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 11:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `breakdown`
--

CREATE TABLE `breakdown` (
  `id_breakdown` int(10) NOT NULL,
  `triwulan_1` int(1) NOT NULL,
  `triwulan_2` int(1) NOT NULL,
  `triwulan_3` int(1) NOT NULL,
  `triwulan_4` int(1) NOT NULL,
  `akumulasi_target_1` int(8) NOT NULL,
  `akumulasi_target_2` int(8) NOT NULL,
  `akumulasi_target_3` int(8) NOT NULL,
  `akumulasi_target_4` int(8) NOT NULL,
  `realisasi_1` int(8) NOT NULL,
  `realisasi_2` int(8) NOT NULL,
  `realisasi_3` int(8) NOT NULL,
  `realisasi_4` int(8) NOT NULL,
  `tahun_akademik` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breakdown`
--

INSERT INTO `breakdown` (`id_breakdown`, `triwulan_1`, `triwulan_2`, `triwulan_3`, `triwulan_4`, `akumulasi_target_1`, `akumulasi_target_2`, `akumulasi_target_3`, `akumulasi_target_4`, `realisasi_1`, `realisasi_2`, `realisasi_3`, `realisasi_4`, `tahun_akademik`) VALUES
(3, 1, 2, 3, 4, 30, 36, 42, 33, 1, 1, 1, 1, 2020),
(4, 1, 2, 3, 4, 30, 36, 42, 33, 1, 1, 1, 1, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `dt_permintaan`
--

CREATE TABLE `dt_permintaan` (
  `id_permintaan` varchar(14) NOT NULL,
  `nim` varchar(30) NOT NULL DEFAULT 'hps',
  `nama_mhs` varchar(50) NOT NULL DEFAULT 'Jika sudah ada kandidat, klik ini untuk menghapus',
  `kelas` varchar(10) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `qty` int(1) NOT NULL,
  `hasil` varchar(50) DEFAULT 'Belum',
  `status` varchar(15) DEFAULT 'Belum',
  `ket` varchar(100) DEFAULT NULL,
  `tgl_hasil` date DEFAULT NULL,
  `ket_lain` varchar(225) DEFAULT NULL,
  `tahun_akademik` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_permintaan`
--

INSERT INTO `dt_permintaan` (`id_permintaan`, `nim`, `nama_mhs`, `kelas`, `prodi`, `asal_sekolah`, `qty`, `hasil`, `status`, `ket`, `tgl_hasil`, `ket_lain`, `tahun_akademik`) VALUES
('20230527025450', '202002059', 'Dalfa Rahma Yunizar', 'MI20A', 'MANAJEMEN INFORMATIKA', 'MAN 1 TASIKMALAYA', 1, 'Lolos Test', 'Kerja', NULL, '0000-00-00', '', 2020),
('20230527025450', '202002090', 'Siti Aas Latipah', 'MI20A', 'MANAJEMEN INFORMATIKA', 'TMI Darussalam Garut', 1, 'Lolos Test', 'Kerja', NULL, '0000-00-00', '', 2020),
('20230527030116', '202006014', 'Lisda Tri Romdini', 'MKP01K', 'MANAJEMEN KEUANGAN DAN PERBANKAN', '', 1, 'Lolos Test', 'Kerja', NULL, '0000-00-00', '', 2020),
('20230527030116', '202006003', 'Annisa Pebriyanti', 'MKP01K', 'MANAJEMEN KEUANGAN DAN PERBANKAN', 'SMK AS-SHOFA', 1, 'Belum', 'Belum', NULL, NULL, NULL, 2020),
('20230527030116', '202006007', 'Dede Siti Laela', 'MKP01K', 'MANAJEMEN KEUANGAN DAN PERBANKAN', '', 1, 'Lolos Test', 'Kerja', NULL, '0000-00-00', '', 2020),
('20230527030145', '202005030', 'Ruli', 'MP01ADM', 'MANAJEMEN PEMASARAN', 'SMAN 8 TASIKMALAYA ', 1, 'Lolos Test', 'Kerja', NULL, '0000-00-00', '', 2020),
('20230527030145', '202005028', 'Respitri Nurdesi', 'MP01ADM', 'MANAJEMEN PEMASARAN', 'SMAN 1 JATIWARAS', 1, 'Belum', 'Belum', NULL, NULL, NULL, 2020),
('20230527030401', '202002086', 'Rangga Framadya Neno', 'MI20A', 'MANAJEMEN INFORMATIKA', 'SMAN 1 Ciawi', 1, 'Belum', 'Belum', NULL, NULL, NULL, 2020),
('20230527030401', '202002063', 'Diki Nur Rahman', 'MI20A', 'MANAJEMEN INFORMATIKA', 'SMK Muhammadiyah KotaTasimalaya', 1, 'Lolos Test', 'Kerja', NULL, '0000-00-00', '', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `ht_permintaan`
--

CREATE TABLE `ht_permintaan` (
  `id_permintaan` varchar(14) NOT NULL,
  `id_perusahaan` int(5) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `relasi` varchar(5) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kontak_person` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `waktu` datetime NOT NULL,
  `posisi_yang_dibutuhkan` varchar(100) NOT NULL,
  `kualifikasi` text DEFAULT NULL,
  `jml_mhs` int(3) DEFAULT NULL,
  `oleh` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ht_permintaan`
--

INSERT INTO `ht_permintaan` (`id_permintaan`, `id_perusahaan`, `nama_perusahaan`, `bidang`, `relasi`, `alamat`, `kota`, `kontak_person`, `no_telp`, `waktu`, `posisi_yang_dibutuhkan`, `kualifikasi`, `jml_mhs`, `oleh`) VALUES
('20230527025450', 2052, 'PT. INDOMARCO ADI PRIMA', 'DISTRIBUTOR', '', 'RUKO TFT - LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', 'TASIKMALAYA', 'PAK HENDI (GOGON)', '0853-1686-011', '2023-05-20 02:53:31', 'ADMIN', '-', 2, 'Bini'),
('20230527030116', 2055, 'PT. KOMODO TEXTILE MILLS', 'TEXTILE', 'Baru', 'Jl. Raya Laswi No.134, Padamulya, Kec. Majalaya, Kabupaten Bandung, Jawa Barat 40392', 'Bandung', 'Niera Mia', '878-2333-4483', '2023-05-21 03:00:16', 'ACCOUNTING', '-', 3, 'Gina'),
('20230527030145', 2051, 'CV. NZD GROUP', 'JASA', 'Lama', 'JL. SETIAJAYA, KEC. CIBEUREUM', 'TASIKMALAYA', 'IBU. IDA MAULIDA', '082216155544', '2023-05-22 03:01:27', 'MARKETING', '', NULL, 'Bini'),
('20230527030401', 2053, 'PR. MAKMUR TASIKMALAYA (ROTAMA)', 'DISTRIBUTOR', 'Baru', 'JL. PS. KIDUL NO.16A, MANONJAYA, KEC. MANONJAYA, KABUPATEN TASIKMALAYA, JAWA BARAT 46197', 'KAB.?TASIKMALAYA', 'Yana Suryawana', '\'08192006871', '2023-05-24 03:02:49', 'PROGRAMMER', '-', 2, 'Gina');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `id_prodi` int(10) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_prodi`, `prodi`, `kelas`) VALUES
(1, 1, 'MANAJEMEN INFORMATIKA', 'MI20A'),
(2, 2, 'ADMINISTRASI BISNIS', 'AB13A'),
(3, 2, 'ADMINISTRASI BISNIS', 'AB13B'),
(4, 2, 'ADMINISTRASI BISNIS', 'AB13C'),
(5, 2, 'ADMINISTRASI BISNIS', 'AB13D'),
(6, 3, 'KOMPUTER AKUNTANSI', 'AK17A'),
(7, 3, 'KOMPUTER AKUNTANSI', 'AK17B'),
(8, 1, 'MANAJEMEN INFORMATIKA', 'MI19A'),
(9, 1, 'MANAJEMEN INFORMATIKA', 'MI19B'),
(10, 4, 'TEKNIK OTOMOTIF', 'TO19A'),
(11, 4, 'TEKNIK OTOMOTIF', 'TO19B'),
(12, 4, 'TEKNIK OTOMOTIF', 'TO20A'),
(13, 4, 'TEKNIK OTOMOTIF', 'TO20B'),
(14, 5, 'MANAJEMEN PEMASARAN', 'MP01RM'),
(15, 5, 'MANAJEMEN PEMASARAN', 'MP01BDM'),
(16, 5, 'MANAJEMEN PEMASARAN', 'MP01ADM'),
(17, 6, 'MANAJEMEN KEUANGAN DAN PERBANKAN', 'MKP01P'),
(18, 6, 'MANAJEMEN KEUANGAN DAN PERBANKAN', 'MKP01K'),
(19, 1, 'MANAJEMEN INFORMATIKA', 'MI20B');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(30) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `status_keuangan` text DEFAULT NULL,
  `ipk` decimal(10,2) DEFAULT NULL,
  `status_sidang` varchar(50) DEFAULT NULL,
  `pa` varchar(50) DEFAULT NULL,
  `request_penempatan` text DEFAULT NULL,
  `jk` varchar(15) NOT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `usia` int(3) DEFAULT NULL,
  `dusun` text DEFAULT NULL,
  `desa` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL,
  `kotkab` varchar(25) DEFAULT NULL,
  `no_hp` varchar(30) NOT NULL,
  `nama_ortu` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `no_hp_ortu` varchar(30) DEFAULT NULL,
  `uk1` varchar(50) DEFAULT NULL,
  `uk2` varchar(50) DEFAULT NULL,
  `uk3` varchar(50) DEFAULT NULL,
  `uk4` varchar(50) DEFAULT NULL,
  `asal_sekolah` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `status_penempatan` varchar(15) DEFAULT NULL,
  `status_detail` varchar(50) DEFAULT NULL,
  `ket_penempatan` varchar(100) DEFAULT NULL,
  `ket_detail` varchar(225) DEFAULT NULL,
  `tahun_akademik` int(5) NOT NULL,
  `tahun_lulus` int(5) DEFAULT NULL,
  `gaji` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `id_kelas`, `prodi`, `kelas`, `status_keuangan`, `ipk`, `status_sidang`, `pa`, `request_penempatan`, `jk`, `tempat_lahir`, `tgl_lahir`, `usia`, `dusun`, `desa`, `kecamatan`, `kotkab`, `no_hp`, `nama_ortu`, `pekerjaan`, `no_hp_ortu`, `uk1`, `uk2`, `uk3`, `uk4`, `asal_sekolah`, `jurusan`, `status_penempatan`, `status_detail`, `ket_penempatan`, `ket_detail`, `tahun_akademik`, `tahun_lulus`, `gaji`) VALUES
('2002520010002', 'Rama Aji Muharam', 12, 'TEKNIK OTOMOTIF', 'TO20A', 'Lanjut S1', '3.50', '', 'Arip Budiman, ST, M.Pd', 'Lanjut S1', 'L', 'Tasikmalaya', '2001-03-24', 21, 'Dusun Ancol 2 Rt 13-Rw 04 Sindangkasih', 'Sindangkasih', 'Sindangkasih', 'Ciamis', '89612765474', 'Suhendar', 'Wiraswasta', NULL, 'KOMPETEN', '', '', '', 'SMK MUHAMMADIYAH KOTA TASIKMALAYA', 'TEKNIK KOMPUTER DAN JARINGAN', 'Magang', 'OJT', NULL, NULL, 2020, 0, ''),
('2002520010003', 'Faris Risky', 12, 'TEKNIK OTOMOTIF', 'TO20A', 'Lanjut S1', '3.29', '', 'Arip Budiman, ST, M.Pd', 'Lanjut S1', 'L', 'Majalengka', '2001-05-14', 21, 'Blok Cikalong Rt 001-Rw003', 'Desa Jatipamor', 'Talaga', 'Kab. Majalengka', '085861096734', 'Dodo Sujana', 'Wiraswasta', NULL, 'KOMPETEN', '', '', '', 'SMAN 1 CIKATOMAS', 'IPS', 'Magang', 'OJT', NULL, NULL, 2020, 0, ''),
('2002520010004', 'M M Tsani Al-waqis', 12, 'TEKNIK OTOMOTIF', 'TO20A', 'D2', '3.16', '', 'Arip Budiman, ST, M.Pd', 'D2', 'L', '', '0000-00-00', 0, '', '', '', '', '85353323344', 'Heri Supriatna', '', NULL, 'KOMPETEN', '', '', '', '', '', 'Magang', 'OJT', NULL, NULL, 2020, 0, ''),
('2002520010007', 'Cecep Anggi Nugraha', 13, 'TEKNIK OTOMOTIF', 'TO20B', 'D2', '3.33', '', 'Arip Budiman, ST, M.Pd', 'D2', 'L', 'Tasikmalaya', '2001-03-12', 21, 'Kp.Mekarsari Rt 003-Rw 008', 'Cisempur', 'Cibalong', 'Kab.Tasikmalaya', '085211654369 / 085348763776', 'Karman', 'Buruh', NULL, 'KOMPETEN', '', '', '', 'SMK MJPS 3 TASIKMALAYA', 'TEKNIK SEPEDA MOTOR', 'Magang', 'OJT', NULL, NULL, 2020, 0, ''),
('2002520010008', 'Arip Pirmansah', 12, 'TEKNIK OTOMOTIF', 'TO20A', 'D2', '3.43', '', 'Arip Budiman, ST, M.Pd', 'D2', 'L', 'Tasikmalaya', '2001-05-29', 21, 'Kp, Cireundeu Rt02-Rw03', 'Manggungsari', 'Rajapolah', 'Tasikmalaya', '82129478944', 'Jajang Solihin', 'Wiraswasta', NULL, 'KOMPETEN', '', '', '', 'SMKN 1 RAJAPOLAH', 'TEKNIK KENDARAAN RINGAN OTOMOTIF  (TKRO) ', 'Magang', 'OJT', NULL, NULL, 2020, 0, ''),
('202002059', 'Dalfa Rahma Yunizar', 1, 'MANAJEMEN INFORMATIKA', 'MI20A', '', '3.36', '', '', 'LUAR KOTA TASIKMALAYA', 'P', 'Bekasi', '2001-11-25', 21, 'RT 022 RW 004 / Perum Pondok AFI 1 Blok A2/08', 'Kedung pengawas', 'Babelan', 'Bekasi', '', 'Muhtar Gozali', 'Karyawan Swasta', NULL, 'KOMPETEN', 'KOMPETEN', '', '', 'MAN 1 TASIKMALAYA', 'IPA', 'Kerja', 'Kerja', 'CNP', 'CNP', 2020, 0, ''),
('202002063', 'Diki Nur Rahman', 1, 'MANAJEMEN INFORMATIKA', 'MI20A', '', '3.40', '', '', 'TASIKMALAYA', 'L', 'Tasikmalaya', '2001-07-02', 21, 'Kp.Sawah Lempay Rt 004 - Rw 008', 'Argasari', 'Cihideung', 'Kota Tasikmalaya', '083827940608', 'Maryati', 'Ibu Rumah Tangga', NULL, 'KOMPETEN', 'KOMPETEN', '', '', 'SMK Muhammadiyah KotaTasimalaya', 'Teknik Komputer Jaringan', 'Kerja', 'Kerja', 'CNP', 'CNP', 2020, 0, ''),
('202002084', 'Nabila Azzahra', 1, 'MANAJEMEN INFORMATIKA', 'MI20A', 'LUNAS', '3.61', '', '', 'LUAR KOTA TASIKMALAYA', 'P', 'BANJAR', '2002-06-09', 20, 'DUSUN SUKANEGARA RT 04-RW 01', 'WARINGINSARI', 'LANGENSARI', 'BANJAR', '085921540765', 'JUNAIDIN', 'BURUH', NULL, 'KOMPETEN', 'KOMPETEN', '', '', 'SMA NEGERI 2 KOTA BANJAR', 'IPA', 'Magang', 'KKI', NULL, NULL, 2020, 0, ''),
('202002086', 'Rangga Framadya Neno', 1, 'MANAJEMEN INFORMATIKA', 'MI20A', '', '3.58', '', '', 'TASIKMALAYA', 'L', 'Tasikmalaya', '2002-03-27', 20, 'Kp. Balananjeur', 'Ds. Margamulya', 'Kec. Sukaresik', 'Kab. Tasikmalaya', '', 'Eneng Hasanah', 'Wiraswasta', '081320022851', 'KOMPETEN', 'KOMPETEN', '', '', 'SMAN 1 Ciawi', 'Sosial', 'Magang', 'KKI', '', '', 2020, 0, ''),
('202002090', 'Siti Aas Latipah', 1, 'MANAJEMEN INFORMATIKA', 'MI20A', '', '3.49', '', '', 'LUAR KOTA TASIKMALAYA', 'P', 'Garut', '2000-04-17', 22, 'Kp.Legok 03/09', 'Desa Sukarame', 'Leles', 'Kab Garut', '', 'Mustari', 'Wiraswasta', NULL, 'KOMPETEN', 'KOMPETEN', '', '', 'TMI Darussalam Garut', 'Bahasa', 'Kerja', 'Kerja', 'CNP', 'CNP', 2020, 0, ''),
('202005028', 'Respitri Nurdesi', 16, 'MANAJEMEN PEMASARAN', 'MP01ADM', '', '2.99', '', '', 'TASIKMALAYA', 'P', 'Tasikmalaya', '2000-12-27', 21, 'Dusun Papayan Rt 03-Rw 08', 'Papayan', 'Jatiwaras', 'Kab. Tasikmalaya', '085861026284', 'Nunung Nugraha', 'Wirausaha', '081280558154', 'KOMPETEN', 'KOMPETEN', '', '', 'SMAN 1 JATIWARAS', 'MANAJEMEN PEMASARAN', 'Magang', 'KKI', '', '', 2020, 0, ''),
('202005029', 'Rizki Awaludin', 16, 'MANAJEMEN PEMASARAN', 'MP01ADM', '', '2.84', '', '', 'TASIKMALAYA, LUAR KOTA TASIKMALAYA', 'L', 'Ciamis', '2001-09-26', 21, 'Dusun Cipakeleran Rt 04 Rw', 'Cintanagara', 'Jatinagara', 'Ciamis', '085213898379', 'Eem', 'ART', '085871446689', 'KOMPETEN', 'KOMPETEN', '', '', 'SMKN 1 KAWALI', 'OTOMATISASI DAN TATA KELOLA PERKANTORAN', 'Magang', 'KKI', '', '', 2020, 0, ''),
('202005030', 'Ruli', 16, 'MANAJEMEN PEMASARAN', 'MP01ADM', '', '2.78', '', '', 'TASIKMALAYA, LUAR KOTA TASIKMALAYA', 'L', 'Tasikmalaya ', '2001-04-02', 21, 'Kp Sukahening Rt 02- Rw 02', 'CIGANTANG ', 'MANGKUBUMI ', 'KOTA TASIKMALAYA ', '085730484341', 'Alek', 'Wiraswasta ', NULL, 'KOMPETEN', 'KOMPETEN', '', '', 'SMAN 8 TASIKMALAYA ', 'IPA', 'Kerja', 'Kerja', 'CNP', 'CNP', 2020, 0, ''),
('202005032', 'Siska Oktapiani', 14, 'MANAJEMEN PEMASARAN', 'MP01RM', '', '2.88', '', '', 'TASIKMALAYA, LUAR KOTA TASIKMALAYA', 'P', 'Tasikmalaya ', '2001-10-07', 21, 'Kp Cikalamas lebak RT 01 RW 02', 'Karikil ', 'Mangkubumi ', 'Kota Tasikmalaya ', '', 'Yaya hudaya', 'Wiraswasta ', '085867444864', 'KOMPETEN', 'KOMPETEN', '', '', 'MA AL - AMIN TANJUNG KAWALU ', 'Manajemen pemasaran ', 'Magang', 'KKI', '', '', 2020, 0, ''),
('202005039', 'Wulan Purnamasari', 16, 'MANAJEMEN PEMASARAN', 'MP01ADM', '', '2.86', '', '', 'TASIKMALAYA, LUAR KOTA TASIKMALAYA', 'P', 'Tasikmalaya', '2001-05-08', 21, 'Kp.Jayamukti Rt/Rw 01/01, Kertarahayu', 'Des.Kertarahayu', 'Kec.Jatiwaras', 'Kab.Tasikmalaya', '087713909288', 'Asep Hidayatuloh', 'Buruh harian lepas ', '085215479799', 'KOMPETEN', 'KOMPETEN', '', '', 'Ma.Cilendek', 'IPA', 'Magang', 'KKI', '', '', 2020, 0, ''),
('202006003', 'Annisa Pebriyanti', 18, 'MANAJEMEN KEUANGAN DAN PERBANKAN', 'MKP01K', '', '3.37', '', '', 'TASIKMALAYA, LUAR KOTA TASIKMALAYA', 'P', 'Tasikmalaya ', '2002-02-01', 20, 'Jl. Limabelas Kp. Tarikolot RT 01 RW 04 ', 'Sukaherang', 'Singaparna', 'Tasikmalaya ', '087878026934', 'Cucu Yuliani', 'Ibu Rumah Tangga', '087834476913', 'KOMPETEN', 'KOMPETEN', '', '', 'SMK AS-SHOFA', 'AKUNTANSI KEUANGAN LEMBAGA', 'Magang', 'KKI', '', '', 2020, 0, ''),
('202006007', 'Dede Siti Laela', 18, 'MANAJEMEN KEUANGAN DAN PERBANKAN', 'MKP01K', '', '3.17', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', 'Kerja', 'Kerja', 'CNP', 'CNP', 2020, 0, ''),
('202006009', 'Karin Fitriyani', 18, 'MANAJEMEN KEUANGAN DAN PERBANKAN', 'MKP01K', '', '3.31', '', '', 'TASIKMALAYA, LUAR KOTA TASIKMALAYA', 'P', 'GARUT', '2001-12-19', 20, 'Kp Cigaru Rt 13-Rw 06', 'Karangmekar', 'Karangnunggal', 'Kab. Tasikmalaya', '083827678297', 'Karmita', 'Buruh', '085221895801', 'KOMPETEN', 'TIDAK KOMPETEN', '', '', 'SMAN 1 KARANGNUNGGAL', 'IPS', 'Magang', 'KKI', '', '', 2020, 0, ''),
('202006014', 'Lisda Tri Romdini', 18, 'MANAJEMEN KEUANGAN DAN PERBANKAN', 'MKP01K', '', '3.44', '', '', 'TASIKMALAYA, LUAR KOTA TASIKMALAYA', 'P', 'Tasikmalaya', '2001-12-06', 20, 'Kp. Borolong Rt 01 Rw 02, padakembang, Tasikmalaya', 'Cilampubghilir', 'Padakembang', 'KAB Tasikmalaya', '087735382258', 'Ida Parida', 'Pedagang', NULL, 'KOMPETEN', 'KOMPETEN', '', '', '', '', 'Kerja', 'Kerja', 'CNP', 'CNP', 2020, 0, ''),
('202006015', 'Lutfiah Nur Faizzatus Sholihah', 18, 'MANAJEMEN KEUANGAN DAN PERBANKAN', 'MKP01K', '', '3.45', '', '', 'TASIKMALAYA', 'P', 'Lamongan ', '2002-11-19', 20, 'Dusun Warung Wetan, Rt 01-Rw 01 ', 'Imbanagara ', 'Ciamis', 'Ciamis', '082140566625', 'Solik', 'Pedagang ', '082138359129', 'KOMPETEN', 'KOMPETEN', '', '', 'SMKN 1 CIAMIS', 'Akuntansi', 'Magang', 'KKI', '', '', 2020, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(10) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `type_perusahaan` varchar(15) DEFAULT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `kontak_person` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tingkat` varchar(20) NOT NULL,
  `sudah_mou` varchar(5) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `bukti_kerjasama` varchar(20) DEFAULT NULL,
  `sumber` varchar(20) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `relasi` varchar(5) DEFAULT 'Baru',
  `nama` varchar(50) NOT NULL,
  `bukti_followup` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `bidang`, `type_perusahaan`, `alamat`, `kota`, `email`, `fax`, `kode_pos`, `kontak_person`, `jabatan`, `no_telp`, `tingkat`, `sudah_mou`, `tanggal_mulai`, `tanggal_berakhir`, `bukti_kerjasama`, `sumber`, `ket`, `relasi`, `nama`, `bukti_followup`, `status`, `grade`) VALUES
(2051, 'CV. NZD GROUP', 'JASA', '', 'JL. SETIAJAYA, KEC. CIBEUREUM', 'TASIKMALAYA', '', '', '', 'IBU. IDA MAULIDA', 'HRD', '082216155544', '', 'Sudah', '2023-05-20', '0000-00-00', '', '', '', 'Lama', 'Bini', 'SUDAH', '', 'A'),
(2052, 'PT. INDOMARCO ADI PRIMA', 'DISTRIBUTOR', '', 'RUKO TFT - LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', 'TASIKMALAYA', '', '', '', 'PAK HENDI (GOGON)', 'HRD', '0853-1686-011', '', 'Belum', '0000-00-00', '0000-00-00', '', '', '', '', 'Bini', 'SUDAH', '', 'C'),
(2053, 'PR. MAKMUR TASIKMALAYA (ROTAMA)', 'DISTRIBUTOR', '', 'JL. PS. KIDUL NO.16A, MANONJAYA, KEC. MANONJAYA, KABUPATEN TASIKMALAYA, JAWA BARAT 46197', 'KAB.?TASIKMALAYA', '', '', '', 'Yana Suryawana', 'Manajer', '\'08192006871', '', 'Belum', '0000-00-00', '0000-00-00', '', '', '', 'Baru', 'Gina', 'SUDAH', '', 'B'),
(2054, 'PT. PUTRA NANJUNG JAYA', 'DISTRIBUTOR', '', 'SUKASETIA, KEC. CIHAURBEUTI, KABUPATEN CIAMIS, JAWA BARAT', 'KAB. CIAMIS', '', '', '', 'INDRIAN MAULIDAH', 'HRD', '08977225236', '', 'Belum', '0000-00-00', '0000-00-00', '', '', '', 'Lama', 'Gina', 'SUDAH', '', 'B'),
(2055, 'PT. KOMODO TEXTILE MILLS', 'TEXTILE', '', 'Jl. Raya Laswi No.134, Padamulya, Kec. Majalaya, Kabupaten Bandung, Jawa Barat 40392', 'Bandung', '', '', '', 'Niera Mia', 'HRD', '878-2333-4483', '', 'Sudah', '2023-05-21', '0000-00-00', '', '', '', 'Baru', 'Gina', 'SUDAH', '', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(10) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `prodi`) VALUES
(1, 'MANAJEMEN INFORMATIKA'),
(2, 'ADMINISTRASI BISNIS'),
(3, 'KOMPUTER AKUNTANSI'),
(4, 'TEKNIK OTOMOTIF'),
(5, 'MANAJEMEN PEMASARAN'),
(6, 'MANAJEMEN KEUANGAN DAN PERBANKAN');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id_target` int(10) NOT NULL,
  `tahun_akademik` varchar(10) DEFAULT NULL,
  `minggu1` int(5) DEFAULT NULL,
  `minggu2` int(5) DEFAULT NULL,
  `minggu3` int(5) DEFAULT NULL,
  `minggu4` int(5) DEFAULT NULL,
  `minggu5` int(5) DEFAULT NULL,
  `minggu6` int(5) DEFAULT NULL,
  `minggu7` int(5) DEFAULT NULL,
  `minggu8` int(5) DEFAULT NULL,
  `minggu9` int(5) DEFAULT NULL,
  `minggu10` int(5) DEFAULT NULL,
  `minggu11` int(5) DEFAULT NULL,
  `minggu12` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id_target`, `tahun_akademik`, `minggu1`, `minggu2`, `minggu3`, `minggu4`, `minggu5`, `minggu6`, `minggu7`, `minggu8`, `minggu9`, `minggu10`, `minggu11`, `minggu12`) VALUES
(1, '2022-2023', 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2021-2022', 20, 10, 10, 12, 12, 12, 14, 14, 14, 11, 11, 11);

-- --------------------------------------------------------

--
-- Table structure for table `telleseling`
--

CREATE TABLE `telleseling` (
  `id_telleseling` int(5) NOT NULL,
  `id_perusahaan` int(5) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `relasi` varchar(5) NOT NULL,
  `alamat` text NOT NULL,
  `kontak_person` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tanggal_fu` date DEFAULT NULL,
  `melalui` varchar(50) DEFAULT NULL,
  `hasil_fu` text DEFAULT NULL,
  `jumlah_hari` int(4) DEFAULT NULL,
  `penanda_fu` int(1) DEFAULT NULL,
  `tanggal_penanda_fu` date DEFAULT NULL,
  `jumlah_hari_penanda_fu` int(11) DEFAULT NULL,
  `oleh` varchar(30) NOT NULL,
  `jumlah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `telleseling`
--

INSERT INTO `telleseling` (`id_telleseling`, `id_perusahaan`, `nama_perusahaan`, `bidang`, `kota`, `relasi`, `alamat`, `kontak_person`, `jabatan`, `no_telp`, `tanggal_fu`, `melalui`, `hasil_fu`, `jumlah_hari`, `penanda_fu`, `tanggal_penanda_fu`, `jumlah_hari_penanda_fu`, `oleh`, `jumlah`) VALUES
(51, 2051, 'CV. NZD GROUP', 'JASA', 'TASIKMALAYA', 'Lama', 'JL. SETIAJAYA, KEC. CIBEUREUM', 'IBU. IDA MAULIDA', 'HRD', '082216155544', '2023-05-20', 'WhatsApp', 'LP3I MEMINTA INFORMASI LOWONGAN PEKERJAAN', 22, 1, '2023-05-31', 11, 'admin', '2023-05-27'),
(52, 2052, 'PT. INDOMARCO ADI PRIMA', 'DISTRIBUTOR', 'TASIKMALAYA', '', 'RUKO TFT - LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', 'PAK HENDI (GOGON)', 'HRD', '0853-1686-011', '0000-00-00', 'WhatsApp', 'LP3I MEMINTAINFORMASI  LOWONGAN PEKERJAAN', 0, NULL, NULL, 0, 'admin', '2023-05-27'),
(53, 2053, 'PR. MAKMUR TASIKMALAYA (ROTAMA)', 'DISTRIBUTOR', 'KAB.?TASIKMALAYA', 'Baru', 'JL. PS. KIDUL NO.16A, MANONJAYA, KEC. MANONJAYA, KABUPATEN TASIKMALAYA, JAWA BARAT 46197', 'Yana Suryawana', 'Manajer', '\'08192006871', '0000-00-00', 'WhatsApp', 'LP3I MEMINTA INFORMASI LOWONGAN PEKERJAAN', 0, NULL, NULL, 0, 'admin', '2023-05-27'),
(54, 2054, 'PT. PUTRA NANJUNG JAYA', 'DISTRIBUTOR', 'KAB. CIAMIS', 'Lama', 'SUKASETIA, KEC. CIHAURBEUTI, KABUPATEN CIAMIS, JAWA BARAT', 'INDRIAN MAULIDAH', 'HRD', '08977225236', '2023-05-23', 'WhatsApp', 'LP3I MEMINTA INFORMASI LOWONGAN KERJA', 19, NULL, NULL, 0, 'admin', '2023-05-27'),
(55, 2055, 'PT. KOMODO TEXTILE MILLS', 'TEXTILE', 'Bandung', 'Baru', 'Jl. Raya Laswi No.134, Padamulya, Kec. Majalaya, Kabupaten Bandung, Jawa Barat 40392', 'Niera Mia', 'HRD', '878-2333-4483', '0000-00-00', 'WhatsApp', 'LP3I MEMINTA INFORMASI LOWONGAN KERJ', 0, 1, '2023-05-27', 15, 'admin', '2023-05-27'),
(56, 2051, 'CV. NZD GROUP', 'JASA', 'TASIKMALAYA', 'Lama', 'JL. SETIAJAYA, KEC. CIBEUREUM', 'IBU. IDA MAULIDA', 'HRD', '082216155544', '2023-05-31', 'Telepon', 'AKUU REVISI', 11, 1, '2023-05-31', 11, 'Nabila Azzahra', '2023-05-31'),
(57, 2051, 'CV. NZD GROUP', 'JASA', 'TASIKMALAYA', 'Lama', 'JL. SETIAJAYA, KEC. CIBEUREUM', 'IBU. IDA MAULIDA', 'HRD', '082216155544', '2023-05-30', 'WhatsApp', 'REVISI LAGIiiiiiii', 12, NULL, NULL, 0, 'Nabila Azzahra', '2023-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int(5) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `alamat_usaha` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `omset` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usaha`
--

INSERT INTO `usaha` (`id_usaha`, `nama_usaha`, `alamat_usaha`, `tanggal_mulai`, `nim`, `nama_mhs`, `omset`) VALUES
(2, 'alat tulis', 'BANJAR', '2022-10-31', 202002089, 'jufar', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `akses` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `akses`) VALUES
('admin', 'admin', 'Nabila Azzahra', 'Master'),
('Bini', 'Bini', 'Bini', 'User_Satu'),
('Gina', 'coba', 'coba a', 'User_Dua');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_akumulasi`
-- (See below for the actual view)
--
CREATE TABLE `vw_akumulasi` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`kerja` bigint(21)
,`berwirausaha` bigint(21)
,`bermasalah` bigint(21)
,`gugur` bigint(21)
,`cnp` bigint(21)
,`sendiri` bigint(21)
,`jml` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_akumulasi_keatas`
-- (See below for the actual view)
--
CREATE TABLE `vw_akumulasi_keatas` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`jml` bigint(21)
,`gugur` bigint(21)
,`bermasalah` bigint(21)
,`jumlah_ipk` bigint(21)
,`ojt` bigint(21)
,`kki` bigint(21)
,`msib` bigint(21)
,`pmmb` bigint(21)
,`kerja` bigint(21)
,`berwirausaha` bigint(21)
,`cnp` bigint(21)
,`sendiri` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_bermasalah`
-- (See below for the actual view)
--
CREATE TABLE `vw_bermasalah` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`bermasalah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_berwirausaha`
-- (See below for the actual view)
--
CREATE TABLE `vw_berwirausaha` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`berwirausaha` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_blm_kerja_akumulasi`
-- (See below for the actual view)
--
CREATE TABLE `vw_blm_kerja_akumulasi` (
`prodi` varchar(50)
,`jumlah_belum_kerja` bigint(21)
,`tahun_akademik` int(5)
,`jml` bigint(21)
,`gugur` bigint(21)
,`bermasalah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_cnp`
-- (See below for the actual view)
--
CREATE TABLE `vw_cnp` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`cnp` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_grafik`
-- (See below for the actual view)
--
CREATE TABLE `vw_grafik` (
`bulan` int(2)
,`tahun` int(4)
,`oktober` bigint(21)
,`jml` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_gugur`
-- (See below for the actual view)
--
CREATE TABLE `vw_gugur` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`gugur` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_induk`
-- (See below for the actual view)
--
CREATE TABLE `vw_induk` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`status_penempatan` varchar(15)
,`ket_penempatan` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_ipk_wajib`
-- (See below for the actual view)
--
CREATE TABLE `vw_ipk_wajib` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`jumlah_ipk` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_jml`
-- (See below for the actual view)
--
CREATE TABLE `vw_jml` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`jml` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_jumlah_belum_kerja`
-- (See below for the actual view)
--
CREATE TABLE `vw_jumlah_belum_kerja` (
`prodi` varchar(50)
,`jumlah_belum_kerja` bigint(21)
,`tahun_akademik` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_jumlah_kandidat`
-- (See below for the actual view)
--
CREATE TABLE `vw_jumlah_kandidat` (
`id_permintaan` varchar(14)
,`jumlah` bigint(21)
,`bulan` int(2)
,`tahun` date
,`hasil` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_kerja`
-- (See below for the actual view)
--
CREATE TABLE `vw_kerja` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`kerja` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_kerja_penerima_lulusan`
-- (See below for the actual view)
--
CREATE TABLE `vw_kerja_penerima_lulusan` (
`id_permintaan` varchar(14)
,`id_perusahaan` int(5)
,`nama_perusahaan` varchar(100)
,`kota` varchar(25)
,`tingkat` varchar(20)
,`nama_mhs` varchar(50)
,`kerja` varchar(15)
,`tgl_hasil` date
,`Tanggal MOU` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_kki`
-- (See below for the actual view)
--
CREATE TABLE `vw_kki` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`kki` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_kki_penerima_lulusan`
-- (See below for the actual view)
--
CREATE TABLE `vw_kki_penerima_lulusan` (
`id_permintaan` varchar(14)
,`id_perusahaan` int(5)
,`nama_perusahaan` varchar(100)
,`kota` varchar(25)
,`tingkat` varchar(20)
,`nama_mhs` varchar(50)
,`kki` varchar(15)
,`tgl_hasil` date
,`Tanggal MOU` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_lolos_grafik`
-- (See below for the actual view)
--
CREATE TABLE `vw_lolos_grafik` (
`id_permintaan` varchar(14)
,`bulan` int(2)
,`tahun` int(4)
,`hasil` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_lolos_grafik_tahun`
-- (See below for the actual view)
--
CREATE TABLE `vw_lolos_grafik_tahun` (
`id_permintaan` varchar(14)
,`bulan` int(2)
,`tahun` date
,`hasil` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_mahasiswa`
-- (See below for the actual view)
--
CREATE TABLE `vw_mahasiswa` (
`id_permintaan` varchar(14)
,`id_perusahaan` int(5)
,`nama_perusahaan` varchar(100)
,`kota` varchar(25)
,`tingkat` varchar(20)
,`nim` varchar(30)
,`nama_mhs` varchar(50)
,`kelas` varchar(10)
,`prodi` varchar(50)
,`asal_sekolah` varchar(50)
,`tahun_akademik` int(5)
,`status` varchar(15)
,`tgl_hasil` date
,`Tanggal MOU` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_mhs_semua`
-- (See below for the actual view)
--
CREATE TABLE `vw_mhs_semua` (
`id_permintaan` varchar(14)
,`nim` varchar(30)
,`nama_perusahaan` varchar(100)
,`nama_mhs` varchar(50)
,`status` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_msib`
-- (See below for the actual view)
--
CREATE TABLE `vw_msib` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`msib` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_nov`
-- (See below for the actual view)
--
CREATE TABLE `vw_nov` (
`tahun` int(4)
,`bulan` int(2)
,`jml` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_ojt`
-- (See below for the actual view)
--
CREATE TABLE `vw_ojt` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`ojt` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_okto`
-- (See below for the actual view)
--
CREATE TABLE `vw_okto` (
`tahun` int(4)
,`bulan` int(2)
,`oktober` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_penerima_lulusan`
-- (See below for the actual view)
--
CREATE TABLE `vw_penerima_lulusan` (
`id_permintaan` varchar(14)
,`id_perusahaan` int(5)
,`nama_perusahaan` varchar(100)
,`kota` varchar(25)
,`tingkat` varchar(20)
,`nama_mhs` varchar(50)
,`status` varchar(15)
,`tgl_hasil` date
,`Tanggal MOU` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_permintaan`
-- (See below for the actual view)
--
CREATE TABLE `vw_permintaan` (
`jumlah` bigint(21)
,`id_permintaan` varchar(14)
,`nama_perusahaan` varchar(100)
,`posisi_yang_dibutuhkan` varchar(100)
,`waktu` datetime
,`kota` varchar(25)
,`oleh` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_permintaan_grafik`
-- (See below for the actual view)
--
CREATE TABLE `vw_permintaan_grafik` (
`id_permintaan` varchar(14)
,`bulan` int(2)
,`tahun` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_permintaan_grafik_tahun`
-- (See below for the actual view)
--
CREATE TABLE `vw_permintaan_grafik_tahun` (
`id_permintaan` varchar(14)
,`bulan` int(2)
,`tahun` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_pmmb`
-- (See below for the actual view)
--
CREATE TABLE `vw_pmmb` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`pmmb` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_presentase_penempatan`
-- (See below for the actual view)
--
CREATE TABLE `vw_presentase_penempatan` (
`jml_awal` decimal(42,0)
,`jml_gugur` decimal(42,0)
,`jml_bermasalah` decimal(42,0)
,`jml_ipk` decimal(42,0)
,`jumlah_kki` decimal(42,0)
,`jumlah_kerja` decimal(42,0)
,`jumlah_usaha` decimal(42,0)
,`tahun_akademik` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_prm`
-- (See below for the actual view)
--
CREATE TABLE `vw_prm` (
`id_permintaan` varchar(14)
,`nama_perusahaan` varchar(100)
,`posisi_yang_dibutuhkan` varchar(100)
,`waktu` datetime
,`kota` varchar(25)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sendiri`
-- (See below for the actual view)
--
CREATE TABLE `vw_sendiri` (
`prodi` varchar(50)
,`tahun_akademik` int(5)
,`sendiri` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_serapan`
-- (See below for the actual view)
--
CREATE TABLE `vw_serapan` (
`id_permintaan` varchar(14)
,`bidang` varchar(100)
,`tahun` int(4)
,`nim` varchar(30)
,`prodi` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_serapan_bidang`
-- (See below for the actual view)
--
CREATE TABLE `vw_serapan_bidang` (
`bidang` varchar(100)
,`tahun` int(4)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_serapan_induk`
-- (See below for the actual view)
--
CREATE TABLE `vw_serapan_induk` (
`id_permintaan` varchar(14)
,`bidang` varchar(100)
,`nim` varchar(30)
,`prodi` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_serapan_jml`
-- (See below for the actual view)
--
CREATE TABLE `vw_serapan_jml` (
`bidang` varchar(100)
,`prodi` varchar(50)
,`jml` bigint(21)
,`tahun` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_serapan_mhs`
-- (See below for the actual view)
--
CREATE TABLE `vw_serapan_mhs` (
`id_permintaan` varchar(14)
,`bidang` varchar(100)
,`nim` varchar(30)
,`prodi` varchar(50)
,`hasil` varchar(50)
,`tahun` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_serapan_mhs_jml`
-- (See below for the actual view)
--
CREATE TABLE `vw_serapan_mhs_jml` (
`bidang` varchar(100)
,`prodi` varchar(50)
,`jml` bigint(21)
,`tahun` int(4)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_akumulasi`
--
DROP TABLE IF EXISTS `vw_akumulasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_akumulasi`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, `vw_kerja`.`kerja` AS `kerja`, `vw_berwirausaha`.`berwirausaha` AS `berwirausaha`, `vw_bermasalah`.`bermasalah` AS `bermasalah`, `vw_gugur`.`gugur` AS `gugur`, `vw_cnp`.`cnp` AS `cnp`, `vw_sendiri`.`sendiri` AS `sendiri`, `vw_jml`.`jml` AS `jml` FROM (((((((`vw_induk` left join `vw_kerja` on(`vw_induk`.`prodi` = `vw_kerja`.`prodi` and `vw_kerja`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_berwirausaha` on(`vw_induk`.`prodi` = `vw_berwirausaha`.`prodi` and `vw_berwirausaha`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_bermasalah` on(`vw_induk`.`prodi` = `vw_bermasalah`.`prodi` and `vw_bermasalah`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_gugur` on(`vw_induk`.`prodi` = `vw_gugur`.`prodi` and `vw_gugur`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_cnp` on(`vw_induk`.`prodi` = `vw_cnp`.`prodi` and `vw_cnp`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_sendiri` on(`vw_induk`.`prodi` = `vw_sendiri`.`prodi` and `vw_sendiri`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_jml` on(`vw_induk`.`prodi` = `vw_jml`.`prodi` and `vw_jml`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_akumulasi_keatas`
--
DROP TABLE IF EXISTS `vw_akumulasi_keatas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_akumulasi_keatas`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, `vw_jml`.`jml` AS `jml`, `vw_gugur`.`gugur` AS `gugur`, `vw_bermasalah`.`bermasalah` AS `bermasalah`, `vw_ipk_wajib`.`jumlah_ipk` AS `jumlah_ipk`, `vw_ojt`.`ojt` AS `ojt`, `vw_kki`.`kki` AS `kki`, `vw_msib`.`msib` AS `msib`, `vw_pmmb`.`pmmb` AS `pmmb`, `vw_kerja`.`kerja` AS `kerja`, `vw_berwirausaha`.`berwirausaha` AS `berwirausaha`, `vw_cnp`.`cnp` AS `cnp`, `vw_sendiri`.`sendiri` AS `sendiri` FROM ((((((((((((`vw_induk` left join `vw_jml` on(`vw_induk`.`prodi` = `vw_jml`.`prodi` and `vw_jml`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_gugur` on(`vw_induk`.`prodi` = `vw_gugur`.`prodi` and `vw_gugur`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_bermasalah` on(`vw_induk`.`prodi` = `vw_bermasalah`.`prodi` and `vw_bermasalah`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_ipk_wajib` on(`vw_induk`.`prodi` = `vw_ipk_wajib`.`prodi` and `vw_ipk_wajib`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_ojt` on(`vw_induk`.`prodi` = `vw_ojt`.`prodi` and `vw_ojt`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_kki` on(`vw_induk`.`prodi` = `vw_kki`.`prodi` and `vw_kki`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_msib` on(`vw_induk`.`prodi` = `vw_msib`.`prodi` and `vw_msib`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_pmmb` on(`vw_induk`.`prodi` = `vw_pmmb`.`prodi` and `vw_pmmb`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_kerja` on(`vw_induk`.`prodi` = `vw_kerja`.`prodi` and `vw_kerja`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_berwirausaha` on(`vw_induk`.`prodi` = `vw_berwirausaha`.`prodi` and `vw_berwirausaha`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_cnp` on(`vw_induk`.`prodi` = `vw_cnp`.`prodi` and `vw_cnp`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_sendiri` on(`vw_induk`.`prodi` = `vw_sendiri`.`prodi` and `vw_sendiri`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_bermasalah`
--
DROP TABLE IF EXISTS `vw_bermasalah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_bermasalah`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`status_penempatan`) AS `bermasalah` FROM `vw_induk` WHERE `vw_induk`.`status_penempatan` = 'Bermasalah' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_berwirausaha`
--
DROP TABLE IF EXISTS `vw_berwirausaha`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_berwirausaha`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`status_penempatan`) AS `berwirausaha` FROM `vw_induk` WHERE `vw_induk`.`status_penempatan` = 'Berwirausaha' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_blm_kerja_akumulasi`
--
DROP TABLE IF EXISTS `vw_blm_kerja_akumulasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_blm_kerja_akumulasi`  AS SELECT `vw_jumlah_belum_kerja`.`prodi` AS `prodi`, `vw_jumlah_belum_kerja`.`jumlah_belum_kerja` AS `jumlah_belum_kerja`, `vw_jumlah_belum_kerja`.`tahun_akademik` AS `tahun_akademik`, `vw_akumulasi_keatas`.`jml` AS `jml`, `vw_akumulasi_keatas`.`gugur` AS `gugur`, `vw_akumulasi_keatas`.`bermasalah` AS `bermasalah` FROM (`vw_jumlah_belum_kerja` left join `vw_akumulasi_keatas` on(`vw_jumlah_belum_kerja`.`prodi` = `vw_akumulasi_keatas`.`prodi` and `vw_akumulasi_keatas`.`tahun_akademik` = `vw_jumlah_belum_kerja`.`tahun_akademik`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_cnp`
--
DROP TABLE IF EXISTS `vw_cnp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cnp`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`ket_penempatan`) AS `cnp` FROM `vw_induk` WHERE `vw_induk`.`ket_penempatan` = 'CNP' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_grafik`
--
DROP TABLE IF EXISTS `vw_grafik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_grafik`  AS SELECT `vw_permintaan_grafik`.`bulan` AS `bulan`, `vw_permintaan_grafik`.`tahun` AS `tahun`, `vw_okto`.`oktober` AS `oktober`, `vw_nov`.`jml` AS `jml` FROM ((`vw_permintaan_grafik` left join `vw_okto` on(`vw_permintaan_grafik`.`bulan` = `vw_okto`.`bulan` and `vw_okto`.`tahun` = `vw_permintaan_grafik`.`tahun`)) left join `vw_nov` on(`vw_permintaan_grafik`.`bulan` = `vw_nov`.`bulan` and `vw_nov`.`tahun` = `vw_permintaan_grafik`.`tahun`)) GROUP BY `vw_permintaan_grafik`.`bulan`, `vw_permintaan_grafik`.`tahun``tahun`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_gugur`
--
DROP TABLE IF EXISTS `vw_gugur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_gugur`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`status_penempatan`) AS `gugur` FROM `vw_induk` WHERE `vw_induk`.`status_penempatan` = 'Gugur' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_induk`
--
DROP TABLE IF EXISTS `vw_induk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_induk`  AS SELECT `mahasiswa`.`prodi` AS `prodi`, `mahasiswa`.`tahun_akademik` AS `tahun_akademik`, `mahasiswa`.`status_penempatan` AS `status_penempatan`, `mahasiswa`.`ket_penempatan` AS `ket_penempatan` FROM `mahasiswa``mahasiswa`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_ipk_wajib`
--
DROP TABLE IF EXISTS `vw_ipk_wajib`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ipk_wajib`  AS SELECT `mahasiswa`.`prodi` AS `prodi`, `mahasiswa`.`tahun_akademik` AS `tahun_akademik`, count(`mahasiswa`.`ipk`) AS `jumlah_ipk` FROM `mahasiswa` WHERE `mahasiswa`.`ipk` >= 3.00 AND `mahasiswa`.`status_penempatan` <> 'Gugur' AND `mahasiswa`.`status_penempatan` <> 'Bermasalah' GROUP BY `mahasiswa`.`prodi`, `mahasiswa`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_jml`
--
DROP TABLE IF EXISTS `vw_jml`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_jml`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`prodi`) AS `jml` FROM `vw_induk` GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_jumlah_belum_kerja`
--
DROP TABLE IF EXISTS `vw_jumlah_belum_kerja`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_jumlah_belum_kerja`  AS SELECT `vw_induk`.`prodi` AS `prodi`, count(`vw_induk`.`prodi`) AS `jumlah_belum_kerja`, `vw_induk`.`tahun_akademik` AS `tahun_akademik` FROM `vw_induk` WHERE `vw_induk`.`status_penempatan` <> 'Kerja' AND `vw_induk`.`status_penempatan` <> 'Gugur' AND `vw_induk`.`status_penempatan` <> 'Bermasalah' AND `vw_induk`.`status_penempatan` <> 'Berwirausaha' AND `vw_induk`.`status_penempatan` <> 'Belum' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_jumlah_kandidat`
--
DROP TABLE IF EXISTS `vw_jumlah_kandidat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_jumlah_kandidat`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, count(`ht_permintaan`.`id_permintaan`) AS `jumlah`, month(`ht_permintaan`.`id_permintaan`) AS `bulan`, cast(`ht_permintaan`.`waktu` as date) AS `tahun`, `dt_permintaan`.`hasil` AS `hasil` FROM (`dt_permintaan` left join `ht_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`)) GROUP BY `ht_permintaan`.`id_permintaan``id_permintaan`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_kerja`
--
DROP TABLE IF EXISTS `vw_kerja`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_kerja`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`status_penempatan`) AS `kerja` FROM `vw_induk` WHERE `vw_induk`.`status_penempatan` = 'Kerja' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_kerja_penerima_lulusan`
--
DROP TABLE IF EXISTS `vw_kerja_penerima_lulusan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_kerja_penerima_lulusan`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `ht_permintaan`.`id_perusahaan` AS `id_perusahaan`, `ht_permintaan`.`nama_perusahaan` AS `nama_perusahaan`, `ht_permintaan`.`kota` AS `kota`, `perusahaan`.`tingkat` AS `tingkat`, `dt_permintaan`.`nama_mhs` AS `nama_mhs`, `dt_permintaan`.`status` AS `kerja`, `dt_permintaan`.`tgl_hasil` AS `tgl_hasil`, `perusahaan`.`tanggal_mulai` AS `Tanggal MOU` FROM ((`ht_permintaan` left join `dt_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`)) left join `perusahaan` on(`ht_permintaan`.`id_perusahaan` = `perusahaan`.`id_perusahaan`)) WHERE `dt_permintaan`.`status` = 'Kerja''Kerja'  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_kki`
--
DROP TABLE IF EXISTS `vw_kki`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_kki`  AS SELECT `mahasiswa`.`prodi` AS `prodi`, `mahasiswa`.`tahun_akademik` AS `tahun_akademik`, count(`mahasiswa`.`status_detail`) AS `kki` FROM `mahasiswa` WHERE `mahasiswa`.`status_detail` = 'KKI' GROUP BY `mahasiswa`.`prodi`, `mahasiswa`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_kki_penerima_lulusan`
--
DROP TABLE IF EXISTS `vw_kki_penerima_lulusan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_kki_penerima_lulusan`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `ht_permintaan`.`id_perusahaan` AS `id_perusahaan`, `ht_permintaan`.`nama_perusahaan` AS `nama_perusahaan`, `ht_permintaan`.`kota` AS `kota`, `perusahaan`.`tingkat` AS `tingkat`, `dt_permintaan`.`nama_mhs` AS `nama_mhs`, `dt_permintaan`.`status` AS `kki`, `dt_permintaan`.`tgl_hasil` AS `tgl_hasil`, `perusahaan`.`tanggal_mulai` AS `Tanggal MOU` FROM ((`ht_permintaan` left join `dt_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`)) left join `perusahaan` on(`ht_permintaan`.`id_perusahaan` = `perusahaan`.`id_perusahaan`)) WHERE `dt_permintaan`.`status` = 'KKI''KKI'  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_lolos_grafik`
--
DROP TABLE IF EXISTS `vw_lolos_grafik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_lolos_grafik`  AS SELECT `dt_permintaan`.`id_permintaan` AS `id_permintaan`, month(`dt_permintaan`.`tgl_hasil`) AS `bulan`, year(`dt_permintaan`.`tgl_hasil`) AS `tahun`, `dt_permintaan`.`hasil` AS `hasil` FROM `dt_permintaan``dt_permintaan`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_lolos_grafik_tahun`
--
DROP TABLE IF EXISTS `vw_lolos_grafik_tahun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_lolos_grafik_tahun`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, month(`ht_permintaan`.`id_permintaan`) AS `bulan`, cast(`ht_permintaan`.`waktu` as date) AS `tahun`, `dt_permintaan`.`hasil` AS `hasil` FROM (`dt_permintaan` left join `ht_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_mahasiswa`
--
DROP TABLE IF EXISTS `vw_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_mahasiswa`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `ht_permintaan`.`id_perusahaan` AS `id_perusahaan`, `ht_permintaan`.`nama_perusahaan` AS `nama_perusahaan`, `ht_permintaan`.`kota` AS `kota`, `perusahaan`.`tingkat` AS `tingkat`, `dt_permintaan`.`nim` AS `nim`, `dt_permintaan`.`nama_mhs` AS `nama_mhs`, `dt_permintaan`.`kelas` AS `kelas`, `dt_permintaan`.`prodi` AS `prodi`, `dt_permintaan`.`asal_sekolah` AS `asal_sekolah`, `dt_permintaan`.`tahun_akademik` AS `tahun_akademik`, `dt_permintaan`.`status` AS `status`, `dt_permintaan`.`tgl_hasil` AS `tgl_hasil`, `perusahaan`.`tanggal_mulai` AS `Tanggal MOU` FROM ((`ht_permintaan` left join `dt_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`)) left join `perusahaan` on(`ht_permintaan`.`id_perusahaan` = `perusahaan`.`id_perusahaan`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_mhs_semua`
--
DROP TABLE IF EXISTS `vw_mhs_semua`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_mhs_semua`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `dt_permintaan`.`nim` AS `nim`, `ht_permintaan`.`nama_perusahaan` AS `nama_perusahaan`, `dt_permintaan`.`nama_mhs` AS `nama_mhs`, `dt_permintaan`.`status` AS `status` FROM (`ht_permintaan` left join `dt_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_msib`
--
DROP TABLE IF EXISTS `vw_msib`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_msib`  AS SELECT `mahasiswa`.`prodi` AS `prodi`, `mahasiswa`.`tahun_akademik` AS `tahun_akademik`, count(`mahasiswa`.`status_detail`) AS `msib` FROM `mahasiswa` WHERE `mahasiswa`.`status_detail` = 'MSIB' GROUP BY `mahasiswa`.`prodi`, `mahasiswa`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_nov`
--
DROP TABLE IF EXISTS `vw_nov`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_nov`  AS SELECT `vw_permintaan_grafik`.`tahun` AS `tahun`, `vw_permintaan_grafik`.`bulan` AS `bulan`, count(`vw_permintaan_grafik`.`bulan`) AS `jml` FROM `vw_permintaan_grafik` WHERE `vw_permintaan_grafik`.`bulan` = '11' ORDER BY `vw_permintaan_grafik`.`tahun` ASC, `vw_permintaan_grafik`.`bulan` ASC, `vw_permintaan_grafik`.`id_permintaan` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_ojt`
--
DROP TABLE IF EXISTS `vw_ojt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ojt`  AS SELECT `mahasiswa`.`prodi` AS `prodi`, `mahasiswa`.`tahun_akademik` AS `tahun_akademik`, count(`mahasiswa`.`status_detail`) AS `ojt` FROM `mahasiswa` WHERE `mahasiswa`.`status_detail` = 'OJT' GROUP BY `mahasiswa`.`prodi`, `mahasiswa`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_okto`
--
DROP TABLE IF EXISTS `vw_okto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_okto`  AS SELECT `vw_permintaan_grafik`.`tahun` AS `tahun`, `vw_permintaan_grafik`.`bulan` AS `bulan`, count(`vw_permintaan_grafik`.`bulan`) AS `oktober` FROM `vw_permintaan_grafik` WHERE `vw_permintaan_grafik`.`bulan` = '10' ORDER BY `vw_permintaan_grafik`.`tahun` ASC, `vw_permintaan_grafik`.`bulan` ASC, `vw_permintaan_grafik`.`id_permintaan` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_penerima_lulusan`
--
DROP TABLE IF EXISTS `vw_penerima_lulusan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_penerima_lulusan`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `ht_permintaan`.`id_perusahaan` AS `id_perusahaan`, `ht_permintaan`.`nama_perusahaan` AS `nama_perusahaan`, `ht_permintaan`.`kota` AS `kota`, `perusahaan`.`tingkat` AS `tingkat`, `dt_permintaan`.`nama_mhs` AS `nama_mhs`, `dt_permintaan`.`status` AS `status`, `dt_permintaan`.`tgl_hasil` AS `tgl_hasil`, `perusahaan`.`tanggal_mulai` AS `Tanggal MOU` FROM ((`ht_permintaan` left join `dt_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`)) left join `perusahaan` on(`ht_permintaan`.`id_perusahaan` = `perusahaan`.`id_perusahaan`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_permintaan`
--
DROP TABLE IF EXISTS `vw_permintaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_permintaan`  AS SELECT count(`dt_permintaan`.`id_permintaan`) AS `jumlah`, `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `ht_permintaan`.`nama_perusahaan` AS `nama_perusahaan`, `ht_permintaan`.`posisi_yang_dibutuhkan` AS `posisi_yang_dibutuhkan`, `ht_permintaan`.`waktu` AS `waktu`, `ht_permintaan`.`kota` AS `kota`, `ht_permintaan`.`oleh` AS `oleh` FROM (`dt_permintaan` left join `ht_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`)) GROUP BY `ht_permintaan`.`id_permintaan``id_permintaan`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_permintaan_grafik`
--
DROP TABLE IF EXISTS `vw_permintaan_grafik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_permintaan_grafik`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, month(`ht_permintaan`.`waktu`) AS `bulan`, year(`ht_permintaan`.`waktu`) AS `tahun` FROM `ht_permintaan``ht_permintaan`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_permintaan_grafik_tahun`
--
DROP TABLE IF EXISTS `vw_permintaan_grafik_tahun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_permintaan_grafik_tahun`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, month(`ht_permintaan`.`id_permintaan`) AS `bulan`, cast(`ht_permintaan`.`waktu` as date) AS `tahun` FROM (`dt_permintaan` left join `ht_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_pmmb`
--
DROP TABLE IF EXISTS `vw_pmmb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pmmb`  AS SELECT `mahasiswa`.`prodi` AS `prodi`, `mahasiswa`.`tahun_akademik` AS `tahun_akademik`, count(`mahasiswa`.`status_detail`) AS `pmmb` FROM `mahasiswa` WHERE `mahasiswa`.`status_detail` = 'PMMB' GROUP BY `mahasiswa`.`prodi`, `mahasiswa`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_presentase_penempatan`
--
DROP TABLE IF EXISTS `vw_presentase_penempatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_presentase_penempatan`  AS SELECT sum(`vw_akumulasi_keatas`.`jml`) AS `jml_awal`, sum(`vw_akumulasi_keatas`.`gugur`) AS `jml_gugur`, sum(`vw_akumulasi_keatas`.`bermasalah`) AS `jml_bermasalah`, sum(`vw_akumulasi_keatas`.`jumlah_ipk`) AS `jml_ipk`, sum(`vw_akumulasi_keatas`.`kki`) AS `jumlah_kki`, sum(`vw_akumulasi_keatas`.`kerja`) AS `jumlah_kerja`, sum(`vw_akumulasi_keatas`.`berwirausaha`) AS `jumlah_usaha`, `vw_akumulasi_keatas`.`tahun_akademik` AS `tahun_akademik` FROM `vw_akumulasi_keatas` GROUP BY `vw_akumulasi_keatas`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_prm`
--
DROP TABLE IF EXISTS `vw_prm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_prm`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `ht_permintaan`.`nama_perusahaan` AS `nama_perusahaan`, `ht_permintaan`.`posisi_yang_dibutuhkan` AS `posisi_yang_dibutuhkan`, `ht_permintaan`.`waktu` AS `waktu`, `ht_permintaan`.`kota` AS `kota`, count(`dt_permintaan`.`id_permintaan`) AS `jumlah` FROM (`ht_permintaan` left join `dt_permintaan` on(`dt_permintaan`.`id_permintaan` = `ht_permintaan`.`id_permintaan`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sendiri`
--
DROP TABLE IF EXISTS `vw_sendiri`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_sendiri`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`ket_penempatan`) AS `sendiri` FROM `vw_induk` WHERE `vw_induk`.`ket_penempatan` = 'Sendiri' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_serapan`
--
DROP TABLE IF EXISTS `vw_serapan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_serapan`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `ht_permintaan`.`bidang` AS `bidang`, year(`ht_permintaan`.`waktu`) AS `tahun`, `dt_permintaan`.`nim` AS `nim`, `dt_permintaan`.`prodi` AS `prodi` FROM (`dt_permintaan` left join `ht_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`)) ORDER BY `dt_permintaan`.`prodi` ASC, `ht_permintaan`.`bidang` ASC, `ht_permintaan`.`waktu` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_serapan_bidang`
--
DROP TABLE IF EXISTS `vw_serapan_bidang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_serapan_bidang`  AS SELECT `ht_permintaan`.`bidang` AS `bidang`, year(`ht_permintaan`.`waktu`) AS `tahun`, count(`ht_permintaan`.`bidang`) AS `jumlah` FROM (`dt_permintaan` left join `ht_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`)) GROUP BY `ht_permintaan`.`bidang`, year(`ht_permintaan`.`waktu`)  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_serapan_induk`
--
DROP TABLE IF EXISTS `vw_serapan_induk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_serapan_induk`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `ht_permintaan`.`bidang` AS `bidang`, `dt_permintaan`.`nim` AS `nim`, `dt_permintaan`.`prodi` AS `prodi` FROM (`dt_permintaan` left join `ht_permintaan` on(`dt_permintaan`.`id_permintaan` = `ht_permintaan`.`id_permintaan`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_serapan_jml`
--
DROP TABLE IF EXISTS `vw_serapan_jml`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_serapan_jml`  AS SELECT `vw_serapan`.`bidang` AS `bidang`, `vw_serapan`.`prodi` AS `prodi`, count(`vw_serapan`.`prodi`) AS `jml`, `vw_serapan`.`tahun` AS `tahun` FROM `vw_serapan` GROUP BY `vw_serapan`.`bidang`, `vw_serapan`.`prodi`, `vw_serapan`.`tahun``tahun`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_serapan_mhs`
--
DROP TABLE IF EXISTS `vw_serapan_mhs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_serapan_mhs`  AS SELECT `ht_permintaan`.`id_permintaan` AS `id_permintaan`, `ht_permintaan`.`bidang` AS `bidang`, `dt_permintaan`.`nim` AS `nim`, `dt_permintaan`.`prodi` AS `prodi`, `dt_permintaan`.`hasil` AS `hasil`, year(`ht_permintaan`.`waktu`) AS `tahun` FROM (`dt_permintaan` left join `ht_permintaan` on(`ht_permintaan`.`id_permintaan` = `dt_permintaan`.`id_permintaan`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_serapan_mhs_jml`
--
DROP TABLE IF EXISTS `vw_serapan_mhs_jml`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_serapan_mhs_jml`  AS SELECT `vw_serapan_mhs`.`bidang` AS `bidang`, `vw_serapan_mhs`.`prodi` AS `prodi`, count(`vw_serapan_mhs`.`prodi`) AS `jml`, `vw_serapan_mhs`.`tahun` AS `tahun` FROM `vw_serapan_mhs` WHERE `vw_serapan_mhs`.`hasil` = 'Lolos Test' GROUP BY `vw_serapan_mhs`.`bidang`, `vw_serapan_mhs`.`prodi`, `vw_serapan_mhs`.`tahun``tahun`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `breakdown`
--
ALTER TABLE `breakdown`
  ADD PRIMARY KEY (`id_breakdown`);

--
-- Indexes for table `ht_permintaan`
--
ALTER TABLE `ht_permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id_target`);

--
-- Indexes for table `telleseling`
--
ALTER TABLE `telleseling`
  ADD PRIMARY KEY (`id_telleseling`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breakdown`
--
ALTER TABLE `breakdown`
  MODIFY `id_breakdown` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2327;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id_target` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `telleseling`
--
ALTER TABLE `telleseling`
  MODIFY `id_telleseling` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
