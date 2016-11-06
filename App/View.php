<?php

namespace App;

class View
    implements \Iterator, \Countable
{
    use TMagic;
    use TIterator;

    protected $twig;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Templates');
        $this->twig = new \Twig_Environment($loader);
    }

    public function display(string $template)
    {
        echo $this->render($template);
    }

    public function render(string $template)
    {
        return $this->twig->render($template, $this->__data);
    }

    public function count()
    {
        return count($this->__data);
    }
}
