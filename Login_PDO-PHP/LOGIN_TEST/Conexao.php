<?php


class Conexao{

    private static $connect;

    public static function getConexao(){

        if( !isset(self::$connect) ){
            self::$connect = new \PDO("mysql:host=localhost;dbname=login","root","");
            return self::$connect;
        }else{
            return self::$connect;
        }
        
                

    }


}