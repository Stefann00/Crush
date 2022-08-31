<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;

class MngAddAttributeComponent extends Component
{
	public $name;

	public function updated($fields)
	{
		$this->validateOnly($fields,[
			"name"=>"required"
		]);
	}

	public function storeAttribute()
	{
		$this->validate([
			"name"=>"required"
		]);

		$attribute=new ProductAttribute();
		$attribute->atname=$this->name;
		$attribute->save(); 
		session()->flash('message','A new attribute has been successfully created!');
	}

    public function render()
    {
        return view('livewire.admin.mng-add-attribute-component')->layout('layouts.base');
    }
}
