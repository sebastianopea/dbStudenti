<?php
require 'vendor/autoload.php';
require_once 'conf/config.php';
require_once 'Model/StudenteRepository.php';

$template = new League\Plates\Engine('templates', 'tpl');

if(isset($_POST['nuovoNome'])){
    $id = $_POST['id'];
    $nome = $_POST['nuovoNome'];
    $cognome = $_POST['nuovoCognome'];
    $classe = $_POST['nuovaClasse'];
    \Model\StudenteRepository::update($id, $nome, $cognome, $classe);
}

$result = \Model\StudenteRepository::listAll();

echo $template -> render('insert-delete-edit', [
   'studenti' => $result
]);
