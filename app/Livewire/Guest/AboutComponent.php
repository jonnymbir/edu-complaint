<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        return view('livewire.guest.about-component')->extends('layouts.guest');
    }
}
