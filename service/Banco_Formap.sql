create database usuario;

use usuario;

create table user
(
	id int unsigned not null auto_increment,
	nome_user varchar(255) not null,
	email varchar(255) not null,
	senha varchar(255) not null,
	primary key(id)
);

