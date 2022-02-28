<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __(' Update Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update detail information.') }}
    </x-slot>

    <x-slot name="form"> 

      <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('name') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('description') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="description" autofocus />
            <x-jet-input-error for="description" class="mt-2" />
        </div>
        
       {{--
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('user_id') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="user_id" autofocus />
            <x-jet-input-error for="user_id" class="mt-2" />
        </div>
     
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('team_id') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="team_id" autofocus />
            <x-jet-input-error for="team_id" class="mt-2" />
        </div>
       --}}
       {{--
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var5') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var5" autofocus />
            <x-jet-input-error for="var5" class="mt-2" />
        </div>
     
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var6') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var6" autofocus />
            <x-jet-input-error for="var6" class="mt-2" />
        </div>
       --}}
       {{--
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var7') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var7" autofocus />
            <x-jet-input-error for="var7" class="mt-2" />
        </div>
     
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var8') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var8" autofocus />
            <x-jet-input-error for="var8" class="mt-2" />
        </div>
       --}}
      
        {{--
         <div class="col-span-6 sm:col-span-6">
                    <x-filepond
                wire:model="images"
                multiple
                allowImagePreview
                imagePreviewMaxHeight="200"
                allowFileTypeValidation
                acceptedFileTypes="['image/png','image/jpg','image/jpeg','image/*']"
                allowFileSizeValidation
                maxFileSize="2mb"/>
         </div>
        --}}
        {{--
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var9') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var9" autofocus />
            <x-jet-input-error for="var9" class="mt-2" />
        </div>
         --}}
        
        {{--
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var10') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var10" autofocus />
            <x-jet-input-error for="var10" class="mt-2" />
        </div>
         --}}

        {{-- <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var11') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var11" autofocus />
            <x-jet-input-error for="var11" class="mt-2" />
        </div> 
        --}}

       {{-- 
       <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var12') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var12" autofocus />
            <x-jet-input-error for="var12" class="mt-2" />
        </div>
       
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var13') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var13" autofocus />
            <x-jet-input-error for="var13" class="mt-2" />
        </div>
         --}}

         
       {{-- 
       <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var14') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var14" autofocus />
            <x-jet-input-error for="var14" class="mt-2" />
        </div>
       
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var15') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var15" autofocus />
            <x-jet-input-error for="var15" class="mt-2" />
        </div>
         --}}

       {{--
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var16') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var16" autofocus />
            <x-jet-input-error for="var16" class="mt-2" />
        </div>
         --}}
        {{--
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var17') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var17" autofocus />
            <x-jet-input-error for="var17" class="mt-2" />
        </div>
         --}}
        {{--
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var18') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var18" autofocus />
            <x-jet-input-error for="var18" class="mt-2" />
        </div>
         --}}
        
        {{--
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var19') }}" />
            <x-textarea   wire:model.defer="var19" id="" class="block mt-1 w-full"  autofocus type="text" ></x-textarea> 
            <x-jet-input-error for="var19" class="mt-2" />
        </div> 

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('var20') }}" />
            <x-textarea   wire:model.defer="var20" id="" class="block mt-1 w-full"  autofocus type="text" ></x-textarea> 
            <x-jet-input-error for="var20" class="mt-2" />
        </div> 
          --}}
        
          {{--
    
      
         <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('var21') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="var21" autofocus />
            <x-jet-input-error for="var21" class="mt-2" />
        </div>
        
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('{{}}') }}" />
                 <select  wire:model.defer="{{ __('{{}}') }}" class="block appearance-none rounded-md w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Options1</option>
                    <option value="">Option2</option>
                </select>                
            <x-jet-input-error for="{{}}" class="mt-2" />
        </div> 
       --}}
        {{--
          <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="name" value="{{ __('DATEPICKER1') }}" />   
            
                <x-jet-input  class="mt-1 block w-full  "
                placeholder="{{ __('MM/DD/YYYY')}}" 
                id="DATEPICKER1" 
                wire:model="DATEPICKER1"
                type="text"  
                autocomplete="off"            
                data-provide="datepicker"
                data-date-autoclose="true"
                data-date-format='MM/DD/YYYY' 
                data-date-today-highlight="true"                        
                onchange="this.dispatchEvent(new InputEvent('input'))"
                autofocus />
                <x-jet-input-error for="DATEPICKER1" class="mt-2" />
            <script>  
                /*
                SET DATEPICKER ID
                new Pikaday({ field: document.getElementById('var7') , 'format': 'MM/DD/YYYY', firstDay: 1, minDate: new Date()})*/
                new Pikaday({ field: document.getElementById('DATEPICKER1') , 'format': 'MM/DD/YYYY', firstDay: 1, minDate: new Date()})
                </script>
            </div>  
          --}}
            
            
        {{--
        <div class="col-span-6 sm:col-span-6">
             <x-filepond
                wire:model="images"
                multiple
                allowImagePreview
                imagePreviewMaxHeight="200"
                allowFileTypeValidation
                acceptedFileTypes="['image/png','image/jpg','image/jpeg','image/*']"
                allowFileSizeValidation
                maxFileSize="2mb"/>
        </div> 
        --}}


        {{-- END --}}

    </x-slot>

    <x-slot name="actions">
        <x-back-btn-link url="packagestatuss.index" class="mr-2" >
            {{ __('Back') }}
        </x-back-btn-link>

         <x-jet-button>
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
    
</x-jet-form-section>
