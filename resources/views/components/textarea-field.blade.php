@props(['name'])
<div class="mb-6">
    <label for="{{$name}}" class="block mb-2 uppercase font-bold text-xs text-gray-700">
        {{$slot}}
    </label>
    <textarea class="border border-gray-400 p-2 w-full" name="{{$name}}" id="$name" required>{{ old($name)}}</textarea>
    @error("{{$name}}")
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
