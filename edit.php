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
    
    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contato</h4>
            <p><strong>Endereço: </strong>Centro de Macapá</p>
            <p><strong>Telefone:</strong>(+55) 96 99123 4567</p>
            <p><strong>Horário de funcionamento:</strong> 10:00 - 18:00, Seg - Sab</p>
            <div class="follow">
                <h4>Siga-nos</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>Sobre</h4>
            <a href="#">Sobre Nós</a>
            <a href="#">Entregas</a>
            <a href="#">Politica de Privacidade</a>
            <a href="#">Termos e Condições</a>
            <a href="#">Entre em contato</a>
        </div>

        <div class="col">
            <h4>Minha Conta</h4>
            <a href="#">Login</a>
            <a href="#">Carrinho</a>
            <a href="#">Lista de Desejo</a>
            <a href="#">Fazer seu pedido</a>
            <a href="#">Ajuda</a>
        </div>

        <div class="col install">
            <h4>Instale nosso App</h4>
            <p>App Store ou Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Formas de Pagamento </p>
            <img src="img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>Doces da Lene LTDA - CNPJ: 01.234.567/0001-89 © Todos os direitos reservados. 2024</p>
        </div>
    </footer>


    <script src="script.js"></script>
</body>

</html>