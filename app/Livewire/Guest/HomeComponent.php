<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        return view('livewire.guest.home-component')->extends('layouts.guest');
    }
}
