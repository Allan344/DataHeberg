
CREATE TABLE IF NOT EXISTS `datacenter` (
  `id` int(11) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `codepostal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT IGNORE INTO `datacenter` (`id`, `nom`, `rue`, `ville`, `pays`, `codepostal`) VALUES
	(1, 'test', 'test', 'test', 'test', 35133);


CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `validate` tinyint(1) NOT NULL,
  `token` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;


INSERT IGNORE INTO `user` (`id`, `login`, `pass`, `mail`, `validate`, `token`) VALUES
	(1, 'grandChef', 'a227047a05306bce6fa7dc6d8f6dea6e9b01c9b0', 'grandchef@sio.net', 1, NULL),
	(2, 'petitChef', '131c65314283e6861b67188b183fa6dd7363b4c5', 'petitchef@sio.net', 0, NULL),
	(3, 'allan', 'C33DB5DB21499E43736EF303FC1E4AEB1905A6BE', 'allan.mont34@gmail.com', 1, NULL),
	(4, 'george (temp)', '131c65314283e6861b67188b183fa6dd7363b4c5', 'georges@sio.net', 1, NULL),
	(7, 'dylan', '$2y$10$fqaN58.bNb6dop03Yo.PtODNmkbj6koWz2lz.08xnBimagicXb2HK', 'dylan@hotmail.com', 1, NULL),
	(9, 'aurelien', '$2y$10$NfxtSlHjBgR/mYYQNoF5XOcD/WsR4TNcg.dI8beilBVEf2QXWxsxW', 'aurelien@hotmail.com', 1, NULL),
	(10, 'mateu', '$2y$10$05C5Vd9iPknKvRBAkyeMHuWU8U7gl6zV91TalgYmerxIRjfI8MbWG', 'mateu@gmail.com', 1, '39d47e8670651bb5639801e5c07c6c1c'),
	(11, 'Llodra', '$2y$10$iDjEBQaQWYRcnNI5EXLKyuOfv7MPAPycbrn.niLXMiMBQEJoh6MfW', 'xavier@gmail.com', 0, '8a0a7658ce998eff5a5e706124adb2ea'),
	(12, 'Milla', '$2y$10$KzsDsb4FuYfzSwFf23Qc4.wnPL2F.iMavO8Fo1SWBh5vAsLMYAFDa', 'aurelien@gmail.com', 1, 'dba6113feebfc0b518459076a2c3437a'),
	(15, 'llodra', '$2y$10$RhtRmUQ6w2SXVd7uG.kZ1.ID80g6kXSEeQaO32ai3f6jhNmHJJuuu', 'dylan@gmail.com', 0, '4101f29c245316d5bf9a748889058101'),

CREATE TABLE IF NOT EXISTS `user_verification` (
  `idUser` int(11) NOT NULL,
  `verification` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `FKUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

