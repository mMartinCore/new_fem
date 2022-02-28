<div>
      <th  class="px-5 py-3  border-b-2 border-gray-200 bg-gray-600 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
        <div class="flex flex-row">
        <a wire:click.prevent="sortBy('email_1')" role="button" href="#">
            {{$name}}
        </a>
        @include('include._sort-icon', ['field' => $sortable])
    </div> 
    </th>
</div>