@component('mail::message')
<div class="section-body">
    <div class="row">
    <div class="card col-md-6 mx-auto">
    <div class="card-body">
<h3>Hi {{$domain_details->name}},</h3>
<br>

<p>Yout Domain <b>{{$domain_details->domain_name}}</b> is Verified By SuperAdmin 
Please Check with by click below button</p>

</div>
</div>
</div>

@component('mail::button', ['url' => $domain_details->domain_name])
    Login 
@endcomponent


{{__('Thanks,')}}<br>
{{ config('app.name') }}
@endcomponent
