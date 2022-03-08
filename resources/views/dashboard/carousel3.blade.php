 <section class="text-gray-700 body-font rounded-md bg-site_color_hover ">
          <div class="container flex flex-col items-center px-4 md:ml-5 py-8 mx-auto lg:px-20 lg:py-18 md:flex-row">
                <div class="flex flex-col items-center w-full pt-0 mb-4 text-left lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 lg:mr-20 md:items-start md:text-left md:mb-0 lg:text-center">
                    <h1
                        class="mb-6 text-2xl font-bold tracking-tighter  text-center text-black lg:text-left lg:text-2xl title-font">
                        FEMPIREfreight shipping is hassle-free and our rates are as transparent as it gets.
                    </h1>
                    @if (session()->has('client_team'))
                            <p class="flex items-center mb-2 text-gray-700  text-lg font-medium leading-loose">
                                   {{session('client_team')->carousel_txt_2!=''? session('client_team')->carousel_txt_2:' Package Consolidation and Fast Worldwide Delivery.'}} 
                            
                            </p>
                    @else
                    <p class="flex items-center mb-2 text-gray-600"><span
                            class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mr-2 rounded-full bg-site_color_theme ">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" />
                            </svg>
                        </span>
                        PACKAGE CONSOLIDATION
                    </p>
                    <p class="flex items-center mb-2 text-gray-600">
                        <span
                            class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mr-2 rounded-full bg-site_color_theme ">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" />
                            </svg>
                        </span>
                        Fast Worldwide Delivery
                    </p>
                    <p class="flex items-center mb-0 text-gray-600">
                        <span
                            class="inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mr-2 rounded-full bg-site_color_theme ">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z" />
                            </svg>
                        </span>
                        24/7 Support
                    </p>                        
                    @endif
                </div>
                <div class="max-w-lg  lg:max-w-lg lg:w-full md:w-1/2 mr-4">
                    <img class="object-fit object-center rounded-lg h-80 w-full  "  
                        src="{{ session()->has('client_team')  ? 
                         session('client_team')->carousel_img_2 !=''? session('client_team')->carousel_img_2->getUrl('preview_thumbnail') : asset('images/2.png')
                         
                         : asset('images/2.png') }}" alt="Femempire">
                 </div>
            </div>
        </section>
