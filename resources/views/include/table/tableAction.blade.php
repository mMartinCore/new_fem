<div> 
     <td class="px-6 py-2 flex justify-end">
    {{-- @can('contactsetting_show') --}}
        <a  class ='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition'href="{{ route($table_name.'.show', $model_name->id) }}">
            {{ __('View') }}
        </a>
    {{-- @endcan
    @can('contactsetting_edit') --}}
   
        <a  class ='inline-flex items-center  ml-2 px-4 py-2 bg-site_color_theme border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition'href="{{ route($table_name.'.edit', $model_name->id) }}">
            {{ __('Edit') }}
        </a>
    {{-- @endcan --}}
    @can('contactsetting_delete')
        <button  class ='inline-flex items-center px-4 py-2 bg-rey-800 border border-transparent rounded-md font-semibold text-xs 
    text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition'type="button" wire:click="deleteShowModal({{ $model_name->id }})" wire:loading.attr="disabled">
            {{ trans('global.delete') }}
        </button>
    @endcan 
    </td>
</div>