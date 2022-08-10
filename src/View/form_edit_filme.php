<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora Kikito de ouro - Alteração de filme</title>
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
                <a href="../Controller/Filme.php?operation=list">Listar Filmes</a>
            </li>
            <li class="inline">
            <a href="../Controller/User.php?operation=logout">Sair</a>
          </li>
        </ul>
    </nav>
    <?php
    session_start();
    $filme = $_SESSION['filme_info'];
    ?>
    <form action="../Controller/Filme.php?operation=edit" method="POST">
        <input type="hidden" name="code" value="<?= $filme['filme_id'] ?>">
        <fieldset class="p-4 m-5 border border-blue-400">
            <legend>Dados do Filme</legend>
            <section class="mt-4 columns-2">
                <article>
                    <label for="nome">Nome do Filme</label>
                    <input type="text" id="nome" name="nome" class="border border-blue-400" required minlength="2" value="<?= $filme['filme_nome'] ?>">
                </article>
                <article>
                    <label for="ano">Ano de Lançamento</label>
                    <input type="number" id="ano" name="ano" class="border border-blue-400" value="<?= $filme['filme_ano'] ?>">
                </article>
            </section>
            <section class="mt-4 columns-2">
                <article>
                    <label for="secao">Seção</label>
                    <select name="secao" id="secao" value="<?= $filme['filme_secao'] ?>">
                        <option value="Ação">Acao</option>
                        <option value="Adulto">Adulto</option>
                        <option value="Aventura">Aventura</option>
                        <option value="Comédia">Comedia</option>
                        <option value="Comédia Romântica">Comedia Romantica</option>
                        <option value="Drama">Drama</option>
                        <option value="Infantil">Infantil</option>
                        <option value="Ficção Cientifica">Ficcao Cientifica</option>
                        <option value="Terror">Terror</option>
                    </select>
                </article>
                <article>
                    <label for="faixa_etaria">Faixa Etária</label>
                    <select name="faixa_etaria" id="faixa_etaria" value="<?= $filme['filme_faixa_etaria'] ?>">
                        <option value="Livre">Livre</option>
                        <option value="Impróprio para menores de 10 anos">Improprio para menores de 10 anos</option>
                        <option value="Impróprio para menores de 12 anos">Improprio para menores de 12 anos</option>
                        <option value="Impróprio para menores de 14 anos">Improprio para menores de 14 anos</option>
                        <option value="Impróprio para menores de 16 anos">Improprio para menores de 16 anos</option>
                        <option value="Impróprio para menores de 18 anos">Improprio para menores de 18 anos</option>
                    </select>
                </article>
            </section>
            <section class="mt-4 columns-2">
                <article>
                    <label for="quantidade">Quantidade no estoque</label>
                    <input type="number" id="quantidade" name="quantidade" class="border border-blue-400" value="<?= $filme['filme_quantidade'] ?>">
                </article>
            </section>

            <article class="flex justify-center mt-4">
                <button type="submit" class="p-4 text-white bg-blue-700 rounded">Salvar</button>
            </article>
        </fieldset>
    </form>
</body>

</html>