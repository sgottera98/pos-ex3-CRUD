<?php
    session_start();
    include_once("conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $verif = "SELECT * FROM paciente WHERE cpf = '$id'";
    $resu = mysqli_query($con, $verif);

    $result = "DELETE FROM paciente WHERE cpf = '$id'";
    $resultado = mysqli_query($con, $result);

    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color: green;'>Paciente excluído com sucesso.</p>";
        header("Location: alter_pac.php");
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Não foi possível excluir o paciente.</p>";
        header("Location: edit_pac.php?id=$id");
    }
?>