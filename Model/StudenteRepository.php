<?php

namespace Model;
use Util\Connection;
require_once 'Util/Connection.php';
class StudenteRepository
{
    public static function listAll(): array
    {
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM studenti';
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }

    public static function listAllUsingId($id): array
    {
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM studenti WHERE ID > :id';
        //$result = $pdo->query($sql);
        $result = $pdo->prepare($sql);
        $result->execute([
            'id' => $id
        ]);
        return $result->fetchAll();
    }

    public static function listAllOrderBySurname(): array
    {
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM studenti ORDER BY Cognome';
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }

    public static function listAllOrderByName(): array
    {
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM studenti ORDER BY Nome';
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }
    public static function listAllOrderByClass(): array
    {
        $pdo = Connection::getInstance();
        $sql = 'SELECT * FROM studenti ORDER BY Classe';
        $result = $pdo->query($sql);
        return $result->fetchAll();
    }

    public static function add($nome, $cognome, $classe)
    {
        $pdo = Connection::getInstance();
        $sql = 'INSERT INTO studenti (nome, cognome, classe) VALUES (:nome, :cognome, :classe)';
        //$result = $pdo->query($sql);
        $result = $pdo->prepare($sql);
        $result->execute([
            'nome' => $nome,
            'cognome' => $cognome,
            'classe' => $classe,
        ]);
    }

    public static function remove($id)
    {
        $pdo = Connection::getInstance();
        $sql = 'DELETE FROM studenti WHERE id=:id';

        $result = $pdo->prepare($sql);
        $result->execute([
            'id' => $id
        ]);
    }

    public static function update($id, $nome, $cognome, $classe){
        $pdo = Connection::getInstance();
        $sql = 'UPDATE studenti SET nome = :nome, cognome = :cognome, classe = :classe WHERE id = :id';

        $result = $pdo->prepare($sql);
        $result -> execute([
            'nome' => $nome,
            'cognome' => $cognome,
            'classe' => $classe,
            'id' => $id,
        ]);
    }
}