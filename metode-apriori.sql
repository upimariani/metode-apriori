-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 03:44 AM
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
-- Table structure for table `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(11) NOT NULL,
  `produk1` varchar(125) NOT NULL,
  `produk2` varchar(125) NOT NULL,
  `min_support` double NOT NULL,
  `min_confidence` double NOT NULL,
  `jumlah` int(11) NOT NULL,
  `support` double NOT NULL,
  `confidence` double NOT NULL,
  `lolos` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `produk1`, `produk2`, `min_support`, `min_confidence`, `jumlah`, `support`, `confidence`, `lolos`, `type`) VALUES
(1, 'Produk A', 'Produk B', 0.3, 70, 6, 0.54545454545455, 100, 1, 1),
(2, 'Produk A', 'Produk C', 0.3, 70, 4, 0.36363636363636, 66.666666666667, 1, 1),
(3, 'Produk A', 'Produk D', 0.3, 70, 3, 0.27272727272727, 50, 0, 1),
(4, 'Produk A', 'Produk E', 0.3, 70, 3, 0.27272727272727, 50, 0, 1),
(5, 'Produk B', 'Produk C', 0.3, 70, 5, 0.45454545454545, 62.5, 1, 1),
(6, 'Produk B', 'Produk D', 0.3, 70, 4, 0.36363636363636, 50, 1, 1),
(7, 'Produk B', 'Produk E', 0.3, 70, 4, 0.36363636363636, 50, 1, 1),
(8, 'Produk C', 'Produk D', 0.3, 70, 5, 0.45454545454545, 71.428571428571, 1, 1),
(9, 'Produk C', 'Produk E', 0.3, 70, 4, 0.36363636363636, 57.142857142857, 1, 1),
(10, 'Produk D', 'Produk E', 0.3, 70, 3, 0.27272727272727, 42.857142857143, 0, 1),
(11, 'Produk A', 'Produk B', 0.3, 70, 3, 0.27272727272727, 75, 0, 2),
(12, 'Produk A', 'Produk C', 0.3, 70, 1, 0.090909090909091, 25, 0, 2),
(13, 'Produk A', 'Produk D', 0.3, 70, 2, 0.18181818181818, 50, 0, 2),
(14, 'Produk A', 'Produk E', 0.3, 70, 1, 0.090909090909091, 25, 0, 2),
(15, 'Produk A', 'Produk F', 0.3, 70, 1, 0.090909090909091, 25, 0, 2),
(16, 'Produk B', 'Produk C', 0.3, 70, 3, 0.27272727272727, 50, 0, 2),
(17, 'Produk B', 'Produk D', 0.3, 70, 3, 0.27272727272727, 50, 0, 2),
(18, 'Produk B', 'Produk E', 0.3, 70, 1, 0.090909090909091, 16.666666666667, 0, 2),
(19, 'Produk B', 'Produk F', 0.3, 70, 1, 0.090909090909091, 16.666666666667, 0, 2),
(20, 'Produk C', 'Produk D', 0.3, 70, 4, 0.36363636363636, 100, 1, 2),
(21, 'Produk C', 'Produk E', 0.3, 70, 2, 0.18181818181818, 50, 0, 2),
(22, 'Produk C', 'Produk F', 0.3, 70, 1, 0.090909090909091, 25, 0, 2),
(23, 'Produk D', 'Produk E', 0.3, 70, 4, 0.36363636363636, 50, 1, 2),
(24, 'Produk D', 'Produk F', 0.3, 70, 4, 0.36363636363636, 50, 1, 2),
(25, 'Produk E', 'Produk F', 0.3, 70, 3, 0.27272727272727, 60, 0, 2);

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
(1, 'Produk A', 6, 0.54545454545455, 0),
(2, 'Produk B', 8, 0.72727272727273, 0),
(3, 'Produk C', 7, 0.63636363636364, 0),
(4, 'Produk D', 7, 0.63636363636364, 0),
(5, 'Produk E', 5, 0.45454545454545, 0),
(6, 'Produk F', 2, 0.18181818181818, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dt_itemset2`
--

CREATE TABLE `dt_itemset2` (
  `id_dt_itemset2` int(11) NOT NULL,
  `produk1` varchar(125) NOT NULL,
  `produk2` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 3, 'Produk E'),
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
(26, 7, 'Produk D'),
(27, 8, 'Produk E'),
(28, 8, 'Produk B'),
(29, 9, 'Produk C'),
(30, 9, 'Produk D'),
(31, 10, 'Produk D'),
(32, 10, 'Produk C'),
(33, 10, 'Produk B'),
(34, 11, 'Produk D'),
(35, 11, 'Produk F');

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
(10, 3, 5, 3),
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
(36, 12, 4, 5),
(37, 12, 5, 5),
(38, 12, 6, 5),
(39, 13, 1, 6),
(40, 13, 2, 6),
(41, 14, 3, 6),
(42, 14, 4, 7),
(43, 14, 5, 5),
(44, 14, 6, 5),
(45, 15, 2, 7),
(46, 15, 3, 6),
(47, 15, 4, 6),
(48, 16, 1, 6),
(49, 16, 2, 6),
(50, 16, 6, 6),
(51, 17, 5, 6),
(52, 18, 4, 6),
(53, 18, 3, 5),
(54, 18, 2, 7),
(55, 18, 1, 6),
(56, 18, 5, 6),
(57, 18, 4, 7),
(58, 19, 4, 7),
(59, 19, 4, 6),
(60, 19, 6, 6),
(61, 19, 5, 6),
(62, 19, 4, 6),
(63, 20, 3, 6),
(64, 20, 2, 6),
(65, 21, 2, 7),
(66, 22, 1, 7);

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
(1, 4, '2023-03-01', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(2, 4, '2023-03-02', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(3, 4, '2023-03-03', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(4, 4, '2023-03-04', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(5, 4, '2023-03-05', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(6, 4, '2023-03-06', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(7, 4, '2023-03-07', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(8, 4, '2023-03-08', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(9, 4, '2023-03-09', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(10, 4, '2023-03-10', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(11, 4, '2023-03-11', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(12, 7, '2023-03-01', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(13, 7, '2023-03-02', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(14, 7, '2023-03-03', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(15, 7, '2023-03-04', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(16, 7, '2023-03-05', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(17, 7, '2023-03-06', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(18, 7, '2023-03-07', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(19, 7, '2023-03-08', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(20, 7, '2023-03-09', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(21, 7, '2023-03-10', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4),
(22, 7, '2023-03-11', '9000', 1, 'Ini-Dia-Bukti-Transfer-Mandiri-Dari-ATM-mBanking-dan-Internet-Banking-Mandiri-1.jpg', 4);

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
(6, 'Manager', 'Kuningan, Jawa Barat', '089987654543', 'manager', 'manager', 3),
(7, 'Reseller', 'Kuningan, Jawa Barat', '089987654541', 'reseller', 'reseller', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`);

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
-- AUTO_INCREMENT for table `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dt_item`
--
ALTER TABLE `dt_item`
  MODIFY `id_dt_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_itemset1`
--
ALTER TABLE `dt_itemset1`
  MODIFY `id_dt_itemset1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dt_itemset2`
--
ALTER TABLE `dt_itemset2`
  MODIFY `id_dt_itemset2` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_tabular`
--
ALTER TABLE `dt_tabular`
  MODIFY `id_dt_tabular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_produk`
--
ALTER TABLE `order_produk`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
