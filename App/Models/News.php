<?php

namespace App\Models;

class News extends AbstractModel
{
    public static $table = 'news';

    protected $id;
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
}