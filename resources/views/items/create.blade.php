 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Add Item') }}
        </h2>
        <h1> {{ Auth::user()->currentTeam->name }} </h1>
        
    </x-slot>
 



   

<div class="container flex justify-center my-14 mx-auto " >

<div class="bg-white lg:w-1/2 sm:w-full shadow rounded p-8 sm:p-12  border-dashed border-2 border-site_color_theme">
                        
        <div class="text-3xl font-bold leading-7 text-center mb-4">
                {{ Auth::user()->currentTeam->name }}  
        </div> 
            {{-- <p class="text-2xl font-bold leading-7 text-center mb-12">Submit Order Tracking Number And Invoice </p> --}}
                           
			<form method="post"  action="#" enctype="multipart/form-data">
                <div class="md:flex items-center mt-4">
                    <div class="w-full sm:w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Name</label>
                        <input placeholder="Name" value=" " 
                        name="name"class=" sm:w-full leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme  mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Description  </label>
                        <input name="description" type="text" placeholder="description" value=" "  class="leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme
                          mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
                </div>
			 
            
                <div class="flex items-center justify-center w-full">
                    <button class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-site_color_theme rounded hover:bg-site_color_hover focus:ring-2 
                    focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                        Submit
                    </button>
                </div>
            </form>
        </div> 
</div> 

</x-app-layout>
