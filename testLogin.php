<?php
    session_start();

    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        include_once('config.php');

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        $user_data = mysqli_fetch_assoc($result);
        
        if ($user_data['id_usuario'] == 1) {
            header('Location: sistema.php');
        } elseif (mysqli_num_rows($result) < 1) {            
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: account.php');
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: welcome.php');
        }        
    } else {
        header('Location: account.php');
    }

?>