<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco";


//Conexao com o banco de dados mysql , a conexao sera armazenada em uma variavel chamada $conn
$conn = mysqli_connect($servername, $username, $password, $dbname);

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 => 'id',
	1 =>'dataDaCompra', 
	2 => 'comercio',
	3=> 'setor',
	4=> 'produto',
	5=> 'marca',
	6=> 'quantidade',
	7=>'precoKg',
	8=> 'precoUnidade',
	9=>'valorTotal'

);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT id,dataDaCompra,comercio,setor,produto,marca,quantidade,precoKg,precoUnidade,valorTotal FROM compra";
//Passamos por parametro a conexao e a sql para pesquisar no banco de dados , o dados do resultado da pesquisa sera armazenado na variavel 
//resultado_user
$resultado_user =mysqli_query($conn, $result_user);
//Aqui verificamos quantas linhas o dados da pesquisa possuem
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT id,dataDaCompra,comercio,setor,produto,marca,quantidade,precoKg,precoUnidade,valorTotal FROM compra WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( id LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR comercio LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR dataDaCompra LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR setor LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR produto LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR marca LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR quantidade LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR precoKg LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR precoUnidade LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR valorTotal LIKE '".$requestData['search']['value']."%' )";
}

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["id"];
	$dado[] = $row_usuarios["dataDaCompra"];
	$dado[] = $row_usuarios["comercio"];
	$dado[] = $row_usuarios["setor"];	
	$dado[] = $row_usuarios["produto"];	
	$dado[] = $row_usuarios["marca"];
	$dado[] = $row_usuarios["quantidade"];
	$dado[] = $row_usuarios["precoKg"];
	$dado[] = $row_usuarios["precoUnidade"];
	$dado[] = $row_usuarios["valorTotal"];					
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
