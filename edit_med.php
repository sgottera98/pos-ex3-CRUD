<?php
session_start();
include_once('conexao.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result = "SELECT * FROM medico WHERE id_medico = '$id'";
$resultado = mysqli_query($con, $result);
$row = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Médico</title>
</head>

<body>
    <h1>Alteração - Médico</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="proc_edit_med.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id_medico']; ?>">
        <label for="nome">
            Médico:
            <p>
                <input type="text" name="nome" id="nome" value="<?= $row['nome']; ?>"><br><br>
            </p>
        </label>
        <label for="id_espe">
            Especialidade:
            <p>
                <select name="id_espe" id="id_espe">
                    <?php
                    include("conexao.php");
                    $query = 'SELECT * FROM especialidade ORDER BY descricao;';
                    $resu = mysqli_query($con, $query) or die(mysqli_connect_error());
                    while ($reg = mysqli_fetch_array($resu)) {
                        if ($reg['id'] == $row['id_espe']) {
                            echo "<option selected value=$reg[id]> $reg[descricao] </option>";
                        } else {
                            echo "<option value=$reg[id]> $reg[descricao] </option>";
                        }
                    ?>
                    <?php
                    }
                    mysqli_close($con);
                    ?>
                </select>
            </p>
        </label>
        <label for="crm">
            CRM nº:
            <p>
                <input type="text" name="crm_number" id="crm" size="20" maxlength="20" value="<?= $row['crm']; ?>">
            </p>
        </label>
        <label for="salario">
            Salário:
            <p>
                <input type="number" name="salario" id="salario" min="0" max="30000" step="100" value="<?= $row['salario']; ?>">
            </p>
        </label>
        <p><input type="submit" value="Salvar"></p>
    </form>
</body>

</html>