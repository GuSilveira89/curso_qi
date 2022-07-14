<?php

namespace APP\Controller;

use APP\Model\DAO\AddressDAO;
use APP\Utils\Redirect;
use APP\Model\Validation;
use APP\Model\Address;
use PDOException;

require '../../vendor/autoload.php';

if (empty($_POST)) {
    session_start();
    Redirect::redirect(
        type: 'error',
        message: "Requisição inválida!"
    );
}

$publicPlace = $_POST['publicPlace'];
$streetName = $_POST['streetName'];
$numberOfStreet = $_POST['numberOfStreet'];
$complement = $_POST['complement'];
$neighborhood = $_POST['neighborhood'];
$city = $_POST['city'];
$zipCode = $_POST['zipCode'];

$error = array();

if ($error) {
    Redirect::redirect(
        message: $error,
        type: 'warning'
    );
} else {
    $address = new Address(
        publicPlace: $_POST['publicPlace'],
        streetName: $_POST['streetName'],
        numberOfStreet: $_POST['numberOfStreet'],
        complement: $_POST['complement'],
        neighborhood: $_POST['neighborhood'],
        city: $_POST['city'],
        zipCode: $_POST['zipCode']
    );

    //TODO Cadastrar no banco de dados
    try {
        $dao = new AddressDAO();
        $result = $dao->insert($address);
        if ($result) {
            Redirect::redirect(
                message: "Endereço do fornecedor $name foi cadastrado com sucesso!"
            );
        } else {
            Redirect::redirect(
                message: "Lamento, não foi possivel cadastrar o endereço do fornecedor $name foi cadastrado com sucesso!",
                type: 'erro'
            );
        }
    } catch (PDOException $e) {
        Redirect::redirect(
            message: "Houve um erro inesperado!",
            type: 'error'
        );
    }
}
