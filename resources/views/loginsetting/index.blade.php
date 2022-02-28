<x-app-layout> 
    <div class="">
        <div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8">
            <a class="btn btn-indigo" href="{{ route('contactsettings.create') }}">
                       Login Settings
                                   </a>
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">  
                   @livewire('loginsetting.index')
            </div>
        </div>
    </div>
      @include('layouts/footer')  
</x-app-layout>
