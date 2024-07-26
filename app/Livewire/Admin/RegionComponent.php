<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class RegionComponent extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $search;

	protected $queryString = ['search'];

	public $region_id;
	public $region_name;
	public $districts;
	public $district_name = [];
	public $town_locality = [];

    public function render()
    {
	    $this->authorize('regions.list');

	    return view('livewire.admin.region-component',[
			'regions' => \App\Models\Region::withCount('districts')
				->oldest('name')
				->where('name', 'like', '%'.$this->search.'%')
				->paginate(10),
        ])->extends('layouts.app');
    }

	public function addDistrict()
	{
		$this->district_name[] = '';
		$this->town_locality[] = '';
	}

	public function removeDistrict($index)
	{
		unset($this->district_name[$index]);
        unset($this->town_locality[$index]);

		$this->district_name = array_values($this->district_name);
        $this->town_locality = array_values($this->town_locality);
	}

	public function store()
	{
		$this->authorize('regions.create');

		$this->validate([
			'region_name' => 'required|unique:regions,name',
			'district_name.*' => 'required',
            'town_locality.*' => 'required',
		]);

		$this_regions = \App\Models\Region::create([
			'name' => $this->region_name,
			'code' => strtoupper(substr($this->region_name, 0, 3)),
		]);

		if ($this->district_name !== []) {
			// attach districts to region
			foreach ($this->district_name as $district_name) {
				\App\Models\District::create([
					'region_id' => $this_regions->id,
					'name' => $district_name,
					'code' => strtoupper(substr($district_name, 0, 3)),
                    'town_locality' => $this->town_locality[array_search($district_name, $this->district_name)],
				]);
			}
		}

		$this->reset('region_name', 'district_name', 'town_locality');

		return redirect()->route('regions')->with('success', 'Region created successfully.');
	}

	public function edit($id)
	{
		$this->authorize('regions.edit');

		$region = \App\Models\Region::findOrFail($id);
		$this->region_id = $region->id;
		$this->region_name = $region->name;
		$this->districts = \App\Models\District::where('region_id', $region->id)->get();
	}

	public function update()
	{
		$this->authorize('regions.edit');

		$this->validate([
			'region_name' => 'required|unique:regions,name,'.$this->region_id,
		]);

		$region = \App\Models\Region::findOrFail($this->region_id);
		$region->update([
			'name' => $this->region_name,
			'code' => strtoupper(substr($this->region_name, 0, 3)),
		]);

		if ($this->district_name !== []) {
			// attach districts to region
			foreach ($this->district_name as $district_name) {
				\App\Models\District::create([
					'region_id' => $region->id,
					'name' => $district_name,
					'code' => strtoupper(substr($district_name, 0, 3)),
                    'town_locality' => $this->town_locality[array_search($district_name, $this->district_name)],
				]);
			}
		}

		$this->reset('region_id', 'region_name', 'district_name', 'town_locality');

		return redirect()->route('regions')->with('success', 'Region updated successfully.');
	}

	public function delete($id)
	{
		$this->authorize('regions.delete');

		$region = \App\Models\Region::findOrFail($id);

		// check if region has districts
		if ($region->districts->count() > 0) {
			return redirect()->route('regions')->with('error', 'Region has districts. Delete districts first.');
		}

		$region->forceDelete();

		return redirect()->route('regions')->with('success', 'Region deleted successfully.');
	}

	public function deleteDistrict($id)
	{
		$this->authorize('regions.delete');

		// get district
		$district = \App\Models\District::findOrFail($id);

		// delete district
		$district->forceDelete();

		// refresh districts
		$this->districts = \App\Models\District::where('region_id', $this->region_id)->get();
//		return redirect()->route('regions')->with('success', 'District deleted successfully.');
	}
}
