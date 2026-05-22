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

    <h2>Cadastrar Nova Tarefa</h2>

    <form action="./controllers/salvar_tarefa.php" method="post">
        
        <div class="formulario">
            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario']['id'] ?>">
    
            <label for="descricao">Descrição: </label><br>
            <input type="text" id="descricao" name="descricao" placeholder="Descreva a atividade"><br><br>
    
            <label for="validade">Data de Validade: </label><br>
            <input type="date" id="validade" name="validade"><br><br>
    
            <input type="submit" value="Cadastrar">
        </div>

    </form>

    <div>
        <a href="?pagina=inicio">Voltar</a>
    </div>

</body>
</html>