drop database if exists rocketfood;
create database rocketfood;
use rocketfood;

create table Mesa(
 id integer not null primary key auto_increment,
 numero varchar(10) not null,
 aberta bool
 );
 
 create table GrupoProduto(
 id integer not null primary key auto_increment,
 nome varchar(50) not null
 );
 
 create table Produto(
 id integer not null primary key auto_increment,
 nome varchar(50) not null,
 valor decimal(10,2) not null,
 descricao varchar(200),
 id_grupo integer,
 foreign key (id_grupo) references GrupoProduto(id) 
 );
 
  create table Funcionario(
 id integer not null primary key auto_increment,
 nome varchar(50) not null,
 telefone varchar(15) not null,
 nivel_acesso varchar(20) not null,
 usuario varchar(50) not null,
 senha varchar(256) not null
 );
 
  create table Venda(
 id integer primary key auto_increment,
 data date,
 horaChegada time,
 horaSaida time,
 aberta boolean,
 valorTotal decimal(10,2),
 id_mesa integer,
 id_funcionario integer,
 FOREIGN KEY (id_mesa) REFERENCES Mesa(id),
 FOREIGN KEY (id_funcionario) REFERENCES Funcionario(id)
 
 );
 
create table ItemVenda(
 id integer not null primary key auto_increment,
 id_produto integer,
 id_venda integer,
 quantidade integer,
 preco decimal(10,2),
 situacao bool,
 dataPedido datetime,
 valorTotal decimal(10,2),
 FOREIGN KEY (id_produto) REFERENCES Produto(id),
  FOREIGN KEY (id_venda) REFERENCES Venda(id)
 );
 
-- Inserts para tabela Mesa
INSERT INTO Mesa (numero, aberta) VALUES ('1', true);
INSERT INTO Mesa (numero, aberta) VALUES ('2', true);
INSERT INTO Mesa (numero, aberta) VALUES ('3', true);
INSERT INTO Mesa (numero, aberta) VALUES ('4', true);
INSERT INTO Mesa (numero, aberta) VALUES ('5', true);
INSERT INTO Mesa (numero, aberta) VALUES ('6', true);
INSERT INTO Mesa (numero, aberta) VALUES ('7', true);
INSERT INTO Mesa (numero, aberta) VALUES ('8', true);
INSERT INTO Mesa (numero, aberta) VALUES ('9', true);
INSERT INTO Mesa (numero, aberta) VALUES ('10', true);

-- Inserção dos grupos de produtos
INSERT INTO GrupoProduto (nome) VALUES
    ('Bebidas'),
    ('Entradas'),
    ('Pratos Principais'),
    ('Sobremesas');

-- Inserção dos produtos
-- Grupo: Bebidas
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES
    ('Refrigerante', 5.00, 'Lata de refrigerante.', 1),
    ('Água Mineral', 2.50, 'Garrafa de água mineral.', 1),
    ('Suco Natural', 7.50, 'Copo de suco de frutas naturais.', 1),
    ('Cerveja', 6.00, 'Garrafa de cerveja.', 1);

-- Grupo: Entradas
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES
    ('Bruschetta', 8.00, 'Pão italiano com tomate e manjericão.', 2),
    ('Carpaccio', 12.50, 'Finas fatias de carne crua temperada.', 2),
    ('Salada Caprese', 9.00, 'Salada com tomate, mussarela e manjericão.', 2),
    ('Lula à Dorê', 10.00, 'Anéis de lula fritos.', 2);

-- Grupo: Pratos Principais
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES
    ('Spaghetti Carbonara', 18.00, 'Massa com molho de ovos, queijo parmesão e bacon.', 3),
    ('Filé Mignon', 25.00, 'Filé grelhado com molho à escolha.', 3),
    ('Risoto de Frutos do Mar', 22.50, 'Risoto com camarões, lulas e mexilhões.', 3),
    ('Lasanha Bolonhesa', 20.00, 'Camadas de massa intercaladas com molho de carne.', 3);

-- Grupo: Sobremesas
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES
    ('Tiramisù', 9.00, 'Doce italiano com camadas de biscoito, café e creme.', 4),
    ('Pudim de Leite', 7.50, 'Pudim à base de leite condensado.', 4),
    ('Mousse de Chocolate', 6.00, 'Mousse cremoso de chocolate.', 4),
    ('Sorvete de Frutas', 5.50, 'Sorvete de frutas variadas.', 4);

-- Inserts para tabela Funcionario
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('João Silva', '(11) 98765-4321', 'Administrador', 'joao', 'senha123');
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('Maria Souza', '(11) 99876-5432', 'Atendente', 'maria', 'abc123');
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('Pedro Santos', '(11) 98765-1234', 'Atendente', 'pedro', 'senha456');
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('Ana Oliveira', '(11) 99876-4321', 'Cozinheiro', 'ana', '123abc');
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('Lucas Pereira', '(11) 98765-5432', 'Garçom', 'lucas', 'senha789');
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('Carla Costa', '(11) 99876-3214', 'Atendente', 'carla', 'abc456');
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('Rafaela Santos', '(11) 98765-6543', 'Cozinheiro', 'rafaela', 'senha987');
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('Gustavo Oliveira', '(11) 99876-2143', 'Garçom', 'gustavo', '123senha');
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('Juliana Pereira', '(11) 98765-7654', 'Atendente', 'juliana', 'senha654');
INSERT INTO Funcionario (nome, telefone, nivel_acesso, usuario, senha) VALUES ('Roberto Costa', '(11) 99876-4321', 'Atendente', 'roberto', 'abc789');

