<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserMngComponent extends Component
{
	use WithPagination;
    public function render()
    {
    	$users=User::paginate(5);
        return view('livewire.admin.user-mng-component',['users'=>$users])->layout('layouts.base');
    }
}
