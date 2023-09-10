<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class DashboardComponent extends Component
{
	public $date_search;
	public $filter;

	public function mount()
	{
		$this->date_search = date('F');
	}

    public function render()
    {
		$this->authorize('dashboard.view');

        return view('livewire.admin.dashboard-component',[
			'recent_complaints' => \App\Models\Complaint::with(['comments', 'complaintCategory'])
	        				->latest()
							->whereMonth('created_at', $this->date_search ? date('m', strtotime($this->date_search)) : date('m'))
	        				->take(20)
	        				->get(),

	        'total_complaints' => \App\Models\Complaint::count(),
	        'complaints_addressed' => \App\Models\Complaint::where('status', 'resolved')->count(),
	        'complaints_forwarded' => \App\Models\Complaint::where('is_forwarded', true)->count(),
	        'complaints_overdue' => \App\Models\Complaint::where('response', null)
		        ->where(function ($query) {
			        $query->where('status','overdue')
				        ->orWhere('created_at', '<', now()->subDays(15));
		        })
		        ->count(),
	        'count_users' => \App\Models\User::count(),
        ])->extends('layouts.app');
    }
}
