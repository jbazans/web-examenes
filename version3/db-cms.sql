create table tipres(
	codtipres int not null AUTO_INCREMENT,
	nomtipres varchar(50) not null,
	estado int not null,
	PRIMARY KEY (codtipres)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

create table examen(
	codexa int not null AUTO_INCREMENT,
	nomexa varchar(100) not null,
	feccreexa datetime not null,
	estado int not null,
	PRIMARY KEY (codexa)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

create table pregunta(
	codpre int not null,
 	codexa int not null,
	nompre varchar(100) not null,
	codtipres int not null,
	PRIMARY KEY (codpre,codexa),
	FOREIGN KEY (codexa)
		REFERENCES examen(codexa),
	FOREIGN KEY (codtipres)
		REFERENCES tipres(codtipres)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;

create table alternativa(
	codalt int not null,
	codpre int not null,
 	codexa int not null,
	nomalt varchar(100) not null,
	PRIMARY KEY (codalt,codpre,codexa),
	FOREIGN KEY (codpre,codexa)
		REFERENCES pregunta(codexa,codpre)
)ENGINE InnoDB
CHARACTER SET latin1 COLLATE latin1_spanish_ci;