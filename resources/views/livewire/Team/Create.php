<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('team.domain') ? 'invalid' : '' }}">
        <label class="form-label required" for="domain">{{ trans('cruds.team.fields.domain') }}</label>
        <input class="form-control" type="text" name="domain" id="domain" required wire:model.defer="team.domain">
        <div class="validation-message">
            {{ $errors->first('team.domain') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.domain_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.team_logo') ? 'invalid' : '' }}">
        <label class="form-label required" for="logo">{{ trans('cruds.team.fields.logo') }}</label>
        <x-dropzone id="logo" name="logo" action="{{ route('admin.teams.storeMedia') }}" collection-name="team_logo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.team_logo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.logo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.logot_itle') ? 'invalid' : '' }}">
        <label class="form-label" for="logot_itle">{{ trans('cruds.team.fields.logot_itle') }}</label>
        <input class="form-control" type="text" name="logot_itle" id="logot_itle" wire:model.defer="team.logot_itle">
        <div class="validation-message">
            {{ $errors->first('team.logot_itle') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.logot_itle_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.team_carousel_img_1') ? 'invalid' : '' }}">
        <label class="form-label" for="carousel_img_1">{{ trans('cruds.team.fields.carousel_img_1') }}</label>
        <x-dropzone id="carousel_img_1" name="carousel_img_1" action="{{ route('admin.teams.storeMedia') }}" collection-name="team_carousel_img_1" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.team_carousel_img_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.carousel_img_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.team_carousel_img_2') ? 'invalid' : '' }}">
        <label class="form-label" for="carousel_img_2">{{ trans('cruds.team.fields.carousel_img_2') }}</label>
        <x-dropzone id="carousel_img_2" name="carousel_img_2" action="{{ route('admin.teams.storeMedia') }}" collection-name="team_carousel_img_2" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.team_carousel_img_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.carousel_img_2_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.team_carousel_img_3') ? 'invalid' : '' }}">
        <label class="form-label" for="carousel_img_3">{{ trans('cruds.team.fields.carousel_img_3') }}</label>
        <x-dropzone id="carousel_img_3" name="carousel_img_3" action="{{ route('admin.teams.storeMedia') }}" collection-name="team_carousel_img_3" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.team_carousel_img_3') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.carousel_img_3_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.carousel_txt_1') ? 'invalid' : '' }}">
        <label class="form-label" for="carousel_txt_1">{{ trans('cruds.team.fields.carousel_txt_1') }}</label>
        <input class="form-control" type="text" name="carousel_txt_1" id="carousel_txt_1" wire:model.defer="team.carousel_txt_1">
        <div class="validation-message">
            {{ $errors->first('team.carousel_txt_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.carousel_txt_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.carousel_txt_2') ? 'invalid' : '' }}">
        <label class="form-label" for="carousel_txt_2">{{ trans('cruds.team.fields.carousel_txt_2') }}</label>
        <input class="form-control" type="text" name="carousel_txt_2" id="carousel_txt_2" wire:model.defer="team.carousel_txt_2">
        <div class="validation-message">
            {{ $errors->first('team.carousel_txt_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.carousel_txt_2_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.carousel_text_3') ? 'invalid' : '' }}">
        <label class="form-label" for="carousel_text_3">{{ trans('cruds.team.fields.carousel_text_3') }}</label>
        <input class="form-control" type="text" name="carousel_text_3" id="carousel_text_3" wire:model.defer="team.carousel_text_3">
        <div class="validation-message">
            {{ $errors->first('team.carousel_text_3') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.carousel_text_3_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.theme_color') ? 'invalid' : '' }}">
        <label class="form-label" for="theme_color">{{ trans('cruds.team.fields.theme_color') }}</label>
        <input class="form-control" type="text" name="theme_color" id="theme_color" wire:model.defer="team.theme_color">
        <div class="validation-message">
            {{ $errors->first('team.theme_color') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.theme_color_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.theme_color_hover') ? 'invalid' : '' }}">
        <label class="form-label" for="theme_color_hover">{{ trans('cruds.team.fields.theme_color_hover') }}</label>
        <input class="form-control" type="text" name="theme_color_hover" id="theme_color_hover" wire:model.defer="team.theme_color_hover">
        <div class="validation-message">
            {{ $errors->first('team.theme_color_hover') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.theme_color_hover_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.instagram_link') ? 'invalid' : '' }}">
        <label class="form-label" for="instagram_link">{{ trans('cruds.team.fields.instagram_link') }}</label>
        <input class="form-control" type="text" name="instagram_link" id="instagram_link" wire:model.defer="team.instagram_link">
        <div class="validation-message">
            {{ $errors->first('team.instagram_link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.instagram_link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.fackbook_link') ? 'invalid' : '' }}">
        <label class="form-label" for="fackbook_link">{{ trans('cruds.team.fields.fackbook_link') }}</label>
        <input class="form-control" type="text" name="fackbook_link" id="fackbook_link" wire:model.defer="team.fackbook_link">
        <div class="validation-message">
            {{ $errors->first('team.fackbook_link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.fackbook_link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.whatsapp_link') ? 'invalid' : '' }}">
        <label class="form-label" for="whatsapp_link">{{ trans('cruds.team.fields.whatsapp_link') }}</label>
        <input class="form-control" type="text" name="whatsapp_link" id="whatsapp_link" wire:model.defer="team.whatsapp_link">
        <div class="validation-message">
            {{ $errors->first('team.whatsapp_link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.whatsapp_link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.twitter_link') ? 'invalid' : '' }}">
        <label class="form-label" for="twitter_link">{{ trans('cruds.team.fields.twitter_link') }}</label>
        <input class="form-control" type="text" name="twitter_link" id="twitter_link" wire:model.defer="team.twitter_link">
        <div class="validation-message">
            {{ $errors->first('team.twitter_link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.twitter_link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.team.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="team.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('team.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.content_link') ? 'invalid' : '' }}">
        <label class="form-label" for="content_link">{{ trans('cruds.team.fields.content_link') }}</label>
        <input class="form-control" type="text" name="content_link" id="content_link" wire:model.defer="team.content_link">
        <div class="validation-message">
            {{ $errors->first('team.content_link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.content_link_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.content_title') ? 'invalid' : '' }}">
        <label class="form-label" for="content_title">{{ trans('cruds.team.fields.content_title') }}</label>
        <input class="form-control" type="text" name="content_title" id="content_title" wire:model.defer="team.content_title">
        <div class="validation-message">
            {{ $errors->first('team.content_title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.content_title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>