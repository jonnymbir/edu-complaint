<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $search;

	protected $queryString = ['search'];

	public $name, $first_name, $last_name, $email, $password = 'changeme', $role;
	public $user_id = null;

	public function render()
	{
		return view('livewire.admin.user-component',[
			'users' => \App\Models\User::with('roles')
				->latest()
				->where(function ($query) {
					$query->where('name', 'like', '%'.$this->search.'%')
						->orWhere('email', 'like', '%'.$this->search.'%');
				})
				->paginate(10 ),
			'roles' => \Spatie\Permission\Models\Role::all(),
		])->extends('layouts.app');
	}

	public function updatingSearch()
	{
		$this->resetPage();
	}

	public function store()
	{
		$this->validate([
			'name' => 'required|min:3',
			'first_name' => 'required|min:3',
			'last_name' => 'required|min:3',
			'email' => 'required|email|unique:users,email',
			'password' => 'nullable|min:6',
			'role' => 'nullable|exists:roles,name',
		]);

		$user = \App\Models\User::create([
			'name' => $this->name,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'email' => $this->email,
			'password' => $this->password ? bcrypt($this->password) : bcrypt('changeme'),
		]);

		$user->assignRole($this->role);

		$this->reset();

		return redirect()->route('users')->with('success', 'User created successfully.');
	}

	public function edit($id)
	{
		$user = \App\Models\User::findOrFail($id);

		$this->user_id = $user->id;
		$this->name = $user->name;
		$this->first_name = $user->first_name;
		$this->last_name = $user->last_name;
		$this->email = $user->email;
		$this->password = null;
		$this->role = $user->roles->pluck('name');
	}

	public function update()
	{
		$this->validate([
			'name' => 'required|min:3',
			'first_name' => 'required|min:3',
			'last_name' => 'required|min:3',
			'email' => 'required|email|unique:users,email,'.$this->user_id,
			'password' => 'nullable|min:6',
			'role' => 'nullable|exists:roles,name',
		]);

		$user = \App\Models\User::findOrFail($this->user_id);

		$user->update([
			'name' => $this->name,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'email' => $this->email,
			'password' => $this->password ? bcrypt($this->password) : $user->password,
		]);

		$user->syncRoles($this->role);

		$this->reset();

		return redirect()->route('users')->with('success', 'User updated successfully.');
	}

	public function delete($id)
	{
		$user = \App\Models\User::findOrFail($id);

		// check if user has any comments
		if ($user->comments()->count() > 0) {
			return redirect()->route('users')->with('error', 'User has comment records. Delete comments first.');
		}

		$user->forceDelete();

		return redirect()->route('users')->with('success', 'User deleted successfully.');
	}
}
