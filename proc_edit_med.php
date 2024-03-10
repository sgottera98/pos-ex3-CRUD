<?php
    session_start();
    include_once("conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $id_espe = $_POST['id_espe'];
    $crm = $_POST['crm_number'];
    $salario = $_POST['salario'];

    $result = "UPDATE medico SET nome = '$nome', id_espe = '$id_espe', crm = '$crm', salario = '$salario' WHERE id_medico = '$id'";
    $resultado = mysqli_query($con, $result);

    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color: green;'>Médico alterado com SUCESSO!</p>";
        header("Location: alter_med.php");
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Não foi possível alterar o médico.</p>";
        header("Location: edit_med.php?id=$id");
    }
?>