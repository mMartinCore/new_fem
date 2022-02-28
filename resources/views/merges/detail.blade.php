<div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8 mb-8">
             <div class="bg-gray-100 overflow-hidden shadow-xl  sm:rounded-lg">

                 <div class="md:rounded-b-md  px-4 bg-white  ">
                     <div class=" py-2 border-b border-gray-200">

                         <div class="mt-4 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8  ">
                             <div
                                 class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">

                                 <div
                                     class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">

                                     <div
                                         class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                                         <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">
                                             Merge Package/Parcel Details</h3>

                                             
                                          
                                         <div
                                             class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Merge Tracking #
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $merge->id }}</p>
                                             </div>
                                             
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Merge Name
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $merge->name }} </p>
                                             </div>
                                            <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Status
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $merge->packagestatus->name }} </p>
                                             </div>
                                                 <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Status Updated At
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $merge->package_status_date }} </p>
                                             </div>
                                              

                                             <div class="flex justify-between w-full">

                                                 <table class="w-full divide-y divide-gray-200 text-sm">
                                                     <tbody class="divide-y divide-gray-200">
                                                         <tr>
                                                             <th
                                                                 class=" py-2 whitespace-nowrap space-x-1 flex items-center">

                                                                 <p
                                                                     class="text-base dark:text-white leading-4 text-gray-800 ">
                                                                     Name/Nickname of Packages </p>

                                                             </th>
                                                         </tr>
                                                                <tr>
                                                             <td
                                                                 class="   whitespace-nowrap space-x-1 flex items-center">
                                                                 <div>

                                                                     <p class="text-sm text-gray-400  ">
                                                                       {{ $name ??'' }} </p>
                                                                 </div>
                                                             </td>

                                                         </tr>
                                                            <tr>
                                                             <th
                                                                 class=" py-2 whitespace-nowrap space-x-1 flex items-center">

                                                                 <p
                                                                     class="text-base dark:text-white leading-4 text-gray-800 ">
                                                                     Description </p>

                                                             </th>
                                                         </tr>
                                                         <tr>
                                                             <td
                                                                 class="   whitespace-nowrap space-x-1 flex items-center">
                                                                 <div>

                                                                     <p class="text-sm text-gray-400  ">
                                                                       {{ $description ??'' }} </p>
                                                                 </div>
                                                             </td>

                                                         </tr>
                                                     </tbody>
                                                 </table>

                                             </div>
                                         </div>
                                         <div class="flex justify-between items-center w-full">
                                             <p class="text-base dark:text-white font-semibold leading-4 text-gray-800">
                                               Total  Price</p>
                                             <p
                                                 class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600">
                                                ${{ number_format( session('amount'), 2) }} </p>
                                         </div>



                                         <a class="w-full md:w-auto font-semibold bg-site_color_theme text-gray-100 
                                                 rounded border border-gray-600 py-1 px-2 hover:bg-site_color_hover "
                                             href=" {{ route('packages.list') }} ">Back to Package List</a>
                                     </div>
                                     <div  class="flex flex-col justify-center px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                                        

                                          


  
                                       


                                         @if (empty($merge->package->payment_id)) 
                                                <a href="{{ url('mergeinvoice_package/'.$merge->id) }}"  target="_blank"
                                                class="w-full hover:bg-site_color_hover   px-4 py-2 text-center rounded-md font-semibold bg-site_color_theme text-gray-100"
                                                > Print Receipt</a> 
                                         @endif











                                        {{-- $merge->payments->count() < 1 && --}}

 
                                           @if ( session('amount') > 0 && $merge->payment_id == '')


                                        <a href="{{ url('merge_bill_invoice/'.$merge->id) }}"  target="_blank"
                                                class="w-full hover:bg-site_color_hover   flex justify-center items-center  px-4 py-2 text-center rounded-md font-semibold bg-site_color_theme text-gray-100"
                                                >
                                                <svg xmlns="http://www.w3.org/2000/svg"  class="h-8 w-8 mr-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                
                                                 View Bill Invoice </a>  

                                               <div class="w-full flex justify-center items-center">
                                                 <a class=" w-full"
                                                     href="{{ route('mergecash.checkoutCharge') }}">
                                                     <button class="w-full hover:bg-site_color_hover   flex justify-center items-center  px-4 py-2 text-center rounded-md font-semibold bg-site_color_theme text-gray-100" >

                                                      <svg xmlns="http://www.w3.org/2000/svg"  class="h-8 w-8 mr-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                </svg>  Cash Payment    ${{ number_format( session('amount'), 2) }}
                                                     </button>
                                                 </a>
                                             </div>

                                             <div class="w-full flex justify-center items-center">
                                                 <a class=" w-full"
                                                     href="{{ route('mergeStripe.mergeCheckoutCharge') }}">
                                                     <button class="w-full hover:bg-site_color_hover   flex justify-center items-center  px-4 py-2 text-center rounded-md font-semibold bg-site_color_theme text-gray-100" >
                                                      <div>
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                                    </svg>  
                                                                    </div>
                                                                    <div>
                                                                     Payment Online    ${{ number_format( session('amount'), 2) }}
                                                           </div> 
                                                        </button>
                                                 </a>
                                             </div>
                                        @endif  
                                      
                                     </div>
                                 </div>
                             </div>




                         </div>

                     </div>



                 </div> 

 
             </div>
         </div>