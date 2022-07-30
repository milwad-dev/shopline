<?php

namespace Modules\Share\Components\Panel;

use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public string $class;
    public string $type;
    public ?string $id;
    public ?string $placeholder;
    public ?string $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $class = 'form-control', $type = 'text', $id = null, $placeholder = null, $value = null)
    {
        $this->name = $name;
        $this->class = $class;
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
        return view('Share::components.panel.input');
    }
}
