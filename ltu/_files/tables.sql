DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `lab` varchar(100) NOT NULL,
  `day` date NOT NULL,
  `hour` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

