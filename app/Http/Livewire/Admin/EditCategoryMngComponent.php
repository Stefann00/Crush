<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;


class EditCategoryMngComponent extends Component
{
	public $category_slug;
	public $category_id;
	public $name;
	public $slug;
//this znaci od ovie gore, od ovaj dokumenti

	public function mount($category_slug) // Da editira kategorijata koja e izbrana od web.php
	{
		$this->category_slug=$category_slug;
		$category=Category::where('slug',$category_slug)->first();
		$this->category_id=$category->id;
		$this->name=$category->name;
		$this->slug=$category->slug;
	}
	
	public function automaticslug() 
	{
		$this->slug=Str::slug($this->name);

	}

	public function updated($fields) // updated odi so validateOnly, proverva vo real time. $fields e argument od imeto koe go proveruva (pr name ili slug)
	{
		$this->validateOnly($fields,[
			'name'=>'required',
			'slug'=>'required|unique:categories',
		]);
	}

	public function updateCategory() 
	{

		$this->validate([
			'name'=>'required',
			'slug'=>'required|unique:categories', // unique raboti spored model.
		]);
		$category=Category::find($this->category_id); // najdi ja spored idot koj go imame staveno vo ovaa funkcioja
		$category->name=$this->name;
		$category->slug=$this->slug;
		$category->save();
		session()->flash('ctgmessage','The category has been successfully updated!');
	}

    public function render()
    {
        return view('livewire.admin.edit-category-mng-component')->layout('layouts.base');
    }
}
