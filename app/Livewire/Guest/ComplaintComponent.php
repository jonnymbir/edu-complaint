<?php

namespace App\Livewire\Guest;

use App\Models\Complaint;
use App\Models\District;
use Illuminate\Support\Collection;
use JsonException;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ComplaintComponent extends Component
{
	use WithFileUploads;

	#[Rule('required|string')]
	public string $first_name;
	public string $middle_name;
	#[Rule('required|string')]
	public string $last_name;
	#[Rule('required|string')]
	public string $email_address;
	#[Rule('required|digits_between:10,12')]
	public string $telephone;
	#[Rule('required|string|in:male,female')]
	public string $sex = 'male';
	#[Rule('required|exists:regions,id')]
	public $region = null;
	#[Rule('required|exists:districts,id')]
	public int $district;
	#[Rule('required|string')]
	public string $stakeholder_type;
	#[Rule('required|string')]
	public string $concern;
	#[Rule('required|string')]
	public string $details;
	#[Rule('nullable|array|max:3')]
	public array $attachments = [];
	#[Rule('required|string')]
	public string $response_channel;
	#[Rule('required|boolean')]
	public bool $is_anonymous = false;
	public string $status = 'pending';

	public Collection $regions;
	public Collection $districts;

	public function mount(): void
	{
		$this->regions = \App\Models\Region::oldest('name')->get();
		$this->districts = collect();

		$this->region = 0;
		$this->district = 0;
	}

    public function render()
    {
        return view('livewire.guest.complaint-component')->extends('layouts.guest');
    }

	public function updatedRegion($region): void
	{
		if (!is_null($region)) {
			$this->districts = District::where('region_id', $region)->get();
		}
	}

	/**
	 * @throws JsonException
	 */
	public function publish_question (): void
	{
		$this->validate();

		// Upload attachments
		if (count($this->attachments) > 0) {
			$attachments = [];
			foreach ($this->attachments as $attachment) {
				$attachments[] = $attachment->store('attachments', 'public');
			}
		}

		Complaint::create([
			'first_name' => $this->first_name,
			'middle_name' => $this->middle_name,
			'last_name' => $this->last_name,
			'email_address' => $this->email_address,
			'telephone' => $this->telephone,
			'sex' => $this->sex,
			'region_id' => $this->region,
			'district_id' => $this->district,
			'stakeholder_type' => $this->stakeholder_type,
			'concern' => $this->concern,
			'details' => $this->details,
			'attachments' => isset($attachments) ? json_encode($attachments, JSON_THROW_ON_ERROR) : null,
			'response_channel' => $this->response_channel,
			'is_anonymous' => $this->is_anonymous,
		]);

		$this->reset();

		$this->regions = \App\Models\Region::oldest('name')->get();
		$this->districts = collect();

		$this->region = 0;
		$this->district = 0;

//		session()->flash('success', 'Complaint submitted successfully');
		toastr()->success('Complaint submitted successfully!', 'Thank you');
//		return redirect()->route('complaint');
	}
}
