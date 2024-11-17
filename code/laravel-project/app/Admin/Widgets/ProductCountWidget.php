<?php

namespace App\Admin\Widgets;

use App\Models\Product;
use Arrilot\Widgets\AbstractWidget;

class ProductCountWidget extends AbstractWidget {
    protected $config = [];

    public function run() {
        $count = Product::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title' => 'Счетчик продуктов',
            'text' => "Количество продуктов: {$count}",
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
