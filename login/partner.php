<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partner</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../custom-bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css" />
    <link rel="stylesheet" type="text/css" href="../js/jquery-datatables.css" />
    <script type="text/javascript" src="../js/jquery-min.js"></script>
    <script type="text/javascript" src="../js/jquery-datatables.js"></script>
    <script type="text/javascript" src="../custom-bootstrap/bootstrap.js"></script>
    <script src="../js/sweat-alert.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> -->
</head>
<body>
<div class="container-fluid py-1">
<?php include('sideNavigation.php') ?>
    <section class="home-section">
        <div class="home-content">
            <div class="container-fluid pt-4 sidebar-content">
                <div class="d-flex mb-4 justify-content-between align-items-center">
                    <h2 class="mb-0">Partner</h2>
                    <!-- Add Product Button -->
                    <button type="button" class="btn btn-theme btn-sm mb-0" onclick = "addEditModal('add', '')">
                        Add Partner <i class="fas fa-plus fs-8 ms-2"></i>
                    </button>
                </div>
            
                <div class="modal fade" id="addEditModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel">Partner</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Product Form -->
                                <form  id = 'addEditForm' action="?action=add" update-action = '?action=update' method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <input type="hidden" name="bank_id" id="bank_id" class="form-control form-control-sm mb-3 input-value-clear" required>
                                        <div class="col-md-12">
                                            <label class="mb-2" for="bank_name">Bank Name <span class = "text-danger">*</span></label>
                                            <input type="text" name="bank_name" id="bank_name" class="form-control form-control-sm mb-3 input-value-clear" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-2" for="bank_image">Bank Icon <span class = "text-danger">*</span></label>
                                            <input class="form-control w-100 form-control-md mb-1 input-value-clear" accept=".jpg, .jpeg, .png" name="bank_image" id="bank_image" type="file" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" onclick="addEditFormData(event)" class="btn btn-theme btn-sm">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DataTable  -->
                <div class="card p-4 table-responsive">
                    <table id="bankPartnerTable" class="table mt-3 w-100">
                        <thead>
                            <tr class="bg-light-primary">
                                <th>Bank Name</th>
                                <th>Bank Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </section>
</body>
</html>
<script>
    var dt
    $(document).ready(function() {
        window.dt = $('#bankPartnerTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "partnerServerSide.php?action=index",
            "type": "POST",
            "data": function(d) {
                d.draw = d.draw || 1;
            }
        },
        "columns": [
            {
            "data": "bank_name"
            },
            {
            "data": "bank_image"
            },
            {
            "data": "action"
            }],
        });
    });

    function addEditFormData(event) {
        event.preventDefault();
        $('#loader-id').removeClass('d-none')
        var bank_id = $('#bank_id').val();
        var bank_name = $('#bank_name').val();
        var bank_image_el = document.getElementById('bank_image');

        // Check if bank_id is null or empty
        if (bank_id === null || bank_id.trim() === '') {
            // Bank_id is null or empty, file becomes required
            if (bank_image_el.files.length > 0) {
                var file = bank_image_el.files[0];

                // Check file format if a file is selected
                if (file.type == 'image/jpeg' || file.type == 'image/jpg' || file.type == 'image/png') {
                    var formDataObject = new FormData();
                    formDataObject.append('bank_id', bank_id);
                    formDataObject.append('bank_name', bank_name);
                    formDataObject.append('bank_image', file);

                    $.ajax({
                        url: 'partnerServerSide.php?action=add',
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        data: formDataObject,
                        success: function(response) {
                            var responseJson = JSON.parse(response);
                            if (responseJson.success == true) {
                                window.dt.draw();
                                clearValues();
                                $('#loader-id').addClass('d-none')
                                $('#addEditModal').modal('hide');
                                Swal.fire({
                                    text: "Bank Partner Added Successfully!",
                                    icon: "success"
                                });
                            }
                        },
                        error: function(error) {
                            $('#loader-id').addClass('d-none')
                            console.error('Error adding data:', error);
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: error
                            });
                        }
                    });
                } else {
                    $('#loader-id').addClass('d-none')
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: 'Invalid file format. Please select a file with the format jpg, jpeg, or png.'
                    });
                }
            } else {
                $('#loader-id').addClass('d-none')
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'No File Selected! Please Select File with formal jpg, jpeg & png'
                });
            }
        } else {
            $('#loader-id').removeClass('d-none')
            var formDataObject = new FormData();
            formDataObject.append('bank_id', bank_id);
            formDataObject.append('bank_name', bank_name);

            // Check if a file is selected
            if (bank_image_el.files.length > 0) {
                var file = bank_image_el.files[0];
                formDataObject.append('bank_image', file);
            }

            $.ajax({
                url: 'partnerServerSide.php?action=update',
                type: 'POST',
                contentType: false,
                processData: false,
                data: formDataObject,
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    if (responseJson.success == true) {
                        window.dt.draw();
                        clearValues();
                        $('#loader-id').addClass('d-none')
                        $('#addEditModal').modal('hide');
                        Swal.fire({
                            text: "Bank Partner Updated Successfully!",
                            icon: "success"
                        });
                    }
                },
                error: function(error) {
                    $('#loader-id').addClass('d-none')
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: error
                    });
                }
            });
        }
    }

    function clearValues() {
        $('#bank_id').val('')
        $('#bank_name').val('')
        $('#bank_image').val('')
    }


    function addEditModal(type, id) {
        clearValues()
        $('#loader-id').removeClass('d-none')
        $('.input-value-clear').val('')
        $('#addEditModal').modal('show');
        if(type == 'add') {
            $('#loader-id').addClass('d-none')
            $('#addFAQModalLabel').text('Add FAQ')
        } else {
            $('#addFAQModalLabel').text('Edit FAQ')
            $.ajax({
                    url: 'partnerServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                    type: 'GET',
                    data: { id: id }, 
                    success: function(response) {
                        var responseJson = JSON.parse(response);
                        if(responseJson.success_code == 200) {
                            $('#loader-id').addClass('d-none')
                            var data = responseJson.data;
                            $('#bank_id').val(data.bank_id)
                            $('#bank_name').val(data.bank_name)
                        }
                    },
                    error: function(error) {
                        $('#loader-id').addClass('d-none')
                        console.error('Error adding data:', error);
                    }
                });
            }
    }

    function deleteBankPartner(id) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#loader-id').removeClass('d-none')
                $.ajax({
                    url: 'partnerServerSide.php?action=delete&bank_id=' + id,// replace with your backend endpoint
                    type: 'GET',
                    success: function(response) {
                        var responseJson = JSON.parse(response);
                        $('#loader-id').addClass('d-none')
                        if(responseJson.success) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Bank Partner Has Been Deleted Successfully!",
                                icon: "success"
                            });
                            window.dt.draw();
                        }
                    },
                    error: function(error) {
                        $('#loader-id').addClass('d-none')
                        console.error('Error adding data:', error);
                    }
                }); 
            }
        });
    }
</script>
