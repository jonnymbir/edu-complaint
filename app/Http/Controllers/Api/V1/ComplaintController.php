<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegionResource;
use App\Models\Complaint;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

		Complaint::create([
			'first_name' => $request->first_name,
			'middle_name' => $request->middle_name,
			'last_name' => $request->last_name,
			'email_address' => $request->email_address,
			'telephone' => $request->telephone,
			'sex' => $request->sex,
			'age_range' => $request->age_range,
			'region_id' => $request->region,
			'district_id' => $request->district,
			'stakeholder_type' => $request->stakeholder_type,
			'concern' => $request->concern,
			'details' => $request->details,
			'attachments' => isset($attachments) ? json_encode($attachments, JSON_THROW_ON_ERROR) : null,
			'response_channel' => $request->response_channel,
			'is_anonymous' => $request->is_anonymous,
			'status' => 'pending',
		]);

		return response()->json([
			'status' => 'success',
			'message' => 'Complaint submitted successfully',
			'data' => $request->all(),
		]);
	}
}
