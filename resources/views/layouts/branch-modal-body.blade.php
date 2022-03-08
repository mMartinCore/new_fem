
    <div class="bg-black bg-opacity-50 z-50 absolute inset-0 hidden justify-center  items-center" id="overlay">
        <div class="bg-gray-200  lg:w-2/5 py-2 px-3 rounded shadow-xl text-gray-800">
            <div class="flex  justify-between items-center text-center">
                <h3 id="message" class="md:text-2xl text-base text-gray-900 font-semibold text-center text-center ">Select Branch</h3>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="mt-2 text-sm">
               {{ __('Select Branch to send and receive your package/parcel/shipment') }}


<!-- component -->
 
 
	<div class="col-span-12">
		<div class="overflow-auto flex content-center lg:overflow-visible ">
			<table class="table text-gray-200 border-separate space-y-6 px-4 text-sm w-auto mt-4">		 
				<tbody>
               @if (session()->exists('branches'))
                     @foreach(session('branches') as $branch)                       
                   <tr class="bg-site_color_theme rounded-full mt-4">
                    	
						<td class="p-2">
							<div class="flex align-items-center">
                             <a   href="{{ 'http://'.$branch->domain.'.'.config('app.short_url') }}">	
								<img class="rounded-full h-12 w-12  object-cover" src="{{ $branch->logo !=null? $branch->logo->getUrl('thumbnail'):'NO IMAGE'}}" alt="unsplash image">
                                 </a>
						 	</div>
						</td>
						<td class="p-2  text-2xl">
                        @if ($branch->country_id !='')
                         <a   href="{{ 'http://'.$branch->domain.'.'.config('app.short_url') }}">	
                            {{  $branch->country->name }}
					     </a>
                        @endif
                    
                 
							
						</td>
                    <td class="p-3 text-2xl ">
                      <a   href="{{ 'http://'.$branch->domain.'.'.config('app.short_url') }}">	
                            {{ $branch->domain }}
					  </a>
							
						</td>	 
					</tr>
                    @endforeach
                    @endif 
				</tbody>
			</table>
		</div>
	</div>
 
 







            </div>
            <div class="mt-3 flex justify-end space-x-3">
                <button class="px-3 py-1 rounded hover:bg-site_color_theme hover:bg-opacity-50 hover:text-red-900 " id="close-modal_btn_cancel">CLOSE</button> 
            </div>
        </div>
    </div> 
         <input type="hidden" id='nonBranch' value="{{ $noBranch??'' }}">
    <script>
        window.addEventListener('DOMContentLoaded', () =>{

            const overlay = document.querySelector('#overlay')
            const delBtn = document.querySelector('#delete-btn')
            const closeBtn = document.querySelector('#close-modal')
            const closeBtn_cancel = document.querySelector('#close-modal_btn_cancel')

            const nonBranch = document.querySelector('#nonBranch').value  
            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            delBtn.addEventListener('click', toggleModal)
            closeBtn_cancel.addEventListener('click', toggleModal)
            closeBtn.addEventListener('click', toggleModal)  
          
          //DISPALY THE MODAL TO SELECT BRANCH WHEN THE USER DOES NOT SELECT A BRANCH
            if(nonBranch=='nonBranch'){
                  overlay.classList.toggle('hidden')
                  overlay.classList.toggle('flex')
            } 

        })

    </script>