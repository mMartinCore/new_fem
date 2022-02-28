<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

         
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
          
            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Loginsetting" format="csv" />
                <livewire:excel-export model="Loginsetting" format="xlsx" />
                <livewire:excel-export model="Loginsetting" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans(' id') }} 
                        </th>
                        <th>
                            {{ trans(' title') }} 
                        </th>
                        <th>
                            {{ trans('bg_img') }}
                        </th>
                        <th>
                            {{ trans('team') }}
                       
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($Registersettings as $loginsetting)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $loginsetting->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $loginsetting->id }}
                            </td>
                            <td>
                                {{ $loginsetting->title }}
                            </td>
                            <td>
                                @foreach($loginsetting->bg_img as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @if($loginsetting->team)
                                    <span class="badge badge-relationship">{{ $loginsetting->team->domain ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('loginsetting_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('loginsettings.show', $loginsetting) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('loginsetting_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('loginsettings.edit', $loginsetting) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('loginsetting_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $loginsetting->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $Registersettings->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush