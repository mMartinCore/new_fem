
<div>





 
    











<form wire:submit.prevent="submit" class="pt-3">
  

<x-filepond
    wire:model="bg_img" 
    allowImagePreview
    imagePreviewMaxHeight="200"
    allowFileTypeValidation
    acceptedFileTypes="['image/png', 'image/jpeg', 'image/jpg']"
    allowFileSizeValidation
    maxFileSize="2mb"
/> 
</form>
     @error('bg_img')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
            <button type="submit">Save</button>
</div>