create table Clientes 
( id serial PRIMARY KEY,
  nome VARCHAR (150),
  endereco VARCHAR(50),
  postalCode VARCHAR(10),
  pais VARCHAR (15),
  cpf VARCHAR (15),
  Passaporte VARCHAR (15),
  email VARCHAR (30),
  dataNascimento DATE
);
