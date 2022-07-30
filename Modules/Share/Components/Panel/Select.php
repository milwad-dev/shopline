<?php

namespace Modules\Share\Components\Panel;

use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public string $class;
    public ?string $id;
    public ?string $selectedText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $class = 'form-control', $id = null, $selectedText = null)
    {
        $this->name = $name;
        $this->class = $class;
        $this->id = $id;
        $this->selectedText = $selectedText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Share::components.panel.select');
    }
}
