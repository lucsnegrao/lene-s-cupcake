<?php

    if (!empty($_GET['id'])) {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id_usuario=$id";

        $result = $conexao->query($sqlSelect);

        if ($result->num_rows > 0) {
            while ($user_data = mysqli_fetch_assoc($result)) {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $senha = $user_data['senha'];        
            }
        } else {
            header('Location: sistema.php');
        }
    } else {
        header('Location: sistema.php');
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupcakes da Lene</title>
    
    <link rel="icon" href="img/icon.png">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="index.html"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">Sobre</a></li>
                <li><a href="contact.html">Contato</a></li>
                <li><a class="active" href="sistema.php">Minha Conta</a></li>
                <li id="lg-bag"><a href="cart.html"><i class="far fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="form-account">
        <form action="saveEdit.php" method="POST">
            <h2>Editar conta</h2>
            <input type="text" name="name" id="name" placeholder="Nome Completo" maxlength="50" value="<?php echo $nome ?>" required>
            <input type="email" name="email" id="email" placeholder="E-mail" maxlength="50" value="<?php echo $email ?>" required>
            <input type="password" name="senha" id="senha" placeholder="Senha" maxlength="15" value="<?php echo $senha ?>" required>
            <input type="password" name="senhaconf" id="senhaconf" placeholder="Confirmar Senha" maxlength="15" value="<?php echo $senha ?>" required>
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="submit" id="update" name="update" value="Alterar">
            <br>
        </form>
    </section>
    
        <div class="copyright">
            <p>Doces da Lene LTDA - CNPJ: 01.234.567/0001-89 © Todos os direitos reservados. 2024</p>
        </div>
    </footer>


    <script src="script.js"></script>
</body>

</html>
