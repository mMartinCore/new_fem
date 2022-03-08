<x-guest-layout>
 <x-banner>Contact</x-banner>
         @if(session('error'))
                        <div class="w-full bg-red-200 text-red-600 border rounded p-4" role="alert">{{ session('error') }}</div>
             @endif

             @if (session()->has('message'))
               <div x-data="{ open: true }">
               <div x-show="open" x-transition id="toast-default" class="flex items-center mt-4 w-full max-w-md p-3 pr-4 ml-4 bg-green-400 shadow-xl  
                        text-gray-100  rounded-lg   dark:text-gray-400 dark:bg-green-800" role="alert">
                        <div class="inline-flex items-center  justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-gray-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                            <svg  xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-10 text-md font-bold  w-full">    
                            {{ session('message') }}
                        </div>
                        <button x-on:click="open = ! open" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-collapse-toggle="toast-default" aria-label="Close">
                            
                        <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>
               </div>            
              @endif
              
 @include('pages.contacts.form') 
 <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-20">
    @if ($contact->google_map_1!=null)
    {!!$contact->google_map_1!!}    
    @endif
 </div>

</x-guest-layout>
 @include('layouts/footer')  