 





<x-guest-layout>


    <!-- component -->
    <div class="h-full bg-gradient-to-tl from-site_color_theme to-gray-600 w-full py-16 px-4"> 

        <div class="flex flex-col items-center justify-center"> 

            <div class="bg-white shadow rounded lg:w-1/3  md:w-1/2 w-full p-10 mt-8">

                <div class="flex flex-col items-center justify-center mb-4">
                 <a href="/" class="justify-center  items-center content-center" >
               
                <img width="188" height="74" src="{{  
                       session()->has('client_team') ?
                       session('client_team')->logo !=''  ? session('client_team')->logo->getUrl('thumbnail') 
                             : asset('images/header-logo.png') 
                            :  asset('images/header-logo.png') 
                }}" class="block  h-38   w-38    object-fit  rounded-lg     " alt="shipping logo">
               
                </a>
                <div class="text-center text-2xl text-gray-800 mb-4 p-4 uppercase">
                {{ 
                     session()->has('client_team')?
                 session('client_team')->domain !=''?  session('client_team')->domain :"fempirefreight"
                 
                 :"fempirefreight"
                 }}
                </div>
                </div>


               
               

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form> 




            </div>
        </div>
    </div>

</x-guest-layout>




















 





