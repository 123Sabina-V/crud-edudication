$(document).ready(function () {
    // $("#exampleModal").modal();
    $(".add-employee").on("click", function () {
        let companyId = $(this).attr("data-company-id");
        $("#company_id").val(companyId);

        let employees = JSON.parse($("[name=employeesList]").val());
        employees.map(function (item) {
            $("[name=employee_id]").append(
                `<option value="${item.id}">${item.first_name} ${item.last_name}</option>`
            );
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
                console.log(data);
            },
        });
    });
});
