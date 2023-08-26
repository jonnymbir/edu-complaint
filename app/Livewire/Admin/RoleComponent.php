<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class RoleComponent extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $search;

	protected $queryString = ['search'];

	public string $name;
	public int $role_id;

    public function render()
    {
        return view('livewire.admin.role-component',[
			'roles' => \Spatie\Permission\Models\Role::latest()
				->where('name', 'like', '%'.$this->search.'%')
				->paginate(10),
        ])->extends('layouts.app');
    }

	public function store()
	{
		$this->validate([
			'name' => 'required|unique:roles,name',
		]);

		$role = \Spatie\Permission\Models\Role::create([
			'name' => $this->name,
		]);

		$this->reset();

		return redirect()->route('roles')->with('success', 'Role created successfully.');
	}

	public function edit($id)
	{
		$role = \Spatie\Permission\Models\Role::findOrFail($id);
		$this->name = $role->name;
		$this->role_id = $role->id;
	}

	public function update()
	{
		$this->validate([
			'name' => 'required|unique:roles,name,'.$this->role_id,
		]);

		$role = \Spatie\Permission\Models\Role::findOrFail($this->role_id);
		$role->update([
			'name' => $this->name,
		]);

		$this->reset();

		return redirect()->route('roles')->with('success', 'Role updated successfully.');
	}

//	public function destroy($id)
//	{
//		$role = \Spatie\Permission\Models\Role::findOrFail($id);
//		$role->delete();
//
//		return redirect()->route('roles')->with('success', 'Role deleted successfully.');
//	}
}
