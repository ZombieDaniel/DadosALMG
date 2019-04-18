<?php

include './index.php';
include './bd.php';

    $contador = @count($deputadosExercicio['list']);
    for($i = 0; $i < $contador; $i++){
        $idDeputado[$i] = $deputadosExercicio['list'][$i]['id'];
        $nomeDeputado[$i] = $deputadosExercicio['list'][$i]['nome'];
    }

    $contador1 = @count($deputadosExerceram['list']);
    for($i = 0; $i < $contador1; $i++){
        $idDeputado[$i + $contador] = $deputadosExerceram['list'][$i]['id'];
        $nomeDeputado[$i + $contador] = $deputadosExerceram['list'][$i]['nome'];
    }  

    if($contador1 === 0){
        $cont01 = $contador + 1;
    }else{
        $cont01 = $contador + $contador1;
    }

    $contador2 = @count($deputadosRenunciaram['list']);
    for($i = 0; $i < $contador2; $i++){
        $idDeputado[$i + $cont01] = $deputadosRenunciaram['list'][$i]['id'];
        $nomeDeputado[$i + $cont01] = $deputadosRenunciaram['list'][$i]['nome'];
    }


    if($contador2 === 0){
        $cont02 = $cont01 + 1;
    }else{
        $cont02 = $cont01 + $contador2;
    }

    $contador3 = @count($deputadosAfastaram['list']);
    for($i = 0; $i < $contador3; $i++){
        $idDeputado[$i + $cont02] = $deputadosAfastaram['list'][$i]['id'];
        $nomeDeputado[$i + $cont02] = $deputadosAfastaram['list'][$i]['nome'];
    }


    if($contador3 === 0){
        $cont03 = $cont02;
    }else{
        $cont03 = $cont02 + $contador3;
    }

    $contador4 = @count($deputadosPerderam['list']);
    for($i = 0; $i < $contador4; $i++){
        $idDeputado[$i + $cont03] = $deputadosPerderam['list'][$i]['id'];
        $nomeDeputado[$i + $cont03] = $deputadosPerderam['list'][$i]['nome'];
    }

    if($contador4 === 0){
        $cont04 = $cont03;
    }else{
        $cont04 = $cont03 + $contador4;
    }

    $select = $db->querySingle("SELECT idDeputado FROM deputados");

    if($select == 0){
        for($i = 0; $i < $cont04; $i++){
            $db->exec("INSERT INTO deputados(idDeputado, nome) VALUES(
                '$idDeputado[$i]',
                '$nomeDeputado[$i]'
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
        <h3> Lista de deputados que participaram da legislatura 18. 
            (data de início: 2015-02-01 e data de término: 2019-01-31).</h3>
        <div class="container">
            <div id="conteudo">
            <table>
            <tr>
            <th>ID</th>
            <th>NOME</th>
            </tr>
    <?php
    $resultadoDeputados = $db->query("SELECT idDeputado, nome FROM deputados ORDER BY nome");
    while ($row = $resultadoDeputados->fetchArray()) {
        $infoDeputado = json_encode($row['idDeputado'], JSON_UNESCAPED_UNICODE);
        $infoDeputadoJson = json_encode($row['nome'], JSON_UNESCAPED_UNICODE);
        echo 
           "<tr>
           <td>{$infoDeputado}</td>
           <td>{$infoDeputadoJson}</td>
           </tr>";
    }
    ?>

    

    
   

