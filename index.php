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
                <a href="index.php">Home</a>
                <a href="./midia.php">Redes Sociais</a>
                <a href="./consulta.php">Deputados</a>
                <a href="./verba.php">Ranking de Verbas</a>
            </ul>
    </div>
    <div class="container">
            <div id="conteudo">
            <h2>Projeto API Dados Abertos da ALMG.</h2>
            <br><br>
            <h3>O que é o Sistema de Dados Abertos da ALMG?</h3>
            <p>O Sistema de Webservices da ALMG, cuja sigla é ws, é composto por um conjunto de recursos web cujos 
            acessos tentam, sempre que possível, atender aos ideais e ao conjunto de melhores práticas REST.
            Outra forma de definir o ws seria como uma API REST. Possui uma API que retorna diversos tipos de POX 
            através do HTTP.<br></p>

            <h3>Por que utiliza-lo?</h3>
            <p>Com esse sistema é possível acessar dados públicos sobre deputados, como: qual seu email, qual legislatura 
                ele participou e várias outras informações bacanas.
                Além de tudo isso, podemos saber como o dinheiro do nosso estado está sendo gasto.</p>


</body>
</html>




