<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;

class MngEditAttributeComponent extends Component
{
	public $name;
	public $attribute_id;


	public function mount($attribute_id)
	{
		$attribute=ProductAttribute::find($attribute_id);
		$this->attribute_id=$attribute->id;
		$this->name = $attribute->atname;
	}

	public function updated($fields)
	{
		$this->validateOnly($fields,[
			"name"=>"required"
		]);
	}

	public function updateAttribute()
	{
		$this->validate([
			"name"=>"required"
		]);
		$attribute=ProductAttribute::find($this->attribute_id);
		$attribute->atname=$this->name;
		$attribute->save();
		session()->flash('message','The attribute has been successfully updated!');
	}

    public function render()
    {
        return view('livewire.admin.mng-edit-attribute-component')->layout('layouts.base');
    }
}
