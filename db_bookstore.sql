-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2021 pada 18.27
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bookstore`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `hapusbuku` (IN `judulbuku` VARCHAR(200))  BEGIN
DELETE FROM tb_buku WHERE judul_buku=judulbuku;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `order_buku` (IN `idbuku` INT(32), IN `ubah_stok` INT(32), IN `nama_pembeli` VARCHAR(64))  UPDATE tb_buku 
SET  
stok=stok-ubah_stok,
pembeli_terakhir = nama_pembeli
WHERE id_buku=idbuku$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_buku` (IN `id_penerbit` VARCHAR(30), IN `judul_buku` VARCHAR(30), IN `pengarang` VARCHAR(30), IN `harga` INT(30), IN `stok` INT(5))  BEGIN
INSERT INTO tb_buku
VALUES(NULL,id_penerbit, judul_buku, pengarang,
harga, stok, NULL);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_buku` (IN `idbuku` INT(10), IN `Harga` INT(16), IN `Stok` INT(5))  BEGIN
UPDATE tb_buku 
SET  
stok=Stok, harga = Harga
WHERE id_buku=idbuku;
END$$

--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `NamaPenerbit` (`id` VARCHAR(20)) RETURNS VARCHAR(20) CHARSET utf8mb4 BEGIN
   DECLARE nama VARCHAR(20);
   SELECT nama_penerbit INTO nama FROM tb_penerbit WHERE id_penerbit = id;
   RETURN nama;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `jmlh_stok`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `jmlh_stok` (
`stok_buku` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `jmlh_terjual`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `jmlh_terjual` (
`jumlah_terjual` decimal(51,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `jumlahterjual`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `jumlahterjual` (
`jumlah_terjual` decimal(51,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `pnrbt`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pnrbt` (
`id_penerbit` varchar(10)
,`nama_penerbit` varchar(200)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(10) NOT NULL,
  `id_penerbit` varchar(10) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `pengarang` varchar(200) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `pembeli_terakhir` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_penerbit`, `judul_buku`, `pengarang`, `harga`, `stok`, `pembeli_terakhir`) VALUES
(1, 'C301', 'laskar pelangi', 'Andrea Hirata', 90002, 0, NULL),
(2, 'C302', 'Tapak Jejak', 'Fiersa Besari', 85000, 0, NULL),
(3, 'C303', 'KKN Desa Penari', 'Simpleman', 60000, 7, NULL),
(4, 'C304', 'Menjemput Ajal', 'Farhan Reynaldi', 45000, 9, NULL),
(5, 'C305', 'Menghitung Biji Wijen', 'Ucil Chaniago', 50000, 10, NULL),
(6, 'C306', 'Marmut Merah Maroon', 'Al-Valerian', 37000, 4, ''),
(7, 'C307', 'Orang-Orang Biasa', 'Andrea Hirata', 30000, 10, NULL),
(8, 'C308', 'Domba Jantan', 'Rifatkun', 45000, 13, 'Rijal'),
(9, 'C309', 'Menghadeh', 'Anam Hirata', 40000, 12, NULL),
(10, 'C310', 'Sang Pemimpi', 'Andrea Hirata', 60000, 15, NULL),
(11, 'C303', 'Tuhan Maha Asyik', 'Sujiwo Tejo', 45000, 15, NULL),
(12, 'C308', 'Anak Rantau', 'Ahmad Fuad', 60000, 10, NULL),
(13, 'C301', 'Ayah', 'Andrea Hirata', 60000, 12, 'rifat'),
(14, 'C305', 'Friendzone', 'Ucil Pangarep', 85000, 9, NULL),
(15, 'C304', 'Siklus Pohon', 'Farhan Rakabuming', 45000, 20, NULL),
(16, 'C305', 'Dilan 1991', 'Dahlan', 85000, 20, NULL),
(17, 'C308', 'Naruto chapter 1', 'Masashi', 30000, 15, NULL),
(18, 'C305', 'Manifesto', 'Aji Bhaskara', 85000, 5, NULL),
(19, 'C308', 'Si Juki', 'Nafiul Juki', 60000, 20, NULL),
(20, 'C302', 'Tajir Melintir', 'Kipli', 85000, 12, NULL),
(60, 'C312', 'Rijal Menyanyi', 'Pengarang Pro', 20000, 30, NULL),
(61, 'C301', 'Kehidupan Sang Rizal', 'Pengarang Jantan', 9000, 22, NULL),
(62, 'C313', 'Kehidupan Sang Rizal Part 2', 'Pengarang Jantan', 9000, 22, NULL);

--
-- Trigger `tb_buku`
--
DELIMITER $$
CREATE TRIGGER `update_buku` AFTER UPDATE ON `tb_buku` FOR EACH ROW begin
  INSERT INTO tb_riwayat
  set id_buku=old.id_buku,
  perubahan_stok=old.stok-new.stok,
  nama_pembeli=new.pembeli_terakhir,
  waktu = NOW(); 
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id_penerbit` varchar(10) NOT NULL,
  `nama_penerbit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
('C301', 'Juned Studio'),
('C302', 'Ucil Publisher'),
('C303', 'Dudung Media'),
('C304', 'Ono Media'),
('C305', 'Penerbit Mamat'),
('C306', 'Mantap Media'),
('C307', 'Penerbit Mamang'),
('C308', 'Penerbit Tiga Sekawan'),
('C309', 'Penerbit Ucil Media'),
('C310', 'Ngab Media'),
('C311', 'Ngab Studio'),
('C312', 'Penerbit Pro'),
('C313', 'Penerbit Newbie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `waktu` varchar(99) NOT NULL,
  `id_buku` int(30) NOT NULL,
  `perubahan_stok` int(30) NOT NULL,
  `nama_pembeli` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id_riwayat`, `waktu`, `id_buku`, `perubahan_stok`, `nama_pembeli`) VALUES
