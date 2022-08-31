<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Contact;

class ContactComponent extends Component
{
	public $name;
	public $email;
	public $message;

	public function mount()
	{
		if(Auth::check())
		{
		$this->email=Auth::user()->email;
		}
	else 
		$this->email="Email";

	}

	public function updated($fields)
	{
		$this->validateOnly($fields,[
			'name'=>'required',
			'email'=>'required|email',
			'message'=>'required'
		]);
	}

	public function sendMessage() 
	{
		$this->validate([
			'name'=>'required',
			'email'=>'required|email',
			'message'=>'required'
		]);

		$contact = new Contact();
		$contact->name=$this->name;
		$contact->email=$this->email;
		$contact->message=$this->message;
		$contact->save();
		session()->flash('message','Thank you for reaching out! Your message has been forwarded to the Site Administrators!');

	}
	
    public function render()
    {
        return view('livewire.contact-component')->layout('layouts.base');
    }
}
