<?php

namespace App\Listeners;

use App\Events\NewsHiddenned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendNewsHiddennedNotification
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
    public function handle(NewsHiddenned $event): void
    {
        Log::info('Новая новость создана: ' . $event->news->title);
    }
}
