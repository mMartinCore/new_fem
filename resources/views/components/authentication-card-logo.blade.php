<a href="/">
 <div class="  py-2   ">
<img  src="{{ session('client_team')->logo !='' ? 
    session('client_team')->logo->getUrl('thumbnail'):
    asset('images/header-logo.png') 
  }}" class="block  h-60  w-96    object-contain  rounded-lg     " alt="shipping logo">
</div>
</a>
 {{-- h-38  w-38  --}}