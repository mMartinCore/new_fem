 <x-admin-layout>  
    <div class="">
     <div class="max-w-8xl mx-auto sm:px-6 py-8 lg:px-20">
            <div class=" overflow-hidden  sm:rounded-lg">    
                 @livewire('teams.edit', [$team])  
                 <br/> <br/>
                 @if(isset($team->contact))
                    @livewire('contactsettings.edit', [$team->contact])  
                 @endif     
            </div>
        </div>
    </div>
      @include('layouts/footer') 
</x-admin-layout>
