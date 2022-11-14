# Laravel Open Graph

Setting Open Graph for Laravel.

## Install

Via Composer install:

```bash
composer require ezitisitis/laravel-open-graph
```

Include Open Graph meta view into your layout `<head>`:

```blade
@include('open-graph::meta')
```

## Usage

Set Open Graph metadata into Controller (this example page title default is Laravel app name):

*HomeController*
```php
<?php

namespace App\Http\Controllers;

use Ezitisitis\LaravelOpenGraph\Facades\OpenGraph;

class HomeController extends Controller
{
    public function index()
    {
        OpenGraph::start()
            ->title()
            ->description('The site description...')
            ->image(asset('images/og-image.png'));

        return view('home');
    }
}
```

Set the article's Open Graph metadata Controller (this example article title like `Article name - App name`):

*ArticleController*
```php
<?php

namespace App\Http\Controllers;

use App\Article;
use Ezitisitis\LaravelOpenGraph\Facades\OpenGraph;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        OpenGraph::start()
            ->type('article')
            ->title($article->title)
            ->description($article->description)
            ->image($article->thumbnail)
            ->data([
                'article:published_time' => $article->created_at->toIso8601String(),
            ]);

        return view('home');
    }
}
```
