<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Médicos</title>
</head>
<body>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <p><h1>Médicos - Inclusão</h1></p>
    <form action="inc_med.php" method="post">
        <label for="nome">
            Nome: 
            <input type="text" name="nome" id="nome" size="80" maxlength="100" required>
        </label>
        <p><label for="crm">
            CRM nº: 
            <input type="text" name="crm" id="crm" size="20" maxlength="20" required>
        </label></p>
        <p><label for="salario">
            Salário: 
            <input type="number" name="salario" id="salario" min="0" max="30000" step="100" required>
        </label></p>
        <p><label for="id_espe">
            Especialidade: 
            <select name="id_espe" id="id_espe">
        
            <?php
                include("conexao.php");
                $query = 'SELECT * FROM especialidade ORDER BY descricao;';
                $resu = mysqli_query($con, $query) or die(mysqli_connect_error());
                while ($reg = mysqli_fetch_array($resu)) {
            ?>
                <option value="<?php echo $reg['id'];?>"> <?php echo $reg['descricao'];?> </option>
            <?php
                }
                mysqli_close($con);
            ?>
            </select>
        </label></p>
        <p><input type="submit" value="Enviar"></p>
        <p><input type="reset" value="Limpar"></p>    
    </form>
    <br>
    <a href="index.html">Voltar à home</a>
    
</body>
</html>