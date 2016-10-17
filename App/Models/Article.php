<?php

namespace App\Models;

class Article extends AbstractModel
{
    public static $table = 'news';

    public $id;
    public $title;
    public $lead;
    public $text;

    public function __construct()
    {
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function fill(array $data = null) {
        if (null === $data) {
            return $this;
        }

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }

        return $this;
    }
}