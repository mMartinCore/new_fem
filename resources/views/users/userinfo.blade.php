<div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8 mt-8 mb-8">
    <div class="bg-gray-100 overflow-hidden shadow-xl  sm:rounded-lg">

        <div class="md:rounded-b-md  px-4 bg-white  ">
            <div class=" py-2 border-b border-gray-200">

                <div class="mt-4 flex flex-col xl:flex-row jusitfy-center items-stretch w-full xl:space-x-8  ">
                    <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">

                        <div
                            class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">

                            <div
                                class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                                <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">
                                    User/Customer Information</h3>


                                <!-- Current Profile Photo -->
                                <div class="mt-2">
                                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                        class="rounded-full h-20 w-20 object-cover">
                                </div>

                                <div
                                    class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                                    <div class="flex justify-between w-full">
                                        <p class="text-base dark:text-white leading-4 text-gray-800">Name :
                                            {{ $user->name }}
                                        </p>
                                    </div>
                                    <div class="flex justify-between w-full">
                                        <table class="w-full divide-y divide-gray-200 text-sm">
                                            <tbody class="divide-y divide-gray-200">
                                                <tr>
                                                    <th class=" py-2 whitespace-nowrap space-x-1 flex items-center">
                                                        <p class="text-base dark:text-white leading-4 text-gray-800 ">
                                                            Phone #
                                                        </p>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="   whitespace-nowrap space-x-1 flex items-center">
                                                        <div>
                                                            <p class="text-sm text-gray-400  ">
                                                                {{ $user->phone ?? 'UNKNOWN' }}</p>
                                                            </p>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th class=" py-2 whitespace-nowrap space-x-1 flex items-center">
                                                        <p class="text-base dark:text-white leading-4 text-gray-800 ">
                                                            Email
                                                        </p>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="   whitespace-nowrap space-x-1 flex items-center">
                                                        <div>
                                                            <p class="text-sm text-gray-400  ">{{ $user->email }}</p>
                                                            </p>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th class=" py-2 whitespace-nowrap space-x-1 flex items-center">
                                                        <p class="text-base dark:text-white leading-4 text-gray-800 ">
                                                            Address
                                                        </p>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="   whitespace-nowrap space-x-1 flex items-center">
                                                        <div>
                                                            <p class="text-sm text-gray-400  ">{{ $user->address }}
                                                            </p>
                                                            </p>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th class=" py-2 whitespace-nowrap space-x-1 flex items-center">

                                                        <p class="text-base dark:text-white leading-4 text-gray-800 ">
                                                            City </p>

                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="   whitespace-nowrap space-x-1 flex items-center">
                                                        <div>

                                                            <p class="text-sm text-gray-400  ">
                                                                {{ $user->city }}
                                                            </p>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <th class=" py-2 whitespace-nowrap space-x-1 flex items-center">
                                                        <p class="text-base dark:text-white leading-4 text-gray-800 ">
                                                            Country
                                                        </p>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td class="   whitespace-nowrap space-x-1 flex items-center">
                                                        <div>
                                                            <p class="text-sm text-gray-400  ">
                                                                {{ $user->country->name }}</p>
                                                            </p>
                                                        </div>
                                                    </td>

                                                </tr>






                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>




                            <div
                                class="flex flex-col     w-full bg-gray-50 dark:bg-gray-800 space-y-6">

                                <div class="bg-gray-300   flex justify-center items-center   ">
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
                                                    <span onclick="copyEnglishOnClipboard()" style="user-select:all;">
                                                        <p class="text-sm text-gray-600 tracking-wider mb-2 bg-gray-50 p-2">
                                                            Name: {{$user->name}} <br>
                                                            Virtual Locker Id: {{$user->virtual_number}} <br>                                            
                                                            Address: {{$user->address}} <br> 
                                                        </p>
                                                        <p class="text-sm text-gray-600 tracking-wider ">
                                                            Intersection of Jianshe Road and Shengli Road,<br>
                                                            Muye District,<br>
                                                            Xinxiang City,<br>
                                                            Henan Province<br>
                                                            453002<br>
                                                            Zhang Lei 18503735533
                                                        </p>
                                                    </span>
                                                    <textarea class=" invisible hidden" id="copyEnglish" type="text"
                                                         FEMPIREfreight  Intersection of Jianshe Road and Shengli Road, Muye District, Xinxiang City, Henan Province, 453002, Zhang Lei 18503735533</textarea>
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
                                                    <span onclick="copyChineseOnClipboard()" style="user-select:all;">
                                                       <p class="text-sm text-gray-600 tracking-wider mb-2 bg-gray-50 p-2">
                                                            Name: {{$user->name}} <br>
                                                            Virtual Locker Id: {{$user->virtual_number}} <br>                                            
                                                            Address: {{$user->address}} <br> 
                                                        </p>
                                                        <p class="text-sm text-gray-600 tracking-wider ">

                                                            河南省新乡市牧野区建设路与胜利路交叉口<br>
                                                            453002<br>
                                                            张磊18503735533<br>
                                                        </p>
                                                    </span>
                                                    <textarea class=" hidden " id="copyChinesex" type="text"
                                                        class=" ">FEMPIREfreight 河南省新乡市牧野区建设路与胜利路交叉口 453002 张磊18503735533</textarea>
                                                </div>
                                            </li>
                                        </ul>
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
