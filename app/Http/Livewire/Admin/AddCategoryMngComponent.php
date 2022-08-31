<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AddCategoryMngComponent extends Component
{
	public $name;
	public $slug;

	public function automaticslug() 
	{
		$this->slug=Str::slug($this->name);
	}

	public function updated($fields) // updated odi so validateOnly, proverva vo real time. $fields e argument od imeto koe go proveruva (pr name ili slug)
	{
		$this->validateOnly($fields,[
			'name'=>'required',
			'slug'=>'required|unique:categories'
		]);
	}

	public function storeCategory() 
	{
		$this->validate([
			'name'=>'required',
			'slug'=>'required|unique:categories' // unique raboti spored model.
		]);
		$category=new Category();
		$category->name=$this->name;
		$category->slug=$this->slug;
		$category->save();
		session()->flash('ctgmessage','A new category has been sucessfully created!');
	}
    public function render()
    {
        return view('livewire.admin.add-category-mng-component')->layout('layouts.base');
    }
}
