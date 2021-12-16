create table Clientes 
( id serial PRIMARY KEY,
  nome VARCHAR (150),
  endereço VARCHAR(50),
  postalCode VARCHAR(10),
  pais VARCHAR (15),
  cpf character varying(14),
  Passaporte VARCHAR (15) ,
  email VARCHAR (30),
  dataNascimento DATE
);
