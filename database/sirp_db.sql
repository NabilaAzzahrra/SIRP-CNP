-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 08:05 AM
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
-- Table structure for table `dt_permintaan`
--

CREATE TABLE `dt_permintaan` (
  `id_permintaan` varchar(14) NOT NULL,
  `nim` int(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `qty` int(1) NOT NULL,
  `hasil` varchar(50) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dt_permintaan`
--

INSERT INTO `dt_permintaan` (`id_permintaan`, `nim`, `nama_mhs`, `kelas`, `prodi`, `asal_sekolah`, `qty`, `hasil`, `status`, `ket`) VALUES
('20221011052510', 202002009, 'nyoba', 'MKP01A', 'Manajemen Keuangan Perbankan', 'SMAN 3 Tasikmalaya', 1, NULL, NULL, NULL),
('20221011052623', 202002009, 'nyoba', 'MKP01A', 'Manajemen Keuangan Perbankan', 'SMAN 3 Tasikmalaya', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(5) NOT NULL,
  `id_telleseling` int(5) NOT NULL,
  `id_perusahaan` int(5) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `relasi` varchar(5) NOT NULL,
  `alamat` text NOT NULL,
  `kontak_person` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tanggal_feedback` date NOT NULL,
  `hasil_feedback` varchar(100) NOT NULL,
  `melalui` varchar(25) NOT NULL,
  `oleh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_telleseling`, `id_perusahaan`, `nama_perusahaan`, `bidang`, `relasi`, `alamat`, `kontak_person`, `jabatan`, `no_telp`, `tanggal_feedback`, `hasil_feedback`, `melalui`, `oleh`) VALUES
(1, 29, 23, 'PT. MATEL INDONESIA', '', '', '', '', '', '', '0000-00-00', '', '', NULL),
(2, 30, 22, 'BFI FINANCE', '', '', '', '', '', '', '2022-10-07', 'sudah', '', 'Nabila Azzahra'),
(3, 31, 22, 'BFI FINANCE', '', '', '', '', '', '', '2022-10-07', 'oke siap', 'Email', 'Nabila Azzahra');

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
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `posisi_yang_dibutuhkan` varchar(100) NOT NULL,
  `jml_mhs` int(3) NOT NULL,
  `oleh` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ht_permintaan`
--

INSERT INTO `ht_permintaan` (`id_permintaan`, `id_perusahaan`, `nama_perusahaan`, `bidang`, `relasi`, `alamat`, `kota`, `kontak_person`, `no_telp`, `waktu`, `posisi_yang_dibutuhkan`, `jml_mhs`, `oleh`) VALUES
('20221011052510', 25, 'PT. CEMACO MAKMUR CORPORATAMA (HINO CEMACO)Z', '', 'Lama', 'WISMA INDOMOBIL 1, JL. MT. HARYONO KAV.8, JAKARTA 13330, INDONESIA', 'JAKARTA', '', '08881050447', '2022-10-11 10:25:10', 'programmer', 1, 'cb'),
('20221011052623', 22, 'BFI FINANCE', 'Teknologi', 'Baru', 'JL. KAUM KALER, MANONJAYA, KEC. MANONJAYA', 'KAB. TASIK', 'Jaka Bagja', '82218965494', '2022-10-11 10:26:23', 'programmer', 1, 'cb');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_perusahaan` int(5) DEFAULT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `posisi` varchar(25) DEFAULT NULL,
  `gaji` float DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `nama_usaha` varchar(100) DEFAULT NULL,
  `alamat_usaha` text DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `tahun_akademik` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `prodi`, `kelas`, `asal_sekolah`, `no_hp`, `status`, `id_perusahaan`, `nama_perusahaan`, `tanggal_mulai`, `posisi`, `gaji`, `kota`, `nama_usaha`, `alamat_usaha`, `ket`, `tahun_akademik`) VALUES