(1, '2021-05-30 22:35:43', 18, 19, NULL),
(2, '2021-05-30 22:38:39', 1, 1, NULL),
(3, '2021-05-30 22:40:18', 3, 1, NULL),
(4, '2021-05-30 22:40:52', 2, -3, NULL),
(5, '2021-05-30 22:52:02', 1, 1, NULL),
(6, '2021-05-30 23:10:37', 1, 16, NULL),
(7, '2021-05-30 23:11:48', 2, 1, NULL),
(8, '2021-05-30 23:11:55', 2, 1, NULL),
(9, '2021-05-30 23:17:46', 2, 1, NULL),
(10, '2021-05-30 23:21:41', 3, 1, NULL),
(11, '2021-05-30 23:21:59', 3, 3, NULL),
(12, '2021-05-30 23:22:21', 3, -3, NULL),
(13, '2021-05-30 23:22:39', 3, 1, NULL),
(14, '2021-05-30 23:47:16', 3, 1, NULL),
(16, '2021-05-31 00:15:15', 3, -1, NULL),
(18, '2021-05-31 00:26:04', 58, 40, NULL),
(19, '2021-06-01 05:45:53', 8, 1, 'Rijal'),
(20, '2021-06-01 21:15:21', 13, 2, 'rifat'),
(21, '2021-06-01 21:16:07', 5, -4, NULL),
(22, '2021-06-01 21:16:54', 7, -1, NULL),
(23, '2021-06-01 21:28:32', 6, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_riwayat` int(20) NOT NULL,
  `id_buku` int(20) NOT NULL,
  `nama_pembeli` varchar(200) DEFAULT NULL,
  `perubahan_stok` int(10) NOT NULL,
  `waktu` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_riwayat`, `id_buku`, `nama_pembeli`, `perubahan_stok`, `waktu`) VALUES
