create table examen(
	codexa int not null AUTO_INCREMENT,
	nomexa varchar(30) not null,
	feccreexa datetime not null,
	estado int not null,
	PRIMARY KEY (codexa)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;