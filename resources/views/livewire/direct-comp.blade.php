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
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
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
               <button class="btn btn-rose ml-1 disabled:opacity-50 disabled:cursor-not-allowed text-sm text-bold text-red-400"
                type="button" wire:click="deleteShowModalSelected" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button> 
                       @if($this->selectedCount)
                        <button class="btn btn-rose ml-1 disabled:opacity-50 disabled:cursor-not-allowed text-sm text-bold text-red-400">
                         <span class="font-medium">
                        {{ $this->selectedCount }}
                        </span>
                         {{ __('Entries selected') }}
                        </button>
                    @endif
                
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
                        @include('include.table.table_th',  ['field' => 'id', 'label' => 'ID'])                        
                        @include('include.table.table_th',  ['field' => 'email_1', 'label' => 'email_1'])
                        @include('include.table.table_th',  ['field' => 'email_2', 'label' => 'email_2'])
                        @include('include.table.table_th',  ['field' => 'phone_no_1', 'label' => 'phone_no_1'])
                        @include('include.table.table_th',  ['field' => 'phone_no_2', 'label' => 'phone_no_2'])
                        @include('include.table.table_th',  ['field' => 'bg_img', 'label' => 'bg_img'])
                        @include('include.table.table_th_action',  ['field' => '', 'label' => 'Action'])   
                    </tr>
                    @empty
                      <tr class="  flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">       
                        @include('include.table.table_th',  ['field' => 'id', 'label' => '']) 
                        @include('include.table.table_th',  ['field' => 'id', 'label' => 'ID']) 
                        @include('include.table.table_th',  ['field' => 'email_1', 'label' => 'email_1'])
                        @include('include.table.table_th',  ['field' => 'email_2', 'label' => 'email_2'])
                        @include('include.table.table_th',  ['field' => 'phone_no_1', 'label' => 'phone_no_1'])
                        @include('include.table.table_th',  ['field' => 'phone_no_2', 'label' => 'phone_no_2'])
                        @include('include.table.table_th',  ['field' => 'bg_img', 'label' => 'bg_img'])  
                        @include('include.table.table_th_action',  ['field' => '', 'label' => 'Action'])                  
                    </tr>
                    @endforelse
                </thead>
             <tbody class="flex-1 sm:flex-none">
                    @forelse($data as $row)
                         <tr class="flex flex-col  flex-no wrap sm:table-row mb-2 sm:mb-0">
                             @include('include.table.table_td_check',  ['data' => $row->id])                    
                             @include('include.table.table_td',  ['data' => $row->id])  
                             @include('include.table.table_td',  ['data' => $row->email_1])  
                             @include('include.table.table_td',  ['data' => $row->email_2])  
                             @include('include.table.table_td',  ['data' => $row->phone_no_1])  
                             @include('include.table.table_td',  ['data' => $row->phone_no_2])  
                             @include('include.table.table_td',  ['data' => $row->bg_img])  

                              <td class="px-6 py-2 flex justify-end">
                                <x-jet-button wire:click="updateShowModal({{ $row->id }})">
                                    {{ __('Update') }}
                                </x-jet-button>
                                <x-jet-danger-button class="ml-2" wire:click="deleteShowModal({{ $row->id }})">
                                    {{ __('Delete') }}
                                </x-jet-button>
                             </td>
                             {{-- @include('include.table.tableAction',  ['table_name' => 'contactsettings','model_name'=> $row]) --}}
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
  
 

    {{-- Modal Form --}}
   <x-jet-dialog-modal  wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Create or Update Form') }}
        </x-slot>
 <x-slot name="content"> 
        <div class="flex flex-wrap mb-2 -mx-3 ">
            <div class="w-full md:w-1/2 px-3">
                <div class="mt-2">
                        <x-jet-label for="" value="{{ __('email_1') }}" />
                        <x-jet-input  wire:model.debounce="email_1" id="" class="block mt-1 w-full" type="text" />
                        @error($email_1) <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
                    </div>  
            </div>
            <div class="w-full md:w-1/2 px-3">
                <div class="mt-2">
                        <x-jet-label for="" value="{{ __('email_2') }}" />
                        <x-jet-input  wire:model.debounce="email_2" id="" class="block mt-1 w-full" type="text" />
                        @error($email_2) <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
            </div>  
            </div>
        </div>
            <div class="flex flex-wrap mb-2 -mx-3 ">
            <div class="w-full md:w-1/2 px-3">
                <div class="mt-2">
                        <x-jet-label for="" value="{{ __('phone_no_1') }}" />
                        <x-jet-input  wire:model.debounce="phone_no_1" id="" class="block mt-1 w-full" type="text" />
                        @error($phone_no_1) <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
                    </div>  
            </div>
            <div class="w-full md:w-1/2 px-3">
                <div class="mt-2">
                        <x-jet-label for="" value="{{ __('phone_no_2') }}" />
                        <x-jet-input  wire:model.debounce="phone_no_2" id="" class="block mt-1 w-full" type="text" />
                        @error($phone_no_2) <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
            </div>  
            </div>
        </div>   

        <div class="mt-4">
                <x-jet-label for="" value="{{ __('bg_img') }}" />
                <x-textarea   wire:model.debounce="bg_img" id="" class="block mt-1 w-full" type="text" ></x-textarea>
                @error($bg_img) <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
        </div>   

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <div class="mt-4">
                        <x-jet-label for="" value="{{ __('Label') }}" />
                        <x-jet-input  wire:model.debounce="" id="" class="block mt-1 w-full" type="text" />
                        @error('') <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
            </div></div>
        </div>

        <x-filepond
        wire:model="images"
        multiple
        allowImagePreview
        imagePreviewMaxHeight="200"
        allowFileTypeValidation
        acceptedFileTypes="['image/png','image/jpg','image/jpeg','image/*']"
        allowFileSizeValidation
        maxFileSize="2mb"/>
        
        
       <div class="flex flex-wrap -mx-3 mb-2">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <div class="mt-4">
                <x-jet-label for="" value="{{ __('Label') }}" />
                <x-jet-input  wire:model.debounce="" id="" class="block mt-1 w-full" type="text" />
                @error('') <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
            </div>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0"> 
            <div class="relative">
                <div class="mt-4">
                        <x-jet-label for="" value="{{ __('Type') }}" />
                        <select  wire:model.debounce="" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">Options1</option>
                            <option value="">Option2</option>
                        </select>
                        @error('') <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
                    </div> 
            </div>
            </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <div class="mt-4">
                        <x-jet-label for="" value="{{ __('Label') }}" />
                        <x-jet-input  wire:model.debounce="" id="" class="block mt-1 w-full" type="text" />
                  @error('') <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
            </div>
            </div>
        </div>  



        
         <div class="mt-4">
            <x-jet-label for="" value="{{ __('Label') }}" />
            <x-jet-input  wire:model.debounce="" id="" class="block mt-1 w-full" type="text" />
                @error('') <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
            </div>  
            <div class="mt-4">
                <x-jet-label for="" value="{{ __('Type') }}" />
                <select  wire:model.debounce="" id="" class="block appearance-none w-full bg-gray-100 border border-gray-200 text-gray-700 py-3 px-4 pr-8 round leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Options1</option>
                    <option value="">Option2</option>
                </select>
                @error('') <span class="error text-sm text-red-200">{{ $message }}</span> @enderror
            </div>   
 </x-slot>

  <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if ($modelId)
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
            @else
                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-jet-danger-button>
            @endif            
        </x-slot>

</x-jet-dialog-modal>  

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

 