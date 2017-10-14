CREATE TABLE USUARIO(
	Id_usuario int NOT NULL AUTO_INCREMENT,,
	email varchar(50),
	senha varchar(50),
	PRIMARY KEY (Id_usuario)
);

CREATE TABLE CARGO(
	Id_cargo int NOT NULL AUTO_INCREMENT,
	Nome varchar(50),
	PRIMARY KEY (Id_cargo)
);

CREATE TABLE SUPERVISOR(
	Id_supervisor int NOT NULL AUTO_INCREMENT,
	Nome varchar(50),
	PRIMARY KEY (Id_supervisor)
);

CREATE TABLE GERENTE(
	Id_gerente int NOT NULL AUTO_INCREMENT,
	Nome varchar(50),
	PRIMARY KEY (Id_gerente)
);

CREATE TABLE FUNCIONARIO(
	Id_funcionario int NOT NULL AUTO_INCREMENT,
	Id_cargo int,
	Id_supervisor int,
	Id_gerente int,
	Id_usuario int,
	Nome Varchar (50),
	PRIMARY KEY (Id_funcionario),
	FOREIGN KEY (Id_cargo) REFERENCES CARGO(Id_cargo),
	FOREIGN KEY (Id_gerente) REFERENCES GERENTE(Id_gerente),
	FOREIGN KEY (Id_supervisor) REFERENCES SUPERVISOR(Id_supervisor),
	FOREIGN KEY (Id_usuario) REFERENCES USUARIO(Id_usuario)
	
);

