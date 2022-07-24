<?php

namespace Modules\Share\Components\Auth;

use Illuminate\View\Component;

class Button extends Component
{
    public string $name;
    public mixed $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type = 'submit')
    {
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Auth::components.auth.button');
    }
}
