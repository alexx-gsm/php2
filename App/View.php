<?php

namespace App;

class View
    implements \Iterator, \Countable
{
    use TMagic;
    use TIterator;

    public function __construct()
    {
    }

    public function display(string $pathTemplate)
    {
        echo $this->render($pathTemplate);
    }

    public function render(string $pathTemplate)
    {
        foreach ($this as $key => $val) {
            $$key = $val;
        }

        ob_start();

        if (is_readable($pathTemplate)) {
            include $pathTemplate;
        }

        $buffer = ob_get_contents();

        ob_end_clean();

        return $buffer;
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->__data);
    }
}
