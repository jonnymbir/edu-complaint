<?php

namespace App\Livewire\Admin;

use App\Models\Complaint;
use App\Models\District;
use App\Models\Division;
use App\Models\Unit;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use JsonException;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ComplaintComponent extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';

	public $search;

	protected $queryString = ['search'];

	public $ticket_number;
	#[Rule('required|string')]
	public ?string $first_name = null;
	public ?string $middle_name = null;
	#[Rule('required|string')]
	public ?string $last_name = null;
	#[Rule('required|string')]
	public ?string $email_address;
	#[Rule('required|digits_between:10,12')]
	public ?string $telephone;
	#[Rule('required|string|in:male,female')]
	public ?string $sex = 'male';
	#[Rule('required|string')]
	public ?string $age_range = null;
	#[Rule('required|exists:regions,id')]
	public mixed $region = null;
	#[Rule('required|exists:districts,id')]
	public mixed $district;
	#[Rule('required|string')]
	public ?string $stakeholder_type;
	#[Rule('required|string')]
	public ?string $concern;
	#[Rule('required|string')]
	public ?string $details;
	#[Rule('nullable|array|max:3')]
	public ?array $attachments = [];
	#[Rule('required|string')]
	public ?string $response_channel;
	#[Rule('required|boolean')]
	public ?bool $is_anonymous = false;
	public ?string $status = 'pending';

	public Collection $regions;
	public Collection $districts;

	public $complaint;
	public mixed $comment;
	public mixed $response;

	public $forward_type;
	public ?int $division = null;
	public ?int $unit = null;
	public ?string $div_email;
	public ?string $unit_email;
	public mixed $cc;

	public function mount(): void
	{
		$this->regions = \App\Models\Region::oldest('name')->get();
		$this->districts = collect();

		$this->region = 0;
		$this->district = 0;
	}

    public function render()
    {
        return view('livewire.admin.complaint-component',[
			'complaints' => Complaint::with('comments')
	        				->latest()
							->where('ticket_number', 'like', '%'.$this->search.'%')
	        				->paginate(10),
	        'divisions' => \App\Models\Division::all(),
	        'units' => \App\Models\Unit::all(),
        ])->extends('layouts.app');
    }

	public function updatedRegion($region): void
	{
		if (!is_null($region)) {
			$this->districts = District::where('region_id', $region)->get();
			$this->district = 0;
		}
	}

	public function resetForm(): void
	{
		$this->first_name = null;
		$this->middle_name = null;
		$this->last_name = null;
		$this->email_address = null;
		$this->telephone = null;
		$this->sex = 'male';
		$this->region = null;
		$this->district = null;
		$this->stakeholder_type = null;
		$this->concern = null;
		$this->details = null;
		$this->attachments = [];
		$this->response_channel = null;
		$this->is_anonymous = false;
		$this->status = 'pending';
	}

	public function view($id): void
	{
		$this->complaint = Complaint::findOrFail($id);

		$this->ticket_number = $this->complaint->ticket_number;
		$this->first_name = $this->complaint->first_name;
		$this->middle_name = $this->complaint->middle_name;
		$this->last_name = $this->complaint->last_name;
		$this->email_address = $this->complaint->email_address;
		$this->telephone  = $this->complaint->telephone;
		$this->sex  = $this->complaint->sex;
		$this->age_range  = $this->complaint->age_range;
		$this->region  = \App\Models\Region::find($this->complaint->region_id)->name;
		$this->district  = \App\Models\District::find($this->complaint->district_id)->name;
		$this->stakeholder_type  = $this->complaint->stakeholder_type;
		$this->concern  = $this->complaint->concern;
		$this->details  = $this->complaint->details;
		$this->attachments  = $this->complaint->attachments;
		$this->response_channel  = $this->complaint->response_channel;
		$this->is_anonymous  = $this->complaint->is_anonymous === 1 ? "Yes" : "No";
		$this->status  = $this->complaint->status;
	}

	public function showCommentForm($id): void
	{
		$this->complaint = Complaint::findOrFail($id);
		$this->response = $this->complaint->response;
	}

	public function submitComment(): void
	{
		$this->validate([
			'comment' => 'required',
		]);

		$this->complaint->comments()->create([
			'comment' => $this->comment,
			'user_id' => auth()->user()->id,
			'complaint_id' => $this->complaint->id,
		]);

		activity()
			->causedBy(auth()->user())
			->performedOn($this->complaint)
			->event('commented on complaint')
			->log('Comment added successfully by ' . auth()->user()->name . '.');

		$this->reset('comment');

		toastr()->success('Comment added successfully.');
		session()->flash('success', 'Comment added successfully.');
	}

	public function submitResponse(): void
	{
		$this->validate([
			'response' => 'required',
		]);

		$this->complaint->update([
			'response' => $this->response,
			'status' => 'responded',
		]);

		activity()
			->causedBy(auth()->user())
			->performedOn($this->complaint)
			->event('responded to complaint')
			->log('Complaint responded to successfully by ' . auth()->user()->name . '.');

		toastr()->success('Response added successfully.');
		session()->flash('success', 'Response added successfully.');
	}

	/**
	 * @throws JsonException
	 */
	public function createComplaint ()
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

		activity()
			->causedBy(auth()->user())
			->performedOn($this->complaint)
			->event('created complaint')
			->log('Complaint created successfully by ' . auth()->user()->name . '.');

		$this->reset();

		$this->regions = \App\Models\Region::oldest('name')->get();
		$this->districts = collect();

		$this->region = 0;
		$this->district = 0;

