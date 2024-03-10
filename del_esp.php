<?php
    session_start();
    include_once('conexao.php');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $result = "SELECT * FROM especialidade WHERE id = '$id'";
    $resultado = mysqli_query($con, $result);
    $row = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Excluir Especialidade</title>
</head>
<body>
    <h1>Excluir Especialidade</h1>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form action="proc_del_esp.php" method="post">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <label for="nome">
            Especialidade: 
            <p>
                <input type="text" name="nome" id="nome" value="<?= $row['descricao']; ?>" readonly><br><br>
            </p>
        </label>
        <p><input type="submit" value="Confirmar Exclusão"></p>
    </form>
</body>
</html>