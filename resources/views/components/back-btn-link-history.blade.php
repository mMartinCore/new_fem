<a href="#"  onclick="history.back()" {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-800 
border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest 
hover:bg-red-700 active:bg-red-900 focus:outline-none
 focus:border-gray-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</a>

