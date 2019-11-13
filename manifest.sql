CREATE database `manifest`
USE `manifest`

CREATE TABLE `kapal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `gt` varchar(255) DEFAULT NULL,
  `kapasitas` int(10) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `pelabuhan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci

CREATE TABLE `jadwal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `asal` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `kapal_id` int(10) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Awal` (`tanggal`),
  KEY `FK_Akhir` (`asal`),
  KEY `kapal_id` (`kapal_id`),
  CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `penumpang` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `umur` int(10) DEFAULT NULL,
  `no_kendaraan` varchar(200) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `jadwal_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwal_id` (`jadwal_id`),
  CONSTRAINT `penumpang_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`),
  CONSTRAINT `penumpang_ibfk_2` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1