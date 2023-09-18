create database locadorafilmes;

use locadorafilmes;

create table cliente (
	idcliente int primary key auto_increment,
    nomecliente varchar (100) not null,
    logradouro varchar (100) not null,
    numlogradouro varchar(100) not null,
    bairro varchar (100) not null,
    cidade varchar (100) not null,
    estado varchar (100) not null
);

create table filme (
idfilme int primary key auto_increment,
nomefilme varchar (100) not null,
anofilme int not null,
genero varchar (100) not null
);

create table aluguel (
	idaluguel int primary key auto_increment,
    dataaluguel timestamp default current_timestamp,
    idcliente int not null,
    idfilme int not null,
    foreign key (idcliente) references cliente(idcliente),
    foreign key (idfilme) references filme(idfilme)
);

CREATE TABLE login (
    login varchar(100) PRIMARY KEY,
    senha varchar(100) NOT NULL,
    idcliente int NOT NULL,
    id_tipo_usuario int NOT NULL,
    FOREIGN KEY (id_tipo_usuario) REFERENCES tipo_usuario(id_tipo_usuario),
    FOREIGN KEY (idcliente) REFERENCES cliente(idcliente)
);

CREATE TABLE tipo_usuario(
id_tipo_usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(300) NOT NULL
);
<<<<<<< HEAD


=======
>>>>>>> d2e5452e3ac729a318057dd5d72fa1e366b317da
show tables;

select * from cliente;
select * from filme;
select * from aluguel;
select * from login;
<<<<<<< HEAD
select * from tipo_usuario;
=======

>>>>>>> d2e5452e3ac729a318057dd5d72fa1e366b317da
select * from cliente order by idcliente asc;
select * from cliente order by nomecliente asc;

select * from filme order by idfilme asc;
select * from filme order by nomefilme asc;

select * from aluguel order by idaluguel asc;
select * from aluguel order by dataaluguel asc;

/* Copiar comando desejado e preencher:

insert into cliente (nomecliente, logradouro, numlogradouro, bairro, cidade, estado) 
values ("", "", "", "", "", "");

insert into filme (nomefilme, anofilme, genero) 
values ("", , "");

insert into aluguel (idcliente, idfilme) 
values ( , );


UPDATE cliente SET nomecliente = "", logradouro = "", numlogradouro = "", bairro = "", cidade = "", estado = "" WHERE idcliente = ;
UPDATE filme SET nomefilme = "", anofilme = , genero = "" WHERE idfilme = ;
UPDATE aluguel SET dataaluguel = '--', idcliente = , idaluguel =  WHERE idaluguel = ;

DELETE FROM cliente WHERE idcliente = ;
DELETE FROM filme WHERE idfilme = ;
DELETE FROM aluguel WHERE idaluguel = ;

*/