(0, 2, NULL, 1, '2021-05-30 23:45:44'),
(222, 5, 'junedi', 1, NULL),
(223, 4, 'Awaludin', 2, NULL),
(224, 6, 'Mahmudin', 1, NULL),
(225, 8, 'Jono', 1, NULL),
(226, 3, 'Rijaludin', 1, NULL),
(227, 7, 'Moh. Rifat', 2, NULL),
(228, 8, 'farhanudin', 2, NULL),
(229, 9, 'Ucilbros', 1, NULL),
(230, 7, 'Nafiudin', 3, NULL),
(231, 10, 'Tretan Nafiul', 3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`) VALUES
(101, 'admin1', 'admin1', 'farhan'),
(102, 'admin2', 'admin2', 'rifato-sama'),
(103, 'admin3', 'admin3', 'Anam'),
(104, 'admin4', 'admin4', 'Aji'),
(105, 'admin5', 'admin5', 'somad'),
(106, 'admin6', 'admin6', 'jamal'),
(107, 'admin7', 'admin7', 'Udin'),
(108, 'admin8', 'admin8', 'Ifud'),
(109, 'admin9', 'admin9', 'Dadang'),
(110, 'admin10', 'admin10', 'Dudung');

-- --------------------------------------------------------

--
-- Struktur untuk view `jmlh_stok`
--
DROP TABLE IF EXISTS `jmlh_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jmlh_stok`  AS SELECT sum(`tb_buku`.`stok`) AS `stok_buku` FROM `tb_buku` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `jmlh_terjual`
--
DROP TABLE IF EXISTS `jmlh_terjual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jmlh_terjual`  AS SELECT sum(`tb_riwayat`.`perubahan_stok`) AS `jumlah_terjual` FROM `tb_riwayat` WHERE `tb_riwayat`.`perubahan_stok` > 0 AND `tb_riwayat`.`nama_pembeli` <> '' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `jumlahterjual`
--
DROP TABLE IF EXISTS `jumlahterjual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlahterjual`  AS SELECT sum(`tb_riwayat`.`perubahan_stok`) AS `jumlah_terjual` FROM `tb_riwayat` WHERE `tb_riwayat`.`perubahan_stok` > 0 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `pnrbt`
--
DROP TABLE IF EXISTS `pnrbt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pnrbt`  AS SELECT `tb_penerbit`.`id_penerbit` AS `id_penerbit`, `tb_penerbit`.`nama_penerbit` AS `nama_penerbit` FROM `tb_penerbit` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indeks untuk tabel `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`,`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `tb_penerbit` (`id_penerbit`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `tb_buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# Hak akses untuk `admin_bookstore`@`localhost`

GRANT USAGE ON *.* TO `admin_bookstore`@`localhost` IDENTIFIED BY PASSWORD '*4ACFE3202A5FF5CF467898FC58AAB1D615029441';

GRANT ALL PRIVILEGES ON `db_bookstore`.* TO `admin_bookstore`@`localhost`;


# Hak akses untuk `kasir_bookstore`@`localhost`

GRANT USAGE ON *.* TO `kasir_bookstore`@`localhost` IDENTIFIED BY PASSWORD '*6E02B27D5638DD2E97ABAA5B61A4FE6D03D8DF45';

GRANT EXECUTE, SHOW VIEW, TRIGGER ON `db_bookstore`.* TO `kasir_bookstore`@`localhost`;

GRANT SELECT ON `db_bookstore`.`jmlh_terjual` TO `kasir_bookstore`@`localhost`;

GRANT ALL PRIVILEGES ON `db_bookstore`.`tb_buku` TO `kasir_bookstore`@`localhost`;

GRANT ALL PRIVILEGES ON `db_bookstore`.`tb_penerbit` TO `kasir_bookstore`@`localhost`;

GRANT ALL PRIVILEGES ON `db_bookstore`.`tb_riwayat` TO `kasir_bookstore`@`localhost`;

GRANT ALL PRIVILEGES ON `db_bookstore`.`tb_transaksi` TO `kasir_bookstore`@`localhost`;