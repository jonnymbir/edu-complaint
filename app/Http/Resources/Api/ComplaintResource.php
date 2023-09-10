<?php

namespace App\Http\Resources\Api;

use App\Models\District;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $first_name
 * @property mixed $middle_name
 * @property mixed $last_name
 * @property mixed $email_address
 * @property mixed $telephone
 * @property mixed $sex
 * @property mixed $age_range
 * @property Region $region
 * @property District $district
 * @property mixed $stakeholder_type
 * @property mixed $concern
 * @property mixed $details
 * @property array $attachments
 * @property mixed $response_channel
 * @property bool $is_anonymous
 * @property mixed $status
 */
class ComplaintResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
	        'first_name' => $this->first_name,
	        'middle_name' => $this->middle_name,
	        'last_name' => $this->last_name,
	        'email_address' => $this->email_address,
	        'telephone' => $this->telephone,
	        'sex' => $this->sex,
	        'age_range' => $this->age_range,
	        'region' => $this->region->name,
	        'district' => $this->district->name,
	        'stakeholder_type' => $this->stakeholder_type,
	        'concern' => $this->concern,
	        'details' => $this->details,
	        'attachments' => $this->attachments,
	        'response_channel' => $this->response_channel,
	        'is_anonymous' => $this->is_anonymous ? 'Yes' : 'No',
	        'status' => $this->status,
        ];
    }
}
