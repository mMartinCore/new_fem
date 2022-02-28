

        <div class="flex flex-col space-y-8  p-8">
            <!-- First Row -->

			<div class="col-span-1 md:col-span-2 lg:col-span-4 flex px-8 justify-between">
                    <h2 class="text-xs md:text-sm text-gray-700 font-bold tracking-wide md:tracking-wider">
                        My Dashboard </h2>
                    <a href="{{url('user/profile')}}" class="text-xs flex flex-inline text-gray-800 font-semibold uppercase justify-center">
                    	<svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-8 md:h-6 xl:h-8 object-cover"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
						</svg>
                        <span class="p-2 justify-center">
                        Edit My Profile
                        </span>
                    </a>
            </div>

     <!-- Start Second Row -->
	 <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 px-4 xl:p-0 gap-4 xl:gap-6">
             
                <div class="bg-white p-6 rounded-xl border border-gray-50">
                    <div class="flex justify-between items-start">
                        <div class="flex flex-col">
						<p class="text-md font-semibold text-gray-600 tracking-wide">My Package(s)</p>
                            <h3 class="mt-1 text-lg text-site_color_hover font-bold">
                              {{auth()->user()->package->where('courier_status','!=', 'Merged')->where('handover_date', null)->where('handovername', null)->count()}}
                            </h3>
							<a  href="{{ route('packages.list')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
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
                            <h3 class="mt-1 text-lg text-site_color_hover font-bold">{{ auth()->user()->mergeCount() }}</h3> 
							<a  href="{{route('merges.merge-list')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover 
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
                            <h3 class="mt-1 text-lg text-site_color_hover font-bold">{{ auth()->user()->invoiceCount() }}</h3>
							<a  href="{{route('invoices.invoiceList')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
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
                            <h3 class="mt-1 text-lg text-yellow-500 font-bold">{{auth()->user()->buyforme->count()}}</h3>
							<a  href="{{ route('buyformes.index')}}"  class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
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
                            <p class="text-md font-semibold text-gray-600 tracking-wide">Top Up Balance</p>
                            <h3 class="mt-1 text-lg text-site_color_hover font-bold">
                                $ {{ number_format(auth()->user()->balance(),2) }} 
                            </h3>
                            <a  href="{{route('invoices.invoiceList')}}" class="mt-4 text-xs text-gray-500 hover:text-site_color_hover hover:font-bold ">Click to View </a>
                        </div>
                        <div class="bg-gray-200 p-2 md:p-1 xl:p-2 rounded-md">
                           <svg xmlns="http://www.w3.org/2000/svg"  class="w-auto h-8 md:h-6 xl:h-8 object-cover" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
                        </div>
                    </div>
                </div>
			
            </div>

  
 
<!-- <div class="relative   group">
 xxxx
	<div class="absolute bottom-0 flex flex-col items-center hidden mb-6 group-hover:flex">
		<span class="relative z-10 p-2 text-xs leading-none text-white whitespace-no-wrap bg-black shadow-lg"> 
		<ul class="mt-1 text-xs md:text-sm text-gray-50 font-light leading-tight max-w-sm"
                            style="list-style-type:disc;">
                            <li style="font-weight:bold;">
                                Copy and paste our warehouse address in Chinese to send to each supplier at the time of
                                purchase.</li>
                            <br>
                            <li style="font-weight:bold;">
                                AliExpress & Alibaba will NOT allow you to use any Chinese local address at checkout.

                            </li>
                            <br>
                            <li style="font-weight:bold;">Warehouse Address must be sent to each supplier via chat on
                                both platforms.</li>
                        </ul>

	    </span>
		<div class="w-3 h-3 -mt-2 rotate-45 bg-black"></div>
	</div>
