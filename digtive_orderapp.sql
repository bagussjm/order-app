-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2019 pada 13.50
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digtive_orderapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderapp_barang`
--

CREATE TABLE `orderapp_barang` (
  `barang_id` varchar(255) NOT NULL,
  `kategori_id` varchar(255) NOT NULL,
  `barang_kode` varchar(255) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_harga` int(11) NOT NULL,
  `barang_satuan` varchar(255) NOT NULL,
  `barang_stok` int(11) NOT NULL,
  `barang_isEdit` tinyint(4) NOT NULL DEFAULT '0',
  `barang_isDelete` tinyint(4) NOT NULL DEFAULT '0',
  `barang_date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `barang_date_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderapp_barang`
--

INSERT INTO `orderapp_barang` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `barang_harga`, `barang_satuan`, `barang_stok`, `barang_isEdit`, `barang_isDelete`, `barang_date_create`, `barang_date_edit`) VALUES
('brg-2029', 'ktg-4058', 'prod-9095-kt', 'DAVIS Double Tape 1/2 Inch', 2100, 'pcs', 441, 1, 0, '2019-07-13 20:38:11', '2019-07-23 07:33:56'),
('brg-4344', 'ktg-9091', 'prod-9898', 'PETRUK Beras Original 20 kg', 290400, 'unit', 40, 0, 0, '2019-07-13 20:35:12', NULL),
('brg-5d2d766a3ce1a', 'ktg-2528', 'prod-Bel-260', 'Belia Mist Cologne CUP CAKE DELIGHT 36/100', 12700, 'Unit', 3992, 0, 0, '2019-07-16 14:02:02', NULL),
('brg-5d35e8b88667e', 'ktg-4058', 'prod-GOL-814', 'GOLD TAPE Selotip Hitam 10 Pcs', 5000, 'unit', 4000, 0, 0, '2019-07-22 23:47:52', NULL),
('brg-5d36924c3bc7b', 'ktg-4058', 'prod-JOY-857', 'JOYKO Gunting Besar SC 848', 8500, 'pcs', 450, 0, 0, '2019-07-23 11:51:24', NULL),
('brg-5d369c7a77db0', 'ktg-4058', 'prod-KEN-860', 'KENKO Cutter L500', 10500, 'pcs', 40, 0, 0, '2019-07-23 12:34:50', NULL),
('brg-5d3722422beb5', 'ktg-4058', 'prod-DAV-894', 'DAVIS Isolasi 1/2 Inch Biru 12 Pcs', 8000, 'unit', 600, 0, 0, '2019-07-23 22:05:38', NULL),
('brg-8714', 'ktg-9091', 'prod-9813-mk', 'SARIMURNI Minyak Goreng 2L 1 Dus', 128000, 'box', 400, 0, 0, '2019-07-13 20:42:13', NULL),
('brg-9093', 'ktg-2528', 'prod-91929-ks', 'MENOW Lipgloss Matte', 19997, 'unit', 1990, 0, 0, '2019-07-13 20:42:13', NULL),
('kasks', 'ktg-2322', 'kampretj2bj2b', 'kamibng', 5600, 'pcs', 60, 0, 1, '2019-07-22 23:40:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderapp_kategori`
--

