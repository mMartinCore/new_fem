          
  <x-app-layout> 

    <div class="mt-4">
        <div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8"> 
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
                                               Package/Parcel Details</h3>

                                             
                                          
                                         <div
                                             class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">  Pacakage #
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                    {{ $package->tracking_number }}
                                                     </p>
                                             </div>
                                              <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">  Tracking #
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->package_id }}
                                                     </p>
                                             </div>
                                             <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Package Name
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->name }} </p>
                                             </div>
                                            <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Status
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">
                                                     {{ $package->packagestatus->name }} </p>
                                             </div>
                                                 <div class="flex justify-between w-full">
                                                 <p class="text-base dark:text-white leading-4 text-gray-800">Status Updated At
                                                 </p>
                                                 <p class="text-base dark:text-gray-300 leading-4 text-gray-600">

                                                       {{ $package->package_status_date }} 
                                                </p>    
                                              
                                                   
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
                                                                       {{ $package->description ?? 'UNKNOWN' }} </p>
                                                                 </div>
                                                             </td>

                                                         </tr>
                                                     </tbody>
                                                 </table>

                                             </div>
                                         </div>
                                


                                   <a class="w-full  jusitfy-center text-center font-semibold bg-site_color_theme text-gray-100 
                                             rounded border border-gray-600 py-1 px-2 hover:bg-site_color_hover "
                                             href=" {{ route('packages.show', $package->id) }} ">View Package</a>
                                     </div>

                                    
                                    
                                     <div
                                         class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                                         <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">
                                              Delivery Information</h3>





                                               <div class="flex justify-between w-full">

                                                 <table class="w-full divide-y divide-gray-200 text-sm">
                                                     <tbody class="divide-y divide-gray-200">
                                                          <tr>
                                                             <th class="flex    py-2 whitespace-nowrap space-x-1 flex items-center">
                                                                 <p class="text-base dark:text-white leading-4 text-gray-800 ">
                                                                   <div>
                                                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 
                                                                    
                                                                    </div>
                                                                     <div>
                                                                        Estimated Date
                                                                     </div>
                                                                   </p> 
                                                             </th>
                                                         </tr>
                                                                <tr>
                                                             <td
                                                                 class="   whitespace-nowrap space-x-1 flex items-center">
                                                                 <div>
                                                                     <p class="text-sm text-gray-400  ">
                                                                       {{ $package->estimate_date }} 
                                                                       
                                                                       </p>
                                                                 </div>
                                                             </td>
                                                         </tr>
                                                         <tr>
                                                             <th
                                                                 class="mt-4 flex flex-row py-2 whitespace-nowrap space-x-1 flex items-center">
                                                              <p class="text-base dark:text-white leading-4 text-gray-800 ">
                                                                   <div>
                                                                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> 
                                                                    </div>
                                                                     <div>
                                                                        Destination
                                                                     </div>
                                                                   </p> 
                                                                  
                                                             </th>
                                                         </tr>
                                                                <tr>
                                                             <td
                                                                 class="   whitespace-nowrap space-x-1 flex items-center">
                                                                 <div>
                                                                     <p class="text-sm text-gray-400  ">
                                                                       {{ $package->destination }} </p>
                                                                 </div>
                                                             </td>
                                                         </tr>
                                                             
                                                     </tbody>
                                                 </table>

                                             </div>

 
                         
                                     </div>
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
