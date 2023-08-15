<?php
class Daoitemvenda
{

    public function listAll()
    {
        $lista = [];
        $pst = Connection::getPreparedStatement('select * from itemvenda;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function getProduto($id)
    {
        $pst = Connection::getPreparedStatement('select nome from produto where id = ?;');
        $pst->bindValue(1, $id);
       
        $pst->execute();
        $list = $pst->fetch(PDO::FETCH_ASSOC);
      
        return $list;
    }

    public function create(itemvenda $itemvenda)
    {
        $sql = 'call inserir_itemvenda(?,?,?)';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $itemvenda->getId_produto());
        $pst->bindValue(2, $itemvenda->getId_venda());
        $pst->bindValue(3, $itemvenda->getQuantidade());
       
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }

     public function listForVenda($idVenda)
    {
        $lista = [];
        $sql = 'select id, id_Venda, id_Produto, quantidade, preco, valortotal from itemvenda where id_venda = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $idVenda);
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }
    
    public function delete($id)
    {
        $sql = 'delete from itemvenda where id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
        
        
    }

    public function update(itemvenda $itemvenda)
    {
        $sql = 'update itemvenda set id_produto = ?,quantidade = ?,valorTotal = ? where id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $itemvenda->getId_produto());
        $pst->bindValue(2, $itemvenda->getquantidade());
        $pst->bindValue(4, $itemvenda->getvalorTotal());
        $pst->bindValue(5, $itemvenda->getId());
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }




}



?>