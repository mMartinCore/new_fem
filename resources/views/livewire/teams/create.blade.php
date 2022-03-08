<x-jet-form-section submit="create">
    <x-slot name="title">
        {{ __(' New Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create a new detail.') }}
       
    </x-slot>

    <x-slot name="form"> 

              <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Client Name') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Subdomain name') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="domain" autofocus />
            <x-jet-input-error for="domain" class="mt-2" />
        </div>
        
      
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Logo Title') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="logo_title" autofocus />
            <x-jet-input-error for="logo_title" class="mt-2" />
        </div>
     
       <div class="col-span-6 sm:col-span-6">
             <x-filepond
                wire:model="team_logo"
                multiple
                allowImagePreview
                imagePreviewMaxHeight="200"
                allowFileTypeValidation
                acceptedFileTypes="['image/png','image/jpg','image/jpeg','image/*']"
                allowFileSizeValidation
                maxFileSize="2mb"/>
         </div>
     
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Site theme Color') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="theme_color" autofocus />
            <x-jet-input-error for="theme_color" class="mt-2" />
        </div>
     
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Theme Color on Hover') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="theme_color_hover" autofocus />
            <x-jet-input-error for="theme_color_hover" class="mt-2" />
        </div>
   
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Instagram Link') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="instagram_link" autofocus />
            <x-jet-input-error for="instagram_link" class="mt-2" />
        </div>
     
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Fackbook Link') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="fackbook_link" autofocus />
            <x-jet-input-error for="fackbook_link" class="mt-2" />
        </div>
       
        
    
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Whatsapp Link https://api.whatsapp.com/send?phone=phonenumber&text=messageText') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="whatsapp_link" autofocus />
            <x-jet-input-error for="whatsapp_link" class="mt-2" />
        </div>
        
  
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Twitter Link') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="twitter_link" autofocus />
            <x-jet-input-error for="twitter_link" class="mt-2" />
        </div>
        

         <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Content Link to be Embeded') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="content_link" autofocus />
            <x-jet-input-error for="content_link" class="mt-2" />
        </div> 
        

  
       <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Content Title') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="content_title" autofocus />
            <x-jet-input-error for="content_title" class="mt-2" />
        </div>
       
           <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="name" value="{{ __('Content') }}" />
            <x-textarea   wire:model.defer="content" id="" class="block mt-1 w-full"  autofocus type="text" ></x-textarea> 
            <x-jet-input-error for="content" class="mt-2" />
        </div>
      
       <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Carousel short text (1)') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="carousel_txt_1" autofocus />
            <x-jet-input-error for="carousel_txt_1" class="mt-2" />
        </div>
       
        <div class="col-span-6 sm:col-span-6">
             <x-filepond
                wire:model="team_carousel_img_1"
                multiple
                allowImagePreview
                imagePreviewMaxHeight="200"
                allowFileTypeValidation
                acceptedFileTypes="['image/png','image/jpg','image/jpeg','image/*']"
                allowFileSizeValidation
                maxFileSize="2mb"/>
         </div>
        
 
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Carousel short text (2)') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="carousel_txt_2" autofocus />
            <x-jet-input-error for="carousel_txt_2" class="mt-2" />
        </div>
      
          <div class="col-span-6 sm:col-span-6">
             <x-filepond
                wire:model="team_carousel_img_2"
                multiple
                allowImagePreview
                imagePreviewMaxHeight="200"
                allowFileTypeValidation
                acceptedFileTypes="['image/png','image/jpg','image/jpeg','image/*']"
                allowFileSizeValidation
                maxFileSize="2mb"/>
         </div>
       
         <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Carousel short text (3)') }}" />
            <x-jet-input type="text" class="mt-1 block w-full" wire:model.defer="carousel_text_3" autofocus />
            <x-jet-input-error for="carousel_text_3" class="mt-2" />
        </div>
             <div class="col-span-6  sm:col-span-3">
        <x-jet-label for="name" value="{{ __(' Country') }}" />
        <select  wire:model="country_id"
            class="block appearance-none rounded-md w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <option value="">Select Country</option>
            @foreach (\App\Models\Country::all() as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
        <x-jet-input-error for="country_id" class="mt-2" />
    </div>
        
         <div class="col-span-6 sm:col-span-6">
             <x-filepond
                wire:model="team_carousel_img_3"
                multiple
                allowImagePreview
                imagePreviewMaxHeight="200"
                allowFileTypeValidation
                acceptedFileTypes="['image/png','image/jpg','image/jpeg','image/*']"
                allowFileSizeValidation
                maxFileSize="2mb"/>
         </div>





       

       <div class="col-span-3 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Virtual # inital 5000') }}" />
            <x-input   wire:model.defer="virtual_number" id="" class="block mt-1 w-full"  autofocus type="text" ></x-input> 
            <x-jet-input-error for="virtual_number" class="mt-2" />
        </div>

      <div class="col-span-3 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Prefix eg.FF') }}" />
            <x-input   wire:model.defer="prefix" id="" class="block mt-1 w-full"  autofocus type="text" ></x-input> 
            <x-jet-input-error for="prefix" class="mt-2" />
        </div>

         <div class="col-span-3 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Max # for package eg. inital 400 ') }}" />
            <x-input   wire:model.defer="max_number" id="" class="block mt-1 w-full"  autofocus type="text" ></x-input> 
            <x-jet-input-error for="max_number" class="mt-2" />
        </div>

     
        
        {{-- END --}}

    </x-slot>

    <x-slot name="actions">
        <x-back-btn-link url="teams.index" class="mr-2" >
            {{ __('Back') }}
        </x-back-btn-link>
 

      <x-btn-submit>
        {{ __('Create') }}
      </x-btn-submit>















    </x-slot>
    
</x-jet-form-section>
