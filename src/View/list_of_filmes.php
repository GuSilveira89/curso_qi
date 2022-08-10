<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora Kikito de ouro - Lista de Filmes</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="bg-blue-400">
        <ul>
            <li class="inline">
                <a href="dashboard.php">Página Inicial</a>
            </li>
            <li class="inline">
                <a href="form_add_filme.php">Novo Filme</a>
            </li>
            <li class="inline">
                <a href="#">Listar Filmes</a>
            </li>
            <li class="inline">
            <a href="../Controller/User.php?operation=logout">Sair</a>
          </li>
        </ul>
    </nav>
    <h1 class="my-4 text-3xl font-bold text-center text-blue-800">Lista de Filmes</h1>
    <table class="m-auto">
        <thead class="border-slate-500 text-white bg-blue-400">
            <th class="border border-slate-600">#</th>
            <th class="border border-slate-600">Nome do filme</th>
            <th class="border border-slate-600">Ano de Lançamento</th>
            <th class="border border-slate-600">Quantidade em estoque</th>
            <th class="border border-slate-600">Seção</th>
            <th class="border border-slate-600">Faixa Etária</th>
            <th class="border border-slate-600">Ações</th>
        </thead>
        <tbody>
            <?php
            session_start();
            foreach ($_SESSION['list_of_filmes'] as $filme) :
            ?>
                <tr>
                    <td class="border border-slate-600">
                        <?= $filme['filme_id'] ?>
                    </td>
                    <td class="border border-slate-600">
                        <?= $filme['filme_nome'] ?>
                    </td>                    
                    <td class="border border-slate-600">
                        <?= $filme['filme_ano'] ?>
                    </td>
                    <td class="border border-slate-600">
                        <?= $filme['filme_quantidade'] ?>
                    </td>
                    <td class="border border-slate-600">
                        <?= $filme['filme_secao'] ?>
                    </td>
                    <td class="border border-slate-600">
                        <?= $filme['filme_faixa_etaria'] ?>
                    </td>
                    <td class="border border-slate-600">
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