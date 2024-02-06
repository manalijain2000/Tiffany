<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../custom-bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../js/jquery-datatables.css" />
    <script type="text/javascript" src="../js/jquery-min.js"></script>
    <script type="text/javascript" src="../js/jquery-datatables.js"></script>
    <script type="text/javascript" src="../custom-bootstrap/bootstrap.js"></script>
    <script src="../js/sweat-alert.js"></script>
    <!-- need to check -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-...">
</head>
<body>
<div class="container-fluid py-1">
<?php include('sideNavigation.php') ?>
    <section class="home-section">
        <div class="home-content">
            <div class="container-fluid pt-4 sidebar-content">
                <div class="d-flex mb-4 justify-content-between align-items-center">
                <h2 class="mb-0">Gallery</h2>
                    <!-- Add Product Button -->
                    <button type="button" class="btn btn-theme btn-sm mb-0" onclick = "adddEditGallaryPhoto('', 'add')">
                        Add Photos <i class="fas fa-plus fs-8 ms-2"></i>
                    </button>
                </div>
                <!-- DataTable -->
                <div class="card p-4 table-responsive">
                <table id="gallary-photos-table" class="table mt-3 w-100">
                    <thead>
                        <tr class="bg-light-primary">
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>    
        </div>
    </section>
</body>
</html>

<div class="modal fade" id="gallery-photo-modal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gallery-modal-heading-label">Gallary</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Product Form -->
                <div class="row">
                    <input type="hidden"  id="gallary_id" class="form-control form-control-sm mb-3">
                    <div class="col-md-12">
                        <label class="mb-2">Gallary Image</label>
                        <input class="form-control w-100 form-control-md mb-1" id="gallery_image" type="file" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onclick = "saveGalleryData()" class="btn btn-theme btn-sm" value="Add Image">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

var dt
    $(document).ready(function() {
        window.dt = $('#gallary-photos-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "gallaryServerSide.php?action=index",
            "type": "POST",
            "data": function(d) {
                d.draw = d.draw || 1;
            }
        },
        "columns": [
            {
            "data": "gallery_image"
            },
            {
            "data": "action"
            }],
        });
    });

    function adddEditGallaryPhoto(id, type) {
        $('#loader-id').removeClass('d-none')
        clearInputs()
        $('#gallery-photo-modal').modal('show')
        if(type == 'add') {
            $('#loader-id').addClass('d-none')
            $('#gallery-modal-heading-label').text('Add Gallery Photo')
        } else {
            $('#loader-id').addClass('d-none')
            $('#gallary_id').val(id)
            $('#gallery-modal-heading-label').text('Edit Gallery Photo')
        }
    }

    function saveGalleryData() {
        $('#loader-id').removeClass('d-none')
        var gallary_id = $('#gallary_id').val();
        var galleryImage = $('#gallery_image')[0].files[0];

        var formDataObject = new FormData();
        formDataObject.append('galleryImage', galleryImage);

        if(gallary_id != '') {
            formDataObject.append('gallery_id', gallary_id);
        }

        $.ajax({
            url: gallary_id == '' ? 'gallaryServerSide.php?action=add' : 'gallaryServerSide.php?action=update',
            type: 'POST',
            contentType: false,
            processData: false,
            data: formDataObject,
            success: function(response) {
                var responseJson = JSON.parse(response);
                if (responseJson.success == true) {
                    window.dt.draw();
                    $('#gallery-photo-modal').modal('hide');
                    $('#loader-id').addClass('d-none')
                    Swal.fire({
                        text: gallary_id == '' ? "Gallery Photo Added Successfully!" : "Gallery Photo Updated Successfully!" ,
                        icon: "success"
                    });
                    clearInputs();
                }
            },
            error: function(error) {
                console.error('Error adding data:', error);
                $('#loader-id').addClass('d-none')
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error
                });
            }
        });
    }

    function clearInputs() {
        $('#gallary_id').val('')
        $('#gallery_image').val('')
    }

    function deleteGalleryPhoto(id) {
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
                url: 'gallaryServerSide.php?action=delete&gallary_id=' + id,// replace with your backend endpoint
                type: 'GET',
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    $('#loader-id').addClass('d-none')
                    if(responseJson.success) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Gallery Photo Has Been Deleted Successfully!",
                        icon: "success"
                    });
                    window.dt.draw();
                    }
                },
                error: function(error) {
                    console.error('Error adding data:', error);
                }
            }); 
            }
        });
    }
</script>
