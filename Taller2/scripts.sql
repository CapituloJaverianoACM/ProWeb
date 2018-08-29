CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cedula` int NOT NULL,
  `isAdmin` BOOLEAN NOT NULL,
  `username` varchar(100) NOT NULL UNIQUE,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(cedula) REFERENCES Personas(cedula)
)
