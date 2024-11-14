<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Facades\Log;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     */
    public function created(News $news): void
    {
        Log::info('Новая новость создана: ' . $news->title);
    }

    /**
     * Handle the News "updated" event.
     */
    public function updated(News $news): void
    {
        Log::info('Новость обновлеиа: ' . $news->title);
    }

    /**
     * Handle the News "deleted" event.
     */
    public function deleted(News $news): void
    {
        Log::info('Новость удалена: ' . $news->title);
    }

    /**
     * Handle the News "restored" event.
     */
    public function restored(News $news): void
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     */
    public function forceDeleted(News $news): void
    {
        //
    }
}
