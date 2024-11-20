<div>
    @if($shortenedUrl)
        <div class="bg-white p-10 rounded-xl shadow-lg">
            <p class="text-center text-lg">Original URL:</p>
            <a href="{{ $originalUrl }}" target="_blank" class="text-blue-500 text-center block mt-2">{{ $originalUrl }}</a>

            <p class="text-center text-lg mt-2">Your shortened URL:</p>
            <a href="{{ $shortenedUrl }}" target="_blank" class="text-blue-500 text-center block mt-2">{{ $shortenedUrl }}</a>

            <button wire:click="$set('shortenedUrl', null)" class="block text-center mx-auto mt-6 text-blue-500">Shorten another URL</button>
        </div>
    @else
        <div class="bg-white p-10 rounded-xl shadow-lg">
            <form wire:submit.prevent="store">
               <div class="mb-4">
                   <label for="url" class="block text-gray-700 mx-auto text-center">Enter a URL to shorten:</label>
                   <input type="url" wire:model="url" placeholder="https://example.com/long-url" class="w-80 p-1.5 border-gray-300 border-2 rounded mt-1" required>

                   @error('url')
                       <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                   @enderror
               </div>

               <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">
                    <span wire:loading.remove wire:target="store">Shorten URL</span>
                    <span wire:loading wire:target="store" ><i class="fa-solid fa-spinner fa-spin"></i></span>
                </button>
            </form>
        </div>
    @endif
</div>