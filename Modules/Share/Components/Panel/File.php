<?php

namespace Modules\Share\Components\Panel;

use Illuminate\View\Component;

class File extends Component
{
    public string $name;
    public string $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Share::components.panel.file');
    }
}
