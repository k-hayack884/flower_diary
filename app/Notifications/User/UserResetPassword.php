<?php

namespace App\Notifications\User;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class UserResetPassword extends ResetPasswordNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
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

        return (new MailMessage)
            ->greeting('パスワードリセットのリクエスト承りました')
            ->subject('パスワード初期化についてのお知らせ')
            ->line('パスワードリセットのリンクを送信しました。')
            ->action('パスワードリセット', url('reset-password', ['token' => $this->token]))
            ->line('このリンクは60分を過ぎると無効になります。')
            ->line('flower-giftをご利用くださってありがとうございます。')
            ->salutation('floewr-diary');
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
            //
        ];
    }
}