</div>  -->

 

			<!-- sececond row -->
            <div class="grid grid-cols-1 md:grid-cols-4 xl:grid-cols-5 px-4 xl:p-0 gap-y-4 md:gap-6">
                <div class="md:col-span-2 xl:col-span-3 bg-white p-6 rounded-2xl border border-gray-50">
                  
                                <div class="   flex justify-center items-center   ">
                                    <div x-data="{ tab: 'foo' }" style="max-width:550px">
                                        <div class="flex -mx-px">
                                            <button x-on:click="tab = 'foo'"
                                                x-bind:class="{ 'bg-white border-white': tab === 'foo' }"
                                                class="bg-transparent hover:bg-gray-200 text-gray-700 text-sm md:text-base font-semibold rounded-t focus:outline-none mx-px py-px md:py-2 px-3 md:px-4"
                                                type="button">
                                                English Address
                                            </button>
                                            <button x-on:click="tab = 'bar'"
                                                x-bind:class="{ 'bg-white border-white': tab === 'bar' }"
                                                class="bg-transparent hover:bg-gray-200 text-gray-700 font-semibold rounded-t focus:outline-none mx-px py-2 px-4"
                                                type="button">
                                                Chines Address
                                            </button>

                                        </div>
                                        <ul class="bg-white text-sm rounded-b p-4">
                                            <li x-show="tab === 'foo'">
                                                <div class="px-12 p-4 w-full ">
                                                    <span class="copyMessage"></span>
                                                    <div class="flex flex-row gap-4 ">
                                                        <div onclick="copyEnglishOnClipboard()"
                                                            class="text-gray-800 font-bold tracking-widest leading-tight mt-4 p-2 mb-2">
                                                            Warehouse Address in English
                                                        </div>
                                                        <div onclick="copyEnglishOnClipboard()" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-10 w-10 text-gray-600 cursor-pointer shadow-md hover:text:gray-100 hover:bg-site_color_hover bg-site_color_theme rounded-full font-bold p-2   mt-4 mb-2  "
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                      <p class="text-sm text-gray-600 tracking-wider mb-2 bg-gray-50 p-2">
                                                            Name: {{auth()->user()->name}} <br>
                                                            Virtual Locker Id: {{auth()->user()->virtual_number}} <br>                                            
                                                            Address: {{auth()->user()->address}} <br> 
                                                        </p>
                                                    <span onclick="copyEnglishOnClipboard()" style="user-select:all;">
                                                      
                                                        <p class="text-sm text-gray-600 tracking-wider ">
                                                            Intersection of Jianshe Road and Shengli Road,<br>
                                                            Muye District,<br>
                                                            Xinxiang City,<br>
                                                            Henan Province<br>
                                                            453002<br>
                                                            Zhang Lei 18503735533
                                                        </p>
                                                    </span>
                                                    <textarea style="user-select:all;" class=" hidden  " id="copyEnglish" type="text"
                                                    
                                                        >FEMPIREfreight  Intersection of Jianshe Road and Shengli Road, Muye District, Xinxiang City, Henan Province, 453002, Zhang Lei 18503735533</textarea>
                                                </div>

                                            </li>
                                            <li x-show="tab === 'bar'">
                                                <div class=" p-4 w-full ">
                                                    <span class="copyMessage2"></span>
                                                    <div class="flex flex-row gap-4 ">
                                                        <div onclick="copyChineseOnClipboard()"
                                                            class="text-gray-800 font-bold tracking-widest leading-tight mt-4 p-2 mb-2">
                                                            Warehouse Address in Chinese ( send to each vendor/supplier)
                                                        </div>
                                                        <div onclick="copyChineseOnClipboard()" class="">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="h-10 w-10 text-gray-600 cursor-pointer shadow-md hover:text:gray-100 hover:bg-site_color_hover bg-site_color_theme rounded-full font-bold p-2   mt-4 mb-2  "
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                      <p class="text-sm text-gray-600 tracking-wider mb-2 bg-gray-50 p-2">
                                                            Name: {{auth()->user()->name}} <br>
                                                            Virtual Locker Id: {{auth()->user()->virtual_number}} <br>                                            
                                                            Address: {{auth()->user()->address}} <br> 
                                                        </p>                              
                                                    <span onclick="copyChineseOnClipboard()" style="user-select:all;">
                                                      
                                                        <p class="text-sm text-gray-600 tracking-wider ">

                                                            河南省新乡市牧野区建设路与胜利路交叉口<br>
                                                            453002<br>
                                                            张磊18503735533<br>
                                                        </p>
                                                    </span>
                                                    <textarea style="user-select:all;" class=" hidden " id="copyChinesex" type="text"
                                                        class=" ">FEMPIREfreight 河南省新乡市牧野区建设路与胜利路交叉口 453002 张磊18503735533</textarea>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

			 
                </div>
               
				
				<!-- <div
                    class="col-span-2 p-6 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-800 flex flex-col justify-between"> -->
                    <div
                    class="col-span-2 p-6 rounded-2xl bg-gradient-to-r from-site_color_theme to-pink-600 flex flex-col justify-between">
                    <div class="flex flex-col">
                        <p class="text-white font-bold">NOTICE</p>
                        <ul class="mt-1 text-xs md:text-sm text-gray-50 font-light leading-tight max-w-sm"
                            style="list-style-type:disc;">
                            <li style="font-weight:bold;">
                               Click to Copy and paste our warehouse address in Chinese to send to each supplier at the time of
                                purchase.</li>
                            <br>
                            <li style="font-weight:bold;">
                                AliExpress & Alibaba will NOT allow you to use any Chinese local address at checkout.

                            </li>
                            <br>
                            <li style="font-weight:bold;">Warehouse Address must be sent to each supplier via chat on
                                both platforms.</li>
                        </ul>

                    </div>

                </div>

            </div>
            <!-- End First Row -->      

        </div>



    <script>
    const copyChinesex = document.querySelector("#copyChinesex")
    const copyMessage = document.querySelector(".copyMessage")
    const copyMessage2 = document.querySelector(".copyMessage2")
    const copyEnglish = document.querySelector("#copyEnglish") 
 
     




    const copyChineseOnClipboard = () => {
        copyChinesex.classList.remove('hidden');
        copyChinesex.select()

        copyChinesex.setSelectionRange(0, 99999) // used for mobile phone
        document.execCommand("copy")
        copyChinesex.classList.add('hidden') 
        copyMessage2.innerHTML = ` 
                     <div class="relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md py-5 pl-6 pr-8 sm:pr-6">
					<div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
						<div class="text-green-500">
							<svg class="w-12   h-12 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
						</div>
						<div class="text-lg font-medium ml-3">Your Chinese Address COPIED!</div>
					</div> 
				</div> `
        setTimeout(() => {
            copyMessage2.innerHTML = ""
        }, 1000)
    }



    const copyEnglishOnClipboard = () => {
        copyEnglish.classList.remove('hidden')
        copyEnglish.select()
        copyEnglish.setSelectionRange(0, 99999) // used for mobile phone
        document.execCommand("copy")
        copyEnglish.classList.add('hidden')
        copyMessage.innerHTML = ` 
                     <div class="relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md py-5 pl-6 pr-8 sm:pr-6">
					<div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
						<div class="text-green-500">
							<svg class="w-12   h-12 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
						</div>
						<div class="text-lg font-medium ml-3">Your English Address COPIED!</div>
					</div> 
				</div> `
        setTimeout(() => {
            copyMessage.innerHTML = ""
        }, 1000)
    }
    </script>


