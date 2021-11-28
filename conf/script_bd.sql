create database otakusystem;
use otakusystem;

create table usuario(
	id int auto_increment,
    nome varchar(100) not null,
    dataNasc date not null,
    email varchar(150) not null,
    primary key(id)
);
ALTER TABLE usuario
ADD  senha varchar(40) NOT NULL;

create table post(
	id int auto_increment,
    idUsuario int not null,
    dataDePostagem datetime not null,
    fk_id_img int,
    descricao varchar(250),
    primary key(id),
    foreign key(idUsuario) references usuario(id)
);
create table comentario(
	id int auto_increment,
    idUsuario int not null,
    dataDePostagem datetime not null,
    descricao varchar(250),
    primary key(id),
    foreign key(idUsuario) references usuario(id)
);

create table curtida(	
	id int auto_increment,
    idUsuario int not null,
    dataDeCurtida datetime not null,
    primary key(id),
    foreign key(idUsuario) references usuario(id)
);
