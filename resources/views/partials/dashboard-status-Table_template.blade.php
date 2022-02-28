<div>
<style>
table{
    white-space: nowrap; 
    
}
.alink a {
 
    color: black !important;
}
</style>
    <div class="px-4 mb-1 row ">
        <div class="col form-inline">
            Per Page: &nbsp;
            <select wire:model="perPage" class="form-control form-control-sm"  >
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
            <span> &nbsp; &nbsp; Total: {{ $item->total() }} </span>
        </div>
         {{-- @hasrole('Super Admin|Admin|writer')  --}}
           <div class="col"> 
                <a class="float-right btn btn-success btn-xs" href="{{ route('admin.item.create') }}">
               <i class="fa fa-plus-circle" aria-hidden="true"></i>     {{ trans('global.add') }} {{ trans('cruds.item.title_singular') }}
                </a> 
            </div> 
            {{-- @endrole --}}
    </div>
    <div class="pt-0 text-sm bg-white card-body ">
         <div class="row table- responsive">
        <table  class="table table-bordered table-hover ajaxTable datatable datatable-item">
            <thead class="alink">
                <tr> 
            
                    <th>
                    <a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Name
                        @include('include._sort-icon', ['field' => 'name'])
                    </a>
                    </th>
                    <th>
                      <a wire:click.prevent="sortBy('description')" role="button" href="#">
                        Description  
                        @include('include._sort-icon', ['field' => 'description'])
                      </a>
                    </th>
                  
                </tr> 


            </thead>
             <tbody>
             @if ($items->count())
                    @foreach($items as $key => $item)
                        <tr data-entry-id="{{ $item->id }}">
                           
                            <td>
                            {{-- {{ route('admin.item.show', $item->uuid) }} --}}
                            <a class="btn btn-xs btn-primary" href=" ">
                              {{ $item->item_no ?? '' }}
                             </a>                           
                            </td>
                            <td>
                                {{ $item->name  ?? '' }}
                            </td>
                            <td>
                                {{ $item->description ?? '' }}
                            </td>
                         

                        </tr>
                    @endforeach
                
                   @else 
                   <tr>
                   <td colspan="7" class="text-center">
                    <i class="fas fa-frown"></i>   No Data Found
                   </td>
                   </tr>
                   @endif

                </tbody> 
        </table>
        
         </div>
     <div class="row ">
        <div class="col">
            {{ $item->links() }}
        </div>

        <div class="text-right col text-muted">
            Showing {{ $item->firstItem() }} to {{ $item->lastItem() }} out of {{ $item->total() }} results
        </div>
    </div>
    </div>
    </div>