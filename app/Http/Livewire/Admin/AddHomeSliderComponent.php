<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;


class AddHomeSliderComponent extends Component
{
	use WithFileUploads;
	public $title;
	public $subtitle;
	public $highlight;
	public $link;
	public $image;
	public $status;

	public function mount()
	{
		$this->status=0; // default value pentru status;
	}

	public function addSlide()
	{
		$slider=new HomeSlider();
		$slider->title = $this->title;
		$slider->subtitle = $this->subtitle;
		$slider->highlight = $this->highlight;
		$slider->link = $this->link;
		$imagename=Carbon::now()->timestamp. '.' . $this->image->extension();
		$this->image->storeAs('hero',$imagename);
		$slider->image = $imagename;
		$slider->status = $this->status;
		$slider->save();
		session()->flash('message','Home Page Slider has been successfully generated!');
	}

    public function render()
    {
        return view('livewire.admin.add-home-slider-component')->layout('layouts.base');
    }
}
