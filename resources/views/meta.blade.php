@if (Ezitisitis\LaravelOpenGraph\OpenGraph::isEnabled())
    @if (Ezitisitis\LaravelOpenGraph\OpenGraph::getDescription())
        <meta name="description" content="{{ Ezitisitis\LaravelOpenGraph\OpenGraph::getDescription() }}">
    @endif
    <meta property="og:url" content="{{ Ezitisitis\LaravelOpenGraph\OpenGraph::getUrl() }}" />
    <meta property="og:type" content="{{ Ezitisitis\LaravelOpenGraph\OpenGraph::getType() }}" />
    <meta property="og:title" content="{{ Ezitisitis\LaravelOpenGraph\OpenGraph::getTitle() }}" />
    @if (Ezitisitis\LaravelOpenGraph\OpenGraph::getDescription())
        <meta property="og:description" content="{{ Ezitisitis\LaravelOpenGraph\OpenGraph::getDescription() }}" />
    @endif
    @if (Ezitisitis\LaravelOpenGraph\OpenGraph::getImage())
        <meta property="og:image" content="{{ Ezitisitis\LaravelOpenGraph\OpenGraph::getImage() }}" />
    @endif
    @if(Ezitisitis\LaravelOpenGraph\OpenGraph::getSiteName())
        <meta property="og:site_name" content="{{ Ezitisitis\LaravelOpenGraph\OpenGraph::getSiteName() }}" />
    @endif
    @if(Ezitisitis\LaravelOpenGraph\OpenGraph::getLocale())
        <meta property="og:locale" content="{{ Ezitisitis\LaravelOpenGraph\OpenGraph::getLocale() }}" />
    @endif
    @if(Ezitisitis\LaravelOpenGraph\OpenGraph::getAlternateLocale())
        @foreach(Ezitisitis\LaravelOpenGraph\OpenGraph::getAlternateLocale() as $alternateLocale)
            <meta property="og:locale:alternate" content="{{ $alternateLocale }}" />
        @endforeach
    @endif
    @foreach (Ezitisitis\LaravelOpenGraph\OpenGraph::getData() as $key => $value)
        <meta property="og:{{ $key }}" content="{{ $value }}" />
    @endforeach
@endif
