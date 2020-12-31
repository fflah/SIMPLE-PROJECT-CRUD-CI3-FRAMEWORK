-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 16 Des 2019 pada 03.39
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(3) NOT NULL,
  `nama_anggota` varchar(32) DEFAULT NULL,
  `nim` varchar(15) NOT NULL,
  `alamat` text,
  `ttl_anggota` text,
  `status_anggota` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `nim`, `alamat`, `ttl_anggota`, `status_anggota`) VALUES
(2, 'huan epit', 'K90909', 'solo', '2019-12-26', ''),
(7, 'wiwit', 'l200070096', 'sragen', '2019-12-18', ''),
(4, 'Wida', 'L200120190', 'Semarang', '2019-12-26', ''),
(6, 'junet', 'l2001609090', 'solo', '2019-12-18', ''),
(3, 'hujan x', 'l200170', 'Semarang', '2019-12-20', ''),
(5, 'jenaka', 'L200170149', 'Semarang', '2020-01-03', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `judul_buku` varchar(128) DEFAULT NULL,
  `pengarang` varchar(128) DEFAULT NULL,
  `penerbit` varchar(128) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `isbn`, `judul_buku`, `pengarang`, `penerbit`, `kategori_id`, `status_id`) VALUES
(17, '111', 'hahah', 'ajoa', 'ao', 1, 1),
(19, '333', 'L200170149', 'falah', 'aol', 1, 0),
(20, '444', 'trtrt', 'dsdsd', 'Gemar moco', 3, 0),
(21, '555', 'tes hai', 'faka', 'gamar moco', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Komputer'),
(3, 'Jawi'),
(4, 'informatika'),
(5, 'cintauyyy'),
(6, 'Sastra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meminjam`
--

CREATE TABLE `meminjam` (
  `id_pinjam` int(3) NOT NULL,
  `tgl_pinjam` int(11) DEFAULT NULL,
  `tgl_kembali` int(11) DEFAULT NULL,
  `nim_anggota` varchar(15) DEFAULT NULL,
  `isbn_buku` varchar(50) DEFAULT NULL,
  `kembali` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `meminjam`
--

INSERT INTO `meminjam` (`id_pinjam`, `tgl_pinjam`, `tgl_kembali`, `nim_anggota`, `isbn_buku`, `kembali`) VALUES
(6, 1576226407, NULL, 'l200170', '444', 0),
(7, 1576227296, 1576227323, 'l200170', '555', 1),
(8, 1576401536, 1576401587, 'l200070096', '555', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(0, 'dipinjam'),
(1, 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_aktif` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `foto`, `password`, `role_id`, `is_aktif`, `date_created`) VALUES
(1, 'zulfa fajrul falah', 'admin@gmail.com', 'default.jpg', '$2y$10$Zf.o8tZjKaxH0ECfRh8Vze7QJq1nmuqD0hE.0uuR.gxFjkb2XUrBK', 1, 1, 1574618053),
(2, 'ecep', 'ecep@gmail.com', 'default.jpg', '$2y$10$9qb8vWPXG3YQMcoHaARmF.CL6ghvEuZatxpXZRhLRtqSpS/UEmzDO', 2, 0, 1574618858),
(3, 'zulfa', 'zulfa@gmail.com', 'default.jpg', '$2y$10$ph6aJKf7Z2XAvirMLMje9eTjKAvK4UjEQ.Z31hY.VBZZIFBzt1oZi', 1, 1, 1574618935),
(4, 'kl', 'kl@gmail.com', 'default.jpg', '$2y$10$sYvbJ9gsF1YnG71W128eRO/vSsL6M2Dmgxden7x7gtwfTLQKLujZO', 2, 1, 1574831519),
(5, 'jjhjh', 'jhjh@gmail.com', 'default.jpg', '$2y$10$1ha1b190SzUOvH5f4zEj/.NjWdnCY3ITWtAt7gNVHn6ISs37aZRym', 2, 1, 1574831651);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member'),
(3, 'ketua');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `status_id` (`status_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_anggota` (`nim_anggota`,`isbn_buku`),
  ADD KEY `meminjam_ibfk_2` (`isbn_buku`),
  ADD KEY `kembali` (`kembali`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `status` (`status`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  MODIFY `id_pinjam` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `meminjam`
--
ALTER TABLE `meminjam`
  ADD CONSTRAINT `meminjam_ibfk_2` FOREIGN KEY (`isbn_buku`) REFERENCES `buku` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meminjam_ibfk_3` FOREIGN KEY (`nim_anggota`) REFERENCES `anggota` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meminjam_ibfk_4` FOREIGN KEY (`kembali`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
