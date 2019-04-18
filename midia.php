<?php

include './index.php';
include './bd.php';

$contador = @count($redesSociais['list']);
$k = 0;
for($i = 0; $i < $contador; $i++){
    $contador1 = @count($redesSociais['list'][$i]['redesSociais']);
    for($j = 0; $j < $contador1; $j++){
        $nomeRedeSocial[$k] = $redesSociais['list'][$i]['redesSociais'][$j]['redeSocial']['nome'];
        $k++;
    }
}
$select = $db->querySingle("SELECT idRedeSocial FROM redeSocial");

if($select == 0){
    for($i = 0; $i < $k; $i++){
        $db->exec("INSERT INTO redeSocial(nome) VALUES(
            '$nomeRedeSocial[$i]'
            )");
    }
}

?>
<!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" type="text/css" href = "./estilo.css">
    </head>
    <body>
        <h3>Ranking das redes sociais mais utilizadas dentre os deputados, ordenado de forma decrescente.</h3>
        <div class="container">
            <div id="conteudo">
            <table>
            <tr>
            <th>Nome</th>
            <th>QUANTIDADE DE USUÁRIOS</th>
            </tr>
    <?php
    $resultadoRedesSociais = $db->query("SELECT nome, COUNT(nome) as 'quant' FROM redeSocial GROUP BY nome ORDER BY COUNT(nome) DESC");
    while ($row = $resultadoRedesSociais->fetchArray()) {
        $redeSocialNome = json_encode($row['nome'], JSON_UNESCAPED_UNICODE);
        $redeSocialNumero = json_encode($row['quant'], JSON_UNESCAPED_UNICODE);
        echo 
           "<tr>
           <td>{$redeSocialNome}</td>
           <td>{$redeSocialNumero}</td>
           </tr>";
    }