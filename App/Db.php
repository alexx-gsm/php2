<?php

namespace App;

use App\Components\DbException;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = Config::getInstance()->setConfig(__DIR__ . '/../config.php');

        $host = $config->data['db']['host'];
        $dbname = $config->data['db']['dbname'];
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';';
        try {
            $this->dbh = new \PDO($dsn, $config->data['db']['user'], $config->data['db']['pass']);
        } catch (\PDOException $error) {
            throw new DbException('Error: Database connection failed');
        }

    }

    public function execute(string $query, $params = [])
    {
        try {
            $sth = $this->dbh->prepare($query);
            $res = $sth->execute($params);
        } catch (\PDOException $e) {
            throw new DbException('Error: DataBase error');
        }

        return $res;
    }

    public function query(string $query, array $params = [], $class = \stdClass::class)
    {
        try {
            $sth = $this->dbh->prepare($query);
            $sth->execute($params);
            $res = $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $e) {
            throw new DbException('Error: DataBase error');
        }

        return (!empty($res)) ? $res : false;
    }

    public function queryEach(string $query, array $params = [], $class = \stdClass::class)
    {
        try {
            $sth = $this->dbh->prepare($query);
            $sth->execute($params);
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $e) {
            throw new DbException('Error: DataBase error');
        }

        while (!empty($item = $sth->fetch())) {
            yield $item;
        }
    }

    public function lastInsertId()
    {
        try {
            $res = $this->dbh->lastInsertId();
        } catch (\PDOException $e) {
            throw new DbException('Error: DataBase error');
        }
        return $res;
    }
}