@props(['type' => 'text', 'name'])
<div class="mb-6">
    <label for="{{ $name }}" class="block mb-2 uppercase font-bold text-xs text-gray-700">
        {{ $slot }}
    </label>
    <input class="border border-gray-400 p-2 w-full" type="{{ $type }}" name="{{ $name }}"
        id="{{ $name }}" value="{{ old($name) }}" required>
    @error("{{ $name }}")
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
