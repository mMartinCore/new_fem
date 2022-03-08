@component('mail::message')
# Contact Message From {{$data['name']}}, <br><br>

Subject :  {{$data['subject']}} <br>
Email :{{$data['email']}} <br>   <br> 
Message : {{$data['message']}} <br> 
 <br> 
 Partner link : {{$data['link']}} <br>
@endcomponent
 