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
        $request->validate([
            'url' => 'required|url',
        ]);

        // Generate a unique short code
        $shortCode = Str::random(6);

        // Store the original URL and short code in the database
        $shortUrl = ShortUrl::create([
            'original_url' => $request->url,
            'short_code' => $shortCode
        ]);

        // Display the shortened URL and the original URL
        return view('urlshortener.success',[
            'shortUrl' => $shortUrl,
            'shortenedUrl' => url('/l/'.$shortCode),
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
