CREATE TABLE perguntas (
	id_pergunta serial PRIMARY KEY,
	descricao_pergunta VARCHAR ( 1000 ) NOT NULL,
	qunt_pontos INT NOT NULL,
	grau_dificuldade VARCHAR ( 30 ) NOT NULL
);
