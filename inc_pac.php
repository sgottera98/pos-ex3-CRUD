<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $data_nasc = $_POST['data_nasc'];

    include('conexao.php');

    $query = "INSERT INTO paciente (cpf, rg, nome, rua, numero, data_nasc) VALUES ('$cpf', '$rg', '$nome', '$rua', '$numero', '$data_nasc')";
    $resu = mysqli_query($con, $query);

    if (mysqli_insert_id($con)) {
        $_SESSION['msg'] = "<p style='color: blue;'>Paciente cadastrado com sucesso!</p>";
        header('Location: paciente.php');
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Não foi possível cadastrar o paciente.</p>";
        header('Location: paciente.php');
    }

    mysqli_close($con);

?>