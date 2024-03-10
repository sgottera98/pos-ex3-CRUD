<?php
    session_start();
    include_once("conexao.php");

    $cpf = $_POST['id'];
    $nome = $_POST['nome'];
    $rg = $_POST['rg'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $data_nasc = $_POST['data_nasc'];

    $result = "UPDATE paciente SET rg = '$rg', nome = '$nome', rua = '$rua', numero = '$numero', data_nasc = '$data_nasc' WHERE cpf = '$cpf'";
    $resultado = mysqli_query($con, $result);
    
    if (mysqli_affected_rows($con)) {
        $_SESSION['msg'] = "<p style='color: green;'>Paciente alterado com SUCESSO!</p>";
        header("Location: alter_pac.php");
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Não foi possível alterar o paciente.</p>";
        header("Location: edit_pac.php?id=$cpf");
    }
?>