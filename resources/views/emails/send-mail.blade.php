<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Successfully Shortened a URL</h1>
        
        <div class="mb-3">
            <span class="font-semibold text-gray-700">Original URL:</span>
            <a href="{{ $originalUrl }}" target="_blank" class="text-blue-500 underline break-words">
                {{ $originalUrl }}
            </a>
        </div>

        <div class="mb-3">
            <span class="font-semibold text-gray-700">Shortened URL:</span>
            <a href="{{ $shortenedUrl }}" target="_blank" class="text-blue-500 underline break-words">
                {{ $shortenedUrl }}
            </a>
        </div>

        <div class="text-sm text-gray-600 mt-4">
            <p>If you have any issues, please contact us at <a href="mailto:support@example.com" class="text-blue-500 underline">support@example.com</a>.</p>
        </div>
    </div>
</body>
</html>
