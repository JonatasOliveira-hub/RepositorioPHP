create table tb_cliente(
cod_cliente serial NOT NULL CONSTRAINT pk_cod_cliente PRIMARY KEY,
nome varchar (200),
telefone character(12),
celular character(13),
cpf character varying(14),
endereco varchar(200),
email varchar(100));