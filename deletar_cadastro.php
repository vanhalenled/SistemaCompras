<?php

$n1 = $_POST["deletar"];

$conn = new mysqli("localhost","root","","banco");

if($conn->connect_error){

echo "Error: ". $conn->connect_error;

}else{

echo "DELETADO COM SUCESSO";


}

$stmt = $conn->prepare("delete from compra where id = ?");
$stmt->bind_param("s", $n1);



$stmt->execute();





?>