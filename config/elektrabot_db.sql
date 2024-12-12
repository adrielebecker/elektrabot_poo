create schema if not exists elektrabot;
use elektrabot;

create table if not exists nivelPermissao(
	id_permissao int not null auto_increment primary key,
    descricao varchar(45)
);

create table if not exists usuario(
	id_usuario int not null auto_increment primary key,
    nome varchar(255) not null,
    data_nasc date not null,
    sexo char(1) not null,
    cpf char(11) not null,
    celular char(11) not null, 
    email varchar(250) not null, 
    cep char(9) not null,
    estado char(2) not null,
    cidade varchar(250) not null,
    bairro varchar(250) not null,
    rua varchar(250) not null, 
    complemento varchar(250), 
    numero int,
    senha varchar(45) not null,
    nivel_permissao int,
    foreign key fk_permissao(nivel_permissao) references nivelPermissao(id_permissao)
);

create table if not exists substituicao(
	id_substituicao int not null auto_increment primary key,
    data_substituicao date not null,
    latitude varchar(45) not null,
    longitude varchar(45) not null,
    usuario int,
    foreign key fk_usuario(usuario) references usuario(id_usuario)
);
alter table substituicao 
add column estado varchar(45) not null;

create table if not exists gravacao(
	id_gravacao int not null auto_increment primary key,
    descricao varchar(250),
    substituicao int,
    foreign key fk_substituicaoG(substituicao) references substituicao(id_substituicao)
);

create table if not exists relatorio(
	id_relatorio int not null auto_increment primary key, 
    descricao varchar(250),
    cod_antigo varchar(45),
    cod_novo varchar(45),
    tipo char(1),
    acidente char(1),
    substituicao int, 
    foreign key fk_substituicaoR(substituicao) references substituicao(id_substituicao)
);

