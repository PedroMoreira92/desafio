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
    <h2>Editar Tarefa</h2>

    <form action="./controllers/editar_tarefa.php" method="post">

        <div class="formulario">
            <input type="hidden" name="id" value="<?php echo $resultado['id'] ?>">
    
            <label for="descricao">Descrição: </label><br>
            <input type="text" name="descricao" id="descricao" value="<?php echo $resultado['descricao'] ?>"><br><br>
    
            <label for="validade">Data de Validade: </label><br>
            <input type="date" name="validade" id="validade" value="<?php echo $resultado['data_validade'] ?>"><br><br>
    
            <input type="submit" value="Editar">
        </div>

    </form>

    <div>
        <a href="?pagina=inicio">Voltar</a>
    </div>
</body>
</html>