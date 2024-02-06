<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../custom-bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css" />
    <link rel="stylesheet" type="text/css" href="../js/jquery-datatables.css" />
    <script type="text/javascript" src="../js/jquery-min.js"></script>
    <script type="text/javascript" src="../js/jquery-datatables.js"></script>
    <script type="text/javascript" src="../custom-bootstrap/bootstrap.js"></script>
    <script src="../js/sweat-alert.js"></script>
    
</head>
<body>
    <div class="container-fluid py-1">
    <?php include('sideNavigation.php') ?>
    <section class="home-section">
        <div class="home-content">
            <div class="container-fluid pt-4  sidebar-content">
                <div class="d-flex mb-4 justify-content-between align-items-center">
                <h2 class="mb-0">Customers Review</h2>
                    <!-- Add Product Button -->
                    <button type="button" class="btn btn-theme btn-sm mb-0" onclick="addEditCustomerReview('', 'add')">
                        Add Customer Review <i class="fas fa-plus fs-8 ms-2"></i>
                    </button>
                </div>
                <!-- DataTable -->
                <div class="card p-4 table-responsive">
                <table id="customer-review-table" class="table mt-3 w-100">
                    <thead>
                        <tr class="bg-light-primary">
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Image</th>
                            <th style="width:300px!important; white-space:normal;">Customer Review</th>
                            
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

<div class="modal fade" id="customerReviewModal" tabindex="-1" aria-labelledby="customerReviewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerReviewModalHeading">Add Customer Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Customer Name Field -->
        <input class = " input-clear-cls" type="hidden" id="customer_id">
        <div class="mb-3">
          <label for="customerName" class="form-label">Customer Name <span class = "text-danger">*</span></label>
          <input type="text" class="form-control input-clear-cls" id="customer_name" placeholder="Enter customer name">
        </div>

        <div class="mb-3">
          <label for="customerName" class="form-label">Customer Email <span class = "text-danger">*</span></label>
          <input type="text" class="form-control input-clear-cls" id="customer_email" placeholder="Enter customer name">
        </div>

        <!-- Customer Review Text Area -->
        <div class="mb-3">
          <label for="customerReview" class="form-label">Customer Review <span class = "text-danger">*</span></label>
          <textarea class="form-control input-clear-cls" id = 'customer_review' rows="4" placeholder="Enter customer review"></textarea>
        </div>

        <!-- Customer Image Input -->
        <div class="mb-3">
          <label for="customerImage" class="form-label">Customer Image (jpg, png, jpeg)</label>
          <input type="file" class="form-control input-clear-cls" id="customer_image" accept=".jpg, .jpeg, .png">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick = 'saveCustomerReview()' class="btn btn-theme">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
    var dt
    $(document).ready(function() {
        window.dt = $('#customer-review-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "customerServerSide.php?action=index",
            "type": "POST",
            "data": function(d) {
                d.draw = d.draw || 1;
            }
        },
        "columns": [
            {
            "data": "customer_name"
            },
            {
            "data": "customer_email"
            },
            {
            "data": "customer_image"
            },
            {
            "data": "customer_review"
            },
            {
            "data": "action"
            }],
        });
    });

    function addEditCustomerReview(id, type) {
        $('#loader-id').removeClass('d-none')
        clearInputs()
        if(type == 'add') {
            $('#loader-id').addClass('d-none')
            $('#customerReviewModalHeading').text('Add Customer Review')
        } else {
            $('#customerReviewModalHeading').text('Edit Customer Review')
            $.ajax({
                    url: 'customerServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                    type: 'GET',
                    data: { id: id }, 
                    success: function(response) {
                        var responseJson = JSON.parse(response);
                        if(responseJson.success_code == 200) {
                            var data = responseJson.data;
                            $('#customer_id').val(data.customer_id)
                            $('#customer_email').val(data.customer_email)
                            $('#customer_name').val(data.customer_name)
                            $('#customer_review').val(data.customer_review)
                        }
                        $('#loader-id').addClass('d-none')
                    },
                    error: function(error) {
                        $('#loader-id').addClass('d-none')
                        console.error('Error adding data:', error);
                    }
                })
        }
        $('#customerReviewModal').modal('show')
    }

    function clearInputs() {
        $('.input-clear-cls').val('');
    }

    function saveCustomerReview() {
        $('#loader-id').removeClass('d-none')
        var customerId = $('#customer_id').val();
        var customerName = $('#customer_name').val();
        var customerEmail = $('#customer_email').val();
        var customerReview = $('#customer_review').val();
        var customerImage = $('#customer_image')[0].files[0];

        var formDataObject = new FormData();
        formDataObject.append('customerName', customerName);
        formDataObject.append('customerReview', customerReview);
        formDataObject.append('customerImage', customerImage);
        formDataObject.append('customerEmail', customerEmail);

        if(customerId != '') {
            formDataObject.append('customerId', customerId);
        }

        $.ajax({
            url: customerId == '' ? 'customerServerSide.php?action=add' : 'customerServerSide.php?action=update',
            type: 'POST',
            contentType: false,
            processData: false,
            data: formDataObject,
            success: function(response) {
                var responseJson = JSON.parse(response);
                if (responseJson.success == true) {
                    window.dt.draw();
                     $('#customerReviewModal').modal('hide');
                    Swal.fire({
                        text: customerId == '' ? "Customer Review Added Successfully!" : "Customer Review Updated Successfully!" ,
                        icon: "success"
                    });
                    clearInputs();
                }
                $('#loader-id').addClass('d-none')
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
        
    }

    function deleteCustomerReview(id) {
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
                    url: 'customerServerSide.php?action=delete&customer_id=' + id,// replace with your backend endpoint
                    type: 'GET',
                    success: function(response) {
                        var responseJson = JSON.parse(response);
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
                        console.error('Error adding data:', error);
                    }
                }); 
            }
        });
    } 
</script>
