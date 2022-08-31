<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;

class MngAttributeComponent extends Component
{
	public function removeAttribute($attribute_id)
	{
		$attribute=ProductAttribute::find($attribute_id);
		$attribute->delete();
		session()->flash('message','Attribute successfully deleted!');
	}

    public function render()
    {
    	$attributes=ProductAttribute::paginate(10);
        return view('livewire.admin.mng-attribute-component',['attributes'=>$attributes])->layout('layouts.base');
    }
}
