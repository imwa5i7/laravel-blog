<x-layout>
    <section class="py-8  max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">Publish New Post</h1>

        <div class="border border-gray-200 p-6 rounded-xl">
            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <x-input-field :name="'title'" >Title</x-input-field>
                <x-input-field :name="'slug'" >Slug</x-input-field>
                <x-input-field :name="'thumbnail'" :type="'file'">Thumbnail</x-input-field>
                <x-textarea-field :name="'excerpt'">Excerpt</x-textarea-field>
                <x-textarea-field :name="'body'">Desc</x-textarea-field>

                <div class="mb-6">
                    <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Category
                    </label>
                    <select name="category_id" id="category_id">

                        @php
                            $categories = \App\Models\Category::all();
                        @endphp

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->title) }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>
            </form>
        </div>


    </section>
</x-layout>
