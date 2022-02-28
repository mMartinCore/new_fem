@component('mail::message')
# Hi {{$data['name']}}, <br><br>

We have received your pacakage  :<br>
Name of item: {{$data['package_name']}} <br>
Description : {{$data['description']}} <br>
Tracking : {{$data['tracking_number']}} <br>
Booking # {{$data['package_id']}} <br>   

@component('mail::button', ['url' => $data['url'] ] )
Visit {{ config('app.name')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
