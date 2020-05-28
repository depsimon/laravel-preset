<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $method;
    public $action;
    public $hasFiles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($method = 'GET', $action = '', $hasFiles = false)
    {
        $this->method = $method;
        $this->action = $action;
        $this->hasFiles = $hasFiles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form');
    }
}