(202002001, 'qaz', 'Manajemen Keuangan Perbankan', 'MP01', 'SMA Negeri 2 Banjar', '0812-9407-615', 'Bekerja', 22, 'aa', '2022-09-30', 'apa aja', 1000000, 'KAB. TASIK', 'alat tulis', 'kepo', 'CNP', 2021),
(202002002, 'Mhs', 'Manajemen Informatika', 'MI20A', 'SMA Negeri 2 Banjar', '0812-9407-615', 'Belum', 9, NULL, '0000-00-00', '', 0, NULL, '', '', '-', 2021),
(202002003, 'Nabilah', 'Manajemen Informatika', 'MI20A', 'SMA Negeri 2 Banjar', '0812-9407-615', 'Belum', NULL, NULL, '0000-00-00', '', 0, NULL, '', '', '-', 2020),
(202002009, 'nyoba', 'Manajemen Keuangan Perbankan', 'MKP01A', 'SMAN 3 Tasikmalaya', '0812-9407-615', 'Bekerja', 11, 'asdf', '2022-09-05', 'apa aja', 1000000, NULL, '', '', 'CNP', 2021),
(202002010, 'abd', 'Manajemen Pemasaran', 'MP01', 'abc', '', 'Belum', 10, NULL, '0000-00-00', 'apa', 1000000, NULL, '', '', '-', 2020),
(202002013, 'raaa', 'Manajemen Informatika', 'MI20A', 'SMA Negeri 1 Banjar', '0812-9407-615', 'Gugur', 13, NULL, '0000-00-00', '', 0, NULL, '', '', '-', 2020),
(202002045, 'FAUZIAH', 'Manajemen Informatika', 'MI20A', 'SMA Negeri 2 Banjar', '085-9215-4076', 'Bekerja', 22, 'BFI FINANCE', '2022-10-11', 'PROGRAMMER', 2000000, 'KAB. TASIK', '', '', 'CNP', 2020),
(202002056, 'limaenam', 'Manajemen Informatika', 'MI20A', 'SMA Negeri 2 Banjar', '0812-9407-615', 'Bermasalah', 13, NULL, '0000-00-00', '', 0, NULL, '', '', '-', 2020),
(202002071, 'Nabila Azzahra', 'Manajemen Pemasaran', 'MP02', 'SMAN 3 Tasikmalaya', '0812-9407-615', 'Gugur', 0, NULL, '0000-00-00', '', 0, NULL, '', '', '-', 2021),
(202002076, 'Dila', 'Manajemen Pemasaran', 'MP02', 'SMA Negeri 2 Banjar', '089', 'Bekerja', 11, 'asdf', '2022-10-17', 'HRD', 1000000, 'BANDUNG', '', '', 'CNP', 2020),
(202002084, 'bil', 'Manajemen Informatika', 'MI20A', 'SMA Negeri 2 Banjar', '0812-9407-615', 'Bekerja', 12, '26', '2022-09-01', 'apa aja', 100000, 'TASIKMALAYA', '', '', 'Sendiri', 2020),
(202002090, 'Jufar', 'Manajemen Informatika', 'MI20A', 'SMA Negeri 2 Banjar', '089', 'Bekerja', 18, 'Marketing', '2022-10-03', 'Marketing', 1000000, 'BANDUNG', '', '', 'Sendiri', 2021),
(202002094, 'Jeje', 'Manajemen Keuangan Perbankan', 'MI20A', 'abc', '08', 'Berwirausaha', 0, NULL, '0000-00-00', '', 0, NULL, 'alat tulis', 'kepo', 'Omset 200k per hari', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(5) NOT NULL,
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
  `relasi` varchar(5) DEFAULT '',
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `bidang`, `type_perusahaan`, `alamat`, `kota`, `email`, `fax`, `kode_pos`, `kontak_person`, `jabatan`, `no_telp`, `tingkat`, `sudah_mou`, `tanggal_mulai`, `tanggal_berakhir`, `bukti_kerjasama`, `sumber`, `ket`, `relasi`, `nama`) VALUES
(22, 'BFI FINANCE', 'Teknologi', 'PT', 'JL. KAUM KALER, MANONJAYA, KEC. MANONJAYA', 'KAB. TASIK', '-', '167', '46197', 'Jaka Bagja', 'Finance dan HRD', '82218965494', '', 'Sudah', '2022-10-06', '2023-10-06', 'contoh4.pdf', '', '', 'Baru', 'Nabila Azzahra'),
(23, 'PT. MATEL INDONESIA', 'Teknologi', '', 'JL. INDUSTRI UTAMA BLOK SS KAV. 1-3 MEKAR MUKTI CIKARANG UTARA', 'BEKASI', '', '', '', 'IBU ICA', 'HRD', '(08997958869)', '', 'Sudah', '0000-00-00', '0000-00-00', 'contoh2.pdf', '', '', 'Baru', 'Nabila Azzahra'),
(24, 'PT. CEMACO MAKMUR CORPORATAMA (HINO CEMACO)', '', '', 'JL. URIP SUMOHARJO, BENDUNGAN, MERTASINGA, KEC. CILACAP UTARA, KABUPATEN CILACAP, JAWA TENGAH', 'CILACAP', '', '', '', 'BPK. FARID', 'HEAD WORkSHOP', '085223575446', '', '', '0000-00-00', '0000-00-00', 'contoh.pdf', '', '', 'Baru', 'Nabila Azzahra'),
(25, 'PT. CEMACO MAKMUR CORPORATAMA (HINO CEMACO)Z', '', '', 'WISMA INDOMOBIL 1, JL. MT. HARYONO KAV.8, JAKARTA 13330, INDONESIA', 'JAKARTA', '', '', '', '', '', '08881050447', '', '', '2020-01-01', '2023-01-01', NULL, '', '', 'Lama', 'Nabila Azzahra'),
(26, 'PT. MEGA MUTIARA GALUNGGUNG', '', '', 'JL. BANTARSARI', 'TASIKMALAYA', '', '-', '', 'PAK IQBAL', 'GENERAL MANAGER', '08112119312', '', '', '0000-00-00', '0000-00-00', NULL, '', '', 'Baru', 'cb'),
(27, 'PT. DANA ARHTA', '', '', 'CIREBON', '', '', '', '', 'IBU ANIE', 'HRD', '812-2061-2113', '', '', '0000-00-00', '0000-00-00', 'contoh3.pdf', '', '', 'Baru', 'Nabila Azzahra'),
(28, 'PT. DAYA GUNA MOTOR INDONESIA', '', '', 'CAKUNG CILINCING', 'JAKARTA', '', '', '', 'PAK ALFIN', 'HO MEKANIK', ' 818-0846-993', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(29, 'PT. ALAM SAMPURNA MAKMUR', '', '', 'JL. RAYA KADUSIRUNG, TANGERANG, BANTEN', 'KAB. BOGOR', '', '', '', 'BPK. AYO', 'OWNER', '812-8966-6969', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(30, 'MANDIRI UTAMA FINANCE', '', '', 'L. KHZ. MUSTOFA NO.RUKO, KAHURIPAN, TAWANG, TASIKMALAYA REGENCY', 'TASIKMALAYA', '', '', '', 'IBU ANISA', 'HRD', '823-1733-0188', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(31, 'BANK KB BUKOPIN', '', '', 'JL. SUTISNA SENJAYA NO.72, EMPANGSARI, KEC. TAWANG, KOTA. TASIKMALAYA', 'TASIKMALAYA', '-', '-', '', 'BPK. OKI', 'AO', '853-6174-8745', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(32, 'PT. BANGUN PURA DEWATA', '', '', 'JL. IR H JUANDA NO. 99 ( BELAKANG APOTEK RANCA BANGO ) KOTA TASIKMALAYA', 'TASIKMALAYA', '-', '-', '', 'IBU. RIDA', '', '82219166491', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(33, 'PT. SILOAM MOTOR (DFSK)', '', '', 'JL. KH. Z MUTTAQIN KAV RUKO 1-5 KOTA TASIKMALAYA', 'TASIKMALAYA', '-', '-', '', 'BPK. INDRA', 'ADH', '853-1055-7774', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(34, 'PT. SARANA JABAR REKATAMA', '', '', 'JL. UNIVERSITAS SILIWANGI', 'Tasikmalaya', '-', '-', '', 'Ibu. Ukanah', 'HRD', '82320252767', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(35, 'MANDIRI MOTOR MITRA MGI TASIK', '', '', 'JL. MOHAMAD HATTA NO.158, SUKAMANAH, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46131', 'Tasikmalaya', '-', '-', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(36, 'PT. SIBA SURYA', '', '', 'JL. TERBOYO INDUSTRI NO.7, TERBOYO WETAN, KEC. GENUK, KOTA SEMARANG, JAWA TENGAH 50112', 'Semarang', '-', '-', '', 'Ibu. Restu', 'HRD', '813-9343-5501', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(37, 'PT. ANGSA EMAS PERDANA', '', '', 'PT. ANGSA EMAS PERDANA', 'Jakarta', '-', '-', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(38, 'PT. ROBICO', '', '', 'JL. LEUWI PANJANG NO.80, SITUSAEUR, KEC. BOJONGLOA KIDUL, KOTA BANDUNG, JAWA BARAT 40234', 'Banten', '-', '-', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(39, 'PT. YURIM INDAH / PT. CAHAYA TERANG ABADI ABADI (PT. CTAA)', '', '', 'CIBODAS, KEC. BUNGURSARI, KABUPATEN PURWAKARTA, JAWA BARAT 41181', 'Purwakarta', '-', '-', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(40, 'CV. ARTTHAJAN (ASTRO GROUP)', '', '', 'JL. R. IKIK WIRADIKARTA NO.9, YUDANAGARA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46112', 'Tasikmalaya', '-', '-', '', 'Pak toto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(41, 'CV. GAZA KIDS STORE TASIK', '', '', 'JL. NN NO.53, KAREO, KEC. JAWILAN, KABUPATEN SERANG, BANTEN 42177', 'Tasikmalaya', '-', '-', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(42, 'PT. BINTANG NIAGA JAYA (BINTANG MOTOR)', '', '', 'JL. RAYA MAYOR OKING JAYA ATMAJA NO.102, CIRIMEKAR, CIBINONG, BOGOR, JAWA BARAT 16918', 'CIBINONG (PUSAT)', '', '', '', 'BPK. DIONISIUS', 'HRD', '81291117174', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(43, 'PT. SINAR NIAGA SEJAHTERA / SNS', '', '', 'JL. CIGEUREUNG TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Dante / Bapak Andi', '', '8197902124', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(44, 'PT. FASTRATA BUANA', '', '', 'JL. GUBENUR SEWAKA SAMBONG PARI\n MANGKUBUMI TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Mansyur/ Bapak Nandar (baru 2017)', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(45, 'PO. DOA IBU', '', '', 'JL. IR. H. JUANDA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Uum', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(46, 'PT. INDOMOBIL NISSAN TASIKMALAYA (PT. WAHANA JAYA TASIKMALAYA)', '', '', 'JL. IR. H. JUANDA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Zam-zam', '', '085223075531', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(47, 'PT. COLOMBIA', '', '', 'JL. SUTISNA SENJAYA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Linda', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(48, 'KANTOR NOTARIS HJ. YATTI ROCHAYATI', '', '', 'JL. YUDANEGARA NO.17A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Hj. Yatti', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(49, 'PT. ASURANSI TAKAFUL', '', '', 'JL. R.E.MARTADINATA NO.48A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Tikno', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(50, 'PT. PLN', '', '', 'JL. RAYA BARAT NO.675 CIMAHI KAB. BANDUNG', 'Bandung', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(51, 'PT. CATUR WANGSA INDAH ( PALEM )', '', '', 'JL. SL. TOBING NO.46 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Jenal', '', '085223266175', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(52, 'PT. NUSANTARA JAYA SENTOSA', '', '', 'JL. SOEKARNO HATTA NO.513 BANDUNG', 'Bandung', '', '', '', 'Bapak Toni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(53, 'PT. VALBURY', '', '', 'KOMPLEK TIP JL. HZ. MUSTOFA\n TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(54, 'PT. DAHANA BERLIAN MOTOR', '', '', 'JL. H. Z. MUSTOFA NO.347\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Yenny', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(55, 'ARISTA MOTOR', '', '', 'JL. SUTISNA SENJAYA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Sri', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(56, 'PT. PASIFIK', '', '', 'JL. PERINTIS KEMERDEKAAN NO.160\n KAWALU TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Partogi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(57, 'HONDA ASTRA MOTOR', '', '', 'JL. R.E. MARTADINATA TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(58, 'BANK MUAMALAT', '', '', 'JL. A. YANI TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Acep A', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(59, 'PT. MAXGAIN INTERNATIONAL FUTURES', '', '', 'JL. A. YANI TASIKMALAYA', 'Jakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(60, 'PT. SURYA JAYA BHAKTI', '', '', 'GEDUNG BEJ TOWER II LT. 28 JL. JEND. SUDIRMAN KAV.52-53 JAKARTA', 'Tasikmalaya', '', '', '', 'Dadan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(61, 'COLOMBUS', '', '', 'JL. IR. H. JUANDA NO.27 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Andre', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(62, 'PT. FALMACO INDONESIA', '', '', 'JL. RAYA PADALARANG NO.289 KM.\n 15,3 PADALARANG', 'Padalarang', '', '', '', 'Bapak Yuni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(63, 'PT. DANTE', '', '', 'JL. RAYA PADALARANG KM.15', 'Padalarang', '', '', '', 'Ibu Deborah', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(64, 'PT. TIRTA ABADI', '', '', 'JL. IR. H. JUANDA NO.99 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak David', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(65, 'CV. KURNIA ABBA SUBUR ABADI', '', '', 'JL. IR. H. JUANDA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Feky', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(66, 'PT. SINECA', '', '', 'JL. INDIHIANG TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(67, 'PT. NELS', '', '', 'CICAHEUM BANDUNG', 'Bandung', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(68, 'PT. CAKRA PUTERA PARAHYANGAN', '', '', 'JL. MOH. HATTA NO.168 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Drs. H. Budi Budiman', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(69, 'IMA GLOBAL LINK', '', '', 'JL. SITU GEDE TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Inne Mayasari', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(70, 'BAHANA YAMAHA MOTOR TASIKMALAYA', '', '', 'JL. H. Z. MUSTOFA NO.280\n TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(71, 'PT. TELKOM', '', '', 'JL. MERDEKA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Rujuk', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(72, 'PO. PRIMAJASA', '', '', 'JL. LETJEN SUTOYO NO.32 JAKARTA\n TIMUR', 'Jakarta', '', '', '', 'Bapak Deden', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(73, 'UD. PARAHYANGAN', '', '', 'JL. A. YANI NO.87 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Ega', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(74, 'PT. TRIO BHAKTI PERKASA', '', '', 'JL. PERINTIS KEMERDEKAAN KAWALU\n TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(75, 'PT. MITRA PERIANGAN PERSADA (DEPO TASIKMALAYA)', '', '', 'JL. SITU GEDE NO.3A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Ade Wahudi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(76, 'PT. KALBE FARMA', '', '', 'GEDUNG ENSEVAL JL. IR. H. JUANDA', 'Bandung', '', '', '', 'Heri', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(77, 'LPT. EKA JAYA', '', '', 'JL. BOJONG TENGAH TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Endang', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(78, 'PT. HINI DAIKI', '', '', 'JL. INDIHIANG TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Tuti', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(79, 'PT. NINA HERLINA', '', '', 'JL. A. YANI TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Nina', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(80, 'PT. HINO MOTORS SALES INDONESIA', '', '', 'JL. RAYA GATOT SUBROTO KM.8,5\n TANGERANG BANTEN', 'Tangerang', '', '', '', 'Eko Budi Prasetyo', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(81, 'BOROBUDUR DEPT STORE', '', '', 'KOMPLEK MAYASARI PLAZA\n TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(82, 'PT. SURYA MAS INDOTAMA', '', '', 'JL. PERINTIS KEMERDEKAAN NO.37A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Ganda', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(83, 'PT. KREASINDO', '', '', 'PERUM MITRA BATIK JL. BATIK YONAS 1\n BLOK C-25 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Enny', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(84, 'MAYASARI BHAKTI', '', '', 'JL. RAYA JAKARTA BOGOR NO.71\n JAKARTA PUSAT', 'Jakarta', '', '', '', 'H. Ade R', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(85, '\"PT. SOLUSINDO TOTAL TEKNIKTAMA\"', '', '', 'JL. JEND. SUDIRMAN KAV.1 JAKARTA\n 10221', 'Jakarta', '', '', '', 'Ibu Ida', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(86, 'GLOBESOFT', '', '', 'JL. LETNAN HARUN INDIHIANG', 'Tasikmalaya', '', '', '', 'bapak Dedi Kusmayadi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(87, 'BPR SYARI\'AH AL - WADI\'AH', '', '', 'KOMPLEK RUKO PASAR CIKURUBUK\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'H. Agus', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(88, 'PT. CAHAYA INDONESIA RAYA', '', '', 'JL. SL. TOBING NO.108 TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(89, 'PT. TIKI JNE', '', '', 'JL. SUTISNA SENJAYA NO.57A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Aep Budianto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(90, 'HONDA STAR MOTOR', '', '', 'JL. PASAR WETAN TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Drs. H. Budi Budiman', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(91, 'FORTUNA MOTOR BANJAR', '', '', 'JL. PERINTIS KEMERDEKAAN BANJAR', 'Banjar', '', '', '', 'Ardi', '', '85351468467', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(92, 'PT. PANDU LOGISTIK', '', '', 'JL. DR. SOEKARDJO TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(93, 'CV. WIRA SARANA MEDIKA', '', '', 'KOMPLEK BUMI JATI RESIK A-15\n INDIHIANG TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Asep', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(94, 'PT. DWIDAYA USAHA MANDIRI', '', '', 'JL. HZ. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(95, 'PO. SAHABAT', '', '', 'PLERED CIREBON', 'Cirebon', '', '', '', 'Bapak Dedy', '', '087728055587/', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(96, 'UD. MURAH JAYA', '', '', 'JL. PERINTIS KEMERDEKAAN KAWALU\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Chris', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(97, 'PT. CNI', '', '', 'JL. PASEH TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Enco', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(98, 'PT. BAKRIE TELECOM', '', '', 'JL. H. Z. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Yoga', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(99, 'PT. DAYA ANUGERAH MANDIRI', '', '', 'JL. SUTISNA SENJAYA NO.55\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Rono', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(100, 'PT. ASKES PERSERO', '', '', 'JL. TARUMANAGARA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Amin', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(101, 'PT. MAYAPERKASA ABADI', '', '', 'RUKO PLAZA NIAGA BLOK D.11 SENTUL\n CITY KAB. BOGOR', 'Bogor', '', '', '', 'Riyadi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(102, 'PT. PANORAMINDO GRAHA', '', '', 'JL. AHMAD YANI TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Erlan Hendarlan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(103, 'PT. AHAD NET INTERNATIONAL', '', '', 'JL. SWADARMA RAYA NO.51 KP. BARU\n V PESANGGRAHAN JAKARTA SELATAN', 'Jakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(104, 'PT. INSAN SYSTEM', '', '', 'JL. MH THAMRIN RUKO ROXY C-35\n BEKASI', 'Bekasi', '', '', '', 'Indarto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(105, 'PT. MAYA GRAHA INDAH BANDUNG', '', '', 'JL. SOEKARNO HATTA NO. 481 BANDUNG', 'Bandung', '', '', '', 'Isyam Samsyul farid/ Hendri Irfan Affandi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(106, 'PT. JAINDO METAL KENCANA', '', '', 'JL. SOEKARNO HATTA NO.227 BANDUNG', 'Bandung', '', '', '', 'Yogo', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(107, 'PT. PERSADA BUMI KENCANA', '', '', 'JL. LETJEN IBRAHIM ADJIE NO.166\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Mursidi', '', '081313801515', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(108, 'APOTEK BANDUNG RAYA', '', '', 'JL. PASAR LAMA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Jajang', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(109, 'SUBUR BAN', '', '', 'JL. MARTADINATA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Rony', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(110, 'PT. TNS', '', '', 'JL. IR. H. JUANDA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Adeng', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(111, 'HOTEL SANTIKA', '', '', 'JL. PULOBUARAN RAYA BLOK FF NO.12A PULO GADUNG JAKARTA TIMUR', 'Jakarta', '', '', '', 'Mey Gunawan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(112, 'PT. SUPERA', '', '', 'JL. A. YANI NO.152 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Awan H', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(113, 'KORAN RADAR TASIKMALAYA', '', '', 'JL. SL. TOBING NO.99 TUGUJAYA\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Radi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(114, 'PT. BFI FINANCE', '', '', 'KOMPLEK RUKO PLAZA ASIA BLOK A NO.12A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Iwan Richard/ Ibu Lussy Mardiana', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(115, 'PT. WOM FINANCE', '', '', 'KOMPLEK RUKO MAYASARI PLAZA\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Yanti', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(116, 'SURYA PETRA', '', '', 'JL. MAYOR SL TOBING NO.18\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Lia', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(117, 'PT. SENTOSA MOTOR', '', '', 'JL. H. Z. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Drs. H. Budi Budiman', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(118, 'PT. SPEKTRA ABADI', '', '', 'JL. RAYA RAJAPOLAH TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(119, 'PD. SUMBER MAKMUR', '', '', 'KOMPLEK PASAR CIKURUBUK\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Hengky', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(120, 'PT. DELTA INTERNUSA', '', '', 'JL. TERUSAN PASEH - BCA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Kastaman', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(121, 'PT. INDOSAT, TBK', '', '', 'JL. SAMBONG PARI TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Fery Suganda', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(122, 'CV. SUKAHATI', '', '', 'JL. CIPEDES II TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Suryana', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(123, 'PT. NTS', '', '', 'JL. IR. H. JUANDA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Aep', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(124, 'PT. SINAR SOSRO', '', '', 'BANJARSARI', 'Banjarsari', '', '', '', 'Andi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(125, 'SUMBER JAYA MOTOR', '', '', 'BANJARSARI', 'Banjarsari', '', '', '', 'Endin', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(126, 'AHASS ADITYA MOTOR', '', '', 'JL. PEMUDA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Luna', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(127, 'CV. LODY JAYA', '', '', 'JL. IR. H. JUANDA NO.9 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Yeni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(128, 'PT. BTJ', '', '', 'JL. SITU GEDE NO.3A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Neni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(129, 'BINA SEHAT GROUP', '', '', 'BANDUNG', 'Bandung', '', '', '', 'Diki', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(130, 'PT. ELCO', '', '', 'JL. CIEUNTEUNG NO.103 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Della', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(131, 'PT. TRITUNGGAL MULIA WISESA', '', '', 'JL. JATINEGARA BARAT NO.109 JAKARTA', 'Jakarta', '', '', '', 'Bapak Toni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(132, 'PT. MULTISARANA', '', '', 'JL. H. Z. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Hendra', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(133, 'FORMULA VARIASI MOBIL', '', '', 'JL. PASEH NO.87 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Indrawati', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(134, 'PD. KENARI JAYA', '', '', 'JL. SUKANAGARA NO.33 ANTAPANI', 'Bandung', '', '', '', 'Ibu Siti', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(135, 'CV. CAHAYA ABADI', '', '', 'JL. TENTARA PELAJAR NO.26 A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Hj. Ai', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(136, 'PT. TIKI', '', '', 'JL. R.E. MARTADINATA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Nia ', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(137, 'HONDA SUBUR JAYA', '', '', 'JL. IR. H. JUANDA TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(138, 'PT. WINGS', '', '', 'JL. IR. H. JUANDA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ir. Degari Kurniadi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(139, 'PT. PERMATA FINANCE', '', '', 'JL. H. Z. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(140, 'ACC FINANCE', '', '', 'JL. H. Z. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Teguh Purwadi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(141, 'PT. NETRAL JAYA MOTOR', '', '', 'JL. R.E. MARTADINATA NO.256 A TASIKMALAYA', 'Ciamis', '', '', '', 'Burhanudin', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(142, 'PT. KIBAR BUANA', '', '', 'JL. RAYA CIKONENG CIAMIS', 'Ciamis', '', '', '', 'H. Oting', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(143, 'PT. SARANA PAPAN UTAMA', '', '', 'JL. IMBANAGARA CIAMIS', 'Tasikmalaya', '', '', '', 'Kundang Budi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(144, 'NIAGA REDJA MOTOR', '', '', 'JL. PERINTIS KEMERDEKAAN NO.60 A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Nuryadi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(145, 'CV. LENTERA GALUH R', '', '', 'PERUM BUMI ASRI DIRGANTARA JL. MEGA ASRI 3 NO.170 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Yusuf', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(146, 'PT. MITRA MART', '', '', 'JL. BALONG KANYUN TASIKMALAYA', 'Bandung', '', '', '', 'Bapak Agus', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(147, 'PT. PRISMAS JAMINTARA', '', '', 'KOMP. PT. INTI GG UTAMA TELKOM JL. MOCH. TOHA NO.77 BANDUNG 40253', 'Bandung', '', '', '', 'Ibu Nuri', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(148, 'PT. MITRA UTAMA MADANI', '', '', 'JL. IR. H. JUANDA NO.25 BANDUNG', 'Bandung', '', '', '', 'Agus Syarif Hidayat', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(149, 'PT. JASA ARTHA SINERGI', '', '', 'JL. ISTANA PASTEUR KOMPLEK UNPAR NO.22 SUKARAJA 2 GUNUNG BATU BANDUNG', 'Depok', '', '', '', 'Adang Suherman', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(150, 'CV. DAYA CIPTA GRAHA', '', '', 'JL. TENTARA PELAJAR TASIKMALAYA', 'Depok', '', '', '', 'Bapak Adang', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(151, 'HSN MOTOR', '', '', 'JL. RADAR AURI DEPOK', 'Bandung', '', '', '', 'Iwan Ridwan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(152, 'PT. METANOUVA INFORMATIKA', '', '', 'JL. KANGKUNG KALER NO.19 BANDUNG', 'Tasikmalaya', '', '', '', 'Ibu Nancy', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(153, 'TMC HOSPITAL', '', '', 'JL. H. Z. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Agus Gumelar', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(154, 'PT. TRIAS INDRA SAPUTRA', '', '', 'JL. DR. KAMAL MUARA VII BLOK A NO.6\n JAKARTA UTARA', 'Jakarta', '', '', '', 'Ibu Carolina', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(155, 'MALIBU STUDIO 62', '', '', 'JL. RAYA BARAT BOULEVARD BLOK LC VII NO.62 KELAPA GADING JAKARTA', 'Bandung', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(156, 'PT. HEKSA GARDA UTAMA', '', '', 'KOMP. CIPAGANTI GRAHA I TAHAP 3\n NO.19 CIWASTRA BANDUNG', 'Tasikmalaya', '', '', '', 'Bapak Dedi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(157, 'SANTI HOTEL & RESORT', '', '', 'JL. YUDANEGARA NO.57 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Joko', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(158, 'PT. HM. SAMPOERNA, TBK', '', '', 'JL. PROF EYCKMEN NO.22B CIPAGANTI\n BANDUNG', 'Bandung', '', '', '', 'Bapak Ade', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(159, 'PT. DAUN TERATAI FARMA', '', '', 'JL. IR. H. JUANDA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Chris', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(160, 'CV. SYAREKAT JAYA', '', '', 'JL. RAYA INDIHIANG TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Wawan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(161, 'PT. BKL', '', '', 'JL. CIHIDEUNG BALONG TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Yunia Dwi Indriastuti', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(162, 'PT. MEGA CAPITAL', '', '', 'JL. RAYA INDIHIANG TASIKMALAYA', 'Tasikmalaya', '', '', '', 'H. Slamet Susanto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(163, 'UD. SETIA MANDIRI / SIDO MUNCUL', '', '', 'JL. CIHIDEUNG BALONG TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Dedi', '', '082120463909/', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(164, 'PT. BUMI HELANG MANGKAK', '', '', 'JL. CIGALONTANG SINGAPARNA\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Samsul Muarif', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(165, 'PT. ARD CONSTRUCTIONS', '', '', 'JL. SITU GEDE - SLA\'AWI PASEH\n TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Dedi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(166, 'PT. SINAR CEMERLANG', '', '', 'JL. IR. H. JUANDA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(167, 'PT. MANDALA FINANCE', '', '', 'JL. MOH. HATTA', 'Tasikmalaya', '', '', '', 'Bapak Agung', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(168, 'MAYASARI PLAZA', '', '', 'RUKO PERMATA REGENCY NO.3 JL. H.Z. MUSTOFA', 'Bandung', '', '', '', 'Ibu Arlyne', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(169, 'ORION IT SOLUTION', '', '', 'KOMP. MEKAR WANGI JL. MEKAR\n PUSPITA NO.70 BANDUNG', 'Tasikmalaya', '', '', '', 'Lili Sarjono', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(170, 'PT. SUBUR JAYA MOTOR', '', '', 'JL. BATU CEPER RAYA NO.14 PAV', 'Bandung', '', '', '', 'Ibu Helen & Ibu Irma', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(171, 'PT. OPTINDO SURYATAMA', '', '', 'JL. R.E. MARTADINATA NO.54', 'Tasikmalaya', '', '', '', 'Ibu Lia', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(172, 'KANTOR NOTARIS LINDA MEILIANY, SH.MH', '', '', 'JL. TENTARA PELAJAR NO.99', 'Tasikmalaya', '', '', '', 'Bapak Nuki', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(173, 'MATARAM SAKTI MOTOR', '', '', 'JL. IR. H. JUANDA', 'Tasikmalaya', '', '', '', 'Yusuf Badru', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(174, 'PT. KARYA SEJAHTERA SEMESTA / KSS', '', '', 'RUKO TAMAN BOROBUDUR I JL. RORO\n JONGGRANG RAYA BLOK B NO.18\n KARAWACI ? TANGERANG 15138', 'Bandung', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(175, 'BERKAT UV', '', '', 'JL. NANA ROHANA NO.99 / 82\n BANDUNG', 'Tasikmalaya', '', '', '', 'Warsito', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(176, 'PT. TIGA SERANGKAI INTERNATIONAL', '', '', 'JL. BEBEDAHAN I NO.162', 'Tasikmalaya', '', '', '', 'Cepi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(177, 'PT. KISEL', '', '', 'JL. HZ. MUSTOFA RUKO PERMATA\n REGENCY KAV.5', 'Bandung', '', '', '', 'Ibu Liliana', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(178, 'COSMOPOLIS SHOES CITY', '', '', 'JL. DALAM KAUM NO.32-34', 'Tasikmalaya', '', '', '', 'Rusmana Dion', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(179, 'PT. BPR SILIWANGI', '', '', 'JL. DR. MOCH HATTA NO.205B', 'Tasikmalaya', '', '', '', 'Bapak Joni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(180, 'PT. ERHA CLINIC INDONESIA', '', '', 'GEDUNG WISMA NUSANTARA LT.14-17\n JL. MH. THAMRIN NO.59', 'Jakarta', '', '', '', 'Atika Rahmawati', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(181, 'AUTO BRIDAL CAR WASH', '', '', 'JL. VETERAN', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(182, 'PT. ARTHA ASRI', '', '', 'JL. BANTAR NO.53', 'Tasikmalaya', '', '', '', 'Ibu Asri', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(183, 'TELEMEDIA', '', '', 'JL. KH. MUTAQIN NO.40', 'Tasikmalaya', '', '', '', 'Denta', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(184, 'PT. IMMORTAL COSMEDIKA INDONESIA', '', '', 'JL. RAYA PAKAPURAN NO.32 SUKATANI\n CIMANGGIS DEPOK', 'Depok', '', '', '', 'Monadi S & Ibu Kiki', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(185, 'PT. ANGKASA MANAJEMEN MANDIRI', '', '', 'JL. HR. RASUNA SAID BLOK X-2 LT. 17\n KAV. 6 KUNINGAN JAKARTA SELATAN', 'Jakarta', '', '', '', 'Yadi Supriadi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(186, 'PT. RAHARJA', '', '', 'JL. RAYA CIKONENG NO.27 CIAMIS', 'Ciamis', '', '', '', 'Bapak Selly', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(187, 'KOSPIN JASA', '', '', 'JL. SUTISNA SENJAYA NO.105', 'Tasikmalaya', '', '', '', 'Bapak Hendri', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(188, 'PT. BINTANG UTAMA CEMERLANG', '', '', 'JL. PERINTIS KEMERDEKAAN NO.32', 'Tasikmalaya', '', '', '', 'Yogi Prakarsa, S.Kom', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(189, 'PT. CIPAGANTI CIPTA GRAHA', '', '', 'JL.R.E.MARTADINATA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Yadi Iswandi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(190, 'PT. SURYA ELEKTRA', '', '', 'JL. R.E.MARTADINATA NO.272', 'Tasikmalaya', '', '', '', 'Riswan Tarigan, Ir', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(191, 'PT GARUDA KNITINDO OPTIMA', '', '', 'JL. H. ALPI NO.105 CIJERAH, CIBUNTU, BANDUNG KULON, BANDUNG CITY, WEST JAVA 40212', 'Bandung', '', '', '', 'Rahmat', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(192, 'JNT EXPRESS', '', '', 'JL. MITRA BATIK NO.61, CIPEDES, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46133', 'Tasikmalaya', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(193, 'CV BARKAH BUMI', '', '', '7CW8+HH3, GEMPOL, KEC. GEMPOL, KABUPATEN CIREBON, JAWA BARAT 45161', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(194, 'PADAYUNGAN MOTOR', '', '', 'KAWALU', 'Tasikmalaya', '', '', '', 'Yudhi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(195, 'PT SEINO INDOMOBIL LOGISTICS', '', '', 'JATAKE', 'Jakarta', '', '', '', 'Eko', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(196, 'UD ARIEF', '', '', 'PERUM TATA LESTARI BLOK E NO. 1 SINGAPARNA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Arif', '', '81226002999', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(197, 'LEMBAGA PENDIDIKAN PRAWITA TASIKMALAYA', '', '', 'JL. AHMAD YANI NO. 39B KOMP PANCASILA PLAZA', 'Tasikmalaya', '', '', '', 'Fatimah Ratnasari', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(198, 'PT GOLDEN INTAN MULIA', '', '', 'JL. CISINGA KM 01 PAKEITAN KIDUL CIAWI', 'Tasikmalaya', '', '', '', 'Agus', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(199, 'PT MANDALA PUTRA ABDI KARYA (MANDALA RIGHT PARKING)', '', '', 'KOMP. RUKO PLAZA ASIA NO. D10 JL. HZ. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Rochmat/ Daddy Irawan S', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(200, 'PT BINTANG MANDIRI FINANCE', '', '', 'JL. IR H JUANDA', 'Tasikmalaya', '', '', '', 'Rienda Carliani, SH', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(201, 'PT NUANSA ALUMUNIUM', '', '', 'RUKO BLOK A NO. 2 BELAKANG TERMINAL INDIHIANG', 'Tasikmalaya', '', '', '', 'Wahyu Hidayat', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(202, 'PT SUZUKI FINANCE', '', '', 'RUKO PERMATA REGENCY NO. 24 JL. HZ MUSTOFA', 'Tasikmalaya', '', '', '', 'Petrus', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(203, 'KANTOR NOTARIS NIA TRESNAWATI, SH', '', '', 'JL. RAA WIRATANUNINGRAT NO. 19', 'Tasikmalaya', '', '', '', 'Nia Tresnawati, SH', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(204, 'PT DASAR JAYA GROUP', '', '', 'JL. KH LUKMANUL HAKIM NO. 5', 'Tasikmalaya', '', '', '', 'Susilo', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(205, 'AGUNG CELULLAR', '', '', 'JL. HZ MUSTOFA NO. 126', 'Tasikmalaya', '', '', '', 'Rahmalia Rahayu', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(206, 'PT CIPTA MEGA KURNIA', '', '', 'JL. PADJAJARAN NO. 73', 'Bandung', '', '', '', 'Ulul Azmi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(207, 'PT COCO JAYA ABADI', '', '', 'JL. SL TOBING', 'Bandung', '', '', '', 'Ibu Novia', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(208, 'PRO ART PRODUCTION', '', '', 'KOMP. RUKO PLAZA ASIA NO. C-02', 'Tasikmalaya', '', '', '', 'Ali Muthahhari', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(209, 'AXIS SHOP', '', '', 'JL. HZ MUSTOFA NO. 376', 'Tasikmalaya', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(210, 'PT KRAPHA INDONESIA GROUP', '', '', 'JL. GUNUNG SABEULAH NO. 25', 'Tasikmalaya', '', '', '', 'Tuan Tano', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(211, 'PT KHARISMA MATARAM RAYA', '', '', 'JL. LETNAN HARUN INDIHIANG', 'Tasikmalaya', '', '', '', 'Enan Suherlan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(212, 'PD SANSIBAR', '', '', 'JL. IR H DJUANDA', 'Tasikmalaya', '', '', '', 'Risdianto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(213, 'PT OMNI INDONESIA', '', '', 'MALL MANGGA DUA RUKO NO. 19 JL. MANGGA DUA RAYA JAKARTA', 'Jakarta', '', '', '', 'Linda Arikrisna', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(214, 'PT PRUDENTIAL ASURANSI', '', '', 'RUKO PLAZA ASIA JL. HZ MUSTOFA', 'Tasikmalaya', '', '', '', 'Bapak Lulus', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(215, 'PT ENSEVAL PUTRA MEGA TRADING', '', '', 'JL. IR H DJUANDA NO. 18', 'Tasikmalaya', '', '', '', 'Ibu Yulis', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(216, 'MOKO DONUTS', '', '', 'MAYASARI PLAZA JL. PASAR WETAN', 'Tasikmalaya', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(217, 'PT MEGA AUTO FINANCE', '', '', 'JL. BATUWALANG 9 RT. 01 RW. 11 KEL. HEGARSARI KEC. PATARUMAN', 'Tasikmalaya', '', '', '', 'Rio Derozario', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(218, 'PT BANGUN BUMI PARAHYANGAN', '', '', 'RUKO PERMATA REGENCY BLOK G NO. 3 JL. SILIWANGI', 'Tasikmalaya', '', '', '', 'Ibu Ulan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(219, 'PT FELDEN INDONESIA', '', '', 'JL. SOEKARNO HATTA KM. 13.8 LIK NO. B 15 GEDEBAGE', 'Bandung', '', '', '', 'Bapak Billy', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(220, 'PT MAGNA DANA INVESTAMA', '', '', 'MENARA BRI LT. 9 SUITE 903 JL. ASIA AFRIKA NO. 57-59', 'Bandung', '', '', '', 'Bambang Santosa, SE', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(221, 'PT BRATATEX', '', '', 'JL. LEUWIGAJAH NO. 106B CIMAHI/ JL. MAHAR MARTA NEGARA NO. 106B RT. 04 RW. 04 CIGUGUR TENGAH CIMAHI 40522', 'Cimahi', '', '', '', 'Tan Kian Beng/ Ibu Ida Suaida', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(222, 'TANJUNG MULIA PS', '', '', 'JL. IR. H. JUANDA NO. 15 RANCABANGO', 'Tasikmalaya', '', '', '', 'Suwandi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(223, 'PT. JABAR NIAGA PRIMA', '', '', 'JL. IR. H. JUANDA NO. 18 GUDANG TFT', 'Tasikmalaya', '', '', '', 'Unang Taryono', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(224, 'PT COLUMBINDO PERDANA (COLUMBIA)', '', '', 'JL. PASIRKALIKI NO. 205 BANDUNG', 'Bandung', '', '', '', 'Donald S', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(225, 'NEO DIGITAL PRINTING', '', '', 'JL. CIPEDES I NO. 7 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'S. Antonio', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(226, 'CV SINAR MAS', '', '', 'JL. HZ MUSTOFA NO. 294', 'Tasikmalaya', '', '', '', 'Kenny T', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(227, 'PT SAKURA INDO PROPERTI', '', '', 'JL. PAHLAWAN NO. 64', 'Bandung', '', '', '', 'H. Koko Komarudin, SS', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(228, 'PT ASCO AUTOMOTIVE', '', '', 'RUKO NIAGA KALIMAS I BLOK C NO. 11', 'Jakarta', '', '', '', 'Kartika', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(229, 'PT BONLI CIPTA SEJAHTERA', '', '', 'JL. BOJONG KONENG ATAS NO. 8A', 'Bandung', '', '', '', 'Beni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(230, 'CV SUBUR ABADI SENTOSA', '', '', 'JL. RE MARTHADINATA NO. 145 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Lukas', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(231, 'PT. MANDALA KIAT ANANDA', '', '', 'RUKAN MITRA BATIK II BLOK F/8 JL. PALEM 1', 'Bekasi', '', '', '', 'Iwan Hartono', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(232, 'HR MP3 GARUT', '', '', 'RUKO PERMATA REGENCY BLOK B. 8 JL. SILIWANGI', 'Tasikmalaya', '', '', '', 'Toto Sudharto, SE', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(233, 'HEART & DETERMINATION TRAINING HUMAN DEVELOPMEN', '', '', 'JL. GATOT SUBROTO NO. 91', 'Jakarta', '', '', '', 'Funadianto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(234, 'AHASS 0107', '', '', 'JL. HZ. MUSTOFA NO. 174', 'Tasikmalaya', '', '', '', 'Roni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(235, 'PT. ADITYA SUKSES GEMILANG', '', '', 'JL. CARINGIN NO. 250 RT. 06 RW. 13 BABAKAN CIPARAY BANDUNG', 'Bandung', '', '', '', 'Erva Novasari Dewi, S. Psi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(236, 'PT. MITRAUSAHA GENTANIAGA', '', '', 'JL. LINGKAR LUAR BARTA PURI KEMBANGNA', '', '', '', '', 'Hartini', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(237, 'PT. STELL PIPE INDUSTRY OF INDONESIA', '', '', 'KAWASAN INDUSTRI MITRA KARAWANG JL. MITRA RAYA II BLOK F2 DESA PARUNGMULYA CIAMPEL', 'Bandung', '', '', '', 'Hariadi, S. Psi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(238, 'PT. BLUE GAS INDONESIA', '', '', 'JL. SOEKARNO HATTA NO. 606 BANDUNG', 'Bandung', '', '', '', 'Agus Budiono', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(239, 'PT. JENDELA ALAM', '', '', 'JL. SERSAN BAJURI KM 4,5 (LEDENG) LEMBANG BANDUNG', 'Bandung', '', '', '', 'Livita', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(240, 'PT. CARAKA YASA', '', '', 'JL. RE MARTADINATA NO. 145', 'Bandung', '', '', '', 'Sri Hadi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(241, 'PT. SILOAM KAISAR MOTOR', '', '', 'JL. KOPO NO. 574 BANDUNG', 'Bandung', '', '', '', 'Yolanda', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(242, 'PT. GAC SAMUDERA LOGISTIC', '', '', 'KOMPLEK DELTA SILICON 2 JL. WARU BLOK F2 NO. 5 LIPPO CIKARANG', 'Cikarang', '', '', '', 'Yuly Indrianti', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(243, 'PT. INTERNUSA MANDIRI', '', '', 'KOMP. GADING REGENCY BOK B1 NO. 10 SOEKARNO HATTA BANDUNG', 'Bandung', '', '', '', 'Rido S', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(244, 'KOPERASI DAHANA', '', '', 'JL. GARUDA CIBEUREUM TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ade Tasdik', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(245, 'YAYASAN KHALIFAH', '', '', 'JL. MAWAR BLOK H 2 NO. 21 PUSPITALOKABSD TANGERANG', 'Tangerang', '', '', '', 'Adam Nova', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(246, 'PT. SURYA INDO GLOBAL', '', '', 'JL. LAPANGAN BOLA NO. 16A KEBON JERUK JAKARTA BARAT', 'Jakarta Barat', '', '', '', 'Karim Taslim', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(247, 'PT. SELARAS MULTI APLIKASI', '', '', 'THE EDGE SUPERBLOK BAROS CIMAHI', 'Cimahi', '', '', '', 'July', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(248, 'PT. TIGA SERANGKAI NUSANTARA', '', '', 'JL. PULO KAMBING RAYA KAV. 7 NO. 22 KAWASAN INDUSTRI PULO GADUNG JAKARTA TIMUR', 'Jakarta Timur', '', '', '', 'Iskandar', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(249, 'MIRACLE', '', '', 'JL. IR. H. JUANDA', 'Tasikmalaya', '', '', '', 'Lucy Dian Rosalin', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(250, 'PT. IBN (MAYORA)', '', '', 'JL. IR. H. JUANDA NO. 33 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Dede', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(251, 'SMK AL- AMIN', '', '', 'CIBALANARIK, TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Encep', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(252, 'HONDA KUMALA MOTOR', '', '', 'KARAWANG', 'Karawang', '', '', '', 'Dede', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(253, 'PT. SINAR MAS MULTIFINANCE CAB. BANJAR', '', '', 'JL. LETJEN SOEWARTO NO. 97 KOTA BANJAR', 'Banjar', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(254, 'LP3I COURSE CENTER', '', '', 'JL. RAYA CIKONENG CIAMIS', 'Ciamis', '', '', '', 'Adi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(255, 'PT. TIRTA UTAMA ABADI CABANG BANDUNG', '', '', 'JL. SOEKARNO HATTA NO. 208 BANDUNG', 'Bandung', '', '', '', 'Christina Dewi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(256, 'PT. RIUNG MITRA LESTARI', '', '', 'KOTA HARAPAN INDAH JL. BOULEVARD HIJAU NO. 22-23 BEKASI BARAT', 'Bekasi Barat', '', '', '', 'Ihsan satyanugraha', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(257, 'PT. AGANSA PRIMATAMA & CLIENTS', '', '', 'RUKO KOPO PLAZA D-19 JL. PETA/ LINGKAR SELATAN BANDUNG', 'Bandung', '', '', '', 'Jossie', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(258, 'PT. SENTRAL SARI PRIMA SENTOSA', '', '', 'JL. KH. HASAN ARIF NO. 888, DESA SUKARATU BANYU RESMI, GARUT', 'Garut', '', '', '', 'Roni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(259, 'CV. PRIMA RASA ABADI', '', '', 'JL. RANGGA GADING NO. 6 BANDUNG', 'Bandung', '', '', '', 'Ibu Shinta', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(260, 'PT. MITSUBA INDONESIA PIPE PARTS', '', '', 'KAWASAN INDUSTRI MM2100 BLOK NN-4-2 JATIWANGI CIKARAG BARAT BEKASI', 'Bekasi', '', '', '', 'Ibu Indri', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(261, 'PT. WIRA DHARMA BUANA', '', '', 'JL. SIRNAGALIH PERUM INDIHIANG PERMAI BLOK E NO. 1', 'Jakarta', '', '', '', 'Dede Tatang', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(262, 'PT. TJ FORGE', '', '', 'JL. PERMATA RAYA GRAHA KIIC LT. 2 TELUK JAMBE KARAWANG', 'Karawang', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(263, 'PT. DARMA DJAYA (DMD)', '', '', 'JL. NAGARAWANGI KOTA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Feri Kindaryanto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(264, 'LP3I TASIKMALAYA', '', '', 'JL. RANCABANGO KM 106 NO. 2 BAYPASS TASIKMALAYA', 'Tasikmalaya', '', '', '', 'H. Rudi Kurniawan, ST., MM', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(265, 'PT. MNC SKY VISION, TBK', '', '', 'JL. RIAU NO. 150 BANDUNG', 'Bandung', '', '', '', 'Purnomo', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(266, 'PT. DAIKI ALUMINIUM INDUSTRY INDONESIA', '', '', 'JL. MALIGI VIII LOT T-12 KAWASAN INDUSTRI KIIC TELUK JAMBE BARAT KARAWANG BARAT', 'Karawang Barat', '', '', '', 'Koko Waseda', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(267, 'APOTEK ASSA PARMA', '', '', 'RUKO HT SUMANTRI JL. IR. H. DJUANDA', 'Tasikmalaya', '', '', '', 'Adam Nova', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(268, 'PT. SCM CORPORATAMA', '', '', 'JL. RADIN INTEN 2 KAV. VIII NO. 18 DUREN SAWIT JAKARTA TIMUR', 'Jakarta Timur', '', '', '', 'Ahmad Yani Maghribi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(269, 'PT. RENTANG BUANA NIAGA MAKMUR', '', '', 'JL. RAYA CIAWI KM. 8 RT. 02 RW. 05 DESA JATIHURIP KEC. CISAYONG TASIKMALAYA', 'Tasikmalaya', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(270, 'PT. BUDIARTI GRAHA DUTA', '', '', 'JL. KH. KHOER AFFANDI KEC. CIBEUREUM KOTA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Hery Suryahandi/ Asep Maulana', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(271, 'PT. BINA SAN PRIMA (SANBE FARMA)', '', '', 'JL. IR. H. DJUANDA NO. 33A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Drh. Achmad Ansori', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(272, 'PT. INDOMARCO PRISMATAMA PURWAKARTA', '', '', 'PERUM BUKIT INDAH BLOK N. 1-5 PURWAKARTA', 'Purwakarta', '', '', '', 'Bapak Iman', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(273, 'PRIMEBIZ HOTEL KARAWANG', '', '', 'KOTA BUKIT INDAH BLOK C KARAWANG 41111', 'Karawang', '', '', '', 'Inggrid Octavia', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(274, 'PT. ANGGADA PERKASA', '', '', 'JL. LEUWIDAHU NO. 1 KAMPUNG KARANG JAMI TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Frisca', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(275, 'PT. MITRA PUTRA PARAHYANGAN (MPP)', '', '', 'JL. MEKAR RAHAYU MARGAASIH BANDUNG', 'Bandung', '', '', '', 'Bapak Asep', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(276, 'PT. SINARMAS MULTIFINANCE', '', '', 'JL. LETJEN SUWARTO NO. 97', 'Banjar', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(277, 'ELTI GRAMEDIA', '', '', 'JL. DEWI SARTIKA NO. 10 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Suwagenda', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(278, 'PT. SURYA RENGGO COUNTENERS', '', '', 'JL. MALIGI RAYA (PALING UJUNG) KIIC KARAWANG', 'Karawang', '', '', '', 'Ahmad Nasrulloh', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(279, 'CITY TRANS UTAMA', '', '', 'BANDUNG', 'Bandung', '', '', '', 'Bapak Yoga', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(280, 'PT. MITRA PERIANGAN PERSADA (MPP)', '', '', 'JL. SITU GEDE NO. 3A TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Syeikh Maulana Ali', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(281, 'CANDRA KONSULTAN', '', '', 'KOMP. KERTALAKSANA II NO. 16 (ANDIR)', 'Bandung', '', '', '', 'Chandra', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(282, 'PITSTOP REVOLUTION', '', '', 'JL. RE MARTADINATA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Melisa Gideon, SE', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(283, 'PT. HUDAYA MAKMUR MANDIRI', '', '', 'RUKO BEKASI MAS BLOKC/18 BEKASI SELATAN', 'Bekasi Selatan', '', '', '', 'Yuni Sugiharto, S. Sos', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(284, 'PT. VIA MOTIF', '', '', 'JL. GUBERNUR SEWAKA BABAKAN TENGAH RT. 01 RW. 03 KARSAMENAK KAWALU', 'Tasikmalaya', '', '', '', 'Karmana', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(285, 'CITRA BUSANA', '', '', 'BANDUNG', 'Bandung', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', '');
INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `bidang`, `type_perusahaan`, `alamat`, `kota`, `email`, `fax`, `kode_pos`, `kontak_person`, `jabatan`, `no_telp`, `tingkat`, `sudah_mou`, `tanggal_mulai`, `tanggal_berakhir`, `bukti_kerjasama`, `sumber`, `ket`, `relasi`, `nama`) VALUES
(286, 'SHAKIRA UMROH', '', '', 'JL. IR. H. JUANDA', 'Bandung', '', '', '', 'H. Hervi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(287, 'PT. JASAMEDIKA SARANATAMA', '', '', 'KOPO MAS REGENCY BLOK 8-I BANDUNG', 'Bandung', '', '', '', 'Victor', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(288, 'PT. SELARAS', '', '', 'JL. PARAKAN ASRI 3 KOMPLEK BY PASS BANDUNG', 'Bandung', '', '', '', 'Ibu Dewi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(289, 'PT. OTO MOBIL FINANCE', '', '', 'PERMATA REGENCY JL. HZ. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Oman', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(290, 'ROSE BUD MEGAH (MEGA PLASTIK)', '', '', 'PASAR CIKURUBUK BLOK III NO.18-21 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Arlene', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(291, 'PT. BPR ARTHA SARIGUNA', '', '', 'KOMPLEK PASAR CIKURUBUK TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Lely Kiki', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(292, 'YO TOURS AND TRAVEL', '', '', 'JL. RE. MARTADINATA NO.120 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Yoke Adrian, S.Kom', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(293, 'YAMAHA JG', '', '', 'JL. RAYA INDIHIANG TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(294, 'PT. DELAMI GARMENT INDUSTRIES', '', '', 'JL. ALAYDRUS NO.19 PETOJO UTARA GADJAH MADA JAKARTA PUSAT', 'Jakarta Pusat', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(295, 'PT. IM TECHNOLOGIES', '', '', 'LANDMARK CENTER 18 JL. JEND. SUDIRMAN NO.1 JAKARTA', 'Jakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(296, 'MASTE TRANS ACADEMY', '', '', 'PERUM BUKIT INDIHIANG PERMAI BLOK C NO.1 DEPAN TERMINAL INDIHIANG', 'Tasikmalaya', '', '', '', 'Rohdian', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(297, 'POLITEKNIK REKAYASA INDORAMA', '', '', 'PURWAKARTA', 'Purwakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(298, 'PT. TRISULA GARMINDO', '', '', 'JL. RAYA KOPO SOREANG KM.11,5 BANDUNG', 'Bandung', '', '', '', 'Eni', '', '8225896870', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(299, 'PT. INTRA SARI RAYA', '', '', 'JL. GUBERNUR SEWAKA NO.4', 'Tasikmalaya', '', '', '', 'Usep/ pa agus', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(300, 'PT. MEIDOH', '', '', 'KARAWANG', 'Karawang', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(301, 'SILICON ONE COMPUTER', '', '', 'JL. LENGKONG KECIL NO.45A BANDUNG', 'Bandung', '', '', '', 'Eko', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(302, 'SAGARAYA INTI PRIMA (SIP)', '', '', 'JL. PERUM PONDOK JATI INDAH NO.10B TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Heri Sugara, SE', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(303, 'CV. BERKAH BERSAMA MADANI', '', '', 'JL. RAYA GUNUNG GALUNGGUNG SINGAPARNA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ir. H. Bambang Wijanarko', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(304, 'PT. SARI AYU INDONESIA', '', '', 'JL. RAYA SITU GEDE TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Agung', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(305, 'KANTOR NOTARIS HANI', '', '', 'JL. MESJID AGUNG TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Hj. Hani, SH', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(306, 'PT. MITRA SAPPHIRE GRUP', '', '', 'JL. LETNAN HARUN KEL. SUKARINDIK TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Mei Suyanto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(307, 'GLOBAL ENGLISH COURSE', '', '', 'JL. TENTARA PELAJAR NO.30 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Erika Apriliany, SPd', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(308, 'PT. UDM (USAHA DIGDAYA MUNCUL)', '', '', 'JL. RE. MARTADINATA NO.206 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Teguh Yulianto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(309, 'PT. SATRIA RAYA MAKMUR LESTARI', '', '', 'JL. IR. H. JUANDA NO.21 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bonita', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(310, 'PT. CEMKO INDUSTRIES', '', '', 'JL. JABABEKA RAYA BLOK F NO.19-28 CIKARANG', 'Cikarang', '', '', '', 'Nurhakim', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(311, 'PT. CHYODA INTEGREE', '', '', 'KAWASAN INDUSTRI SURYACIPTA BLOK B.26-B.30 TELUK JAMBE KARAWANG', 'Karawang', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(312, 'TOKO SUKSES', '', '', 'JL. PASAR BARU II NO.40 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Handry', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(313, 'PT. KREASI AUTO KENCANA (AUTO KENCANA GROUP)', '', '', 'JL. BOULEVARD RAYA BLOK LC 8 NO.1 KELAPA GADING JAKARTA UTARA', 'Jakarta Utara', '', '', '', 'Dila Sandhi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(314, 'PT. ASIA PASIFIC FIBERS', '', '', 'KAWASAN KLARI DESA KIARA PAYUNG KEC. KLARI KARAWANG', 'Karawang', '', '', '', 'Ade', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(315, 'PT. GUNZE INDONESIA', '', '', 'KAWASAN INDUSTRI EJIP PLOT 7 H-1 CIKARANG SELATAN', 'Cikarang Selatan', '', '', '', 'Elwani Eprianto', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(316, 'MALIBU STUDIO CAB ALAM SUTRA', '', '', 'ALAM SUTERA TANGERANG', 'Tangerang', '', '', '', 'Sisca', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(317, 'PT. BPR CIPATUJAH', '', '', 'JL. RAYA CIPATUJAH', 'Tasikmalaya', '', '', '', 'Fajar', '', '81394491011', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(318, 'CV. BAGJA ABADI', '', '', 'JL. MOCH.HATTA NO.136 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Junaedi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(319, 'ASKRINDO TASIKMALAYA', '', '', 'JL. YUDANEGARA NO.28 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Amir', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(320, 'BEZAYA (EL-ZATTA)', '', '', 'JL. HZ. MUSTOFA RUKO DEKAT ASIA PLAZA KOTA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Dina Nuraeni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(321, 'PT. DUTA LESTARI SENTRATAMA (KINO GROUP)', '', '', 'JL. SOEKARNO HATTA NO.447 KAV.3-6 LION CARGO CISEUREUH REGOL BANDUNG', 'Bandung', '', '', '', 'Vera Shelya Purba', '', '82128063754', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(322, 'PT. QL TRIMITA & AGROFOOD', '', '', 'JL.SINDANGLAYA NO.100 CIPAROS CIANJUR', 'Cianjur', '', '', '', 'Artika', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(323, 'PT. UTAMA YURIM INDAH', '', '', 'CIBUNGUR CIBODAS PURWAKARTA', 'Purwakarta', '', '', '', 'Bapak Dadang', '', '81809113111', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(324, 'PT. INFORMATIKA REKA MANDIRI', '', '', 'JL.JALAK NO.10 RT.03/RW.08 SADANG SERANG COBLOG BANDUNG', 'Bandung', '', '', '', 'Gita Nurul', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(325, 'CV. CAHYA SIMPATI', '', '', 'JL. TAMANSARI GROBAS TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Andi', '', '83826085085', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(326, 'CV. AKUPRESURE NY. YULI S', '', '', 'JL.SURYALAYA XII NO.03 BUAH BATU BANDUNG', 'Bandung', '', '', '', 'Wiryanto', '', '8179043017', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(327, 'PT. MITRA INTEGRASI INFORMATIKA', '', '', 'APL TOWER LANTAI 37 JL. LETJEN S. PARMAN KAV. 28 KODE POS : 11470', 'Jakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(328, 'PT. DUTA MEDIA MANDIRI (DMM)', '', '', 'JL. ALTERNATIF CIBUBUR KAV. DDN 113 HARJAMUKTI CIMANGGIS DEPOK 16954 (PUSAT) JL. RAYA TEUKU UMAR KM 44 CIBITUNG BEKASI (POOL)', 'Bekasi', '', '', '', 'H. Ade/ Lukmanul Hakim', '', '81316162033', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(329, 'PT. AMPAT YASA INTERMODA', '', '', 'KOMP. DUTA MAS FATMAWATI BLOK D.2 NO. 9-10 JL. RS FATMAWATI CIPETE UTARA KEBAYORAN BARU JAKARTA SELATAN', 'Jakarta Selatan', '', '', '', 'Andi Pramuda', '', '811862278', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(330, 'PT. SANGGRAHA INTI JAYA', '', '', 'JAKARTA', 'Jakarta', '', '', '', 'Andy', '', '811862278', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(331, 'KHALIFAH COLLECTION', '', '', 'KOMP. LIK B:14 JL. PITA RT.03 RW.11 KEL. MULYASARI KEC. TAMANSARI', 'Tasikmalaya', '', '', '', 'Ohan', '', '8121480193', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(332, 'PT. BLUE BIRD GROUP', '', '', 'JL. MAMPANG PRAPAT RAYA NO.60 JAKARTA SELATAN', 'Jakarta Selatan', '', '', '', 'Ibu Dyah', '', '81511390992', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(333, 'LATEFAH', '', '', 'JL. RE. MARTADINATA NO.211 TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(334, 'PT. BPR MULIATANA DANANJAYA', '', '', 'JL. RAYA CILEUNGSI BOGOR', 'Bogor', '', '', '', 'Ibu Rika', '', '87780309099', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(335, 'LP3BPM', '', '', 'JL. HZ MUSTOFA KOMP.RUKO,PERMATA REGERENCY NO.34', 'Tasikmalaya', '', '', '', 'Mia', '', '85323389766', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(336, 'PT. DONGYANG ILLUST', '', '', 'DESA CUKOPO PURWAKARTA', 'Purwakarta', '', '', '', 'Fauzi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(337, 'PT.MEPROFARM', '', '', 'PERUM GRIYA PERMATA INDAH KP.GUNUNG JAMBU MANCAGAR NO.17 RT.06 RW.14 PANGLUYUNAN', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(338, 'PT. INDO INVESTAMA', '', '', 'JL. JAENAL ASIKIN NO.11 KAUM TENGAH CIAWI', 'Tasikmalaya', '', '', '', 'Yandi', '', '898619381', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(339, 'PT. CIPAGANTI CIPTA GRAHA JAKARTA PUSAT', '', '', 'RUKO CEMPAKA MAS BLOKMAMNO.28', 'Jakarta Pusat', '', '', '', 'Yadi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(340, 'PT. MGI CABANG TASIKMALAYA', '', '', 'JL.MOH HATTA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Isyam', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(341, 'PT.SUZUKI LIMA MOTOR SUBANG', '', '', 'JL.OTISTA NO 104-106', 'Subang', '', '', '', 'Susi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(342, 'PT. BANK MANDIRI', '', '', 'JL. SUTISNA SENJAYA NO.88', 'Tasikmalaya', '', '', '', 'Agung Wahyu P', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(343, 'PT. DHANAR MAS CONCERN', '', '', 'JL.CISIRUNG CITEPUS MOH.HATTA KM.6,8 BANDUNG', 'Bandung', '', '', '', 'Jesica', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(344, 'PT.BPR MITRA KOPAJA MANDIRI', '', '', 'JL. RTA PRAWIRA ADININGRAT NO.190 MANONJAYA', 'Tasikmalaya', '', '', '', 'Yanti', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(345, 'CV> HELMIRA JAYA', '', '', 'JL. HZ. MUSTOFA RUKO PERMATA REGENCY NO.25', 'Tasikmalaya', '', '', '', 'Hendra Saputra', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(346, 'SINAR MULYA MOBIL', '', '', 'JL. EZ. KH. MUTTAQIN', 'Tasikmalaya', '', '', '', 'Kalitsa K', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(347, 'BPR NBP', '', '', 'JL. RAJAPOLAH NO.238A KEC. RAJAPOLAH', 'Tasikmalaya', '', '', '', 'Euis', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(348, 'BED COVER SOLUTION', '', '', 'JL. MOH HATTA NO.137', 'Tasikmalaya', '', '', '', 'Ir. Yuskar', '', '8522110423', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(349, 'CV. AMIMAS JAYA', '', '', 'JL. CIPEDES III', 'Tasikmalaya', '', '', '', 'Amin', '', '81320766536', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(350, '3G KOMUNIKASI', '', '', 'PERUMAHAN BSM TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Denny P', '', '85223777777', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(351, 'PT. TRADISI MANUFACTURING INDUSTRY', '', '', 'KAWASAN INDUSTRI KIIC JL. PERMATA RAYA LOT E-1 KARAWANG BARAT', 'Karawang Barat', '', '', '', 'Yayuk', '', '81228072233', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(352, 'REI INDONESIA', '', '', 'JL. GURBERNUR SEWAKA NO.1', 'Tasikmalaya', '', '', '', 'Edi', '', '81312925586', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(353, 'PT. NBCI', '', '', 'JL. MALIGI I LOT. A9-10KAWASAN INDUSTRI KIIC', 'Karawang', '', '', '', 'Rulita', '', '85722670', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(354, 'PT. MIZOBATALAJU INDONESIA', '', '', 'JL. MALIGI II LOT C-7F KAWASAN INDUSTRI KIIC', 'Karawang', '', '', '', 'Dwina', '', '88808610000', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(355, 'PT. BERDIRI MATAHARI LOGISTIK', '', '', 'JL. MALIGI II LOT.4-7 KARAWANG', 'Karawang', '', '', '', 'Thomas Agung', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(356, 'LPK DAEHAN KOREA', '', '', 'JL. RE. MARTADINATA NO.21 BANDUNG', 'Bandung', '', '', '', 'Dicky', '', '85723432', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(357, 'PT.MELENIUM PENATA FUTURES', '', '', 'JL. WR SUPRATMAN NO. 21 BANDUNG', 'Bandung', '', '', '', 'Bambang', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(358, 'DANONE', '', '', 'KARAWANG', 'Karawang', '', '', '', 'Bapak Billy', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(359, 'PT. ATSU METIK INDONESIA', '', '', 'SURYA CIPTA CITY OF INDUSTRY JL. SURYA MADYA KAV.1-29F', '', '', '', '', 'Esty Prasetya', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(360, 'TOKO BUKU KARISMA', '', '', 'MAYASARI PLAZA JL. PASAR WETAN TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Sandi', '', '87878079370', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(361, 'PT. ASURANSI JIWA GENERALI INDONESIA', '', '', 'KOMLPEK RUKO ASIA PLAZA NO.A12 JL. H.Z MUSTOFA NO.326 TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Donny Leo', '', '82311156780', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(362, 'PT. MUTUALPLUS GLOBAL RESAURCES', '', '', 'JL. KARAPITAN NO. 106 A BANDUNG', 'Bandung', '', '', '', 'Khoirunisyah S', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(363, 'PT. PERDANA PERKASA ELASTINDO (PERSAELS)', '', '', 'JL. BKR 166H LINGKAR SELATAN BANDUNG', 'Bandung', '', '', '', 'Ibu Trie Astria Setiawati', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(364, 'PT. SUPER SPRING', '', '', 'JL. H.Z. MUSTOFA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Asep', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(365, 'PT. KEIHIN INDONESIA', '', '', 'KAWASAN INDUSTRI MM 2100 BI JJ/1 BEKASI', 'Bekasi', '', '', '', 'Kailan Ibrahim', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(366, 'PT. BINTANG NIAGA MOTOR CRB', '', '', 'JL. FATAHILLAH (DEPAN RRI WERU) BLOK KALIANDUL DESA SETU KULON WERU CIREBON', 'Cirebon', '', '', '', 'Tatag N', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(367, 'MNC PLAY MEDIA BANDUNG', '', '', 'JL. SOEKARNO HATTA NO.496 BANDUNG', 'Bandung', '', '', '', 'Purnomo', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(368, 'BTPN', '', '', 'BTPN PURNABAKTI BURANGRANG LT.3 JL. BURANGRANG NO.26 BANDUNG', 'Bandung', '', '', '', 'Faisal', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(369, 'BTPN SYARIAH', '', '', 'JL. CIKAPUNDUNG TIMUR NO.1 LT.2 BANDUNG', 'Bandung', '', '', '', 'Rijalul Haq', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(370, 'TOKO CAHAYA TERANG', '', '', 'KOMP. RUKO MAYASARI PLAZA JL.PASAR KULON', 'Tasikmalaya', '', '', '', 'Ibu Dian', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(371, 'PT. SANTOS JAYA ABADI', '', '', 'JL. GUBERNUR SEWAKA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Bapak Sani', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(372, 'PT. LEMIGAS', '', '', 'JL. GATOT SUBROTO JAKARTA SELATAN', 'Jakarta Selatan', '', '', '', 'Iwan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(373, 'PT. INTI DAYA GUNA ANEKA WARNA', '', '', 'JL. PASEH NO.261 SAMBONG PARI', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(374, 'PT. ROYAL DIAMONS (D/H SHAPPIRE GROUP)', '', '', 'JL. LETNAN HARUN', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(375, 'PT. VINUS MERAH ABADI', '', '', 'KP. MEKAR HARJA RANDEGAN BANJAR', 'Banjar', '', '', '', 'Irfan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(376, 'KANTOR NOTARIS MARLINA, SH', '', '', 'JL. SUTISNA SENJAYA KOTA TASIKMALAYA', 'Tasikmalaya', '', '', '', 'Ibu Marlina, SH', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(377, 'PT. TJIWULAN PUTRA MANDIRI', '', '', 'GUNUNG TANJUNG KAWALU', 'Tasikmalaya', '', '', '', 'H. Undang/ Hamzah Zarkasih', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(378, 'PT. LEMINDO ABADI JAYA (LAJ)', '', '', 'JL. LEMINDO NO.1 GUNUNG PUTRI BOGOR', 'Bogor', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(379, 'PT. NUTRIFOOD INDONESIA', '', '', 'KAWASAN INDUSTRI MM 2100 CIBITUNG JL. SELAYAR BLOK H7-H8 CIKARANG BARAT', 'Cikarang Barat', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(380, 'PT. PRITECH INDONESIA', '', '', 'GRAHA ARSA BUILDING, 3RD FLOOR JL.SIAGA RAYA NO.31 JAKARTA 12510', 'Jakarta', '', '', '', 'Ibu Rini', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(381, 'PT. FORUM INOVASI PRIMA', '', '', 'KAWASAN INDUSTRI PULO GADUNG JAKARTA', 'Jakarta', '', '', '', 'Elga', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(382, 'PT. SURYA SARANA DINAMIKA', '', '', 'PERKANTORAN MEGA SUNTER BLOK B, JL.DANAU SUNTER SELATAN NO.40', 'Jakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(383, 'PT. USAHA SAUDARA MANDIRI', '', '', 'JL. HAJI ANING NO. 88 RT 001 RW 03 GEBANG RAYA PERIUK', 'Bekasi', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(384, 'PT. PHAROS INDONESIA', '', '', 'JL. LIMO NO. 40 PERMATA HIJAU', 'Jakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(385, 'RONI DESIGN', '', '', 'KOMPLEK MAYASARI PLAZA LT. 3', 'Tasikmalaya', '', '', '', 'Roni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(386, 'CV. LUMBA-LUMBA', '', '', 'JL. SELAKASO NO. 46', 'Tasikmalaya', '', '', '', 'Irma S. Handayani', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(387, 'PT. TIRTA ANGKASA', '', '', 'JL. IR. H. DJUANDA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(388, 'SEKOLAH PAPER ASSET ATENSI', '', '', 'GRAHA POS BLOK. C LT. 5 JL. BENDA NO. 30', 'Tasikmalaya', '', '', '', 'Adam Nova', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(389, 'PT. ASIA CITRA PRATAMA', '', '', 'JL. SURYA UTAMA KAV. 1-25A1', '', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(390, 'CV. MANDIRI JAYA', '', '', 'JL. JEND. SUDIRMAN NO. 37', 'Jakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(391, 'PT. SATRIA PRIMAJAYA LESTARI', '', '', 'JL. SATRIA RAYA I NO. 5', '', '', '', '', 'Pak Teten', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(392, 'TOKO BRAVO', '', '', 'KOMPLEK PASAR CIKURUBUK', 'Tasikmalaya', '', '', '', 'Johan', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(393, 'CV. HPE', '', '', 'JL. BEBEDILAN NO. 38', 'Tasikmalaya', '', '', '', 'Niko', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(394, 'PT. SUMMIT ADYAWINSA', '', '', 'JL. PANGKAL PERJUANGAN NO. 98 DS. TANJUNG MEKAR', '', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(395, 'PT. MAYORA INDAH TBK', '', '', 'JALAN TOMANG RAYA NO. 21-23', 'Jakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(396, 'ARIES OFFSET', '', '', 'JL. AMPERA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(397, 'YAMAHA ARISTA', '', '', 'JL. SUTISNA SENJAYA', 'Tasikmalaya', '', '', '', 'Adi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(398, 'PT. PERSADA BUANA', '', '', 'JL. IR.H.JUANDA NO.188, LINGGAJAYA,CIHIDEUNG, TASIKMALAYA, JAWA BARAT 46123', 'Tasikmalaya', '', '', '', 'Bpk. Edis', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(399, 'LP3I METROPOLIS', '', '', 'GRAHA SUDIRMAN, JL. JEND.SUDIRMAN, KEC. TANGERANG', 'Tangerang', '', '', '', 'Bapak Mashudi', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(400, 'AKSES MEDIA', '', '', 'JL. RAYA MANGKUBUMI', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(401, 'RS PERTAMINA CIREBON', '', '', 'JL RAYA KLAYAN', 'Cirebon', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(402, 'PERUMAHAN DE RENYA HILLS', '', '', 'JL. RAYA BOGOR', 'Bogor', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(403, 'KPP PRATAMA TASIKMALAYA', '', '', 'JL. SUTISNA SENJAYA NO. 154', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(404, 'TASIK.COM', '', '', 'MANGKUBUMI', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(405, 'YAYASAN AL-MUTTAQIN', '', '', 'JL. SUTISNA SENJAYA KECAMATAN TAWANG', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(406, 'YOUNG BILLIONAIRE ACADEMY GARUT', '', '', 'GARUT', 'Garut', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(407, 'BRI PUSPAHIANG', '', '', 'JL. PUSAPAHIANG', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(408, 'BENGKEL MOTOR', '', '', 'TASIKMALAYA', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(409, 'MTS RAJADESA', '', '', 'RAJADESA', 'Ciamis', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(410, 'DEALER MOTOR', '', '', 'BANJAR', 'Banjar', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(411, 'FIF FINANCE', '', '', 'JL. R. E. MARTADINATA', 'Tasikmalaya', '', '', '', 'Hatta', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(412, 'ADLIN', '', '', 'PEUNDEUY LINGGAJAYA MANGKUBUMI RT/RW 05/10', 'Tasikmalaya', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(413, 'AUTO 2000 SUNTER', '', '', 'JL. LAKS. YOS SUDARSO KAV 46-48 SUNTER', 'Jakarta', '', '', '', '-', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(414, 'PT. BENTOEL DISTRIBUSI UTAMA', '', '', 'JL. PERINTIS KEMERDEKAAN NO. 279 KAWALU TSM', 'Tasikmalaya', '', '', '', 'Novi Nugraha', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(415, 'PT. SENTRALSARI PRIMASENTOSA', '', '', 'JL. GEGERNOONG RT 01/01 NO. 48 KEC. TAMANSARI', 'Tasikmalaya', '', '', '', 'Roni', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(416, 'PT. BATERINDO SUKSES MANDIRI', '', '', 'GV98+HJF, CIBINONG, KEC. CIBINONG, KABUPATEN BOGOR, JAWA BARAT 16911', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(417, 'PT. GOLDEN EXPRESSINDO (PT.\nGARUDA LOGISTICS)', '', '', 'JL. KEMUKUS NO.32, RT.9/RW.7, PINANGSIA, KEC. TAMAN SARI, KOTA JAKARTA BARAT, DAERAH KHUSUS IBUKOTA JAKARTA 11110', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(419, 'BPR ARTHASARIGUNA', '', '', 'M662+RP4, LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(420, 'PT. BETON ELEMEN PERSADA', '', '', 'DEKAT INDOMARET, JL. PERINTIS NO.1, SARIJADI, KEC. SUKASARI, KOTA BANDUNG, JAWA BARAT 40151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(421, 'CV. CIPTA NIAGA MANDIRI', '', '', 'CV. CIPTA NIAGA MANDIRI', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(422, 'LEMBAGA PRAWITA TASIKMALAYA', '', '', 'JL. MERDEKA NO.4, TAWANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46112', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(423, 'PT. HUDAYA MAJU MANDIRI', '', '', 'JL. RAYA WANTILAN-CIPEUNDEUY, WANTILAN, KEC. CIPEUNDEUY, KABUPATEN SUBANG, JAWA BARAT 41272', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(424, 'CV. SINAR JAYA CELL TASIK', '', '', 'JL. AHMAD YANI KOMPLEK RUKO PANCASILA NO.53, LENGKONGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46111', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(425, 'PT. VELVET TEXTILE INDONESIA (VELTEKSA)', '', '', 'JL. SUMEDANG NO.4, KACAPIRING, KEC. BATUNUNGGAL, KOTA BANDUNG, JAWA BARAT 40271', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(426, 'PT. MUHIBAH BUANA UTAMA TOUR & TRAVEL', '', '', 'JL. SEKEJATI NO.4, KB. KANGKUNG, KEC. KIARACONDONG, KOTA BANDUNG, JAWA BARAT 40284', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(427, 'ALIA SUKAPURA', '', '', 'M57X+9VH, JL. BOJONG LIMUS, LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(428, 'PT PERKASA ABADI MAKMUR', '', '', 'JL. SL. TOBING NO.28, MANGKUBUMI, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(429, 'PT ASIA TRITUNGGAL JAYA ASIA PLAZA', '', '', 'JL. HZ. MUSTOFA NO.326, TUGUJAYA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46126', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(430, 'PT ASIH TUNGGAL |ASTA', '', '', 'M55W+PWQ, JL. IR. H. JUANDA, LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(431, 'PT MITRA SHAPPIRE SEJAHTERA', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(432, 'PT PERFECT GLOBAL', '', '', 'MANGGA DUA SQUARE BLOK G NO. 1, 2, 3, JL. GN. SAHARI NO.1, RT.11/RW.6, ANCOL, KEC. PADEMANGAN, KOTA JKT UTARA, DAERAH KHUSUS IBUKOTA JAKARTA 14430', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(433, 'PT YASOTEX MANDIRI', '', '', 'JL. PAGADEN NO.52, GUNUNGTANDALA, KEC. KAWALU, KAB. TASIKMALAYA, JAWA BARAT 46182', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(434, 'CITRA GROUP (CV. CITRA PRATAMA)', '', '', 'JL. KOTABARU RAYA NO.15, CIATEUL, KEC. REGOL, KOTA BANDUNG, JAWA BARAT 40252', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(435, 'PT. DIPRO SOLUSI COMUNICATION', '', '', 'GEDUNG TIMSCO, JL. KWINI NO.1 SENEN, RT.9/RW.1, SENEN, KEC. SENEN, KOTA JAKARTA PUSAT, DAERAH KHUSUS IBUKOTA JAKARTA 10410', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(436, 'PT. LEJEL HOME SHOPPING', '', '', 'JL. MERUYA ILIR RAYA NO.131, RT.1/RW.6, KBY. LAMA UTARA, KEC. KBY. LAMA, KOTA JAKARTA BARAT, DAERAH KHUSUS IBUKOTA JAKARTA 11620', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(437, 'PT. JESI JASON SURYA MAKMUR', '', '', 'JL. DR. CIPTO NO.94, BODEAN, KRANGGAN, KEC. AMBARAWA, KABUPATEN SEMARANG, JAWA TENGAH 50613', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(438, 'RSIA UMMI TASIKMALAYA', '', '', 'JL. PASEH NO.10, TUGURAJA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46124', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(439, 'CV. TIGA BINTANG SEJAHTERA', '', '', 'H732+87M, TASARI, TELUK, KEC. PURWOKERTO SEL., KABUPATEN BANYUMAS, JAWA TENGAH 53145', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(440, 'PT. LANGIT ITU BIRU', '', '', 'JL. SUKARINDIK NO.20, SUKARINDIK, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(441, 'PT. MAYASARI BAKTI UTAMA DIV. PROPERTY', '', '', 'JL. RAYA BOGOR NO.KM. 24 NO. 71, RT.2/RW.7, SUSUKAN, KEC. PS. REBO, KOTA JAKARTA TIMUR, DAERAH KHUSUS IBUKOTA JAKARTA 13750', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(442, 'PT. WULING PRIMA FATMAWATI', '', '', 'JL. RS. FATMAWATI RAYA.45A-E, RT.6/RW.5, CIPETE SEL., KEC. CILANDAK, KOTA JAKARTA SELATAN, DAERAH KHUSUS IBUKOTA JAKARTA 12420', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(443, 'PT JITU INDO RITNAS', '', '', 'PALAIS DE PARIS I22-23 JL. BOULEVERD RAYA KOTA DELTAMAS, SUKAMAHI, KEC. CIKARANG PUSAT, KABUPATEN BEKASI, JAWA BARAT 17523', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(444, 'PRIMAJASA TASIKMALAYA', '', '', 'JL. RAYA RAJAPOLAH - TASIKMALAYA NO.226-224, PANYINGKIRAN, KEC. INDIHIANG, KAB. TASIKMALAYA,', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(445, 'PT. MITRA INDO MEGAH ABADI', '', '', 'JL. NAGARAWANGI NO.62, NAGARAWANGI, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 4612', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(446, 'PT GRAHA MEDINA CIPTA', '', '', 'JL. RAYA WANARAJA NO.463, TEGALPANJANG, KEC. WANARAJA, KABUPATEN GARUT, JAWA BARAT 44183', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(447, 'FORTUNA Motor', '', '', 'CIPEDES, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46133', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(448, 'PT. KINENTA INDONESIA', '', '', 'JL. RAYA NAROGONG KM 12 NO.77 PANGKALAN 4 KEL. CIKIWUL KEC, RT.003/RW.006, CIKIWUL, BANTAR GEBANG, BEKASI CITY, WEST JAVA 17', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(449, 'PT. Arista Mitra  Lestari', '', '', 'JL. RAYA GEGESIK, GEGESIK LOR, KEC. GEGESIK, KABUPATEN CIREBON, JAWA BARAT 45164', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(450, 'PT BATERINDO SUKSES MANDIRI', '', '', 'INDIHIANG, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(451, 'PT CAKRA PUTRA PARAHYANGAN', '', '', 'JL. DR. MOH.HATTA NO.158, SUKAMANAH, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46131', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(452, 'RONYS DESIGN', '', '', 'JL. SUTISNA SENJAYA NO.36, EMPANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46134', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(453, 'AKSARAJAYA GROUP TASIK', '', '', 'JL. KAPTEN NASEH NO.40, PANGLAYUNGAN, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 4613', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(454, 'MARTAJAYA', '', '', 'JL. MARTADINATA', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(455, 'BAROKAH JAYA GRAFIKA', '', '', 'JL. R.E. MARTADINATA NO.47 A, CIPEDES, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46133', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(456, 'CV. QUICK COPRATION CORPORATION ', '', '', 'KOMP. BUMI ORANGE BLOK E1 NO 45, CIMEKAR, KEC. CILEUNYI, KABUPATEN BANDUNG, JAWA BARAT 40624', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(457, 'CV. NUELA', '', '', 'JL. CIPEDES I NO.32, CIPEDES, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46133', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(458, 'CV. AMYYMAS JAYA', '', '', 'HF33+HPH, JL. RAYA MLIRIP, MLIRIP, KEC. JETIS, KABUPATEN MOJOKERTO, JAWA TIMUR 61352', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(459, 'RENGGANIS ', '', '', 'P652+H3M, KAMPUNG CIUMBENG JL. IBRAHIM ADJIE, INDIHIANG, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(460, 'AL- GHANI', '', '', 'M5HX+3Q9, JL. BANTAR, BANTARSARI, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(461, 'BERKAH JAYA', '', '', 'JL. CIMUNCANG, SUKAMULYA, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(462, 'CV. AMYMAS JAYA', '', '', 'JLN PETRO CINA NOMOR 99 KLALIN, MALAINGKEDI, KEC. SORONG UTARA, KOTA SORONG, PAPUA BAR. 98412', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(463, 'RONSY DESIGN', '', '', 'JL. SUTISNA SENJAYA NO.36, EMPANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46134', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(464, 'PT. Prima Wahana Aout Mobil', '', '', 'JAKARTA', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(465, 'Ray White Central Bandung', '', '', 'JL. KALIPAH APO NO.30, KARANGANYAR, BANDUNG, KOTA BANDUNG, JAWA BARAT 40241', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(466, 'PT. Solid Fintek Indonesia', '', '', 'BLOK B RUKO GREATWALL, JL. GREEN LAKE CITY BOULEVARD NO.27, PETIR, KEC. CIPONDOH, KOTA TANGERANG, BANTEN 15147', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(467, 'PT. Jitu Indo Ritnas', '', '', 'JL. DELTAMAS BOULEVARD, RUKO PALIS DE PARIS NO. 22, SUKAMAHI, CIKARANG PUSAT, BEKASI 175530', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(468, 'PT.PRIMA WAHANA AUTO MOBIL', '', '', 'JL. RS. FATMAWATI RAYA.45A-E, RT.6/RW.5, CIPETE SEL., KEC. CILANDAK, KOTA JAKARTA SELATAN, DAERAH KHUSUS IBUKOTA JAKARTA 12420', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(469, 'PT. MITRA DESA BERSAMA CISUKA', '', '', 'P5JP+WQV, JATIHURIP, KEC. CISAYONG, KABUPATEN TASIKMALAYA, JAWA BARAT 46153', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(470, 'CV. SKYLAR', '', '', 'JL. LETNAN HARUN NO.33, SUKARINDIK, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(471, 'PT. KRESNA REKSA FINANCE', '', '', 'JL. PINANG RANTI II NO.11, RT.1/RW.6, MAKASAR, KEC. MAKASAR, KOTA JAKARTA TIMUR, DAERAH KHUSUS IBUKOTA JAKARTA 13560', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(472, ' KSP MITRA DHUAFA (KOMIDA)', '', '', 'JL. RAYALENTENG AGUNG KM.3, NO. 10, RT.04/RW.01, RT.4/RW.1, LENTENG AGUNG, JAKARTA SELATAN, KOTA JAKARTA SELATAN, DAERAH KHUSUS IBUKOTA JAKARTA 12610', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(473, 'PT. BCA MULTI FINANCE', '', '', 'WTC MANGGA DUA JL. MANGGA DUA RAYA NO. 8 LANTAI 6, BLOK CL 001, RW.5, ANCOL, KEC. PADEMANGAN, KOTA JKT UTARA, DAERAH KHUSUS IBUKOTA JAKARTA 14430', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(474, 'PT. LANGIT ITU BIRU (LIB)', '', '', 'JL. KOPO TIMUR NO. 153 PEGASIH KOTA BANDUNG', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(475, 'PT. GARUDA LOGISTICS', '', '', 'JL. KEMUKUS 32 BLOK B/ 09 KEL. PINANGSIA KEC. TAMANSARI JAKARTA BARAT', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(476, 'ALAM JAYA MAKMUR', '', '', 'JL. PERINTIS KEMERDEKAAN KAWALU KOTA TASIKMALAYA', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(477, 'LP3I PURWAKARTA', '', '', 'JL. TERUSAN IBRAHIM SINGADILAGA, PURWAMEKAR, KEC. PURWAKARTA, KABUPATEN PURWAKARTA, JAWA BARAT 41151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(478, 'PT. GRAHA MEDINA CIPTA', '', '', 'JL. RAYA WANARAJA NO.463, TEGALPANJANG, KEC. WANARAJA, KABUPATEN GARUT, JAWA BARAT 44183', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(479, 'PT. ADVANTAGE SCM', '', '', 'JL. GUDANG JERO II NO.24, PANGLAYUNGAN, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46134', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(480, 'PT. SAI INDONESIA (SARI AYU MARTHATILAAR)', '', '', 'KW. INDUSTRI PULOGADUNG, JL. RAWA BALI II NO.5, RW.3, RW. TERATE, KEC. CAKUNG, KOTA JAKARTA TIMUR, DAERAH KHUSUS IBUKOTA JAKARTA 13920', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(481, 'PT. NIAGA NUSA ABADI (CLASSMILD)', '', '', '395X+WR3, JL. BY PASS, PISANG, KEC. PAUH, KOTA PADANG, SUMATERA BARAT 25147', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(482, 'PT. SWAKARYA INSAN MANDIRI', '', '', 'JL. R.E. MARTADINATA TASIKMALAYA', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(483, 'CV. ANUGRAHA CAHAYA ', '', '', 'MM7P+QXJ, CIHANDIWUNG KIDUL, WANAREJA, KEC. WANAREJA, KABUPATEN CILACAP, JAWA TENGAH 53265', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(484, 'HUDAYA MAJU MANDIRI', '', '', 'JL. RAYA TEUKU UMAR NO.KM 44, GANDASARI, KEC. CIKARANG BAR., KABUPATEN BEKASI, JAWA BARAT 17530', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(485, 'RS. BERSALIN  UMMI', '', '', 'JL. PASEH NO.10, TUGURAJA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46124', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(486, 'PT. CAKRA PUTRA PARAHYANGAN', '', '', 'JL. DR. MOH.HATTA NO.158, SUKAMANAH, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46131', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(487, 'PT. MANGGALA KIAT ANANDA', '', '', 'JL. SUKARINDIK NO.20, SUKARINDIK, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 4615', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(488, 'CIPTA NIAGA SEMESTA/ SNS (MAYORA GROUP)', '', '', 'JL. SUKASENANG-TANJUNGKAMUNING, HAURPANGGUNG, KEC. TAROGONG KIDUL, KABUPATEN GARUT, JAWA BARAT 44151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(489, ' CV. SUKAHATI PERTAMA ', '', '', 'JL. SAMBONG JAYA, SAMBONGPARI, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(490, 'TRIE MUKTY PERTAMA PUTRA', '', '', 'JL. PASANGGRAHAN NO.39, INDIHIANG, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(491, 'PT. DAYA ANUGRAH MANDIRI', '', '', 'JL. TUPAREV NO.5, KEJAKSAN, KEC. KEJAKSAN, KOTA CIREBON, JAWA BARAT 45131', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(492, 'PT. MAYA SARIBAKTI UTAMA DIV. PROPERTY', '', '', 'PERUM GRAND MAYASARI ESTATE, JL. BKR, KAHURIPAN, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46115', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(493, 'PT. TJIWULAN PUTRA MANDIRI ', '', '', 'ATC, JL. K.S. TUBUN, RT.8/RW.2, KOTA BAMBU SEL., KEC. PALMERAH, KOTA JAKARTA PUSAT, DAERAH KHUSUS IBUKOTA JAKARTA 10260', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(494, 'BPR BANJAR ARTHASARIGUNA', '', '', 'LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(495, 'CV. TIGA BINTANG SEJAHTERA ', '', '', 'TASARI, TELUK, KEC. PURWOKERTO SEL., KABUPATEN BANYUMAS, JAWA TENGAH 53145', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(496, 'CV. TIRTA TIMUR ABADI ', '', '', 'SUKAMAJUKIDUL, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(497, 'PT. SUMBER MAKMUR', '', '', 'JALAN PASAR WETAN NO.100, CILEMBANG, CIHIDEUNG, ARGASARI, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46123', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(498, 'SUMBER MAKMUR', '', '', 'JL. SL. TOBING, TUGUJAYA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46126', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(499, 'CV. SUKAHATI PRATAMA', '', '', 'JL. SAMBONG JAYA, SAMBONGPARI, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(500, 'BTN ( BANK TABUNGAN NEGARA)', '', '', 'JL. SUTISNA SENJAYA NO. 101 TASIKMALAYA', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(501, 'PT. CIPTA NIAGA SEMESTA (MAYORA GROUP)', '', '', 'TFT JL. DJUANDA NO. 18 KOTA TASIKMALAYA', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(502, 'PT. TIGA BINTANG SEJAHTERA', '', '', 'JL. KALIPUCANG NO. 95 PANGANDARAN', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(503, 'PT. NICHOLAS LABORATORIES INDONESIA', '', '', 'JL. GUBERNUR SEWAKA NO.100, SAMBONGJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(504, 'DIALOGUE MANAGEMENT GROUP', '', '', 'TEGAR PRIMANUSANTARA PT., JL. INDUSTRI I NO.1, UTAMA, KEC. CIMAHI SEL., KOTA CIMAHI, JAWA BARAT 40234', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(505, 'DUTA MEDIA MANDIRI', '', '', 'JL. NONA MERAH, TELAGA ASIH, KEC. CIKARANG BAR., KABUPATEN BEKASI, JAWA BARAT 17530', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(506, 'FALMACO NONWOVEN INDUSTRI', '', '', 'JL. RAYA PADALARANG NO.289 KM 15.3, CIMAREME, KEC. NGAMPRAH, KABUPATEN BANDUNG BARAT, JAWA BARAT 40553', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(507, 'UD ARIF TATA LESTARI', '', '', 'JL. MAGELANG - PURWOREJO BANJARAN NO.KM, RW.9, NGENTAK, TEMPUREJO, KEC. TEMPURAN, KABUPATEN MAGELANG, JAWA TENGAH 56161', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(508, 'PT TRIMULYA', '', '', 'RAYA CIPEUNDEUY - PABUARAN KM3.5 NO. 18, KARANGMUKTI, KEC. CIPEUNDEUY, KABUPATEN SUBANG, JAWA BARAT 41262', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(509, 'CS FINANCE', '', '', 'JL. MR. IWA KUSUMA SUMANTRI NO.26, CIAMIS, KEC. CIAMIS, KABUPATEN CIAMIS, JAWA BARAT 46211', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(510, 'PT. MAJU MAPAN ', '', '', 'JL. ASEM JAYA NO.99, RT.002/RW.006, MUSTIKA JAYA, KEC. MUSTIKA JAYA, KOTA BKS, JAWA BARAT 16340', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(511, 'BUANA KASSITI GROUP (PT MITRA SHAPPHIRE SEJAHTERA)', '', '', 'JL. PANAITAN NO.20, KB. PISANG, KEC. SUMUR BANDUNG, KOTA BANDUNG, JAWA BARAT 40112', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(512, 'CITRA GROUP (CV CITRA PRATAMA)', '', '', 'JL. PINANGSIA RAYA NO.82, RT.2/RW.5, PINANGSIA, TAMAN SARI, WEST JAKARTA CITY, JAKARTA 11110', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(513, 'PT BETON ELEMEN PERSADA', '', '', 'JL RAYA KM.5 NO.18, GIRIASIH, BATUJAJAR, WEST BANDUNG REGENCY, WEST JAVA 40561', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(514, 'MITRA JAYA GROUP', '', '', 'F2X9+559, CLAUR, PARUNGKAMAL, KEC. LUMBIR, KABUPATEN BANYUMAS, JAWA TENGAH 53177', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(515, 'PT. HISBON WIRA PRAKARSA', '', '', 'JL. MANGGA BESAR VIII NO.51, RT.10/RW.1, TAMAN SARI, KEC. TAMAN SARI, KOTA JAKARTA BARAT, DAERAH KHUSUS IBUKOTA JAKARTA 11150', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(516, 'CV SGS', '', '', 'JL. NASIONAL III NO.16, LIMBANGAN BARAT, KEC. BALUBUR LIMBANGAN, KABUPATEN GARUT, JAWA BARAT 44186', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(517, 'PT DIPRO SOLUSI', '', '', 'GEDUNG TIMSCO, JL. KWINI NO.1 SENEN, RT.9/RW.1, SENEN, KEC. SENEN, KOTA JAKARTA PUSAT, DAERAH KHUSUS IBUKOTA JAKARTA 10410', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(518, 'PT MARGA JASA MEKAR', '', '', 'JL. KATAPANG KULON NO.24, CILAMPENI, KEC. KATAPANG, KABUPATEN BANDUNG, JAWA BARAT 40921', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(519, 'PT LEJEL HOME SHOOPING', '', '', 'RUKO PANDANARAN HILLS, JL. KOMPOL R. SUKAMTO NO.22, MANGUNHARJO, KEC. TEMBALANG, KOTA SEMARANG, JAWA TENGAH 50272', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(520, 'PT SOLUSI BERSAMA SENTOSA', '', '', 'JL. PAMEKAR BAR. ASRI I NO.29, MEKAR MULYA, KEC. PANYILEUKAN, KOTA BANDUNG, JAWA BARAT 40292', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(521, 'PT. OPTIMUZ', '', '', 'M6X3+R59, INDIHIANG, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(522, 'ONLINE SHOP MUKENA DESI', '', '', 'ARGASARI, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46122', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(523, 'PT PULAU MAS PEMBANGUNAN', '', '', 'PERUMAHAN BKR REGENCY NO.1, JL. BKR, SAMBONGJAYA, MANGKUBUMI, KAHURIPAN, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(524, 'PT CYBERTREND INTRABUANA', '', '', 'PT. CYBERTREND INTRABUANA, JL. KENANGA TERUSAN NO.9, RT.4/RW.3, CILANDAK TIM., KEC. PS. MINGGU, KOTA JAKARTA SELATAN, DAERAH KHUSUS', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(525, 'PT HIBSON WIRA PRAKARSA', '', '', 'JL. MANGGA BESAR VIII NO.51, RT.10/RW.1, TAMAN SARI, KEC. TAMAN SARI, KOTA JAKARTA BARAT, DAERAH KHUSUS IBUKOTA JAKARTA 11150', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(526, 'CV. CITRA PRATAMA', '', '', 'LEBAK AGUNG RRSIDENCE, LEBAKAGUNG, KEC. KARANGPAWITAN, KABUPATEN GARUT, JAWA BARAT 44182', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(527, 'MAJU MAPAN', '', '', 'PAMALAYAN, KEC. CIJEUNGJING, KABUPATEN CIAMIS, JAWA BARAT', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(528, 'PT CENTRAL SANTOSA FINANCE', '', '', 'JL. SUDIRMAN (KOMPEKS RUKO GRAND MAL, RT.001/RW.005, HARAPAN MULYA, KECAMATAN MEDAN SATRIA, KOTA BKS, JAWA BARAT 17143', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(529, 'PT. TRIMULYA', '', '', 'BLOK, JL. RUKO CEMP. MAS BLOK M1 NO.3, RW.8, SUMUR BATU, KEMAYORAN, CENTRAL JAKARTA CITY, JAKARTA 10640', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(530, 'UD. ARIEF', '', '', 'PUSAT PERDAGANGAN CARINGIN, JL. SOEKARNO HATTA, BABAKAN CIPARAY, KEC. BABAKAN CIPARAY, KABUPATEN BANDUNG, JAWA BARAT 40223', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(531, 'PT. MUHIBAH BUANA UTAMA TOURS', '', '', 'JL. SEKEJATI NO.4, KB. KANGKUNG, KEC. KIARACONDONG, KOTA BANDUNG, JAWA BARAT 40284', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(532, 'PT ASI PUDJIASTUTI AVIATION (SUSI AIR)', '', '', 'JL. MERDEKA NO.312, PANANJUNG, KEC. PANGANDARAN, KAB. PANGANDARAN, JAWA BARAT 46396', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(533, 'PT. DUTA MEDIA MANDIRI', '', '', 'JL. NONA MERAH, TELAGA ASIH, KEC. CIKARANG BAR., KABUPATEN BEKASI, JAWA BARAT 17530', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', '');
INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `bidang`, `type_perusahaan`, `alamat`, `kota`, `email`, `fax`, `kode_pos`, `kontak_person`, `jabatan`, `no_telp`, `tingkat`, `sudah_mou`, `tanggal_mulai`, `tanggal_berakhir`, `bukti_kerjasama`, `sumber`, `ket`, `relasi`, `nama`) VALUES
(534, 'PT FALMACO NONWOVEN INDUSTRI', '', '', 'JL. RAYA PADALARANG NO.289 KM 15.3, CIMAREME, KEC. NGAMPRAH, KABUPATEN BANDUNG BARAT, JAWA BARAT 40553', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(535, 'RODALINK INDONESIA', '', '', 'JL. SUTISNA SENJAYA NO.93 A, LENGKONGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46111', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(536, 'PT. BRATATEX', '', '', ', CIGUGUR TENGAH, KEC. CIMAHI TENGAH, KOTA CIMAHI, JAWA BARAT 40522', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(537, 'PT. COLOUMBINDO PERDANA', '', '', 'JL. CIBUNAR NO.8, RT.10/RW.2, DURI PULO, KECAMATAN GAMBIR, KOTA JAKARTA PUSAT, DAERAH KHUSUS IBUKOTA JAKARTA 10140', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(538, 'PT. KHARISMA MATARAM RAYA', '', '', 'JL. PARAKANHONJE, SUKAMAJUKALER, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(539, 'PRO- ART EVEN ORGANIZER', '', '', 'JL. CIMUNCANG NO.10, SUKAMULYA, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(540, 'PT. MEGA AUTO  FINANCE', '', '', 'QWQ2+7PM, KOTA KULON, KEC. GARUT KOTA, KABUPATEN GARUT, JAWA BARAT 44117', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(541, 'PT. YESTELEMEDIA', '', '', 'RUKO REMPOA NO.8 JALAN PAHLAWAN NO, 45, REMPOA, KEC. CIPUTAT TIM., KOTA TANGERANG SELATAN, BANTEN 15412', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(542, 'PT. CIPAGANTI CITRA GRAHA', '', '', 'JL. SETIAGRAHA NO.60-A, SEKEJATI, KEC. BUAHBATU, KOTA BANDUNG, JAWA BARAT 40286', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(543, 'PT. SURYA ELECTRA', '', '', 'JL. R.E. MARTADINATA NO.235, PANYINGKIRAN, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(544, 'PT. BINTANG UTAMA CEMERLANG ', '', '', 'JALAN H. AKHSAN NO.2-4, CIGERELENG, KEC. REGOL, KOTA BANDUNG, JAWA BARAT 40254', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(545, 'AGUNG CELLULAR', '', '', 'JL. HZ. MUSTOFA NO.126, YUDANAGARA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46121', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(546, 'SAMUDERA DEPT. STORE', '', '', 'JL. HZ. MUSTOFA NO.59, YUDANAGARA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46121', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(547, 'UD. SETIA MANDIRI (DISTRIBUTOR PT. SIDO MUNCUL)', '', '', 'JALAN RAYA SEMARANG SOLO KM. 28 KRAJAN DIWAK, KRAJAN, KLEPU, KEC. BERGAS, KABUPATEN SEMARANG, JAWA TENGAH 50552', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(548, 'NOTARIS LINDA M LENDRAUS, SH. MH', '', '', 'JL. TENTARA PELAJAR NO.99, EMPANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46113', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(549, 'PT. BUMI HELANG MANGKAK (BHM)', '', '', 'J3VV+PFW, JL. RAYA CIGALONTANG, CIKUNTEN, KEC. SINGAPARNA, KABUPATEN TASIKMALAYA, JAWA BARAT 46414', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(550, 'PT. RAHADHYAN INTEGRASI NUSANTARA', '', '', 'JL. HZ. MUSTOFA NO.3, KAHURIPAN, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46115', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(551, 'MALIBU62 STUDIO', '', '', 'RUKO HARJAMULIA INDAH BLOK AU, RW.06, TUK, KEC. KEDAWUNG, KABUPATEN CIREBON, JAWA BARAT 45153', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(552, 'PT. ARD CONTRUCTIONS', '', '', 'GG. H. JAPAR NO.69, RT.5/RW.1, KEMBANGAN SEL., KEC. KEMBANGAN, KOTA JAKARTA BARAT, DAERAH KHUSUS IBUKOTA JAKARTA 11610', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(553, 'PT. MEGA CAPITAL INDONESIA', '', '', 'JL GATOT SUBROTO, 283 MENARA BANK MEGA LANTAI 3, 40273, LKR. SEL., KEC. LENGKONG, KOTA BANDUNG, JAWA BARAT 40263', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(554, 'PT. HINO MOTORS SALES INDONRSIA', '', '', 'JL. GATOT SUBROTO NO.KM 8.5, MANIS JAYA, KEC. JATIUWUNG, KABUPATEN TANGERANG, BANTEN', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(555, 'CV. SINAR CEMERLANG', '', '', 'MEKARHARJA, KEC. PURWAHARJA, KOTA BANJAR, JAWA BARAT 46333', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(556, 'PT. BINTANG NIAGA JAYA', '', '', 'JL RAYA KAYU MANIS, RT 2 RW 14, KP. SETU, CIBADAK, TANAH SEREAL, RT.03/RW.01, KAYU MANIS, KEC. TANAH SEREAL, KOTA BOGOR, JAWA BARAT 16166', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(557, 'PT. YASOTEX MANDIRI', '', '', 'JL. PAGADEN NO.52, GUNUNGTANDALA, KEC. KAWALU, KAB. TASIKMALAYA, JAWA BARAT 46182', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(558, 'RPA. SUKAHATI', '', '', 'UNNAMED ROAD, SAMBONGPARI, MANGKUBUMI, TASIKMALAYA REGENCY, WEST JAVA 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(559, 'PO. DO\'A IBU', '', '', 'M5FX+G57, JL. IR. H. JUANDA, BANTARSARI, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(560, 'PT. RUMAH IKLAN BERSAMA', '', '', 'JL. R. DEWI SARTIKA NO.84, PARUNGLESANG, KEC. BANJAR, KOTA BANJAR, JAWA BARAT 46311', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(561, 'PT. INDOMARCO PRISMATAMA', '', '', 'JLN. PANGERAN ANTASARI BLOK PRTAPAN TELP. 0231 247195 CIREBON', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(562, 'PT. ALIKA SUKAPURA', '', '', 'JL. JENDERAL A.H. NASUTION, KM. 8, CIPARI, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(563, 'LEMBAGA PENDIDIKAN PRAWITA', '', '', 'JL. MERDEKA NO.4, TAWANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46112', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(564, 'CV. CIPTANIAGA MANDIRI', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(565, 'QUICK CORP', '', '', 'RUKO NO. 46, PEREMPATAN LAMPU MERAH, JL. SUTISNA SENJAYA, EMPANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46113', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(566, 'KANTOR NOTARIS ', '', '', 'JL. SILIWANGI NO.06, TUGUJAYA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46126', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(567, 'PT. PERKASA ABADI MAKMUR', '', '', 'JL. SL. TOBING NO.28, MANGKUBUMI, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(568, 'PT UTAMA YURIM INDAH', '', '', 'HFHV+XPC, CIBODAS, KEC. BUNGURSARI, KABUPATEN PURWAKARTA, JAWA BARAT 41181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(569, 'PT. ASIA TRITUNGAL JAYA', '', '', 'JL. HZ. MUSTOFA NO.79, YUDANAGARA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46113', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(570, 'CROWN HOTEL', '', '', 'JL. R.E. MARTADINATA NO.45, CIPEDES, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46133', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(571, 'PT. SANSAN SAUDARATEX JAYA', '', '', 'JL. RAYA WANTILAN-CIPEUNDEUY, WANTILAN, KEC. CIPEUNDEUY, KABUPATEN SUBANG, JAWA BARAT 41272', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(572, 'PT. DANA PROMOTAMA', '', '', 'JL. GN. BATU NO.86, SUKARAJA, KEC. CICENDO, KOTA BANDUNG, JAWA BARAT 40175', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(573, 'PT. TEJA BERLIAN', '', '', 'JL. KALIJAGA NO.144, PEGAMBIRAN, KEC. LEMAHWUNGKUK, KOTA CIREBON, JAWA BARAT 45113', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(574, 'PT. AGUNG SLAMET', '', '', 'JALAN AGUNG TIMUR 4 BLOCK O2 KAV. 18-19, SUNTER AGUNG, JAKARTA UTARA, DAERAH KHUSUS IBUKOTA JAKARTA 14350', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(575, 'PT. VELVET TEXTILE INDONESIA', '', '', 'JL. SUMEDANG NO.4, KACAPIRING, KEC. BATUNUNGGAL, KOTA BANDUNG, JAWA BARAT 40271', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(576, 'PT. TIRTA UTAMA ABADI', '', '', 'UNNAMED ROAD, 44163, SIRNAGALIH, KEC. CISURUPAN, KABUPATEN GARUT, JAWA BARAT 44163', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(577, 'CV SINAR JAYA TASIKAMAYA', '', '', 'UNNAMED ROAD, LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(578, 'PT. SENTRALSARI PRIMA', '', '', 'RANCAHAYAM, JLN. SIRNABAKTI , KP, MEKARSARI, KEC. CIBALONG, KABUPATEN GARUT', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(579, 'PT. SAPHIRE RESIDENCE', '', '', 'ZAMRUD NO.3, DUSUN II, TAMBAKSARI KIDUL, KEMBARAN, BANYUMAS REGENCY, CENTRAL JAVA 53182', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(580, 'PT. SINAR NIAGA SEJAHTERA', '', '', 'JL. PERINTIS KEMERDEKAAN NO.249, KARSAMENAK, KEC. KAWALU, KAB. TASIKMALAYA, JAWA BARAT 46182', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(581, 'PT. SUN-N GARMINDO', '', '', 'DAWAGUNG, KEC. RAJAPOLAH, KABUPATEN TASIKMALAYA, JAWA BARAT 46155', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(582, 'PT. SUKAHATI SEJAHTERA UTAMA PRATAMA', '', '', 'JL. RAYA SUKAHATI NO.45 A, SUKAHATI, KEC. CIBINONG, KABUPATEN BOGOR, JAWA BARAT 16913', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(583, 'PT. TRIE MUKTY PERTAMA PUTRA', '', '', 'KAWASAN INDUSTRI PULOGADUNG BLOK 3. FF 12A, JL. PULOBUARAN RAYA, RT.8/RW.13, JATINEGARA, KEC. CAKUNG, KOTA JAKARTA TIMUR, DAERAH KHUSUS IBUKOTA JAKARTA 13920', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(584, 'LP3I KARAWANG', '', '', 'GEDUNG KARAWANG HIJAU, JL. TARUMANAGARA NO.4-6, PURWADANA, TELUKJAMBE TIMUR, KARAWANG, JAWA BARAT 41361', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(585, 'PT. GUNUNG SLAMET', '', '', 'JL. MAYJEN SUTOYO NO.28, BUDIMULYA, SLAWI WETAN, KEC. SLAWI, KABUPATEN TEGAL, JAWA TENGAH 52411', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(586, 'PT. KANTOR NOTARIS ', '', '', 'JL. R.E. MARTADINATA NO.20, PANGLAYUNGAN, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46133', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(587, 'KUMON GRAND ASRI TASIKMALAYA', '', '', 'JL. CIEUNTEUNG NO.60, CILEMBANG, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46123', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(588, 'PT. BINTANG MOTOR JAYA', '', '', 'JL. FATAHILLAH NO.46, SETU KULON, KEC. WERU, KABUPATEN CIREBON, JAWA BARAT 45154', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(589, 'CV. ACCES MEDIA', '', '', 'SINDANGGALIH, JL. NOENOENG TISNASAPUTRA, KAHURIPAN, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46115', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(590, 'CV. TIRTA ANGKASA', '', '', 'JL. LAKBOK BLOK CIKUMAN RT/RW 04/05, SINDANGSARI, KEC. BANJARSARI, KABUPATEN CIAMIS, JAWA BARAT 46383', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(591, 'SUKAHATI CHICKEN PROCESSING', '', '', 'UNNAMED ROAD, SAMBONGPARI, MANGKUBUMI, TASIKMALAYA REGENCY, WEST JAVA 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(592, 'PT. MITRA PERIANGAN PERSADA', '', '', 'M54V+M66, MANGKUBUMI, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(593, 'PT. TUNGGAL JAYA PLASTIC INDUSTRY', '', '', 'JL. PERINTIS KEMERDEKAAN NO.64-66, RT.01/RW.02, SAMBONGJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(594, 'PT. MAYA GRAHA INDAH ', '', '', 'JL. SOEKARNO HATTA NO.481, CIJAGRA, KEC. LENGKONG, KOTA BANDUNG, JAWA BARAT 40266', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(595, 'PT. ASIH TUNGGAL ', '', '', 'M55W+PWQ, JL. IR. H. JUANDA, LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(596, 'PT ARSITA MITRA LESTARI', '', '', '9CXC+WJX, V, JL. RAYA GEGESIK, GEGESIK LOR, KEC. GEGESIK, KABUPATEN CIREBON, JAWA BARAT 45164', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(597, 'PT TEJA BERLIAN', '', '', 'TUBAGUS RANGIN NO.54, MUNJUL, KEC. MAJALENGKA, KABUPATEN MAJALENGKA, JAWA BARAT 45418', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(598, 'PT BUMI DEKSA prima', '', '', 'NO., JL. RAYA NAROGONG NO.22, TLAJUNG UDIK, KEC. KLAPANUNGGAL, KABUPATEN BOGOR, JAWA BARAT 16710', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(599, 'PT MAYA GRAHA INDAH', '', '', 'JL. MOHAMAD HATTA NO.158, SUKAMANAH, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46131', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(600, 'PT. SUPHIRE RESIDENCE', '', '', 'SINDANGRASA, KEC. CIAMIS, KABUPATEN CIAMIS, JAWA BARAT 46215', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(601, 'PT SUN-N GARMINDO', '', '', 'DAWAGUNG, KEC. RAJAPOLAH, KABUPATEN TASIKMALAYA, JAWA BARAT 46155', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(602, 'DINAS TENAGA KERJA KOTA TASIKMALAYA', '', '', 'JL. SILIWANGI NO.73, KAHURIPAN, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46115', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(603, 'PRIMAJASA', '', '', 'JL. RAYA RAJAPOLAH - TASIKMALAYA NO.226-224, PANYINGKIRAN, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(604, 'PT. BANCEUY TUNGGAL JAYA', '', '', 'JL. RAYA KOPO NO.271, SITUSAEUR, KEC. BOJONGLOA KIDUL, KOTA BANDUNG, JAWA BARAT 40234', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(605, 'LP3I COLLEGE KARAWANG', '', '', 'GEDUNG KARAWANG HIJAU, JL. TARUMANAGARA NO.4-6, PURWADANA, TELUKJAMBE TIMUR, KARAWANG, JAWA BARAT 41361', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(606, 'PT. MAHARDHIKA', '', '', 'RUKO EMERALD BOULEVARD BLOK EB1 NO.7, JL. HARAPAN INDAH, PEJUANG, KECAMATAN MEDAN SATRIA, KOTA BKS, JAWA BARAT 17131', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(607, 'JNE TASIKMALAYA ', '', '', 'JL. IR. H. JUANDA NO.12, PANYINGKIRAN, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(608, 'CV. TIKI RIAADIN TIKI TASIKMALAYA', '', '', 'JL. TENTARA PELAJAR NO.26A, EMPANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46113', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(609, 'DOA IBU', '', '', 'JL. LEUWI DABU NO.62, PARAKANNYASAG, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46132', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(610, 'PT. SAN-N-GARMINDO', '', '', 'DAWAGUNG, KEC. RAJAPOLAH, KABUPATEN TASIKMALAYA, JAWA BARAT 46155', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(611, 'PT. LANGIT ITU BIRU TASIKMALAYA', '', '', 'JL. SUKARINDIK NO.20, SUKARINDIK, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(612, 'PT. CATURWANGSA INDAH', '', '', 'JL. SL. TOBING NO.46, TUGUJAYA, KEC. CIHIDEUNG, KAB. TASIKMALAYA, JAWA BARAT 46126', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(613, 'PT. ARSITA MITRA LESTARI CABANG TASIKMALAYA', '', '', 'TASIK INDAH PLAZA NO. 8 JL. HZ. MUSTOFA NO. 345, KAHURIPAN, KEC. TAWANG, KAB. TASIKMALAYA, JAWA TENGAH 46115', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(614, 'NIAGA REDJA ABADI', '', '', 'SAMBONGJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(615, 'P.T.MAYASARI BAKTI', '', '', 'JL. RAYA BOGOR NO.KM. 24 NO. 71, RT.2/RW.7, SUSUKAN, KEC. PS. REBO, KOTA JAKARTA TIMUR, DAERAH KHUSUS IBUKOTA JAKARTA 13750', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(616, 'KKP HERI SUGARA', '', '', 'RUKO NO. 3 MELATI MAS RESIDENCE, JL. LETNAN HARUN, SUKARINDIK, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(617, 'CV. QUICK CORP', '', '', 'RUKO NO. 46, PEREMPATAN LAMPU MERAH, JL. SUTISNA SENJAYA, EMPANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46113', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(618, 'PT.BATERINDO SUKSES MANDIRI', '', '', 'INDIHIANG, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(619, 'CV. ARJUNA JAYA SAKTI', '', '', 'JL. TANUWIJAYA NO.2B, EMPANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46113', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(620, 'PT. FEDERAL INTERNASIOANAL FINANCE (FIF GROUP)', '', '', 'JL PADANG JAYA, KB. KALAPA, JENANG, KEC. MAJENANG, KABUPATEN CILACAP, JAWA TENGAH 53257', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(621, 'PT. BPR SYARIAH ALWADIAH', '', '', 'RUKO I NO. 10 H26, JALAN PASAR INDUK CIKURUBUK, LINGGAJAYA, MANGKUBUMI, LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(622, 'PT BCA MULTI FINANCE', '', '', 'WTC MANGGA DUA JL. MANGGA DUA RAYA NO. 8 LANTAI 6, BLOK CL 001, RW.5, ANCOL, KEC. PADEMANGAN, KOTA JKT UTARA, DAERAH KHUSUS IBUKOTA JAKARTA 14430', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(623, 'PT. WIJAYA SOLUSINDO', '', '', 'JL. PERINTIS KEMERDEKAAN NO.249, KARSAMENAK, KEC. KAWALU, KAB. TASIKMALAYA, JAWA BARAT 46182', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(624, 'CV. ARTTHAJAN', '', '', 'JL. RAYA SADANG NO.208, RW.1, KP CIBARAGALAN, KEC. PURWAKARTA, KABUPATEN PURWAKARTA, JAWA BARAT 41118', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(625, 'KABAR PRIANGAN', '', '', 'JL. R.E. MARTADINATA NO.215, PANYINGKIRAN, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(626, 'PT. NIAGA REDJA ABADI', '', '', 'SAMBONGJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(627, 'PT. PEGADAIAN', '', '', 'KOMPLEK PASAR SINDANGKASIH BLOK A.2, SINDANGKASIH, KEC. SINDANGKASIH, KABUPATEN CIAMIS, JAWA BARAT 46268', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(628, 'PT. PHARAS', '', '', 'JL. RAYA NAROGONG, RT.001/RW.006, CIKIWUL, KEC. BANTAR GEBANG, KOTA BKS, JAWA BARAT 17152', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(629, 'REDIWORK', '', '', 'JL. CIKINI RAYA NO.9, RT.16/RW.1, CIKINI, KEC. MENTENG, KOTA JAKARTA PUSAT, DAERAH KHUSUS IBUKOTA JAKARTA 10330', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(630, 'PT. CITY TRANS UTAMA', '', '', 'JL. SOEKARNO HATTA NO.768, CIPADUNG KIDUL, KEC. PANYILEUKAN, KOTA BANDUNG, JAWA BARAT 40615', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(631, 'ADIRA FINANCE', '', '', 'CIGAGADE, KEC. BALUBUR LIMBANGAN, KABUPATEN GARUT, JAWA BARAT 44186', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(632, 'AL-ZIDAN', '', '', 'JL. SAGULING PANJANG, CIGANTANG, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(633, 'PT. YUMNA BERKAH NUSANTARA', '', '', 'LN. KH. EZ. MUTTAQIEN, RUKO NO, RW.4, LINGGAJAYA, KEC. MANGKUBUMI, KAB. TASIKMALAYA, JAWA BARAT 46181', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(634, 'PT. TEODORE PAN GARMINDO', '', '', 'JL. RAYA CIAWI CIDADAP, RT.003, RW.005, JATIHURIP, KEC. CISAYONG, KABUPATEN TASIKMALAYA, JAWA BARAT 46153', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(635, 'CV. ATENSI INDONESIA', '', '', 'CV. ATENSI INDONESIA', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(636, 'YAYASAN TARQI', '', '', 'JL. KAUM KALER, MANONJAYA, KEC. MANONJAYA, KABUPATEN TASIKMALAYA, JAWA BARAT 46197', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(637, 'BINTANG MOTOR', '', '', 'JL. RAYA CIBEUTI NO.170, KARSAMENAK, KEC. KAWALU, KAB. TASIKMALAYA, JAWA BARAT 46182', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(638, 'PT. BANK TABUNGAN NRGARA (PERSERO)', '', '', 'JL. OTO ISKANDARDINATA NO.6, EMPANGSARI, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46112', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(639, 'PT. AKASHA INDO GAMORA', '', '', 'JL. DINDING ARI RAYA NO.157, PANGLAYUNGAN, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46134', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(640, 'PT. MEGA MUTIARA GALUGGUNG ', '', '', 'SUKAMULYA, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(641, 'PT. GASSUKA SYARIAH INDONESIA ', '', '', 'GEDUNG UGM - SAMATOR PENDIDIKAN, JL. DR. SAHARJO NO.83, RT.13/RW.8, MANGGARAI, KEC. TEBET, KOTA JAKARTA SELATAN, DAERAH KHUSUS IBUKOTA JAKARTA 12850', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(642, 'ARISTA GROUP', '', '', ', JL. KYAI HAJI ZAINUL ARIFIN NO.20, RT.8/RW.7, KRUKUT, KEC. TAMAN SARI, KOTA JAKARTA BARAT, DAERAH KHUSUS IBUKOTA JAKARTA 11140', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(643, 'BPJS KETENAGAKERJAAN', '', '', 'JL. IR. H. JUANDA NO.KM. 1, CIPEDES, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(644, 'PT. DIALOGUE GARMINDO UTAMA', '', '', 'TEGAR PRIMANUSANTARA PT., JL. INDUSTRI I NO.1, UTAMA, KEC. CIMAHI SEL., KOTA CIMAHI, JAWA BARAT 40234', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(645, 'PT. ADIRA DINAMIKA MULTI FINANCE', '', '', 'JL INSINYUR HAJI DJUANDA, NO. 18, CILEMBANG, CIHIDEUNG, KOMPLEK RUKO TFT, SUKAMULYA, KEC. BUNGURSARI, KAB. TASIKMALAYA, JAWA BARAT 46123', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(646, 'BPJS KETENAGAKERJAAN CABANG TASIKMALAYA', '', '', 'JL. IR. H. JUANDA NO.KM. 1, CIPEDES, KEC. CIPEDES, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(647, 'NOTARIS PPAT ANIK SULISTYAWATI', '', '', 'RS PRASETYA BUNDA, KOMPLEK RUKO HT SUMANTRI NO. 5 DPN, JL. IR. H. JUANDA, SIMPANG JATI PANYINGKIRA, KEC. INDIHIANG, KAB. TASIKMALAYA, JAWA BARAT 46151', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(648, 'KERJA SAMA BIDANG TRIDHARMA PERGURUAN TINGGI DAN PENGEMBANGAN SDM', '', '', 'JL. BABAKAN SILIWANGI NO.35, KAHURIPAN, KEC. TAWANG, KAB. TASIKMALAYA, JAWA BARAT 46115', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '', '', 'Baru', ''),
(1024, 'abc', 'Marketing', 'CV', 'jnin', 'BANJAR', 'zahrrranabill11@gmail.com', '20198989', '46342', 'ibu ini', 'contoh', '089', 'Lokal', 'Sudah', '2022-10-10', '2022-10-10', 'abc-mou.pdf', 'Medsos', '-', 'Baru', 'Nabila Azzahra');

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
  `tanggal_fu` date NOT NULL DEFAULT current_timestamp(),
  `hasil_fu` varchar(100) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'Belum',
  `melalui` varchar(25) NOT NULL,
  `feedback` varchar(20) DEFAULT NULL,
  `oleh` varchar(50) DEFAULT NULL,
  `tanggal_accept` date DEFAULT NULL,
  `feedback_melalui` varchar(25) DEFAULT NULL,
  `tanggal_feedback` date DEFAULT current_timestamp(),
  `hasil_feedback` varchar(100) DEFAULT NULL,
  `ts` varchar(20) DEFAULT NULL,
  `tf` varchar(20) DEFAULT NULL,
  `feedback_oleh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `telleseling`
--

INSERT INTO `telleseling` (`id_telleseling`, `id_perusahaan`, `nama_perusahaan`, `bidang`, `kota`, `relasi`, `alamat`, `kontak_person`, `jabatan`, `no_telp`, `tanggal_fu`, `hasil_fu`, `status`, `melalui`, `feedback`, `oleh`, `tanggal_accept`, `feedback_melalui`, `tanggal_feedback`, `hasil_feedback`, `ts`, `tf`, `feedback_oleh`) VALUES
(61, 33, 'PT. SILOAM MOTOR (DFSK)', '', '', 'Baru', 'JL. KH. Z MUTTAQIN KAV RUKO 1-5 KOTA TASIKMALAYA', 'BPK. INDRA', 'ADH', '853-1055-7774', '2022-10-09', 'huguygyu', 'Sudah', 'WhatsApp', 'Sudah', 'Nabila Azzahra', '2022-10-09', 'WhatsApp', '2022-10-09', 'sudah dikirim cv', 'Sudah', 'Sudah', 'Nabila Azzahra'),
(62, 33, 'PT. SILOAM MOTOR (DFSK)', '', '', 'Baru', 'JL. KH. Z MUTTAQIN KAV RUKO 1-5 KOTA TASIKMALAYA', 'BPK. INDRA', 'ADH', '853-1055-7774', '2022-10-09', 'yuuu', 'Sudah', 'Email', 'Sudah', 'Nabila Azzahra', '2022-10-09', 'Email', '2022-10-09', 'bismillah', 'Sudah', 'Sudah', 'Nabila Azzahra'),
(63, 23, 'PT. MATEL INDONESIA', 'Teknologi', '', 'Baru', 'JL. INDUSTRI UTAMA BLOK SS KAV. 1-3 MEKAR MUKTI CIKARANG UTARA', 'IBU ICA', 'HRD', '(08997958869)', '2022-10-09', 'percobaan', 'Sudah', 'Email', 'Sudah', 'Nabila Azzahra', '2022-10-09', 'Email', '2022-10-09', 'hah', 'Sudah', 'Sudah', 'Nabila Azzahra'),
(66, 25, 'PT. CEMACO MAKMUR CORPORATAMA (HINO CEMACO)Z', '', '', 'Baru', 'WISMA INDOMOBIL 1, JL. MT. HARYONO KAV.8, JAKARTA 13330, INDONESIA', '', '', '08881050447', '2022-10-09', 'ih', 'Sudah', 'WhatsApp', 'Sudah', 'Nabila Azzahra', '2022-10-10', NULL, NULL, NULL, 'Sudah', 'Sudah', NULL),
(67, 24, 'PT. CEMACO MAKMUR CORPORATAMA (HINO CEMACO)', '', '', 'Baru', 'JL. URIP SUMOHARJO, BENDUNGAN, MERTASINGA, KEC. CILACAP UTARA, KABUPATEN CILACAP, JAWA TENGAH', 'BPK. FARID', 'HEAD WORkSHOP', '085223575446', '2022-10-10', 'hgh', 'Sudah', 'Email', 'Sudah', 'Nabila Azzahra', '2022-10-10', NULL, NULL, NULL, 'Sudah', 'Sudah', NULL),
(68, 24, 'PT. CEMACO MAKMUR CORPORATAMA (HINO CEMACO)', '', '', 'Baru', 'JL. URIP SUMOHARJO, BENDUNGAN, MERTASINGA, KEC. CILACAP UTARA, KABUPATEN CILACAP, JAWA TENGAH', 'BPK. FARID', 'HEAD WORkSHOP', '085223575446', '2022-10-10', 'h', 'Sudah', 'WhatsApp', 'Sudah', 'Nabila Azzahra', '2022-10-10', NULL, NULL, NULL, 'Sudah', 'Sudah', NULL),
(69, 25, 'PT. CEMACO MAKMUR CORPORATAMA (HINO CEMACO)Z', '', '', 'Lama', 'WISMA INDOMOBIL 1, JL. MT. HARYONO KAV.8, JAKARTA 13330, INDONESIA', '', '', '08881050447', '2022-10-11', 'percobaan', '+ 0 hari', 'WhatsApp', 'Belum Accept', NULL, NULL, NULL, NULL, NULL, '0', 'Belum Accept', NULL),
(70, 27, 'PT. DANA ARHTA', '', '', 'Baru', 'CIREBON', 'IBU ANIE', 'HRD', '812-2061-2113', '2022-10-11', 'percobaan', 'Sudah', 'WhatsApp', '+ 0 hari', 'coba ', '2022-10-11', NULL, NULL, NULL, 'Sudah', '0', NULL);

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
('cb', 'cb', 'cb', 'User_Satu'),
('coba', 'coba', 'coba ', 'User_Dua');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_akumulasi`
-- (See below for the actual view)
--
CREATE TABLE `vw_akumulasi` (
`prodi` varchar(30)
,`tahun_akademik` int(5)
,`belum` bigint(21)
,`kerja` bigint(21)
,`usaha` bigint(21)
,`bermasalah` bigint(21)
,`gugur` bigint(21)
,`cnp` bigint(21)
,`sendiri` bigint(21)
,`jml` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_bermasalah`
-- (See below for the actual view)
--
CREATE TABLE `vw_bermasalah` (
`prodi` varchar(30)
,`tahun_akademik` int(5)
,`bermasalah` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_blm`
-- (See below for the actual view)
--
CREATE TABLE `vw_blm` (
`prodi` varchar(30)
,`tahun_akademik` int(5)
,`belum` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_cnp`
-- (See below for the actual view)
--
CREATE TABLE `vw_cnp` (
`prodi` varchar(30)
,`tahun_akademik` int(5)
,`cnp` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_gugur`
-- (See below for the actual view)
--
CREATE TABLE `vw_gugur` (
`prodi` varchar(30)
,`tahun_akademik` int(5)
,`gugur` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_induk`
-- (See below for the actual view)
--
CREATE TABLE `vw_induk` (
`prodi` varchar(30)
,`status` varchar(20)
,`ket` varchar(20)
,`tahun_akademik` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_jml`
-- (See below for the actual view)
--
CREATE TABLE `vw_jml` (
`prodi` varchar(30)
,`tahun_akademik` int(5)
,`jml` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_krj`
-- (See below for the actual view)
--
CREATE TABLE `vw_krj` (
`prodi` varchar(30)
,`tahun_akademik` int(5)
,`kerja` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sendiri`
-- (See below for the actual view)
--
CREATE TABLE `vw_sendiri` (
`prodi` varchar(30)
,`tahun_akademik` int(5)
,`sendiri` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_usaha`
-- (See below for the actual view)
--
CREATE TABLE `vw_usaha` (
`prodi` varchar(30)
,`tahun_akademik` int(5)
,`usaha` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_akumulasi`
--
DROP TABLE IF EXISTS `vw_akumulasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_akumulasi`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, `vw_blm`.`belum` AS `belum`, `vw_krj`.`kerja` AS `kerja`, `vw_usaha`.`usaha` AS `usaha`, `vw_bermasalah`.`bermasalah` AS `bermasalah`, `vw_gugur`.`gugur` AS `gugur`, `vw_cnp`.`cnp` AS `cnp`, `vw_sendiri`.`sendiri` AS `sendiri`, `vw_jml`.`jml` AS `jml` FROM ((((((((`vw_induk` left join `vw_krj` on(`vw_induk`.`prodi` = `vw_krj`.`prodi` and `vw_krj`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_blm` on(`vw_induk`.`prodi` = `vw_blm`.`prodi` and `vw_blm`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_usaha` on(`vw_induk`.`prodi` = `vw_usaha`.`prodi` and `vw_usaha`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_bermasalah` on(`vw_induk`.`prodi` = `vw_bermasalah`.`prodi` and `vw_bermasalah`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_gugur` on(`vw_induk`.`prodi` = `vw_gugur`.`prodi` and `vw_gugur`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_cnp` on(`vw_induk`.`prodi` = `vw_cnp`.`prodi` and `vw_cnp`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_sendiri` on(`vw_induk`.`prodi` = `vw_sendiri`.`prodi` and `vw_sendiri`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) left join `vw_jml` on(`vw_induk`.`prodi` = `vw_jml`.`prodi` and `vw_jml`.`tahun_akademik` = `vw_induk`.`tahun_akademik`)) GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_bermasalah`
--
DROP TABLE IF EXISTS `vw_bermasalah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_bermasalah`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`status`) AS `bermasalah` FROM `vw_induk` WHERE `vw_induk`.`status` = 'Bermasalah' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_blm`
--
DROP TABLE IF EXISTS `vw_blm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_blm`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`status`) AS `belum` FROM `vw_induk` WHERE `vw_induk`.`status` = 'Belum' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_cnp`
--
DROP TABLE IF EXISTS `vw_cnp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cnp`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`ket`) AS `cnp` FROM `vw_induk` WHERE `vw_induk`.`ket` = 'CNP' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_gugur`
--
DROP TABLE IF EXISTS `vw_gugur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_gugur`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`status`) AS `gugur` FROM `vw_induk` WHERE `vw_induk`.`status` = 'Gugur' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_induk`
--
DROP TABLE IF EXISTS `vw_induk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_induk`  AS SELECT `mahasiswa`.`prodi` AS `prodi`, `mahasiswa`.`status` AS `status`, `mahasiswa`.`ket` AS `ket`, `mahasiswa`.`tahun_akademik` AS `tahun_akademik` FROM `mahasiswa``mahasiswa`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_jml`
--
DROP TABLE IF EXISTS `vw_jml`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_jml`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`prodi`) AS `jml` FROM `vw_induk` GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_krj`
--
DROP TABLE IF EXISTS `vw_krj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_krj`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`status`) AS `kerja` FROM `vw_induk` WHERE `vw_induk`.`status` = 'Bekerja' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sendiri`
--
DROP TABLE IF EXISTS `vw_sendiri`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_sendiri`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`ket`) AS `sendiri` FROM `vw_induk` WHERE `vw_induk`.`ket` = 'Sendiri' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

-- --------------------------------------------------------

--
-- Structure for view `vw_usaha`
--
DROP TABLE IF EXISTS `vw_usaha`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_usaha`  AS SELECT `vw_induk`.`prodi` AS `prodi`, `vw_induk`.`tahun_akademik` AS `tahun_akademik`, count(`vw_induk`.`status`) AS `usaha` FROM `vw_induk` WHERE `vw_induk`.`status` = 'Berwirausaha' GROUP BY `vw_induk`.`prodi`, `vw_induk`.`tahun_akademik``tahun_akademik`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ht_permintaan`
--
ALTER TABLE `ht_permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

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
-- Indexes for table `telleseling`
--
ALTER TABLE `telleseling`
  ADD PRIMARY KEY (`id_telleseling`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1025;

--
-- AUTO_INCREMENT for table `telleseling`
--
ALTER TABLE `telleseling`
  MODIFY `id_telleseling` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
