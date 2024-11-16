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

    // Redirect using the short code
    public function redirect($shortCode)
    {  
        // Fetch the URL associated with the short code
        $url = ShortUrl::where('short_code',  $shortCode)->firstOrFail();

        // Redirect to the original URL
        return redirect($url->original_url);
    }
}
