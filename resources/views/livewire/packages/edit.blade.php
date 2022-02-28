<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __(' Update Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update detail information.') }}
    </x-slot>

    <x-slot name="form"> 

          <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Tracking #') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="tracking_number" autofocus />
            <x-jet-input-error for="tracking_number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Item Name/Nickname of Package') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        
  
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('courier') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="courier" autofocus />
            <x-jet-input-error for="courier" class="mt-2" />
        </div>
     
 
        {{-- <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Payment_mode') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="payment_mode" autofocus />
            <x-jet-input-error for="payment_mode" class="mt-2" />
        </div>
      --}}
        {{-- <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('payment_status') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="payment_status" autofocus />
            <x-jet-input-error for="payment_status" class="mt-2" />
        </div> --}}
{{--  
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Status') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="status" autofocus />
            <x-jet-input-error for="status" class="mt-2" />
        </div>
      --}}





 @if (isset($invoice->file_name) ) 
                                
    @if (\File::extension($invoice->file_name) == 'pdf')
        <div class="file-img-box pt-4 pb-6 text-center relative">
            <a href="{{ url($invoice->getUrl())}}"> 
            <span class=" absolute text-white px-1 py-1 rounded 
            bg-red-500 p-4 "> {{\Str::upper(\File::extension($invoice->file_name))}}
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" class="object-fit text-gray-200 w-28 h-28 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
                </a> 
        </div> 
     @else 

     
            @if ($invoice!='') 
            <div class="col-span-6 sm:col-span-6 mb-2"> 
                <x-jet-label for="name" value="{{ __(' Invioce') }}" />
                <div>
                <img style="width:30%; height:30%;"  class="border-4 border-indigo-200  object-cover " src="{{ $invoice->getUrl('preview_thumbnail') }} " alt="" />   
            </div>
            </div>                
         @endif 
         

    @endif
    
                            
        
    @endif   

 
    
         <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="name" value="{{ __('Upload Your Replacement Invoice Here') }}" />
                    <x-filepond
                wire:model="new_invoice"
                multiple
                allowImagePreview
                imagePreviewMaxHeight="200"
                allowFileTypeValidation
                acceptedFileTypes="['image/png','image/jpg','image/jpeg','application/pdf','image/*']"
                allowFileSizeValidation
                maxFileSize="4mb"/>
         </div>
     <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Description') }}" />
            <x-textarea   wire:model.defer="description" id="" class="block mt-1 w-full"  autofocus type="text" ></x-textarea> 
            <x-jet-input-error for="description" class="mt-2" />
        </div> 

       @hasrole('Super|Admin')
       <div class="w-full bg-black mx-auto col-span-6 text-gray-200 text-center">
         ADMINISTRATION ONLY
        </div>


    
        @if ($confirmation_photo!='') 
            <div class="col-span-6 sm:col-span-6 mb-2"> 
                <x-jet-label for="name" value="{{ __(' Confirmation Photo') }}" />
                <div>
                <img style="width:30%; height:30%;"  class="border-4 border-indigo-200  object-cover " src="{{ $confirmation_photo->getUrl('preview_thumbnail') }} " alt="" />   
            </div>
            </div>                
         @endif 
         

              <div class="col-span-6 sm:col-span-6">
                <x-jet-label for="name" value="{{ __('Upload Comfirmation Photo') }}" />
                    <x-filepond
                wire:model="new_confirmation_photo"
                multiple
                allowImagePreview
                imagePreviewMaxHeight="200"
                allowFileTypeValidation
                acceptedFileTypes="['image/png','image/jpg','image/jpeg','image/*']"
                allowFileSizeValidation
                maxFileSize="4mb"/>
             <x-jet-input-error for="new_confirmation_photo" class="mt-2" />
         </div>





      <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Quantity') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="quantity" autofocus />
            <x-jet-input-error for="quantity" class="mt-2" />
        </div>
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('weight') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="weight" autofocus />
            <x-jet-input-error for="weight" class="mt-2" />
        </div>
      
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('length') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="length" autofocus />
            <x-jet-input-error for="length" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('width') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="width" autofocus />
            <x-jet-input-error for="width" class="mt-2" />
        </div> 
       
       <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('height') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="height" autofocus />
            <x-jet-input-error for="height" class="mt-2" />
        </div>
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Price') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="price" autofocus />
            <x-jet-input-error for="price" class="mt-2" />
        </div>

          <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Destination ') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="destination" autofocus />
            <x-jet-input-error for="destination" class="mt-2" />
        </div>
          <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Estimated Delivery Date ') }}" />  
                <x-jet-input  class="mt-1 block w-full  "
                placeholder="{{ __('MM/DD/YYYY')}}" 
                id="estimate_date" 
                wire:model="estimate_date"
                type="text"  
                autocomplete="off"            
                data-provide="datepicker"
                data-date-autoclose="true"
                data-date-format='MM/DD/YYYY' 
                data-date-today-highlight="true"                        
                onchange="this.dispatchEvent(new InputEvent('input'))"
                autofocus />
                <x-jet-input-error for="estimate_date" class="mt-2" />
            <script>  
                /*
                SET DATEPICKER ID
                new Pikaday({ field: document.getElementById('var7') , 'format': 'MM/DD/YYYY', firstDay: 1, minDate: new Date()})*/
                new Pikaday({ field: document.getElementById('estimate_date') , 'format': 'MM/DD/YYYY', firstDay: 1, minDate: new Date()})
                </script>
            </div> 
    <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Package Category') }}" />
                 <select  wire:model.defer="category_id" class="block appearance-none rounded-md w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>                        
                    @endforeach 
                </select>                
            <x-jet-input-error for="packagestatus_id" class="mt-2" />
        </div> 

     <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Package Status') }}" />
                 <select  wire:model.defer="packagestatus_id" class="block appearance-none rounded-md w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Select Status</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>                        
                    @endforeach 
                </select>                
            <x-jet-input-error for="packagestatus_id" class="mt-2" />
        </div> 
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Package Status Date') }}" />
            <x-jet-input type="text" disabled class="mt-1   block w-full" wire:model.defer="package_status_date" autofocus /> 
        </div>





      <div class="w-full bg-black mx-auto col-span-6 text-gray-200 text-center">
         HAND OVER ONLY
        </div>

          <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Name of the Person') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="handovername" autofocus />
            <x-jet-input-error for="handovername" class="mt-2" />
        </div>
          <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Hand Over Date ') }}" />  
                <x-jet-input  class="mt-1 block w-full  "
                placeholder="{{ __('MM/DD/YYYY')}}" 
                id="handover_date" 
                wire:model="handover_date"
                type="text"  
                autocomplete="off"            
                data-provide="datepicker"
                data-date-autoclose="true"
                data-date-format='MM/DD/YYYY' 
                data-date-today-highlight="true"                        
                onchange="this.dispatchEvent(new InputEvent('input'))"
                autofocus />
                <x-jet-input-error for="handover_date" class="mt-2" />
            <script>  
                /*
                SET DATEPICKER ID
                new Pikaday({ field: document.getElementById('var7') , 'format': 'MM/DD/YYYY', firstDay: 1, minDate: new Date()})*/
                new Pikaday({ field: document.getElementById('handover_date') , 'format': 'MM/DD/YYYY', firstDay: 1, minDate: new Date()})
                </script>
            </div> 


             @endrole
        {{-- END --}}

    </x-slot>

    <x-slot name="actions">
        <x-back-btn-link url="packages.list" class="mr-2" >
            {{ __('Back') }}
        </x-back-btn-link>

         <x-jet-button>
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
    
</x-jet-form-section>
