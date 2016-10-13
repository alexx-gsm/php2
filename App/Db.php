<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = include __DIR__ . '/Config/config.php';
        $host = $config['db_host'];
        $db_name = $config['db_name'];
        $dsn = 'mysql:host=' . $host . ';dbname=' . $db_name . ';';
        $this->dbh = new \PDO($dsn, $config['db_user'], $config['db_pass']);
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
}