//DATATABLE INDEX
$("#ctable").DataTable({
    ajax: {
        url: "/api/customer/all",
        dataSrc: "",
    },
    dom: '<"top"<"left-col"B><"center-col"l><"right-col"f>>rtip',
    buttons: [{
        extend: 'pdf',
        className: 'btn btn-dark glyphicon glyphicon-file'
    },
    {
        extend: 'excel',
        className: 'btn btn-dark glyphicon glyphicon-list-alt'
    },
    {
        text: "Add Customer",
        className: 'btn btn-dark glyphicon glyphicon-list-alt',
        action: function (e, dt, node, config) {
            $("#cform").trigger("reset");
            $("#cModal").modal("show");
        },
    },
    ],
    columns: [
        { data: 'customer_id' },
        { data: 'title' },
        { data: 'lname' },
        { data: 'fname' },
        { data: 'addressline' },
        { data: 'town' },
        { data: 'zipcode' },
        { data: 'phone' },
        {
            data: null,
            render: function (data, type, row) {
                console.log(data.img_path)
                return `<img src= "/storage/${data.img_path}" style='border:solid 5px;' height="130px" width="130px">`;
            }
        },

        {
            data: null,
            render: function (data, type, row) {
                return "<a href='#' class='editBtn' id='editbtn' data-id=" +
                    data.customer_id +
                    "><i class='fa-solid fa-pen' aria-hidden='true' style='font-size:30px' ></i></a><a href='#' class='deletebtn' data-id=" + data.customer_id + "><i class='fa-solid fa-trash-can' style='font-size:30px; color:red; margin-left:10px;'></a></i>";
            },
        },

    ]

});//end

//CREATE
$("#bSubmit").on("click", function (e) {
    e.preventDefault();
    var data = $('#cform')[0];
    console.log(data);
    let formData = new FormData(data);
    console.log(formData);
    for (var pair of formData.entries()) {
        console.log(pair[0] + ',' + pair[1]);
    }

    $.ajax({
        type: "POST",
        url: "/api/customer",
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function (data) {

            if (data.status == 400) {
                $('#saveform_errList').html("");
                $('#saveform_errList').addClass('alert alert-danger');

                $.each(data.errors, function (key, err_values) {
                    $('#saveform_errList').append('<li>' + err_values + '</li>');

                });
            } else {
                console.log(data);
                $('#cModal').modal("hide");
                var $ctable = $('#ctable').DataTable();
                window.location.reload();
                window.alert("CUSTOMER CREATED SUCCESSFULLY!");
                $itable.row.add(data.item).draw(false);
                $ctable.ajax.reload();
            }
        },
        error: function (error) {
            console.log(error)
        }
    })

});//end

//EDIT FETCH
$("#ctable tbody").on("click", "a.editBtn", function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#editCustomerModal').modal('show');

    $.ajax({
        type: "GET",
        url: "api/customer/" + id + "/edit",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#ccustomer_id").val(data.customer_id);
            $("#ctitle").val(data.title);
            $("#cfname").val(data.fname);
            $("#clname").val(data.lname);
            $("#caddressline").val(data.addressline);
            $("#ctown").val(data.town);
            $("#czipcode").val(data.zipcode);
            $("#cphone").val(data.phone);
            // $("#cuploads").val(data.img_path);
        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });
});//end

//EDIT BUTTON  
$("#bUpdate").on("click", function (e) {
    e.preventDefault();
    var data = $("#editform")[0];
    var id = $('#ccustomer_id').val();
    console.log(data);
    let formData = new FormData(data);
    console.log(formData);
    for (var pair of formData.entries()) {
        console.log(pair[0] + "," + pair[1]);
    }

    $.ajax({
        type: "POST",
        url: "api/customer/" + id,
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#editCustomerModal").modal("hide");
            var $ctable = $("#ctable").DataTable();
            $('#editCustomerModal').modal("hide");
            window.location.reload();
            window.alert("CUSTOMER UPDATED SUCCESSFULLY!");
            $ctable.row.add(data.customer).draw(false);
        },
        error: function (error) {
            console.log(error);
        },
    });
});//end

//DELETE
$("#ctable tbody").on("click", 'a.deletebtn', function (e) {

    var table = $('#ctable').DataTable();
    var id = $(this).data("id");
    var $row = $(this).closest("tr");

    console.log(id);
    e.preventDefault();
    bootbox.confirm({
        message: "Do you want to delete this customer?",
        buttons: {
            confirm: {
                label: "yes",
                className: "btn-success",
            },
            cancel: {
                label: "no",
                className: "btn-danger",
            },
        },
        callback: function (result) {
            console.log(result);
            if (result)
                $.ajax({
                    type: "DELETE",
                    url: "/api/customer/" + id,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        // bootbox.alert('success');
                        $row.fadeOut(4000, function () {
                            table.row($row).remove().draw(false);
                        });
                        // bootbox.alert(data.success);
                        bootbox.alert("CUSTOMER DELETED SUCCESSFULLY!");

                    },
                    error: function (error) {
                        console.log("error");
                    },
                });
        },
    });



});//end