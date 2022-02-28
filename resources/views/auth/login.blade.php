<x-guest-layout>


    <!-- component -->
    <div class="h-full bg-gradient-to-tl from-site_color_theme to-gray-600 w-full py-16 px-4">
        {{-- <div class="h-full bg-gradient-to-tl from-green-400 to-indigo-900 w-full py-16 px-4"> --}}
    
        <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->

        <div class="flex flex-col items-center justify-center">
           
         

            <div class="bg-white shadow rounded lg:w-1/3  md:w-1/2 w-full p-10 mt-8">

                <div class="flex flex-col items-center justify-center mb-4">
                 <a href="/" class="justify-center  items-center content-center" >
               
                <img width="188" height="74" src="{{ session('client_team')->logo !='' ? 
                    session('client_team')->logo->getUrl('thumbnail'):
                    asset('images/header-logo.png') 
                }}" class="block  h-38   w-38    object-fit  rounded-lg     " alt="shipping logo">
               
                </a>
                <div class="text-center text-2xl text-gray-800 mb-4 p-4 uppercase">
                {{session('client_team')->domain !='' ? 
                    session('client_team')->domain:"fempirefreight"}}
                </div>
                </div>


                <p tabindex="0" class="focus:outline-none text-2xl font-extrabold leading-6 mb-4 text-gray-800">Welcome back shop and savings!</p>
              
                 <x-jet-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-2 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>




            </div>
        </div>
    </div>

</x-guest-layout>




















 