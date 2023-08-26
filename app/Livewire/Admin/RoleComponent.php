<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class RoleComponent extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $search;

	protected $queryString = ['search'];

	public ?string $name = '';
	public ?int $role_id;
	public ?array $selectedPermissions = [];
	public ?bool $selectAllPermissions = false;

    public function render()
    {
//		Loop through the permissions and display them by grouping them using their first common word
//		$permissions = \Spatie\Permission\Models\Permission::all();
//		$permissions = $permissions->groupBy(function ($item, $key) {
//			return explode('.', $item->name)[0];
//		})->toArray();

        return view('livewire.admin.role-component',[
			'roles' => \Spatie\Permission\Models\Role::latest()
				->where('name', 'like', '%'.$this->search.'%')
				->paginate(10),
	        'permissions' => \Spatie\Permission\Models\Permission::oldest('name')->get(),
        ])->extends('layouts.app');
    }

	public function resetFields(): void
	{
		$this->reset(['name', 'role_id', 'selectedPermissions']);
	}

	public function updatingSelectAllPermissions($value): void
	{
		if ($value) {
			$this->selectedPermissions = \Spatie\Permission\Models\Permission::all()->pluck('name')->toArray();
		} else {
			$this->selectedPermissions = [];
		}
	}

	public function store()
	{
		$this->authorize('roles.create');

		$this->name = Str::slug($this->name);

		$this->validate([
			'name' => 'required|unique:roles,name',
		]);

		$role = \Spatie\Permission\Models\Role::create([
			'name' => $this->name,
		]);

		if ($this->selectedPermissions) {
			$role->syncPermissions($this->selectedPermissions);
		}

		activity()
			->causedBy(auth()->user())
			->performedOn($role)
			->event('created role')
			->log($role->name.' role was created by '.auth()->user()->name.'.');

		$this->reset();

		return redirect()->route('roles')->with('success', 'Role created successfully.');
	}

	public function edit($id)
	{
		$this->authorize('roles.edit');

		$role = \Spatie\Permission\Models\Role::findOrFail($id);
		$this->name = Str::headline($role->name);
		$this->role_id = $role->id;
		$this->selectedPermissions = $role->permissions()->pluck('name')->toArray();
	}

	public function update()
	{
		$this->authorize('roles.edit');

		$this->name = Str::slug($this->name);

		$this->validate([
			'name' => 'required|unique:roles,name,'.$this->role_id,
		]);

		$role = \Spatie\Permission\Models\Role::findOrFail($this->role_id);
		$role->update([
			'name' => $this->name,
		]);

		if ($this->selectedPermissions) {
			$role->syncPermissions($this->selectedPermissions);
		}

		activity()
			->causedBy(auth()->user())
			->performedOn($role)
			->event('updated role')
			->log($role->name.' role was updated by '.auth()->user()->name.'.');

		$this->reset();

		return redirect()->route('roles')->with('success', 'Role updated successfully.');
	}

	public function delete($id)
	{
		$this->authorize('roles.delete');

		$role = \Spatie\Permission\Models\Role::findOrFail($id);

		// check if role has users
		if ($role->users()->count() > 0) {
			activity()
				->causedBy(auth()->user())
				->performedOn($role)
				->event('failed to delete role')
				->log('Failed to delete '.$role->name.' role because it has users assigned to it.');

			return redirect()->route('roles')->with('error', 'Role cannot be deleted because it has users assigned to it.');
		}

		activity()
		->causedBy(auth()->user())
		->performedOn($role)
		->event('deleted role')
		->log($role->name.' role was deleted by '.auth()->user()->name.'.');

		$role->delete();

		return redirect()->route('roles')->with('success', 'Role deleted successfully.');
	}
}
