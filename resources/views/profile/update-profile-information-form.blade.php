<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif 
                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input disabled id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Phone #') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model.defer="state.phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="{{ __('City') }}" />
             <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" />
            <x-jet-input-error for="city" class="mt-2" />
        </div>
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}" />
             <x-textarea   wire:model.defer="state.address" id="" class="block mt-1 w-full"  autofocus type="text" ></x-textarea> 
            <x-jet-input-error for="address" class="mt-2" />
        </div>
            <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __(' Country') }}" />
               <select  wire:model.defer="state.country_id" class="block appearance-none rounded-md w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                   <option value="">Select Country</option>
                    @foreach (\App\models\Country::all() as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>                        
                    @endforeach 
                </select>                
            <x-jet-input-error for="country_id" class="mt-2" />
        </div> 
     
     {{-- <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Country') }}" />
                 <select  wire:model.defer="packagestatus_id" class="block appearance-none rounded-md w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Select Status</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>                        
                    @endforeach 
                </select>                
            <x-jet-input-error for="packagestatus_id" class="mt-2" />
        </div>  --}}
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
