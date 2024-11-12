<div>
    <h1>Successfully Shortened a url</h1>
    {{-- TODO $originalUrl needs to be passed in --}}
    <div>Original URL:</div>
    <a href="{{ $originalUrl }}" target="_blank">{{ $originalUrl }}</a>
    <div>Shortened URL:</div>
    <a href="{{ $shortenedUrl }}" target="_blank">{{ $shortenedUrl }}</a>
</div>