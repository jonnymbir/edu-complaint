<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DashboardComponent extends Component
{
	public $date_search;

	public function mount()
	{
		$this->date_search = date('F');
	}

    public function render()
    {
        return view('livewire.admin.dashboard-component',[
			'recent_complaints' => \App\Models\Complaint::with('comments')
	        				->latest()
							->whereMonth('created_at', $this->date_search ? date('m', strtotime($this->date_search)) : date('m'))
	        				->take(10)
	        				->get(),

	        'total_complaints' => \App\Models\Complaint::count(),
	        'complaints_addressed' => \App\Models\Complaint::where('status', 'resolved')->count(),
	        'complaints_forwarded' => \App\Models\Complaint::where('is_forwarded', true)->count(),
	        'complaints_overdue' => \App\Models\Complaint::where('status', 'overdue')->count(),
	        'count_users' => \App\Models\User::count(),
        ])->extends('layouts.app');
    }
}
