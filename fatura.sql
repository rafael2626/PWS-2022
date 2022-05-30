create database fatura ;
use  fatura ;
create table user 
(

iduser int(2)  not null auto_increment primary key,
idempresa int(2) not null,
username  varchar(50) not null,
password  varchar(50) not null,
email varchar(100) not null,
telefone int(9) not null,
nif int(11) not null,
morada varchar(100) not null,
codigopostal varchar(100) not null,
localidade varchar(50) not null,
role enum('admin','cliente','funcionario'),

CONSTRAINT FK_iduser_empresa FOREIGN KEY (idempresa) REFERENCES empresa (idempresa))

ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

create table IVA
 (
 idIVA int(2)  not null auto_increment primary key,
 percentagem int(2) not null,
 descricao  varchar(50) not null,
 vigor date  not null
 )
 ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;


create table produto
(

idproduto int(2)  not null auto_increment primary key,
idlinhafatura int(2) not null,
referencia int(5) not null,
descricao varchar(50) not null,
stock int(2) not null,
preco int(4) not null,
CONSTRAINT FK_idproduto_linhafatura FOREIGN KEY (idlinhafatura) REFERENCES fatura (idlinhafatura)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

create table linhafatura
(
idlinhafatura int(2)  not null auto_increment primary key,
quantidade int(2)  not null,
valor int(2)  not null,
valorIVA int(2)  not null,
referenciafatura int(2)  not null,
referenciaproduto int(2)  not null
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

create table estado
(
idestado  int(2)  not null auto_increment primary key,
estado enum ('lancamneto','emitida') not null
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

create table fatura(

idfatura int(2)  not null auto_increment primary key,
idlinhafatura int(2) not null,
idempresa int(2) not null,
valor int(4) not null,
total int (4) not null,
IVATotal int(4) not null,
estado enum('') not null,
refenciacliente int(2) not null,
funcionario enum ('') not null,
CONSTRAINT FK_idfatura_linhafatura FOREIGN KEY (idlinhafatura) REFERENCES fatura (idlinhafatura),
CONSTRAINT FK_idfatura_empresa FOREIGN KEY (idempresa) REFERENCES empresa (idempresa)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

create table empresa 
(
idempresa int(2)  not null auto_increment primary key,
username  varchar(50) not null,
password  varchar(50) not null,
email varchar(100) not null,
telefone int(9) not null,
nif int(11) not null,
morada varchar(100) not null,
codigopostal varchar(100) not null,
localidade varchar(50) not null,
capitalsocial int(2) not null
)
ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;