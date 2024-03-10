<?php
session_start();
include_once('conexao.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM paciente WHERE cpf = '$id'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Paciente</title>
</head>

<body>
    <h1>Alteração - Paciente</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="proc_edit_pac.php" method="post">
        <input type="hidden" name="id" value="<?= $row['cpf']; ?>">
        <label for="nome">
            Paciente:
            <p>
                <input type="text" name="nome" id="nome" value="<?= $row['nome']; ?>"><br><br>
            </p>
        </label>
        <label for="rg">
            RG nº:
            <p>
                <input type="text" name="rg" id="rg" size="20" maxlength="20" value="<?= $row['rg']; ?>">
            </p>
        </label>
        <label for="rua">
            <p>
                Rua:
                <input type="text" name="rua" id="rua" min="0" value="<?= $row['rua']; ?>">
            </p>
        </label>
        <label for="numero">
            <p>
                Número:
                <input type="text" name="numero" id="numero" min="0" value="<?= $row['numero']; ?>">
            </p>
        </label>
        <label for="data_nasc">
            <p>
                Data de nascimento:
                <input type="date" name="data_nasc" id="data_nasc" min="0" value="<?= $row['data_nasc']; ?>">
            </p>
        </label>
        <p><input type="submit" value="Salvar"></p>
    </form>
</body>

</html>