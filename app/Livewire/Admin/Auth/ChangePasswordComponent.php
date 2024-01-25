<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;

class ChangePasswordComponent extends Component
{
    public $new_password;
    public $confirm_password;

    public function render()
    {
        return view('livewire.admin.auth.change-password-component')->extends('layouts.auth');
    }

    public function changePassword()
    {
        $this->validate([
            'new_password' => ['required', 'string', 'min:6'],
            'confirm_password' => ['required', 'string', 'same:new_password']
        ]);

        $user = auth()->user();
        $user->password = bcrypt($this->new_password);
        $user->password_changed_at = now();
        $user->save();

        activity()
            ->causedBy(auth()->user())
            ->performedOn(auth()->user())
            ->event('password_changed')
            ->log('User changed password successfully with email: ' . $user->email . ' at ' . now());

        return redirect()->route('dashboard')->with('success', 'Password changed successfully');
    }
}
