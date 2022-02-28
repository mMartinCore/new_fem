 <x-admin-layout>  
    <div class="">
     <div class="max-w-8xl mx-auto sm:px-6 py-8 lg:px-20">
            <div class=" overflow-hidden  sm:rounded-lg">    
                 @livewire('countries.edit', [$Country])     
            </div>
        </div>
    </div>
      @include('layouts/footer') 
</x-admin-layout>
