<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class SearchComponent extends Component
{
	public $search;
	public $product_cat;

	public function mount() 
	{
		$this->product_cat='All Category';
		$this->fill(request()->only('search'));
	}
    public function render()
    {
        return view('livewire.search-component');
    }
}
