-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2021 pada 23.56
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `member`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `email`, `password`, `role`) VALUES
(1, 'hasan', 'hasan', 'hasan@gmail.com', '$2y$10$Wayvv713ZBlsOxeDzM52HeHfwSgVpw/Wgjw2LssSQSTICKiH1vLBS', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama`) VALUES
(1, 'dkncfkdjel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama`) VALUES
(1, 'djn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(250) NOT NULL,
  `ttl` date NOT NULL,
  `nohp` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `kelamin` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jurusan` varchar(250) NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `thn_matan` varchar(20) NOT NULL,
  `thn_ppam` varchar(20) NOT NULL,
  `taman_cinta` varchar(20) NOT NULL,
  `seragam` varchar(10) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `quote` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `ortu` varchar(100) NOT NULL,
  `tlp_ortu` varchar(20) NOT NULL,
  `nama_asrama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `ttl`, `nohp`, `alamat`, `kelamin`, `kategori`, `jurusan`, `jabatan`, `thn_matan`, `thn_ppam`, `taman_cinta`, `seragam`, `foto`, `quote`, `email`, `password`, `nama`, `ortu`, `tlp_ortu`, `nama_asrama`) VALUES
(8, '2017-08-28', '376473', 'ehgeh', 'lk', 'asrama', 'djjvdc', 'Ketua', '364783', '738', '83748', 'm', '6130ce816aa19.png', 'dfvchjf', 'sdh@gmail.com', 'hsvdch', 'hwdgvh', 'bcjbdjc', '3768', 'whdjwh'),
(9, '2012-04-28', '736', 'hscvhsbchsb', 'pr', 'asrama', 'eufgueh', 'Wakil Ketua', '37438', '37647', '37678', 'm', '6130ced629669.png', 'efdhgbhedf', 'egeh@gmail.com', 'wdbhw', 'dgehs', 'dghsg', '673', 'wdhghegd'),
(10, '2017-09-28', '4637', 'fhej', 'pr', 'kampung', 'ejfe', 'Sekertaris', '7367', '673637', '76372', 'm', '6130cf3793300.jpg', 'dfgchedf', 'wdhgh@gmail.com', 'ygdywghd', 'hfgeh', 'gfhe', '376437', 'ehgde'),
(11, '2017-09-01', '73467', 'dghgsdsb', 'pr', 'asrama', 'heghsg', 'other', '473', '7827', '297', 's', '613349740116c.png', 'HDGFHD', 'jdshj@gmail.com', '76274', 'AKUUU', 'dsjhj', '7831683', 'fhsghsgh'),
(12, '2018-10-29', '72637', 'wgdhw', 'pr', 'kampung', 'hwgdhwg', 'Sekertaris', '1736', '7637', '346783', 'm', '6135e11c9d25b.jpg', 'udhgjwsh', 'gwsdh@gmail.com', 'gewhug', 'hgshag', 'jdghj', '1763', 'wgdhw'),
(13, '2019-10-29', '36572', 'jdfhjdh', 'pr', 'kampung', 'dgwhdj', 'Sekertaris', '12763', '2763', '73672', 'm', '6135e2cf7dbc9.jpg', 'wdhjd', 'hdjhwdj@gmail.com', 'dhj', 'hasan', 'ygfuehg', '278387', 'jdfhjdh'),
(14, '2020-11-30', '28638', 'wdgwhd', 'pr', 'kampung', 'djhjw', 'Ketua', '134', '8678', '8787', 'm', '6135e4398c312.jpg', 'dsjbdjnh', 'bwdjshdb@gmail.com', 'geuwhgd', 'hasan', 'fjbdjnbfsj', '382', 'wdgwhd'),
(15, '2018-10-28', '3767', 'hwgdhwg', 'pr', 'kampung', 'ehgdej', 'Wakil Ketua', '736', '8468', '8678', 'm', '61360133b408d.jpg', 'ehfje', 'jsbdj@gmail.com', 'whgsbhd', 'hadsasxbaj', 'jdeghjh', '7637', 'hwgdhwg'),
(16, '2019-10-30', '7346736', 'hsvdbhsnb', 'lk', 'kampung', 'ehrfejh', 'Wakil Ketua', '37647', '17367', '767', 'm', '61360351567da.jpg', 'egfeh', 'djhsjdh@gmail', 'hsgdh', 'ghedg', 'jdhjshdj', '7367', 'hsvdbhsnb'),
(17, '2018-09-29', '346376', 'efghhe', 'pr', 'asrama', 'hgdjhd', 'Wakil Ketua', '3647', '37627', '36478', 'm', '613613c30e947.jpg', 'SJDHEJSH', 'hdwjwd@gmail.com', 'jdwsbjsdj', 'euhgdjeh', 'jhdjwh', '7364736', 'UEFGUEHD'),
(18, '2018-10-29', '3878', 'gduwhd', 'pr', 'asrama', 'efhe', 'Wakil Ketua', '73647', '676', '7777777777', 'm', '6137bee0172cb.jpg', 'jgfhe', 'ejnejn@gmail.com', '$2y$10$mCjK8UQu3hxxyjgpdAa5p.VyM5//41VXoJz6CIjsl6uxbQE7uvjcu', 'fdndj', 'dgjh', '38', 'dhuehd'),
(19, '2019-10-29', '3676', 'jdhjwhs', 'pr', 'asrama', 'ehjeh', 'Wakil Ketua', '736', '76', '7676', 'm', '6137bf2ce100a.jpg', 'uefgheujd', 'dvhsb@gmail.com', '$2y$10$b7YRiq3Edy9lv4vQaJHKCeyOgY.YUaVdGk790K.DoMwaEmyf.hn4u', 'dvh', 'dgejh', '37873', 'wdguehwd'),
(20, '2018-11-30', '8378', 'hsbb', 'pr', 'asrama', 'nedjsnm', 'Wakil Ketua', '38', '38', '837', 's', '6137bfa307b5a.jpg', 'ejfnjdc', 'djsndjnd@gmail.com', '$2y$10$BvlAShg4pnHA8t8Twn8V8OLGPJJezGn8MSxTSkyWIGKOCoDVS3Wcy', 'bfdjh', 'dgsjhn', '928', 'edheij');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
