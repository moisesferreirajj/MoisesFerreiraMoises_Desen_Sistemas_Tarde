DROP DATABASE empresa;

CREATE DATABASE empresa;
USE empresa;

CREATE TABLE cliente (
	id_cliente int NOT NULL AUTO_INCREMENT,
	nome varchar(50),
    endereco varchar(80),
    telefone varchar(20),
	email varchar(50),
    PRIMARY KEY (id_cliente)
);

INSERT INTO cliente (nome, endereco, telefone, email) VALUES
('Ana Paula Silva', 'Rua das Flores, 123 - Centro', '(11) 98877-6655', 'ana.silva@email.com'),
('Carlos Henrique', 'Av. Brasil, 456 - Jardim América', '(21) 99788-1122', 'carlos.henrique@email.com'),
('Mariana Oliveira', 'Rua dos Jacarandás, 789 - Bela Vista', '(31) 99899-3344', 'mariana.oliveira@email.com'),
('João Pedro Santos', 'Travessa da Paz, 101 - São José', '(51) 98444-5566', 'joao.pedro@email.com'),
('Fernanda Lima', 'Alameda das Acácias, 202 - Boa Vista', '(41) 99666-7788', 'fernanda.lima@email.com'),
('Ricardo Almeida', 'Rua do Comércio, 77 - Centro', '(61) 98123-4567', 'ricardo.almeida@email.com'),
('Tatiane Costa', 'Av. das Nações, 303 - Vila Nova', '(71) 98765-4321', 'tatiane.costa@email.com'),
('Lucas Ferreira', 'Rua São Jorge, 55 - Santo Antônio', '(85) 98800-2233', 'lucas.ferreira@email.com'),
('Patrícia Ramos', 'Av. Independência, 900 - Liberdade', '(95) 99111-3344', 'patricia.ramos@email.com'),
('Eduardo Moreira', 'Rua das Palmeiras, 12 - Jardim Tropical', '(62) 98222-5566', 'eduardo.moreira@email.com');

CREATE TABLE usuario (
	nome varchar(50) default null,
    usuario varchar(10) default null,
    senha varchar(32),
    nivel int(10) default null
);

INSERT INTO usuario (nome, usuario, senha, nivel) VALUES
('moises', 'moises', '123456', '1');