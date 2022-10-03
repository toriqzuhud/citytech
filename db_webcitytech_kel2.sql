-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 06:37 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webcitytech_kel2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `jenis_ongkir` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `jenis_ongkir`, `tarif`) VALUES
(1, 'Ekonomi', 30000),
(2, 'Reguler', 50000),
(3, 'Express', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'toriq@gmail.com', '12345', 'Toriq Zuhud Nurcahyo', '0912732134534', ''),
(4, 'zuto@gmail.com', '12345', 'zuto', '123456', ''),
(5, 'cahyo@gmail.com', '12345', 'Cahyo', '213213', '213213'),
(6, 'jamal@jamal.com', '12345', 'Jamal', '123', '123'),
(7, 'asd@AASD', '12345', 'asd', '123', '123'),
(8, 'roso@SD', '12345', 'suroso', '123', '123'),
(9, 'painem@gmail.com', '12345', 'Painem', 'a', 'a'),
(10, 'user@gmail.com', '12345', 'user', '123123', '123123'),
(11, 'rafli@gmail.com', '123', 'Rafli Ramadhani', '089630032222', '089630032222'),
(12, 'rap@gmail.com', '123', 'Rafli Ramadhani', '089630032222', 'Kp. Ciruas Pasar'),
(13, 'zend@gmail.com', '123', 'Zend Paradox', '089630032626', 'Kp. Ciruas Pasar'),
(14, 'al@gmail', '123', 'alam', '08123', 'kp.hj'),
(15, 'novandi@gmail.com', '123', 'Novandi', '089630032222', 'Serang');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 145, 'TRqd', 'asd', 15329000, '2022-07-18', '20220718100504ticket-Q-000MIBRY-id.png'),
(2, 147, 'USER', 'BRI', 2000000, '2022-07-18', '20220718102513ticket-Q-000MIBRY-id.png'),
(3, 148, 'asd', 'sads', 1211, '2022-07-18', '20220718102747ticket-Q-000MIBRY-id.png'),
(4, 150, 'Rafli Ramadhani', 'Bank Syariah Indonesia', 35327000, '2022-07-19', '20220719064728Poster_RafliRamadhani_RafliRamadhani.png'),
(5, 153, 'Zend Paradox', 'Bank Syariah Indonesia', 34448000, '2022-07-19', '20220719065341Bukti Pembayaran.jpeg'),
(6, 154, 'alam', 'bca', 3, '2022-07-19', '20220719070443Bukti Pembayaran.jpeg'),
(7, 155, 'Novandi', 'BCA', 73549000, '2022-07-19', '20220719090549Bukti Pembayaran.jpeg'),
(8, 157, 'Toriq Zuhud Nurcahyo', 'BSI', 30000000, '2022-07-27', '20220727181026fc177a36cd8432d78099e396abe3f70f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `jenis_ongkir` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `jenis_ongkir`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`) VALUES
(147, 10, 3, '2022-07-18', 15808000, 'Ekonomi', 30000, 'SERANG', 'barang dikirim', '233424324f3424'),
(148, 10, 1, '2022-07-18', 20179000, 'Ekonomi', 30000, 'USER', 'batal', ''),
(149, 11, 3, '2022-07-18', 61328000, 'Ekonomi', 30000, 'gadsay', 'Pending', ''),
(150, 12, 2, '2022-07-19', 35327000, 'Ekonomi', 30000, 'Kp. Ciruas Pasar', 'barang dikirim', '20220719001'),
(151, 12, 2, '2022-07-19', 64127000, 'Ekonomi', 30000, 'Kp. Ciruas Pasar', 'Pending', ''),
(152, 12, 2, '2022-07-19', 20050000, 'Reguler', 50000, 'Kp. Ciruas Pasar', 'Pending', ''),
(153, 13, 2, '2022-07-19', 34448000, 'Reguler', 50000, 'Kp. Ciruas Pasar', 'Sudah Kirim Pembayaran', ''),
(154, 14, 3, '2022-07-19', 36289000, 'Express', 70000, 'kp.hj', 'lunas', ''),
(155, 15, 2, '2022-07-19', 73549000, 'Reguler', 50000, 'Kota Serang', 'barang dikirim', '20220714001'),
(156, 15, 1, '2022-07-19', 15329000, 'Ekonomi', 30000, 'Serang', 'Pending', ''),
(157, 1, 2, '2022-07-27', 28308000, 'Ekonomi', 30000, 'Kab Serang, Kec Kragilan, Perum Graha Cisait', 'barang dikirim', '233424324f3424');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(8, 16, 21, 2, '', 0, 0, 0, 0),
(9, 0, 23, 1, '', 0, 0, 0, 0),
(10, 0, 29, 1, '', 0, 0, 0, 0),
(11, 0, 27, 1, '', 0, 0, 0, 0),
(12, 0, 28, 1, '', 0, 0, 0, 0),
(13, 108, 27, 1, '', 0, 0, 0, 0),
(14, 108, 28, 1, '', 0, 0, 0, 0),
(15, 109, 27, 1, '', 0, 0, 0, 0),
(16, 109, 28, 1, '', 0, 0, 0, 0),
(17, 110, 26, 1, '', 0, 0, 0, 0),
(18, 111, 31, 1, '', 0, 0, 0, 0),
(19, 111, 32, 1, '', 0, 0, 0, 0),
(20, 112, 24, 2, '', 0, 0, 0, 0),
(21, 112, 23, 2, '', 0, 0, 0, 0),
(22, 113, 31, 1, '', 0, 0, 0, 0),
(23, 114, 30, 1, '', 0, 0, 0, 0),
(24, 115, 33, 1, '', 0, 0, 0, 0),
(25, 116, 27, 1, '', 0, 0, 0, 0),
(26, 117, 33, 1, 'nama', 0, 0, 0, 0),
(27, 118, 24, 2, '', 0, 0, 0, 0),
(28, 118, 32, 1, '', 0, 0, 0, 0),
(29, 118, 23, 1, '', 0, 0, 0, 0),
(30, 119, 27, 1, '', 0, 0, 0, 0),
(31, 120, 31, 1, '', 0, 0, 0, 0),
(32, 121, 27, 1, '', 0, 0, 0, 0),
(33, 122, 28, 1, 'ASUS ZENBOOK FLIP 14 TOUCH OLED', 20149000, 1400, 1400, 20149000),
(34, 123, 25, 1, 'MSI VECTOR GP66 12UGS', 33499000, 2500, 2500, 33499000),
(35, 123, 29, 1, 'Lenovo Ideapad Slim 5 11th - i5-1135G7', 8499000, 14000, 14000, 8499000),
(36, 123, 24, 1, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 2500, 27799000),
(37, 124, 24, 1, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 2500, 27799000),
(38, 125, 28, 1, 'ASUS ZENBOOK FLIP 14 TOUCH OLED', 20149000, 1400, 1400, 20149000),
(39, 125, 33, 1, 'Acer Aspire 5 A515 FHD', 7199000, 1800, 1800, 7199000),
(40, 125, 31, 1, 'MSI SUMMIT E13 FLIP EVO', 15899000, 1200, 1200, 15899000),
(41, 126, 32, 1, 'ASUS ROG ZEPHYRUS G14', 27799000, 2000, 2000, 27799000),
(42, 127, 29, 1, 'Lenovo Ideapad Slim 5 11th - i5-1135G7', 8499000, 14000, 14000, 8499000),
(43, 128, 22, 1, 'ASUS ROG FLOW X13 GV301RA', 20000000, 1900, 1900, 20000000),
(44, 129, 24, 1, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 2500, 27799000),
(45, 130, 23, 1, 'Asus ZenBook S UX393JA', 15299000, 1100, 1100, 15299000),
(46, 131, 24, 1, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 2500, 27799000),
(47, 132, 31, 1, 'MSI SUMMIT E13 FLIP EVO', 15899000, 1200, 1200, 15899000),
(48, 133, 23, 1, 'Asus ZenBook S UX393JA', 15299000, 1100, 1100, 15299000),
(49, 134, 27, 1, 'LENOVO GAMING 3 15 BLK -V0ID', 13399000, 2250, 2250, 13399000),
(50, 134, 29, 1, 'Lenovo Ideapad Slim 5 11th - i5-1135G7', 8499000, 14000, 14000, 8499000),
(51, 135, 23, 1, 'Asus ZenBook S UX393JA', 15299000, 1100, 1100, 15299000),
(52, 135, 25, 1, 'MSI VECTOR GP66 12UGS', 33499000, 2500, 2500, 33499000),
(53, 135, 28, 7, 'ASUS ZENBOOK FLIP 14 TOUCH OLED', 20149000, 1400, 9800, 141043000),
(54, 136, 23, 1, 'Asus ZenBook S UX393JA', 15299000, 1100, 1100, 15299000),
(55, 136, 34, 1, 'Razer Headset Wireless Opus X - Quartz', 1390000, 270, 270, 1390000),
(56, 136, 32, 1, 'ASUS ROG ZEPHYRUS G14', 27799000, 2000, 2000, 27799000),
(57, 137, 41, 1, 'Audio-Technica ATH-M20xBT Wireless', 1239000, 2100, 2100, 1239000),
(58, 137, 29, 1, 'Lenovo Ideapad Slim 5 11th - i5-1135G7', 8499000, 14000, 14000, 8499000),
(59, 137, 43, 1, 'Audio-Technica ATH-M50X Professional Monitor', 2180000, 2000, 2000, 2180000),
(60, 137, 34, 1, 'Razer Headset Wireless Opus X - Quartz', 1390000, 270, 270, 1390000),
(61, 138, 25, 1, 'MSI VECTOR GP66 12UGS', 33499000, 2500, 2500, 33499000),
(62, 138, 28, 1, 'ASUS ZENBOOK FLIP 14 TOUCH OLED', 20149000, 1400, 1400, 20149000),
(63, 138, 33, 1, 'Acer Aspire 5 A515 FHD', 7199000, 1800, 1800, 7199000),
(64, 138, 47, 1, 'Tp-Link Archer A6 AC1200 Wireless MU-MIMO Gigabit ', 540000, 1000, 1000, 540000),
(65, 139, 32, 1, 'ASUS ROG ZEPHYRUS G14', 27799000, 2000, 2000, 27799000),
(66, 139, 42, 1, 'Audio-Technica ATH-102USB Dual-Earpiece', 479000, 400, 400, 479000),
(67, 140, 23, 1, 'Asus ZenBook S UX393JA', 15299000, 1100, 1100, 15299000),
(68, 141, 23, 1, 'Asus ZenBook S UX393JA', 15299000, 1100, 1100, 15299000),
(69, 142, 24, 1, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 2500, 27799000),
(70, 143, 24, 1, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 2500, 27799000),
(71, 144, 24, 1, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 2500, 27799000),
(72, 145, 23, 1, 'Asus ZenBook S UX393JA', 15299000, 1100, 1100, 15299000),
(73, 146, 28, 1, 'ASUS ZENBOOK FLIP 14 TOUCH OLED', 20149000, 1400, 1400, 20149000),
(74, 147, 42, 1, 'Audio-Technica ATH-102USB Dual-Earpiece', 479000, 400, 400, 479000),
(75, 147, 23, 1, 'Asus ZenBook S UX393JA', 15299000, 1100, 1100, 15299000),
(76, 148, 28, 1, 'ASUS ZENBOOK FLIP 14 TOUCH OLED', 20149000, 1400, 1400, 20149000),
(77, 149, 32, 1, 'ASUS ROG ZEPHYRUS G14', 27799000, 2000, 2000, 27799000),
(78, 149, 25, 1, 'MSI VECTOR GP66 12UGS', 33499000, 2500, 2500, 33499000),
(79, 150, 27, 2, 'LENOVO GAMING 3 15 BLK -V0ID', 13399000, 2250, 4500, 26798000),
(80, 150, 29, 1, 'Lenovo Ideapad Slim 5 11th - i5-1135G7', 8499000, 14000, 14000, 8499000),
(81, 151, 24, 2, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 5000, 55598000),
(82, 151, 29, 1, 'Lenovo Ideapad Slim 5 11th - i5-1135G7', 8499000, 14000, 14000, 8499000),
(83, 152, 22, 1, 'ASUS ROG FLOW X13 GV301RA', 20000000, 1900, 1900, 20000000),
(84, 153, 22, 1, 'ASUS ROG FLOW X13 GV301RA', 20000000, 1900, 1900, 20000000),
(85, 153, 33, 2, 'Acer Aspire 5 A515 FHD', 7199000, 1800, 3600, 14398000),
(86, 154, 25, 1, 'MSI VECTOR GP66 12UGS', 33499000, 2500, 2500, 33499000),
(87, 154, 43, 1, 'Audio-Technica ATH-M50X Professional Monitor', 2180000, 2000, 2000, 2180000),
(88, 154, 47, 1, 'Tp-Link Archer A6 AC1200 MU-MIMO', 540000, 1000, 1000, 540000),
(89, 155, 22, 2, 'ASUS ROG FLOW X13 GV301RA', 20000000, 1900, 3800, 40000000),
(90, 155, 25, 1, 'MSI VECTOR GP66 12UGS', 33499000, 2500, 2500, 33499000),
(91, 156, 23, 1, 'Asus ZenBook S UX393JA', 15299000, 1100, 1100, 15299000),
(92, 157, 24, 1, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 2500, 27799000),
(93, 157, 42, 1, 'Audio-Technica ATH-102USB Dual-Earpiece', 479000, 400, 400, 479000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `kategori`, `deskripsi_produk`) VALUES
(23, 'Asus ZenBook S UX393JA', 15299000, 1100, 'zenbooksux393ja.jpg', 'Laptop', '<strong>ASUS ZENBOOK S UX393JA 3K TOUCH i7 1065G7 16GB 1TBSSD W10PRO 13.9</strong>\r\n\r\nSPESIFIKASI:<br>\r\n- PROCESSOR INTEL CORE i7 1065G7<br>\r\n- MEMORY RAM 16 GB<br>\r\n- STORAGE 1TB SSD<br>\r\n- GRAFIS INTEL IRIS PLUS<br>\r\n- Display 13.9 3K<br>\r\n- OS : WINDOWS 10 PRO<br>\r\n\r\nUnit Item ORI :<br>\r\n- Kami menjual unit original (bukan rekondisi/replika).<br>'),
(24, 'ASUS ROG G533QM R936D6TO', 27799000, 2500, 'rogg533qm.jpg', 'Laptop', 'SPESIFIKASI\r\n* Processor : AMD Ryzen 9 5900HX Processor 3.3 GHz (16M Cache, up to 4.6 GHz)\r\n* VGA : NVIDIA GeForce RTX 3060-6GB GDDR6\r\n* Memory : 16GB DDR4-3200 MHz (2x8GB RAM)\r\n* Storage : 1TB M.2 NVMe PCIe 3.0 SSD\r\n* Display : 15.6 (16:9) LED-backlit FHD (19201080) Anti-Glare IPS-level 300Hz panel with 100% SRGB, 72% NTSC, 3ms\r\n* Keyboard : RGB per key\r\n* OS : Windows 10 + Office Home & Student 2019t\r\n* Network : Wi-Fi + Bluetooth\r\n\r\n* Ports :\r\n1x 3.5mm Combo Audio Jack\r\n1x HDMI 2.0b\r\n3x USB 3.2 Gen 1 Type-A\r\n1x USB 3.2 Gen 2 Type-C support DisplayPort / power delivery\r\n\r\n- Battery : 90WHrs, 4S1P, 4-cell Li-ion\r\n- Power Adapter : 240W AC Adaptor\r\n- System Dimensions : 35.4 x 25.9 x 2.26 ~ 2.72 cm (13.94\" x 10.20\" x 0.89\" ~ 1.07\")\r\n- Weight: 2.4Kg'),
(25, 'MSI VECTOR GP66 12UGS', 33499000, 2500, 'msi vector gp66.jpg', 'Laptop', 'SPESIFIKASI\r\n- Processor Onboard : 12th Generation Intel® Core™ i7-12700H Processor (14 core, 3.5 GHz up to 4.7GHz 24MB Cache)\r\n- Memori Standar : 16GB DDR4 3200MHZ (2*8)\r\n- Tipe Grafis : NVIDIA® GeForce® RTX3070Ti Laptop GPU GDDR6 8GB (TGP Max: 150W)\r\n- Ukuran Layar : 15.6\" QHD (2560*1440), 165Hz DCI-P3 100% typical\r\n- Storage : 1TB NVMe PCIe Gen4x4 SSD\r\n- Keyboard : Per key RGB steelseries KB\r\n- Wireless Network : Intel® Killer™ Wi-Fi 6E AX1675(i)\r\n- Interfaces :\r\n1 x Type-C USB 3.2 gen 2 w/ DP\r\n3 x Type-A USB 3.2 gen1\r\n1x RJ45\r\n1* HDMI 2.1(8K @60Hz / 4K @ 120Hz)\r\n1 x Mini-DisplayPort\r\n\r\n- Sistem Operasi : Windows 11 Home\r\n- Batteray : 4 cell\r\n- Dimension : 358 x 267 x 23.4 mm\r\n- Berat : 2,38 kg'),
(26, 'LENOVO LEGION 5 15 GRY -13ID', 24499000, 2350, 'legion5ryzen.png', 'Laptop', 'LENOVO LEGION 5 15 GRY -13ID\r\n\r\nSpesifikasi :\r\nProcessor AMD Ryzen 7 6800H (8C / 16T, 3.2 / 4.7GHz, 4MB L2 / 16MB L3)\r\nGraphics NVIDIA GeForce RTX 3060 6GB GDDR6, Boost Clock 1702MHz, TGP 140W\r\nChipset AMD SoC Platform\r\nMemory 2x 8GB SO-DIMM DDR5-4800 ( Max Memory Up to 32GB DDR5-4800 offering )\r\nStorage 512GB SSD M.2 2280 PCIe 4.0x4 NVMe\r\nStorage Support\r\nUp to two drives, 2x M.2 SSD\r\n• M.2 2280 SSD up to 1TB\r\n• M.2 2242 SSD up to 512GB\r\n\r\nCard Reader None\r\nOptical None\r\nAudio Chip High Definition (HD) Audio, Realtek ALC3287 codec\r\nSpeakers Stereo speakers, 2W x2, Nahimic Audio\r\nCamera FHD 1080p with E-camera Shutter\r\nMicrophone 2x, Array\r\nBattery Integrated 80Wh\r\nMax Battery Life\r\n• Model with 80Wh battery:\r\n• MobileMark 2018: 10.8 hr\r\nLocal video (1080p) playback@150nits: 17.8 hr\r\nPower Adapter 230W Slim Tip (3-pin)\r\n\r\nDisplay 15.6\" WQHD (2560x1440) IPS 300nits Anti-glare, 165Hz, 100% sRGB, Dolby Vision, Free-Sync, G-Sync, DC dimmer\r\nKeyboard 4-Zone RGB Backlit, English\r\nCase Color Storm Grey\r\nSurface Treatment Anodizing\r\nCase Material Aluminium (Top), PC + ABS (Bottom)\r\nDimensions (WxDxH) 358.8 x 262.35 x 19.99 mm (14.13 x 10.33 x 0.79 inches)\r\nWeight 2.35 kg (5.18 lbs)\r\n\r\nOperating System Windows 11 Home 64, English\r\nBundled SoftwareOffice Home and Student 2021\r\n\r\nEthernet 100/1000M\r\nWLAN + Bluetooth Wi-Fi 6 11ax, 2x2 + BT5.2\r\nStandard Ports\r\n• 2x USB 3.2 Gen 1\r\n• 1x USB 3.2 Gen 1 (Always On)\r\n• 2x USB-C 3.2 Gen 2 (support data transfer and DisplayPort 1.4)\r\n• 1x USB-C 3.2 Gen 2 (support data transfer, Power Delivery 135W and DisplayPort 1.4)\r\n• 1x HDMI, up to 8K/60Hz\r\n• 1x Ethernet (RJ-45)\r\n• 1x Headphone / microphone combo jack (3.5mm)\r\n• 1x Power connector'),
(27, 'LENOVO GAMING 3 15 BLK -V0ID', 13399000, 2250, 'LENOVO GAMING 3 - RYZEN 5.png', 'Laptop', 'LENOVO GAMING 3 15 BLK -V0ID\r\n\r\nSpesifikasi :\r\nProcessor AMD Ryzen 5 5600H (6C / 12T, 3.3 / 4.2GHz, 3MB L2 / 16MB L3)\r\nGraphics NVIDIA GeForce RTX 3050 4GB GDDR6, Boost Clock 1500 / 1635MHz, TGP 85W\r\nChipset : AMD SoC Platform\r\nMemory : 1x 8GB SO-DIMM DDR4-3200\r\nMemory Slots : Two DDR4 SO-DIMM slots, dual-channel capable\r\nMax Memory : Up to 16GB DDR4-3200 offering\r\nStorage : 512GB SSD M.2 2280 PCIe 3.0x4 NVMe\r\nCard Reader : None\r\nOptical : None\r\nAudio Chip : High Definition (HD) Audio, Realtek ALC3287 codec\r\nSpeakers : Stereo speakers, 2W x2, Nahimic Audio\r\nCamera : 720p with Camera Shutter\r\nMicrophone : 2x, Array\r\nBattery : Integrated 45Wh\r\nMax Battery Life : MobileMark 2018: 5 hr (45Wh)\r\nPower Adapter : 170W Slim Tip (3-pin)\r\nDESIGN\r\nDisplay : 15.6\" FHD (1920x1080) IPS 300nits Anti-glare, 165Hz, 100% sRGB, DC dimmer\r\nTouchscreen : None\r\nKeyboard : 4-Zone RGB Backlit, English\r\nCase Color : Shadow Black\r\nSurface Treatment : IMR (In-Mold Decoration by Roller)\r\nCase Material : PC + ABS (Top), PC + ABS (Bottom)\r\nDimensions (WxDxH) : 359.6 x 251.9 x 24.2 mm (14.16 x 9.92 x 0.95 inches)\r\nWeight : 2.25 kg (4.96 lbs)\r\nSOFTWARE\r\nOperating System : Windows 11 Home 64, English\r\nBundled Software : Office Home and Student 2021\r\nCONNECTIVITY\r\nEthernet : 100/1000M\r\nWLAN + Bluetooth : 11ax, 2x2 + BT5.0\r\nStandard Ports :\r\n2x USB 3.2 Gen 1\r\n1x USB-C 3.2 Gen 1 (support data transfer only)\r\n1x HDMI 2.0\r\n1x Ethernet (RJ-45)\r\n1x Headphone / microphone combo jack (3.5mm)\r\n1x Power connector\r\nSECURITY & PRIVACY\r\nSecurity Chip : Firmware TPM 2.0\r\nFingerprint Reader : None\r\nOther Security : Camera privacy shutter\r\n\r\nNote : Untuk Backpack ( Tas-nya ) Yang Akan Kami Kirim Sekarang Tas Legion Sesuai Gambar Banner.'),
(28, 'ASUS ZENBOOK FLIP 14 TOUCH OLED', 20149000, 1400, 'asus zenbook flip.jpg', 'Laptop', 'ASUS ZENBOOK FLIP 14 TOUCH OLED UP5401EA OLED713 GRY\r\n\r\n\r\nSpesifikasi :\r\nProcessor Onboard : Intel® Core™ i7-1165G7 Processor 2.8 GHz (12M Cache, up to 4.7 GHz, 4 cores)\r\nMemori Standar : 16GB LPDDR4X on board\r\nTipe Grafis : Intel® Iris Xe Graphics\r\nUkuran Layar : 14” 2.8K (2880 x 1800) OLED Touch Screen 16:10 aspect ratio, 100% DCI-P3 color gamut, PANTONE Validated\r\nHard Disk : 1TB M.2 NVMe™ PCIe® 4.0 Performance SSD\r\nAudio : Built-in speaker\r\nKeyboard : Backlit Chirclet Keyboard\r\nCamera : 720P HD Camera\r\nWireless Network : Wi-Fi 6(802.11ax)+Bluetooth 5.0 (Dual band) 2*2\r\nMilitary Grade : US MIL-STD 810H military-grade standard\r\n\r\n\r\nInterfaces :\r\n1x USB 3.2 Gen 2 Type-A\r\n2x Thunderbolt™ 4 supports display / power delivery//1x HDMI 2.0b\r\n1x 3.5mm Combo Audio Jack//Micro SD card reader\r\n\r\nSistem Operasi : Windows 11 Home + Microsoft Office Home & Student 2021\r\nBaterai : 63WHrs, 3S1P, 3-cell Li-ion\r\nDimension : 31.10 x 22.30 x 1.59 ~ 1.59 cm\r\nColour : Pine Grey\r\nBerat : 1,4Kg'),
(29, 'Lenovo Ideapad Slim 5 11th - i5-1135G7', 8499000, 14000, 'lenovo slim 5.jpg', 'Laptop', '11th-gen. Intel Core i5-1135G7 2.4GHz Tiger Lake quad-core CPU\r\n8GB memory DDR4\r\n512GB SSD\r\nIntel Iris Xe Graphics\r\nFull HD (1920 x 1080) 45% NTSC\r\nWindows 10 HOME\r\n\r\nKeyboard with Backlight, Number Pad\r\n\r\nConnectivity :\r\nmicroSD Card Slot, SD Card Slot, HDMI, USB 3.0, USB-C, USB 3.1\r\n\r\nGARANSI :\r\n- GARANSI DISTRIBUTOR 1 TAHUN\r\n- GARANSI TOKO 7 HARI TUKAR UNIT, JIKA ADA KERUSAKAN YANG DI AKIBATKAN OLEH CACAT PABRIK\r\n- BARANG ORI DAN BARU 100%\r\n'),
(30, 'HP PAVILION TOUCHSCREEN ', 8799000, 1240, 'hp pavilion touchscreen.jpg', 'Laptop', 'Intel® Core™ i5-1155G7 (up to 4.5 GHz with Intel® Turbo Boost Technology, 8 MB L3 cache, 4 cores, 8 threads)\r\n12 GB DDR4-3200 MHz RAM\r\n512 GB PCIe® NVMe™ M.2 SSD\r\nIntel® Iris® Xᵉ Graphics\r\n15.6\" diagonal, FHD (1920 x 1080), touch, IPS, micro-edge, BrightView, 250 nits, 45% NTSC\r\nWindows 11 Home\r\nWebcam\r\nHP Wide Vision 720p HD camera\r\nExternal ports :\r\n1 SuperSpeed USB Type-C® 10Gbps signaling rate (USB Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge); 2 SuperSpeed USB Type-A 5Gbps signaling rate; 1 HDMI 2.0; 1 AC smart pin; 1 headphone/microphone combo\r\n'),
(31, 'MSI SUMMIT E13 FLIP EVO', 15899000, 1200, 'msi summit evo.jpg', 'Laptop', 'Intel Evo Platform Powered by 11th Gen Intel® Core™ i7-1165G7 Processor\r\n16GB LPDDR4X RAM\r\n512GB NVMe Solid State Drive\r\nIntel® Iris Xe Graphics\r\n13.4\" Touchscreen IPS 100% sRGB FHD+ (1920 x 1200) Display\r\nWindows 10 Home\r\n\r\nKeyboard:\r\nWhite backlight Keyboard\r\nSilky glass multi touch with fingerprint reader\r\n\r\nCommunications:\r\nIntel® Wi-Fi 6E (2x2/160) Gig+ and Bluetooth® 5.2\r\n720p HD Webcam with Ambient Light Sensor and Camera Lock Shutter\r\n\r\nPorts & Slots:\r\n2x Thunderbolt 4.0 with DP 1.4a (Supports Power Delivery)\r\n1x USB 3.2 Gen 2 Type C\r\n1x USB 3.2 Gen 1\r\n1x Micro SD\r\n1x Mic-In/Headphone-Out Combination Jack'),
(32, 'ASUS ROG ZEPHYRUS G14', 27799000, 2000, 'ASUS ROG ZEPHYRUS g14 white.jpg', 'Laptop', '<p>GA402RJ-R7X6B6W-O WHITE<br>GA402RJ-R7X6B6G-O GREY</p>\r\nSpesifikasi :\r\n<br> * Processor : AMD Ryzen™ 7 6800HS Mobile Processor (8-core/16-thread, 20MB cache, up to 4.7 GHz max boost)\r\n<br> * Display : 14-inch FHD (1920 x 1200, WUXGA) 16:10 400 nits, IPS-level Pantone validated panel 144HZ, 100% sRGB\r\n<br> * Memory : 16GB DDR5 on board (2x8GB) 1x DDR5 SO-DIMM slots 24GB\r\n<br> * Storage : 512GB M.2 NVMe™ PCIe® 4.0 SSD\r\n<br> * Graphics : AMD Radeon™ RX 6700S\r\n<br> * Keyboard : Backlit Chiclet Keyboard\r\n<br> * Wireless : Wi-Fi 6E(802.11ax)+Bluetooth 5.2 (Dual band) 2*2\r\n<br> * Webcam : 720P HD IR Camera for Windows Hello\r\n* Connectivity : 1x USB 3.2 Gen 2 Type-C support DisplayPort, 1x USB 3.2 Gen 2 Type-C support DisplayPort™ / power delivery, 2x USB 3.2 Gen 2 Type-A, 1x card reader, 1x 3.5mm Combo Audio Jack\r\n* Battery : 76WHrs, 4S1P, 4-cell Li-ion\r\n* Operating System : Windows 11 Home+Office Home Student 2021\r\n* Free ROG sleeve + TYPE-C, 100W AC Adapter'),
(33, 'Acer Aspire 5 A515 FHD', 7199000, 1800, 'Acer Aspire 5 A515.jpg', 'Laptop', 'Spesifikasi :\r\n- Processor : AMD Ryzen™ 5 5 5500U Mobile Processor (6C / 6T, 2.3 / 4.0GHz, 3MB L2 / 8MB L3)\r\n- RAM : 4GB / 8GB DDR4\r\n- SSD : 256GB PCI-e NVME\r\n- Graphics : AMD Radeon Graphics\r\n- Display: 15.6\" FHD\r\n- Optical Drive Type : No-DVDrom\r\n- Netwrok & Communication : 10/100/1000 LAN, Acer InviLink™ Nplify™ 802.11ac wireless LAN featuring MIMO Technology,\r\n- Bluetooth® 4.2\r\n- Audio : Two built-in stereo speakers\r\n- Port :\r\n2 x USB 3.2 Gen 1 ports\r\n1 x USB 2.0 Port\r\n1 x HDMI port with HDCP support\r\n- Operating System : Windows 10 Home 64bit'),
(34, 'Razer Headset Wireless Opus X - Quartz', 1390000, 270, 'razer.jpg', 'Headset', 'TECH SPECS\r\nFREQUENCY RESPONSE 20 Hz – 20 kHz\r\nIMPEDANCE None\r\nSENSITIVITY None\r\nDRIVER SIZE - DIAMETERS (MM) 40 mm\r\nDRIVER TYPE 2 x 40 mm dynamic drivers\r\nEARCUPS Circumaural\r\nEARPADS MATERIAL Protein Leather / Nylon\r\nNOISE CANCELLING Active Noise Cancellation\r\nCONNECTION TYPE Wireless via Bluetooth 5.0\r\nCABLE LENGTH 0.5m length USB-A to USB-C charging cable\r\nWEIGHT 270 g\r\nMICROPHONE STYLE 2 for active noise cancellation technology, 2 for voice chat\r\nPICK-UP PATTERN None\r\nMICROPHONE FREQUENCY RESPONSE None\r\nMICROPHONE SENSITIVITY (@1KHZ) None\r\nVIRTUAL SURROUND ENCODING None\r\nVOLUME CONTROL Yes (VOL + and VOL – buttons)\r\nOTHER CONTROLS None\r\nBATTERY LIFE Up to 30 hours with ANC on (up to 40 hours with ANC off)\r\nLIGHTING LED for indicating power, pairing and charging status\r\nCOMPATIBILITY\r\nBT Connection: Mobile / System\r\n\r\nGaransi Resmi : 2 TAHUN'),
(41, 'Audio-Technica ATH-M20xBT Wireless', 1239000, 2100, 'audio tech.jpg', 'Headset', 'ATH-M20xBT Wireless Over-Ear Headphones by Audio-Technica\r\n\r\n\r\nThe ATH-M20x professional monitor headphones have long provided a great introduction to our critically acclaimed M-Series. Now you can take that classic M20x studio sound with you wherever you go!\r\n\r\nPlus, there’s a low latency mode that improves the synchronicity'),
(42, 'Audio-Technica ATH-102USB Dual-Earpiece', 479000, 400, 'audio tech 2.jpg', 'Headset', 'ATH-102USB Dual-Earpiece Microbial Headset\r\nAnti-Microbial, Deodorizing Design\r\nHeadset, pengontrol, colokan, bantalan telinga, dan kaca depan semuanya diperlakukan dengan zat penghilang bau antimikroba yang menghambat pertumbuhan bakteri*.\r\n*Bakteri tertentu saja, termasuk E.coli dan S.aureus\r\n\r\nUSB Type-A and USB Type-CTM Connectivity'),
(43, 'Audio-Technica ATH-M50X Professional Monitor', 2180000, 2000, 'audio tech3.jpg', 'Headset', 'Sebagai model unggulan di lini M-Series, ATH-M50X diakui dan direkomendasikan oleh para audio engineer terkenal dan pengamat pro audio dari tahun ke tahun. Sekarang ATH-M50X headphone monitor profesional memiliki fitur sonic signature, dengan tambahan fitur kabel yang dapat dilepas. Dengan aperture driver yang besar, suara earcup yang terisolasi, dan konstruksi yang kuat, M50X menyediakan pengalaman yang tidak tertandingi untuk para profesional audio.'),
(44, 'dbE GM220 3.5mm Multiplatform Gaming', 329000, 834, 'dbe1.jpg', 'Headset', 'Spesifikasi :<br>\r\nSpeaker : 50mm High Quality Speaker<br>\r\nImpedance : 32 Ohm<br>\r\nFreq Response : 20 - 20kHz<br>\r\nSensitivitas : 118 dB +- 3 dB<br>\r\nJack Plug : 3.5mm<br>\r\nMicrophone : Yes, detachable<br>\r\nMic Size : 6.0 x 2.7mm<br>\r\nMic Impedance : 2.2k Ohm<br>\r\nMic Sensitivity : -42dB +- 3 dB<br>'),
(45, 'dbE DJ300 HIgh End DJ Headphone', 599000, 500, 'dbe2.jpg', 'Headset', 'Spesifikasi :<br>\r\nDriver : High Quality 40mm Speaker Driver<br>\r\nImpedance : 32 Ohm<br>\r\nSensitivity : 105 dB +- 3 dB<br>\r\nFreq Response : 20 Hz - 20 kHz<br>\r\nPlug Type : Dual Jack, 3.5mm dan 6.3mm<br>\r\n<br>\r\nPaket Penjualan :<br>\r\n- Headphone dbE DJ300<br>\r\n- Pouch Headphone<br>\r\n- Kabel Dual Jack 3.5mm dan 6.3mm<br>\r\n- Boom Microphone<br>\r\n- Cable Spliter<br>'),
(46, 'TP-Link TL-WR840N (V4.0) TPLink WiFi', 155000, 1000, 'tolink1.jpg', 'Router', 'Garansi resmi 1 tahun dari TP-Link Indonesia.\r\n\r\nKey Features:\r\n- Interface : 4 10/100Mbps LAN PORTS, 1 10/100Mbps WAN PORT\r\n- Button : WPS/RESET Button\r\n- Antenna : 2 Antennas\r\n- External Power Supply : 9VDC / 0.6A\r\n- Wireless Standards : IEEE 802.11n, IEEE 802.11g, IEEE 802.11b\r\n- Dimensions ( W x D x H ) : 7.2 x 5.0 x 1.4in.(182 x 128 x 35 mm)\r\n- Wireless Functions : Enable/Disable Wireless Radio, WDS Bridge, WMM, Wireless Statistics\r\n- Wireless Security : 64/128-bit WEP, WPA / WPA2,WPA-PSK / WPA2-PSK\r\n- Quality of Service : WMM, Bandwidth Control\r\n- WAN Type : Dynamic IP/Static IP/PPPoE/ PPTP/L2TP\r\n- Management : Access Control, Local Management, Remote Management\r\n- DHCP : Server, Client, DHCP Client List, Address Reservation\r\n- Port Forwarding : Virtual Server,Port Triggering, UPnP, DMZ\r\n- Dynamic DNS : DynDns, Comexe, NO-IP\r\n- VPN Pass-Through : PPTP, L2TP, IPSec (ESP Head)\r\n- Access Control : Parental Control, Local Management Control, Host List, Access Schedule, Rule Management\r\n- Firewall Security : DoS, SPI Firewall, IP Address Filter/MAC Address Filter/Domain Filter, IP and MAC Address Binding\r\n- Protocols : Support IPv4 and IPv6\r\n- Guest Network : 2.4GHz Guest Network x1\r\n- Certification : CE, RoHS\r\n- Package Contents : TL-WR840N, Power supply unit, Resource CD, Ethernet Cable, Quick Installation Guide\r\n- System Requirements : Windows 2000/XP/Vista, Windows 7, Windows 8, Windows 8.1, Windows 10 or Mac OS or Linux-based operating system'),
(47, 'Tp-Link Archer A6 AC1200 MU-MIMO', 540000, 1000, 'tplink 2.jpg', 'Router', 'Supports 802.11ac standard\r\nSimultaneous 2.4GHz 300 Mbps and 5GHz 867 Mbps connections for 1200 Mbps of\r\ntotal available bandwidth\r\n4 external antennas and one internal antenna provide stable wireless connections\r\nand optimal coverage\r\nEasy network management at your fingertips with TP-Link Tether\r\nMU-MIMO achieves 2X efficiency by communicating with up to 2 devices at once\r\nBeamforming technology delivers wider wireless coverage\r\nSupports Access Point mode to create a new Wi-Fi access point\r\n\r\nThe Archer A6 creates a reliable and blazing-fast network powered by 802.11ac\r\nWi-Fi technology. The 2.4GHz band delivers\r\nspeeds up to 300Mbps, ready for everyday tasks like emailing and web browsing,\r\nwhile the 5GHz band delivers speeds up to 867Mbps, ideal for HD video streaming\r\nand lag-free online gaming.\r\n\r\n5 High-Performance Antennas\r\nWi-Fi Coverage throughout Your Home\r\n\r\nFour external antennas and one internal antenna send Wi-Fi signals to every\r\ncorner of your home. Stay connected and enjoy fast Wi-Fi whether you are\r\nlounging on the sofa or on the balcony. With a powerful chipset, the Archer A6\r\nprovides ideal Wi-Fi coverage. The 2.4GHz band coverage is especially\r\nimpressive, eliminating Wi-Fi dead-zones and beating that of other competing\r\nrouters.\r\n\r\nIt’s An Access Point, Too\r\nSwitch the working mode of the Archer A6 to Access Point Mode to share your\r\nwired network with other wireless devices.\r\n\r\nMU-MIMO Matters\r\nIncrease Speed, Throughput, Capacity\r\nMU-MIMO lets the Archer A6 serve multiple devices at once. No more bandwidth\r\ncongestion or latency. All devices get their data faster and Wi-Fi is used more\r\nefficiently!\r\n\r\nGigabit Connectivity, 10× Faster\r\nWith one Gigabit WAN port and four Gigabit LAN port, speeds can be up to 10×\r\nfaster than standard Ethernet\r\nconnections. Connect your favorite wired devices to the Archer A6 and get\r\nimpressed!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
