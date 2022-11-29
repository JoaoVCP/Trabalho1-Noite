<?php

    $titulo = "Resultados";
    include "conexao.php";
    include "cabecalho.php";

    $pontuação = 0;
    error_reporting(0);
?> 

<br>
<main class="container" id="corpo">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
        <h1 class="mt-2 text-center" style="font-family: 'Great Vibes', cursive; font-size: 100px;"><strong>Simulado</strong></h1>
        <p class="text-center">Confira como foi o resultado da sua prova: </p></div>
    </div>

<?php 
    foreach ($_POST as $id => $parametro) {
        $query = "SELECT * FROM questoes WHERE id = " . $id;
        $resultado = mysqli_query($conexao, $query);
        $count = count($_POST);
        $i += $count - 10;
?>

<?php
    while($linha = mysqli_fetch_array($resultado)){
        ?>    
            <div class='card mt-3 ml-3'>
                <div class='card-header'><strong><h2><?php echo $i . " - " . $linha["pergunta"]; ?> </strong>
            </div></div>
            <div class='card-body'><p>
                    <?php
                    if (strtolower($linha["correta"]) == $_POST[$id]) {
                    ?>
                        <div class="card-text alert alert-success">
                            <img src="./img/right.png" style="width: 50px"><strong> VOCÊ ACERTOU! </strong> Resposta Correta - <?php echo strtoupper($_POST[$id]) . " )" . $linha[strtolower($linha["correta"])]; ?>
                        </div>
                    <?php
                        $pontuação++;
                    } else { ?>
                        <div class="card-text alert alert-danger">
                            <img src="./img/wrong.png" style="width: 50px"> <strong> VOCÊ ERROU! </strong> Sua resposta - <?php echo strtoupper($_POST[$id]) . ") " . $linha[$_POST[$id]]; ?>
                        </div>
                        <div class="card-text alert alert-success">
                            <img src="./img/right.png" style="width: 50px"> Resposta Correta - <?php echo $linha["correta"] . ") " . $linha[strtolower($linha["correta"])]; ?>
                        </div>
            </div>
        </div>
        <br>
<?php
                    }
    }
}
?>
<br>
<div class="justify-content-center" style="background-color: #dc3545; color: white; border-radius: 5px 5px 5px 5px;">
    <div style="width:100%; height: 150px;" class="align-items-center justify-content-center d-flex text" >
        <img src="./img/score.png" style="width:75px;"><strong style="font-size: 50px;"><?php echo "Pontuação do simulado: " . $pontuação . "/" . ($count - 1) ?></strong>
    </div>
</div>