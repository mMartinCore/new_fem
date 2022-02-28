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
                        name="usernames"class=" sm:w-full leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme  mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Email</label>
                        <input name="email" type="email" placeholder="email" value=" "  class="leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme
                          mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
                </div>
				<div class="md:flex items-center mt-4">
                    <div class="w-full  md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Phone #</label>
                        <input   name="phone"  type="text" placeholder="phone" value=" " class="leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme 
						 mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
                    <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Package ID # <span class="required">*  </span></label> 
                        <input required name="tracking" type="text"  placeholder="Package ID" id="tracking"   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme  mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
                </div>
				 <div class="md:flex items-center mt-4">
                    <div class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Shipping Address line 1</label>
                        <input   name="address"  type="text" placeholder="Shipping Address line 1" value=" " class="leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme  mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
					<div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="font-semibold leading-none">Shipping Address line 2</label>
                        <input   name="shipping_address"  type="text" placeholder="Shipping Address line 2" value=" " class="leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme  mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
                    <div  style="display:none;" class="w-full md:w-1/2 flex flex-col">
                        <label class="font-semibold leading-none">Warehouse Address</label> 
                        <input required name="r_dest"   placeholder="Warehouse Address" value=" "   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme  mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
                </div>
				<div class="md:flex items-center mt-4">
                    <div class="w-full   flex flex-col">
                        <label class="font-semibold leading-none">Courier *   </span></label>
                        <input name="courier" type="text"  required  placeholder="Courier " id="courier"  class="leading-none text-gray-900 p-3 focus:outline-none 
						focus:border-site_color_theme  mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>
          
                </div>
             
                <div>
                    <div class="w-full flex flex-col mt-4">
                        <label class="font-semibold leading-none"> Message/Requests/Notes<span class="required">*   </span></label>
                          
                        <textarea   type="text" placeholder="Message/Requests/Notes " id="message" name="message" class="h-20 text-base leading-none text-gray-900 p-3 focus:oultine-none 
					 	focus:border-site_color_theme  mt-4 bg-gray-100 border rounded border-gray-200" required>
						 
						</textarea>
                    </div>


					<div class="w-full flex flex-col mt-4">
                        <label class="font-semibold leading-none">Attach Invoice<span class="required">*</span></label>
						<input name="invoice" type="file"   required  class="leading-none text-gray-900 p-3 focus:outline-none focus:border-site_color_theme  mt-4 bg-gray-100 border rounded border-gray-200">
                    </div>

					<div class="w-full flex flex-col mt-4"> 
						<label class="inline-flex items-center mt-3 font-semibold leading-none">
						<input type="checkbox" id="repack" name="repack"   class="form-checkbox h-5 w-5 text-green-600"  ><span class="ml-2 text-gray-700">Repacking Required? (Free)</span>
                    </div>
					<div class="w-full flex flex-col mt-4"> 
						<label class="inline-flex items-center mt-3 font-semibold leading-none">
						<input type="checkbox" id="snap" name="snap"  class="form-checkbox h-5 w-5 text-green-600"  ><span class="ml-2 text-gray-700">Detailed Parcel Snap (Additional Fee) </span>
                    </div>

					<div class="w-full flex flex-col mt-12   ">
					<label class="font-semibold leading-none w-full "> Preffered Shipping Method <span class="required">* </span>
					 	<select  name="shipping" id="shipping"  class=" w-full form-select form-select-lg  leading-none text-gray-900 p-3 
						 focus:outline-none focus:border-site_color_theme mt-4 bg-gray-100 border rounded border-gray-200 px-4"> 
							   <option value="Preffered Shipping Method">Preffered Shipping Method</option>
								<option value="Express (4- 7 days)">Express (4- 7 days)</option>
								<option value="Standard (8- 15 days)">Standard (8- 15 days)</option>
								<option value="Seafreight (4-8 weeks)">Seafreight (4-8 weeks)</option>
								<option value="Kingston Group Shipment (15-20 days)">Kingston Group Shipment (15-20 days)</option>
								<option value="Kingston Group Shipment (35-40 days)">Kingston Group Shipment (35-40 days)</option>
						</select>						
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
