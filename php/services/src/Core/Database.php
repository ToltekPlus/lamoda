<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    public $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=" . $_ENV["DB_HOST"] . ";dbname=" . $_ENV["DB_NAME"] . ";", $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
            $this->connect->exec("set names utf8");
        }catch (PDOException $e) {
            echo "Произошла ошибка следующего типа: " . $e->getMessage();
        }
    }

    /**
     * Переопределяем метод query()
     *
     * @param string $sql
     * @return array
     */
    public function query(string $sql) : array
    {
        try {
            $query = $this->connect->query($sql);
            return $query->fetchAll(PDO::FETCH_CLASS);
        }catch (\Exception $e) {
            echo "Произошла ошибка в методе query следующего типа: " . $e->getMessage();
        }
    }

    /**
     * Переопределяем метод execute()
     *
     * @param string $sql
     * @param array|null $arguments
     * @return bool
     */
    public function execute(string $sql, ?array $arguments) : bool
    {
        $query = $this->connect->prepare($sql);

        try {
            $query->execute($arguments);

            //return $query->fetch(PDO::FETCH_ASSOC);
            return true;
        }catch (\Exception $e) {
            echo "Произошла ошибка в методе execute следующего типа: " . $e->getMessage();
        }
    }

    public function lastId(): string
    {
        return $this->connect->lastInsertId();
    }
}