# Laravel Open Graph

[![Latest Version on Packagist][badge-version]][link-packagist]
[![Total Downloads][badge-downloads]][link-packagist]
[![CI Build Status][badge-ci]][link-ci]
[![Style CI Build Status][badge-style-ci]][link-style-ci]

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

[badge-version]: https://img.shields.io/packagist/v/ezitisitis/laravel-open-graph?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/ezitisitis/laravel-open-graph?style=flat-square
[badge-ci]: https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2Fezitisitis%2Flaravel-open-graph%2Fbadge%3Fref%3Dmain&style=flat-square
[badge-style-ci]: https://github.styleci.io/repos/565724205/shield?style=flat-square

[link-packagist]: https://packagist.org/packages/ezitisitis/laravel-open-graph
[link-ci]: https://actions-badge.atrox.dev/ezitisitis/laravel-open-graph/goto?ref=main
[link-style-ci]: https://github.styleci.io/repos/565724205
