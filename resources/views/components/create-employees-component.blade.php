<div class="container">
    <form action = '{{ route("create-employees-form") }}' method = 'post'>
        @csrf
    <h1>Create employee</h1>
    <div class="row align-items-center">
        <div class="col-6">
            <div class = 'form-group'>
                <label for = 'first_name'>Enter first_name</label>
                <input type = 'text' name = 'first_name' id = 'first_name' class = 'form-control'>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-6">
            <div class = 'form-group'>
                <label for = 'last_name'>Enter last_name</label>
                <input type = 'text' name = 'last_name' id = 'last_name' class = 'form-control'>
            </div>
        </div>
    </div>
     <div class="row align-items-center">
        <div class="col-6">
            <div class = 'form-group'>
                <label for = 'phone'>Enter phone</label>
                <input type = 'text' name = 'phone' id = 'phone' class = 'form-control'>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-6">
            <div class = 'form-group'>
                <label for = 'email'>Enter email</label>
                <input type = 'text' name = 'email' id = 'email' class = 'form-control'>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <button type = 'submit' class = 'btn btn-success'>Create</button>
        </div>
    </div>
    </form> 
</div>