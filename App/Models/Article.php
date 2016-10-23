<?php

namespace App\Models;

/**
 * Class Article
 * @package App\Models
 *
 * @property int $id            // article primary key
 * @property string $title
 * @property string $lead
 * @property string $text
 * @property int $author_id     // relation BELONG_TO \Author
 *
 */
class Article extends AbstractModel
{
    public static $table = 'news';

    public $id;
    public $title;
    public $lead;
    public $text;
    public $author_id;

    public function __construct()
    {
    }

    /**
     * @param $name
     * @return Author|bool
     */
    public function __get($name)
    {
        if ($name == 'author') {
            if (!empty($this->author_id)) {
                return Author::findOneById($this->author_id);
            } else {
                return new Author();
            }
        }
        return false;
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