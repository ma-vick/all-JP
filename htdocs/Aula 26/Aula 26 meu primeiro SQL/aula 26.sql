-- Aula 26

CREATE DATABASE aula26primeirosql;

CREATE TABLE clientes (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	ts TIMESTAMP,
	nome VARCHAR(500),
	idade DECIMAL(3) UNSIGNED,
	cidade VARCHAR(100),
	pais VARCHAR(100)
);

INSERT INTO clientes (nome, idade, cidade, pais) VALUES ('Ana', 26, 'Vitória', 'Brasil');
INSERT INTO clientes (nome, idade, cidade, pais) VALUES ('Izabelly', 16,'Vila Velha','Brasil');
INSERT INTO clientes (nome, idade, cidade, pais) VALUES ('Fábia', 40,'Viena','Itália');
INSERT INTO clientes (nome, idade, cidade, pais) VALUES ('José da Silva', 87,'Berlin','Alemanha');

-- SELECT: pega informações na base de dados 
SELECT * FROM clientes WHERE pais='Brasil';
SELECT * FROM clientes;
SELECT nome,idade FROM clientes;
SELECT * FROM clientes WHERE idade>=18;
SELECT * FROM clientes WHERE nome>="C";

-- DISTINCT
SELECT DISTINCT pais FROM clientes;
SELECT DISTINCT pais, cidade FROM clientes;

SELECT DISTINCT cidade FROM clientes WHERE pais='Brasil';

-- ORDER BY
SELECT * FROM clientes ORDER BY idade;

SELECT DISTINCT cidade FROM clientes WHERE pais='Brasil' ORDER BY cidade;

-- AND, OR, NOT
SELECT * FROM clientes WHERE NOT pais = "Brasil";
SELECT * FROM clientes WHERE pais = 'Brasil' AND idade >=18;
SELECT * FROM clientes WHERE pais = 'Itália' OR pais = 'Alemanha';

-- IN: está dentro de uma lista de opções
SELECT * FROM clientes WHERE pais IN ('Itália','Coreia','Butão');

-- Novas Tabelas e FOREIGN KEY
CREATE TABLE produtos (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	ts TIMESTAMP,
	titulo VARCHAR(500),
	marca VARCHAR(100),
	preco DECIMAL(9,2) UNSIGNED
);

INSERT INTO produtos (titulo, marca, preco) VALUES ('Café com leite','Milkshekespeare',6.00);
INSERT INTO produtos (titulo, marca, preco) VALUES ('Briadeiro','Milkshekespeare',10.00);
INSERT INTO produtos (titulo, marca, preco) VALUES ('Brawne','Milkshekespeare',5.00);
INSERT INTO produtos (titulo, marca, preco) VALUES ('Insenso','Casa de masagem',15.00);
INSERT INTO produtos (titulo, marca, preco) VALUES ('Urbanista','City',7.50);

-- Tabela relacional
CREATE TABLE vendas (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	ts TIMESTAMP,
	id_cliente INT UNSIGNED,
	id_produto INT UNSIGNED,
	FOREIGN KEY (id_cliente) REFERENCES clientes(id),
	FOREIGN KEY (id_produto) REFERENCES produtos(id) 
);

INSERT INTO vendas (id_cliente, id_produto) VALUES (1,1);
INSERT INTO vendas (id_cliente, id_produto) VALUES (2,2);
INSERT INTO vendas (id_cliente, id_produto) VALUES (2,4);
INSERT INTO vendas (id_cliente, id_produto) VALUES (1,4);
INSERT INTO vendas (id_cliente, id_produto) VALUES (3,1);

-- IN (SELECT)
-- Cliente que já fizeram compras
SELECT * FROM cliente WHERE id IN (
	SELECT DISTINCT id_cliente
	FROM vendas 
);