<div> 
    <script>
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);
        FilePond.registerPlugin(FilePondPluginImagePreview);
    </script>


<div  
    wire:ignore
    x-data
    x-init="() => {        
        const post = FilePond.create($refs.input);
        post.setOptions({  
            // Here
            
            acceptedFileTypes: {!! $attributes->get('acceptedFileTypes') ?? 'null' !!},
            // And Here
            maxFileSize: {!! $attributes->has('maxFileSize') ? "'".$attributes->get('maxFileSize')."'" : 'null' !!},
            server: {
                process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    console.log(post);
                    console.log(metadata);
                    console.log(options);
                    @this.upload('{{ $attributes->whereStartsWith('wire:model')->first() }}', file, load, error, progress)
                },
                revert: (filename, load) => {
                    @this.removeUpload('{{ $attributes->whereStartsWith('wire:model')->first() }}', filename, load)
                },
                allowImagePreview: {{ $attributes->has('allowFileTypeValidation') ? 'true' : 'false' }},
                imagePreviewMaxHeight: {{ $attributes->has('imagePreviewMaxHeight') ? $attributes->get('imagePreviewMaxHeight') : '256' }},
                allowFileTypeValidation: {{ $attributes->has('allowFileTypeValidation') ? 'true' : 'false' }},       
                allowFileSizeValidation: {{ $attributes->has('allowFileSizeValidation') ? 'true' : 'false' }},                
                labelFileTypeNotAllowed: 'File is of invalid type',
            }
        });
    }"
>
    <input type="file" x-ref="input" />
</div> 

</div> 