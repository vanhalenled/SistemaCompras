<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Economia Domestica</title>
  <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript">
  $(document).ready(function() {
      $('#listar-usuario').DataTable({      
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": "proc_pesq_user.php",
          "type": "POST"
        }
      });
    } );


  


    function listar(){
      $(document).ready(function() {
      $('#listar-usuario').DataTable({      
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": "listar_por_data.php",
          "type": "POST"
        }
      });
    } );




    }



    </script>
</head>

<body>
<div id="main" >
	       <div id="logo">
		    <div class="logo_imagem"><a href="index.php"><img src="logo.png" height="40" width="65"></a></div>
		    <div class="logo_texto"><h2>Sistema Economia Domestica</h2></div>
		    <div  class="logo_menu">1.7</div>
	       </div>

    <div id="central">
    
           <div id="barra_lateral">
            <div class="barra_lateral_links">

             




            	  <ul>
                  <li><h2><a href="cadastrar.html">Cadastrar</a></h2></li>
                  <li><h2><a href="index.php">Listar</a></h2></li>
                  <li><h2><a href="index.php">Incluir</a></h2> </li>
                  <li><h2><a href="deletar.html">Deletar</a></h2>    </li>
                  </ul>




            </div>

           

           </div>

           <div id="barra_central_cima">
           
           <div class="formulario_pesquisa">
             <form>
               <label>De:</label><input type="date" name="periodo1"><label>Até</label><input type="date" name="periodo1"><label>---</label>
               <input onclick="listar()"   type="submit" name="pesquisar" value="Pesquisar">

             </form>

           </div>



           
         </div>

           <div id="barra_central">
             
<table   id="listar-usuario" class="display" style="width:100%">
      <thead>
        <tr>
        <th>ID</th>
          <th>Data Compra</th>
          <th>Comercio</th>
          <th>Setor</th>
          <th>Produto</th>
          <th>Marca</th>
          <th>Quant</th>
          <th>PrecoKg</th>
          <th>PrecoUnid</th>
          <th>Total</th>
        
        </tr>
      </thead>
    </table>





           </div>

    </div>
     
 </div>





</body>
</html>