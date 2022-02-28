
<div class="  flex items-top justify-center min-h-screen bg-white dark:bg-gray-900 sm:items-center sm:pt-0   ">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-20">
            <div class="mt-20 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 mr-2 bg-gray-100 dark:bg-gray-800 sm:rounded-lg">
                        <h1 class="text-3xl sm:text-3xl text-gray-700 dark:text-white font-extrabold tracking-tight mb-12 text-center">
                             
                            @if ($contact->contact_title != '')
                             {{ $contact->contact_title }}                                 
                            @else                                
                             Contact us today
                            @endif                             
                        </h1>
                        <p class=" text-lg sm:text-2xl  text-site_color_hover dark:text-gray-400 mt-2">                           
                            @if ($contact->content!= '')
                             {{ $contact->content }}                                 
                            @else                                
                             Fill in the form to commence a conversation
                            @endif 
                        </p>

                        <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400  mb-12">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="ml-4 text-md  font-semibold w-96 ">
                            LOCATION <br/>
                            @if ($contact->address_1!='')
                             {{ $contact->address_1 }}                                 
                            @else                                
                             Hartlepool Enterprise Centre, Brougham Terrace, Unit 33, Hartlepool,TS248EY.
                            @endif
                           
                            </div>
                        </div>

                        <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400  mb-12">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div class="ml-4 text-md  font-semibold w-96">
                            CALL US 24/7<br/>
                            @if ($contact->phone_no_1!='')
                             {{ $contact->phone_no_1 }}                                 
                            @else                                
                             +447717750364
                            @endif                           
                            </div>
                        </div>

                        <div class="flex items-center mt-2 text-gray-600 dark:text-gray-400  mb-12">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div class="ml-4 text-md  font-semibold w-96">
                            MAIL US<br/>
                            @if ($contact->email_1!='')
                               {{ $contact->email_1 }}                                 
                            @else                                
                             info@fempirefreight.com
                            @endif
                            </div>
                        </div>
                    </div>

         <div class="bg-white w-full shadow rounded p-8 sm:p-12  border-dashed border-2 border-site_color_theme">
            <p class="text-2xl font-bold leading-7 text-center mb-8">We are willing to help you</p>
            <form action="" method="post">
                <div class="md:flex items-center mt-4">
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Name</label>
                        <input name="name" type="text" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200" />
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Email</label>
                        <input name="email" type="email" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                </div>
                <div class="md:flex items-center mt-4">
                    <div class="w-full flex flex-col">
                        <label class="font-semibold leading-none">Subject</label>
                        <input name="Subject" type="text" class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"/>
                    </div>
                    
                </div>
                <div>
                    <div class="w-full flex flex-col mt-4">
                        <label class="font-semibold leading-none">Message</label>
                        <textarea name="Message" type="text" class="h-40 text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"></textarea>
                    </div>
                </div>
                <div class="flex items-center justify-center w-full">
                    <button class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-site_color_theme rounded hover:bg-site_color_hover focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                        Send message
                    </button>
                </div>
            </form>
        </div>
                </div>
            </div>
        </div>
    </div> 

