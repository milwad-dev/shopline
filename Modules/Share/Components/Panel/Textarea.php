<?php

namespace Modules\Share\Components\Panel;

use Illuminate\View\Component;

class Textarea extends Component
{
    public string $name;
    public ?string $id;
    public string $class;
    public string $rows;
    public ?string $placeholder;
    public ?string $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $id = null, $class = 'form-control', $rows = '3', $placeholder = null, $value = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->class = $class;
        $this->rows = $rows;
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
        return view('Share::components.panel.textarea');
    }
}
