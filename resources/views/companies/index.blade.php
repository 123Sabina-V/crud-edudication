@extends ('layout')

@section('title', 'Companies')

@section('content')
<div>
    <input type="hidden" value="{{$employees}}" name="employeesList">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope='col'>№</th>
                <th scope='col'>name</th>
                <th scope='col'>email</th>
                <th scope='col'>website</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($сompanies as $company)
            <tr>
                <th scope='row'>{{$company->id}}</th>
                <th scope='row'>{{$company->name}}</th>
                <th scope='row'>{{$company->email}}</th>
                <th scope='row'>{{$company->website}}</th>
                <th scope='row'>
                    <div class="btn-group" role="group">
                        <form action="{{route('delete_companies', ['id' => $company->id])}}" method="POST">
                            @csrf
                            <button class="btn btn-primary mr-2">Delete</button>
                        </form>
                        <form action=" {{route('edit_company', ['id' => $company->id])}}" method="EDIT">
                            @csrf
                            <button class="btn btn-primary mr-2">Edit</button>
                        </form>
                        <button type="button" data-company-id="{{$company->id}}" class="btn btn-primary add-employee" data-bs-toggle="modal" data-bs-target="#exampleModal">Assign employee</button>
                    </div>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <input type="hidden" id="company_id" name="company_id" value="">
                        <div class="col-sm">
                            <select id="select" class="form-control" id="employee_id" name="employee_id">
                                <option value=""> Select employee</option>
                            </select>
                        </div>

                        <div class="col-sm text-center">
                            <button class="btn btn-outline-primary assign-employee-btn">Assign</button>
                        </div>
                    </div>

                    <link rel="stylesheet" href="https://snipp.ru/cdn/bootstrap/4.3/bootstrap.min.css">
                    <style type="text/css">
                        #js-result {
                            font-size: 16px;
                            line-height: 38px;
                            color: green;
                        }
                    </style>

                    <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
                    <script>
                        $('#js-button').click(function() {
                            var value = $('#select option:selected').text();
                            $('#js-result').html('Result: ' + value);
                        });
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Button trigger modal -->


<!-- Modal -->

@endsection