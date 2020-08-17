$(document).ready(function() {
      $('#btn').click(function(){
      var n1 = $("#deletar").val();
      $.post('deletar_cadastro.php',{deletar : n1},function (retorno){
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






    
 

 

 function limpar_resultado(){

  document.getElementById("res").value = null;
 }





 