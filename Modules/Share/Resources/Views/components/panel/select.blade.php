<select class="{{ $class }} @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $id }}">
    @if (! is_null($selectedText))
        <option value="" selected>{{ $selectedText }}</option>
    @endif
    {{ $slot }}
</select>
