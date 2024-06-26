@auth
    <form action="posts/{{ $post->slug }}/comments" method="POST" class="border border-gray-200 p-6 rounded-xl">
        @csrf
        <header class="flex items-center">
            <img src="https:/i.pravatar.cc/40?id={{ auth()->id() }}" alt="Avatar" width="40" height="40"
                class="rounded-full">
            <h2 class="ml-3">Want to participate?</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" id="body" rows="5" required class="w-full text-sm focus:outline-none focus:ring"
                placeholder="Quick, think of something to say!">

        </textarea>
            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            <x-submit-button>Post</x-submit-button>
        </div>
    </form>
@else
    <p class="font-semibold"><a href="/register" class="hover:underline">Register</a> or <a class="hover:underline"
            href="/login">Login</a> to leave a comment.</p>
@endauth
