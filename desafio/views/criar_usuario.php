<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Gerenciador de tarefas</h1>
    </header>
    <h2>Desafio Agencia Junior</h2>

    <form action="./controllers/salvar_usuario.php" method="post">
        <h2>Criar Novo Usuario</h2>

        <div class="formulario">
            <label for="nome">Nome: </label><br>
            <input type="text" id='nome' name='nome'><br><br>
    
            <label for="email">Email: </label><br>
            <input type="email" id="email" name="email"><br><br>
    
            <label for="senha">Senha: </label><br>
            <input type="password" id="senha" name="senha"><br><br>
    
            <input type="submit" value="Entrar">
        </div>

    </form>

    <div>
        <a class="btn" href="?pagina=login">Voltar</a>
    </div>
</body>
</html>