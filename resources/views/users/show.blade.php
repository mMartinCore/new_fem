 <x-admin-layout>  
    <div class="mt-8">
        <div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8 mb-4">
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">   
 

                 	 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 px-4 xl:p-0 gap-4 xl:gap-6">
             
                <div class="bg-white p-6 rounded-xl border border-gray-50">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col">
						<p class="text-md font-semibold text-gray-600 tracking-wide"> Package(s)</p>
                            <h3 class="mt-1 text-lg text-site_color_hover font-bold">
                             {{$package_count}}
                            </h3>
							<a  href="{{ route('packages.list',$show_user_id)}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                        </div>
						<div class="bg-gray-200 p-2 md:p-1 xl:p-2 rounded-md">					 
						<svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-8 md:h-6 xl:h-8 object-cover"fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-50">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col">
						<p class="text-md font-semibold text-gray-600 tracking-wide">Merge Packages</p>
                            <h3 class="mt-1 text-lg text-site_color_hover font-bold">{{$merge_count }}</h3> 
							<a  href="{{route('merges.merge-list',$user->id)}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover 
                            hover:font-bold ">Click to View </a>
                        </div>
                        <div class="bg-gray-200 p-2 md:p-1 xl:p-2 rounded-md">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-8 md:h-6 xl:h-8 object-cover" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
						</svg> 
 
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-50">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col">
						<p class="text-md font-semibold text-gray-600 tracking-wide">Invoices</p>
                            <h3 class="mt-1 text-lg text-site_color_hover font-bold">{{ $invoice_count }}</h3>
							<a  href="{{route('invoices.invoiceList',$user->id)}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                        </div>
						<div class="bg-gray-200 p-2 md:p-1 xl:p-2 rounded-md">
						 	<svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-8 md:h-6 xl:h-8 object-cover" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
							</svg> 
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-50">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col">
						<p class="text-md font-semibold text-gray-600 tracking-wide">Buy For Me </p>
                            <h3 class="mt-1 text-lg text-yellow-500 font-bold">{{ $buyforme_count}}</h3>
							<a  href="{{ route('buyformes.index',$user->id)}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                        </div>
						<div class="bg-gray-200 p-2 md:p-1 xl:p-2 rounded-md">
							<svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-8 md:h-6 xl:h-8 object-cover"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
							</svg> 
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl border border-gray-50">
                    <div class="flex justify-between items-start"> 
                        <div class="flex flex-col">
                            <p class="text-md font-semibold text-gray-600 tracking-wide">Balance</p>
                            <h3 class="mt-1 text-lg text-site_color_hover font-bold">
                                $ {{ number_format($balance,2) }} 
                            </h3>
                        </div>
                        <div class="bg-gray-200 p-2 md:p-1 xl:p-2 rounded-md">
                           <svg xmlns="http://www.w3.org/2000/svg"  class="w-auto h-8 md:h-6 xl:h-8 object-cover" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
                        </div>
                    </div>
                </div>
			
            </div>

            

            </div>
        </div>
           @include('users.userinfo')
    </div>
      @include('layouts/footer') 
</x-admin-layout>
