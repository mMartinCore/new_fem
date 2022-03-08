<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="/" :active="request()->routeIs('/')">
                        {{ __('HOME') }}
                    </x-jet-nav-link>

                    {{-- {{session()->exists('subdomain')? session('subdomain'): null }} --}}
                </div>

                @auth
                 <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                      <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                     </x-jet-nav-link>
                </div>
                @endauth

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('tracks.search') }}"
                        :active="request()->routeIs('tracks.package')">
                        {{ __('Tracking') }}
                    </x-jet-nav-link>
                </div>
                     <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ url('pages/contact') }}" :active="request()->routeIs('pages.contact')">
                        {{ __('Contact') }}
                    </x-jet-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ url('pages/about') }}" :active="request()->routeIs('pages.about')">
                        {{ __('About') }}
                    </x-jet-nav-link>
                </div>
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @include('layouts.branch-modal')
                </div> --}}
            </div>




            <div class="hidden sm:flex sm:items-center sm:ml-6">

          
                  @include('layouts.branch-modal')


                <div class="ml-3 relative">
                    @auth

                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                src="{{ Auth::user()->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @else
                        <a href="{{ route('login') }} "
                            class="text-sm border-sm py-2 px-4  rounded-md bg-site_color_theme hover:bg-site_color_hover  text-gray-100 dark:text-gray-500  ">
                            {{ __('Log In') }}</a>
                        <a href="{{ route('register') }}"
                            class="text-sm border-sm py-2 px-4  rounded-md bg-site_color_theme hover:bg-site_color_hover  text-gray-100 dark:text-gray-500">
                            {{ __(' Register') }}</a>

                    @endauth
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>



    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="/">
                {{ __('HOME') }}
            </x-jet-responsive-nav-link>
       

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="mt-3 space-y-1">

                @auth 
                  <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                  </x-jet-responsive-nav-link>  
                 

                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div> 
                    </div>
                </div>

                 <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                        :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                   </x-jet-responsive-nav-link> 
                @endauth
 
 

               <x-jet-responsive-nav-link href="{{ route('tracks.search') }}" :active="request()->routeIs('tracks.package')">
                        {{ __('Tracking') }}
                    </x-jet-responsive-nav-link> 
                <x-jet-responsive-nav-link href="{{ url('pages/contact') }}"  >
                        {{ __('Contact') }}
                </x-jet-responsive-nav-link>


                <x-jet-responsive-nav-link href="{{ url('pages/about') }}" >
                        {{ __('About') }}
                </x-jet-responsive-nav-link> 
                @auth
                       <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
                @endauth

                 @guest
                 <x-jet-responsive-nav-link href="{{ route('login') }}" >
                        {{ __('Login') }}
                </x-jet-responsive-nav-link> 

                <x-jet-responsive-nav-link href="{{ route('register') }}" >
                        {{ __('Register') }}
                </x-jet-responsive-nav-link>
                 @endguest
      
 
      



                <!-- Client Management -->

                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-md text-gray-400">
                    {{ __('Select Branch') }}
          
          <table class="table text-gray-200 border-separate space-y-6 px-4 text-sm w-full mt-4">		 
				<tbody>
               @if (session()->exists('branches'))
                     @foreach(session('branches') as $branch)                       
                   <tr class="bg-site_color_theme rounded-full mt-4">
                    	
						<td class="p-2">
							<div class="flex align-items-center">
                             <a   href="{{ 'http://'.$branch->domain.'.'.config('app.short_url') }}">	
								<img class="rounded-full h-12 w-12  object-cover" src="{{ $branch->logo !='' ? $branch->logo->getUrl('thumbnail') :''}}" alt="unsplash image">
                                 </a>
						 	</div>
						</td>
						<td class="p-2  text-md">
                        @if ($branch->country_id !='')
                         <a   href="{{ 'http://'.$branch->domain.'.'.config('app.short_url') }}">	
                            {{  $branch->country->name }}
					     </a>
                        @endif
                    
                 
							
						</td>
                    <td class="p-3 text-md ">
                      <a   href="{{ 'http://'.$branch->domain.'.'.config('app.short_url') }}">	
                            {{ $branch->domain }}
					  </a>
							
						</td>	 
					</tr>
                    @endforeach
                    @endif 
				</tbody>
			</table>

                </div>

                <!-- Client Settings -->


                <div class="border-t border-gray-200"></div>



            </div>
        </div>
    </div>
</nav>
