@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:border-teal-500 dark:focus:border-teal-400 focus:ring-teal-500 dark:focus:ring-teal-400 rounded-lg shadow-sm']) !!}>