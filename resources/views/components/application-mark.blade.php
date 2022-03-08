 <div class="py-8 ">
<img  src="{{ session()->has('client_team')  ? 
  
     session('client_team')->logo  !='' ? 
     session('client_team')->logo->getUrl('thumbnail'): asset('images/header-logo.png')  
    :
    asset('images/header-logo.png') 
  }}" class="block h-28  w-28 scale-10 rounded-lg  object-contain " alt="shipping logo">
</div>