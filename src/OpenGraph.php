<?php

namespace Ezitisitis\LaravelOpenGraph;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Routing\UrlGenerator;

class OpenGraph
{
    /**
     * Open graph is enabled.
     *
     * @var bool
     */
    protected $enabled = false;

    protected $twitterIsEnabled = false;

    /**
     * The open graph meta title.
     *
     * @var string
     */
    protected $title;

    /**
     * The open graph meta description.
     *
     * @var string|null
     */
    protected $description;

    /**
     * The open graph meta url.
     *
     * @var string
     */
    protected $url;

    /**
     * The open graph meta type.
     *
     * @var string
     */
    protected $type = 'website';

    /**
     * The open graph meta image.
     *
     * @var string
     */
    protected $image;

    /**
     * The open graph meta locale.
     *
     * @var string
     */
    protected $locale;

    /**
     * The open graph meta alternate locale.
     *
     * @var array
     */
    protected $alternateLocale = [];

    /**
     * The open graph meta site name.
     *
     * @var string
     */
    protected $siteName;

    /**
     * The other open graph meta data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * The config repository instance.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The url generator instance.
     *
     * @var UrlGenerator
     */
    protected $urlGenerator;

    /**
     * Value for twitter:card
     *
     * @var string
     */
    protected $twitterCard;

    /**
     * Value for twitter:site
     *
     * @var string
     */
    protected $twitterSite;

    /**
     * Value for twitter:title
     *
     * @var string
     */
    protected $twitterTitle;

    /**
     * Value for twitter:description
     *
     * @var string
     */
    protected $twitterDescription;

    /**
     * Value for twitter:image
     *
     * @var string
     */
    protected $twitterImage;

    /**
     * Value for twitter:image:alt
     *
     * @var string
     */
    protected $twitterImageAlt;

    /**
     * Create a new laravel open graph instance.
     *
     * @param  Repository  $config
     * @param  UrlGenerator  $urlGenerator
     * @return void
     */
    public function __construct(Repository $config, UrlGenerator $urlGenerator)
    {
        $this->config = $config;
        $this->urlGenerator = $urlGenerator;
        $this->title();
        $this->description($this->config->get('app.description'));
        $this->url($this->urlGenerator->current());
    }

    /**
     * Start build open graph meta data.
     *
     * @return OpenGraph
     */
    public function start(): OpenGraph
    {
        $this->enabled = true;

        return $this;
    }

    /**
     * Set the open graph meta title.
     *
     * @param  string|null  $pageTitle
     * @param  string  $glue
     * @return OpenGraph
     *
     * @deprecated
     */
    public function title(string $pageTitle = null, string $glue = ' - '): OpenGraph
    {
        return $this->setTitle($pageTitle, $glue);
    }

    /**
     * Get the open graph meta title.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the open graph meta title.
     *
     * @param  string|null  $pageTitle
     * @param  string  $glue
     * @return OpenGraph
     */
    public function setTitle(string $pageTitle = null, string $glue = ' - '): OpenGraph
    {
        if (function_exists('title')) {
            $this->title = title($pageTitle ?? '');
        } else {
            $this->title = ($pageTitle ? $pageTitle.$glue : '').$this->config->get('app.name');
        }

        return $this;
    }

    /**
     * Set the open graph meta description.
     *
     * @param  string|null  $description
     * @return OpenGraph
     *
     * @deprecated
     */
    public function description(string $description = null): OpenGraph
    {
        return $this->setDescription($description);
    }

    /**
     * Get the open graph meta description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the open graph meta description.
     *
     * @param  string|null  $description
     * @return OpenGraph
     */
    public function setDescription(string $description = null): OpenGraph
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the open graph meta url.
     *
     * @param  string  $url
     * @return OpenGraph
     *
     * @deprecated
     */
    public function url(string $url): OpenGraph
    {
        return $this->setUrl($url);
    }

    /**
     * Get the open graph meta url.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set the open graph meta url.
     *
     * @param  string  $url
     * @return OpenGraph
     */
    public function setUrl(string $url): OpenGraph
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the open graph meta type.
     *
     * @param  string  $type
     * @return OpenGraph
     *
     * @deprecated
     */
    public function type(string $type): OpenGraph
    {
        return $this->setType($type);
    }

