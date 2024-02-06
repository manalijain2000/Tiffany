<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints</title>
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
                    <h2 class="mb-0">Complaint</h2>
                </div>
                <!-- DataTable -->
                <div class="card p-4 table-responsive">
                    <table id="compaints-table" class="table mt-3 w-100">
                        <thead>
                            <tr class="bg-light-primary">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Loan Account Number</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>  
            </div>
        </div>
    </section>
</body>
</html>

<div class="modal fade" id="complaints-modal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="complaint-modal-heading">Complaint Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Complaint Form -->
                <div class="row mb-3">
                    <input class = "input-value-clear" type="hidden" id = "complaint_id">
                    <div class="col-md-6">
                        <label  class="form-label input-value-clear">Name <span class = 'text-danger'>*</span> </label>
                        <input type="text" id="name" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label input-value-clear">Email <span class = 'text-danger'>*</span> </label>
                        <input type="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label  class="form-label input-value-clear">Phone Number <span class = 'text-danger'>*</span> </label>
                        <input type="text" id="phone_number" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label  class="form-label input-value-clear">Loan Account Number <span class = 'text-danger'>*</span> </label>
                        <input type="text" id="loan_acc_number" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label  class="form-label">State <span class='text-danger'>*</span></label>
                    <select id="state" class="form-select">
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="others">Other</option>
                    </select>
                    <div class="col-md-6">
                        <label  class="form-label input-value-clear">City <span class = 'text-danger'>*</span> </label>
                        <input type="text" id="city" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <label  class="form-label">Status <span class='text-danger'>*</span></label>
                    <select id="status" class="form-select">
                        <option value="register">Register</option>
                        <option value="pending">Pending</option>
                        <option value="rejected">Rejected</option>
                        <option value="resolved">Resolved</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label  class="form-label">Message <span class = 'text-danger'>*</span> </label>
                        <textarea id="message" class="form-control input-value-clear"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="saveComplaintData()" class="btn btn-theme btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var dt
    $(document).ready(function() {
        window.dt = $('#compaints-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "complaintServerSide.php?action=index",
            "type": "POST",
            "data": function(d) {
            d.draw = d.draw || 1; // Set a default value if not provided
            // You can add other custom parameters here
            }
        },
        "columns": [
            {
            "data": "name"
            },
            {
            "data": "email"
            },
            {
            "data": "phone_number"
            },
            {
            "data": "loan_acc_number"
            },
            {
            "data": "state"
            },
            {
            "data": "city"
            }, 
            {
                "data": "status",
                "render": function (data, type, row, meta) {
                    // Assuming data contains the status text (e.g., 'Approved', 'Pending', 'Rejected')
                    var badgeClass = "";
                    switch (data.toLowerCase()) {
                        case 'register':
                            badgeClass = 'bg-primary';
                            break;
                        case 'pending':
                            badgeClass = 'bg-warning';
                            break;
                        case 'rejected':
                            badgeClass = 'bg-danger';
                            break;
                        case 'resolved':
                            badgeClass = 'bg-success';
                            break;
                        default:
                            badgeClass = 'bg-secondary';
                    }

                    return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                }
            },
            {
            "data": "message"
            },
            {
            "data": "action"
            }],
        });
    });

    function addEditModal(type, id) {
        $('#loader-id').removeClass('d-none')
        $('.input-value-clear').val('')
        $('#complaints-modal').modal('show');
        if(type == 'add') {
            $('#loader-id').addClass('d-none')
            $('#complaint-modal-heading').text('Add Complaint')
        } else {
            $('#complaint-modal-heading').text('Edit Complaint')
            $.ajax({
                    url: 'complaintServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                    type: 'GET',
                    data: { id: id }, 
                    success: function(response) {
                        var responseJson = JSON.parse(response);
                            if(responseJson.success_code == 200) {
                                var data = responseJson.data;
                                $("#complaint_id").val(data.complaint_id);
                                $("#name").val(data.name);
                                $("#email").val(data.email);
                                $("#phone_number").val(data.phone_number);
                                $("#loan_acc_number").val(data.loan_acc_number);
                                $("#state").val(data.state);
                                $("#city").val(data.city);
                                $("#status").val(data.status);
                                $("#message").val(data.message);

                            }
                        $('#loader-id').addClass('d-none')
                    },
                    error: function(error) {
                        console.error('Error adding data:', error);
                    }
                });
            }
    }

    function saveComplaintData() {
        $('#loader-id').removeClass('d-none')
        var complaint_id = $("#complaint_id").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var phone_number = $("#phone_number").val();
        var loan_acc_number = $("#loan_acc_number").val();
        var state = $("#state").val();
        var city = $("#city").val();
        var status = $("#status").val();
        var message = $("#message").val();

        if (!complaint_id || !name || !email || !phone_number || !loan_acc_number || !state || !status) {
            $('#loader-id').addClass('d-none')
            Swal.fire({
                text: "Please fill in all required fields. Required fields marked as *",
                icon: "error"
            });
            return; // Stop further execution if validation fails
        }

        // first_name phone email loan type desired loan amoutn address
        var requestData = {
            complaint_id: complaint_id,
            name: name,
            email: email,
            phone_number: phone_number,
            loan_acc_number: loan_acc_number,
            state: state,
            city: city,
            status: status,
            message: message,
        };
        
        $.ajax({
                url: $('#complaint_id').val() == '' ? 'complaintServerSide.php?action=addLoanApplicant' : 'complaintServerSide.php?action=update', // replace with your backend endpoint
                type: 'POST',
                data: requestData, 
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    if(responseJson.success) {
                    $('.input-clear-cls').val('')
                    $('#complaints-modal').modal('hide');
                    $('#loader-id').addClass('d-none')
                    window.dt.draw()
                    Swal.fire({
                        text: "Compalint Has Been Updated Successfully!",
                        icon: "success"
                    });
                    } else {
                    Swal.fire({
                        text: responseJson.message,
                        icon: "error"
                    });
                    }
                },
                error: function(error) {
                    $('#loader-id').addClass('d-none')
                    console.error('Error adding data:', error);
                }
        });
    }

    function deleteComplaint(id) {
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
                url: 'complaintServerSide.php?action=delete&complaint_id=' + id,// replace with your backend endpoint
                type: 'GET',
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    console.log(responseJson.success_code);
                    if(responseJson.success_code == 200) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Application Has Been Deleted Successfully!",
                            icon: "success"
                        });
                        window.dt.draw();
                    }
                    $('#loader-id').addClass('d-none')
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
                