<?php
    session_start();
    include_once("conexao.php");

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $verif = "SELECT * FROM medico WHERE id_espe = '$id'";
    $resu = mysqli_query($con, $verif);

    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color: orange;'>A especialidade selecionada não pode ser excluída, pois existe médico cadastrado!</p>";
        header("Location: alter_esp.php");
    } else {
        $result = "DELETE FROM especialidade WHERE id = '$id'";
        $resultado = mysqli_query($con, $result);

        if (mysqli_affected_rows($con)) {
            $_SESSION['msg'] = "<p style='color: green;'>Especialidade excluída com sucesso.</p>";
            header("Location: alter_esp.php");
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Não foi possível excluir a especialidade.</p>";
            header("Location: edit_esp.php?id=$id");
        }
    }
?>