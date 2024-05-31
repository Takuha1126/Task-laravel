<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskReminderNotification extends Notification
{
    use Queueable;

    protected $task;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
        Log::info('TaskReminderNotification constructed with task: ' . $task->id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        Log::info('Determining notification channels.');
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        Log::info('Building mail message for task: ' . $this->task->id);

        return (new MailMessage)
                    ->subject('タスクのリマインダー')
                    ->line('あなたのタスクの期限が近づいています。')
                    ->line('タスクタイトル: ' . $this->task->title)
                    ->line('期限日: ' . $this->task->date)
                    ->line('詳細: ' . $this->task->detail)
                    ->action('タスクを確認する', route('task.index', $this->task->id))
                    ->line('タスクを忘れずに完了させてください。');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'task_id' => $this->task->id,
            'title' => $this->task->title,
            'date' => $this->task->date,
            'detail' => $this->task->detail,
        ];
    }
}
