<?php

namespace Ezitisitis\LaravelOpenGraph\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Ezitisitis\LaravelOpenGraph\OpenGraph start()
 * @method static \Ezitisitis\LaravelOpenGraph\OpenGraph title(string $pageTitle = null, $glue = ' - ')
 * @method static string getTitle()
 * @method static \Ezitisitis\LaravelOpenGraph\OpenGraph description(string|null $description)
 * @method static string|null getDescription()
 * @method static \Ezitisitis\LaravelOpenGraph\OpenGraph url(string $type)
 * @method static string getUrl()
 * @method static \Ezitisitis\LaravelOpenGraph\OpenGraph type(string $type)
 * @method static string getType()
 * @method static \Ezitisitis\LaravelOpenGraph\OpenGraph image(string $image)
 * @method static null|string getImage()
 * @method static \Ezitisitis\LaravelOpenGraph\OpenGraph data(array $data)
 * @method static array getData()
 * @method static bool isEnabled()
 *
 * @see \Ezitisitis\LaravelOpenGraph\OpenGraph
 */
class OpenGraph extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'open-graph';
    }
}
