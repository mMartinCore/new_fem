<x-guest-layout>
 <x-banner>Contact</x-banner>
 
 @include('pages.contacts.form') 
 <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mb-20">
    @if ($contact->google_map_1!=null)
    {!!$contact->google_map_1!!}    
    @endif
 </div>

</x-guest-layout>
 @include('layouts/footer')  