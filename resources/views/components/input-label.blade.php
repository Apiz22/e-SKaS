@props(['value'])

<!-- Remove any dark: classes if they exist. Should look like: -->
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
