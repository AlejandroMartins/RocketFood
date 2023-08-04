<?php
class DaoProduto
{

    public function listAll()
    {
        $lista = [];
        $pst = Connection::getPreparedStatement('select * from produto;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }
    public function listGrupo()
    {
        $lista = [];
        $pst = Connection::getPreparedStatement('select * from grupoproduto;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function getById($id)
    {
        $pst = Connection::getPreparedStatement('select * from produto where id = ?;');
        $pst->bindValue(1, $id);
       
        $pst->execute();
        $list = $pst->fetch(PDO::FETCH_ASSOC);
        $obj = new produto($list["nome"], $list["valor"],$list["descricao"], $list["id"]);
        return $obj;
    }

    public function create(produto $produto)
    {
        $sql = 'insert into produto (nome,valor,descricao) values (?,?,?);';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $produto->getnome());
        $pst->bindValue(2, $produto->getvalor());
        $pst->bindValue(3, $produto->getdescricao());
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($id)
    {
        $sql = 'delete from produto where id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
        
        
    }

    public function update(produto $produto)
    {
        $sql = 'update produto set nome = ?,valor = ?,descricao = ? where id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $produto->getnome());
        $pst->bindValue(2, $produto->getvalor());
        $pst->bindValue(3, $produto->getdescricao());
        $pst->bindValue(4, $produto->getId());
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }




}



?>