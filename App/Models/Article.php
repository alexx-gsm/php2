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
class Article
    extends AbstractModel
{
    public static $table = 'news';

    protected $id;
    protected $title;
    protected $lead;
    protected $text;
    protected $author_id;

    public function __construct()
    {
    }

    /**
     * @param $name
     * @return Author|bool
     */
    public function __get($name)
    {
        if (isset($this->$name) && 'author' == $name) {
            return Author::findOneById($this->author_id);
        }
        if (isset($this->$name)) {
            return $this->$name;
        }
        return false;
    }

    public function __isset($name)
    {
        if ('author' == $name && !empty($this->author_id)) {
            return true;
        }
        if (isset($this->$name)) {
            return true;
        }
        return false;
    }

    public function __set($name, $value)
    {
        if (isset($this->$name)) {
            $this->$name = $value;
        } else {
            throw new \Exception('не найдено свойство ' . $name);
        }
    }

}