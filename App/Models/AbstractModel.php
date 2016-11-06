<?php

namespace App\Models;

use App\Db;
use ME\MultiException;


abstract class AbstractModel
{
    public static $table;

    public static function findAll()
    {
        $data = (new Db())->query(
            'SELECT * FROM ' . static::$table,
            [],
            static::class
        );
        return $data ?: false;
    }

    public static function findOneById(int $id)
    {
        $data = (new Db())->query(
            'SELECT * FROM ' . static::$table . ' WHERE id=:id',
            [':id' => $id],
            static::class
        );
        return $data[0] ?? false;
    }

    public static function findNLastItems(int $count = 1)
    {

        $data = (new Db())->query(
            'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $count,
            [],
            static::class
        );
        return $data ?: false;
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    protected function insert()
    {
        $columns = [];
        $binds = [];
        $data = [];
        foreach ($this as $column => $value) {
            if ('id' == $column) {
                continue;
            }
            $columns[] = $column;
            $binds[] = ':' . $column;
            $data[':' . $column] = $value;
        }
        $sql = '
            INSERT INTO ' . static::$table . '
            (' . implode(', ', $columns). ')
            VALUES
            (' . implode(', ', $binds). ')
            ';
        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    protected function update()
    {
        $binds = [];
        $data = [];
        foreach ($this as $column => $value) {
            if ('id' == $column) {
                continue;
            }
            $binds[] = $column . '=:' . $column;
            $data[':' . $column] = $value;
        }
        $data[':id'] = $this->id;
        $sql = '
            UPDATE ' . static::$table . '
            SET
            ' . implode(', ', $binds). '
            WHERE id=:id
            ';
//        var_dump($sql); var_dump($data); die;
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function delete()
    {
        if (false === $this->isNew()) {
            $sql = '
            DELETE FROM ' . static::$table . '
            WHERE id=:id
            ';
            $db = new Db();
            $db->execute($sql, [':id' => $this->id]);
        }
    }

    public function fill(array $data = null) {
        if (null === $data) {
            return $this;
        }

        $errors = new MultiException();

        foreach ($data as $key => $value) {
            try {
                $this->$key = $value;
            } catch (\Exception $e) {
                $errors->add($e);
            }

        }

        if (count($errors) > 0) {
            throw $errors;
        }

        return $this;
    }
}