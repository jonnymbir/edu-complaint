<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ComplaintOverdue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'complaint:overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $complaints = \App\Models\Complaint::query()->where('response', null)->where('created_at', '<', now()->subDays(15))->get();

		foreach ($complaints as $complaint) {
			$complaint->status = 'overdue';
			$complaint->save();
		}
    }
}
