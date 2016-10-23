<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = Config::getInstance()->setConfig(__DIR__ . '/../Config.php');

        $host = $config->data['db']['host'];
        $dbname = $config->data['db']['dbname'];
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';';
        $this->dbh = new \PDO($dsn, $config->data['db']['user'], $config->data['db']['pass']);
    }

    public function execute(string $query, $params = [])
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($params);
    }

    public function query(string $query, array $params = [], $class = \stdClass::class)
    {
        $sth = $this->dbh->prepare($query);
        $sth->execute($params);

        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $class);

        return (!empty($res)) ? $res : false;
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}