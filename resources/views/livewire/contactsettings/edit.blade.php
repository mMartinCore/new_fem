 
  @if ($team_id>0)  
<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __(' Add Contact Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __(' Create contact information to be displayed on contact page.')  }}
    </x-slot>

        
    <x-slot name="form"> 
     
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Email  ') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="email_1" autofocus />
            <x-jet-input-error for="email_1" class="mt-2" />
        </div>

        {{-- <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Email 2') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="email_2" autofocus />
            <x-jet-input-error for="email_2" class="mt-2" />
        </div> --}}
 
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Phone # ') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="phone_no_1" autofocus />
            <x-jet-input-error for="phone_no_1" class="mt-2" />
        </div>
     
        {{-- <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Phone # 2') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="phone_no_2" autofocus />
            <x-jet-input-error for="phone_no_2" class="mt-2" />
        </div>
      --}}
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Contact Title') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="contact_title" autofocus />
            <x-jet-input-error for="contact_title" class="mt-2" />
        </div>
     
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Content') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="content" autofocus />
            <x-jet-input-error for="content" class="mt-2" />
        </div>
              <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Address') }}" />
            <x-textarea   wire:model.defer="address_1" class="block mt-1 w-full"  autofocus type="text" ></x-textarea> 
            <x-jet-input-error for="address_1" class="mt-2" />
        </div>
                {{-- <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Address 2') }}" />
            <x-textarea   wire:model.defer="address_2" id="" class="block mt-1 w-full"  autofocus type="text" ></x-textarea> 
            <x-jet-input-error for="address_2" class="mt-2" />
        </div> --}}
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Google Map') }}" />
             <x-textarea   wire:model.defer="google_map_1" id="" class="block mt-1 w-full"  autofocus type="text" ></x-textarea> 
            <x-jet-input-error for="google_map_1" class="mt-2" />
        </div>
     
        {{-- <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Google Map 2') }}" />
               <x-textarea   wire:model.defer="google_map_2" id="" class="block mt-1 w-full"  autofocus type="text" ></x-textarea> 
            <x-jet-input-error for="google_map_2" class="mt-2" />
        </div> --}}
     
        {{-- @if ($bg_img_contact!='') 
            <div class="col-span-6 sm:col-span-6 mb-2"> 
                <x-jet-label for="name" value="{{ __(' Background image') }}" />
                <div>
                <img style="width:30%; height:30%;"  class="border-4 border-indigo-200  object-cover " 
                    src="{{ $bg_img_contact->getUrl() }} " alt="" />   
            </div>
            </div>                
         @endif 
     
         <div class="col-span-6 sm:col-span-6">
                    <x-filepond
                wire:model="bg_img_contact_new"
                multiple
                allowImagePreview
                imagePreviewMaxHeight="200"
                allowFileTypeValidation
                acceptedFileTypes="['image/png','image/jpg','image/jpeg','image/*']"
                allowFileSizeValidation
                maxFileSize="2mb"/>
         </div> --}}
 
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
             
    </x-slot>

    <x-slot name="actions">
        <x-back-btn-link url="teams.index" class="mr-2" > 
            {{ __('Back') }}
        </x-back-btn-link>
 

      <x-btn-submit>
        {{ __('Update') }}
      </x-btn-submit>
    </x-slot>
 
</x-jet-form-section>
    @else
           <div class=" text-center text-gray-100 text-lg p-4 bg-site_color_theme " style="text-align:center;">
                <h1>{{ __('Complete the creation of a Client, then return here and add Contact details') }}</h1>
            </div>  
         @endif