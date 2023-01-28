$(document).ready(function () {

    //DATATABLE INDEX
    $('#itable').DataTable({
        ajax: {
            url: "/api/service/all",
            dataSrc: ""
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
            text: 'Add Service',
            className: 'btn btn-dark glyphicon glyphicon-list-alt',
            action: function (e, dt, node, config) {
                $("#iform").trigger("reset");
                $('#itemModal').modal('show');
                $('#itemUpdate').hide();
            }
        },
        ],
        columns: [
            { data: 'service_id' },
            { data: 'description' },
            { data: 'price' },
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
                        data.service_id +
                        "><i class='fa-solid fa-pen' aria-hidden='true' style='font-size:30px' ></i></a><a href='#' class='deletebtn' data-id=" + data.service_id + "><i class='fa-solid fa-trash-can' style='font-size:30px; color:red; margin-left:20px;'></a></i>";
                },
            },

        ]
    })//end 

    //CREATE
    $("#itemSubmit").on("click", function (e) {
        e.preventDefault();
        // var data = $("#iform").serialize();
        var data = $('#iform')[0];
        console.log(data);
        let formData = new FormData(data);

        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }

        $.ajax({
            type: "post",
            url: "/api/service",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
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
                    $("#itemModal").modal("hide");
                    var $itable = $('#itable').DataTable();
                    window.location.reload();
                    window.alert("SERVICE CREATED SUCCESSFULLY!");
                    $itable.row.add(data.item).draw(false);
                }
            },

            error: function (error) {
                console.log(error);
            }
        })
    });//end

    //EDIT FETCH
    $("#itable tbody").on("click", "a.editBtn", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#editItemModal').modal('show');
        $.ajax({
            type: "GET",
            url: "api/service/" + id + "/edit",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#sservice_id").val(data.service_id);
                $("#sdescription").val(data.description);
                $("#sprice").val(data.price);
            },
            error: function () {
                console.log('AJAX load did not work');
                alert("error");
            }
        });
    });//end

    //EDIT BUTTON  
    $("#updatebtnItem").on("click", function (e) {
        e.preventDefault();
        var data = $("#editform")[0];
        var id = $('#sservice_id').val();
        console.log(data);
        let formData = new FormData(data);
        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + "," + pair[1]);
        }

        $.ajax({
            type: "POST",
            url: "api/service/" + id,
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#editItemModal").modal("hide");
                var $ctable = $("#itable").DataTable();
                $('#editItemModal').modal("hide");
                window.location.reload();
                window.alert("SERVICE UPDATED SUCCESSFULLY!");
                $ctable.row.add(data.service).draw(false);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });//end

    //DELETE
    $("#itable tbody").on("click", 'a.deletebtn', function (e) {

        var table = $('#itable').DataTable();
        var id = $(this).data("id");
        var $row = $(this).closest("tr");

        console.log(id);
        e.preventDefault();
        bootbox.confirm({
            message: "Do you want to delete this service?",
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
                        url: "/api/service/" + id,
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
                            bootbox.alert("SERVICE DELETED SUCCESSFULLY!");

                        },
                        error: function (error) {
                            console.log("error");
                        },
                    });
            },
        });
    });//end

}); //Document.ready end