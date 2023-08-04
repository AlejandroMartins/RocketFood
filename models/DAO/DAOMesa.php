<?php
class DAOMesa
{

    public function listAll()
    {
        $lista = [];
        $pst = Connection::getPreparedStatement('select * from mesa;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
    
        return $lista;
    }

    public function listAbertas()
    {
        $lista = [];
        $pst = Connection::getPreparedStatement('select * from mesa where aberta = 1;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
    
        return $lista;
    }

    public function getById($id)
    {
        $pst = Connection::getPreparedStatement('select * from mesa where id = ?;');
        $pst->bindValue(1, $id);
       
        $pst->execute();
        $list = $pst->fetch(PDO::FETCH_ASSOC);
        $obj = new mesa($list["aberta"], $list["id"]);
        return $obj;
    }

    public function getOpenVenda($id)
    {
        $pst = Connection::getPreparedStatement('select * from venda where id_mesa = ? and aberta = true;');
        $pst->bindValue(1, $id);

        $pst->execute();
        $list = $pst->fetch(PDO::FETCH_ASSOC);
        $obj = $list["id"];
        return $obj;
    }

    public function create(mesa $mesa)
    {
        $sql = 'insert into mesa (aberta,numero) values (?,?);';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $mesa->getaberta(), PDO::PARAM_BOOL);
        $pst->bindValue(2, $mesa->getNumero());

        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($id)
    {
        $sql = 'delete from mesa where id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
        
        
    }

    public function update(mesa $mesa)
    {
        $sql = 'update mesa set aberta = ?, numero = ? where id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $mesa->getaberta(), PDO::PARAM_BOOL);
        $pst->bindValue(2, $mesa->getNumero());
        $pst->bindValue(3, $mesa->getId());
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }




}



?>