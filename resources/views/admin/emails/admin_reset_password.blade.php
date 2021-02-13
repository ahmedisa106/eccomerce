@component('mail::message')

    Welcome {{$data['data']->name}}
    @component('mail::button', ['url' => str_replace('%2F','/',aurl('reset-password/'.$data['token']))])
        Click Here To Reset Your Password
        <br>

        <a href="{{str_replace('%2F','/',aurl('reset-password/'.$data['token']))}}">{{str_replace('%2F','/',aurl('reset-password/'.$data['token']))}}</a>



    @endcomponent





    Thanks
    {{ config('app.name') }}
@endcomponent
