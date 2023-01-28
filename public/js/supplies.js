$(document).ready(function () {

    //DATATABLE INDEX
    $("#sstable").DataTable({
        ajax: {
            url: "/api/supplies/all",
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
            text: "Add Supplies",
            className: 'btn btn-dark glyphicon glyphicon-list-alt',
            action: function (e, dt, node, config) {
                $("#sform").trigger("reset");
                $("#suppliesModal").modal("show");


            },
        },
        ],
        columns: [
            { data: 'supply_id' },
            { data: 'description' },
            { data: 'price' },
            {
                data: null,
                render: function (data, type, row) {
                    console.log(data.img_path)
                    return `<img src="storage/${data.img_path}" style='border:solid 5px;' height="130px" width="130px">`;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return "<a href='#' class='editBtn' id='editbtn' data-id=" +
                        data.supply_id +
                        "><i class='fa-solid fa-pen' aria-hidden='true' style='font-size:30px' ></i></a><a href='#' class='deletebtn' data-id=" + data.supply_id + "><i class='fa-solid fa-trash-can' style='font-size:30px; color:red; margin-left:10px;'></a></i>";
                },
            },
        ]
    });//end

    //CREATE
    $("#sSubmit").on("click", function (e) {
        e.preventDefault();
        var data = $('#sform')[0];
        console.log(data);
        let formData = new FormData(data);
        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ',' + pair[1]);
        }

        $.ajax({
            type: "POST",
            url: "/api/supplies",
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
                $('#suppliesModal').modal("hide");
                var $ctable = $('#sstable').DataTable();
                window.location.reload();
                window.alert("SUPPLIES CREATED SUCCESSFULLY!");
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
    $("#sstable tbody").on("click", "a.editBtn", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $('#editSuppliesModal').modal('show');
        $.ajax({
            type: "GET",
            url: "api/supplier/" + id + "/edit",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $("#ssupplier_id").val(data.supply_id);
                $("#sname").val(data.name);
                $("#saddressline").val(data.addressline);
                // $("#suploads").val(data.img_path);
            },
            error: function () {
                console.log('AJAX load did not work');
                alert("error");
            }
        });
    });//end

    //EDIT BUTTON  
    $("#updateSup").on("click", function (e) {
        e.preventDefault();
        var data = $("#editform")[0];
        var id = $('#ssupplies_id').val();
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
                $("#editSuppliesModal").modal("hide");
                var $ctable = $("#sstable").DataTable();
                $('#editSuppliesModal').modal("hide");
                window.location.reload();
                window.alert("SUPPLIES UPDATED SUCCESSFULLY!");
                $ctable.row.add(data.customer).draw(false);
            },
            error: function (error) {
                console.log(error);
            },
        });
    });//end

    //DELETE
    $("#sstable tbody").on("click", 'a.deletebtn', function (e) {

        var table = $('#sstable').DataTable();
        var id = $(this).data("id");
        var $row = $(this).closest("tr");

        console.log(id);
        e.preventDefault();
        bootbox.confirm({
            message: "Do you want to delete this supply?",
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
                        url: "/api/supplies/" + id,
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
                            bootbox.alert("SUPPLIES DELETED SUCCESSFULLY!");

                        },
                        error: function (error) {
                            console.log("error");
                        },
                    });
            },
        });
    });//end
});