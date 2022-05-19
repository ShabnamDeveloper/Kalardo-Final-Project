<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StateCity extends Component
{
    public $state_id;
    public $city_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($state = null,$city = null)
    {
        $this->state_id = $state;
        $this->city_id = $city;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.state-city');
    }
}
