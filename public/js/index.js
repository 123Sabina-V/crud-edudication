$(document).ready(function () {
    // $("#exampleModal").modal();
    $(".add-employee").on("click", function () {
        let companyId = $(this).attr("data-company-id");
        $("#company_id").val(companyId);

        let employees = JSON.parse($("[name=employeesList]").val());
        $("[name=employee_id]").empty();
        employees.map(function (item) {
            $("[name=employee_id]").append(
                `<option value="${item.id}">${item.first_name} ${item.last_name}</option>`
            );
        });
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/companies/assigned/employees",
            method: "get",
            data: {
                company_id: companyId,
            },
            success: function (data) {
                let employees = JSON.parse(data);
                $(".employees-table").empty();
                $(".employees-table").append(
                    `<tr>
                        <th scope='col'>first_name</th>
                        <th scope='col'>last_name</th>
                        <th scope='col'>phone</th>
                        <th scope='col'>email</th>
                    </tr>`
                );
                employees.map(function (item) {
                    $(".employees-table").append(
                        `<tr>
                            <th scope='row'>${item.first_name}</th>
                            <th scope='row'>${item.last_name}</th>
                            <th scope='row'>${item.phone}</th>
                            <th scope='row'>${item.email}</th>
                            <th scope='row'>
                                <button class="btn btn-danger unassign-employee" data-employee-id="${item.id}">Un-assign</button>
                            </th>
                        <tr>`
                    );
                });
            },
        });
    });

    $(".assign-employee-btn").on("click", function () {
        let $parent = $(this).parent().parent();
        let companyId = $parent.find("#company_id");
        let employeeId = $parent.find("[name=employee_id]");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/companies/assign/employee",
            method: "post",
            data: {
                company_id: companyId.val(),
                employee_id: employeeId.val(),
            },
            success: function (data) {
                let employee = JSON.parse(data);
                $(".employees-table").append(
                    `<tr>
                    <th scope='row'>${employee.first_name}</th>
                    <th scope='row'>${employee.last_name}</th>
                    <th scope='row'>${employee.phone}</th>
                    <th scope='row'>${employee.email}</th>
                    <th scope='row'>
                        <button class="btn btn-danger unassign-employee" data-employee-id="${employee.id}">Un-assign</button>
                    </th>
                <tr>`
                );
                // init JSON.parse variable which contains employee
            },
        });
    });

    $(document).on("click", ".unassign-employee", function () {
        let $record = $(this).parent().parent();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "companies/un-assign/employee",
            method: "post",
            data: {
                employee_id: $(this).attr("data-employee-id"),
            },
            success: function (data) {
                $record.remove();
            },
        });
    });
});
