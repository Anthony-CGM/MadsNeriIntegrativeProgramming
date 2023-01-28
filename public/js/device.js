//DATATABLE INDEX
$("#dtable").DataTable({
    ajax: {
        url: "/api/device/all",
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
        text: "Add Device",
        className: 'btn btn-dark glyphicon glyphicon-list-alt',
        action: function (e, dt, node, config) {
            $("#dform").trigger("reset");
            $("#deviceModal").modal("show");
        },
    },
    ],
    columns: [
        { data: 'device_id' },
        { data: 'customer_id' },
        { data: 'type' },
        { data: 'brand' },
        { data: 'model' },
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
                    data.device_id +
                    "><i class='fa-solid fa-pen' aria-hidden='true' style='font-size:30px' ></i></a><a href='#' class='deletebtn' data-id=" + data.device_id + "><i class='fa-solid fa-trash-can' style='font-size:30px; color:red; margin-left:10px;'></a></i>";
            },
        },
    ]
});//end

//CREATE
$("#deviceSubmit").on("click", function (e) {
    e.preventDefault();
    var data = $('#dform')[0];
    console.log(data);
    let formData = new FormData(data);
    console.log(formData);
    for (var pair of formData.entries()) {
        console.log(pair[0] + ',' + pair[1]);
    }

    $.ajax({
        type: "POST",
        url: "/api/device",
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: "json",
        success: function (data) {
            if(data.status == 400)
            {
                $('#saveform_errList').html("");
                $('#saveform_errList').addClass('alert alert-danger');

               $.each(data.errors, function (key, err_values){
                $('#saveform_errList').append('<li>'+err_values+'</li>');

               });
            }else{
                console.log(data);
                $('#deviceModal').modal("hide");
                var $dtable = $('#dtable').DataTable();
                window.location.reload();
                window.alert("DEVICE CREATED SUCCESSFULLY!");
                $dtable.row.add(data.item).draw(false);
                $dtable.ajax.reload();
            }
        },
        error: function (error) {
            console.log(error)
        }
    })

});//end

//EDIT FETCH
$("#dtable tbody").on("click", "a.editBtn", function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#editDeviceModal').modal('show');

    $.ajax({
        type: "GET",
        url: "api/device/" + id + "/edit",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#ddevice_id").val(data.device_id);
            $("#dtype").val(data.type);
            $("#dbrand").val(data.brand);
            $("#dmodel").val(data.model);
            // $("#cuploads").val(data.img_path);
        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });
});

//EDIT BUTTON  
$("#deviceUpdate").on("click", function (e) {
    e.preventDefault();
    var data = $("#editform")[0];
    var id = $('#ddevice_id').val();
    console.log(data);
    let formData = new FormData(data);
    console.log(formData);
    for (var pair of formData.entries()) {
        console.log(pair[0] + "," + pair[1]);
    }

    $.ajax({
        type: "POST",
        url: "api/device/" + id,
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            $("#editDeviceModal").modal("hide");
            var $dtable = $("#dtable").DataTable();
            $('#editDeviceModal').modal("hide");
            window.location.reload();
            window.alert("DEVICE UPDATED SUCCESSFULLY!");
            $dtablele.row.add(data.device).draw(false);
        },
        error: function (error) {
            console.log(error);
        },
    });
});//end

//DELETE
$("#dtable tbody").on("click", 'a.deletebtn', function (e) {

    var table = $('#dtable').DataTable();
    var id = $(this).data("id");
    var $row = $(this).closest("tr");

    console.log(id);
    e.preventDefault();
    bootbox.confirm({
        message: "Do you want to delete this device?",
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
                    url: "/api/device/" + id,
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
                        bootbox.alert("DEVICE DELETED SUCCESSFULLY!");

                    },
                    error: function (error) {
                        console.log("error");
                    },
                });
        },
    });
});//end