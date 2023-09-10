<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ComplaintResource;
use App\Http\Resources\Api\RegionResource;
use App\Models\Complaint;
use App\Models\Region;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use JsonException;

class ComplaintController extends Controller
{
    public function getRegions()
    {
		$regions = Region::with(['districts'])->oldest('name')->get();

		return response()->json([
			'status' => 'success',
			'data' => RegionResource::collection($regions),
		]);
    }

	/**
	 * @throws JsonException
	 */
	public function publish_question (Request $request): \Illuminate\Http\JsonResponse
	{
		$validator = Validator::make($request->all(), [
			'first_name' => ['required', 'string'],
			'middle_name' => ['nullable', 'string'],
			'last_name' => ['required', 'string'],
			'email_address' => ['nullable', 'email'],
			'telephone' => ['required', 'digits_between:10,15'],
			'sex' => ['required', 'string', 'in:male,female'],
			'age_range' => ['required', 'string'], // 'required', 'string', 'in:0-17,18-35,36-50,51-65,66+
			'region' => ['required', 'exists:regions,id'],
			'district' => ['required', 'exists:districts,id'],
			'stakeholder_type' => ['required', 'string'],
			'concern' => ['required', 'string'],
			'details' => ['required', 'string'],
			'attachments' => ['nullable', 'array', 'max:3'],
			'attachments.*' => ['nullable', 'file', 'mimes:pdf,doc,docx,txt,jpg,jpeg,png'],
			'response_channel' => ['required', 'string'],
			'is_anonymous' => ['required', 'boolean', 'in:0,1'],
		]);

		if ($validator->fails()) {
			return response()->json([
				'status' => 'error',
				'message' => $validator->errors()
			],422);
		}

		// Upload attachments
		if ($request->hasFile('attachments')) {
			$attachments = [];
			foreach ($request->attachments as $attachment) {
				$attachments[] = $attachment->store('attachments', 'public');
			}
		}

		try {
			$complaint = Complaint::create([
				'first_name' => $request->input('first_name'),
				'middle_name' => $request->input('middle_name'),
				'last_name' => $request->input('last_name'),
				'email_address' => $request->input('email_address'),
				'telephone' => $request->input('telephone'),
				'sex' => $request->input('sex'),
				'age_range' => $request->input('age_range'),
				'region_id' => $request->input('region'),
				'district_id' => $request->input('district'),
				'stakeholder_type' => $request->input('stakeholder_type'),
				'concern' => $request->input('concern'),
				'details' => $request->input('details'),
				'attachments' => isset($attachments) ? json_encode($attachments, JSON_THROW_ON_ERROR) : null,
				'response_channel' => $request->input('response_channel'),
				'is_anonymous' => $request->input('is_anonymous'),
				'status' => 'pending',
			]);

			if ($request->input('response_channel') === "whatsapp" || $request->input('response_channel') === "WhatsApp"){
				Notification::route('broadcast', [new Channel('whatsapp')])
					->notify(new \App\Notifications\WhatsAppNotices($complaint));
			}

			return response()->json([
				'status' => 'success',
				'message' => 'Complaint submitted successfully',
				'data' => ComplaintResource::make($complaint),
			]);
		} catch (JsonException $e) {
			return response()->json([
				'status' => 'error',
				'message' => $e->getMessage(),
			], 500);
		}
	}
}
