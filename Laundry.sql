/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` varchar(50) NOT NULL,
  `coveradmin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `namaadmin` varchar(50) DEFAULT NULL,
  `statusadmin` int DEFAULT NULL,
  `waktuadmin` datetime DEFAULT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `karyawan` (
  `idkaryawan` varchar(50) NOT NULL,
  `coverkaryawan` text,
  `namakaryawan` varchar(50) DEFAULT NULL,
  `nohpkaryawan` varchar(50) DEFAULT NULL,
  `statuskaryawan` int DEFAULT NULL,
  `waktukaryawan` datetime DEFAULT NULL,
  PRIMARY KEY (`idkaryawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `pengguna` (
  `idpengguna` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `namapengguna` varchar(50) DEFAULT NULL,
  `Passwordpengguna` varchar(50) DEFAULT NULL,
  `levelpengguna` varchar(50) DEFAULT NULL,
  `statuspengguna` int DEFAULT NULL,
  `waktupengguna` datetime DEFAULT NULL,
  PRIMARY KEY (`idpengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `reaksi` (
  `idreaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `isirekasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `waktureaksi` datetime DEFAULT NULL,
  PRIMARY KEY (`idreaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `review` (
  `idreview` varchar(50) NOT NULL,
  `idpengguna` varchar(50) DEFAULT NULL,
  `isireview` varchar(50) DEFAULT NULL,
  `idreaksi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idreview`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `reviewreaksi` (
  `idreviewreaksi` varchar(50) DEFAULT NULL,
  `idreview` varchar(50) DEFAULT NULL,
  `idreaksi` varchar(50) DEFAULT NULL,
  `idpengguna` varchar(50) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `user` (
  `iduser` varchar(50) NOT NULL,
  `coveruser` text,
  `namauser` varchar(50) DEFAULT NULL,
  `nohpuser` varchar(50) DEFAULT NULL,
  `alamatuser` varchar(50) DEFAULT NULL,
  `statususer` int DEFAULT NULL,
  `waktuuser` datetime DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
