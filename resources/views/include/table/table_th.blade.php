<div>
 
      <th  class="p-3   border-gray-200 bg-table_thead_bg_color  text-left text-xs font-semibold text-gray-100 uppercase   ">
    <div class="flex flex-row text-xs ">
<a wire:click.prevent="sortBy('{{$field}}')" role="button" href="#">
            {{$label}}  
        </a> 
        @if($field !='')
          @include('include._sort-icon', ['field' => $field])    
         @endif
  
    </div>    
    </th> 
</div> 