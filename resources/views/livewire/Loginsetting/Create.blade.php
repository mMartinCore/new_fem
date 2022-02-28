
   <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('loginsetting.title') ? 'invalid' : '' }}">
        <label class="form-label" for="title">{{ trans('cruds.loginsetting.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" wire:model.defer="loginsetting.title">
        <div class="validation-message">
            {{ $errors->first('loginsetting.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.loginsetting.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('loginsetting.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.loginsetting.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="loginsetting.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('loginsetting.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.loginsetting.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.loginsetting_bg_img') ? 'invalid' : '' }}">
        <label class="form-label" for="bg_img">{{ trans('cruds.loginsetting.fields.bg_img') }}</label>
        <x-dropzone id="bg_img" name="bg_img" action="{{ route('loginsettings.storeMedia') }}"
         collection-name="loginsetting_bg_img" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.loginsetting_bg_img') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.loginsetting.fields.bg_img_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('loginsetting.team_id') ? 'invalid' : '' }}">
        <label class="form-label" for="team">{{ trans('cruds.loginsetting.fields.team') }}</label>
        <x-select-list class="form-control" id="team" name="team" :options="$this->listsForFields['team']" wire:model="loginsetting.team_id" />
        <div class="validation-message">
            {{ $errors->first('loginsetting.team_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.loginsetting.fields.team_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('loginsettings.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
