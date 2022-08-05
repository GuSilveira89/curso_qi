<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locadora Kikito de ouro - Cadastro de filme</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="bg-blue-400">
        <ul>
            <li class="inline">
                <a href="dashboard.php">Página Inicial</a>
            </li>
            <li class="inline">
                <a href="#">Novo Filme</a>
            </li>
            <li class="inline">
                <a href="../Controller/Filme.php?operation=list">Lista de Filmes</a>
            </li>
        </ul>
    </nav>

    <form action="../Controller/Filme.php?operation=insert" method="POST">
        <fieldset class="p-4 m-5 border border-blue-400">
            <legend>Dados do FIlme</legend>
            <section class="mt-4 columns-2">
                <article>
                    <label for="nome">Nome do Filme</label>
                    <input type="text" id="nome" name="nome" class="border border-blue-400" required minlength="2">
                </article>
                <article>
                    <label for="ano">Ano de Lançamento</label>
                    <input type="number" id="ano" name="ano" class="border border-blue-400">
                </article>
            </section>
            <section class="mt-4 columns-2">
                <article>
                    <label for="secao">Seção</label>
                    <select name="secao" id="secao">
                        <option value="1">Ação</option>
                        <option value="2">Adulto</option>
                        <option value="3">Aventura</option>
                        <option value="4">Comédia</option>
                        <option value="5">Comédia Romântica</option>
                        <option value="6">Drama</option>
                        <option value="7">Infantil</option>
                        <option value="8">Ficção Cientifica</option>
                        <option value="9">Terror</option>
                    </select>
                </article>
                <article>
                    <label for="faixa_etaria">Faixa Etária</label>
                    <select name="faixa_etaria" id="faixa_etaria">
                        <option value="1">Livre</option>
                        <option value="2">Impróprio para menores de 10 anos</option>
                        <option value="3">Impróprio para menores de 12 anos</option>
                        <option value="4">Impróprio para menores de 14 anos</option>
                        <option value="5">Impróprio para menores de 16 anos</option>
                        <option value="6">Impróprio para menores de 18 anos</option>
                    </select>
                </article>
            </section>
            <section class="mt-4 columns-2">
                <article>
                    <label for="quantidade">Quantidade no estoque</label>
                    <input type="number" id="quantidade" name="quantidade" class="border border-blue-400" req>
                </article>
            </section>

            <article class="flex justify-center mt-4">
                <button type="submit" class="p-4 text-white bg-blue-700 rounded">Cadastrar</button>
            </article>
        </fieldset>
    </form>
</body>

</html>