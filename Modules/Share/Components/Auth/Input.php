<?php

namespace Modules\Share\Components\Auth;

use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public mixed $type;
    public mixed $placeholder;
    public mixed $id;
    public mixed $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type = 'text', $id = null, $placeholder = null, $value = null)
    {
        $this->name = $name;
        $this->type = $type;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Share::components.auth.input');
    }
}