-- Inserir uma venda com itens de venda
INSERT INTO Venda (data, horaChegada, horaSaida, aberta, valorTotal, id_mesa, id_funcionario)
VALUES ('2023-09-04', '12:00:00', '13:30:00', false, 35.00, 1, 1);

-- Inserir itens de venda para a venda acima
INSERT INTO ItemVenda (id_produto, id_venda, quantidade, dataPedido, preco, valorTotal)
VALUES (1, 1, 2, NOW(), 5.00, 10.00);

INSERT INTO ItemVenda (id_produto, id_venda, quantidade, dataPedido, preco, valorTotal)
VALUES (4, 1, 1, NOW(), 6.00, 6.00);

-- Inserir outra venda na mesa 2 com itens de venda
INSERT INTO Venda (data, horaChegada, horaSaida, aberta, valorTotal, id_mesa, id_funcionario)
VALUES ('2023-09-04', '13:00:00', '14:30:00', false, 42.50, 2, 2);

-- Inserir itens de venda para a venda acima
INSERT INTO ItemVenda (id_produto, id_venda, quantidade, dataPedido, preco, valorTotal)
VALUES (3, 2, 1, NOW(), 7.50, 22.50);

INSERT INTO ItemVenda (id_produto, id_venda, quantidade, dataPedido, preco, valorTotal)
VALUES (2, 2, 2, NOW(), 2.50, 5.00);



DELIMITER $$

CREATE PROCEDURE `inserir_itemvenda`(IN produto_id INT, IN venda_id INT, IN quantidade INT)
BEGIN
    
    IF produto_id IN (SELECT id_produto FROM itemvenda where id_venda = venda_id) THEN
       
        UPDATE itemvenda iv
        SET iv.quantidade = iv.quantidade + quantidade,
		iv.valorTotal = iv.valorTotal + quantidade * (SELECT valor FROM produto WHERE id = produto_id)
        WHERE iv.id_produto = produto_id and iv.id_venda = venda_id;
    ELSE
        
        INSERT INTO itemvenda (id_produto, id_venda, quantidade, dataPedido, situacao, preco, valorTotal)
        VALUES (produto_id, venda_id, quantidade, NOW(), true, (SELECT valor FROM produto WHERE id = produto_id), (quantidade * (SELECT valor FROM produto WHERE id = produto_id)));
    END IF;
END $$

DELIMITER ;


DELIMITER $$
CREATE TRIGGER `mesabeforevenda` Before INSERT ON `venda` FOR EACH ROW BEGIN
        update mesa set aberta = false
        where id = new.id_mesa;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `vendabeforeinsert` Before INSERT ON `venda` FOR EACH ROW BEGIN
        
        set new.aberta = true;

END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `fecharmesa` Before UPDATE ON `venda` FOR EACH ROW BEGIN
        
       update mesa set aberta = true
        where id = new.id_mesa;

END
$$
DELIMITER ;

CREATE VIEW ViewVendasPorMesa AS
SELECT m.numero AS NumeroMesa, v.valorTotal AS ValorTotal
FROM Mesa m
INNER JOIN Venda v ON m.id = v.id_mesa;

CREATE VIEW ViewVendasPorFuncionario AS
SELECT f.nome AS NomeFuncionario, v.data AS DataVenda, v.valorTotal AS ValorTotal
FROM Funcionario f
INNER JOIN Venda v ON f.id = v.id_funcionario;

CREATE VIEW ViewVendasPorGrupoProduto AS
SELECT gp.nome AS NomeGrupo, SUM(iv.valorTotal) AS ValorTotalVendas
FROM GrupoProduto gp
JOIN Produto p ON gp.id = p.id_grupo
JOIN ItemVenda iv ON p.id = iv.id_produto
JOIN Venda v ON iv.id_venda = v.id
GROUP BY gp.nome;

CREATE VIEW ViewResumoVendasDiarias AS
SELECT DATE(data) AS Data, COUNT(id) AS NumeroDeVendas, SUM(valorTotal) AS ReceitaTotal,
       AVG(valorTotal) AS MediaDeVendasPorDia
FROM Venda
GROUP BY DATE(data);

CREATE VIEW ViewProdutosVendidosNoDia AS
SELECT v.data AS Data,
       m.numero AS Mesa,
       iv.dataPedido AS Horario,
       p.nome AS Produto,
       iv.quantidade
FROM Venda v
JOIN ItemVenda iv ON v.id = iv.id_venda
JOIN Produto p ON iv.id_produto = p.id
JOIN Mesa m ON v.id_mesa = m.id
WHERE DATE(v.data) = CURDATE();


select * from ViewVendasPorMesa;

select * from ViewVendasPorFuncionario;

select * from ViewVendasPorGrupoProduto;

select * from ViewResumoVendasDiarias;

select * from ViewProdutosVendidosNoDia;