    /**
     * Get the open graph meta type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the open graph meta type.
     *
     * @param  string  $type
     * @return OpenGraph
     */
    public function setType(string $type): OpenGraph
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the open graph meta image.
     *
     * @param  string  $image
     * @return OpenGraph
     *
     * @deprecated
     */
    public function image(string $image): OpenGraph
    {
        return $this->setImage($image);
    }

    /**
     * Get the open graph meta image.
     *
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Set the open graph meta image.
     *
     * @param  string  $image
     * @return OpenGraph
     */
    public function setImage(string $image): OpenGraph
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the open graph meta locale.
     *
     * @return string
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * Set the open graph meta locale.
     *
     * @param  string  $locale
     * @return OpenGraph
     */
    public function setLocale(string $locale): OpenGraph
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get the open graph meta alternate locale.
     *
     * @return array
     */
    public function getAlternateLocale(): array
    {
        return $this->alternateLocale;
    }

    /**
     * Set the open graph meta alternate locale.
     *
     * @param  string  $locale
     * @return OpenGraph
     */
    public function setAlternateLocale(array $locales): OpenGraph
    {
        $this->alternateLocale = array_merge($this->alternateLocale, $locales);

        return $this;
    }

    /**
     * Get the open graph meta site name.
     *
     * @return string|null
     */
    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    /**
     * Set the open graph meta site name.
     *
     * @param  string|null  $siteName
     * @return OpenGraph
     */
    public function setSiteName(string $siteName = null): OpenGraph
    {
        $this->siteName = ! is_null($siteName) ? $siteName : $this->config->get('app.name');

        return $this;
    }

    /**
     * Set the open graph metadata.
     *
     * @param  array  $data
     * @return OpenGraph
     *
     * @deprecated
     */
    public function data(array $data): OpenGraph
    {
        return $this->setData($data);
    }

    /**
     * Get the open graph metadata.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Set the open graph metadata.
     *
     * @param  array  $data
     * @return OpenGraph
     */
    public function setData(array $data): OpenGraph
    {
        $this->data = array_merge($this->data, $data);

        return $this;
    }

    public function enableTwitterCard(): OpenGraph
    {
        $this->twitterIsEnabled = true;

        return $this;
    }

    public function twitterIsEnabled(): bool
    {
        return $this->twitterIsEnabled;
    }

    public function setTwitterCard($content = null): OpenGraph
    {
        $this->twitterCard = $content ?? 'summary';

        return $this;
    }

    public function getTwitterCard(): string
    {
        return $this->twitterCard;
    }

    public function setTwitterSite($content = null): OpenGraph
    {
        $this->twitterSite = $content;

        return $this;
    }

    public function getTwitterSite(): string
    {
        return $this->twitterSite;
    }

    public function setTwitterTitle(string $pageTitle = null, string $glue = ' - ')
    {
        if (function_exists('title')) {
            $this->twitterTitle = title($pageTitle ?? '');
        } else {
            $this->twitterTitle = ($pageTitle ? $pageTitle.$glue : '').$this->config->get('app.name');
        }

        return $this;
    }

    public function getTwitterTitle(): string
    {
        return $this->twitterTitle;
    }

    public function setTwitterDescription($content = null): OpenGraph
    {
        $this->twitterDescription = $content;

        return $this;
    }

    public function getTwitterDescription(): string
    {
        return $this->twitterDescription;
    }

    public function setTwitterImage($content = null): OpenGraph
    {
        $this->twitterImage = $content;

        return $this;
    }

    public function getTwitterImage(): string
    {
        return $this->twitterImage;
    }

    public function setTwitterImageAlt($content = null): OpenGraph
    {
        $this->twitterImageAlt = $content;

        return $this;
    }

    public function getTwitterImageAlt(): string
    {
        return $this->twitterImageAlt;
    }
    /**
     * Check the open graph meta is enabled.
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }
}
