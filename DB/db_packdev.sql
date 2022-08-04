-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Mar 2021 pada 02.58
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_packdev`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_galeri`
--

INSERT INTO `tb_galeri` (`id`, `gambar`) VALUES
(95, 'Eye Mo Cool 3D Innerbox.jpg'),
(96, 'Hezandra 3D.jpg'),
(97, 'OBB1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `nik` int(8) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nik`, `nama_karyawan`, `jabatan`) VALUES
(12100, 'Emmanuel Natalino SH', 'Packaging Development Officer'),
(12121, 'Merry Chistianty, Apt.', 'General Manager'),
(12996, 'Ricky Suntara, S.Kom', 'Packaging Development Designer'),
(12997, 'Berlian Metta Karunawati ', 'Packaging Development Officer'),
(12998, 'Lintang Kurnia', 'Packaging Development Analyst');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `kd_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `bentuk_sediaan` varchar(100) NOT NULL,
  `kategori_produk` varchar(20) NOT NULL,
  `bahan_kemas` varchar(50) NOT NULL,
  `artwork` varchar(160) NOT NULL,
  `kd_supplier` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`kd_produk`, `nama_produk`, `bentuk_sediaan`, `kategori_produk`, `bahan_kemas`, `artwork`, `kd_supplier`) VALUES
('F IBT1 D4 - 1409', 'CARDIOCOM 150', 'Kaplet', 'Ethical', 'Foil', 'F IBT1 D4 - 1409.pdf', 'CM'),
('I IBT1 J4 - 1407', 'CARDIOCOM 150', 'Kaplet', 'Ethical', 'Innerbox', 'I IBT1 J4 - 1407.pdf', 'CM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sppbp`
--

CREATE TABLE `tb_sppbp` (
  `kd_sppbp` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` int(8) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `kd_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `bahan_kemas` varchar(20) NOT NULL,
  `penyimpanan` varchar(50) NOT NULL,
  `metode_pemeriksaan` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `teks` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `bobot` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `kerekatan_lem` varchar(100) NOT NULL,
  `kondisi_lockbottom` varchar(100) NOT NULL,
  `abrasi_test` varchar(100) NOT NULL,
  `kondisi_pengemas` text NOT NULL,
  `prosedur_pemeriksaan` varchar(100) NOT NULL,
  `kd_supplier` varchar(10) NOT NULL,
  `penyimpangan_kritis` varchar(50) NOT NULL,
  `penyimpangan_major` varchar(100) NOT NULL,
  `penyimpangan_minor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sppbp`
--

INSERT INTO `tb_sppbp` (`kd_sppbp`, `tanggal`, `nik`, `nama_karyawan`, `jabatan`, `kd_produk`, `nama_produk`, `bahan_kemas`, `penyimpanan`, `metode_pemeriksaan`, `material`, `teks`, `warna`, `bobot`, `ukuran`, `kerekatan_lem`, `kondisi_lockbottom`, `abrasi_test`, `kondisi_pengemas`, `prosedur_pemeriksaan`, `kd_supplier`, `penyimpangan_kritis`, `penyimpangan_major`, `penyimpangan_minor`) VALUES
('F IBT1 D4 ', '2021-01-29', 12100, 'Emmanuel Natalino', 'Packaging Development Officer', 'F IBT1 D4 - 1409', 'CARDIOCOM 150', 'Foil', 'SIMPAN PADA SUHU RUANGAN', 'MIL - LTD 105D', 'IVORY 300 GSM', 'SESUAI PROOF PRINT', 'SESUAI PROOF PRINT', '302 - 207 G/M2', '108 x 108 x 108', 'BAGIAN SAMBUNG MELEKAT DENGAN BAIK', 'TERKUNCI SEMPURNA', 'TEXT DAN WARNA TIDAK LUNTUR', 'TEXT DAN WARNA TIDAK LUNTUR', 'PROSEDUR PEMERIKSAAN INNERBOX PRINTED', 'CM', 'BARANG TIDAK SESUAI PESANAN', 'DILUAR SPEK YANG STANDAR', 'CETAKAN BURAM TAPI MASIH BISA TERBACA'),
('I IBT1 J4', '2021-01-29', 12100, 'Emmanuel Natalino', 'Packaging Development Officer', 'I IBT1 J4 - 1407', 'CARDIOCOM 150', 'Innerbox', 'SIMPAN PADA SUHU RUANGAN', 'MIL - LTD 105D', 'IVORY 300 GSM', 'SESUAI PROOF PRINT', 'SESUAI PROOF PRINT', '302 - 207 G/M2', '108 x 108 x 108', 'BAGIAN SAMBUNG MELEKAT DENGAN BAIK', 'TERKUNCI SEMPURNA', 'TEXT DAN WARNA TIDAK LUNTUR', 'TEXT DAN WARNA TIDAK LUNTUR', 'PROSEDUR PEMERIKSAAN INNERBOX PRINTED', 'CM', 'BARANG TIDAK SESUAI PESANAN', 'DILUAR SPEK YANG STANDAR', 'CETAKAN BURAM TAPI MASIH BISA TERBACA'),
('I PND1 J1', '2021-01-06', 12100, 'Emmanuel Natalino', 'Packaging Development Officer', 'I PND1 J1 - 1908', 'PANADOL EXTRA', 'Innerbox', 'SIMPAN PADA SUHU RUANGAN', 'MIL - LTD 105D', 'IVORY 300 GSM', 'SESUAI PROOF PRINT', 'SESUAI PROOF PRINT', '302 - 207 G/M2', '108 x 108 x 108', 'BAGIAN SAMBUNG MELEKAT DENGAN BAIK', 'TERKUNCI SEMPURNA', 'TEXT DAN WARNA TIDAK LUNTUR', 'TEXT DAN WARNA TIDAK LUNTUR', 'PROSEDUR PEMERIKSAAN INNERBOX PRINTED', 'CVM', 'BARANG TIDAK SESUAI PESANAN', 'DILUAR SPEK YANG STANDAR', 'CETAKAN BURAM TAPI MASIH BISA TERBACA'),
('I PND1 J12', '2021-01-25', 12100, 'Emmanuel Natalino', 'Packaging Development Officer', 'I PND1 J1 - 1908', 'PANADOL EXTRA', 'Innerbox', 'SIMPAN PADA SUHU RUANGAN', 'MIL - LTD 105D', 'IVORY 300 GSM', 'SESUAI PROOF PRINT', 'SESUAI PROOF PRINT', '302 - 207 G/M2', '108 x 108 x 108', 'BAGIAN SAMBUNG MELEKAT DENGAN BAIK', 'TERKUNCI SEMPURNA', 'TEXT DAN WARNA TIDAK LUNTUR', 'BAGIAN SAMBUNG MELEKAT DENGAN BAIK', 'PROSEDUR PEMERIKSAAN INNERBOX PRINTED', 'CVM', 'BARANG TIDAK SESUAI PESANAN', 'DILUAR SPEK YANG STANDAR', 'CETAKAN BURAM TAPI MASIH BISA TERBACA'),
('I PND1 Z1', '2021-01-25', 12100, 'Emmanuel Natalino', 'Packaging Development Officer', 'I PND1 J1 - 1908', 'PANADOL EXTRA', 'Innerbox', 'SIMPAN PADA SUHU RUANGAN', 'MIL - LTD 105D', 'IVORY 300 GSM', 'SESUAI PROOF PRINT', 'SESUAI PROOF PRINT', '302 - 207 G/M2', '108 x 108 x 108', 'BAGIAN SAMBUNG MELEKAT DENGAN BAIK', 'TERKUNCI SEMPURNA', 'TEXT DAN WARNA TIDAK LUNTUR', 'BAGIAN SAMBUNG MELEKAT DENGAN BAIK', 'PROSEDUR PEMERIKSAAN INNERBOX PRINTED', 'CVM', 'BARANG TIDAK SESUAI PESANAN', 'DILUAR SPEK YANG STANDAR', 'CETAKAN BURAM TAPI MASIH BISA TERBACA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kd_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `no_telepon` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`kd_supplier`, `nama_supplier`, `alamat_supplier`, `no_telepon`) VALUES
('CM', 'CEMERLANG DEH', 'JL. RAJAWALI, No. 423', 6651251),
('CVM', 'CV MUTIARA', 'JL. KOPO, SAYATI, No.10', 823114586),
('GRM', 'GRAMEDIA', 'JL. PEGASAAN TIMUR, No. 4', 6614785),
('MSL', 'MASTER LABEL', 'JL. Marga Asih, No. 123', 6651257);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` varchar(50) NOT NULL,
  `nik` int(8) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `nik`, `nama_karyawan`, `level`, `pwd`) VALUES
('emmanuel.natalino', 12100, 'Emmanuel Natalino', 'SPV', 'qwerty'),
('lintang.kurnia', 12998, 'Lintang Kurnia', 'Administrasi', 'Abc123'),
('ricky.suntara', 12996, 'Ricky Suntara', 'Admin', 'Abidzar10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`kd_produk`),
  ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indeks untuk tabel `tb_sppbp`
--
ALTER TABLE `tb_sppbp`
  ADD PRIMARY KEY (`kd_sppbp`),
  ADD KEY `nik` (`nik`),
  ADD KEY `kd_produk` (`kd_produk`),
  ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`kd_supplier`) REFERENCES `tb_supplier` (`kd_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
