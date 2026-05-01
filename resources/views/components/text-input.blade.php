@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 bg-white text-gray-900 focus:border-teal-500 focus:ring-teal-500 rounded-lg shadow-sm']) !!}>