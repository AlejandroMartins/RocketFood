<?php
class DaoVenda
{

    public function listAll()
    {
        $lista = [];
        $pst = Connection::getPreparedStatement('select * from venda;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function getById($id)
    {
        $pst = Connection::getPreparedStatement('select * from venda where id = ?;');
        $pst->bindValue(1, $id);
       
        $pst->execute();
        $list = $pst->fetch(PDO::FETCH_ASSOC);
        $obj = new venda($list["dataVenda"], $list["valorTotal"],  $list["id_mesa"], $list["id"]);
        return $obj;
    }
    public function getMesa($id)
    {
        $pst = Connection::getPreparedStatement('select numero from mesa where id = ?;');
        $pst->bindValue(1, $id);
       
        $pst->execute();
        $list = $pst->fetch(PDO::FETCH_ASSOC);
      
        return $list;
    }
    public function cancelVenda($id)
    {
        $sql = 'delete from venda where id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
        
        
    }



    public function open(Venda $venda)
    {
        $sql = 'insert into venda (id_mesa, data, horaChegada) values (?, now(), now());';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $venda->getId_mesa());
        if ($pst->execute()) {
            $retorno = Connection::getConnection()->lastInsertId();
            return $retorno;
        } else {
            return false;
        }
    }

    public function close($idvenda, $totalVenda)
    {
        $sql = 'update venda set aberta = 0, horaSaida = now(), valorTotal = ? where id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $totalVenda);
        $pst->bindValue(2, $idvenda);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
  

   




}



?>