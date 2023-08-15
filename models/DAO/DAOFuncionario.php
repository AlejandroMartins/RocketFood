<?php
class DaoFuncionario
{

    public function listAll()
    {
        $lista = [];
        $pst = Connection::getPreparedStatement('select * from funcionario;');
        $pst->execute();
        $lista = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $lista;
    }

    public function getById($id)
    {
        $pst = Connection::getPreparedStatement('select * from funcionario where id = ?;');
        $pst->bindValue(1, $id);
       
        $pst->execute();
        $list = $pst->fetch(PDO::FETCH_ASSOC);
        $obj = new funcionario($list["nome"], $list["telefone"],$list["usuario"],$list["nivel_acesso"], $list["senha"],$list["id"]);
        return $obj;
    }

    public function create(funcionario $funcionario)
    {
        $sql = 'insert into funcionario (nome,telefone,usuario,senha,nivel_acesso) values (?,?,?,?,?);';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $funcionario->getNome());
        $pst->bindValue(2, $funcionario->getTelefone());
        $pst->bindValue(3, $funcionario->getUsuario());
        $pst->bindValue(4, $funcionario->getSenha());
        $pst->bindValue(5, $funcionario->getNivel_acesso());

        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete($id)
    {
        $sql = 'delete from funcionario where id = ?';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $id);
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
        
        
    }

    public function update(funcionario $funcionario)
    {
        $sql = 'update funcionario set nome = ?,telefone = ?,usuario = ?, senha = ?, nivel_acesso = ? where id = ?;';
        $pst = Connection::getPreparedStatement($sql);
        $pst->bindValue(1, $funcionario->getNome());
        $pst->bindValue(2, $funcionario->getTelefone());
        $pst->bindValue(3, $funcionario->getUsuario());
        $pst->bindValue(4, $funcionario->getSenha());
        $pst->bindValue(5, $funcionario->getId());
        if ($pst->execute()) {
            return true;
        } else {
            return false;
        }
    }




}



?>