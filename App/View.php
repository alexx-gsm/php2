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

    public function display(string $template = 'index')
    {
        echo $this->render($template);
    }

    public function render(string $template = 'index')
    {
        foreach ($this as $key => $val) {
            $$key = $val;
        }

        ob_start();

        include __DIR__ . '/../Templates/' . $template . '.php';

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
