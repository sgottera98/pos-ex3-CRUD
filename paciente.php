<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pacientes</title>
</head>
<body>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <p><h1>Pacientes - Inclusão</h1></p>
    <form action="inc_pac.php" method="post">
        <label for="nome">
            Nome: 
            <input type="text" name="nome" id="nome" size="80" maxlength="100" required>
        </label>
        <p><label for="cpf">
            CPF: 
            <input type="text" name="cpf" id="cpf" size="20" maxlength="20" required>
        </label></p>
        <p><label for="rg">
            RG: 
            <input type="text" name="rg" id="rg" size="20" maxlength="20" required>
        </label></p>
        <p><label for="rua">
            Rua: 
            <input type="text" name="rua" id="rua" min="0" required>
        </label></p>
        <p><label for="numero">
            Número: 
            <input type="text" name="numero" id="numero" min="0" required>
        </label></p>
        <p><label for="data_nasc">
            Data de nascimento: 
            <input type="date" name="data_nasc" id="data_nasc" min="0" required>
        </label></p>
        
        <p><input type="submit" value="Enviar"></p>
        <p><input type="reset" value="Limpar"></p>    
    </form>
    <br>
    <a href="index.html">Voltar à home</a>
    
</body>
</html>