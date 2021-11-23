create table tb_livro(
cod_livro serial NOT NULL CONSTRAINT pk_cod_livro PRIMARY KEY,
nome varchar (200),
autor varchar (100),
editora varchar (100),
quantidade_estoque int,
cod_de_barras int);