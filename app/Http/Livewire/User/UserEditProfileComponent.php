<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
	use WithFileUploads;
	public $name;
	public $email;
	public $phone;
	public $address1;
	public $address2;
	public $image;
	public $city;
	public $province;
	public $state;
	public $country;
	public $zipcode;
	public $newimage;

	public function mount()
	{
		$user=User::find(Auth::user()->id);
		$this->name = $user->name;
		$this->email = $user->email;
		$this->phone = $user->profile->phone;
		$this->address1 = $user->profile->address1;
		$this->address2 = $user->profile->address2;
		$this->image = $user->image;
		$this->province = $user->profile->province;
		$this->state = $user->profile->state;
		$this->city = $user->profile->city;
		$this->country = $user->profile->country;
		$this->zipcode = $user->profile->zipcode;
	}

	public function updateProfile()
	{
		$user=User::find(Auth::user()->id);
		$user->name = $this->name;
		$user->save();

		if($this->newimage)
		{
			if($this->image)
			{
				unlink('img/profile/'.$this->image); // ja brisi slikata od path-ot
			}
			$imageName=Carbon::now()->timestamp . '.' . $this->newimage->extension();
			$this->newimage->storeAs('profile',$imageName);
			$user->profile->image=$imageName; // tehnicki imeto na slikata, posto vekje path-ot e sproveden do profile
		}

		$user->profile->phone=$this->phone;
		$user->profile->address1=$this->address1;
		$user->profile->address2=$this->address2;
		$user->profile->city=$this->city;
		$user->profile->province=$this->province;
		$user->profile->country=$this->country;
		$user->profile->zipcode=$this->zipcode;
		$user->profile->save();
		session()->flash('message','Profile has been successfully updated!');
		redirect()->route('user.profile');
		}


    public function render()
    {
    	$user=User::find(Auth::user()->id);
        return view('livewire.user.user-edit-profile-component',['user'=>$user])->layout('layouts.base');
    }
    
}
