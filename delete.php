<?php

    if (!empty($_GET['id'])) {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id_usuario=$id";

        $result = $conexao->query($sqlSelect);

        if ($result->num_rows > 0) {
            while ($user_data = mysqli_fetch_assoc($result)) {
                $sqlDelete = "DELETE FROM usuarios WHERE id_usuario=$id";
                $resultDelete = $conexao->query($sqlDelete);
            }
        }
    }
    header('Location: sistema.php')

?>