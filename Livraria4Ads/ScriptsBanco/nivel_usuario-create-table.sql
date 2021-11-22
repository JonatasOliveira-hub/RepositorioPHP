 create table Tb_Nivel_Usuario(
 	id_nivel int NOT NULL CONSTRAINT pk_id_nivel PRIMARY KEY,
 	descricao_nivel varchar (15));

insert into Tb_Nivel_Usuario(id_nivel,descricao_nivel) values (1, 'Gerente');
insert into Tb_Nivel_Usuario(id_nivel,descricao_nivel) values (2, 'Funcionário');
insert into Tb_Nivel_Usuario(id_nivel,descricao_nivel) values (3, 'Cliente');
