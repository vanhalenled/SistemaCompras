<?php

$nome =  $_POST["nome"];
$cpf = $_POST["cpf"];
$periodo = $_POST["periodo"];
$idade = $_POST["idade"];

$conn = new PDO("mysql:dbname=banco;host=localhost","root","");

$stmt = $conn->prepare("insert into teste2(nome,cpf,periodo,idade)values(:NOME,:CPF, :PERIODO, :IDADE)");

// $nome = "alina belle";
// $cpf = "123123";
// $periodo = "2020-09-12";
// $idade = 69;


$stmt->bindParam(":NOME",$nome);
$stmt->bindParam(":CPF",$cpf);
$stmt->bindParam(":PERIODO",$periodo);
$stmt->bindParam(":IDADE",$idade);

$stmt->execute();

echo "Inserido com Sucesso"; 






?>