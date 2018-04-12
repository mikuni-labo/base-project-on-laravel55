<?php

namespace App\Notifications;

use App\Notifications\Channels\CustomDatabaseChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\{MailMessage,SlackMessage};

class TestNotification extends Notification
{
    use Queueable;

    /**
     * Notifications type.
     *
     * @var string
     */
    public $type = 'test';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            CustomDatabaseChannel::class,
//             'mail',
//             'database',
//             'broadcast',
//             'nexmo',
//             'slack',
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack( $notifiable ) {
        return (new SlackMessage)
            ->error()
            ->from('MikunilaboApp', ':ghost:')
            ->to('#laravel_logs')
            // ->image(':yousan:')// 画像アイコン？
            ->content('Whoops! Something went wrong.')
            ->attachment(function ($attachment) {
                $attachment->title('Invoice 1322', url('/'))
                ->fields([
                    'Title' => 'Server Expenses',
                    'Amount' => '$1,234',
                    'Via' => 'American Express',
                    'Was Overdue' => ':-1:',
                ]);
            });
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
            'title'   => 'test',
            'content' => 'test通知です',
        ];
    }
}
