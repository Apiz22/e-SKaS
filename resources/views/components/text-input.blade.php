@props(['disabled' => false])

<!-- Remove any dark: classes if they exist. Should look like: -->
<input {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>