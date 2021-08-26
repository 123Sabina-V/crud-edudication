<div>
    <form action = '{{ route("create-employees-form") }}' method = 'post'>
        @csrf
    <div class = "form-group">
            <label for = 'user_id'>Enter user_id</label>
            <input type = 'text' name = 'user_id' id = 'user_id' class = 'form-control'>
        </div>
        <div class = 'form-group'>
            <label for = 'active'>Enter active</label>
            <input type = 'text' name = 'active' id = 'active' class = 'form-control'>
        </div>
        <div class = 'form-group'>
            <label for = 'name'>Enter name</label>
            <input type = 'text' name = 'name' id = 'name' class = 'form-control'>
        </div>
         <div class = 'form-group'>
            <label for = 'email'>Enter email</label>
            <input type = 'text' name = 'email' id = 'email' class = 'form-control'>
        </div>
         <div class = 'form-group'>
            <label for = 'website'>Enter website</label>
            <input type = 'text' name = 'website' id = 'website' class = 'form-control'>
        </div>

        <button type = 'submit' class = 'btn btn-success'>Create</button>
    </form> 
</div>