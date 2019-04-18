<?php

include './index.php';
include './bd.php';
ob_start();
include './consulta.php';
$conteudo = ob_get_contents();
ob_end_clean();

for($i = 0; $i < $cont04; $i++){
    $ch1 = curl_init(
        'http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/'.$idDeputado[$i].'/2017/12?formato=json'
    );
    curl_setopt($ch1, CURLOPT_HTTPGET, true);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    $jsonarray1 = curl_exec($ch1);
    $dataVerba[$i][12] = json_decode($jsonarray1, true);
}
curl_close($ch1);
for($i = 0; $i < $cont04; $i++){
    $contador5 = @count($dataVerba[$i][12]['list']);
    for($j = 0; $j < $contador5; $j++){
        $valorVerba[$i][$j] = $dataVerba[$i][12]['list'][$j]['valor'];
    }
}
$select = $db->querySingle("SELECT idVerba FROM verbas WHERE mes = 'Dezembro'");

if($select == 0){
    for($i = 0; $i < $cont04; $i++){
        $contador6 = @count($valorVerba[$i]);
        for($j = 0; $j < $contador6; $j++){
            $verbaDb = json_decode($valorVerba[$i][$j], true);
            $db->exec("INSERT INTO verbas(valor, mes, idDeputado) VALUES(
                    '$verbaDb',
                    'Dezembro',
                    '$idDeputado[$i]'
                )");
        }
    }
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href = "./estilo.css">
    </head>
    <body>
        <div class="container">
            <div id="conteudo">
                <h3> Esses são os 5 deputados que mais gastaram de suas verbas indenizatórias durante o mês de dezembro. </h3>
            <table>
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Valor</th>
            </tr>
    <?php
    $resultadoRedesSociais = $db->query("SELECT verbas.idDeputado, deputados.nome, SUM(valor) as 'quant' 
        FROM verbas
        INNER JOIN deputados ON verbas.idDeputado = deputados.idDeputado
        GROUP BY verbas.idDeputado
        ORDER BY SUM(valor) DESC
        LIMIT 5");
    while ($row = $resultadoRedesSociais->fetchArray()) {
        $idDeputado = json_encode($row['idDeputado'], JSON_UNESCAPED_UNICODE);
        $nomeDeputado = json_encode($row['nome'], JSON_UNESCAPED_UNICODE);
        $valor = json_encode($row['quant'], JSON_UNESCAPED_UNICODE);
        echo 
           "<tr>
           <td>{$idDeputado}</td>
           <td>{$nomeDeputado}</td>
           <td>{$valor}</td>
           </tr>";
    }
