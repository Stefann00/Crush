<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryMngComponent extends Component
{

	public function removeCategory($id) 
	{
		$category=Category::find($id);
		$category->delete();
		session()->flash('message','Category successfully deleted!');
	}

	use WithPagination;
    public function render()
    {
    	$categories=Category::paginate(5);
        return view('livewire.admin.category-mng-component',['categories'=>$categories])->layout('layouts.base');
    }
}
