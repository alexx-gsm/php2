<?php

namespace App\Models;

use App\Db;

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
        return !empty($data) ? $data : false;
    }

    public static function findOneById(int $id)
    {
        $data = (new Db())->query(
            'SELECT * FROM ' . static::$table . ' WHERE id=:id',
            [':id' => $id],
            static::class
        )[0];
        return !empty($data) ? $data : false;
    }

    public static function findNLastItems(int $count = 1)
    {

        $data = (new Db())->query(
            'SELECT * FROM ' . static::$table . ' ORDER BY id DESC LIMIT ' . $count,
            [],
            static::class
        );
        return !empty($data) ? $data : false;
    }
}