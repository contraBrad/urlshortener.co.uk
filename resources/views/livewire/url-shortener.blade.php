<div>
    @if($shortenedUrl)
        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
            <p class="text-center text-lg">Original URL:</p>
            <p class="text-center text-lg mt-2 pb-4">{{ $original_url }}</p>

            <p class="text-center text-lg">Your shortened URL:</p>
            <a href="{{ $shortened_url }}" target="_blank" class="text-blue-500 text-center block mt-2">{{ $shortened_url }}</a>

            <button wire:click="$set('shortened_url', null)" class="block text-center mt-6 text-blue-500">Shorten another URL</button>
        </div>
    @else
        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
            <form wire:submit.prevent="store">
               <div class="mb-4">
                   <label for="url" class="block text-gray-700">Enter a URL to shorten:</label>
                   <input type="url" wire:model="url" placeholder="https://example.com/long-url" class="w-full p-1.5 border-gray-300 border-2 rounded mt-1" required>">

                   @error('url')
                       <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                   @enderror
               </div>

               <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Shorten URL</button>
            </form>
        </div>
    @endif

</div>
