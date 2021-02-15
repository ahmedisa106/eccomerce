@if($errors->count()>0)


    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach

        </ul>
    </div>

    {{--End Foreach--}}

@endif
{{--End If--}}

@if(session('success'))
    <div class="alert alert-success">
        <ul>
            <li style="list-style: none"><h4>{{session('success')}}</h4></li>
        </ul>

    </div>
@endif
{{--End If--}}

@if(session('danger'))
    <div class="alert alert-danger">
        <ul>
            <li style="list-style: none"><h4>{{session('danger')}}</h4></li>
        </ul>

    </div>
@endif
{{--End If--}}
