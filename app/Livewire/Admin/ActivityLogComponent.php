<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class ActivityLogComponent extends Component
{
	use WithPagination;

	public ?string $log_name = '';
	public ?string $description = '';
	public $subject_id;
	public ?string $subject_type = '';
	public $causer_id;
	public ?string $causer_type = '';
	public ?array $properties = [];

	protected ?string $paginationTheme = 'bootstrap';

	public function render()
    {
        return view('livewire.admin.activity-log-component', [
	        'activity_logs' => Activity::orderBy('id', 'DESC')->paginate(10),
        ])->extends('layouts.app');
    }

	public function resetFields(): void
	{
		$this->log_name = '';
		$this->description = '';
		$this->subject_id = '';
		$this->subject_type = '';
		$this->causer_id = '';
		$this->causer_type = '';
		$this->properties = [];
	}

	public function viewActivityLog($id): void
	{
		$activity_log = Activity::with(['causer', 'subject'])->find($id);
		// dd($activity_log->properties);

		// get the causer model name
		$causer_model = $activity_log->causer_type;
		$causer_model = new $causer_model;
		$causer_model = $causer_model->find($activity_log->causer_id);
		// dd($causer_model);

		// get the subject model name
		$subject_model = $activity_log->subject_type;
		$subject_model = new $subject_model;
		$subject_model = $subject_model->find($activity_log->subject_id);
		// dd($subject_model);

		// take the last word of the causer model name
		$causer_model_name = explode('\\', $activity_log->causer_type);
		$causer_model_name = end($causer_model_name);
		// dd($causer_model_name);

		// take the last word of the subject model name
		$subject_model_name = explode('\\', $activity_log->subject_type);
		$subject_model_name = end($subject_model_name);
		// dd($subject_model_name);

		if ($subject_model) {
			// get the subject first table column name
			$subject_table_column = $subject_model->getTable();
			$subject_table_column = Schema::getColumnListing($subject_table_column);
			// $subject_table_column = $subject_table_column[1];
			// dd(Schema::getColumnType($subject_model->getTable(), $subject_table_column));
			// dd($subject_table_column);
			// check if the subject table column is a string else search for the first string column
			if (Schema::getColumnType($subject_model->getTable(), $subject_table_column[1]) !== 'string') {
				foreach ($subject_table_column as $column) {
					if (Schema::getColumnType($subject_model->getTable(), $column) === 'string') {
						$subject_table_column = $column;
						break;
					}
				}
			} else {
				$subject_table_column = $subject_table_column[1];
			}
		} else {
			$subject_model_type = explode('\\', $activity_log->subject_type);
			$subject_model_type = end($subject_model_type);
		}

		$this->log_name = $activity_log->log_name;
		$this->description = $activity_log->description;
		$this->subject_id = $subject_model ? $activity_log->subject->$subject_table_column : [];
		$this->subject_type = $subject_model_name ?: $subject_model_type;
		$this->causer_id = $activity_log->causer->name;
		$this->causer_type = $causer_model_name;
		$this->properties = $activity_log->properties->toArray();
		// dd($this->properties);
	}

	public function clearAllLogs()
	{
		Activity::truncate();

		return redirect()->route('activity_logs')->with('success', 'Activity Logs Cleared Successfully!');
	}
}
