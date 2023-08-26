<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class DivisionComponent extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $search;

	protected $queryString = ['search'];

	public $division_id;
	public ?string $div_name = null;
	public ?string $div_email = null;
	public ?string $div_contact_person = null;
	public ?string $div_contact_person_telephone = null;
	public ?string $div_cc = null;

    public function render()
    {
        return view('livewire.admin.division-component',[
			'divisions' => \App\Models\Division::query()
				->latest()
                ->where(function ($query) {
                    $query->where('div_name', 'like', '%'.$this->search.'%')
                        ->orWhere('div_email', 'like', '%'.$this->search.'%')
                        ->orWhere('div_contact_person', 'like', '%'.$this->search.'%');
                })
                ->paginate(10),
        ])->extends('layouts.app');
    }

	public function store()
	{
		$this->authorize('divisions.create');

		$this->validate([
			'div_name' => 'required|unique:divisions,div_name',
			'div_email' => 'required|email',
			'div_contact_person' => 'required',
			'div_contact_person_telephone' => 'required',
			'div_cc' => 'required',
		]);

		\App\Models\Division::create([
			'div_name' => $this->div_name,
			'div_email' => $this->div_email,
			'div_contact_person' => $this->div_contact_person,
			'div_contact_person_telephone' => $this->div_contact_person_telephone,
			'div_cc' => $this->div_cc,
		]);

		$this->reset();

		return redirect()->route('divisions')->with('success', 'Division added successfully.');
	}

	public function edit($id)
	{
		$this->authorize('divisions.edit');

		$division = \App\Models\Division::findOrFail($id);

		$this->division_id = $division->id;
		$this->div_name = $division->div_name;
		$this->div_email = $division->div_email;
		$this->div_contact_person = $division->div_contact_person;
		$this->div_contact_person_telephone = $division->div_contact_person_telephone;
		$this->div_cc = $division->div_cc;
	}

	public function update()
	{
		$this->authorize('divisions.edit');

		$this->validate([
			'div_name' => 'required|unique:divisions,div_name,'.$this->division_id,
			'div_email' => 'required|email',
			'div_contact_person' => 'required',
			'div_contact_person_telephone' => 'required',
			'div_cc' => 'required',
		]);

		$division = \App\Models\Division::findOrFail($this->division_id);

		$division->update([
			'div_name' => $this->div_name,
			'div_email' => $this->div_email,
			'div_contact_person' => $this->div_contact_person,
			'div_contact_person_telephone' => $this->div_contact_person_telephone,
			'div_cc' => $this->div_cc,
		]);

		$this->reset();

		return redirect()->route('divisions')->with('success', 'Division updated successfully.');
	}

	public function delete($id)
	{
		$this->authorize('divisions.delete');

		$division = \App\Models\Division::findOrFail($id);

		$division->delete();

		return redirect()->route('divisions')->with('success', 'Division deleted successfully.');
	}
}
