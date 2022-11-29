<?php

$titulo = "Questões";
include "conexao.php";
include "cabecalho.php";

    $query = "select * from questoes order by rand() limit 10";
    $resultado = mysqli_query($conexao, $query) or die(mysqli_error($conexao));
    $total = mysqli_num_rows($resultado);

?>
<br>
<main class="container" id="corpo">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12">
        <h1 class="mt-2 text-center" style="font-family: 'Great Vibes', cursive; font-size: 100px;"><strong>Simulado</strong></h1>
        <p class="text-center">Responda as questões abaixo e envie o formulário clicando no botão ao final do teste para verificar pontuação. </p>
        <p class="text-center">Boa Sorte!</p>
        <form action="./resultado.php" method="POST" onsubmit="return checar()">
<?php
    $i = 0;
    while($linha = mysqli_fetch_array($resultado)){
        ?>    
            <div class='card mt-3 ml-3'>
                <div class='card-header'><strong><h2 class="text-justify"><?php echo $i + 1 . ' - ' . $linha["pergunta"]; ?> </strong>
            </div>
            <div class='card-body'><p>
                <input class="form-check-input" type="radio" name="<?php echo $linha["id"];?>" value="a" required/> A) <?php echo $linha['a'] ?>
                <br><br>
                <input class="form-check-input" type="radio" name="<?php echo $linha["id"];?>" value="b" required/> B) <?php echo $linha['b'] ?>
                <br><br>
                <input class="form-check-input" type="radio" name="<?php echo $linha["id"];?>" value="c" required/> C) <?php echo $linha['c'] ?>
                <br><br>
                <input class="form-check-input" type="radio" name="<?php echo $linha["id"];?>" value="d" required/> D) <?php echo $linha['d'] ?>
                <br><br>
                <input class="form-check-input" type="radio" name="<?php echo $linha["id"];?>" value="e" required/> E) <?php echo $linha['e'] ?>
            </p></div>
        </div>
        <?php
        $i = $i +1;
    }
    ?>
    <div class="container">
        <button type="submit" name="submit" class="m-4 align-self-center mx-auto btn btn-success" style="font-size: 25px;">Enviar Questionario</button>
    </div>
    </form>
    </div>
</div>