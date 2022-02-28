@component('mail::message')
# Welecome to {{ config('app.name') }}, {{$data['name'] }} 

 <br> We truly Appreciate your interest in {{ config('app.name') }}. <br> <br>
 <p class="text-sm text-gray-600 tracking-wider mb-2 bg-gray-50 p-2">
    Name: {{$data['name']}} <br>
    Virtual Locker Id: {{$data['virtual_number']}} <br>                                            
    Address: {{$data['address'] }} <br> 
</p>
 <br>
 

# {{ config('app.name')}} English Address.<br>
    Intersection of Jianshe Road and Shengli Road, 
    Muye District, 
    Xinxiang City,  
    Henan Province  
    453002 
    Zhang Lei 18503735533
   
<br>
<br>
 {{ config('app.name')}} Chinese Address.<br>
    FEMPIREfreight <br>
     河南省新乡市牧野区建设路与胜利路交叉口 <br>
     453002 <br/>
     张磊1850373553<br>
    Zhang Lei 18503735533<br>
    </p>

@component('mail::button', ['url' => $data['url'] ] )
Visit {{ config('app.name')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
