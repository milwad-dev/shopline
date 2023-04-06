<?php

namespace Modules\Share\Components\Home;

use Illuminate\View\Component;

class TopSellProduct extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $imagePath,
        public string $path,
        public string $title,
        public string $rates,
        public string $price,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Share::components.home.top-sell-product');
    }
}
