<x-jet-form-section submit="updateTeamName">
    <x-slot name="title">
        {{ __('Client Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The Client\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Client Owner Information -->
        <div class="col-span-6">
            <x-jet-label value="{{ __('Client Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-12 h-12 rounded-full object-cover" src="{{ $team->owner->profile_photo_url }}" alt="{{ $team->owner->name }}">

                <div class="ml-4 leading-tight">
                    <div>{{ $team->owner->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $team->owner->email }}</div>
                </div>
            </div>
        </div>

        <!-- Team Name -->
        <div Client="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Client Name') }}" />

            <x-jet-input id="name"
                        type="text"
                        class="mt-1 block w-5/7"
                        wire:model.defer="state.name"
                        :disabled="! Gate::check('update', $team)" />

            <x-jet-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    @endif
</x-jet-form-section>