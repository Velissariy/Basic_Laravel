<?php

namespace App\Admin\Widgets;

use App\Models\ProductCategory;
use Arrilot\Widgets\AbstractWidget;

class ProductCategoryCountWidget extends AbstractWidget {
    protected $config = [];

    public function run() {
        $count = ProductCategory::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title' => 'Счетчик категорий продуктов',
            'text' => "Количество категорий: {$count}",
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
