<?php

$n1 = $_POST["dataDaCompra"];
$n2 = $_POST["comercio"];
$n3 = $_POST["setor"];
$n4 = $_POST["produto"];
$n5 = $_POST["marca"];
$n6 = $_POST["quantidade"];
$n7 = $_POST["precoKg"];
$n8 = $_POST["precoUnidade"];
$n9 = $_POST["valorTotal"];
$conn = new mysqli("localhost","root","","banco");

if($conn->connect_error){

echo "Error: ". $conn->connect_error;

}else{

echo "SALVO COM SUCESSO";


}

$stmt = $conn->prepare("insert into compra (dataDaCompra,comercio,setor,produto,marca,quantidade,precoKg,precoUnidade,valorTotal) values(?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssss", $n1 , $n2, $n3, $n4,$n5,$n6,$n7,$n8,$n9);



$stmt->execute();





?>