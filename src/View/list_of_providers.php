<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de varejo - Lista de Fornecedores</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<nav class="bg-blue-400">
        <ul>
            <li class="inline">
                <a href="../../index.html">Home</a>
            </li>
            <li class="inline">
                <a href="form_add_product.php">Novo produto</a>
            </li>
            <li class="inline">
                <a href="form_add_provider.php">Novo fornecedor</a>
            </li>
            <li class="inline">
                <a href="list_of_products.php">Listar produtos</a>
            </li>
            <li class="inline">
                <a href="#">Listar fornecedores</a>
            </li>
        </ul>
    </nav>
    <h1 class="my-4 font-3xl font-bold text-center text-blue-400">Lista de fornecedores cadastrados</h1>
    <table class="m-auto">
        <thead class="bg-blue-400 text-white">
            <th>#</th>
            <th>CNPJ</th>
            <th>Nome do Fornecedor</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </thead>
        <tbody>
            <?php
            session_start();
            foreach ($_SESSION['list_of_providers'] as $provider) :
            ?>
                <tr>
                    <td>
                        <?= $provider['provider_code'] ?>
                    </td>
                    <td>
                        <?= $provider['cnpj'] ?>
                    </td>
                    <td>
                        <?= $provider['provider_name'] ?>
                    </td>
                    <td>
                        <?= $provider['provider_phone'] ?>
                    </td>
                    <td>
                        <?= $provider['address_code'] ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>