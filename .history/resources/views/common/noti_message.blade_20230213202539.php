@if (session()->has('message') && session()->get('status') == 'success')
    <div class="alert alert-success alert-dismissible" role="alert">
        {{s}}
    </div>
    
@endif