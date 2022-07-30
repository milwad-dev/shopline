<?php

namespace Modules\Share\Components\Panel;

use Illuminate\View\Component;

class Label extends Component
{
    public string $title;
    public ?string $for;
    public ?string $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $for = null, $class = 'form-label')
    {
        $this->title = $title;
        $this->for = $for;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Share::components.panel.label');
    }
}
