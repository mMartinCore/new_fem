 <x-app-layout> 
       <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
            Package/Parcel List
        </h2> 
    </x-slot> 
    <div class="">
        <div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8">
            <div class=" overflow-hidden mb-4 sm:rounded-lg">  
                 @livewire('packages.package-list', ['user_id' => $user_id])    
            </div>
        </div>
    </div>
      @include('layouts/footer') 
</x-app-layout>
