<?php
require 'vendor/autoload.php';
require_once 'conf/config.php';
require_once 'Model/StudenteRepository.php';

$template = new League\Plates\Engine('templates', 'tpl');

    if(isset($_GET['id']) && $_GET['action'] == 'delete'){
        $id = $_GET['id'];
        \Model\StudenteRepository::remove($id);
    }

    if (isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $classe = $_POST['classe'];
        \Model\StudenteRepository::add($nome, $cognome, $classe);
    }

    $result = \Model\StudenteRepository::listAll();

    echo $template->render('insert-delete-edit', [
    'studenti'=>$result
]);


