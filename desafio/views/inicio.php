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
        <h1>Gerenciador de Tarefas</h1>
    </header>
    <nav>
        <div>
            <button><a href="?pagina=novatarefa">Cadastrar nova tarefa</a></button>
            <button><a href="./controllers/logout.php">Sair</a></button>
        </div>
    </nav>
    <div>
       <h2> <?php echo "Bem vindo, " . $_SESSION['usuario']['nome']; ?> </h2>
    </div>

    <div>
        <?php if(isset($mensagem))
                {
                    echo $mensagem;
                }
        ?>
    </div>
    
    <table border="3">
        <thead>
            <tr>
                <th colspan="6">Lista de Tarefas</th>
            </tr>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Descrição</th>
                <th>Validade</th>
                <th>Situação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($resultado)
                    {
                        foreach($resultado as $tarefa)
                            {
            ?>
                                <tr class="<?php echo $tarefa['situacao'] ? 'concluida' : 'pendente'; ?>">
                                    <td><?php echo $tarefa['nome'] ?></td>
                                    <td><?php echo $tarefa['email'] ?></td>
                                    <td><?php echo $tarefa['descricao'] ?></td>
                                    <td><?php echo $tarefa['data_validade'] ?></td>
                                    <td><?php echo $tarefa['situacao'] ? 'Concluida' : 'Pendente' ?></td>
                                    <td>
                                        <button><a href="?pagina=editar_tarefa&id=<?php echo $tarefa['id'] ?>">Editar </a></button>
                                        <button><a href="./controllers/deletar.php?id=<?php echo $tarefa['id'] ?>" onclick="return confirm('Deseja excluir a tarefa?')">Excluir </a></button>
                                        <?php if($tarefa['situacao']){$acao = 'Desfazer';} else{$acao = 'Concluir';} ?>
                                        <button><a href="./controllers/concluir_tarefa.php?id=<?php echo $tarefa['id'] ?>"><?php echo $acao ?></a></button>
                                    </td>
                                </tr>
                            <?php
                            }
                    }
                    else
                        {   ?>
                            <tr>
                                <td colspan="6"><?php echo "Nenhuma tarefa cadastrada."; ?></td>
                            </tr>
                        <?php }
                        ?>
        </tbody>
    </table>

    <!-- <a href="?pagina=novatarefa">Cadastrar nova tarefa</a><br><br>

    <a href="./controllers/logout.php">Sair</a> -->
</body>
</html>