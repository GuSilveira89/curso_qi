<?php

namespace APP\Controller;

use APP\Model\Provider;
use APP\Utils\Redirect;
use APP\Model\Validation;
use APP\Model\Address;

require '../../vendor/autoload.php';

if(empty($_POST)){
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

if (!Validation::validateName($cnpj)){
    array_push($error, "O CNPJ do fornecedor deve conter 14 caracteres");
}

if (!Validation::validateName($name)){
    array_push($error, "O nome do fornecedor deve conter mais que 2 caracteres");
}

if($error){
    Redirect::redirect(
        type: 'warning',
        message: $error
    );
} else {
    $provider = new Provider(
        cnpj: $_POST['cnpj'],
        name: $_POST['name'],
        phone: $_POST['phone'], 
        address: new Address(
            publicPlace: $_POST['publicPLace'],
            numberOfStreet: $_POST['numberOfPost'],
            complement: $_POST['complement'],
            neighborhood: $_POST['neighborhood'],
            city: $_POST['city'],
            zipCode: $_POST['zipCode']
        )
    );
    Redirect::redirect(
        message: "O fornecedor $name foi cadastrado com sucesso!"
    );
}

