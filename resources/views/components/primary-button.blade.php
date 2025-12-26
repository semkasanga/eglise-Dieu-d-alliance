<button {{ $attributes->merge(['type' => 'submit', 'class' => "w-full bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg font-semibold transition hover:scale-105 duration-200 -mt-4"]) }}>
    {{ $slot }}
</button>