CREATE TABLE `orderapp_kategori` (
  `kategori_id` varchar(255) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_isEdit` tinyint(4) NOT NULL DEFAULT '0',
  `kategori_isDelete` tinyint(4) NOT NULL DEFAULT '0',
  `kategori_date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kategori_date_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderapp_kategori`
--

INSERT INTO `orderapp_kategori` (`kategori_id`, `kategori_nama`, `kategori_isEdit`, `kategori_isDelete`, `kategori_date_create`, `kategori_date_edit`) VALUES
('ktg-2025', 'Makanan dan Minuman', 0, 0, '2019-07-13 19:48:49', NULL),
('ktg-2322', 'Makanan Instan', 0, 0, '2019-07-13 20:30:00', NULL),
('ktg-2528', 'Kosmetik', 0, 0, '2019-07-13 20:30:00', NULL),
('ktg-4058', 'Peralatan Kantor', 0, 0, '2019-07-13 20:32:16', NULL),
('ktg-9091', 'Bahan dan Bumbu Makanan', 0, 0, '2019-07-13 20:32:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderapp_pelanggan`
--

CREATE TABLE `orderapp_pelanggan` (
  `pelanggan_id` varchar(255) NOT NULL,
  `pelanggan_nama` varchar(255) NOT NULL,
  `pelanggan_telepon` varchar(20) NOT NULL,
  `pelanggan_alamat` varchar(255) NOT NULL,
  `pelanggan_kota` varchar(50) NOT NULL,
  `pelanggan_isEdit` tinyint(4) NOT NULL DEFAULT '0',
  `pelanggan_isDelete` tinyint(4) NOT NULL DEFAULT '0',
  `pelanggan_date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pelanggan_date_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderapp_pelanggan`
--

INSERT INTO `orderapp_pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_telepon`, `pelanggan_alamat`, `pelanggan_kota`, `pelanggan_isEdit`, `pelanggan_isDelete`, `pelanggan_date_create`, `pelanggan_date_edit`) VALUES
('plgkambing', 'kambing', '082174614390', 'jl kambing', 'pekanbaru', 0, 1, '2019-07-23 15:31:50', NULL),
('plgn-28271', 'Toko Sejahtera Makmur', '089143887590', 'Jl Pahlawan gg Rukun Sidomulyo Barat Kec. Tampan', 'Pekanbaru', 0, 0, '2019-07-13 20:44:45', NULL),
('plgn-5d2a1ff321b83', 'Toko Adil Makmur', '082174653321', 'Jl Kartika gg buyung sari', 'Pekanbaru', 0, 0, '2019-07-14 01:16:19', NULL),
('plgn-9192', 'Toko Amanah Maju', '089923541299', 'Jl Sukar Karya gg Mekar Kec Tampan', 'Pekanbaru', 0, 0, '2019-07-13 20:44:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderapp_pemesanan`
--

CREATE TABLE `orderapp_pemesanan` (
  `pemesanan_id` varchar(255) NOT NULL,
  `pemesanan_no` varchar(255) NOT NULL,
  `pengguna_id` varchar(255) NOT NULL,
  `pelanggan_id` varchar(255) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `pemesanan_jumlah` int(11) NOT NULL,
  `pemesanan_total` int(11) NOT NULL,
  `pemesanan_tgl_pesan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pemesanan_tgl_tagihan` datetime DEFAULT NULL,
  `pemesanan_status_pesan` enum('konfirmasi','menunggu','ditolak','') NOT NULL DEFAULT 'menunggu',
  `pemesanan_status_tagihan` enum('lunas','belum lunas','','') NOT NULL DEFAULT 'belum lunas',
  `pemesanan_isEdit` tinyint(4) NOT NULL DEFAULT '0',
  `pemesanan_isDelete` tinyint(4) NOT NULL DEFAULT '0',
  `pemesanan_date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pemesanan_date_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderapp_pemesanan`
--

INSERT INTO `orderapp_pemesanan` (`pemesanan_id`, `pemesanan_no`, `pengguna_id`, `pelanggan_id`, `barang_id`, `pemesanan_jumlah`, `pemesanan_total`, `pemesanan_tgl_pesan`, `pemesanan_tgl_tagihan`, `pemesanan_status_pesan`, `pemesanan_status_tagihan`, `pemesanan_isEdit`, `pemesanan_isDelete`, `pemesanan_date_create`, `pemesanan_date_edit`) VALUES
('psn-5d31de712', 'ordr/9297', 'usr-20881', 'plgn-28271', 'brg-4344', 2, 580800, '2019-07-19 22:14:57', NULL, 'konfirmasi', 'belum lunas', 0, 0, '2019-07-19 22:14:57', NULL),
('psn-5d329072b', 'ordr/4866', 'usr-20881', 'plgn-9192', 'brg-5d2d766a3ce1a', 4, 50800, '2019-07-20 10:54:26', NULL, 'menunggu', 'belum lunas', 0, 0, '2019-07-20 10:54:26', NULL),
('psn-5d333e3c6', 'ordr/9356', 'usr-20881', 'plgn-28271', 'brg-9093', 10, 199970, '2019-07-20 23:15:56', NULL, 'konfirmasi', 'belum lunas', 0, 0, '2019-07-20 23:15:56', NULL),
('psn-5d37e2686', 'ordr/3528', 'usr-20881', 'plgn-28271', 'brg-5d2d766a3ce1a', 4, 50800, '2019-07-24 11:45:28', NULL, 'konfirmasi', 'belum lunas', 0, 0, '2019-07-24 11:45:28', NULL),
('psn-5d37ede74', 'ordr/6471', 'usr-20881', 'plgn-28271', 'brg-2029', 4, 8400, '2019-07-24 12:34:31', NULL, 'konfirmasi', 'belum lunas', 0, 0, '2019-07-24 12:34:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderapp_pengguna`
--

CREATE TABLE `orderapp_pengguna` (
  `pengguna_id` varchar(255) NOT NULL,
  `pengguna_username` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_fullname` varchar(255) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_telepon` varchar(20) NOT NULL,
  `pengguna_level` enum('adminSales','sales','adminGudang','adminSuper') NOT NULL,
  `pengguna_isEdit` tinyint(4) NOT NULL DEFAULT '0',
  `pengguna_isDelete` tinyint(4) NOT NULL DEFAULT '0',
  `pengguna_date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_date_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderapp_pengguna`
--

INSERT INTO `orderapp_pengguna` (`pengguna_id`, `pengguna_username`, `pengguna_password`, `pengguna_fullname`, `pengguna_email`, `pengguna_telepon`, `pengguna_level`, `pengguna_isEdit`, `pengguna_isDelete`, `pengguna_date_create`, `pengguna_date_edit`) VALUES
('usr-20881', 'adam', '21232f297a57a5a743894a0e4a801fc3', 'Adam Malik', 'adam.malik@gmail.com', '082176543290', 'sales', 0, 0, '2019-07-13 14:42:43', NULL),
('usr-20894', 'adminsales', '21232f297a57a5a743894a0e4a801fc3', 'John Kamal', 'admin.sales@gmail.com', '0821756665433', 'adminSales', 0, 0, '2019-07-22 21:50:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderapp_requestpesanan`
--

CREATE TABLE `orderapp_requestpesanan` (
  `request_id` varchar(255) NOT NULL,
  `pengguna_id` varchar(255) NOT NULL,
  `pelanggan_id` varchar(255) NOT NULL,
  `request_status` enum('terkirim','dilihat') NOT NULL DEFAULT 'terkirim',
  `request_pesan` text,
  `request_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderapp_requestpesanan`
--

INSERT INTO `orderapp_requestpesanan` (`request_id`, `pengguna_id`, `pelanggan_id`, `request_status`, `request_pesan`, `request_date_created`) VALUES
('req-2092', 'usr-20881', 'plgn-28271', 'dilihat', 'toko berikut tolong di setujui pesanannnya', '2019-07-21 21:42:36'),
('req-5d37f0ed6', 'usr-20881', 'plgn-9192', 'terkirim', 'pesanan pertama untuk toko amanah maju', '2019-07-24 12:47:25'),
('req-88192', 'usr-20881', 'plgn-28271', 'dilihat', 'kambing makan tanah', '2019-07-24 12:44:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderapp_sales`
--

CREATE TABLE `orderapp_sales` (
  `sales_id` varchar(255) NOT NULL,
  `sales_nama` varchar(255) NOT NULL,
  `sales_alamat` varchar(255) NOT NULL,
  `sales_telepon` varchar(255) NOT NULL,
  `sales_isEdit` tinyint(4) NOT NULL DEFAULT '0',
  `sales_idDelete` tinyint(4) NOT NULL DEFAULT '0',
  `sales_date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_date_edit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderapp_sales`
--

INSERT INTO `orderapp_sales` (`sales_id`, `sales_nama`, `sales_alamat`, `sales_telepon`, `sales_isEdit`, `sales_idDelete`, `sales_date_create`, `sales_date_edit`) VALUES
('sl-28221', 'Adam Malik', 'Jalan Kartika', '082175643277', 0, 0, '2019-07-13 14:41:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orderapp_barang`
--
ALTER TABLE `orderapp_barang`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `kategori_relation` (`kategori_id`);

--
-- Indeks untuk tabel `orderapp_kategori`
--
ALTER TABLE `orderapp_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `orderapp_pelanggan`
--
ALTER TABLE `orderapp_pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indeks untuk tabel `orderapp_pemesanan`
--
ALTER TABLE `orderapp_pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `barang_relation` (`barang_id`),
  ADD KEY `pelanggan_relation` (`pelanggan_id`),
  ADD KEY `pengguna_relation` (`pengguna_id`);

--
-- Indeks untuk tabel `orderapp_pengguna`
--
ALTER TABLE `orderapp_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `orderapp_requestpesanan`
--
ALTER TABLE `orderapp_requestpesanan`
  ADD PRIMARY KEY (`request_id`);

--
-- Indeks untuk tabel `orderapp_sales`
--
ALTER TABLE `orderapp_sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orderapp_barang`
--
ALTER TABLE `orderapp_barang`
  ADD CONSTRAINT `kategori_relation` FOREIGN KEY (`kategori_id`) REFERENCES `orderapp_kategori` (`kategori_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orderapp_pemesanan`
--
ALTER TABLE `orderapp_pemesanan`
  ADD CONSTRAINT `barang_relation` FOREIGN KEY (`barang_id`) REFERENCES `orderapp_barang` (`barang_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pelanggan_relation` FOREIGN KEY (`pelanggan_id`) REFERENCES `orderapp_pelanggan` (`pelanggan_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pengguna_relation` FOREIGN KEY (`pengguna_id`) REFERENCES `orderapp_pengguna` (`pengguna_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
