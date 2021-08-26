<div>
    <form action = '{{ route("create-companies-form") }}' method = 'post'>
        @csrf
    <div class = 'form-group'>
            <label for = 'company_id'>Enter company_id</label>
            <input type = 'text' name = 'company_id' id = 'company_id' class = 'form-control'>
        </div>
        <div class = 'form-group'>
            <label for = 'active'>Enter active</label>
            <input type = 'text' name = 'active' id = 'active' class = 'form-control'>
        </div>
        <div class = 'form-group'>
            <label for = 'first_name'>Enter first_name</label>
            <input type = 'text' name = 'first_name' id = 'first_name' class = 'form-control'>
        </div>
         <div class = 'form-group'>
            <label for = 'last_name'>Enter last_name</label>
            <input type = 'text' name = 'last_name' id = 'last_name' class = 'form-control'>
        </div>
         <div class = 'form-group'>
            <label for = 'phone'>Enter phone</label>
            <input type = 'text' name = 'phone' id = 'phone' class = 'form-control'>
        </div>
        <div class = 'form-group'>
            <label for = 'email'>Enter email</label>
            <input type = 'text' name = 'email' id = 'email' class = 'form-control'>
        </div>

        <button type = 'submit' class = 'btn btn-success'>Create</button>
    </form> 
</div>