<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Gerenciador de Tarefas</h1>
    </header>
    <h2>Desafio Agencia Junior</h2>

    <form action="./controllers/processa_login.php" method="post">
        <h3>Formulario de Login</h3>

        <div class="conteiner">

            <div class="erro">
                <?php if(isset($mensagem)){
                    echo $mensagem;
                } ?>
            </div>

            <div class="formulario">
                <label for="email">Email: </label><br>
                <input type="email" id="email" name="email"><br><br>
        
                <label for="senha">Senha: </label><br>
                <input type="password" id="senha" name="senha"><br><br>
        
                <input type="submit" value="Entrar">
            </div>

        </div>

    </form>
    <p>Não possui uma conta?</p>
    <a href="?pagina=criar">Criar usuario</a>
</body>
</html>