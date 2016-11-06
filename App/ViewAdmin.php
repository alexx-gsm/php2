<?php

namespace App;

class ViewAdmin
    extends View
{
    public function render(string $template)
    {
        foreach ($this as $key => $val) {
            $$key = $val;
        }

        ob_start();

        if (is_readable($template)) {
            include $template;
        }

        $buffer = ob_get_contents();

        ob_end_clean();

        return $buffer;
    }

}
