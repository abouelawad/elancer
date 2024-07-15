@if(session()->has('success'))
<div class='alert alert-success alert-dismissible fade show' role ='alert'>
    <strong>{{ session()->get('success') }}</strong>
    <button type="button" class='btn-close' data-dismiss="alert" area-label='close'>
        <span area-hidden='true' >&times;</span>
    </button>
</div>
@endif 

@if(session()->has('warning'))
<div class='alert alert-warning alert-dismissible fade show' role ='alert'>
    <strong>{{ session()->get('warning') }}</strong>
    <button type="button" class='btn-close' data-bs-dismiss="alert" area-label='close'>
        <span area-hidden='true' >&times;</span>
    </button>
</div>
@endif 
@if(session()->has('deleted'))
<div class='alert alert-danger alert-dismissible fade show' role ='alert'>
    <strong>{{ session()->get('deleted') }}</strong>
    <button type="button" class='btn-close' data-bs-dismiss="alert" area-label='close'>
        <span area-hidden='true' >&times;</span>
    </button>
</div>
@endif 