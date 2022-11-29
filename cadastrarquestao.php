
<?php

$titulo = "Cadastro de questão";
include "conexao.php";
include "cabecalho.php";

if( isset ($_POST) && !empty($_POST) ){
    $id = $_POST["id"];
    $pergunta = $_POST["pergunta"];
    $a = $_POST["A"];
    $b = $_POST["B"];
    $c = $_POST["C"];
    $d = $_POST["D"];
    $e = $_POST["E"];
    $correta = $_POST["correta"];

    $query = "insert into questoes (id, pergunta, a, b, c, d, e, correta)";
    $query = $query." values('$id','$pergunta', '$a', '$b', '$c', '$d', '$e', '$correta')";
    $resultado = mysqli_query($conexao, $query);
}

?>

<br>
<main class="container" id="corpo">
<div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12">
    <h1 class="mt-2 text-center" style="font-family: 'Great Vibes', cursive; font-size: 100px;"><strong>Simulado</strong></h1>
    <p class="text-center">Cadastre uma nova questão: </p></div>
</div>
</main>

<div class="container">
<div class="row">
<div class="col-md-8 offset-md-2 col-sm-12">
<br>
<form action="./index.php" method="post">

<label>Pergunta</label>
<textarea name="pergunta"></textarea>

<br><br>

<label>A)</label>
<input type="radio" name="correta" value="A" />
<input type="text" name="A" />

<br><br>

<label>B)</label>
<input type="radio" name="correta" value="B" />
<input type="text" name="B" />

<br><br>

<label>C)</label>
<input type="radio" name="correta" value="C" />
<input type="text" name="C" />

<br><br>

<label>D)</label>
<input type="radio" name="correta" value="D" />
<input type="text" name="D" />

<br><br>

<label>E)</label>
<input type="radio" name="correta" value="E" />
<input type="text" name="E" />

<br><br>

<button type="submit" name="submit" class="m-4 align-self-center mx-auto btn btn-success" style="font-size: 25px;">Salvar Pergunta</button>

</form>

</div>
</div>
</div>
<br>
