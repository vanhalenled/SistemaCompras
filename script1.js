$(document).ready(function() {
      $('#btn').click(function(){
      var n1 = $("#dataDaCompra").val();
      var n2 = $("#comercio").val();
      var n3 = $("#setor").val();
      var n4 = $("#produto").val();
      var n5 = $("#marca").val();
      var n6 = $("#quantidade").val();
      var n7 = $("#precoKg").val();
      var n8 = $("#precoUnidade").val();
      var n9 = $("#valorTotal").val();
      $.post('teste.php',{dataDaCompra : n1,comercio : n2,setor : n3,produto : n4,marca : n5,quantidade : n6,precoKg : n7,precoUnidade : n8,valorTotal : n9},function (retorno){
     if(retorno != null){
       $("#res").val(retorno);
       //limpa o campo resultado quando o focus estiver sobre o campo comercio
       limpar_caixaDeTexto();

     }else{

       alert("Resultado vazio");
     }

      });
    });
  });






    
 
function calcular_resultado(){
//Converte todos os  campos para letra maiuscula
  var marca =  document.getElementById("marca").value;
  document.getElementById("marca").value = marca.toUpperCase();

  var setor =  document.getElementById("setor").value;
  document.getElementById("setor").value = setor.toUpperCase();

  var comercio =  document.getElementById("comercio").value;
  document.getElementById("comercio").value = comercio.toUpperCase();

  var produto =  document.getElementById("produto").value;
  document.getElementById("produto").value = produto.toUpperCase();


//pega o campo quantidade e multiplica pelo campo precoUnidade e joga o resultado no campo valorTotal
  var a = document.getElementById("quantidade").value;
  var b = document.getElementById("precoUnidade").value;
 document.getElementById("valorTotal").value = a * b;

 
 
}

function limpar_caixaDeTexto(){
document.getElementById("quantidade").value = null;
document.getElementById("precoUnidade").value = null;
document.getElementById("valorTotal").value = null;
document.getElementById("comercio").value = null;
document.getElementById("setor").value = null;
document.getElementById("produto").value = null;
document.getElementById("precoUnidade").value = null;
document.getElementById("precoKg").value = null;
document.getElementById("marca").value = null;
//document.getElementById("res").value = null;


}
 

 function limpar_resultado(){

  document.getElementById("res").value = null;
 }


function validar_data_compra(){
var data = document.getElementById("dataDaCompra").value;
if (data == "") {
   document.getElementById("dataDaCompra").focus();
   alert("POR FAVOR , PREENCHA O CAMPO DATA DA COMPRA");
}else{
  console.log("ativou o else")
}
 



}


 