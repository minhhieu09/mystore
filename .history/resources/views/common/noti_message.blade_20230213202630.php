@if (session()->has('message') && session()->get('status') == 'success')
    <div class="alert alert-success alert-dismissible" role="alert">
        {{session()->get('message')}}
    </div>
@elseif (session()->has('message') && session()->get('status') == 'fail')
    <divclass="alert alert-success alert-dismissible" role="alert">
        {{session()->get('message')}}>

    </divclass=>
@endif