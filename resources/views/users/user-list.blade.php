 <x-admin-layout>  
    <div class="">
        <div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8">
            <div class=" overflow-hidden mb-4 sm:rounded-lg">  
                 @livewire('users.user-list', ['user_id' => $user_id])     
            </div>
        </div>
    </div>
      @include('layouts/footer') 
</x-admin-layout>