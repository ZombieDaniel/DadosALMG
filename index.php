<?php

ini_set('max_execution_time', 300);

$ch = curl_init(
    "http://dadosabertos.almg.gov.br/ws/legislaturas/18/deputados/em_exercicio?formato=json"
);
curl_setopt($ch, CURLOPT_HTTPGET, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonarray = curl_exec($ch);

curl_close($ch);

$deputadosExercicio = json_decode($jsonarray, true);


$ch = curl_init(
    "http://dadosabertos.almg.gov.br/ws/legislaturas/18/deputados/que_exerceram_mandato?formato=json"
);
curl_setopt($ch, CURLOPT_HTTPGET, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonarray = curl_exec($ch);

curl_close($ch);

$deputadosExerceram = json_decode($jsonarray, true);

//

$ch = curl_init(
    "http://dadosabertos.almg.gov.br/ws/legislaturas/18/deputados/que_renunciaram?formato=json"
);
curl_setopt($ch, CURLOPT_HTTPGET, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonarray = curl_exec($ch);

curl_close($ch);

$deputadosRenunciaram = json_decode($jsonarray, true);

//

$ch = curl_init(
    "http://dadosabertos.almg.gov.br/ws/legislaturas/18/deputados/que_se_afastaram?formato=json"
);
curl_setopt($ch, CURLOPT_HTTPGET, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonarray = curl_exec($ch);

curl_close($ch);

$deputadosAfastaram = json_decode($jsonarray, true);

//

$ch = curl_init(
    "http://dadosabertos.almg.gov.br/ws/legislaturas/18/deputados/que_perderam_mandato?formato=json"
);
curl_setopt($ch, CURLOPT_HTTPGET, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonarray = curl_exec($ch);

curl_close($ch);

$deputadosPerderam = json_decode($jsonarray, true);

//


$ch = curl_init(
    "http://dadosabertos.almg.gov.br/ws/deputados/lista_telefonica?formato=json"
);
curl_setopt($ch, CURLOPT_HTTPGET, true);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$jsonarray = curl_exec($ch);

curl_close($ch);

$redesSociais = json_decode($jsonarray, true);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dados de Deputados</title>
    <link rel="stylesheet" type="text/css" href = "./estilo.css">
</head>
<body>
    <div class="header">
            <ul class="menu">
                <a href="./home.php">Home</a>
                <a href="./midia.php">Redes Sociais</a>
                <a href="./consulta.php">Deputados</a>
                <a href="./verba.php">Ranking de Verbas</a>
            </ul>
    </div>


</body>
</html>




