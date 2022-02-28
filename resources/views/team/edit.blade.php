<x-admin-layout> 
    <div class="">
        <div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">  
            <h6 class="card-title">
                   Edit Client Settings 
                </h6>
                
                   @livewire('team.edit', [$registersetting]) 
            </div>
        </div>
    </div>
      @include('layouts/footer')  
</x-admin-layout>
