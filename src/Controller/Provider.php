<?php

namespace APP\Controller;

use APP\Model\DAO\ProviderDAO;
use APP\Model\DAO\AddressDAO;
use APP\Model\Provider;
use APP\Utils\Redirect;
use APP\Model\Validation;
use APP\Model\Address;
use PDOException;

require '../../vendor/autoload.php';

if (empty($_GET['operation'])) {
    Redirect::redirect(message: 'Nenhuma operação foi enviada', type: 'error');
}

switch ($_GET['operation']){
    case 'insert':
        insertProvider();
        break;
    case 'list':
        listProviders();
        break;
    default:
        Redirect::redirect(message: 'A operação informada é inválida', type: 'error');
}

function insertProvider()
{
    if (empty($_POST)) {
        session_start();
        Redirect::redirect(
            type: 'error',
            message: "Requisição inválida!"
        );
    }

    $cnpj = $_POST['cnpj'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $error = array();

    if (!Validation::validateName($cnpj)) {
        array_push($error, "O CNPJ do fornecedor deve conter 14 caracteres");
    }

    if (!Validation::validateName($name)) {
        array_push($error, "O nome do fornecedor deve conter mais que 2 caracteres");
    }

    if ($error) {
        Redirect::redirect(
            message: $error,
            type: 'warning'
        );
    } else {
        $provider = new Provider(
            cnpj: $_POST['cnpj'],
            name: $_POST['name'],
            phone: $_POST['phone'],
            address: new Address(
                publicPlace: $_POST['publicPlace'],
                streetName: $_POST['streetName'],
                numberOfStreet: $_POST['numberOfStreet'],
                complement: $_POST['complement'],
                neighborhood: $_POST['neighborhood'],
                city: $_POST['city'],
                zipCode: $_POST['zipCode']
            )
        );

        //TODO Cadastrar no banco de dados
        try {
            $dao = new AddressDAO();
            $result = $dao->insert($provider->address);
            if ($result) {
                $provider->address->id = $dao->findId();

                $dao = new ProviderDAO();
                $result = $dao->insert($provider);
                if ($result) {
                    Redirect::redirect(
                        message: "O fornecedor $name foi cadastrado com sucesso!"
                    );
                } else {
                    Redirect::redirect(
                        message: "Lamento, não foi possivel cadastrar o fornecedor $name foi cadastrado com sucesso!",
                        type: 'erro'
                    );
                }
            }
        } catch (PDOException $e) {
            Redirect::redirect(
                message: "Houve um erro inesperado!",
                type: 'error'
            );
        }
    }
}

function listProviders()
{
    try {
        session_start();
        $dao = new ProviderDAO();
        $providers = $dao->findAll();
        if ($providers) {
            $_SESSION['list_of_providers'] = $providers;
            header('location:../View/list_of_providers.php');
        } else {
            Redirect::redirect(message: 'Não existem fornecedores cadastrados', type: 'warning');
        }
    } catch (PDOException $e) {
        Redirect::redirect(message: 'Lamento, houve um erro inesperadp!', type: 'error');
    }
}
