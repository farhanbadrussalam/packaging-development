/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.24 : Database - db_packdev
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_packdev` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_packdev`;

/*Table structure for table `tb_galeri` */

DROP TABLE IF EXISTS `tb_galeri`;

CREATE TABLE `tb_galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_galeri` */

insert  into `tb_galeri`(`id`,`gambar`) values (95,'Eye Mo Cool 3D Innerbox.jpg'),(96,'Hezandra 3D.jpg'),(97,'OBB1.jpg');

/*Table structure for table `tb_karyawan` */

DROP TABLE IF EXISTS `tb_karyawan`;

CREATE TABLE `tb_karyawan` (
  `nik` int(8) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `alamat` text,
  `no_telp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_karyawan` */

insert  into `tb_karyawan`(`nik`,`nama_karyawan`,`jabatan`,`email`,`tgl_lahir`,`gender`,`alamat`,`no_telp`) values (12100,'Emmanuel Natalino SH','Packaging Development Officer',NULL,NULL,NULL,NULL,NULL),(12121,'Merry Chistianty, Apt.','General Manager',NULL,NULL,NULL,NULL,NULL),(12996,'Ricky Suntara, S.Kom','Packaging Development Designer',NULL,NULL,NULL,NULL,NULL),(12997,'Berlian Metta Karunawati ','Packaging Development Officer',NULL,NULL,NULL,NULL,NULL),(12998,'Lintang Kurnia','Packaging Development Analyst','lintang@gmail.com','2022-07-31','P','JLN sesama','05313695495645');

/*Table structure for table `tb_produk` */

DROP TABLE IF EXISTS `tb_produk`;

CREATE TABLE `tb_produk` (
  `kd_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `bentuk_sediaan` varchar(100) NOT NULL,
  `kategori_produk` varchar(20) NOT NULL,
  `bahan_kemas` varchar(50) NOT NULL,
  `artwork` varchar(160) NOT NULL,
  `gambar` varchar(160) DEFAULT NULL,
  `kd_supplier` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_produk`),
  KEY `kd_supplier` (`kd_supplier`),
  CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`kd_supplier`) REFERENCES `tb_supplier` (`kd_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_produk` */

insert  into `tb_produk`(`kd_produk`,`nama_produk`,`bentuk_sediaan`,`kategori_produk`,`bahan_kemas`,`artwork`,`gambar`,`kd_supplier`) values ('F CBT1 A1 - 2207','Bodrexin','Tablet','OTC','Innerbox','F CBT1 A1 - 2207.pdf','F CBT1 A1 - 2207.jpg','CVM');

/*Table structure for table `tb_sppbp` */

DROP TABLE IF EXISTS `tb_sppbp`;

CREATE TABLE `tb_sppbp` (
  `kd_sppbp` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` int(8) NOT NULL,
  `kd_produk` varchar(20) NOT NULL,
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
  `penyimpangan_kritis` varchar(50) NOT NULL,
  `penyimpangan_major` varchar(100) NOT NULL,
  `penyimpangan_minor` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_sppbp`),
  KEY `nik` (`nik`),
  KEY `kd_produk` (`kd_produk`),
  CONSTRAINT `tb_sppbp_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_karyawan` (`nik`),
  CONSTRAINT `tb_sppbp_ibfk_2` FOREIGN KEY (`kd_produk`) REFERENCES `tb_produk` (`kd_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_sppbp` */

insert  into `tb_sppbp`(`kd_sppbp`,`tanggal`,`nik`,`kd_produk`,`penyimpanan`,`metode_pemeriksaan`,`material`,`teks`,`warna`,`bobot`,`ukuran`,`kerekatan_lem`,`kondisi_lockbottom`,`abrasi_test`,`kondisi_pengemas`,`prosedur_pemeriksaan`,`penyimpangan_kritis`,`penyimpangan_major`,`penyimpangan_minor`) values ('ASFEGWGR','2022-08-07',12100,'F CBT1 A1 - 2207','sfseh','jkhk','jhk','hkj','hkjh','jkh','khk','jhk','jhk','jhjkj','hkh','hjk','jkjh','kh','khkjh');

/*Table structure for table `tb_supplier` */

DROP TABLE IF EXISTS `tb_supplier`;

CREATE TABLE `tb_supplier` (
  `kd_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_supplier` */

insert  into `tb_supplier`(`kd_supplier`,`nama_supplier`,`alamat_supplier`,`no_telepon`) values ('CM','CEMERLANG DEH','JL. RAJAWALI, No. 423','6651251'),('CVM','CV MUTIARA','JL. KOPO, SAYATI, No.10','823114586'),('CWB','Siapp bos','jln gapapa','0897361527'),('GRM','GRAMEDIA','JL. PEGASAAN TIMUR, No. 4','6614785'),('MSL','MASTER LABEL','JL. Marga Asih, No. 123','6651257');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_id` varchar(50) NOT NULL,
  `nik` int(8) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `nik` (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user_id`,`nik`,`nama_karyawan`,`level`,`pwd`) values ('abdurahman',23423523,'Abdurahman','Staff','admin'),('emmanuel.natalino',12100,'Emmanuel Natalino','SPV','qwerty'),('fahri.abdur',49645694,'Fahri','Customers','admin'),('farhan.badruss',154635468,'Muhamad Farhan','Designer','admin'),('lintang.kurnia',12998,'Lintang Kurnia','Administrasi','Abc123'),('ricky.suntara',12996,'Ricky Suntara','Manager','Abidzar10');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
