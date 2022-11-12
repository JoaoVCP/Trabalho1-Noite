<?php

include "conexao.php";
include "cabecalho.php";

if( isset ($_POST) && !empty($_POST) ){
    $pergunta = $_POST["pergunta"];
    $a = $_POST["A"];
    $b = $_POST["B"];
    $c = $_POST["C"];
    $d = $_POST["D"];
    $e = $_POST["E"];
    $correta = $_POST["correta"];

    $query = "insert into questoes (pergunta, a, b, c, d, e, correta)";
    $query = $query." values('$pergunta', '$a', '$b', '$c', '$d', '$e', '$correta')";
    $resultado = mysqli_query($conexao, $query);
}
?>

<br>
<form action="./index.php" method="post">

<div class="card" style="width: 18rem;">
  <div class="card-header">
    <label><h3>Questão</h3></label><br>
    <textarea name="pergunta" style="border-radius: 5px 5px 5px 5px" placeholder="Insira o enunciado da questão"></textarea>

    <br><br>

    <label>A)</label>
    <input input class="form-check-input" type="radio" name="correta" value="A"/>
    <input type="text" name="A" style="border-radius: 5px 5px 5px 5px" placeholder="Insira o texto da opção A"/>

    <br><br>

    <label>B)</label>
    <input input class="form-check-input" type="radio" name="correta" value="B"/>
    <input type="text" name="B" style="border-radius: 5px 5px 5px 5px" placeholder="Insira o texto da opção B"/>

    <br><br>

    <label>C)</label>
    <input input class="form-check-input" type="radio" name="correta" value="C" />
    <input type="text" name="C" style="border-radius: 5px 5px 5px 5px" placeholder="Insira o texto da opção C"/>

    <br><br>

    <label>D)</label>
    <input input class="form-check-input" type="radio" name="correta" value="D" />
    <input type="text" name="D" style="border-radius: 5px 5px 5px 5px" placeholder="Insira o texto da opção D"/>

    <br><br>

    <label>E)</label>
    <input input class="form-check-input" type="radio" name="correta" value="E" />
    <input type="text" name="E" style="border-radius: 5px 5px 5px 5px" placeholder="Insira o texto da opção E"/>

    <br><br>

    <button type="button" class="btn btn-success">Salvar Pergunta</button>

    </form>
    </div>
</div>

<br>

<?php

    $query = "select * from questoes order by id desc"; //traz todas as questoes de cima para baixo e desc de decrescente, o * é de all (todas)
    $resultado = mysqli_query($conexao, $query);

    while($linha = mysqli_fetch_array($resultado)){
        ?>
            <div style="width:100%; border: 1px solid;">
                <h1> <?php echo $linha["pergunta"]; ?> </h1>
                <h3> <?php echo $linha["a"]; ?> </h3>
                <h3> <?php echo $linha["b"]; ?> </h3>
                <h3> <?php echo $linha["c"]; ?> </h3>
                <h3> <?php echo $linha["d"]; ?> </h3>
                <h3> <?php echo $linha["e"]; ?> </h3>
            </div>
        <?php
    }

?>