<x-admin-layout> 
    <div class="">
        <div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8">
            <a class="btn btn-indigo" href="{{ route('admin.team.create') }}">
                   New Client Setting
                    </a>
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">  
                   @livewire('team.index')
            </div>
        </div>
    </div>
      @include('layouts/footer')  
</x-admin-layout>