//		session()->flash('success', 'Complaint submitted successfully');
//		toastr()->success('Complaint submitted successfully!', 'Thank you');
		return redirect()->route('complaints')->with('success', 'Complaint submitted successfully');
	}

	public function updatedDivision(): void
	{
		$this->div_email = Division::where('id', $this->division)->first()->div_email;
	}

	public function updatedUnit(): void
	{
		$this->unit_email = Unit::where('id', $this->unit)->first()->unit_email;
	}

	public function forwardComplaint(): void
	{
		sleep(1);

		$this->validate([
			'forward_type' => 'required|string|in:division,unit',
			'cc' => 'nullable|string',
		]);

		if ($this->forward_type === 'division') {
			$this->validate([
				'division' => 'required|exists:divisions,id',
			]);
		} else {
			$this->validate([
				'unit' => 'required|exists:units,id',
			]);
		}

		$div = Division::where('id', $this->division)->first();
		$uni = Unit::where('id', $this->unit)->first();

		try {
			DB::beginTransaction();

			$this->complaint->update([
				'is_forwarded' => true,
				'times_forwarded' => $this->complaint->times_forwarded + 1,
				'status' => 'forwarded',
			]);

			activity()
				->causedBy(auth()->user())
				->performedOn($this->complaint)
				->event('forwarded')
				->log('Complaint forwarded to ' . $this->forward_type === 'division' ? $div?->div_name : $uni?->unit_name . ' successfully by ' . auth()->user()->name . '.');

			$data = [
				'complaint' => $this->complaint,
				'forward_type' => $this->forward_type,
				'email' => $this->forward_type === 'division' ? $this->div_email : $this->unit_email,
				'cc' => $this->cc,
			];

			$ccRecipients = [$this->cc];

			// send mail to division with cc and bcc
			Mail::send('emails.forward_complaint_mail', $data, function ($message) use ($div, $uni, $ccRecipients) {
				$message->from(config('mail.from.address'), config('mail.from.name'));
				$message->to($this->forward_type === 'division' ? $this->div_email : $this->unit_email, $this->forward_type === 'division' ? $div->div_contact_person : $uni->unit_contact_person);
//				$message->cc($ccRecipients);
				$message->subject('Forwarded Complaint');
			});

			DB::commit();

			session()->flash('success', 'Complaint forwarded successfully.');
			toastr()->success('Complaint forwarded successfully.');
		} catch (Exception $e) {
			DB::rollBack();
			activity()
				->causedBy(auth()->user())
				->performedOn($this->complaint)
				->event('forwarded')
				->log('Complaint forwarding failed to ' . $this->forward_type === 'division' ? $div?->div_name : $uni?->unit_name . ' by ' . auth()->user()->name . '.');

			toastr()->error('Complaint forwarding failed. ' . $e->getMessage());
			session()->flash('error', 'Complaint forwarding failed.' . $e->getMessage());
		}
	}
}
