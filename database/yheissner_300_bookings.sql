-- Adminer 4.8.4 MySQL 8.0.39-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `court` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `bookings` (`id`, `court`, `username`, `date`, `starttime`, `endtime`) VALUES
(4,	1,	'yheissner',	'2024-08-07',	'12:30:00',	'00:00:00'),
(7,	2,	'yheissner',	'2024-08-08',	'10:00:00',	'00:00:00'),
(8,	1,	'yheissner',	'2024-08-09',	'00:00:00',	'00:00:00'),
(9,	1,	'yheissner',	'2024-08-14',	'03:30:00',	'00:00:00'),
(10,	1,	'yheissner',	'2024-08-13',	'08:00:00',	'00:00:00'),
(11,	1,	'msmalley',	'2024-08-14',	'08:15:00',	'00:00:00'),
(12,	1,	'msmalley',	'2024-08-13',	'08:15:00',	'00:00:00'),
(13,	1,	'yheissner',	'2024-08-13',	'08:00:00',	'00:00:00'),
(14,	3,	'msmalley',	'2024-08-15',	'08:00:00',	'09:00:00'),
(15,	1,	'yheissner',	'2024-08-15',	'08:00:00',	'10:00:00'),
(16,	2,	'yheissner',	'2024-08-15',	'00:00:00',	'01:00:00'),
(17,	1,	'yheissner',	'2024-08-15',	'09:00:00',	'00:00:00'),
(21,	1,	'yheissner',	'2024-08-16',	'16:00:00',	'19:00:00'),
(22,	4,	'yheissner',	'2024-08-16',	'14:00:00',	'16:00:00'),
(23,	2,	'yheissner',	'2024-08-16',	'10:00:00',	'11:00:00'),
(24,	1,	'yheissner',	'2024-08-23',	'08:00:00',	'22:00:00'),
(25,	1,	'yheissner',	'2024-08-23',	'08:00:00',	'10:00:00'),
(26,	4,	'yheissner',	'2024-08-23',	'08:00:00',	'09:00:00'),
(27,	2,	'bbarry',	'2024-08-23',	'10:00:00',	'11:00:00'),
(28,	3,	'ohanada',	'2024-08-23',	'11:00:00',	'11:45:00'),
(29,	2,	'lthomson',	'2024-08-23',	'08:00:00',	'10:15:00'),
(30,	1,	'yheissner',	'2024-08-26',	'08:00:00',	'09:00:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `forename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`username`, `hash`, `forename`, `surname`) VALUES
('1201barry',	'$2y$10$Jtd.wNClUxMblCWhUkpFuOw/d9TqnLkFcOIJJ6fDM25W1ZKWDamLS',	'Barry',	'Li'),
('bbarry',	'$2y$10$ZtpVLLVbju7AErny9dTVRucshvigKzQLJGkT2CiTbTR1xk9bWwoUS',	'ben',	'barry'),
('cnewbold',	'$2y$10$OEJNukystSdws4.4RsSPSuaPIsyjZd33I34rHVj4F7FhGQSZjWGwy',	'cody',	'newbold'),
('jgill',	'$2y$10$r7H0Gyi0wV9RU4.EbJJoMOO56OBnhL8OjUURR1VA/aX5qNIzjxDfG',	'josh',	'gill'),
('lthomson',	'$2y$10$JF/OnSMwAi/xHnnPJHJ8FOc4bKjj6NGH.1J2/1gpUzH54cOq5SZMS',	'liam',	'thomson'),
('msmalley',	'$2y$10$HBoZ4U1u.3d4G/kvPaCkROr6hbiHV0oPuT8bYvoC9NSe555.QldWS',	'myles',	'smalley'),
('ohanada',	'$2y$10$BEOlXTTDWuRhPV3..HpuR.cWZWLzs6X7tZ7spxaSIBEhnJ2E5uyne',	'oto',	'hanada'),
('rstock',	'$2y$10$dP4HHLMU55jLO43AFsaVPeLj/gUj/ANyWSFRGsz.wukSMuPcTZ0Fu',	'rory',	'stock'),
('yheissner',	'$2y$10$SFnYvZczfTK42bvk3SYU/eGAxkyi77696CV1CN.FXpmSpNyPaWTta',	'yuuki',	'heissner');

-- 2024-09-02 23:22:37
