<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class MngHomeSliderComponent extends Component
{
    public function render()
    {
    	$sliders=HomeSlider::all();
        return view('livewire.admin.mng-home-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
