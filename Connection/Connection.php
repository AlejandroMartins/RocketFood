<?php

class Connection
{

    //Definindo os atributos que serão utilizados na conexão
    private static $dsn = 'mysql:host=localhost;dbname=rocketfood;port=3306';
    private static $connection = null;
    private static $username = 'root';
    private static $password = '12345';

    // Cria a conexão com o BD e testa
    public static function getConnection() : PDO
    {
        if(Connection::$connection == null){
            try {
                Connection::$connection = new PDO(Connection::$dsn, Connection::$username, Connection::$password);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return Connection::$connection;
    }

    //Pegar consultas
    public static function getPreparedStatement($sql) : PDOStatement
    {
        $pst = null;
       
        if(Connection::getConnection() != null){
            try {
                $pst = Connection::$connection->prepare($sql);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $pst;
    }

}


?>