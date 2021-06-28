-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 11:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtik_abdimas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(16) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(30) NOT NULL,
  `no_induk` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(30) NOT NULL,
  `role_id` char(1) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `no_induk`, `jabatan`, `email`, `image`, `role_id`, `password`) VALUES
('1', 'Ihsan Nugraha', 'ihsan', '12345678', 'Anggota RTIK', 'ihsan@gmail.com', 'default_image.jpg', '1', 'MTIzNDU2Nzg='),
('dummy', 'Akun sudah tidak ada', '-', '-', '-', '-', 'default_image.jpg', '3', 'MTIzNDU2Nzg=');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_tim`
--

CREATE TABLE `anggota_tim` (
  `id_anggota` varchar(25) NOT NULL,
  `id_tim` varchar(18) NOT NULL,
  `id_relawan` varchar(50) NOT NULL,
  `status_pengajuan` varchar(2) NOT NULL,
  `file_surat_izin_ortu` varchar(535) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_tim`
--

INSERT INTO `anggota_tim` (`id_anggota`, `id_tim`, `id_relawan`, `status_pengajuan`, `file_surat_izin_ortu`, `status`) VALUES
('1d8wzHUxV9iAsYn1', '20210626121149vg4Y', '20210912620210531200934vOFn0531204136', '4', 'https://drive.google.com/drive/u/2/folders/1ku4RqG1Z8AiKeF2Vdc96cv0wZSn3POEi', '0'),
('1d8wzHUxV9iAsYn3', '20210626121149vg4Y', '20210912620210531200934vOFn0531236985', '3', '0', '0'),
('1d8wzHUxV9iAsYn4', '20210626121149vg4Y', '20210912620210531200934vOFn0531236965', '3', '0', '0'),
('1d8wzHUxV9iAsYn5', '20210626121149vg4Y', '20210912620210531200934vOFn0531236986', '3', '0', '0'),
('1d8wzHUxV9iAsYn7', '20210626121149vg4Y', '20210202920210531200934vOFn0608195910', '3', '0', '0'),
('CJuwQmxyNoP3qv96', '20210601153728qiNk', '20210912620210531200934vOFn0531236945', '3', '0', '0'),
('CJuwQmxyNoP3qvl1', '20210601153728qiNk', '20210912620210531200934vOFn0531204136', '4', 'https://drive.google.com/file/d/1wJgLze_LFuRAn7WsX-awegFCZwgR_54M/view?usp=sharing', '0'),
('CJuwQmxyNoP3qvl2', '20210601153728qiNk', '20210912620210531200934vOFn0531236985', '3', '0', '0'),
('CJuwQmxyNoP3qvl5', '20210601153728qiNk', '20210912620210531200934vOFn0531236965', '3', 'https://drive.google.com/file/d/1wJgLze_LFuRAn7WsX-awegFCZwgR_54M/view?usp=sharing', '0'),
('CJuwQmxyNoP3qvl6', '20210601153728qiNk', '20210912620210531200934vOFn0531236986', '3', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE `cluster` (
  `id_cluster` varchar(15) NOT NULL,
  `nama_cluster` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id_cluster`, `nama_cluster`) VALUES
('0', 'Tidak Diketahui'),
('1', 'Badan Publik'),
('2', 'Lembaga Pendidikan'),
('3', 'Badan Usaha / UMKM'),
('4', 'Komunitas');

-- --------------------------------------------------------

--
-- Table structure for table `draf_keahlian_relawan`
--

CREATE TABLE `draf_keahlian_relawan` (
  `id_draf` varchar(50) NOT NULL,
  `id_relawan` varchar(50) NOT NULL,
  `id_keahlian` varchar(15) NOT NULL,
  `level_kompetensi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `draf_keahlian_relawan`
--

INSERT INTO `draf_keahlian_relawan` (`id_draf`, `id_relawan`, `id_keahlian`, `level_kompetensi`) VALUES
('202106081959100', '20210202920210531200934vOFn0608195910', '03', 2),
('202106081959101', '20210202920210531200934vOFn0608195910', '04', 2),
('202106081959102', '20210202920210531200934vOFn0608195910', '02', 2),
('202106081959113', '20210202920210531200934vOFn0608195910', '01', 2),
('20210608959280', '20210912620210531200934vOFn0531204136', '03', 2),
('20210608959281', '20210912620210531200934vOFn0531204136', '04', 2),
('20210608959282', '20210912620210531200934vOFn0531204136', '02', 2),
('20210608959283', '20210912620210531200934vOFn0531204136', '01', 2),
('202106162251320', '20210541920210531200934vOFn0616225132', '03', 1),
('202106162251321', '20210541920210531200934vOFn0616225132', '04', 1),
('202106162255390', '20210541920210531200934vOFn0616225538', '03', 1),
('202106162255391', '20210541920210531200934vOFn0616225538', '04', 1),
('202106162310210', '20211521420210531200934vOFn0616231021', '04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` varchar(15) NOT NULL,
  `id_admin` varchar(15) NOT NULL,
  `date_created` datetime NOT NULL,
  `nama_event` varchar(225) NOT NULL,
  `link_gdrive_default` varchar(535) NOT NULL,
  `awal_registrasi` datetime NOT NULL,
  `akhir_registrasi` datetime NOT NULL,
  `awal_pembekalan` datetime NOT NULL,
  `akhir_pembekalan` datetime NOT NULL,
  `awal_pelayanan` datetime NOT NULL,
  `akhir_pelayanan` datetime NOT NULL,
  `awal_pelaporan` datetime NOT NULL,
  `akhir_pelaporan` datetime NOT NULL,
  `awal_penilaian` datetime NOT NULL,
  `akhir_penilaian` datetime NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `id_admin`, `date_created`, `nama_event`, `link_gdrive_default`, `awal_registrasi`, `akhir_registrasi`, `awal_pembekalan`, `akhir_pembekalan`, `awal_pelayanan`, `akhir_pelayanan`, `awal_pelaporan`, `akhir_pelaporan`, `awal_penilaian`, `akhir_penilaian`, `role_id`) VALUES
('1d8wzHUxV9iAsYn', '1', '2022-04-14 11:54:20', 'RTIKAbdimas 2022', '', '2021-06-25 00:00:00', '2021-06-25 00:00:00', '2021-06-25 13:18:10', '2021-06-25 13:18:15', '2021-06-25 13:53:56', '2021-06-25 13:54:22', '2021-06-25 13:54:41', '2021-06-27 13:55:22', '2021-06-25 13:55:17', '2021-06-28 13:56:04', 3),
('CJuwQmxyNoP3qvl', '1', '2021-05-31 21:18:14', 'RTIKAbdimas 2021', 'https://drive.google.com/drive/u/2/folders/1BELlmsJ1ilw3oK0fkKRdLZpFU8X6Ww10', '2021-05-11 21:51:42', '2021-06-18 10:11:22', '2021-06-01 16:08:39', '2021-06-15 00:09:18', '2021-06-04 22:20:55', '2021-06-21 00:11:38', '2021-06-03 00:00:00', '2021-06-23 15:31:05', '2021-06-18 21:46:33', '2021-06-16 15:05:36', 3),
('CJuwQmxyNoP3qvp', 'dummy', '2018-09-04 14:34:07', 'RTIKAbdimas 2020', 'https://drive.google.com/drive/u/2/folders/1BELlmsJ1ilw3oK0fkKRdLZpFU8X6Ww10', '2021-05-01 21:51:42', '2021-06-05 22:09:08', '2021-06-01 16:08:39', '2021-06-16 17:40:37', '2021-06-04 22:20:55', '2021-06-03 11:23:52', '2021-06-03 00:00:00', '2021-06-03 00:00:00', '2021-06-18 00:54:01', '2021-06-15 00:57:08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_penilaian`
--

CREATE TABLE `indikator_penilaian` (
  `id_indikator` varchar(18) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `indikator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indikator_penilaian`
--

INSERT INTO `indikator_penilaian` (`id_indikator`, `id_kriteria`, `indikator`) VALUES
('20210609160553ijkM', 'mtr', 'Seberapa mampu Relawan TIK dalam memenuhi kebutuhan atau menyelesaikan masalah yang ada?'),
('20210609160553ijkN', 'mtr', 'Seberapa besar manfaat perangkat tik yang diperkenalkan atau diterapkan oleh Relawan TIK bagi pekerjaan anda?'),
('20210609160553ijkO', 'mtr', 'Seberapa besar keinginan anda untuk terus menerapkan pengetahuan, keterampilan, atau kemampuan yang diberikan oleh Relawan TIK?'),
('20210609160553ijkP', 'mtr', 'Seberapa besar kecenderungan Anda menjalin kerjasama terkait pemanfaatan TIK dengan Relawan TIK?'),
('20210609160553ijkQ', 'mtr', 'Seberapa ingin organisasi Anda menjalin kerjasama terkait pemanfaatan TIK dengan Relawan TIK?'),
('20210609160553ijkR', 'mtr', 'Pilih satu atau lebih aspek Relawan TIK yang memuaskan'),
('20210609200312lw2', 'lpr', '&quot;Komponen Abstrak&quot; sesuai petunjuk manuskrip atau template artikel jurnal PkM MIFTEK'),
('20210609200415oNa', 'lpr', '&quot;Komponen Pendahuluan&quot; sesuai petunjuk manuskrip atau template artikel jurnal PkM MIFTEK'),
('20210609200443dht', 'lpr', '&quot;Komponen Metode&quot; sesuai petunjuk manuskrip atau template artikel jurnal PkM MIFTEK'),
('20210609200506ZF8', 'lpr', '&quot;Komponen Hasil&quot; sesuai petunjuk manuskrip atau template artikel jurnal PkM MIFTEK'),
('20210609200526o4Z', 'lpr', '&quot;Komponen Pembahasan&quot; sesuai petunjuk manuskrip atau template artikel jurnal PkM MIFTEK'),
('202106092005533jz', 'lpr', '&quot;Kesimpulan dan Saran&quot; sesuai petunjuk manuskrip atau template artikel jurnal PkM MIFTEK'),
('202106092006262qK', 'lpr', '&quot;Daftar Pustaka dan Sitasi&quot; sesuai petunjuk manuskrip atau template artikel jurnal PkM MIFTEK'),
('202106092018118Tn', 'krl', '&quot;Skor Personel Tim&quot; partisipasi dan kerjasama personel dalam kegiatan kelompok '),
('20210619172824N1X', 'dok', 'Kesesuaian Berkas Laporan Presensi Pelayanan '),
('202106191729161nW', 'dok', 'Kesesuaian laporan bukti layanan pengguna\r\n'),
('20210619173018pYB', 'dok', 'Kesesuaian Laporan Artikel Berita'),
('20210619173050o7P', 'dok', 'Kesesuaian Laporan Artikel Jurnal MIFTEK');

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id_instruktur` varchar(50) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `profesi` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgal_lahir` date NOT NULL,
  `id_kota` varchar(4) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id_instruktur`, `nama`, `jenis_kelamin`, `no_hp`, `email`, `image`, `profesi`, `tempat_lahir`, `tgal_lahir`, `id_kota`, `password`, `role_id`) VALUES
('0', 'Tidak tersedia data instruktur', '0', '-', '-', 'default_image.jpg', '-', '-', '0000-00-00', '0', '-', 1),
('202109126J0YSi', 'Ihsan Nugraha', '0', '0895369729896', 'ihsannugraha96@gmail.com', 'default_image.jpg', 'Mahasiswa', 'Garut', '2021-05-12', '126', 'MTIzNDU2Nzg=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id_keahlian` varchar(15) NOT NULL,
  `nama_keahlian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id_keahlian`, `nama_keahlian`) VALUES
('01', 'Teknik Komputer dan Jaringan'),
('02', 'Rekayasa Perangkat Lunak'),
('03', 'Multimedia'),
('04', 'Operator Office Suite');

-- --------------------------------------------------------

--
-- Table structure for table `komisariat`
--

CREATE TABLE `komisariat` (
  `id_komisariat` varchar(18) NOT NULL,
  `nama_komisariat` varchar(128) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `surat_komitmen` varchar(535) NOT NULL,
  `surat_tugas` varchar(535) NOT NULL,
  `id_kota` varchar(5) NOT NULL,
  `ketua` varchar(128) NOT NULL,
  `foto_ketua` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komisariat`
--

INSERT INTO `komisariat` (`id_komisariat`, `nama_komisariat`, `logo`, `email`, `kontak`, `surat_komitmen`, `surat_tugas`, `id_kota`, `ketua`, `foto_ketua`, `password`, `role_id`) VALUES
('20210531200934vOFm', 'IPI', 'default_logo.png', '1706005@sttgarut.ac.id', '0895369729898', 'https://drive.google.com/file/d/1rv4-JMnGslnFHVoqo4af7SzFjc_go1aA/view', 'https://drive.google.com/file/d/1rv4-JMnGslnFHVoqo4af7SzFjc_go1aA/view', '126', '-', 'default_image.jpg', 'MTIzNDU2Nzg=', 1),
('20210531200934vOFn', 'Sekolah Tinggi Teknologi Garut', 'sttg.png', 'ihsannugraha96@gmail.com', '0895369729898', 'https://drive.google.com/file/d/1rv4-JMnGslnFHVoqo4af7SzFjc_go1aA/view', 'https://drive.google.com/file/d/1rv4-JMnGslnFHVoqo4af7SzFjc_go1aA/view', '126', 'Nama Ketua', 'default_image.jpg', 'MTIzNDU2Nzg=', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` varchar(4) NOT NULL,
  `type` varchar(10) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `id_provinsi` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `type`, `nama_kota`, `id_provinsi`) VALUES
('001', 'Kabupaten', 'Aceh Barat', '21'),
('002', 'Kabupaten', 'Aceh Barat Daya', '21'),
('003', 'Kabupaten', 'Aceh Besar', '21'),
('004', 'Kabupaten', 'Aceh Jaya', '21'),
('005', 'Kabupaten', 'Aceh Selatan', '21'),
('006', 'Kabupaten', 'Aceh Singkil', '21'),
('007', 'Kabupaten', 'Aceh Tamiang', '21'),
('008', 'Kabupaten', 'Aceh Tengah', '21'),
('009', 'Kabupaten', 'Aceh Tenggara', '21'),
('010', 'Kabupaten', 'Aceh Timur', '21'),
('011', 'Kabupaten', 'Aceh Utara', '21'),
('012', 'Kabupaten', 'Agam', '32'),
('013', 'Kabupaten', 'Alor', '23'),
('014', 'Kota', 'Ambon', '19'),
('015', 'Kabupaten', 'Asahan', '34'),
('016', 'Kabupaten', 'Asmat', '24'),
('017', 'Kabupaten', 'Badung', '01'),
('018', 'Kabupaten', 'Balangan', '13'),
('019', 'Kota', 'Balikpapan', '15'),
('020', 'Kota', 'Banda Aceh', '21'),
('021', 'Kota', 'Bandar Lampung', '18'),
('022', 'Kabupaten', 'Bandung', '09'),
('023', 'Kota', 'Bandung', '09'),
('024', 'Kabupaten', 'Bandung Barat', '09'),
('025', 'Kabupaten', 'Banggai', '29'),
('026', 'Kabupaten', 'Banggai Kepulauan', '29'),
('027', 'Kabupaten', 'Bangka', '02'),
('028', 'Kabupaten', 'Bangka Barat', '02'),
('029', 'Kabupaten', 'Bangka Selatan', '02'),
('030', 'Kabupaten', 'Bangka Tengah', '02'),
('031', 'Kabupaten', 'Bangkalan', '11'),
('032', 'Kabupaten', 'Bangli', '01'),
('033', 'Kabupaten', 'Banjar', '13'),
('034', 'Kota', 'Banjar', '09'),
('035', 'Kota', 'Banjarbaru', '13'),
('036', 'Kota', 'Banjarmasin', '13'),
('037', 'Kabupaten', 'Banjarnegara', '10'),
('038', 'Kabupaten', 'Bantaeng', '28'),
('039', 'Kabupaten', 'Bantul', '05'),
('040', 'Kabupaten', 'Banyuasin', '33'),
('041', 'Kabupaten', 'Banyumas', '10'),
('042', 'Kabupaten', 'Banyuwangi', '11'),
('043', 'Kabupaten', 'Barito Kuala', '13'),
('044', 'Kabupaten', 'Barito Selatan', '14'),
('045', 'Kabupaten', 'Barito Timur', '14'),
('046', 'Kabupaten', 'Barito Utara', '14'),
('047', 'Kabupaten', 'Barru', '28'),
('048', 'Kota', 'Batam', '17'),
('049', 'Kabupaten', 'Batang', '10'),
('050', 'Kabupaten', 'Batang Hari', '08'),
('051', 'Kota', 'Batu', '11'),
('052', 'Kabupaten', 'Batu Bara', '34'),
('053', 'Kota', 'Bau-Bau', '30'),
('054', 'Kabupaten', 'Bekasi', '09'),
('055', 'Kota', 'Bekasi', '09'),
('056', 'Kabupaten', 'Belitung', '02'),
('057', 'Kabupaten', 'Belitung Timur', '02'),
('058', 'Kabupaten', 'Belu', '23'),
('059', 'Kabupaten', 'Bener Meriah', '21'),
('060', 'Kabupaten', 'Bengkalis', '26'),
('061', 'Kabupaten', 'Bengkayang', '12'),
('062', 'Kota', 'Bengkulu', '04'),
('063', 'Kabupaten', 'Bengkulu Selatan', '04'),
('064', 'Kabupaten', 'Bengkulu Tengah', '04'),
('065', 'Kabupaten', 'Bengkulu Utara', '04'),
('066', 'Kabupaten', 'Berau', '15'),
('067', 'Kabupaten', 'Biak Numfor', '24'),
('068', 'Kabupaten', 'Bima', '22'),
('069', 'Kota', 'Bima', '22'),
('070', 'Kota', 'Binjai', '34'),
('071', 'Kabupaten', 'Bintan', '17'),
('072', 'Kabupaten', 'Bireuen', '21'),
('073', 'Kota', 'Bitung', '31'),
('074', 'Kabupaten', 'Blitar', '11'),
('075', 'Kota', 'Blitar', '11'),
('076', 'Kabupaten', 'Blora', '10'),
('077', 'Kabupaten', 'Boalemo', '07'),
('078', 'Kabupaten', 'Bogor', '09'),
('079', 'Kota', 'Bogor', '09'),
('080', 'Kabupaten', 'Bojonegoro', '11'),
('081', 'Kabupaten', 'Bolaang Mongondow (Bolmong)', '31'),
('082', 'Kabupaten', 'Bolaang Mongondow Selatan', '31'),
('083', 'Kabupaten', 'Bolaang Mongondow Timur', '31'),
('084', 'Kabupaten', 'Bolaang Mongondow Utara', '31'),
('085', 'Kabupaten', 'Bombana', '30'),
('086', 'Kabupaten', 'Bondowoso', '11'),
('087', 'Kabupaten', 'Bone', '28'),
('088', 'Kabupaten', 'Bone Bolango', '07'),
('089', 'Kota', 'Bontang', '15'),
('090', 'Kabupaten', 'Boven Digoel', '24'),
('091', 'Kabupaten', 'Boyolali', '10'),
('092', 'Kabupaten', 'Brebes', '10'),
('093', 'Kota', 'Bukittinggi', '32'),
('094', 'Kabupaten', 'Buleleng', '01'),
('095', 'Kabupaten', 'Bulukumba', '28'),
('096', 'Kabupaten', 'Bulungan (Bulongan)', '16'),
('097', 'Kabupaten', 'Bungo', '08'),
('098', 'Kabupaten', 'Buol', '29'),
('099', 'Kabupaten', 'Buru', '19'),
('100', 'Kabupaten', 'Buru Selatan', '19'),
('101', 'Kabupaten', 'Buton', '30'),
('102', 'Kabupaten', 'Buton Utara', '30'),
('103', 'Kabupaten', 'Ciamis', '09'),
('104', 'Kabupaten', 'Cianjur', '09'),
('105', 'Kabupaten', 'Cilacap', '10'),
('106', 'Kota', 'Cilegon', '03'),
('107', 'Kota', 'Cimahi', '09'),
('108', 'Kabupaten', 'Cirebon', '09'),
('109', 'Kota', 'Cirebon', '09'),
('110', 'Kabupaten', 'Dairi', '34'),
('111', 'Kabupaten', 'Deiyai (Deliyai)', '24'),
('112', 'Kabupaten', 'Deli Serdang', '34'),
('113', 'Kabupaten', 'Demak', '10'),
('114', 'Kota', 'Denpasar', '01'),
('115', 'Kota', 'Depok', '09'),
('116', 'Kabupaten', 'Dharmasraya', '32'),
('117', 'Kabupaten', 'Dogiyai', '24'),
('118', 'Kabupaten', 'Dompu', '22'),
('119', 'Kabupaten', 'Donggala', '29'),
('120', 'Kota', 'Dumai', '26'),
('121', 'Kabupaten', 'Empat Lawang', '33'),
('122', 'Kabupaten', 'Ende', '23'),
('123', 'Kabupaten', 'Enrekang', '28'),
('124', 'Kabupaten', 'Fakfak', '25'),
('125', 'Kabupaten', 'Flores Timur', '23'),
('126', 'Kabupaten', 'Garut', '09'),
('127', 'Kabupaten', 'Gayo Lues', '21'),
('128', 'Kabupaten', 'Gianyar', '01'),
('129', 'Kabupaten', 'Gorontalo', '07'),
('130', 'Kota', 'Gorontalo', '07'),
('131', 'Kabupaten', 'Gorontalo Utara', '07'),
('132', 'Kabupaten', 'Gowa', '28'),
('133', 'Kabupaten', 'Gresik', '11'),
('134', 'Kabupaten', 'Grobogan', '10'),
('135', 'Kabupaten', 'Gunung Kidul', '05'),
('136', 'Kabupaten', 'Gunung Mas', '14'),
('137', 'Kota', 'Gunungsitoli', '34'),
('138', 'Kabupaten', 'Halmahera Barat', '20'),
('139', 'Kabupaten', 'Halmahera Selatan', '20'),
('140', 'Kabupaten', 'Halmahera Tengah', '20'),
('141', 'Kabupaten', 'Halmahera Timur', '20'),
('142', 'Kabupaten', 'Halmahera Utara', '20'),
('143', 'Kabupaten', 'Hulu Sungai Selatan', '13'),
('144', 'Kabupaten', 'Hulu Sungai Tengah', '13'),
('145', 'Kabupaten', 'Hulu Sungai Utara', '13'),
('146', 'Kabupaten', 'Humbang Hasundutan', '34'),
('147', 'Kabupaten', 'Indragiri Hilir', '26'),
('148', 'Kabupaten', 'Indragiri Hulu', '26'),
('149', 'Kabupaten', 'Indramayu', '09'),
('150', 'Kabupaten', 'Intan Jaya', '24'),
('151', 'Kota', 'Jakarta Barat', '06'),
('152', 'Kota', 'Jakarta Pusat', '06'),
('153', 'Kota', 'Jakarta Selatan', '06'),
('154', 'Kota', 'Jakarta Timur', '06'),
('155', 'Kota', 'Jakarta Utara', '06'),
('156', 'Kota', 'Jambi', '08'),
('157', 'Kabupaten', 'Jayapura', '24'),
('158', 'Kota', 'Jayapura', '24'),
('159', 'Kabupaten', 'Jayawijaya', '24'),
('160', 'Kabupaten', 'Jember', '11'),
('161', 'Kabupaten', 'Jembrana', '01'),
('162', 'Kabupaten', 'Jeneponto', '28'),
('163', 'Kabupaten', 'Jepara', '10'),
('164', 'Kabupaten', 'Jombang', '11'),
('165', 'Kabupaten', 'Kaimana', '25'),
('166', 'Kabupaten', 'Kampar', '26'),
('167', 'Kabupaten', 'Kapuas', '14'),
('168', 'Kabupaten', 'Kapuas Hulu', '12'),
('169', 'Kabupaten', 'Karanganyar', '10'),
('170', 'Kabupaten', 'Karangasem', '01'),
('171', 'Kabupaten', 'Karawang', '09'),
('172', 'Kabupaten', 'Karimun', '17'),
('173', 'Kabupaten', 'Karo', '34'),
('174', 'Kabupaten', 'Katingan', '14'),
('175', 'Kabupaten', 'Kaur', '04'),
('176', 'Kabupaten', 'Kayong Utara', '12'),
('177', 'Kabupaten', 'Kebumen', '10'),
('178', 'Kabupaten', 'Kediri', '11'),
('179', 'Kota', 'Kediri', '11'),
('180', 'Kabupaten', 'Keerom', '24'),
('181', 'Kabupaten', 'Kendal', '10'),
('182', 'Kota', 'Kendari', '30'),
('183', 'Kabupaten', 'Kepahiang', '04'),
('184', 'Kabupaten', 'Kepulauan Anambas', '17'),
('185', 'Kabupaten', 'Kepulauan Aru', '19'),
('186', 'Kabupaten', 'Kepulauan Mentawai', '32'),
('187', 'Kabupaten', 'Kepulauan Meranti', '26'),
('188', 'Kabupaten', 'Kepulauan Sangihe', '31'),
('189', 'Kabupaten', 'Kepulauan Seribu', '06'),
('190', 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', '31'),
('191', 'Kabupaten', 'Kepulauan Sula', '20'),
('192', 'Kabupaten', 'Kepulauan Talaud', '31'),
('193', 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)', '24'),
('194', 'Kabupaten', 'Kerinci', '08'),
('195', 'Kabupaten', 'Ketapang', '12'),
('196', 'Kabupaten', 'Klaten', '10'),
('197', 'Kabupaten', 'Klungkung', '01'),
('198', 'Kabupaten', 'Kolaka', '30'),
('199', 'Kabupaten', 'Kolaka Utara', '30'),
('200', 'Kabupaten', 'Konawe', '30'),
('201', 'Kabupaten', 'Konawe Selatan', '30'),
('202', 'Kabupaten', 'Konawe Utara', '30'),
('203', 'Kabupaten', 'Kotabaru', '13'),
('204', 'Kota', 'Kotamobagu', '31'),
('205', 'Kabupaten', 'Kotawaringin Barat', '14'),
('206', 'Kabupaten', 'Kotawaringin Timur', '14'),
('207', 'Kabupaten', 'Kuantan Singingi', '26'),
('208', 'Kabupaten', 'Kubu Raya', '12'),
('209', 'Kabupaten', 'Kudus', '10'),
('210', 'Kabupaten', 'Kulon Progo', '05'),
('211', 'Kabupaten', 'Kuningan', '09'),
('212', 'Kabupaten', 'Kupang', '23'),
('213', 'Kota', 'Kupang', '23'),
('214', 'Kabupaten', 'Kutai Barat', '15'),
('215', 'Kabupaten', 'Kutai Kartanegara', '15'),
('216', 'Kabupaten', 'Kutai Timur', '15'),
('217', 'Kabupaten', 'Labuhan Batu', '34'),
('218', 'Kabupaten', 'Labuhan Batu Selatan', '34'),
('219', 'Kabupaten', 'Labuhan Batu Utara', '34'),
('220', 'Kabupaten', 'Lahat', '33'),
('221', 'Kabupaten', 'Lamandau', '14'),
('222', 'Kabupaten', 'Lamongan', '11'),
('223', 'Kabupaten', 'Lampung Barat', '18'),
('224', 'Kabupaten', 'Lampung Selatan', '18'),
('225', 'Kabupaten', 'Lampung Tengah', '18'),
('226', 'Kabupaten', 'Lampung Timur', '18'),
('227', 'Kabupaten', 'Lampung Utara', '18'),
('228', 'Kabupaten', 'Landak', '12'),
('229', 'Kabupaten', 'Langkat', '34'),
('230', 'Kota', 'Langsa', '21'),
('231', 'Kabupaten', 'Lanny Jaya', '24'),
('232', 'Kabupaten', 'Lebak', '03'),
('233', 'Kabupaten', 'Lebong', '04'),
('234', 'Kabupaten', 'Lembata', '23'),
('235', 'Kota', 'Lhokseumawe', '21'),
('236', 'Kabupaten', 'Lima Puluh Koto/Kota', '32'),
('237', 'Kabupaten', 'Lingga', '17'),
('238', 'Kabupaten', 'Lombok Barat', '22'),
('239', 'Kabupaten', 'Lombok Tengah', '22'),
('240', 'Kabupaten', 'Lombok Timur', '22'),
('241', 'Kabupaten', 'Lombok Utara', '22'),
('242', 'Kota', 'Lubuk Linggau', '33'),
('243', 'Kabupaten', 'Lumajang', '11'),
('244', 'Kabupaten', 'Luwu', '28'),
('245', 'Kabupaten', 'Luwu Timur', '28'),
('246', 'Kabupaten', 'Luwu Utara', '28'),
('247', 'Kabupaten', 'Madiun', '11'),
('248', 'Kota', 'Madiun', '11'),
('249', 'Kabupaten', 'Magelang', '10'),
('250', 'Kota', 'Magelang', '10'),
('251', 'Kabupaten', 'Magetan', '11'),
('252', 'Kabupaten', 'Majalengka', '09'),
('253', 'Kabupaten', 'Majene', '27'),
('254', 'Kota', 'Makassar', '28'),
('255', 'Kabupaten', 'Malang', '11'),
('256', 'Kota', 'Malang', '11'),
('257', 'Kabupaten', 'Malinau', '16'),
('258', 'Kabupaten', 'Maluku Barat Daya', '19'),
('259', 'Kabupaten', 'Maluku Tengah', '19'),
('260', 'Kabupaten', 'Maluku Tenggara', '19'),
('261', 'Kabupaten', 'Maluku Tenggara Barat', '19'),
('262', 'Kabupaten', 'Mamasa', '27'),
('263', 'Kabupaten', 'Mamberamo Raya', '24'),
('264', 'Kabupaten', 'Mamberamo Tengah', '24'),
('265', 'Kabupaten', 'Mamuju', '27'),
('266', 'Kabupaten', 'Mamuju Utara', '27'),
('267', 'Kota', 'Manado', '31'),
('268', 'Kabupaten', 'Mandailing Natal', '34'),
('269', 'Kabupaten', 'Manggarai', '23'),
('270', 'Kabupaten', 'Manggarai Barat', '23'),
('271', 'Kabupaten', 'Manggarai Timur', '23'),
('272', 'Kabupaten', 'Manokwari', '25'),
('273', 'Kabupaten', 'Manokwari Selatan', '25'),
('274', 'Kabupaten', 'Mappi', '24'),
('275', 'Kabupaten', 'Maros', '28'),
('276', 'Kota', 'Mataram', '22'),
('277', 'Kabupaten', 'Maybrat', '25'),
('278', 'Kota', 'Medan', '34'),
('279', 'Kabupaten', 'Melawi', '12'),
('280', 'Kabupaten', 'Merangin', '08'),
('281', 'Kabupaten', 'Merauke', '24'),
('282', 'Kabupaten', 'Mesuji', '18'),
('283', 'Kota', 'Metro', '18'),
('284', 'Kabupaten', 'Mimika', '24'),
('285', 'Kabupaten', 'Minahasa', '31'),
('286', 'Kabupaten', 'Minahasa Selatan', '31'),
('287', 'Kabupaten', 'Minahasa Tenggara', '31'),
('288', 'Kabupaten', 'Minahasa Utara', '31'),
('289', 'Kabupaten', 'Mojokerto', '11'),
('290', 'Kota', 'Mojokerto', '11'),
('291', 'Kabupaten', 'Morowali', '29'),
('292', 'Kabupaten', 'Muara Enim', '33'),
('293', 'Kabupaten', 'Muaro Jambi', '08'),
('294', 'Kabupaten', 'Muko Muko', '04'),
('295', 'Kabupaten', 'Muna', '30'),
('296', 'Kabupaten', 'Murung Raya', '14'),
('297', 'Kabupaten', 'Musi Banyuasin', '33'),
('298', 'Kabupaten', 'Musi Rawas', '33'),
('299', 'Kabupaten', 'Nabire', '24'),
('300', 'Kabupaten', 'Nagan Raya', '21'),
('301', 'Kabupaten', 'Nagekeo', '23'),
('302', 'Kabupaten', 'Natuna', '17'),
('303', 'Kabupaten', 'Nduga', '24'),
('304', 'Kabupaten', 'Ngada', '23'),
('305', 'Kabupaten', 'Nganjuk', '11'),
('306', 'Kabupaten', 'Ngawi', '11'),
('307', 'Kabupaten', 'Nias', '34'),
('308', 'Kabupaten', 'Nias Barat', '34'),
('309', 'Kabupaten', 'Nias Selatan', '34'),
('310', 'Kabupaten', 'Nias Utara', '34'),
('311', 'Kabupaten', 'Nunukan', '16'),
('312', 'Kabupaten', 'Ogan Ilir', '33'),
('313', 'Kabupaten', 'Ogan Komering Ilir', '33'),
('314', 'Kabupaten', 'Ogan Komering Ulu', '33'),
('315', 'Kabupaten', 'Ogan Komering Ulu Selatan', '33'),
('316', 'Kabupaten', 'Ogan Komering Ulu Timur', '33'),
('317', 'Kabupaten', 'Pacitan', '11'),
('318', 'Kota', 'Padang', '32'),
('319', 'Kabupaten', 'Padang Lawas', '34'),
('320', 'Kabupaten', 'Padang Lawas Utara', '34'),
('321', 'Kota', 'Padang Panjang', '32'),
('322', 'Kabupaten', 'Padang Pariaman', '32'),
('323', 'Kota', 'Padang Sidempuan', '34'),
('324', 'Kota', 'Pagar Alam', '33'),
('325', 'Kabupaten', 'Pakpak Bharat', '34'),
('326', 'Kota', 'Palangka Raya', '14'),
('327', 'Kota', 'Palembang', '33'),
('328', 'Kota', 'Palopo', '28'),
('329', 'Kota', 'Palu', '29'),
('330', 'Kabupaten', 'Pamekasan', '11'),
('331', 'Kabupaten', 'Pandeglang', '03'),
('332', 'Kabupaten', 'Pangandaran', '09'),
('333', 'Kabupaten', 'Pangkajene Kepulauan', '28'),
('334', 'Kota', 'Pangkal Pinang', '02'),
('335', 'Kabupaten', 'Paniai', '24'),
('336', 'Kota', 'Parepare', '28'),
('337', 'Kota', 'Pariaman', '32'),
('338', 'Kabupaten', 'Parigi Moutong', '29'),
('339', 'Kabupaten', 'Pasaman', '32'),
('340', 'Kabupaten', 'Pasaman Barat', '32'),
('341', 'Kabupaten', 'Paser', '15'),
('342', 'Kabupaten', 'Pasuruan', '11'),
('343', 'Kota', 'Pasuruan', '11'),
('344', 'Kabupaten', 'Pati', '10'),
('345', 'Kota', 'Payakumbuh', '32'),
('346', 'Kabupaten', 'Pegunungan Arfak', '25'),
('347', 'Kabupaten', 'Pegunungan Bintang', '24'),
('348', 'Kabupaten', 'Pekalongan', '10'),
('349', 'Kota', 'Pekalongan', '10'),
('350', 'Kota', 'Pekanbaru', '26'),
('351', 'Kabupaten', 'Pelalawan', '26'),
('352', 'Kabupaten', 'Pemalang', '10'),
('353', 'Kota', 'Pematang Siantar', '34'),
('354', 'Kabupaten', 'Penajam Paser Utara', '15'),
('355', 'Kabupaten', 'Pesawaran', '18'),
('356', 'Kabupaten', 'Pesisir Barat', '18'),
('357', 'Kabupaten', 'Pesisir Selatan', '32'),
('358', 'Kabupaten', 'Pidie', '21'),
('359', 'Kabupaten', 'Pidie Jaya', '21'),
('360', 'Kabupaten', 'Pinrang', '28'),
('361', 'Kabupaten', 'Pohuwato', '07'),
('362', 'Kabupaten', 'Polewali Mandar', '27'),
('363', 'Kabupaten', 'Ponorogo', '11'),
('364', 'Kabupaten', 'Pontianak', '12'),
('365', 'Kota', 'Pontianak', '12'),
('366', 'Kabupaten', 'Poso', '29'),
('367', 'Kota', 'Prabumulih', '33'),
('368', 'Kabupaten', 'Pringsewu', '18'),
('369', 'Kabupaten', 'Probolinggo', '11'),
('370', 'Kota', 'Probolinggo', '11'),
('371', 'Kabupaten', 'Pulang Pisau', '14'),
('372', 'Kabupaten', 'Pulau Morotai', '20'),
('373', 'Kabupaten', 'Puncak', '24'),
('374', 'Kabupaten', 'Puncak Jaya', '24'),
('375', 'Kabupaten', 'Purbalingga', '10'),
('376', 'Kabupaten', 'Purwakarta', '09'),
('377', 'Kabupaten', 'Purworejo', '10'),
('378', 'Kabupaten', 'Raja Ampat', '25'),
('379', 'Kabupaten', 'Rejang Lebong', '04'),
('380', 'Kabupaten', 'Rembang', '10'),
('381', 'Kabupaten', 'Rokan Hilir', '26'),
('382', 'Kabupaten', 'Rokan Hulu', '26'),
('383', 'Kabupaten', 'Rote Ndao', '23'),
('384', 'Kota', 'Sabang', '21'),
('385', 'Kabupaten', 'Sabu Raijua', '23'),
('386', 'Kota', 'Salatiga', '10'),
('387', 'Kota', 'Samarinda', '15'),
('388', 'Kabupaten', 'Sambas', '12'),
('389', 'Kabupaten', 'Samosir', '34'),
('390', 'Kabupaten', 'Sampang', '11'),
('391', 'Kabupaten', 'Sanggau', '12'),
('392', 'Kabupaten', 'Sarmi', '24'),
('393', 'Kabupaten', 'Sarolangun', '08'),
('394', 'Kota', 'Sawah Lunto', '32'),
('395', 'Kabupaten', 'Sekadau', '12'),
('396', 'Kabupaten', 'Selayar (Kepulauan Selayar)', '28'),
('397', 'Kabupaten', 'Seluma', '04'),
('398', 'Kabupaten', 'Semarang', '10'),
('399', 'Kota', 'Semarang', '10'),
('400', 'Kabupaten', 'Seram Bagian Barat', '19'),
('401', 'Kabupaten', 'Seram Bagian Timur', '19'),
('402', 'Kabupaten', 'Serang', '03'),
('403', 'Kota', 'Serang', '03'),
('404', 'Kabupaten', 'Serdang Bedagai', '34'),
('405', 'Kabupaten', 'Seruyan', '14'),
('406', 'Kabupaten', 'Siak', '26'),
('407', 'Kota', 'Sibolga', '34'),
('408', 'Kabupaten', 'Sidenreng Rappang/Rapang', '28'),
('409', 'Kabupaten', 'Sidoarjo', '11'),
('410', 'Kabupaten', 'Sigi', '29'),
('411', 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)', '32'),
('412', 'Kabupaten', 'Sikka', '23'),
('413', 'Kabupaten', 'Simalungun', '34'),
('414', 'Kabupaten', 'Simeulue', '21'),
('415', 'Kota', 'Singkawang', '12'),
('416', 'Kabupaten', 'Sinjai', '28'),
('417', 'Kabupaten', 'Sintang', '12'),
('418', 'Kabupaten', 'Situbondo', '11'),
('419', 'Kabupaten', 'Sleman', '05'),
('420', 'Kabupaten', 'Solok', '32'),
('421', 'Kota', 'Solok', '32'),
('422', 'Kabupaten', 'Solok Selatan', '32'),
('423', 'Kabupaten', 'Soppeng', '28'),
('424', 'Kabupaten', 'Sorong', '25'),
('425', 'Kota', 'Sorong', '25'),
('426', 'Kabupaten', 'Sorong Selatan', '25'),
('427', 'Kabupaten', 'Sragen', '10'),
('428', 'Kabupaten', 'Subang', '09'),
('429', 'Kota', 'Subulussalam', '21'),
('430', 'Kabupaten', 'Sukabumi', '09'),
('431', 'Kota', 'Sukabumi', '09'),
('432', 'Kabupaten', 'Sukamara', '14'),
('433', 'Kabupaten', 'Sukoharjo', '10'),
('434', 'Kabupaten', 'Sumba Barat', '23'),
('435', 'Kabupaten', 'Sumba Barat Daya', '23'),
('436', 'Kabupaten', 'Sumba Tengah', '23'),
('437', 'Kabupaten', 'Sumba Timur', '23'),
('438', 'Kabupaten', 'Sumbawa', '22'),
('439', 'Kabupaten', 'Sumbawa Barat', '22'),
('440', 'Kabupaten', 'Sumedang', '09'),
('441', 'Kabupaten', 'Sumenep', '11'),
('442', 'Kota', 'Sungaipenuh', '08'),
('443', 'Kabupaten', 'Supiori', '24'),
('444', 'Kota', 'Surabaya', '11'),
('445', 'Kota', 'Surakarta (Solo)', '10'),
('446', 'Kabupaten', 'Tabalong', '13'),
('447', 'Kabupaten', 'Tabanan', '01'),
('448', 'Kabupaten', 'Takalar', '28'),
('449', 'Kabupaten', 'Tambrauw', '25'),
('450', 'Kabupaten', 'Tana Tidung', '16'),
('451', 'Kabupaten', 'Tana Toraja', '28'),
('452', 'Kabupaten', 'Tanah Bumbu', '13'),
('453', 'Kabupaten', 'Tanah Datar', '32'),
('454', 'Kabupaten', 'Tanah Laut', '13'),
('455', 'Kabupaten', 'Tangerang', '03'),
('456', 'Kota', 'Tangerang', '03'),
('457', 'Kota', 'Tangerang Selatan', '03'),
('458', 'Kabupaten', 'Tanggamus', '18'),
('459', 'Kota', 'Tanjung Balai', '34'),
('460', 'Kabupaten', 'Tanjung Jabung Barat', '08'),
('461', 'Kabupaten', 'Tanjung Jabung Timur', '08'),
('462', 'Kota', 'Tanjung Pinang', '17'),
('463', 'Kabupaten', 'Tapanuli Selatan', '34'),
('464', 'Kabupaten', 'Tapanuli Tengah', '34'),
('465', 'Kabupaten', 'Tapanuli Utara', '34'),
('466', 'Kabupaten', 'Tapin', '13'),
('467', 'Kota', 'Tarakan', '16'),
('468', 'Kabupaten', 'Tasikmalaya', '09'),
('469', 'Kota', 'Tasikmalaya', '09'),
('470', 'Kota', 'Tebing Tinggi', '34'),
('471', 'Kabupaten', 'Tebo', '08'),
('472', 'Kabupaten', 'Tegal', '10'),
('473', 'Kota', 'Tegal', '10'),
('474', 'Kabupaten', 'Teluk Bintuni', '25'),
('475', 'Kabupaten', 'Teluk Wondama', '25'),
('476', 'Kabupaten', 'Temanggung', '10'),
('477', 'Kota', 'Ternate', '20'),
('478', 'Kota', 'Tidore Kepulauan', '20'),
('479', 'Kabupaten', 'Timor Tengah Selatan', '23'),
('480', 'Kabupaten', 'Timor Tengah Utara', '23'),
('481', 'Kabupaten', 'Toba Samosir', '34'),
('482', 'Kabupaten', 'Tojo Una-Una', '29'),
('483', 'Kabupaten', 'Toli-Toli', '29'),
('484', 'Kabupaten', 'Tolikara', '24'),
('485', 'Kota', 'Tomohon', '31'),
('486', 'Kabupaten', 'Toraja Utara', '28'),
('487', 'Kabupaten', 'Trenggalek', '11'),
('488', 'Kota', 'Tual', '19'),
('489', 'Kabupaten', 'Tuban', '11'),
('490', 'Kabupaten', 'Tulang Bawang', '18'),
('491', 'Kabupaten', 'Tulang Bawang Barat', '18'),
('492', 'Kabupaten', 'Tulungagung', '11'),
('493', 'Kabupaten', 'Wajo', '28'),
('494', 'Kabupaten', 'Wakatobi', '30'),
('495', 'Kabupaten', 'Waropen', '24'),
('496', 'Kabupaten', 'Way Kanan', '18'),
('497', 'Kabupaten', 'Wonogiri', '10'),
('498', 'Kabupaten', 'Wonosobo', '10'),
('499', 'Kabupaten', 'Yahukimo', '24'),
('500', 'Kabupaten', 'Yalimo', '24'),
('501', 'Kota', 'Yogyakarta', '05');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` varchar(50) NOT NULL,
  `id_instruktur` varchar(128) NOT NULL,
  `nama_materi` varchar(124) NOT NULL,
  `url_materi` varchar(535) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `id_instruktur`, `nama_materi`, `url_materi`) VALUES
('20210615223316s2C', '202109126J0YSi', 'CONTOH', 'https://drive.google.com/drive/u/2/folders/1hCabLWK5GqKrDH_H-RhZEK5gRnMZ7C97');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` varchar(18) NOT NULL,
  `nama_mitra` varchar(255) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `id_kota` varchar(4) NOT NULL,
  `titik_koordinat` varchar(535) NOT NULL,
  `situs_web` varchar(255) NOT NULL,
  `profil_ringkas` text NOT NULL,
  `koordinator` varchar(128) NOT NULL,
  `jabatan_koordinator` varchar(50) NOT NULL,
  `no_hp_koordinator` varchar(15) NOT NULL,
  `email_koordinator` varchar(128) NOT NULL,
  `pimpinan` varchar(128) NOT NULL,
  `jabatan_pimpinan` varchar(50) NOT NULL,
  `no_hp_pimpinan` varchar(15) NOT NULL,
  `email_pimpinan` varchar(128) NOT NULL,
  `logo` varchar(128) NOT NULL,
  `jenis_layanan` varchar(128) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_tim` varchar(18) NOT NULL,
  `id_cluster` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `alamat`, `kecamatan`, `id_kota`, `titik_koordinat`, `situs_web`, `profil_ringkas`, `koordinator`, `jabatan_koordinator`, `no_hp_koordinator`, `email_koordinator`, `pimpinan`, `jabatan_pimpinan`, `no_hp_pimpinan`, `email_pimpinan`, `logo`, `jenis_layanan`, `password`, `id_tim`, `id_cluster`) VALUES
('20210601173904p', 'INTINA GROUP', 'Kp. Bojong Kalapa rt.03 rw.05, Desa. Karangsari', 'Karangpawitan', '126', 'Titik koordinat 1', 'http://rtikabdimas.sttgarut.ac.id/p/kontrak-koordinator.html', 'merupakan sebuah UMKM yang bergerak dalam bidang craft', 'Tina Maryana', 'Wakil Pimpinan', '012345678910', 'tmaryana96@gmail.com', 'Ihsan Nugraha', 'Pemilik', '0895369729896', 'ihsannugraha96@gmail.com', 'default_logo.png', 'Layanan Pengguna', 'MTIzNDU2Nzg=', '20210601153728qiNk', '1'),
('20210601173904Q', 'INTINA STORE', 'Kp. Bojong Kalapa rt.03 rw.05, Desa. Karangsari', 'Karangpawitan', '126', 'Titik koordinat 1', 'http://rtikabdimas.sttgarut.ac.id/p/kontrak-koordinator.html', 'merupakan sebuah UMKM yang bergerak dalam bidang craft', 'Tina Maryana', 'Wakil Pimpinan', '012345678910', 'ihsannugraha96@gmail.com', 'Ihsan Nugraha', 'Pemilik', '0895369729896', 'ihsannugraha96@gmail.com', 'default_logo.png', 'Layanan Informasi', 'MTIzNDU2Nzg=', '20210601153728qiNp', '2');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_individu`
--

CREATE TABLE `nilai_individu` (
  `id_nilai_individu` varchar(18) NOT NULL,
  `id_anggota_tim` varchar(18) NOT NULL,
  `id_penilai` varchar(18) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kinerja_relawan`
--

CREATE TABLE `nilai_kinerja_relawan` (
  `id_nilai_kinerja` varchar(18) NOT NULL,
  `id_anggota` varchar(18) NOT NULL,
  `nilai_kinerja_relawan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_kinerja_relawan`
--

INSERT INTO `nilai_kinerja_relawan` (`id_nilai_kinerja`, `id_anggota`, `nilai_kinerja_relawan`) VALUES
('2021062610125458k', 'CJuwQmxyNoP3qvl1', 0),
('202106261300078SQ', 'CJuwQmxyNoP3qvl3', 0),
('20210626133456a3f', 'CJuwQmxyNoP3qv96', 0),
('20210626135841L8x', '1d8wzHUxV9iAsYn1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kinerja_tim`
--

CREATE TABLE `nilai_kinerja_tim` (
  `id_nilai_kinerja_tim` varchar(18) NOT NULL,
  `id_tim` varchar(18) NOT NULL,
  `nilai_dokumen` float NOT NULL,
  `nilai_mitra` float NOT NULL,
  `nilai_laporan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembekalan`
--

CREATE TABLE `pembekalan` (
  `id_pembekalan` varchar(18) NOT NULL,
  `id_event` varchar(18) NOT NULL,
  `id_instruktur` varchar(50) NOT NULL,
  `id_pengumuman` varchar(50) NOT NULL,
  `waktu_pelaksanaan` datetime NOT NULL,
  `link` varchar(128) NOT NULL,
  `link_materi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembekalan`
--

INSERT INTO `pembekalan` (`id_pembekalan`, `id_event`, `id_instruktur`, `id_pengumuman`, `waktu_pelaksanaan`, `link`, `link_materi`) VALUES
('20210601175158n', 'CJuwQmxyNoP3qvl', '202109126J0YSi', '20210601175158n', '2021-06-23 22:51:00', 'https://drive.google.com/file/d/1rv4-JMnGslnFHVoqo4af7SzFjc_go1aA/view', 'https://drive.google.com/drive/u/0/my-drive'),
('20210601175158y', 'CJuwQmxyNoP3qvp', '202109126J0YSi', '20210601175158n', '2020-06-17 22:51:00', 'https://drive.google.com/file/d/1rv4-JMnGslnFHVoqo4af7SzFjc_go1aA/view', 'https://drive.google.com/drive/u/0/my-drive'),
('20210620154652i', 'ouFPMTRCk4hfA7m', '202109126J0YSi', '20210620154652i', '2021-06-03 08:05:00', 'https://drive.google.com/file/d/1rv4-JMnGslnFHVoqo4af7SzFjc_go1aA/view', 'https://drive.google.com/drive/u/0/my-drive');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id_pembimbing` varchar(18) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_komisariat` varchar(18) NOT NULL,
  `nik` varchar(18) DEFAULT NULL,
  `nama` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat_rumah` varchar(255) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `id_kota` varchar(4) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `sektor_pekerjaan` varchar(30) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`id_pembimbing`, `email`, `id_komisariat`, `nik`, `nama`, `tgl_lahir`, `jenis_kelamin`, `alamat_rumah`, `kecamatan`, `id_kota`, `no_telp`, `sektor_pekerjaan`, `jabatan`, `image`, `password`, `role_id`) VALUES
('2021060272009y8', 'ihsannugraha86@gmail.com', '20210531200934vOFn', '11111111111257', 'pembimbing sttg 1', '0000-00-00', 'Laki-laki', '-', '-', '126', '-', '-', '-', 'default_image.jpg', 'MTIzNDU2Nzg=', 1),
('2021060272009yz', 'ihsannugraha96@gmail.com', '20210531200934vOFn', '', 'pembimbing utama', '2021-06-17', 'Laki-laki', 'Kp. Bojong Kalapa rt.03 rw.05, desa. Karangsari', 'Karangpawitan', '126', '08953695795', 'Pendidikan', 'Dosen', 'default_image.jpg', 'MTIzNDU2Nzg=', 1),
('2021060495109JG', '1706005@sttgarut.ac.id', '20210531200934vOFn', 'crjzGTx6', '222222', '0000-00-00', '-', '-', '-', '126', '-', '-', '-', 'default_image.jpg', 'Y3JqekdUeDY=', 2),
('dummy', '-', '-', '-', 'tidak ditemukan ', '0000-00-00', '-', '-', '-', '-', '-', '-', '-', '-', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` varchar(15) NOT NULL,
  `id_pembuat` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `isi` text NOT NULL,
  `batas_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_pembuat`, `date`, `isi`, `batas_waktu`) VALUES
('20210531201354e', '1', '2021-05-31 20:13:54', 'Ini pengumuman pertama pada event ini ', '2021-06-25 00:57:00'),
('20210620154652i', '1', '2021-06-20 15:46:52', 'acara pembekalan', '2021-06-03 08:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `persentase_kriteria_penilaian`
--

CREATE TABLE `persentase_kriteria_penilaian` (
  `id` varchar(18) NOT NULL,
  `kd_kriteria` varchar(3) NOT NULL,
  `kd_penilaian` varchar(18) NOT NULL,
  `persentase` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persentase_kriteria_penilaian`
--

INSERT INTO `persentase_kriteria_penilaian` (`id`, `kd_kriteria`, `kd_penilaian`, `persentase`) VALUES
('20210609202349mQ2', 'KT', 'dok', 20),
('20210609202349mQ4', 'KT', 'mtr', 30),
('20210609202349mQ6', 'KT', 'lpr', 50),
('20210609202349mQA', 'NI', 'nid', 100),
('20210609202349mQl', 'KR', 'NI', 60),
('20210609202349mQm', 'KR', 'KT', 40);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` varchar(3) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
('01', 'Bali'),
('02', 'Bangka Belitung'),
('03', 'Banten'),
('04', 'Bengkulu'),
('05', 'DI Yogyakarta'),
('06', 'DKI Jakarta'),
('07', 'Gorontalo'),
('08', 'Jambi'),
('09', 'Jawa Barat'),
('10', 'Jawa Tengah'),
('11', 'Jawa Timur'),
('12', 'Kalimantan Barat'),
('13', 'Kalimantan Selatan'),
('14', 'Kalimantan Tengah'),
('15', 'Kalimantan Timur'),
('16', 'Kalimantan Utara'),
('17', 'Kepulauan Riau'),
('18', 'Lampung'),
('19', 'Maluku'),
('20', 'Maluku Utara'),
('21', 'Nanggroe Aceh Darussalam (NAD)'),
('22', 'Nusa Tenggara Barat (NTB)'),
('23', 'Nusa Tenggara Timur (NTT)'),
('24', 'Papua'),
('25', 'Papua Barat'),
('26', 'Riau'),
('27', 'Sulawesi Barat'),
('28', 'Sulawesi Selatan'),
('29', 'Sulawesi Tengah'),
('30', 'Sulawesi Tenggara'),
('31', 'Sulawesi Utara'),
('32', 'Sumatera Barat'),
('33', 'Sumatera Selatan'),
('34', 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `relawan`
--

CREATE TABLE `relawan` (
  `id_relawan` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `provinsi` varchar(3) NOT NULL,
  `kota` varchar(4) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `komisariat` varchar(18) NOT NULL,
  `registrasi` varchar(25) NOT NULL,
  `id_card` varchar(50) NOT NULL,
  `alamat_lengkap` varchar(535) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `keahlian_lain` varchar(50) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `pendidikan_terakhir` varchar(3) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `thn_anggota` year(4) NOT NULL,
  `jabatan_di_rtik` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(535) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relawan`
--

INSERT INTO `relawan` (`id_relawan`, `username`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `provinsi`, `kota`, `kecamatan`, `komisariat`, `registrasi`, `id_card`, `alamat_lengkap`, `no_hp`, `email`, `keahlian_lain`, `pekerjaan`, `pendidikan_terakhir`, `nik`, `thn_anggota`, `jabatan_di_rtik`, `image`, `password`, `is_active`) VALUES
('20210202920210531200934vOFn0608195910', '@administrator', 'Charlie', 'Laki-laki', 'Garut', '2021-06-25', '02', '029', 'Karangpawitan', '20210531200934vOFn', 'none', 'yusuf21.jpg', 'jakljgkabs dkjasgd gdhgsahbaslk ahjgasb', '112456414345', 'nugrahaihsan95@gmail.com', 'Desain Grafis', 'Belum Bekerja', 'D3', '1223445', 0000, 'belum di atur!', 'default_image.jpg', 'MTIzNDU2Nzg=', 3),
('20210912620210531200934vOFn0531204136', '@ihsannugraha96', 'Ihsan Nugraha', 'Laki-laki', 'Garut', '2021-05-04', '09', '126', 'Karangpawitan', '20210531200934vOFn', 'none', 'default_id_card.jpg', 'Kp. Bojong kalapa rt.03 rw.05, Desa. Karangsari', '0895369729896', 'ihsannugraha96@gmail.com', 'Desain Grafis', 'Belum Bekerja', 'SMA', '3205024810860010', 2010, 'belum di atur!', 'ihsan.jpg', 'MTIzNDU2Nzg=', 3),
('20210912620210531200934vOFn0531236945', 'tes1', 'Alpha', 'Perempuan', 'Garut', '2021-05-11', '09', '126', 'Garut Kota', '20210531200934vOFn', 'none', '20210531204136QDPXK2M5zH', 'Kp. Loa', '08953697297654', 'tmaryana92@gmail.com', '', 'Belum Bekerja', 'SMA', '320502481086054', 0000, 'belum di atur!', 'default_image.jpg', 'MTIzNDU2Nzg=', 3),
('20210912620210531200934vOFn0531236965', 'tes2', 'Beta', 'Perempuan', 'Garut', '2021-05-11', '09', '126', 'Garut Kota', '20210531200934vOFn', 'none', '20210531204136QDPXK2M5zH', 'Kp. Loa', '0895369729832', 'tmaryana97@gmail.com', '', 'Belum Bekerja', 'SMA', '3205024810860098', 0000, 'belum di atur!', 'default_image.jpg', 'MTIzNDU2Nzg=', 3),
('20210912620210531200934vOFn0531236985', 'tes3', 'Tina Maryana', 'Perempuan', 'Garut', '2021-05-11', '09', '126', 'Garut Kota', '20210531200934vOFn', 'none', '20210531204136QDPXK2M5zH', 'Kp. Loa', '0895369729897', 'tmaryana98@gmail.com', '', 'Belum Bekerja', 'SMA', '3205024810860011', 0000, 'belum di atur!', 'default_image.jpg', 'MTIzNDU2Nzg=', 3),
('20210912620210531200934vOFn0531236986', 'tes4', 'Delta', 'Perempuan', 'Garut', '2021-05-11', '09', '126', 'Garut Kota', '20210531200934vOFn', 'none', '20210531204136QDPXK2M5zH', 'Kp. Loa', '0895369729868', 'tmaryana99@gmail.com', '', 'Belum Bekerja', 'SMA', '3205024810860024', 0000, 'belum di atur!', 'default_image.jpg', 'MTIzNDU2Nzg=', 3),
('dummy', '-', 'Akun tidak diketahui', '-', '-', '0000-00-00', '-', '-', '-', '-', '-', 'default_id_card.jpg', '-', '-', '-', '-', '-', '-', '-', 0000, '-', 'default_image.jpg', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id_template` varchar(15) NOT NULL,
  `nama_template` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id_template`, `nama_template`, `date`, `id_admin`) VALUES
('0', '01 Surat Izin.docx', '2021-05-29 08:33:05', 1),
('1', '02 Survei Permintaan.docx', '2021-05-29 08:33:05', 1),
('2', '03 Presensi Layanan Pengguna.docx', '2021-05-29 08:33:05', 1),
('3', '04 Berita Acara Layanan Lainnya.docx', '2021-05-29 08:33:05', 1),
('4', '05 Template Survei Program.docx', '2021-05-29 08:33:05', 1),
('5', '06 Template Artikel Berita.docx', '2021-05-29 08:33:05', 1),
('6', '07 Template artikel MIFTEK.docx', '2021-05-29 08:33:05', 1),
('mitra', 'mitra_-_Salin.png', '2021-05-31 20:15:09', 1),
('pangkalan', 'mitra_-_Salin.png', '2021-05-29 08:38:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `template_sertifikat`
--

CREATE TABLE `template_sertifikat` (
  `id_template` varchar(18) NOT NULL,
  `id_event` varchar(18) NOT NULL,
  `tempat_dikeluarkan` varchar(35) NOT NULL,
  `tgal_dikeluarkan` date NOT NULL,
  `nama_1` varchar(128) NOT NULL,
  `ttd_1` varchar(128) NOT NULL,
  `stempel_1` varchar(128) NOT NULL,
  `jabatan_1` varchar(128) NOT NULL,
  `nama_2` varchar(128) NOT NULL,
  `ttd_2` varchar(128) NOT NULL,
  `stempel_2` varchar(128) NOT NULL,
  `jabatan_2` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template_sertifikat`
--

INSERT INTO `template_sertifikat` (`id_template`, `id_event`, `tempat_dikeluarkan`, `tgal_dikeluarkan`, `nama_1`, `ttd_1`, `stempel_1`, `jabatan_1`, `nama_2`, `ttd_2`, `stempel_2`, `jabatan_2`) VALUES
('20210613130349Wod', 'CJuwQmxyNoP3qvl', 'Garut', '2021-06-30', 'Bambang Tri Santoso, S.Sn.', 'default_ttd.png', 'stempel_rtik2.png', 'Kepala Sub Direktorat Pemberdayaan Komunitas TIK', 'Fajar Eri Dianto', 'default_ttd.png', 'stempel_rtik2.png', 'Ketua Pengurus Pusat Relawan TIK Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id_tim` varchar(18) NOT NULL,
  `id_event` varchar(15) NOT NULL,
  `nama_tim` varchar(128) NOT NULL,
  `id_pembimbing` varchar(18) NOT NULL,
  `status_pembimbing` char(2) NOT NULL,
  `surat_pengantar` varchar(535) NOT NULL,
  `survey_permintaan` varchar(535) NOT NULL,
  `surat_konfirmasi` varchar(535) NOT NULL,
  `artikel_miftek` varchar(535) NOT NULL,
  `presensi_pelayanan` varchar(535) NOT NULL,
  `berita_Acara` varchar(535) NOT NULL,
  `status_pelayanan` char(2) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `laporan` mediumtext NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id_tim`, `id_event`, `nama_tim`, `id_pembimbing`, `status_pembimbing`, `surat_pengantar`, `survey_permintaan`, `surat_konfirmasi`, `artikel_miftek`, `presensi_pelayanan`, `berita_Acara`, `status_pelayanan`, `judul_laporan`, `laporan`, `role_id`) VALUES
('20210601153728qiNk', 'CJuwQmxyNoP3qvl', 'Algoritma 1', '2021060272009y8', '2', 'https://drive.google.com/file/d/1wJgLze_LFuRAn7WsX-awegFCZwgR_54M/view?usp=sharing', '-', 'https://drive.google.com/file/d/1wJgLze_LFuRAn7WsX-awegFCZwgR_54M/view?usp=sharing', '-', 'https://drive.google.com/file/d/1wJgLze_LFuRAn7WsX-awegFCZwgR_54M/view?usp=sharing', '-', '0', '-', '<p style=\"text-align: center; \"><br></p><p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p><p>assssssssssssajsgdbasjhd</p><p>asdgsagdhjsa</p><ol><li>iiasdjghasd</li><li>asdjgsakd</li><li>adgasd</li><li>dahsjd</li></ol><p>askhdjhsja</p><ul><li style=\"text-align: right; \">asdjasghdjhdfgkas</li><li style=\"text-align: right; \">djaskdgh</li></ul><p style=\"text-align: right;\"><br></p><p style=\"text-align: left;\">kadjkha</p><p style=\"text-align: center;\"></p><p style=\"text-align: left;\">ahjdsjas</p><p style=\"text-align: left;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left;\"><br></p>', 0),
('20210601153728qiNl', 'CJuwQmxyNoP3qvl', 'Algoritma 2', '2021060272009y8', '-', '-', '-', '-', '-', '-', '-', '0', '-', '<p style=\"text-align: center; \"><br></p><p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p><p>assssssssssssajsgdbasjhd</p><p>asdgsagdhjsa</p><ol><li>iiasdjghasd</li><li>asdjgsakd</li><li>adgasd</li><li>dahsjd</li></ol><p>askhdjhsja</p><ul><li style=\"text-align: right; \">asdjasghdjhdfgkas</li><li style=\"text-align: right; \">djaskdgh</li></ul><p style=\"text-align: right;\"><br></p><p style=\"text-align: left;\">kadjkha</p><p style=\"text-align: center;\"><img src=\"http://localhost/rtik_abdimas/assets/img/artikel/Simbolis_pemberian_kartu_tanda_peserta_paket_4_oleh_Kepala_Kelurahan_Pananjung.jpeg\" style=\"width: 50%;\"></p><p style=\"text-align: left;\">ahjdsjas</p><p style=\"text-align: left;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left;\"><br></p>', 0),
('20210601153728qiNp', 'CJuwQmxyNoP3qvl', 'Cloud 4', '2021060272009y8', '2', 'https://drive.google.com/file/d/1wJgLze_LFuRAn7WsX-awegFCZwgR_54M/view?usp=sharing', '-', 'https://drive.google.com/file/d/1wJgLze_LFuRAn7WsX-awegFCZwgR_54M/view?usp=sharing', '-', 'https://drive.google.com/file/d/1wJgLze_LFuRAn7WsX-awegFCZwgR_54M/view?usp=sharing', '-', '0', 'Laporan Kegiatan RTIKAbdimas 2021 Tim Cloud 4', '<p style=\"text-align: center; \"><br></p><p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p><p>assssssssssssajsgdbasjhd</p><p>asdgsagdhjsa</p><ol><li>iiasdjghasd</li><li>asdjgsakd</li><li>adgasd</li><li>dahsjd</li></ol><p>askhdjhsja</p><ul><li style=\"text-align: right; \">asdjasghdjhdfgkas</li><li style=\"text-align: right; \">djaskdgh</li></ul><p style=\"text-align: right;\"><br></p><p style=\"text-align: left;\">kadjkha</p><p style=\"text-align: center;\"><img src=\"http://localhost/rtik_abdimas/assets/img/artikel/Simbolis_pemberian_kartu_tanda_peserta_paket_4_oleh_Kepala_Kelurahan_Pananjung.jpeg\" style=\"width: 50%;\"></p><p style=\"text-align: left;\">ahjdsjas</p><p style=\"text-align: left;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left;\"><br></p>', 0),
('20210601153728qiNr', 'CJuwQmxyNoP3qvl', 'Cloud 1', '2021060272009yz', '0', '-', '-', '-', '-', '-', '-', '0', '-', '<p style=\"text-align: center; \"><br></p><p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p><p>assssssssssssajsgdbasjhd</p><p>asdgsagdhjsa</p><ol><li>iiasdjghasd</li><li>asdjgsakd</li><li>adgasd</li><li>dahsjd</li></ol><p>askhdjhsja</p><ul><li style=\"text-align: right; \">asdjasghdjhdfgkas</li><li style=\"text-align: right; \">djaskdgh</li></ul><p style=\"text-align: right;\"><br></p><p style=\"text-align: left;\">kadjkha</p><p style=\"text-align: center;\"><img src=\"http://localhost/rtik_abdimas/assets/img/artikel/Simbolis_pemberian_kartu_tanda_peserta_paket_4_oleh_Kepala_Kelurahan_Pananjung.jpeg\" style=\"width: 50%;\"></p><p style=\"text-align: left;\">ahjdsjas</p><p style=\"text-align: left;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left;\"><br></p>', 0),
('20210601153728qiNx', 'CJuwQmxyNoP3qvl', 'Cloud 2', '2021060495109JG', '2', '-', '-', '-', '-', '-', '-', '0', '-', '<p><br></p><p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p><p>assssssssssssajsgdbasjhd</p><p>asdgsagdhjsa</p><ol><li>iiasdjghasd</li><li>asdjgsakd</li><li>adgasd</li><li>dahsjd</li></ol><p>askhdjhsja</p><ul><li style=\"text-align: right; \">asdjasghdjhdfgkas</li><li style=\"text-align: right; \">djaskdgh</li></ul><p style=\"text-align: right;\"><br></p><p style=\"text-align: left;\">kadjkha</p><p style=\"text-align: center;\"><img src=\"http://localhost/rtik_abdimas/assets/img/artikel/Simbolis_pemberian_kartu_tanda_peserta_paket_4_oleh_Kepala_Kelurahan_Pananjung.jpeg\" style=\"width: 50%;\"></p><p style=\"text-align: left;\">ahjdsjas</p><p style=\"text-align: left;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left;\"><br></p>', 0),
('20210626121149vg4Y', '1d8wzHUxV9iAsYn', 'ALGORITMA 1', '2021060495109JG', '1', '-', '-', '-', '-', '-', '-', '0', 'Laporan Kegiatan RTIKAbdimas 2022 Tim Algoritma 1', '<p style=\"text-align: center; \"><img src=\"http://localhost/rtik_abdimas/assets/img/artikel/goldfish.jpg\" style=\"width: 90%;\"><br></p><p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p><p>assssssssssssajsgdbasjhd</p><p>asdgsagdhjsa</p><ol><li>iiasdjghasd</li><li>asdjgsakd</li><li>adgasd</li><li>dahsjd</li></ol><p>askhdjhsja</p><ul><li style=\"text-align: right; \">asdjasghdjhdfgkas</li><li style=\"text-align: right; \">djaskdgh</li></ul><p style=\"text-align: right;\"><br></p><p style=\"text-align: left;\">kadjkha</p><p style=\"text-align: center;\"><img src=\"http://localhost/rtik_abdimas/assets/img/artikel/Simbolis_pemberian_kartu_tanda_peserta_paket_4_oleh_Kepala_Kelurahan_Pananjung.jpeg\" style=\"width: 50%;\"></p><p style=\"text-align: left;\">ahjdsjas</p><p style=\"text-align: left;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr><tr><td><br></td><td><br></td><td><br></td><td><br></td></tr></tbody></table><p style=\"text-align: left;\"><br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `cluster`
--
ALTER TABLE `cluster`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `draf_keahlian_relawan`
--
ALTER TABLE `draf_keahlian_relawan`
  ADD PRIMARY KEY (`id_draf`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `indikator_penilaian`
--
ALTER TABLE `indikator_penilaian`
  ADD PRIMARY KEY (`id_indikator`);

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id_instruktur`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id_keahlian`);

--
-- Indexes for table `komisariat`
--
ALTER TABLE `komisariat`
  ADD PRIMARY KEY (`id_komisariat`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`),
  ADD UNIQUE KEY `email_koordinator` (`email_koordinator`);

--
-- Indexes for table `nilai_individu`
--
ALTER TABLE `nilai_individu`
  ADD PRIMARY KEY (`id_nilai_individu`);

--
-- Indexes for table `nilai_kinerja_relawan`
--
ALTER TABLE `nilai_kinerja_relawan`
  ADD PRIMARY KEY (`id_nilai_kinerja`);

--
-- Indexes for table `nilai_kinerja_tim`
--
ALTER TABLE `nilai_kinerja_tim`
  ADD PRIMARY KEY (`id_nilai_kinerja_tim`);

--
-- Indexes for table `pembekalan`
--
ALTER TABLE `pembekalan`
  ADD PRIMARY KEY (`id_pembekalan`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `persentase_kriteria_penilaian`
--
ALTER TABLE `persentase_kriteria_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `relawan`
--
ALTER TABLE `relawan`
  ADD PRIMARY KEY (`id_relawan`),
  ADD UNIQUE KEY `no_hp` (`no_hp`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id_template`);

--
-- Indexes for table `template_sertifikat`
--
ALTER TABLE `template_sertifikat`
  ADD PRIMARY KEY (`id_template`),
  ADD UNIQUE KEY `id_event` (`id_event`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
