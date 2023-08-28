create database usuario;

use usuario;

create table user
(
	id int unsigned not null auto_increment,
	nome_user varchar(255) not null,
	email varchar(255) not null,
	senha varchar(255) not null,
	About you varchar(200) not null,
	Profile varchar(100) not null,
	primary key(id)
);

create table publi 
(
	id int unsigned not null auto_increment,
	titulo varchar(100) not null,
	texto varchar(5000) not null,
	fk_id_user int unsigned not null,
	Foreing Key (fk_id_user) References user(id),
	primary key(id)
) ENGINE = innodb;

