<?php

namespace App\Livewire;

use App\Mail\SendMail;
use Livewire\Component;
use App\Models\ShortUrl;
use Illuminate\Support\Facades\Mail;

class UrlShortener extends Component
{
    public $url;
    public $shortenedUrl;
    public $originalUrl;

    protected $rules = [
        'url' => 'required|url',
    ];

    public function store()
    {
        $this->validate();

        // Remove the / from the end of the URL
        $cleanedUrl = rtrim($this->url, '/');

        // Check if the original URL already exists
        $existingUrl = ShortUrl::where('original_url', $cleanedUrl)->first();

        // If the original URL already exists, return the shortened URL
        if ($existingUrl) {
            $this->shortenedUrl = route('urlshortener.short', ['shortCode' => $existingUrl->short_code]);
            $this->originalUrl = $existingUrl->original_url;
        } else {
            // Generate short code and create a new short URL record
            $shortCode = hash('crc32', $cleanedUrl);
            $shortUrl = ShortUrl::create([
                'original_url' => $cleanedUrl,
                'short_code' => $shortCode,
            ]);

            // Redirect to the original URL
            $this->shortenedUrl = route('urlshortener.short', ['shortCode' => $shortUrl->short_code]);
            $this->originalUrl = $cleanedUrl;

            // Send an email with the shortened url
            Mail::to('brad@test.com')->send(new SendMail($this->shortenedUrl));
        }

        // Reset the URL field for new shortening
        $this->url = '';
    }

    public static function redirectToOriginalUrl($shortCode)
    {
        // Fetch the URL associated with the short code
        $url = ShortUrl::where('short_code',  $shortCode)->firstOrFail();

        // Redirect to the original URL
        return redirect($url->original_url);
    }
    public function render()
    {
        return view('livewire.url-shortener');
    }
}
