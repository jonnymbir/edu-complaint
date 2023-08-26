<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class UnitComponent extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $search;

	protected $queryString = ['search'];

	public $unit_id;
	public ?string $unit_name = null;
	public ?string $unit_email = null;
	public ?string $unit_contact_person = null;
	public ?string $unit_contact_person_telephone = null;
	public ?string $unit_cc = null;

    public function render()
    {
        return view('livewire.admin.unit-component',[
	        'units' => \App\Models\Unit::query()
		        ->latest()
		        ->where(function ($query) {
			        $query->where('unit_name', 'like', '%'.$this->search.'%')
				        ->orWhere('unit_email', 'like', '%'.$this->search.'%')
				        ->orWhere('unit_contact_person', 'like', '%'.$this->search.'%');
		        })
		        ->paginate(10),
        ])->extends('layouts.app');
    }

	public function store()
	{
		$this->authorize('units.create');

		$this->validate([
			'unit_name' => 'required|unique:units,unit_name',
			'unit_email' => 'required|email',
			'unit_contact_person' => 'required',
			'unit_contact_person_telephone' => 'required',
			'unit_cc' => 'required',
		]);

		\App\Models\Unit::create([
			'unit_name' => $this->unit_name,
			'unit_email' => $this->unit_email,
			'unit_contact_person' => $this->unit_contact_person,
			'unit_contact_person_telephone' => $this->unit_contact_person_telephone,
			'unit_cc' => $this->unit_cc,
		]);

		$this->reset();

		return redirect()->route('units')->with('success', 'Unit added successfully.');
	}

	public function edit($id)
	{
		$this->authorize('units.edit');

		$unit = \App\Models\Unit::findOrFail($id);

		$this->unit_id = $unit->id;
		$this->unit_name = $unit->unit_name;
		$this->unit_email = $unit->unit_email;
		$this->unit_contact_person = $unit->unit_contact_person;
		$this->unit_contact_person_telephone = $unit->unit_contact_person_telephone;
		$this->unit_cc = $unit->unit_cc;
	}

	public function update()
	{
		$this->authorize('units.edit');

		$this->validate([
			'unit_name' => 'required|unique:units,unit_name,'.$this->unit_id,
			'unit_email' => 'required|email',
			'unit_contact_person' => 'required',
			'unit_contact_person_telephone' => 'required',
			'unit_cc' => 'required',
		]);

		$unit = \App\Models\Unit::findOrFail($this->unit_id);

		$unit->update([
			'unit_name' => $this->unit_name,
			'unit_email' => $this->unit_email,
			'unit_contact_person' => $this->unit_contact_person,
			'unit_contact_person_telephone' => $this->unit_contact_person_telephone,
			'unit_cc' => $this->unit_cc,
		]);

		$this->reset();

		return redirect()->route('units')->with('success', 'Unit updated successfully.');
	}

	public function delete($id)
	{
		$this->authorize('units.delete');

		$unit = \App\Models\Unit::findOrFail($id);

		$unit->delete();

		return redirect()->route('units')->with('success', 'Unit deleted successfully.');
	}
}
