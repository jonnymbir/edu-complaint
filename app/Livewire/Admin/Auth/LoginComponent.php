<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;

class LoginComponent extends Component
{
	public $email;
	public $password;
	public $remember_me = false;

    public function render()
    {
        return view('livewire.admin.auth.login-component')->extends('layouts.auth');
    }

	public function login()
	{
		$this->validate([
			'email' => ['required', 'email', 'exists:users,email'],
			'password' => ['required', 'string']
		],
		[
			'email.exists' => "This email do not exist in our database"
		]);

		$credentials = [
			'email' => $this->email,
			'password' => $this->password
		];

		if (auth()->attempt($credentials, $this->remember_me))
		{
			activity()
				->causedBy(auth()->user())
				->performedOn(auth()->user())
				->event('logged_in to the system')
				->log('User logged in to the system successfully with email: ' . $this->email . ' at ' . now());

			return redirect()->route('dashboard')->with('success', 'You are now logged in');
		}

		return redirect()->route('login')->with('error', 'Invalid Credentials');
	}
}
