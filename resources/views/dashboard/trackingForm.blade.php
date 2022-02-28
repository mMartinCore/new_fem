
<style>
    .trackSeach{
        background-color: #ff00ff;
background-image: url("data:image/svg+xml,%3Csvg width='180' height='180' viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M81.28 88H68.413l19.298 19.298L81.28 88zm2.107 0h13.226L90 107.838 83.387 88zm15.334 0h12.866l-19.298 19.298L98.72 88zm-32.927-2.207L73.586 78h32.827l.5.5 7.294 7.293L115.414 87l-24.707 24.707-.707.707L64.586 87l1.207-1.207zm2.62.207L74 80.414 79.586 86H68.414zm16 0L90 80.414 95.586 86H84.414zm16 0L106 80.414 111.586 86h-11.172zm-8-6h11.173L98 85.586 92.414 80zM82 85.586L87.586 80H76.414L82 85.586zM17.414 0L.707 16.707 0 17.414V0h17.414zM4.28 0L0 12.838V0h4.28zm10.306 0L2.288 12.298 6.388 0h8.198zM180 17.414L162.586 0H180v17.414zM165.414 0l12.298 12.298L173.612 0h-8.198zM180 12.838L175.72 0H180v12.838zM0 163h16.413l.5.5 7.294 7.293L25.414 172l-8 8H0v-17zm0 10h6.613l-2.334 7H0v-7zm14.586 7l7-7H8.72l-2.333 7h8.2zM0 165.414L5.586 171H0v-5.586zM10.414 171L16 165.414 21.586 171H10.414zm-8-6h11.172L8 170.586 2.414 165zM180 163h-16.413l-7.794 7.793-1.207 1.207 8 8H180v-17zm-14.586 17l-7-7h12.865l2.333 7h-8.2zM180 173h-6.613l2.334 7H180v-7zm-21.586-2l5.586-5.586 5.586 5.586h-11.172zM180 165.414L174.414 171H180v-5.586zm-8 5.172l5.586-5.586h-11.172l5.586 5.586zM152.933 25.653l1.414 1.414-33.94 33.942-1.416-1.416 33.943-33.94zm1.414 127.28l-1.414 1.414-33.942-33.94 1.416-1.416 33.94 33.943zm-127.28 1.414l-1.414-1.414 33.94-33.942 1.416 1.416-33.943 33.94zm-1.414-127.28l1.414-1.414 33.942 33.94-1.416 1.416-33.94-33.943zM0 85c2.21 0 4 1.79 4 4s-1.79 4-4 4v-8zm180 0c-2.21 0-4 1.79-4 4s1.79 4 4 4v-8zM94 0c0 2.21-1.79 4-4 4s-4-1.79-4-4h8zm0 180c0-2.21-1.79-4-4-4s-4 1.79-4 4h8z' fill='%23f59636' fill-opacity='0.78' fill-rule='evenodd'/%3E%3C/svg%3E");

    }
    </style>
 
<div class=" trackSeach rounded-lg shadow-lg  ">
    
	<div class="container mx-auto rounded-lg py-12">
		<form action="{{ route('tracks.search')}}" method="post" >
      @csrf
        <div class="flex place-content-center 
        "> 
            <div class="flex-initial md:w-96 sm:w-48 ">
               <input required name="package_num" class=" sm:text-sm md:text-lg text-gray-900 flex-dark outline-none px-2 rounded-l-lg shadow-lg w-full h-full bg-gray-200
                 focus:border-site_color_theme focus:ring-2 focus:ring-site_color_hover
               " type="text" placeholder="Track Your Shipment eg: Sz-5241" />
            </div>
            <div class="flex-initial w-28  ">
                
              <button class="bg-site_color_hover text-white text-base  flex space-x-4 px-4 py-4 font-thin rounded-r-lg shadow-lg w-full h-full" >
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>  
              Search
                </button>
            </div>
</div>
        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" viewBox="0 0 20 20" fill="currentColor">
                 <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
			<h1 class="text-start font-bold text-gray-900 text-2xl"> 
               
                 Track Your Shipment 
		 
				<div class=" flex-row items-center  rounded-lg overflow-hidden px-2 py-1  ">
					<input class="text-base text-gray-400 flex-dark outline-none px-2 " type="text" placeholder="Sz-5241" />
					<div class="ms:flex items-center px-2 rounded-lg space-x-4 mx-auto ">
			 
						<button class="bg-indigo-500 text-white text-base rounded-lg px-4 py-2 font-thin">Search</button>
					</div>
				</div> -->
		</form>
	</div>
</div>




