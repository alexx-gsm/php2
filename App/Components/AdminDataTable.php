<?php

namespace App\Components;

class AdminDataTable
{
    protected $models;
    protected $functions;

    public function __construct(array $models, array $functions)
    {
        $this->models = $models;
        $this->functions = $functions;
    }

    public function access():bool
    {
        return true;
    }

    public function render()
    {
        $table = [];
        foreach ($this->models as $model) {
            $line = [];
            foreach ($this->functions as $function) {
                $line[] = $function($model);
            }
            $table[] = $line;
        }
    }

}