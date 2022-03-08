 <section style="font-family:Roboto">
     <!-- Footer section -->

     <!-- style="background-image: url('https://image.freepik.com/free-photo/abstract-black-white-bokeh-background_1962-1324.jpg');" -->
     <div class="bg-cover bg-center"> 
         <!-- style="background-color: rgba(0, 0, 0, 0.6); " -->
         <div>
             <div class="container mx-auto px-6 lg:px-20 py-12">
                 <div class="lg:flex">
                     <div class="w-full lg:w-2/3">
                         <div class="lg:flex">
                             <div class="w-full mb-12 lg:mb-0 lg:w-1/2">
                                 <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left">

                                     <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                         <a href="/" class="inline-flex items-center px-1 pt-0 pb-2 ">

                                             <!-- LOG -->
                                             <img  src="{{ session()->has('client_team') ? 
                                                             session('client_team')->logo  !='' ? 
                                                              session('client_team')->logo->getUrl('preview_thumbnail'): asset('images/header-logo.png') 
                                                    :
                                                        asset('images/header-logo.png') 
                                                      }}" class="block w-auto h-32" alt="shipping logo">

                                         </a>
                                     </div>
                                 </div> 

                                 <h2 style="font-family: 'Baloo Tamma 2', cursive;"
                                     class=" lg:hidden  font-bold text-xl  text-gray-600 mb-4">{{ config('app.name', 'Laravel') }}
                                 </h2>

                                 <p class="text-gray-400 py-4">
                                     @if (session()->has('client_team') )
                                         {{ session('client_team')->logo_title  }}                                         
                                     @else                                         
                                     Hartlepool Enterprise Centre, Brougham Terrace, Unit 33, Hartlepool,TS248EY.
                                     @endif
                                 </p>

                             </div>
                             <div class="w-full lg:w-1/2 lg:flex lg:px-6 ">
                                 <div class="w-full mb-6 lg:mb-0 lg:w-1/2">
                                     <h2 style="font-family: 'Baloo Tamma 2', cursive;"
                                         class="font-bold  text-gray-600 mb-4">
                                         Useful Links</h2>
                                     <ul class="text-gray-500 text-sm">
                                         <li class=" ">
                                             <a class=" block  pl-3 pr-4 py-2 hover:pl-3 hover:pr-4 hover:py-2  border-l-4  hover:rounded-md  border-transparent text-base   text-gray-600   hover:text-gray-100   hover:bg-site_color_theme  focus:outline-none    focus:border-gray-300 transition duration-150 ease-in-out"
                                                 href="{{url('pages/contact')}}">
                                                 Contact
                                             </a>
                                         </li>
                                         <li class=" ">
                                             <a class=" block  pl-3 pr-4 py-2 hover:pl-3 hover:pr-4 hover:py-2  border-l-4  hover:rounded-md  border-transparent text-base   text-gray-600 
                                          hover:text-gray-100   hover:bg-site_color_theme  focus:outline-none    focus:border-gray-300 transition duration-150 ease-in-out"
                                                    href="{{url('pages/about')}}">
                                                 About
                                             </a>
                                         </li>
                                         <li class=" ">
                                             <a class=" block  pl-3 pr-4 py-2 hover:pl-3 hover:pr-4 hover:py-2  border-l-4  hover:rounded-md  border-transparent text-base   text-gray-600 
                                          hover:text-gray-100   hover:bg-site_color_theme  focus:outline-none    focus:border-gray-300 transition duration-150 ease-in-out"
                                                   href="{{route('pages.price')}}">
                                                 Price
                                             </a>
                                         </li>
                                         <li class=" ">
                                             <a class=" block  pl-3 pr-4 py-2 hover:pl-3 hover:pr-4 hover:py-2  border-l-4  hover:rounded-md  border-transparent text-base   text-gray-600   hover:text-gray-100   hover:bg-site_color_theme  focus:outline-none   
                                         focus:border-gray-300 transition duration-150 ease-in-out"
                                                 href="{{route('packages.create')}}">
                                                 Book Now
                                             </a>
                                         </li>
                                         <li class=" ">
                                             <a class=" block  pl-3 pr-4 py-2 hover:pl-3 hover:pr-4 hover:py-2  border-l-4  hover:rounded-md  border-transparent text-base   text-gray-600   hover:text-gray-100   hover:bg-site_color_theme  focus:outline-none   
                                         focus:border-gray-300 transition duration-150 ease-in-out"
                                                        href="{{route('packages.create')}}">
                                                 Book Shipping
                                             </a>
                                         </li>

                                     </ul>                          
                                 </div>
                                 <div class="w-full mb-6 lg:mb-0 lg:w-1/2">
                                     <h2 style="font-family: 'Baloo Tamma 2', cursive;"
                                         class="font-bold  text-gray-600 mb-4">
                                         Our sevices</h2>
                                     <ul class="text-gray-500 text-sm">
                                         <li class=" ">
                                             <a class=" block  pl-3 pr-4 py-2 hover:pl-3 hover:pr-4 hover:py-2  border-l-4  hover:rounded-md  border-transparent text-base   text-gray-600 hover:text-gray-100   hover:bg-site_color_theme focus:outline-none    
                                        focus:border-gray-300 transition duration-150 ease-in-out"
                                                 href="{{route('pages.shipping-policy')}}">
                                                 Shipping Policy
                                             </a>
                                         </li>
                                         <li class=" ">
                                             <a class=" block  pl-3 pr-4 py-2 hover:pl-3 hover:pr-4 hover:py-2  border-l-4 
                                              hover:rounded-md  border-transparent text-base   text-gray-600 hover:text-gray-100   hover:bg-site_color_theme focus:outline-none    
                                        focus:border-gray-300 transition duration-150 ease-in-out"
                                                  href="{{route('pages.term_condition')}}" >
                                                 Terms Of Service
                                             </a>
                                         </li>
                                         <li class=" ">
                                             <a class=" block  pl-3 pr-4 py-2 hover:pl-3 hover:pr-4 hover:py-2  border-l-4  hover:rounded-md  border-transparent text-base   text-gray-600 hover:text-gray-100   hover:bg-site_color_theme focus:outline-none    
                                        focus:border-gray-300 transition duration-150 ease-in-out"
                                                 href="{{route('pages.privacy')}}">
                                                 Privacy Policy
                                             </a>
                                         </li>
                                         <li class=" ">
                                             <a class=" block  pl-3 pr-4 py-2 hover:pl-3 hover:pr-4 hover:py-2  border-l-4  hover:rounded-md  border-transparent text-base   text-gray-600 hover:text-gray-100   hover:bg-site_color_theme focus:outline-none    
                                        focus:border-gray-300 transition duration-150 ease-in-out"
                                                 href="{{route('pages.refund')}}">
                                                 Refund Policy
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="w-full lg:w-1/3">
                         <h2 style="font-family: 'Baloo Tamma 2', cursive;" class=" font-bold  text-gray-600 mb-4">
                             Social Network
                         </h2>
                         <div class="flex mt-6">
                             <i style="background-color: #3B5998;"
                                 class="flex items-center justify-center h-12 w-12 mr-1 rounded-full fab fill-current text-white text-xl fa-facebook-f">
                                 <a   href="{{ session()->has('client_team')  ?                                   
                                     session('client_team')->fackbook_link  !='' ? 
                                     session('client_team')->fackbook_link  : 'https://www.facebook.com/'.session('client_team')->fackbook_link                            
                                 :'https://www.facebook.com/fempirefreight'}}" 
                                     class="text-white hover:text-blue-500">
                                     <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                         <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                         </path>
                                     </svg>
                                 </a>
                             </i>


                             <!-- <i style="background-color:#125688;"
                                         class="flex items-center justify-center h-12 w-12 mx-1 rounded-full fas fill-current text-white text-xl fa-envelope">
                                        
                                        </i> -->


                             <i style="background-color:#820000"
                                 class="flex items-center justify-center h-12 w-12 mx-1 rounded-full fab fill-current text-white text-xl fa-instagram">

                                 <a 
                                 href="{{ session()->has('client_team')  ?
                                         session('client_team')->instagram_link  !='' ? 
                                         session('client_team')->instagram_link  : 'https://www.instagram.com/'.session('client_team')->instagram_link                            
                                 :'https://www.instagram.com/fempirefreight'}}"  
                                     class="  text-white hover:text-blue-500">
                                     <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                         stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                         viewBox="0 0 24 24">
                                         <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                         <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01">
                                         </path>
                                     </svg>
                                 </a>
                             </i>


                             <i style="background-color:#55ACEE;"
                                 class="flex items-center justify-center h-12 w-12 mx-1 rounded-full fab fill-current text-white text-xl fa-twitter">
                                 <a href="{{ session()->has('client_team')  ?
                                       session('client_team')->twitter_link  !='' ? 
                                       session('client_team')->twitter_link  : 'https://twitter.com/'.session('client_team')->twitter_link                            
                                 :'https://twitter.com/fempirefreight'}}" class="  text-white hover:text-blue-500">
                                     <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                         <path
                                             d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                         </path>
                                     </svg>
                                 </a>
                             </i>

                             <i style="background-color:#fff;"
                                 class="flex items-center justify-center h-12 w-12 mx-1 rounded-full fab fill-current text-white text-xl fa-twitter">
                                 <a href="
                                 {{ session()->has('client_team')
                                  ? 
                                        session('client_team')->whatsapp_link !='' ? 
                                        session('client_team')->whatsapp_link  :'https://api.whatsapp.com/send?phone=447717750364&text=I am requesting information about FEMPIREfreight Service'

                                 :'https://api.whatsapp.com/send?phone=447717750364&text=I am requesting information about FEMPIREfreight Service'}}" 

                                 
                                     class="  text-white hover:text-blue-500">
                                     <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         class="w-14 h-14" viewBox="0 0 1219.547 1225.016">
                                         <path fill="#E0E0E0"
                                             d="M1041.858 178.02C927.206 63.289 774.753.07 612.325 0 277.617 0 5.232 272.298 5.098 606.991c-.039 106.986 27.915 211.42 81.048 303.476L0 1225.016l321.898-84.406c88.689 48.368 188.547 73.855 290.166 73.896h.258.003c334.654 0 607.08-272.346 607.222-607.023.056-162.208-63.052-314.724-177.689-429.463zm-429.533 933.963h-.197c-90.578-.048-179.402-24.366-256.878-70.339l-18.438-10.93-191.021 50.083 51-186.176-12.013-19.087c-50.525-80.336-77.198-173.175-77.16-268.504.111-278.186 226.507-504.503 504.898-504.503 134.812.056 261.519 52.604 356.814 147.965 95.289 95.36 147.728 222.128 147.688 356.948-.118 278.195-226.522 504.543-504.693 504.543z" />
                                         <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="609.77" y1="1190.114"
                                             x2="609.77" y2="21.084">
                                             <stop offset="0" stop-color="#20b038" />
                                             <stop offset="1" stop-color="#60d66a" />
                                         </linearGradient>
                                         <path fill="url(#a)"
                                             d="M27.875 1190.114l82.211-300.18c-50.719-87.852-77.391-187.523-77.359-289.602.133-319.398 260.078-579.25 579.469-579.25 155.016.07 300.508 60.398 409.898 169.891 109.414 109.492 169.633 255.031 169.57 409.812-.133 319.406-260.094 579.281-579.445 579.281-.023 0 .016 0 0 0h-.258c-96.977-.031-192.266-24.375-276.898-70.5l-307.188 80.548z" />
                                         <image overflow="visible" opacity=".08" width="682" height="639"
                                             xlink:href="FCC0802E2AF8A915.png" transform="translate(270.984 291.372)" />
                                         <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFF"
                                             d="M462.273 349.294c-11.234-24.977-23.062-25.477-33.75-25.914-8.742-.375-18.75-.352-28.742-.352-10 0-26.25 3.758-39.992 18.766-13.75 15.008-52.5 51.289-52.5 125.078 0 73.797 53.75 145.102 61.242 155.117 7.5 10 103.758 166.266 256.203 226.383 126.695 49.961 152.477 40.023 179.977 37.523s88.734-36.273 101.234-71.297c12.5-35.016 12.5-65.031 8.75-71.305-3.75-6.25-13.75-10-28.75-17.5s-88.734-43.789-102.484-48.789-23.75-7.5-33.75 7.516c-10 15-38.727 48.773-47.477 58.773-8.75 10.023-17.5 11.273-32.5 3.773-15-7.523-63.305-23.344-120.609-74.438-44.586-39.75-74.688-88.844-83.438-103.859-8.75-15-.938-23.125 6.586-30.602 6.734-6.719 15-17.508 22.5-26.266 7.484-8.758 9.984-15.008 14.984-25.008 5-10.016 2.5-18.773-1.25-26.273s-32.898-81.67-46.234-111.326z" />
                                         <path fill="#FFF"
                                             d="M1036.898 176.091C923.562 62.677 772.859.185 612.297.114 281.43.114 12.172 269.286 12.039 600.137 12 705.896 39.633 809.13 92.156 900.13L7 1211.067l318.203-83.438c87.672 47.812 186.383 73.008 286.836 73.047h.255.003c330.812 0 600.109-269.219 600.25-600.055.055-160.343-62.328-311.108-175.649-424.53zm-424.601 923.242h-.195c-89.539-.047-177.344-24.086-253.93-69.531l-18.227-10.805-188.828 49.508 50.414-184.039-11.875-18.867c-49.945-79.414-76.312-171.188-76.273-265.422.109-274.992 223.906-498.711 499.102-498.711 133.266.055 258.516 52 352.719 146.266 94.195 94.266 146.031 219.578 145.992 352.852-.118 274.999-223.923 498.749-498.899 498.749z" />
                                     </svg>

                                 </a>
                             </i>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Footer bottom -->
         <div style="font-family: 'Baloo Tamma 2', cursive; background-color: rgba(0, 0, 0, 0.7);">
             <div class="container mx-auto px-6 lg:px-20 py-6">
                 <div class="  justify-center text-gray-300 mb-1">

                     <span class="font-bold"> © FEMPIREfreight </span> 2021 All right reserved.
                 </div>
                 <!-- <div class="flex font-light justify-center text-gray-500 text-sm">
                     <p>Designed by <span class="font-bold">vorkkloc.com</span></p>
                 </div> -->
             </div>
         </div>
     </div>
 </section>
