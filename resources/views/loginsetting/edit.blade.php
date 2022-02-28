<x-app-layout> 
    <div class="">
        <div class="max-w-8xl mx-auto sm:px-6 py-0 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">  
            <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.loginsetting.title_singular') }}:
                    {{ trans('cruds.loginsetting.fields.id') }}
                    {{ $loginsetting->id }}
                </h6>
                
                   @livewire('loginsetting.edit', [$loginsetting]) 
            </div>
        </div>
    </div>
      @include('layouts/footer')  
</x-app-layout>
