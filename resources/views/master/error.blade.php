@if (Session::has('flash_error.message'))
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('flash_error.message') }}
    </div>
@endif

@if (Session::has('flash_success.message'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        {{ Session::get('flash_success.message') }}
    </div>
@endif