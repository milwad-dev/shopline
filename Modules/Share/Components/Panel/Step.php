<?php

namespace Modules\Share\Components\Panel;

use Illuminate\View\Component;

class Step extends Component
{
    public string $id;
    public string $number;
    public string $title;
    public string $subtitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $number, $title, $subtitle)
    {
        $this->id = $id;
        $this->number = $number;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Share::components.panel.step');
    }
}
