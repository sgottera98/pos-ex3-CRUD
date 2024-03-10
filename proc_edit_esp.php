<?php
    session_start();
    include_once("conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $result = "UPDATE especialidade SET descricao = '$nome' WHERE id = '$id'";
    $resultado = mysqli_query($con, $result);

    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color: green;'>Especialidade alterada com SUCESSO!</p>";
        header("Location: alter_esp.php");
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Não foi possível alterar a especialidade.</p>";
        header("Location: edit_esp.php?id=$id");
    }
?>