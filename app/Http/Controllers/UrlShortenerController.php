<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UrlShortenerController extends Controller
{
    public function index(Request $request)
    {
        return view('urlshortener.index');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'url' => 'required|url',
        ]);

        // Remove the / from the end of the URL
        $cleanedUrl = rtrim($request->url, '/');

        // Check if the original URL already exists
        $existingUrl = ShortUrl::where('original_url', $cleanedUrl)->first();

        // If the original URL already exists, return the shortened URL
        if ($existingUrl) {
            return view('urlshortener.success',[
                'shortUrl' => $existingUrl,
                'shortenedUrl' => route('urlshortener.redirect', ['shortCode' => $existingUrl->short_code]),
            ]);
        }

        // Generate short code using a timestamp
        $shortCode = hash('crc32', $cleanedUrl);

        // Create a new short URL record
        $shortUrl = ShortUrl::create([
            'original_url' => $cleanedUrl,
            'short_code' => $shortCode,
        ]);

        // Display the shortened URL and the original URL
        return view('urlshortener.success',[
            'shortUrl' => $shortUrl,
            'shortenedUrl' => route('urlshortener.redirect', ['shortCode' => $shortCode]),
        ]);
    }

    // Redirect using the short code
    public function redirect($shortCode)
    {  
        // Fetch the URL associated with the short code
        $url = ShortUrl::where('short_code',  $shortCode)->firstOrFail();

        // Redirect to the original URL
        return redirect($url->original_url);
    }
}
