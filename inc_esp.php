<?php
    $nome=$_POST['nome'];
    include('conexao.php');

    $query= "INSERT INTO especialidade (descricao) VALUES ('$nome')";
    $resu= mysqli_query ($con,$query);
    If (mysqli_insert_id($con)){
        print "<br> Inclusão realizada com sucesso!";
    }

    mysqli_close($con);

?>
<br>
<a href="index.html">Voltar à home</a>