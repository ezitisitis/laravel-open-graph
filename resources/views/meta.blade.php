@if (OpenGraph::isEnabled())
    @if (OpenGraph::getDescription())
        <meta name="description" content="{{ OpenGraph::getDescription() }}">
    @endif
    <meta property="og:url" content="{{ OpenGraph::getUrl() }}" />
    <meta property="og:type" content="{{ OpenGraph::getType() }}" />
    <meta property="og:title" content="{{ OpenGraph::getTitle() }}" />
    @if (OpenGraph::getDescription())
        <meta property="og:description" content="{{ OpenGraph::getDescription() }}" />
    @endif
    @if (OpenGraph::getImage())
        <meta property="og:image" content="{{ OpenGraph::getImage() }}" />
    @endif
    @if(OpenGraph::getSiteName())
        <meta property="og:site_name" content="{{ OpenGraph::getSiteName() }}" />
    @endif
    @if(OpenGraph::getLocale())
        <meta property="og:locale" content="{{ OpenGraph::getLocale() }}" />
    @endif
    @if(OpenGraph::getAlternateLocale())
        @foreach(OpenGraph::getAlternateLocale() as $alternateLocale)
            <meta property="og:locale:alternate" content="{{ $alternateLocale }}" />
        @endforeach
    @endif
    @foreach (OpenGraph::getData() as $key => $value)
        <meta property="og:{{ $key }}" content="{{ $value }}" />
    @endforeach
@endif
@if(OpenGraph::twitterIsEnabled())
    <meta property="twitter:card" content="{{ OpenGraph::getTwitterCard() }}" />
    <meta property="twitter:title" content="{{ OpenGraph::getTwitterTitle() }}" />
    @if(OpenGraph::getTwitterSite())
        <meta property="twitter:site" content="{{ OpenGraph::getTwitterSite() }}" />
    @endif
    @if(OpenGraph::getTwitterDescription())
        <meta property="twitter:description" content="{{ OpenGraph::getTwitterDescription() }}" />
    @endif
    @if(OpenGraph::getTwitterImage())
        <meta property="twitter:image" content="{{ OpenGraph::getTwitterImage() }}" />
    @endif
    @if(OpenGraph::getTwitterImageAlt())
        <meta property="twitter:image:alt" content="{{ OpenGraph::getTwitterImageAlt() }}" />
    @endif
@endif
