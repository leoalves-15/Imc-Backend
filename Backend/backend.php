<?php
include './conexao.php';
$nome = $_POST["nome"];
$nome = filter_var($nome, FILTER_SANITIZE_STRING);
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$sexo = $_POST["sexo"];
$sexo = filter_var($sexo, FILTER_SANITIZE_STRING);
$imc = $_POST["imc"];
$imc = filter_var($imc, FILTER_SANITIZE_NUMBER_FLOAT);
$imc = $imc /10;
$idade = $_POST ["idade"];
$idade = filter_var($idade, FILTER_SANITIZE_NUMBER_INT);
$check = $conexao -> prepare($sql = "SELECT email_cliente from clientes WHERE email_cliente = :email");
$check -> bindValue(":email", $email);
$check -> execute();
$count = $check -> rowCount();
    if($count == 0){ 
        $inserir = $conexao ->prepare("INSERT INTO clientes (nome_cliente, email_cliente, sexo_cliente,imc_cliente,idade_cliente) VALUES (:nome, :email, :sexo, :imc, :idade);");
        $inserir -> bindValue(":nome",$nome);
        $inserir -> bindValue(":email",$email);
        $inserir -> bindValue(":sexo",$sexo);
        $inserir -> bindValue(":imc",$imc);
        $inserir -> bindValue(":idade",$idade);
        $inserir -> execute();
    }
    else if ($count == 1){
        $atualizar = $conexao -> prepare($sql = "UPDATE clientes SET imc_cliente = :imc, idade_cliente = :idade WHERE email_cliente = :email");
        $atualizar -> bindValue(":imc", $imc);
        $atualizar -> bindValue(":email",$email);
        $atualizar -> bindValue(":idade",$idade);
        $atualizar -> execute();
    }  
?> 