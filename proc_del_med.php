<?php
    session_start();
    include_once("conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $verif = "SELECT * FROM medico WHERE id_medico = '$id'";
    $resu = mysqli_query($con, $verif);

    $result = "DELETE FROM medico WHERE id_medico = '$id'";
    $resultado = mysqli_query($con, $result);

    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color: green;'>Médico excluído com sucesso.</p>";
        header("Location: alter_med.php");
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Não foi possível excluir o médico.</p>";
        header("Location: edit_med.php?id=$id");
    }
?>