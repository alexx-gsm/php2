<?php

namespace App\Models;

/**
 * Class Author
 * @package App\Models
 *
 * @property int $id            // author primary key
 * @property string $name
 * @property string $email
 */
class Author
    extends AbstractModel
{
    public static $table = 'authors';

    public $id;
    public $name;
    public $email;

}