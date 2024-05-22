-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 03:03 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metode-apriori`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `pelanggan_send` text NOT NULL,
  `admin_send` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id_chatting`, `id_user`, `time`, `pelanggan_send`, `admin_send`) VALUES
(1, 4, '2024-05-21 14:38:04', 'hai', ''),
(2, 4, '2024-05-21 14:39:21', 'apakah produk A ready?', ''),
(3, 4, '2024-05-21 20:01:00', '', 'halo pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `dt_item`
--

CREATE TABLE `dt_item` (
  `id_dt_item` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `produk1` varchar(125) NOT NULL,
  `produk2` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_item`
--

INSERT INTO `dt_item` (`id_dt_item`, `id_order`, `produk1`, `produk2`) VALUES
(1, 1, 'Produk A', 'Produk B'),
(2, 1, 'Produk A', 'Produk B'),
(3, 2, 'Produk A', 'Produk B'),
(4, 2, 'Produk A', 'Produk B'),
(5, 3, 'Produk A', 'Produk B'),
(6, 3, 'Produk A', 'Produk B'),
(7, 3, 'Produk A', 'Produk B'),
(8, 4, 'Produk A', 'Produk B'),
(9, 4, 'Produk A', 'Produk B'),
(10, 5, 'Produk A', 'Produk B'),
(11, 5, 'Produk A', 'Produk B'),
(12, 7, 'Produk A', 'Produk B'),
(13, 7, 'Produk A', 'Produk B'),
(14, 1, 'Produk A', 'Produk C'),
(15, 1, 'Produk A', 'Produk C'),
(16, 2, 'Produk A', 'Produk C'),
(17, 3, 'Produk A', 'Produk C'),
(18, 3, 'Produk A', 'Produk C'),
(19, 3, 'Produk A', 'Produk C'),
(20, 4, 'Produk A', 'Produk C'),
(21, 5, 'Produk A', 'Produk C'),
(22, 5, 'Produk A', 'Produk C'),
(23, 6, 'Produk A', 'Produk C'),
(24, 7, 'Produk A', 'Produk C'),
(25, 7, 'Produk A', 'Produk C'),
(26, 1, 'Produk A', 'Produk D'),
(27, 2, 'Produk A', 'Produk D'),
(28, 3, 'Produk A', 'Produk D'),
(29, 3, 'Produk A', 'Produk D'),
(30, 3, 'Produk A', 'Produk D'),
(31, 4, 'Produk A', 'Produk D'),
(32, 4, 'Produk A', 'Produk D'),
(33, 5, 'Produk A', 'Produk D'),
(34, 6, 'Produk A', 'Produk D'),
(35, 7, 'Produk A', 'Produk D'),
(36, 7, 'Produk A', 'Produk D'),
(37, 1, 'Produk A', 'Produk E'),
(38, 2, 'Produk A', 'Produk E'),
(39, 3, 'Produk A', 'Produk E'),
(40, 3, 'Produk A', 'Produk E'),
(41, 4, 'Produk A', 'Produk E'),
(42, 5, 'Produk A', 'Produk E'),
(43, 5, 'Produk A', 'Produk E'),
(44, 6, 'Produk A', 'Produk E'),
(45, 7, 'Produk A', 'Produk E'),
(46, 7, 'Produk A', 'Produk E'),
(47, 1, 'Produk B', 'Produk C'),
(48, 1, 'Produk B', 'Produk C'),
(49, 2, 'Produk B', 'Produk C'),
(50, 3, 'Produk B', 'Produk C'),
(51, 3, 'Produk B', 'Produk C'),
(52, 4, 'Produk B', 'Produk C'),
(53, 5, 'Produk B', 'Produk C'),
(54, 5, 'Produk B', 'Produk C'),
(55, 6, 'Produk B', 'Produk C'),
(56, 7, 'Produk B', 'Produk C'),
(57, 7, 'Produk B', 'Produk C'),
(58, 1, 'Produk B', 'Produk D'),
(59, 2, 'Produk B', 'Produk D'),
(60, 3, 'Produk B', 'Produk D'),
(61, 3, 'Produk B', 'Produk D'),
(62, 4, 'Produk B', 'Produk D'),
(63, 4, 'Produk B', 'Produk D'),
(64, 5, 'Produk B', 'Produk D'),
(65, 6, 'Produk B', 'Produk D'),
(66, 7, 'Produk B', 'Produk D'),
(67, 7, 'Produk B', 'Produk D'),
(68, 1, 'Produk B', 'Produk E'),
(69, 2, 'Produk B', 'Produk E'),
(70, 3, 'Produk B', 'Produk E'),
(71, 4, 'Produk B', 'Produk E'),
(72, 5, 'Produk B', 'Produk E'),
(73, 5, 'Produk B', 'Produk E'),
(74, 6, 'Produk B', 'Produk E'),
(75, 7, 'Produk B', 'Produk E'),
(76, 7, 'Produk B', 'Produk E'),
(77, 1, 'Produk C', 'Produk D'),
(78, 3, 'Produk C', 'Produk D'),
(79, 3, 'Produk C', 'Produk D'),
(80, 4, 'Produk C', 'Produk D'),
(81, 5, 'Produk C', 'Produk D'),
(82, 6, 'Produk C', 'Produk D'),
(83, 6, 'Produk C', 'Produk D'),
(84, 7, 'Produk C', 'Produk D'),
(85, 7, 'Produk C', 'Produk D'),
(86, 1, 'Produk C', 'Produk E'),
(87, 3, 'Produk C', 'Produk E'),
(88, 5, 'Produk C', 'Produk E'),
(89, 5, 'Produk C', 'Produk E'),
(90, 6, 'Produk C', 'Produk E'),
(91, 6, 'Produk C', 'Produk E'),
(92, 7, 'Produk C', 'Produk E'),
(93, 7, 'Produk C', 'Produk E'),
(94, 3, 'Produk D', 'Produk E'),
(95, 4, 'Produk D', 'Produk E'),
(96, 5, 'Produk D', 'Produk E'),
(97, 6, 'Produk D', 'Produk E'),
(98, 6, 'Produk D', 'Produk E'),
(99, 7, 'Produk D', 'Produk E'),
(100, 7, 'Produk D', 'Produk E'),
(101, 1, 'Produk A', 'Produk B'),
(102, 2, 'Produk A', 'Produk B'),
(103, 3, 'Produk A', 'Produk B'),
(104, 4, 'Produk A', 'Produk B'),
(105, 5, 'Produk A', 'Produk B'),
(106, 7, 'Produk A', 'Produk B'),
(107, 3, 'Produk A', 'Produk C'),
(108, 5, 'Produk A', 'Produk C'),
(109, 1, 'Produk B', 'Produk C'),
(110, 7, 'Produk A', 'Produk C'),
(111, 3, 'Produk B', 'Produk C'),
(112, 5, 'Produk B', 'Produk C'),
(113, 7, 'Produk B', 'Produk C'),
(114, 1, 'Produk A', 'Produk C'),
(115, 7, 'Produk B', 'Produk D'),
(116, 3, 'Produk A', 'Produk D'),
(117, 4, 'Produk A', 'Produk D'),
(118, 3, 'Produk C', 'Produk D'),
(119, 7, 'Produk A', 'Produk D'),
(120, 6, 'Produk C', 'Produk D'),
(121, 3, 'Produk B', 'Produk D'),
(122, 7, 'Produk C', 'Produk D'),
(123, 4, 'Produk B', 'Produk D'),
(124, 5, 'Produk C', 'Produk E'),
(125, 5, 'Produk A', 'Produk E'),
(126, 6, 'Produk C', 'Produk E'),
(127, 7, 'Produk C', 'Produk E'),
(128, 7, 'Produk A', 'Produk E'),
(129, 5, 'Produk B', 'Produk E'),
(130, 6, 'Produk D', 'Produk E'),
(131, 7, 'Produk B', 'Produk E'),
(132, 7, 'Produk D', 'Produk E'),
(133, 3, 'Produk A', 'Produk E');

-- --------------------------------------------------------

--
-- Table structure for table `dt_itemset1`
--

CREATE TABLE `dt_itemset1` (
  `id_dt_itemset1` int(11) NOT NULL,
  `produk` varchar(125) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `support` double NOT NULL,
  `lolos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_itemset1`
--

INSERT INTO `dt_itemset1` (`id_dt_itemset1`, `produk`, `jumlah`, `support`, `lolos`) VALUES
(1, 'Produk A', 7, 1, 1),
(2, 'Produk B', 6, 0.85714285714286, 1),
(3, 'Produk C', 5, 0.71428571428571, 1),
(4, 'Produk D', 4, 0.57142857142857, 1),
(5, 'Produk E', 3, 0.42857142857143, 1),
(6, 'Produk F', 1, 0.14285714285714, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dt_itemset2`
--

CREATE TABLE `dt_itemset2` (
  `id_dt_itemset2` int(11) NOT NULL,
  `produk1` varchar(125) NOT NULL,
  `produk2` varchar(125) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `support` double NOT NULL,
  `lolos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_itemset2`
--

INSERT INTO `dt_itemset2` (`id_dt_itemset2`, `produk1`, `produk2`, `jumlah`, `support`, `lolos`) VALUES
(1, 'Produk A', 'Produk B', 19, 2.7142857142857, 1),
(2, 'Produk A', 'Produk C', 16, 2.2857142857143, 1),
(3, 'Produk A', 'Produk D', 14, 2, 1),
(4, 'Produk A', 'Produk E', 13, 1.8571428571429, 1),
(5, 'Produk B', 'Produk C', 15, 2.1428571428571, 1),
(6, 'Produk B', 'Produk D', 13, 1.8571428571429, 1),
(7, 'Produk B', 'Produk E', 11, 1.5714285714286, 1),
(8, 'Produk C', 'Produk D', 12, 1.7142857142857, 1),
(9, 'Produk C', 'Produk E', 11, 1.5714285714286, 1),
(10, 'Produk D', 'Produk E', 9, 1.2857142857143, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dt_tabular`
--

CREATE TABLE `dt_tabular` (
  `id_dt_tabular` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `produk` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_tabular`
--

INSERT INTO `dt_tabular` (`id_dt_tabular`, `id_order`, `produk`) VALUES
(1, 1, 'Produk A'),
(2, 1, 'Produk B'),
(3, 1, 'Produk C'),
(4, 2, 'Produk A'),
(5, 2, 'Produk B'),
(6, 3, 'Produk A'),
(7, 3, 'Produk B'),
(8, 3, 'Produk C'),
(9, 3, 'Produk D'),
(10, 3, 'Produk A'),
(11, 4, 'Produk A'),
(12, 4, 'Produk D'),
(13, 4, 'Produk B'),
(14, 5, 'Produk A'),
(15, 5, 'Produk B'),
(16, 5, 'Produk E'),
(17, 5, 'Produk C'),
(18, 6, 'Produk F'),
(19, 6, 'Produk E'),
(20, 6, 'Produk D'),
(21, 6, 'Produk C'),
(22, 7, 'Produk B'),
(23, 7, 'Produk A'),
(24, 7, 'Produk E'),
(25, 7, 'Produk C'),
(26, 7, 'Produk D');

-- --------------------------------------------------------

--
-- Table structure for table `order_produk`
--

CREATE TABLE `order_produk` (
  `id_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_produk`
--

INSERT INTO `order_produk` (`id_detail`, `id_order`, `id_produk`, `qty`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 3),
(3, 1, 3, 3),
(4, 2, 1, 3),
(5, 2, 2, 1),
(6, 3, 1, 2),
(7, 3, 2, 4),
(8, 3, 3, 3),
(9, 3, 4, 2),
(10, 3, 1, 3),
(11, 4, 1, 3),
(12, 4, 4, 1),
(13, 4, 2, 3),
(14, 5, 1, 2),
(15, 5, 2, 1),
(16, 5, 5, 3),
(17, 5, 3, 3),
(18, 6, 6, 3),
(19, 6, 5, 4),
(20, 6, 4, 1),
(21, 6, 3, 1),
(22, 7, 2, 3),
(23, 7, 1, 4),
(24, 7, 5, 1),
(25, 7, 3, 2),
(26, 7, 4, 1),
(27, 8, 5, 4),
(28, 8, 2, 4),
(29, 9, 3, 1),
(30, 9, 4, 3),
(31, 10, 4, 3),
(32, 10, 3, 3),
(33, 10, 2, 3),
(34, 11, 4, 1),
(35, 11, 6, 2),
(36, 12, 1, 2),
(37, 12, 2, 2),
(38, 13, 1, 1),
(39, 13, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `harga_jual` varchar(15) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `keterangan`, `harga_jual`, `gambar`) VALUES
(1, 'Produk A', 'pcs', '4500', 'xfd.jpg'),
(2, 'Produk B', 'pcs', '4500', 'xfd.jpg'),
(3, 'Produk C', 'pcs', '4500', 'xfd.jpg'),
(4, 'Produk D', 'pcs', '4500', 'xfd.jpg'),
(5, 'Produk E', 'pcs', '4500', 'xfd.jpg'),
(6, 'Produk F', 'pcs', '4500', 'xfd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id_promosi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_promosi` varchar(125) NOT NULL,
  `deskripsi_promosi` text NOT NULL,
  `potongan_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promosi`, `id_produk`, `nama_promosi`, `deskripsi_promosi`, `potongan_harga`) VALUES
(2, 2, 'Sale Of Day!', 'Promosi Harian', 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `total_bayar` varchar(15) NOT NULL,
  `stat_pembayaran` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `stat_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_order`, `id_user`, `tgl`, `total_bayar`, `stat_pembayaran`, `bukti_bayar`, `stat_order`) VALUES
(1, 1, '2023-03-01', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(2, 1, '2023-03-02', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(3, 1, '2023-03-03', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(4, 1, '2023-03-04', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(5, 1, '2023-03-05', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(6, 1, '2023-03-06', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(7, 1, '2023-03-07', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(8, 1, '2023-03-08', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(9, 1, '2023-03-09', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(10, 1, '2023-03-10', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(11, 1, '2023-03-11', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(12, 1, '2024-05-22', '18000', 0, '0', 4),
(13, 4, '2024-05-22', '9000', 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'Admin ed', 'Kuningan', '089987654354', 'admin', 'admin', 1),
(4, 'Pelanggan A', 'Kuningan, Jawa Barat', '089887654543', 'pelanggan', 'pelanggan', 4),
(5, 'Marketing', 'Kuningan, Jawa Barat', '089987654543', 'marketing', 'marketing', 2),
(6, 'Manager', 'Kuningan, Jawa Barat', '089987654543', 'manager', 'manager', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indexes for table `dt_item`
--
ALTER TABLE `dt_item`
  ADD PRIMARY KEY (`id_dt_item`);

--
-- Indexes for table `dt_itemset1`
--
ALTER TABLE `dt_itemset1`
  ADD PRIMARY KEY (`id_dt_itemset1`);

--
-- Indexes for table `dt_itemset2`
--
ALTER TABLE `dt_itemset2`
  ADD PRIMARY KEY (`id_dt_itemset2`);

--
-- Indexes for table `dt_tabular`
--
ALTER TABLE `dt_tabular`
  ADD PRIMARY KEY (`id_dt_tabular`);

--
-- Indexes for table `order_produk`
--
ALTER TABLE `order_produk`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id_promosi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dt_item`
--
ALTER TABLE `dt_item`
  MODIFY `id_dt_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `dt_itemset1`
--
ALTER TABLE `dt_itemset1`
  MODIFY `id_dt_itemset1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dt_itemset2`
--
ALTER TABLE `dt_itemset2`
  MODIFY `id_dt_itemset2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dt_tabular`
--
ALTER TABLE `dt_tabular`
  MODIFY `id_dt_tabular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_produk`
--
ALTER TABLE `order_produk`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id_promosi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
