@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-white dark:text-gray-900 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-blue-900  rounded-md shadow-sm']) }}>
