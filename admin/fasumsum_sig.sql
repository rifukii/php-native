-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2014 at 12:25 PM
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fasumsum_sig`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`) VALUES
('admin', 'a163fa85e7bcf37b01437f202ee2c9e6', 'black.spidey43@yahoo.com'),
('Asep', '713f5ce226ea67a5ed6c6f385f7fbce3', 'if.10108117@yahoo.co.id'),
('rifky', 'f6fdffe48c908deb0f4c3bd36c032e72', 'black.spidey43@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `aturan_jarak`
--

CREATE TABLE IF NOT EXISTS `aturan_jarak` (
  `id_aturan_jarak` int(2) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(2) NOT NULL,
  `id_jenis2` int(2) NOT NULL,
  `meter` int(6) NOT NULL,
  PRIMARY KEY (`id_aturan_jarak`),
  UNIQUE KEY `id_jenis_2` (`id_jenis`,`id_jenis2`),
  KEY `id_jenis` (`id_jenis`),
  KEY `id_jenis2` (`id_jenis2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `aturan_jarak`
--

INSERT INTO `aturan_jarak` (`id_aturan_jarak`, `id_jenis`, `id_jenis2`, `meter`) VALUES
(1, 2, 2, 1500),
(2, 2, 7, 3000),
(5, 16, 16, 1000),
(6, 2, 6, 500),
(10, 2, 8, 1750),
(18, 2, 9, 100),
(22, 7, 7, 15000),
(23, 6, 2, 500);

-- --------------------------------------------------------

--
-- Table structure for table `aturan_jumlah`
--

CREATE TABLE IF NOT EXISTS `aturan_jumlah` (
  `id_aturan_jumlah` int(2) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(2) NOT NULL,
  `jml_minimal` int(5) NOT NULL,
  PRIMARY KEY (`id_aturan_jumlah`),
  UNIQUE KEY `id_jenis` (`id_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_fasum`
--

CREATE TABLE IF NOT EXISTS `detail_fasum` (
  `id_detail` int(2) NOT NULL AUTO_INCREMENT,
  `id_fasum` int(2) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `id_fasum` (`id_fasum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `detail_fasum`
--

INSERT INTO `detail_fasum` (`id_detail`, `id_fasum`, `gambar`, `deskripsi`) VALUES
(6, 14, 'gedungserbaguna.jpg', 'Gedung ini dipakai oleh warga Cibugel untuk melakukan pertemuan, acara hiburan, musik, maupun acara budaya lainnya.'),
(7, 14, 'gedungserbaguna.jpg', 'Sejak didirikan, gedung ini telah mengalami 2 kali. Termasuk renovasi pada tahun 2011.'),
(8, 13, 'Supermarket.jpg', 'Jatinangor Town Square atau yang lebih dikenal dengan nama JATOS adalah salah satu mall yang dibangun di area 30.000 mÃ‚Â² yang terdiri dari 4 lantai (LGF, GF, FF, SF) dengan luas bangunan Ã‚Â± 24.000 mÃ‚Â² berada di lokasi yang sangat strategis yaitu di jalan raya jatinangor no. 150 yang merupakan jalur utama Provinsi Jawa Barat dan di antara 4 Perguruan Tinggi besar di Jawa Barat yaitu IPDN, UNPAD, ITB & IKOPIN dan juga berada di tengah-tengah komplek- komplek perumahan dan industri berskala besar yang menjadikan JATOS sebagai tempat yang potensial untuk berwirausaha dan tempat yang strategis untuk dijadikan sebagai tempat belanja, rekreasi dan kuliner bagi masyarakat di sekitarnya'),
(9, 13, 'Jatoz21.jpg', 'Cinema 21 dengan 5 buah studio. Lokasinya di Second Floor - SF'),
(10, 10, 'pasar.jpg', 'Pasar conggeang merupakan pasar tradisional di Kecamatan Conggeang yang berdiri sejak tahun 1965. Sejak saat itu pasar ini telah menjadi jantung perekonomian Conggeang. Di sekitarnya juga berdiri kawasan pertokoan yang ikut memnunjang perekonomian masyarakat setempat.'),
(11, 1, 'Polres.jpg', 'Polres Sumedang adalah'),
(14, 20, 'pasar.jpg', 'deskripsi'),
(15, 20, 'Supermarket.jpg', 'Deskripsi 2');

-- --------------------------------------------------------

--
-- Table structure for table `fasum`
--

CREATE TABLE IF NOT EXISTS `fasum` (
  `id_fasum` int(5) NOT NULL AUTO_INCREMENT,
  `nama_fasum` varchar(50) NOT NULL,
  `id_jenis` int(2) NOT NULL,
  `kondisi` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_kecamatan` varchar(8) NOT NULL,
  `id_instansi` int(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id_fasum`),
  KEY `id_kecamatan` (`id_kecamatan`),
  KEY `id_instansi` (`id_instansi`),
  KEY `username` (`username`),
  KEY `id_jenis` (`id_jenis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `fasum`
--

INSERT INTO `fasum` (`id_fasum`, `nama_fasum`, `id_jenis`, `kondisi`, `alamat`, `id_kecamatan`, `id_instansi`, `username`, `lat`, `lng`) VALUES
(1, 'Polres Sumedang', 9, 'Baik', 'Jl. Prabu Geusan Ulun No.1', '32.11.17', 32, 'rifky', -6.8607394, 107.9165315),
(2, 'Puskesmas Sukagalih', 1, 'Baik', 'Jl. Kebon Seureuh', '32.11.17', 29, 'admin', -6.8746326156976, 107.934667969727),
(3, 'Pasar Wado', 2, 'Rusak Ringan', 'Wado', '32.11.01', 11, 'rifky', -6.98028567757212, 108.096716309571),
(4, 'Puskesmas Sumedang Selatan', 1, 'Baik', 'Sumedang selatan', '32.11.17', 31, 'admin', -6.86440687336291, 107.894842530273),
(5, 'GOR Tadjimalela', 12, 'Baik', 'Jl. Raya Sumedang Selatan - Sumedang Utara', '32.11.17', 7, 'admin', -6.85411699836939, 107.915946150803),
(6, 'SPBU Ciromed 34-45312', 16, 'Baik', 'Ciromed', '32.11.11', 14, 'admin', -6.9107799, 107.7947163),
(7, 'RSUD Kab Sumedang', 3, 'Baik', 'Jalan Palasari', '32.11.17', 31, 'admin', -6.8576077, 107.9209947),
(8, 'SPBU Legok', 16, 'Baik', 'Legok', '32.11.08', 14, 'admin', -6.8031299, 107.9926419),
(9, 'Lapangan Karanglayung', 12, 'Rusak Ringan', 'Karanglayung', '32.11.07', 29, 'admin', -6.7213056, 108.0050873),
(10, 'Pasar Conggeang', 2, 'Baik', 'Conggeang', '32.11.07', 11, 'rifky', -6.7382682, 108.0089926),
(11, 'Terminal Ciakar', 7, 'Baik', 'Jl. Pangeran Kornel', '32.11.18', 14, 'rifky', -6.8194110013071, 107.915441895507),
(12, 'Terminal Buah dua', 8, 'Baik', 'Buahdua', '32.11.10', 14, 'rifky', -6.69258180461694, 107.948400879882),
(13, 'Jatinangor Town Square', 6, 'Baik', 'Jl. Raya Jatinangor-Sumedang', '32.11.15', 11, 'admin', -6.93530081698721, 107.774164582275),
(14, 'Gedung Serbaguna Cibugel', 11, 'Baik', 'Cibugel', '32.11.04', 29, 'admin', -6.97210693282292, 108.001959229492),
(17, 'Terminal Ujungjaya', 8, 'Baik', 'Ujungjaya', '32.11.25', 14, 'rifky', -6.6787536619356, 108.071996555447),
(18, 'Fasilitas baru', 4, 'Baik', 'Sumedang', '32.11.12', 31, 'rifky', -6.90511998830914, 107.83579050076),
(20, 'Pasar INPRES', 2, 'Baik', 'Mayor Abdurrahman Sumedang', '32.11.18', 11, 'rifky', -6.84542796330389, 107.928641881236),
(21, 'Pasar999', 2, 'Baik', 'Pasar999', '32.11.12', 14, 'rifky', -6.86985802670154, 107.76395075409),
(22, 'Plaza', 6, 'Baik', 'Plaza', '32.11.19', 11, 'admin', -6.8571350998157, 107.967764281107),
(23, 'Plaza', 2, 'Baik', 'Plaza', '32.11.17', 11, 'admin', -6.87872285104192, 107.901846312357),
(25, 'Dugem', 11, 'Baik', 'Dugem', '32.11.04', 16, 'admin', -6.96459681753529, 108.032684326172);

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
  `id_instansi` int(2) NOT NULL,
  `nama_instansi` varchar(70) NOT NULL,
  `singkatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `singkatan`) VALUES
(1, 'Sekretariat Daerah', 'Sekda'),
(2, 'Sekretariat DPRD', 'Sekretariat DPRD'),
(3, 'Dinas Pendidikan', 'Disdik'),
(4, 'Dinas Pertanian Tanaman Pangan dan Holtikultura', 'DPTPH'),
(5, 'Dinas Peternakan dan Perikanan', 'Disnakkan'),
(6, 'Dinas Kehutanan dan Perkebunan', 'Dishutbun'),
(7, 'Dinas Kebudayaan, Pariwisata, Pemuda dan Olahraga', 'Disbudparpora'),
(8, 'Dinas Pekerjaan Umum', 'Dinas PU'),
(9, 'Dinas Pertambangan Energi dan Pertanahan', 'Distambenper'),
(10, 'Dinas Sosial dan Tenaga Kerja', 'Dinsosnaker'),
(11, 'Dinas Perindustrian dan Perdagangan', 'Disperindag'),
(12, 'Dinas Koperasi, Usaha Mikro, Kecil dan Menengah', 'Diskopukm'),
(13, 'Dinas Kependudukan dan Pencatatan Sipil', 'Disdukcapil'),
(14, 'Dinas Perhubungan, Komunikasi dan Informatika', 'Dishubkominfo'),
(15, 'Dinas Pendapatan Daerah', 'Dispenda'),
(16, 'Badan Perencanaan Pembangunan Daerah', 'Bappeda'),
(17, 'Badan Kepegawaian Daerah', 'BKD'),
(18, 'Badan Kesatuan Bangsa dan Perlindungan Masyarakat', 'BKBPM'),
(19, 'Badan Ketahanan Pangan, Penyuluhan Pertanian, Perikanan dan Kehutanan', 'BKP5K'),
(20, 'Badan Ketahanan Pangan', 'BKP'),
(21, 'Badan Penanaman Modal dan Pelayanan Perizinan', 'BPMPP'),
(22, 'Badan Lingkungan Hidup', 'BLH'),
(23, 'Badan Pemberdayaan Masyarakat dan Pemerintahan Desa', 'BPMPD'),
(24, 'Badan Keluarga Berencana dan Pemberdayaan Perempuan', 'BKBPP'),
(25, 'Inspektorat Kabupaten', 'Inspektorat Kabupaten'),
(26, 'Kantor Arsip Daerah', 'Kantor Arsip Daerah'),
(27, 'Kantor Perpustakaan Daerah', 'Kapusda'),
(28, 'Satuan Polisi Pamong Praja', 'Satpol PP'),
(29, 'Kecamatan', 'Kecamatan'),
(30, 'Kelurahan', 'Kelurahan'),
(31, 'Dinas Kesehatan', 'Dinkes'),
(32, 'Kepolisian Resor', 'Polres'),
(50, 'Instansi baru', 'IB');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_fasum`
--

CREATE TABLE IF NOT EXISTS `jenis_fasum` (
  `id_jenis` int(2) NOT NULL AUTO_INCREMENT,
  `jenis_fasum` varchar(30) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `icon` varchar(150) NOT NULL,
  PRIMARY KEY (`id_jenis`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `jenis_fasum`
--

INSERT INTO `jenis_fasum` (`id_jenis`, `jenis_fasum`, `id_kategori`, `keterangan`, `icon`) VALUES
(1, 'Puskesmas', 1, 'Organisasi fungsional yang menyelenggarakan upaya kesehatan yang bersifat menyeluruh, terpadu, merata, dapat diterima dan terjangkau oleh masyarakat.', 'puskesmas.png'),
(2, 'Pasar tradisional', 2, 'Pasar Tradisional adalah pasar yang pembeli dan penjual bisa saling tawar-menawar', 'bags.png'),
(3, 'Rumah sakit', 1, 'Institusi perawatan kesehatan profesional yang pelayanannya disediakan oleh dokter, perawat, dan tenaga ahli kesehatan lainnya.', 'hospital.png'),
(4, 'Apotek', 1, 'Tempat menjual dan kadang membuat atau meramu obat.', 'drugs.png'),
(5, 'Praktek Dokter', 1, 'Pelayanan kesehatan dengan tenaga kerja dokter di luar rumah sakit.', 'doctor.png'),
(6, 'Pasar modern', 2, 'Tempat bertemunya penjual dan pembeli serta ditandai dengan adanya transaksi penjual pembeli secara langsung dan biasanya ada proses tawar-menawar.', 'supermarket.png'),
(7, 'Terminal kelas B', 4, 'Terminal kelas B', 'bus.png'),
(8, 'Terminal kelas C', 4, 'Terminal kelas C', 'car.png'),
(9, 'Kantor polisi', 3, 'Tempat pengaduan masyarakat dan pelayanan umum lainnya.', 'police.png'),
(10, 'Kantor pos', 3, 'Fasilitas umum yang melayani penerimaan, pengumpulan, penyortiran, transmisi, dan pengantaran surat dan paket pos.', 'postal.png'),
(11, 'Gedung serbaguna', 5, 'Gedung yang bisa digunakan untuk berbagai acara hiburan maupun acara kebudayaan.', 'music-rock.png'),
(12, 'GOR', 6, 'Kompleks olahraga serbaguna untuk berbagai cabang olah raga.', 'stadium.png'),
(13, 'Bank swasta', 2, 'Fasilitas untuk menunjang kegiatan perbankan masyarakat.', 'bank.png'),
(14, 'ATM', 2, 'Anjungan Tunai Mandiri', 'atm.png'),
(15, 'Bank daerah', 2, 'Fasilitas untuk menunjang kegiatan perbankan masyarakat.', 'bankeuro.png'),
(16, 'SPBU', 4, 'Stasiun Pengisian Bahan Bakar', 'gazstation.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_fasum`
--

CREATE TABLE IF NOT EXISTS `kategori_fasum` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kategori_fasum`
--

INSERT INTO `kategori_fasum` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Fasilitas Kesehatan'),
(2, 'Fasilitas Perbelanjaan Dan Niaga'),
(3, 'Fasilitas Pemerintahan dan Pelayanan Publik'),
(4, 'Fasilitas Transportasi'),
(5, 'Fasilitas Rekreasi dan Budaya'),
(6, 'Fasilitas Olahraga dan Taman Bermain'),
(7, 'Fasilitas Peribadatan');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` varchar(8) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
('32.11.00', 'Sumedang Tenggara'),
('32.11.01', 'Wado'),
('32.11.02', 'Jatinunggal'),
('32.11.03', 'Darmaraja'),
('32.11.04', 'Cibugel'),
('32.11.05', 'Cisitu'),
('32.11.06', 'Situraja'),
('32.11.07', 'Conggeang'),
('32.11.08', 'Paseh'),
('32.11.09', 'Surian'),
('32.11.10', 'Buahdua'),
('32.11.11', 'Tanjungsari'),
('32.11.12', 'Sukasari'),
('32.11.13', 'Pamulihan'),
('32.11.14', 'Cimanggung'),
('32.11.15', 'Jatinangor'),
('32.11.16', 'Rancakalong'),
('32.11.17', 'Sumedang Selatan'),
('32.11.18', 'Sumedang Utara'),
('32.11.19', 'Ganeas'),
('32.11.20', 'Tanjungkerta'),
('32.11.21', 'Tanjungmedar'),
('32.11.22', 'Cimalaka'),
('32.11.23', 'Cisarua'),
('32.11.24', 'Tomo'),
('32.11.25', 'Ujungjaya'),
('32.11.26', 'Jatigede');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(5) NOT NULL AUTO_INCREMENT,
  `perihal` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `nama` varchar(50) NOT NULL,
  `komentar` longtext NOT NULL,
  `email` varchar(50) NOT NULL,
  `tampil` char(1) NOT NULL DEFAULT 'T',
  `username` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_komentar`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `perihal`, `waktu`, `nama`, `komentar`, `email`, `tampil`, `username`) VALUES
(1, 'GOR', '2012-06-22 13:58:11', 'Sally', 'Di Buahdua belum ada GOR yang bagus', 'black.spidey43@gmail.com', 'Y', 'admin'),
(2, 'Pasar wado', '2012-06-22 14:26:04', 'Iman', 'Tolong segera perbaiki pasar Wado. Masyarakat merasa kurang nyaman dengan keadaan pasar pasca kebakaran', 'iman@googlemail.co.id', 'Y', 'admin'),
(3, 'Renovasi terminal cipameungpeuk', '2012-06-22 14:26:40', 'Defa', 'Term cipameungpeuk butuh direnovasi', '', 'Y', 'admin'),
(4, 'insfrastruktur puskesmas', '2012-06-22 14:26:56', 'Asep', 'Insfrastruktur kesehatan di kecamatan ganeas masih kurang ', 'asep@ymail.com', 'Y', 'admin'),
(5, 'tanya', '2012-06-28 01:30:53', 'gre', 'ada rencana pengembangan kec sukasari?', '', 'T', NULL),
(6, 'Perihal', '2012-06-28 09:52:29', 'Rifky', 'Hai ', 'black.spidey43@gmail.com', 'Y', 'admin'),
(7, 'Pasar INPRES', '2012-07-10 21:39:51', 'ff', 'Beberapa kios tidak terawat, renovasi belum merata', 'ff@f.net', 'T', NULL),
(9, 'Pembangunan fasilitas kesehatan', '2012-07-12 14:38:56', 'Lukman', 'Di kecamatan Sukasari masih minim pelayanan kesehatan', '', 'Y', 'rifky'),
(13, 'Pembangunan minimarket', '2012-08-09 08:54:33', 'Anon', 'Tolong izin pembangunan minimarket diperhatikan lagi', '', 'Y', 'rifky');

-- --------------------------------------------------------

--
-- Table structure for table `poligon`
--

CREATE TABLE IF NOT EXISTS `poligon` (
  `id_poligon` int(11) NOT NULL AUTO_INCREMENT,
  `nama_poligon` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`id_poligon`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `poligon`
--

INSERT INTO `poligon` (`id_poligon`, `nama_poligon`, `url`, `username`) VALUES
(1, 'Kabupaten', 'http://fasumsumedang.net/kml/Poligon_Kabupaten.kml', 'admin'),
(2, 'Kecamatan', 'http://fasumsumedang.net/kml/Poligon_Kecamatan.kml', 'admin'),
(3, 'Wado', 'http://fasumsumedang.net/kml/Wado.kml', 'admin'),
(4, 'Jatinunggal', 'http://fasumsumedang.net/kml/Jatinunggal.kml', 'admin'),
(5, 'Cibugel', 'http://fasumsumedang.net/kml/Cibugel.kml', 'admin'),
(6, 'Darmaraja', 'http://fasumsumedang.net/kml/Darmaraja.kml', 'admin'),
(7, 'Tanjungmedar', 'http://fasumsumedang.net/kml/Tanjungmedar.kml', 'admin'),
(15, 'Cisitu', 'http://fasumsumedang.net/kml/Cisitu.kml', 'admin'),
(16, 'Situraja', 'http://fasumsumedang.net/kml/Situraja.kml', 'admin'),
(17, 'Conggeang', 'http://fasumsumedang.net/kml/Conggeang.kml', 'admin'),
(18, 'Paseh', 'http://fasumsumedang.net/kml/Paseh.kml', 'admin'),
(19, 'Surian', 'http://fasumsumedang.net/kml/Surian.kml', 'admin'),
(20, 'Buahdua', 'http://fasumsumedang.net/kml/Buahdua.kml', 'admin'),
(21, 'Tanjungsari', 'http://fasumsumedang.net/kml/Tanjungsari.kml', 'admin'),
(22, 'Sukasari', 'http://fasumsumedang.net/kml/Sukasari.kml', 'admin'),
(23, 'Pamulihan', 'http://fasumsumedang.net/kml/Pamulihan.kml', 'admin'),
(24, 'Cimanggung', 'http://fasumsumedang.net/kml/Cimanggung.kml', 'admin'),
(25, 'Jatinangor', 'http://fasumsumedang.net/kml/Jatinangor.kml', 'admin'),
(26, 'Rancakalong', 'http://fasumsumedang.net/kml/Rancakalong.kml', 'admin'),
(27, 'Sumedang Selatan', 'http://fasumsumedang.net/kml/Sumedang_Selatan.kml', 'admin'),
(28, 'Sumedang Utara', 'http://fasumsumedang.net/kml/Sumedang_Utara.kml', 'admin'),
(29, 'Ganeas', 'http://fasumsumedang.net/kml/Ganeas.kml', 'admin'),
(30, 'Tanjungkerta', 'http://fasumsumedang.net/kml/Tanjungkerta.kml', 'admin'),
(31, 'Cimalaka', 'http://fasumsumedang.net/kml/Cimalaka.kml', 'admin'),
(32, 'Cisarua', 'http://fasumsumedang.net/kml/Cisarua.kml', 'admin'),
(33, 'Tomo', 'http://fasumsumedang.net/kml/Tomo.kml', 'admin'),
(34, 'Ujungjaya', 'http://fasumsumedang.net/kml/Ujungjaya.kml', 'admin'),
(35, 'Jatigede', 'http://fasumsumedang.net/kml/Jatigede.kml', 'admin'),
(36, 'Kabupaten2', 'http://fasumsumedang.net/kml/Batas_Kabupaten2.kml', 'rifky');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aturan_jarak`
--
ALTER TABLE `aturan_jarak`
  ADD CONSTRAINT `aturan_jarak_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_fasum` (`id_jenis`),
  ADD CONSTRAINT `aturan_jarak_ibfk_2` FOREIGN KEY (`id_jenis2`) REFERENCES `jenis_fasum` (`id_jenis`);

--
-- Constraints for table `aturan_jumlah`
--
ALTER TABLE `aturan_jumlah`
  ADD CONSTRAINT `aturan_jumlah_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_fasum` (`id_jenis`);

--
-- Constraints for table `detail_fasum`
--
ALTER TABLE `detail_fasum`
  ADD CONSTRAINT `detail_fasum_ibfk_1` FOREIGN KEY (`id_fasum`) REFERENCES `fasum` (`id_fasum`);

--
-- Constraints for table `fasum`
--
ALTER TABLE `fasum`
  ADD CONSTRAINT `fasum_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_fasum` (`id_jenis`),
  ADD CONSTRAINT `fasum_ibfk_2` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `fasum_ibfk_3` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`),
  ADD CONSTRAINT `fasum_ibfk_4` FOREIGN KEY (`username`) REFERENCES `admin` (`username`);

--
-- Constraints for table `jenis_fasum`
--
ALTER TABLE `jenis_fasum`
  ADD CONSTRAINT `jenis_fasum_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_fasum` (`id_kategori`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admin` (`username`);

--
-- Constraints for table `poligon`
--
ALTER TABLE `poligon`
  ADD CONSTRAINT `poligon_ibfk_1` FOREIGN KEY (`username`) REFERENCES `admin` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
