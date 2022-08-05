<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="bg-blue-400">
        <ul>
            <li class="inline">
                <a href="dashboard.php">Home</a>
            </li>
            <li class="inline">
                <a href="form_add_filme.php">Novo Filme</a>
            </li>
            <li class="inline">
                <a href="form_add_provider.php">Novo fornecedor</a>
            </li>
            <li class="inline">
                <a href="../Controller/Product.php?operation=list">Listar produtos</a>
            </li>
        </ul>
    </nav>
    <h1 class="my-4 text-3xl font-bold text-center text-blue-800">Lista de Filmes</h1>
    <table class="m-auto">
        <thead class="text-white bg-blue-400">
            <th>#</th>
            <th>Nome do filme</th>
            <th>Ano de Lançamento</th>
            <th>Quantidade em estoque</th>
            <th>Seção</th>
            <th>Faixa Etária</th>
        </thead>
        <tbody>
            <?php
            session_start();
            foreach ($_SESSION['lista_de_filmes'] as $filme) :
            ?>
                <tr>
                    <td>
                        <?= $filme['filme_id'] ?>
                    </td>
                    <td>
                        <?= $filme['filme_nome'] ?>
                    </td>                    
                    <td>
                        <?= $filme['filme_ano'] ?>
                    </td>
                    <td>
                        <?= $filme['filme_quantidade'] ?>
                    </td>
                    <td>
                        <?= $filme['filme_secao'] ?>
                    </td>
                    <td>
                        <?= $filme['filme_faixa'] ?>
                    </td>
                    <td>
                        <a href="../Controller/Filme.php?operation=find&code=<?= $filme["filme_id"] ?>">Editar</a>
                        <a href="../Controller/Filme.php?operation=remove&code=<?= $filme["filme_id"] ?>">Remover</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>