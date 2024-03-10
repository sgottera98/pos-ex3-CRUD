<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">    
    <title>Especialidades Médicas</title>
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
            <h1>Especialidades Médicas</h1>
        </p>
        <table style="border: 1px solid black; width: 100%;">
            <?php
                include('conexao.php');
                $sql = "SELECT * FROM especialidade ORDER BY descricao";
                $resu = mysqli_query($con, $sql) or die(mysqli_connect_error());
                while ($reg = mysqli_fetch_array($resu)) {
                    echo "<tr style='border: 1px solid black; text-align: center;'><td style='border: 1px solid black;'>" . $reg['descricao'] . "</td>";
                    echo "<td style='border: 1px solid black;'><a href='edit_esp.php?id=" . $reg['id'] . "'>Editar</a></td>";
                    echo "<td style='border: 1px solid black;'><a href='del_esp.php?id=" . $reg['id'] . "'>Excluir</a></td></tr>";
                }
            ?>
        </table>
    </form>
    <?php
        mysqli_close($con);
    ?>
</body>
</html>