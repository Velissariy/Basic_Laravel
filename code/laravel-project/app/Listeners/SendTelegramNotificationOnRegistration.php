<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Telegram\Bot\Laravel\Facades\Telegram;

class SendTelegramNotificationOnRegistration
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $event->user;
        if ($user instanceof User) {
            $message = "Новый пользователь зарегистрировался:\n {$user->first_name} {$user->last_name}\nEmail: {$user->email}";

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANEL_ID'),
                'text' => $message
            ]);
        }
    }
}
