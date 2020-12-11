<?php
// conexao banco de dados

$enderecoServer = "localhost";
$username = "root";
$password = "";
$database = "sistemalogin";

$connect = mysqli_connect($enderecoServer,$username,$password,$database);

if( mysqli_connect_error() ){
    echo " Erro com banco de dados : ". mysqli_connect_error();
}

