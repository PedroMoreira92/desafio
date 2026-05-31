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
            <a class="btn" href="?pagina=novatarefa">Cadastrar nova tarefa</a>
            <a class="btn" href="./controllers/logout.php">Sair</a>
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
    
    <table>
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
                                        <a class="btn" href="?pagina=editar_tarefa&id=<?php echo $tarefa['id'] ?>">Editar </a>
                                        <a class="btn" href="./controllers/deletar.php?id=<?php echo $tarefa['id'] ?>" onclick="return confirm('Deseja excluir a tarefa?')">Excluir </a>
                                        <?php 
                                            if($tarefa['situacao'])
                                            {
                                                $acao = 'Desfazer';
                                            ?>
                                                <a id="desfazer" class="btn" href="./controllers/desfazer_tarefa.php?id=<?php echo $tarefa['id'] ?>" onclick="return confirm('Retornar a tarefa como pendente?')"><?php echo $acao ?></a>
                                            <?php
                                            }
                                            else
                                            {
                                                $acao = 'Concluir';
                                            ?>
                                                <a id="concluir" class="btn" href="./controllers/concluir_tarefa.php?id=<?php echo $tarefa['id'] ?>" onclick="return confirm('Tarefa concluída?')"><?php echo $acao ?></a>
                                            <?php
                                            }
                                        
                                        ?>
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