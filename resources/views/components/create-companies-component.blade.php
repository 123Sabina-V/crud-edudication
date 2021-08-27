<div class="container">
    <form action='{{ route("create-companies-form") }}' method = 'post'>
        @csrf
    <h1>Create company</h1>
    <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='name'>Enter name</label>
                    <input type='text' name='name' id='name' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='email'>Enter email</label>
                    <input type='text' name='email' id='email' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class='form-group'>
                    <label for='website'>Enter website</label>
                    <input type='text' name='website' id='website' class='form-control'>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                    <button type='submit' class='btn btn-success'>Create</button>
            </div>
        </div>
    </form> 
</div>