<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Complaint Details - Complaint ID #{{ $complaint->ticket_number }}</title>
	<style>
        /* Add your CSS styling here */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .ticket-number {
            font-size: 24px;
            color: #007bff;
        }
        .complaint-details {
            margin-top: 20px;
        }
        .detail-label {
            font-weight: bold;
        }
        .detail-value {
            margin-left: 10px;
        }
        .response {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #fff;
        }
	</style>
</head>
<body>
<div class="container">
	<div class="header">
		<img src="{{ $message->embed(public_path() . '/assets/images/favicon.png') }}" alt="logo" width="150">
		<h1>User {{ $complaint->concern }} Details</h1>
		<p class="ticket-number">Complaint ID #{{ $complaint->ticket_number }}</p>
	</div>
	<div class="complaint-details">
		<p><span class="detail-label">Name:</span> {{ $complaint->first_name }} {{ $complaint->middle_name }} {{ $complaint->last_name }}</p>
		<p><span class="detail-label">Email:</span> {{ $complaint->email_address }}</p>
		<p><span class="detail-label">Telephone:</span> {{ $complaint->telephone }}</p>
		<p><span class="detail-label">Sex:</span> {{ $complaint->sex }}</p>
		<p><span class="detail-label">Age Range:</span> {{ $complaint->age_range }} years old</p>
		<p><span class="detail-label">Region:</span> {{ $complaint->region->name ?? 'Not Specified' }}</p>
		<p><span class="detail-label">District:</span> {{ $complaint->district->name ?? 'Not Specified' }}</p>
		<p><span class="detail-label">Stakeholder Type:</span> {{ $complaint->stakeholder_type }}</p>
		<p><span class="detail-label">Concern:</span> {{ $complaint->concern }}</p>
		<p><span class="detail-label">Details:</span> {{ $complaint->details }}</p>
		<p><span class="detail-label">Response Channel:</span> {{ $complaint->response_channel }}</p>
		<p><span class="detail-label">Anonymous:</span> {{ $complaint->is_anonymous ? 'Yes' : 'No' }}</p>
		<p>{!! $complaint->response ? '<span class="detail-label">Response:</span> '.$complaint->response : '' !!}</p>
		<p><span class="detail-label">Status:</span> {{ Str::headline($status) }}</p>
		<p><span class="detail-label">Date Received:</span> {{ $complaint->created_at }}</p>
	</div>
	
	@if(!empty($note))
		<div class="response">
			<h2>Additional Information</h2>
			<p>{{ $note }}</p>
	{{--		<p><span class="detail-label">Forwarded:</span> {{ $complaint->is_forwarded ? 'Yes' : 'No' }}</p>--}}
	{{--		<p><span class="detail-label">Times Forwarded:</span> {{ $complaint->times_forwarded }}</p>--}}
	{{--		<p><span class="detail-label">Attachments:</span> {{ $complaint->attachments }}</p>--}}
		
		</div>
	@endif
</div>
</body>
</html>
