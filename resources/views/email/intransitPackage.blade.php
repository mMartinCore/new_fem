@component('mail::message')
# Hi {{$data['name']}}, <br><br>

We are happy   to inform you that your package is presenlty in TRANSIT   :<br>
Name of item: {{$data['package_name']}} <br>
Description : {{$data['description']}} <br>
Tracking : {{$data['tracking_number']}} <br>
Booking # {{$data['package_id']}} <br>  
Destination : {{$data['destination']}} <br>

@component('mail::button', ['url' => $data['url'] ] )
Visit {{ config('app.name')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
