<?php

namespace App\Admin\Widgets;

use App\Models\News;
use Arrilot\Widgets\AbstractWidget;

class NewsWidgets extends AbstractWidget {
    protected $config = [];

    public function run() {
        $count = News::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title' => 'Счетчик новостей',
            'text' => "Количество новостей: {$count}",
            'button' => [
                'text' => 'Перейти к списку',
//                'link' => route('voyager.news.index'),
                'link' => '',
            ],
            'image' => 'news-bg.png',
        ]));
    }

    public function shouldBeDisplayed() {
        return true;
    }
}
