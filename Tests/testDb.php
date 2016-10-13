<?php

require __DIR__ . '/../autoload.php';

$db = new \App\Db();

// preparation to test
$db->execute('DROP TABLE test');

//test execute()
assert(true === $db->execute('CREATE TABLE test (id SERIAL, name text)'));
assert(false === $db->execute('CREATE TABLE test (id SERIAL, name text)'));

//test query()
$db->execute('INSERT INTO test (name) VALUE ("alexx")');

assert('alexx' == $db->query('SELECT name FROM test WHERE id=1')[0]->name);
assert(false === $db->query('SELECT name FROM test WHERE id=2'));

//clear
$db->execute('DROP TABLE test');