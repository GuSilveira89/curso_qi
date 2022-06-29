<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de varejo - Cadastro de Fornecedor</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <fieldset class="p-4 m-5 border border-blue-400 text-">
        <legend>Cadastro de Fornecedor</legend>

        <form action="../Controller/Provider.php" method="POST">
            <fieldset class="flex flex-col justify-center p-4 m-4 border border-blue-400">
                <legend>Dados do Fornecedor</legend>
                <section class="columns-2 ">
                    <article>
                        <label for="cnpj">CNPJ do Fornecedor</label>
                        <input type="text" id="cnpj" name="cnpj" class="border border-blue-400" required minlength="14" maxlength="14">
                    </article>
                    <article>
                        <label for="name">Nome do Fornecedor</label>
                        <input type="text" id="name" name="name" class="border border-blue-400" required minlength="3">
                    </article>
                    <article>
                        <label for="phone">Telefone</label>
                        <input type="text" id="phone" name="phone" class="border border-blue-400" required minlength="8" maxlength="11">
                    </article>
                </section>
            </fieldset>        
            <fieldset class="flex flex-col justify-center p-4 border border-blue-400">
                <legend>Endereço do Fornecedor</legend>
                <section class="columns-2 ">
                    <article>
                        <label for="publicPlace">traduzir</label>
                        <input type="text" id="publicPlace" name="publicPlace" class="border border-blue-400" required minlength="3">
                    </article>
                    <article>
                        <label for="numberOfStreet">Número</label>
                        <input type="text" id="numberOfStreet" name="numberOfStreet" class="border border-blue-400" required minlength="1">
                    </article>
                </section>
                <section class="columns-2">
                    <article>
                        <label for="complement">Complemento</label>
                        <input type="text" id="complement" name="complement" class="border border-blue-400">
                    </article>
                    <article>
                        <label for="neighborhood">traduzir</label>
                        <input type="text" id="neighborhood" name="neighborhood" class="border border-blue-400">
                    </article>
                </section>
                <section class="columns-2">
                    <article>
                        <label for="city">Cidade</label>
                        <input type="text" id="city" name="city" class="border border-blue-400">
                    </article>
                    <article>
                        <label for="zipCode">CEP</label>
                        <input type="text" id="zipCode" name="zipCode" class="border border-blue-400" required minlength="8" maxlength="8">
                    </article>
                </section>
            </fieldset>
        </form>
        <article class="flex justify-center mt-4">
            <button type="submit" class="p-4 text-white bg-blue-700 rounded">Cadastrar</button>
        </article>
    </fieldset>
</body>

</html>