<div>
<div class=" grid shadow-xl   sm:grid-cols-1 gap-0 md:grid-cols-2 mb-0 w-full ">
     <div  class="   inset-0 bg-gray-50  bg-opacity-25"> 
        @if (session('client_team')->carousel_text_3!='')                            
            <div class="  justify-center p-12 text-gray-600 ">
                <h1 class="mb-2 text-3xl   sm:px-12 lg:px-20 font-semibold tracking-tighter text-black sm:text-2xl xs:text-2xl title-font">
                        Buy High Quality Products in China. Ship Worldwide.
                </h1>
                {{-- <p class="  mb-text-base text-lg sm:text-sm leading-loose  font-medium   ">  --}}
                <p class="mb-8  md:mt-8 sm:px-12 lg:px-20  text-lg tracking-tighter font-medium leading-loose text-gray-600">
     
                     {{session('client_team')->carousel_text_3}} 
                </p>                    
                <div class=" flex justify-center">
                    <a href="#" class=" py-2  px-6   font-semibold transition duration-500 ease-in-out
                            transform border-yellow-400   border-solid border-2 rounded-lg  hover:text-white bg-site_color_hover  
                            hover:bg-site_color_theme text-white focus:ring focus:outline-none">
                    Sign Fast
                </a> 
                </div>
            </div>                
        @else
            <div class=" justify-center p-8">
                <h1 class="mb-2 text-3xl font-semibold tracking-tighter text-black sm:text-3xl xs:text-3xl title-font">
                        Buy High Quality Products in China. Ship Worldwide.
                </h1>
                <p class="  mb-text-base text-lg leading-2   font-medium leading-relaxed text-gray-600"> 
                        Your reliable partner for Shopping and Shipping from China.
                </p>                    
                <div class=" flex justify-center">
                    <a href="/register" class=" py-2  px-6  mt-4 font-semibold transition duration-500 ease-in-out
                            transform border-yellow-400   border-solid border-2 rounded-lg  hover:text-white bg-site_color_hover  
                            hover:bg-site_color_theme text-white focus:ring focus:outline-none">
                    Sign Fast
                </a> 
                </div>
            </div> 
        @endif      
        </div>
        <div class="  "> 
        <div class="justify-center   text-gray-100 ">
            <div class="min-h-96 flex items-center justify-center bg-gray-200">
                <div class="w-full  max-w-full h-96 rounded-r-lg shadow-2xl overflow-hidden relative">
                    <img class=" h-96 w-full object-cover" src="{{ session('client_team')->carousel_img_3 !='' ?  session('client_team')->carousel_img_3->getUrl('preview_thumbnail'):'' }} " alt="" />
                             
                </div>
            </div>
        </div>
     </div>
</div>

</div>

