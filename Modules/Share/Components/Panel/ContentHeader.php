<?php

namespace Modules\Share\Components\Panel;

use Illuminate\View\Component;

class ContentHeader extends Component
{
    public string $title;
    public ?string $createTitle;
    public ?string $createRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $createTitle = null, $createRoute = null)
    {
        $this->title = $title;
        $this->createTitle = $createTitle;
        $this->createRoute = $createRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Share::components.panel.content-header');
    }
}
