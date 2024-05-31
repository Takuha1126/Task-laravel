<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TaskReminderNotification;
use Illuminate\Support\Facades\Config;

class SendTaskReminders extends Command
{
    protected $signature = 'send:task-reminders';
    protected $description = 'Send reminders for tasks due today';

    public function __construct()
    {
        parent::__construct();
    }


public function handle()
{

    $tasks = Task::whereDate('date', Carbon::today())->get();

    foreach ($tasks as $task) {
        $user = $task->user;

        if ($user) {
            $user->notify(new TaskReminderNotification($task));
        }
    }

    $this->info('Task reminders have been sent successfully.');
}


}
