<?php 
try {
    $conexao = new PDO("mysql:dbname=leads_imc;host=localhost","root","");
} catch (PDOException $e) {
    echo "erro no banco".$e->getMessage();
}
catch(Exception $e)
{
    echo "erro generico".$e->getMessage();
}
?>