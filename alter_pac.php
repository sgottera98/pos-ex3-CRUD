<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">    
    <title>Paciente</title>
</head>
<body>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form action="" method="post">
        <p style="text-align: center;">
            <h1>Paciente</h1>
        </p>
        <table style="border: 1px solid black; width: 100%;">
            <?php
                include('conexao.php');
                $sql = "SELECT * FROM paciente ORDER BY nome";
                $resu = mysqli_query($con, $sql) or die(mysqli_connect_error());
                while ($reg = mysqli_fetch_array($resu)) {
                    echo "<tr style='border: 1px solid black; text-align: center;'><td style='border: 1px solid black;'>" . $reg['nome'] . "</td>";
                    echo "<td style='border: 1px solid black;'><a href='edit_pac.php?id=" . $reg['cpf'] . "'>Editar</a></td>";
                    echo "<td style='border: 1px solid black;'><a href='del_pac.php?id=" . $reg['cpf'] . "'>Excluir</a></td></tr>";
                }
            ?>
        </table>
    </form>
    <?php
        mysqli_close($con);
    ?>
</body>
</html>