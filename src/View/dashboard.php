<?php require_once '../Controller/auth.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Loja de Varejo - Home</title>
</head>
<body>
    <nav class="bg-blue-400">
        <ul>
          <li class="inline">
            <a href="../../index.html">Página Inicial</a>
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
    </body>
  </html>