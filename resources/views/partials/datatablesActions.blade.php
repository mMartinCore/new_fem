 
    <a class="btn btn-xs btn-primary" href="{{ route('admin.' . $crudRoutePart . '.show', isset($row->uuid) ? $row->uuid: $row->id) }}">
        {{ trans('global.view') }}
    </a>
 
@if (!request()->is('admin/audit-logs') && !request()->is('admin/user-alerts'))
   @hasrole('Super Admin|Admin|writer')  
       <a class="btn btn-xs btn-info" href="{{ route('admin.' . $crudRoutePart . '.edit', isset($row->uuid) ? $row->uuid: $row->id) }}">
        {{ trans('global.edit') }}
    </a>
    @endrole
@endif
 

 @hasrole('Delete') 
    @if (!request()->is('admin/audit-logs') )
        <form action="{{ route('admin.' . $crudRoutePart . '.destroy', isset($row->uuid) ? $row->uuid: $row->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
        </form>
    @endif
@endrole