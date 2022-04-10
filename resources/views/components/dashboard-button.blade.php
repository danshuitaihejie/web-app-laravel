<button {{ $attributes->merge(['type' => 'submit', 'class' =>
    'inline-flex justify-center px-6 py-3 border border-gray-300 shadow-sm text-base font-semibold rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
]) }}>
    {{ $slot }}
</button>
