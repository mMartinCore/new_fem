<div> 
<style>
  html,
  body {
    height: 100%;
  }
  @media (min-width: 640px) {
    table {
      display: inline-table !important;
    }
    thead tr:not(:first-child) {
      display: none;
    }
  }
  td:not(:last-child) {
    border-bottom: 0;
  }
  th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
  }
</style>
<div class="flex items-center justify-end px-4 py-3 text-right sm:px-6"> 
    <a   class="text-lg leading-6 font-medium text-gray-900 mr-12 pr-8">
       {{$user}}
    </a> 
        <x-create-btn-link url="packages.create" >
        {{ __('New Package') }}
      </x-create-btn-link>
    </div>
    <div class="p-4   mx-auto px-4 sm:px-4 shadow-lg rounded-lg border-2">      
            <div class=" flex sm:flex-row flex-col  justify-between " >
                <div class="flex flex-row mb-0  sm:mb-0"> 
                    <div class="relative text-sm px-4">   
                            Per Page: &nbsp;
                            <select wire:model="perPage" class="  border-0 rounded  text-sm"  >
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>25</option>
                            </select>
                            <span> &nbsp; &nbsp; Total: {{ $data->total() }} </span>
                        </div>
                 </div>  
               <button class="btn btn-rose ml-1 border border-2 border-gray-400 px-2 rounded-full mb-2 disabled:opacity-50 disabled:cursor-not-allowed text-sm text-bold text-red-400"
                type="button" wire:click="deleteShowModalSelected" wire:loading.attr="disabled" {{ $this->selectedCount  ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button> 
      
               
                <button wire:click="ShowMergeModal" class="btn btn-rose  border border-2 border-gray-400 px-2 rounded-full mb-2 disabled:opacity-50
                 disabled:cursor-not-allowed text-sm text-bold text-gray-600 "  {{ $this->selectedCount  >1 ? '' : 'disabled' }}>
                  <span class="font-medium"> 
                </span>
                  {{ __('Merged 2 or more Packages') }}
                </button>
        
                
                <x-loader/>
                <div class="w-full sm:w-1/2 sm:text-right mr-4">
                        
                    <input type="text" wire:model.debounce.300ms="search"placeholder="Search.."  class="w-full sm:w-1/3 inline-block rounded-full" />
                </div>  
            </div>
           
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-lg rounded-lg overflow-hidden">
                  	<table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden   Leading-normal"> 
                        <thead class="bg-table_thead_bg_color">
                       @forelse($data as $row)   
                      <tr class=" flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">       
                        @include('include.table.table_th',  ['field' => '', 'label' => ' ']) 
                        @include('include.table.table_th',  ['field' => 'package_id', 'label' => 'Track #'])                        
                        @include('include.table.table_th',  ['field' => 'tracking_number', 'label' => 'Package #'])
                        @include('include.table.table_th',  ['field' => 'name', 'label' => 'Package Name'])
                    
                        @include('include.table.table_th',  ['field' => 'courier', 'label' => 'Courier'])
                        {{-- @include('include.table.table_th',  ['field' => 'courier_status', 'label' => 'courier_status'])
                        @include('include.table.table_th',  ['field' => 'payment_mode', 'label' => 'payment_mode'])
                        {{-- @include('include.table.table_th',  ['field' => 'price', 'label' => 'price'])
                        @include('include.table.table_th',  ['field' => 'weight', 'label' => 'weight'])
                        @include('include.table.table_th',  ['field' => 'length', 'label' => 'length'])
                        @include('include.table.table_th',  ['field' => 'width', 'label' => 'width'])
                        @include('include.table.table_th',  ['field' => 'height', 'label' => 'height']) --}}
                        {{-- @include('include.table.table_th',  ['field' => 'description', 'label' => 'description']) --}}
                        @include('include.table.table_th',  ['field' => 'payment_status', 'label' => 'Pmt Status']) 
                        @include('include.table.table_th',  ['field' => 'status', 'label' => 'Status'])
                        {{-- @include('include.table.table_th',  ['field' => 'user_id', 'label' => 'user_id']) 
                        @include('include.table.table_th',  ['field' => 'team_id', 'label' => 'team_id']) --}}  

                        @include('include.table.table_th_action',  ['field' => '', 'label' => 'Action'])   
                    </tr>
                    @empty
                      <tr class="  flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">       
                        @include('include.table.table_th',  ['field' => 'id', 'label' => '']) 
                        @include('include.table.table_th',  ['field' => 'id', 'label' => 'ID']) 
                        @include('include.table.table_th',  ['field' => 'tracking_number', 'label' => 'tracking_number'])
                        @include('include.table.table_th',  ['field' => 'name', 'label' => 'Package Name'])
                        
                        {{-- @include('include.table.table_th',  ['field' => 'courier', 'label' => 'courier'])
                        @include('include.table.table_th',  ['field' => 'courier_status', 'label' => 'courier_status'])
                        @include('include.table.table_th',  ['field' => 'payment_mode', 'label' => 'payment_mode'])
                         --}}
                        {{-- @include('include.table.table_th',  ['field' => 'price', 'label' => 'price'])
                        @include('include.table.table_th',  ['field' => 'weight', 'label' => 'weight'])
                        @include('include.table.table_th',  ['field' => 'length', 'label' => 'length'])
                        @include('include.table.table_th',  ['field' => 'width', 'label' => 'width'])
                        @include('include.table.table_th',  ['field' => 'height', 'label' => 'height']) --}}
                        {{-- @include('include.table.table_th',  ['field' => 'description', 'label' => 'description']) --}}
                        @include('include.table.table_th',  ['field' => 'payment_status', 'label' => 'Pmt Status'])
                        @include('include.table.table_th',  ['field' => 'status', 'label' => 'status'])
                        {{-- @include('include.table.table_th',  ['field' => 'user_id', 'label' => 'user_id']) 
                        @include('include.table.table_th',  ['field' => 'team_id', 'label' => 'team_id'])   --}}
                        @include('include.table.table_th_action',  ['field' => '', 'label' => 'Action'])                  
                    </tr>
                    @endforelse
                </thead>
             <tbody class="flex-1 sm:flex-none">
                    @forelse($data as $row)
                         <tr class="flex flex-col  flex-no wrap sm:table-row mb-2 sm:mb-0">
                              @include('include.table.table_td_check',  ['data' => $row->id])                    
                              @include('include.table.table_td',  ['data' => $row->package_id])  
                              @include('include.table.table_td',  ['data' => $row->tracking_number])  
                              @include('include.table.table_td',  ['data' => $row->name]) 

                              @include('include.table.table_td',  ['data' => $row->courier])  
                              {{-- @include('include.table.table_td',  ['data' => $row->courier_status])  
                              @include('include.table.table_td',  ['data' => $row->payment_mode]) 

                              {{-- @include('include.table.table_td',  ['data' => $row->price])  
                              @include('include.table.table_td',  ['data' => $row->weight])  
                              @include('include.table.table_td',  ['data' => $row->length]) 

                              @include('include.table.table_td',  ['data' => $row->width])  
                              @include('include.table.table_td',  ['data' => $row->height])   --}}
                              {{-- @include('include.table.table_td',  ['data' => $row->description])   --}}
                              @include('include.table.table_td',  ['data' => $row->payment_status])   
                              @include('include.table.table_td',  ['data' => $row->packagestatus->name])  
                              {{-- @include('include.table.table_td',  ['data' => $row->user_id])  
                              @include('include.table.table_td',  ['data' => $row->team_id])    --}}

                              
                             @include('include.table.tableAction',  ['table_name' => 'packages','model_name'=> $row]) 
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="px-4 ">               
                                   <div class="flex items-center justify-center  h-24">
                                    <div class=" flex text-gray-700 text-center  font-bold text-lg py-2 ">
                                      No entries found.
                                    </div>
                                    <div class="flex text-gray-700 text-center  px-4 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-7.536 5.879a1 1 0 001.415 0 3 3 0 014.242 0 1 1 0 001.415-1.415 5 5 0 00-7.072 0 1 1 0 000 1.415z" clip-rule="evenodd" />
                                    </svg>
                                    </div> 
                                    </div>
                             </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
          <div class="p-4 bg-white">        
            {{ $data->links() }}
        </div>
        </div>
    </div>
    </div>
  
 

  

    {{-- The Delete Modal --}}
    <x-jet-dialog-modal  wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Record') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this record?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Record') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>  




  {{-- The ShowMergeModal Modal --}}
    <x-jet-dialog-modal  wire:model="modalConfirmMergeVisible">
        <x-slot name="title">
            {{ __('Merge Packages') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to Merge Packages?') }}
            <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="name" value="{{ __('Name your merger') }}" />
            <x-jet-input type="text" class="mt-1 block w-full h-8 py-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
             wire:model.lazy="name" autofocus />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmMergeVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="mergedSelected" wire:loading.attr="disabled">
                {{ __('Merge Packages') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>  





    <x-jet-dialog-modal   wire:model="modalConfirmDeleteSelectedVisible">
        <x-slot name="title">
            {{ __('Delete Selected Record(s)') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete ?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteSelectedVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteSelected" wire:loading.attr="disabled">
                {{ __('Delete Item') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal> 
  </div> 

 