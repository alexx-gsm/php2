<?php

namespace App;

class View
{
    protected $data = [];

    public function __construct()
    {
    }

    public function assign(string $name, $value) {
        $this->data[$name] = $value;
    }

    public function display(string $template = 'index')
    {
        echo $this->render($template);
    }

    public function render(string $template = 'index')
    {
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }

        ob_start();

        include __DIR__ . '/../Templates/' . $template . '.php';

        $buffer = ob_get_contents();

        ob_end_clean();

        return $buffer;
    }
}
