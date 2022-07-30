<?php

namespace Modules\Share\Components\Panel;

use Illuminate\View\Component;

class Button extends Component
{
    public string $title;
    public string $class;
    public string $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = 'Submit', $class = 'btn btn-primary waves-effect waves-float waves-light', $type = 'submit')
    {
        $this->title = $title;
        $this->class = $class;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Share::components.panel.button');
    }
}
