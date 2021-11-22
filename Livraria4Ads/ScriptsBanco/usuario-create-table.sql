create table Tb_Usuario(
	id_usuario serial NOT NULL,
  	usuario varchar (200),
 	senha varchar (32),
 	nivel_usuario int,
  FOREIGN KEY (nivel_usuario) REFERENCES Tb_Nivel_Usuario (id_nivel) ON DELETE CASCADE);
