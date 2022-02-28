<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
       <link rel="icon" type="image/svg+xml" href="{{ session('client_team')->logo !='' ? 
                                                        session('client_team')->logo->getUrl('thumbnail'):
                                                        asset('images/header-logo.png') 
                                                      }}"  />
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
       {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" /> --}}
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
            <link rel="stylesheet" href="{{ asset('css/loader.css') }}">

        @livewireStyles
        {{-- <!-- filepond -->    
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        @fcStyles --}}

       <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
       <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">   
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>

 
      
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

                {{ $slot }}
            </main>
        </div>

        @stack('modals')
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script> --}}
        @livewireScripts







 {{-- @fcScripts
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(FilePondPluginImagePreview);
        });
    </script> --}}










    </body>
</html>
