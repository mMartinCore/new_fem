<div class="py-4 text-red-200 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-200 dark:text-gray-200" href="#">
        {{ config('app.name') }}
    </a>
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            {!! request()->routeIs('admin/dashboard') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a  class="inline-flex items-center w-full text-sm font-semibold text-gray-100 transition-colors duration-150 hover:text-gray-200 
              dark:hover:text-gray-200 hover:bg-site_color_theme p-4 rounded dark:text-gray-100" href="{{route('admin.dashboard')}}">
                <svg class="w-5 h-5" ari a-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="ml-4">{{ __('Dashboard') }}</span>
            </a>
        </li> 
        <li class="relative px-6 py-3">
            {!! request()->routeIs('teams') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a class="inline-flex items-center  font-bold py-4 px-4 rounded  text-gray-200 bg-site_color_theme w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 
            dark:hover:text-gray-200" 
            href="{{route('teams.index')}}"
            >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span class="ml-4">Clien/Partner</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            {{-- {!! request()->routeIs('forms') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!} --}}
            <a  class="inline-flex items-center  font-bold py-4 px-4 rounded text-gray-200 bg-site_color_theme w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 
            dark:hover:text-gray-200" 
            href="{{route('categories.index')}}">
 
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
                <span class="ml-4">Category</span>
            </a>
        </li> 
         <li class="relative px-6 py-3">
            {!! request()->routeIs('countries') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a class="inline-flex items-center  font-bold py-4 px-4 rounded  text-gray-200 bg-site_color_theme w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 
            dark:hover:text-gray-200"   href="{{route('countries.index')}}" >
           <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="ml-4">Country</span>
            </a>
        </li>
            <li class="relative px-6 py-3">
            {!! request()->routeIs('packagestatuss') ? '<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>' : '' !!}
            <a class="inline-flex items-center  font-bold py-4 px-4 rounded  text-gray-200 bg-site_color_theme w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 
            dark:hover:text-gray-200"   href="{{route('packagestatuss.index')}}" >
     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>     <span class="ml-4">Package Status</span>
            </a>
        </li>

      
    
        
    </ul>
</div>
