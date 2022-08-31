<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePasswordComponent extends Component
{
	public $current_password;
	public $password;
	public $password_confirmation;

	public function updated($fields)
	{
		$this->validateOnly($fields,[
			'current_password'=>'required|min:8',
			'password'=>'required|min:8|different:current_password',
			'password_confirmation'=>'required|min:8|same:password'
				]);
	}

	public function changePassword()
	{
		$this->validate([
			'current_password'=>'required|min:8',
			'password'=>'required|min:8|different:current_password',
			'password_confirmation'=>'required|min:8|same:password'
		]);

		if(Hash::check($this->current_password,Auth::user()->password))
		{
			$user=User::findOrFail(Auth::user()->id);
			$user->password=Hash::make($this->password);
			$user->save();
			session()->flash('password_success','Password has been successfully updated');
		}
		else
		{
			session()->flash('password_error','You have specified an incorrect password! Please check your password and try again!');
		}
	}

    public function render()
    {
        return view('livewire.user.change-password-component')->layout('layouts.base');
    }
}
