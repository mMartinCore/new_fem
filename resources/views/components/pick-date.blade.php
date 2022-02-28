<div
    x-data=""
    x-init="
        new Pikaday({ field: $refs.input, 'format': 'MM/DD/YYYY', firstDay: 1, minDate: new Date(), });"
    x-on:change="value = $event.target.value"
        class="sm:w-27rem sm:w-full">
    <div class="relative mt-2">
        <input
            x-ref="input"
            x-bind:value="value"
            type="text"
            class="w-full pl-4 pr-10 py-2 leading-none rounded-lg shadow-sm focus:outline-none border-gray-300 text-gray-600 font-medium focus:ring focus:ring-blue-600 focus:ring-opacity-50" placeholder="Select date"
        />
     </div>
</div>

<input
    x-data
    x-ref="input"
    x-init="new Pikaday({ field: $refs.input })"
    type="text"
    {{ $attributes }}
>