<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;

class DeleteExpiredTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired tasks';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expiredTasks = Task::where('date', '<', Carbon::now())->get();

        $count = $expiredTasks->count();

        if ($count > 0) {
            Task::where('date', '<', Carbon::now())->delete();
            $this->info("Expired tasks deleted: $count");
        } else {
            $this->info('No expired tasks found.');
        }

        return 0;
    }
}
