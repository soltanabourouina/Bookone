@if (Session::get('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    {{ $errors->first() }}
</div>      
@endif
@if (Session::get('warning'))
<div class="alert alert-warning">
    {{ Session::get('warning') }}
</div>
@endif