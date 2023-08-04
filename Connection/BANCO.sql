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
 FOREIGN KEY (id_mesa) REFERENCES Mesa(id)
 
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

-- Inserts para tabela GrupoProduto
INSERT INTO GrupoProduto (nome) 
VALUES ('Hamburguer'),
('Porção'),
('Bebida'),
('Sobremesa'),
('Pratos');

-- Inserts para tabela Produto
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Pizza', 15.99, 'Deliciosa pizza de queijo', '1');
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Hambúrguer', 12.50, 'Suculento hambúrguer artesanal', '2');
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Refrigerante', 5.00, 'Lata de refrigerante de cola', '3');
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Cerveja', 8.50, 'Garrafa de cerveja pilsen', '4');
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Salada', 9.99, 'Salada fresca com mix de folhas', '5');
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Sorvete', 7.50, 'Casquinha de sorvete sabor baunilha', '1');
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Batata frita', 6.99, 'Porção de batata frita crocante', '2');
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Frango grelhado', 11.99, 'Peito de frango grelhado com legumes', '3');
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Milkshake', 9.50, 'Milkshake de chocolate com chantilly', '4');
INSERT INTO Produto (nome, valor, descricao, id_grupo) VALUES ('Pão de alho', 4.99, 'Porção de pão de alho assado', '5');

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


use rocketfood;
select * from itemvenda;