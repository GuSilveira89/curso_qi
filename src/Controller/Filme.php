<?php

namespace APP\Controller;

use APP\Model\DAO\FilmeDAO;
use APP\Model\Filme;
use APP\Model\Provider;
use APP\Utils\Redirect;
use APP\Model\Validation;
use PDOException;

require '../../vendor/autoload.php';

if (!isset($_GET['operation'])) {
    Redirect::redirect(message: 'Nenhuma operação foi enviada!!!', type: 'error');
}

switch ($_GET['operation']) {
    case 'insert':
        inserirFilme();
        break;
    case 'list':
        listarFilmes();
        break;
    case 'remove':
        removerFilmes();
        break;
    case 'find':
        procurarFilme();
        break;
    case 'edit':
        editarFilme();
        break;
    default:
        Redirect::redirect(message: 'A operação informada é inválida!!!', type: 'error');
}

function inserirFilme()
{
    if (empty($_POST)) {
        session_start();
        // Redirecionar o usuário
        Redirect::redirect(
            type: 'error',
            message: 'Requisição inválida!!!'
        );
    }

    $nome = $_POST["nome"];
    $ano =  $_POST["ano"];
    $quantidade = $_POST["quantidade"];
    $secao = $_POST["secao"];
    $faixa_etaria = $_POST["faixa_etaria"];

    $error = array();

    // array_unshift -> Adicionar no início do array
    // array_push -> Adicionar no final do array

    // array_shift -> Remove do início do array
    // array_pop -> Remove do final do array

    if (!Validation::validateName($nome)) {
        array_push($error, "O nome do filme deve conter mais de 2 caracteres!!!");
    }

    if (!Validation::validateNumber($ano)) {
        array_push($error, "O ano de lançamento deve ser maior que zero!");
    }

    if (!Validation::validateNumber($quantidade)) {
        array_push($error, "A quantidade de entrada deverá ser maior que zero!!!");
    }

    if ($error) {
        Redirect::redirect(
            message: $error,
            type: 'warning'
        );
    } else {
        $filme = new Filme(
            nome: $nome,
            ano: $ano,
            quantidade: $quantidade,
            secao: $secao,
            faixa_etaria: $faixa_etaria            
        );
        try {
            $dao = new FilmeDAO();
            $result = $dao->insert($filme);
            if ($result) {
                Redirect::redirect(
                    message: "O filme $nome foi cadastrado com sucesso!!!"
                );
            } else {
                Redirect::redirect("Lamento, não foi possível cadastrar o filme $nome", type: 'error');
            }
        } catch (PDOException $e) {
            // Redirect::redirect("Houve um erro inesperado:" . $e->getMessage(), type: 'error');
            Redirect::redirect("Lamento, houve um erro inesperado!!!", type: 'error');
        }
    }
}

function listarFilmes()
{
    try {
        session_start();
        $dao = new FilmeDAO();
        $filmes = $dao->findAll();
        if ($filmes) {
            $_SESSION['lista_de_filmes'] = $filmes;
            header('location:../View/list_of_filmes.php');
        } else {
            Redirect::redirect(message: ['Não existem filmes cadastrados!!!'], type: 'warning');
        }
    } catch (PDOException $e) {
        Redirect::redirect("Lamento, houve um erro inesperado!!!", type: 'error');
    }
}

function removerFilmes()
{
    //não mexi nos 'code'
    if (empty($_GET['code'])) {
        Redirect::redirect(message: 'O código do produto não foi informado!!!', type: 'error');
    }

    $code = (float) $_GET['code'];
    $error = array();

    if (!Validation::validateNumber($code)) {
        array_push($error, 'Código do filme inválido!!!');
    }

    if ($error) {
        Redirect::redirect($error, type: 'warning');
    } else {
        try {
            $dao = new FilmeDAO();
            $result = $dao->delete($code);
            if ($result) {
                Redirect::redirect(message: 'Filme removido com sucesso!!!');
            } else {
                Redirect::redirect(message: ['Não foi possível remover o filme'], type: 'warning');
            }
        } catch (PDOException $e) {
            Redirect::redirect("Lamento, houve um erro inesperado!!!", type: 'error');
        }
    }
}

function procurarFilme()
{
    //não mexi nos 'code'
    if (empty($_GET['code'])) {
        Redirect::redirect(message: 'O código do fillme não foi informado!!!', type: 'error');
    }
    $code = $_GET['code'];
    $dao = new FilmeDAO();
    try {
        $result = $dao->findOne($code);
    } catch (PDOException $e) {
        Redirect::redirect("Lamento, houve um erro inesperado!!!", type: 'error');
    }
    if ($result) {
        session_start();
        $_SESSION['filme_info'] = $result;
        header("location:../View/form_edit_filme.php");
    } else {
        Redirect::redirect(message: 'Lamento, não localizamos o filme em nossa base de dados', type: 'error');
    }
}

function editarFilme()
{
    if (empty($_POST)) {
        Redirect::redirect(message: 'Requisição inválida!!!', type: 'error');
    }

    $code = $_POST['code'];
    $filmeNome = $_POST["nome"];
    $filmeAno =  $_POST["ano"];
    $filmeQuantidade = $_POST["quantidade"];
    $filmeSecao = $_POST["secao"];
    $filmeFaixa_etaria = $_POST["faixa_etaria"];

    $error = array();

    if (!Validation::validateName($filmeNome)) {
        array_push($error, 'O nome do filme deve conter ao menos 2 caracteres!!!');
    }
    if (!Validation::validateNumber($filmeQuantidade)) {
        array_push($error, 'A quantidade em estoque deve ser superior a zero!!!');
    }

    $filme = new Filme(
        nome: $filmeNome,
        ano: $filmeAno,
        quantidade: $filmeQuantidade,
        secao: $filmeSecao,
        faixa_etaria: $filmeFaixa_etaria            
    );
    $dao = new FilmeDAO();
    try {
        $result = $dao->update($filme);
    } catch (PDOException $e) {
        Redirect::redirect("Lamento, houve um erro inesperado!!!", type: 'error');
    }
    if ($result) {
        Redirect::redirect(message: 'Filme atualizado com sucesso!!!');
    } else {
        Redirect::redirect(message: ['Não foi possível atualizar os dados do Filme!!!']);
    }
}
