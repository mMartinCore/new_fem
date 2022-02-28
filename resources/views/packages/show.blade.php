 <x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
           Package Details
        </h2> 
    </x-slot>
     <div class="mt-8">
         <div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8">
             <div class="bg-gray-100 overflow-hidden shadow-xl  sm:rounded-lg">

                 <div class="md:rounded-b-md  px-4 bg-white  ">
                     <div class=" py-2 border-b border-gray-200">
                        <div class="mt-4 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8  ">
                             <div  class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">

                                 <div class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                                 <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                                         <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">
                                             Package/Parcel Detail</h3>
                                         <div  class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Track #
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->package_id }}</p>
                                             </div>
                                                   <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Package #
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->tracking_number }}</p>
                                             </div>
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Courier
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->courier }} </p>
                                             </div>
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Courier Mode
                                                 </p>
                                                 {{-- p-2 border border-green-200 rounded-full bg-green-400 text-gray-600 --}}
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->courier_status }} </p>
                                             </div>
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800"> 
                                                     Status</p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                      {{ $package->packagestatus->name}} </p>
                                             </div>
                                                <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Status Updated At
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->package_status_date }} </p>
                                             </div>
                                              
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Payment
                                                     status</p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->payment_status }} </p>
                                             </div>
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Shipping
                                                     Line</p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">FEMPIRE
                                                     Freight </p>
                                             </div>
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Payment
                                                     Mode</p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->payment_mode }} </p>
                                             </div>
                                                  <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Quantity
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->quantity }}</p>
                                             </div>
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Dimension
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->dimension() }}</p>
                                             </div>
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Dimension
                                                     Weight</p>
                                                 <div class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->dimensionWeight() }}</div>
                                             </div>

                                             <div class="flex justify-between w-full">

                                                 <table class="w-full divide-y divide-gray-200 text-sm">
                                                     <tbody class="divide-y divide-gray-200">
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
                                                                         {{ $package->description }} </p>
                                                                 </div>
                                                             </td>

                                                         </tr>
                                                     </tbody>
                                                 </table>

                                             </div>
                                         </div>
                                         <div class="flex justify-between items-center w-full">
                                             <p class="text-base dark:text-white font-semibold leading-4 text-gray-800">
                                                 Price</p>
                                             <p
                                                 class="text-base dark:text-gray-300 font-semibold leading-4 text-gray-600">
                                                 ${{ number_format($package->price * $package->quantity, 2) }} </p>
                                         </div>



                                         <a class="w-full md:w-auto font-semibold bg-site_color_theme text-gray-100 
                                     rounded border border-gray-600 py-1 px-2 hover:bg-site_color_hover "
                                             href=" {{ route('packages.list') }} ">Back to Package List</a>
                                     </div>
                                     <div
                                         class="flex flex-col justify-center px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                                         <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Your
                                             Invoice </h3>
                                         <div class="flex justify-between items-start w-full">
                                             <div class="flex justify-center items-center lg:pr-36 space-x-4">
                                                 @if (isset($package->invoice->file_name))

                                                     @if (\File::extension($package->invoice->file_name) == 'pdf')
                                                         <div
                                                             class="file-img-box tw-pt-4 tw-pb-6 tw-text-center tw-relative">
                                                             <a href="{{ url($package->invoice->getUrl()) }}">
                                                                 <span
                                                                     class=" absolute text-white px-1 py-1 rounded 
                                            bg-red-500 p-4 ">
                                                                     {{ \Str::upper(\File::extension($package->invoice->file_name)) }}
                                                                 </span>
                                                                 <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="object-fit text-gray-200 w-28 h-28 "
                                                                     fill="none" viewBox="0 0 24 24"
                                                                     stroke="currentColor">
                                                                     <path stroke-linecap="round"
                                                                         stroke-linejoin="round" stroke-width="2"
                                                                         d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                 </svg>
                                                             </a>
                                                         </div>
                                                         <a class="text-md leading-6 dark:text-white font-semibold text-gray-800"
                                                             href="{{ url($package->invoice->getUrl()) }}">
                                                             Download your invoice
                                                         </a>
                                                     @else
                                                         @if ($package->invoice != '' && \File::extension($package->invoice->file_name) != 'PDF')
                                                             <div class="col-span-2 sm:col-span-6 mb-2">

                                                                 <a
                                                                     href="{{ url($package->invoice->getUrl('thumbnail')) }}">
                                                                     <img style="width:30%; height:30%;"
                                                                         class="border-4 border-indigo-200  object-cover "
                                                                         src="{{ $package->invoice->getUrl('thumbnail') }} "
                                                                         alt="" />
                                                                 </a>
                                                             </div>
                                                         @endif

                                                         <div class="flex flex-col justify-start items-start">
                                                             <p
                                                                 class="text-lg leading-6 dark:text-white font-semibold text-gray-800">
                                                                 @if ($package->invoice != '' && \File::extension($package->invoice->file_name) != 'PDF')
                                                                     <a  
                                                                         href="{{ url($package->invoice->getUrl('preview_thumbnail')) }}">
                                                                         View your invoice
                                                                     </a>
                                                                 @endif
                                                             </p>
                                                         </div>

                                                     @endif

                                                 @endif
 

                                                 @if ($package->confirmation_photo != '')
                                                     <div class=" ml-8">
                                                         <div
                                                             class="w-full   p-4 text-center text-gray-600 text-md bg-white ">
                                                             <p
                                                                 class="mb-4 leading-6 dark:text-white font-semibold text-gray-800">
                                                                 Comfirmation Photo
                                                             </p>
                                                             <div class="col-span-2 sm:col-span-6 mb-2">
                                                                 <a
                                                                     href="{{ url($package->confirmation_photo->getUrl('thumbnail')) }}">
                                                                     <img style="width:30%; height:30%;"
                                                                         class="border-4 border-indigo-200  object-cover "
                                                                         src="{{ $package->confirmation_photo->getUrl('thumbnail') }} "
                                                                         alt="" />
                                                                 </a>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 @endif

                                             </div>

                                         </div>


                                         @if (!empty($package->paid()))
                                                @if ($package->paid()->payment_id !='') 
                                                <a href="{{ url('invoice_package/'.$package->id) }}"  target="_blank"
                                                class="w-full hover:bg-site_color_hover   px-4 py-2 text-center rounded-md font-semibold bg-site_color_theme text-gray-100"
                                                > Print Receipt</a>
                                             @endif
                                         @endif
 

                                         @if ($package->payment->count() < 1 && $package->price > 0) 

                                        <a href="{{ url('bill_invoice/'.$package->id) }}"  target="_blank"
                                                class="w-full hover:bg-site_color_hover   flex justify-center items-center  px-4 py-2 text-center rounded-md font-semibold bg-site_color_theme text-gray-100"
                                                >
                                                <svg xmlns="http://www.w3.org/2000/svg"  class="h-8 w-8 mr-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                
                                                 View Bill Invoice </a> 

                                               <div class="w-full flex justify-center items-center">
                                                 <a class=" w-full"
                                                     href="{{ route('cash.checkoutCharge') }}">
                                                     <button
                                                        class="w-full hover:bg-site_color_hover   flex justify-center items-center  px-4 py-2 text-center rounded-md font-semibold bg-site_color_theme text-gray-100"
                                               >

                                                      <svg xmlns="http://www.w3.org/2000/svg"  class="h-8 w-8 mr-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                </svg>  Cash Payment 
                                                     </button>
                                                 </a>
                                             </div>

                                             <div class="w-full flex justify-center items-center">
                                                 <a class=" w-full"
                                                     href="{{ route('stripe.checkoutCharge') }}">
                                                     <button
                                                         class="w-full hover:bg-site_color_hover   flex justify-center items-center  px-4 py-2 text-center rounded-md font-semibold bg-site_color_theme text-gray-100"
                                               >
                                                      <div>
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8  mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                                            </svg>  
                                                                            </div>
                                                                    <div>
                                                                     Payment Online
                                                                     </div>

                                                                                                                                </button>
                                                 </a>
                                             </div>
                                        @endif
                                        @if ( $package->price < 1)
                                                  <div class="w-full bg-gray-200 mx-auto col-span-6 text-gray-600 py-2 text-center rounded">
                                                         As soon as your payment is confirmed, you will  able to make a payment.
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
     </div>
     @include('layouts/footer')
 </x-app-layout>
