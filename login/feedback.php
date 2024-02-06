<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
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
                <div class="container-fluid pt-4 sidebar-content">
                        <div class="d-flex mb-4 justify-content-between align-items-center">
                            <h2 class="mb-0">Feedbacks</h2>
                            <!-- Add Product Button -->
                            <button type="button" class="btn btn-theme btn-sm mb-0" onclick = "addEditModal('', 'add')">
                                Add Feedback <i class="fas fa-plus fs-8 ms-2"></i>
                            </button>
                        </div>

                        <!-- DataTable -->
                        <div class="card p-4 table-responsive">
                        <table id="feedback-table" class="table mt-3 w-100">
                            <thead>
                                <tr class="bg-light-primary">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Loan Account Number</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                        </div>
                    
                    </div>
                </div>
    </section>
</div>

    <div class="modal fade" id="feedbacks-modal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedback-heading"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="row justify-content-center">
                    <input class = 'input-clear-cls' type="hidden" id = 'feedback_id'>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control input-clear-cls" id="feedback-name" placeholder="Name">
                    </div>
                    <div class="mb-3  col-md-6">
                        <label class="form-label">Email ID</label>
                        <input type="email" class="form-control input-clear-cls" id="feedback-email" placeholder="Email ID">
                    </div>
                    <div class="mb-3  col-md-6">
                        <label class="form-label">Contact No</label>
                        <input type="number" class="form-control input-clear-cls" id="feedback-phone_number" placeholder="Contact No">
                    </div>
                    <div class="mb-3  col-md-6">
                        <label class="form-label">Loan Account No</label>
                        <input type="number" class="form-control input-clear-cls" id="feedback-loan_acc_number" placeholder="Loan Account No">
                    </div>
                    <div class="mb-3  col-md-6">
                    <label  class="form-label">State <span class='text-danger'>*</span></label>
                        <select id="feedback-state" class="form-select">
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="others">Other</option>
                        </select>
                    </div>
                    <div class="mb-3  col-md-6">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control input-clear-cls" id="feedback-city" placeholder="City">
                    </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feedback</label>
                        <textarea class="form-control input-clear-cls" id="feedback-message" rows="3"></textarea>
                    </div>
                    <div class="w-100 text-end">
                        
                    <button class="btn btn-theme btn-sm mt-2" onclick = "saveFeedBackData()"> Submit </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>


<script>
    var dt
    $(document).ready(function() {
        window.dt = $('#feedback-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "feedbackServerSide.php?action=index",
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
            "data": "feedback"
            },
            {
            "data": "action"
            }],
        });
    });

    function addEditModal(id, type) {
        $('#loader-id').removeClass('d-none')
        $('#feedbacks-modal').modal('show')
        $('.input-clear-cls').val('')
        if(type == 'add') {
            $('#loader-id').removeClass('d-none')
            $('#feedback-heading').text('Add Complaint')
        } else {
            $('#feedback-heading').text('Edit Complaint')
            $.ajax({
                    url: 'feedbackServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                    type: 'GET',
                    data: { id: id }, 
                    success: function(response) {
                        var responseJson = JSON.parse(response);
                            if(responseJson.success_code == 200) {
                                var data = responseJson.data;
                                $("#feedback_id").val(data.feedback_id);
                                $("#feedback-name").val(data.name);
                                $("#feedback-email").val(data.email);
                                $("#feedback-phone_number").val(data.phone_number);
                                $("#feedback-loan_acc_number").val(data.loan_acc_number);
                                $("#feedback-state").val(data.state);
                                $("#feedback-city").val(data.city);
                                $("#feedback-message").val(data.feedback);

                            }
                        $('#loader-id').addClass('d-none')
                    
                    },
                    error: function(error) {
                        $('#loader-id').addClass('d-none')
                        console.error('Error adding data:', error);
                    }
                });
            }
    }

    function saveFeedBackData() {
        $('#loader-id').removeClass('d-none')
        var feedback_id = $("#feedback_id").val();
        var name = $("#feedback-name").val();
        var email = $("#feedback-email").val();
        var phone_number = $("#feedback-phone_number").val();
        var loan_acc_number = $("#feedback-loan_acc_number").val();
        var state = $("#feedback-state").val();
        var city = $("#feedback-city").val();
        var feedback = $("#feedback-message").val();

        if ( !name || !email || !phone_number || !loan_acc_number || !state ) {
            $('#loader-id').addClass('d-none')
            Swal.fire({
                text: "Please fill in all required fields. Required fields marked as *",
                icon: "error"
            });
            return; // Stop further execution if validation fails
        }

        // first_name phone email loan type desired loan amoutn address
        var requestData = {
            name: name,
            email: email,
            phone_number: phone_number,
            loan_acc_number: loan_acc_number,
            state: state,
            city: city,
            feedback: feedback,
        };

        if($('#feedback_id').val() != '') {
            requestData = {...requestData, feedback_id: feedback_id}
        }

        $.ajax({
                url: $('#feedback_id').val() == '' ? 'feedbackServerSide.php?action=add' : 'feedbackServerSide.php?action=update', // replace with your backend endpoint
                type: 'POST',
                data: requestData, 
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    if(responseJson.success) {
                        $('#loader-id').addClass('d-none')
                        $('#feedbacks-modal').modal('hide');
                        window.dt.draw()
                        Swal.fire({
                            text: $('#feedback_id').val() == '' ? "Feedback Has Been Added Successfully!" : "Feedback Has Been Updated Successfully!",
                            icon: "success"
                        });
                        $('.input-clear-cls').val('')
                    } else {
                        $('#loader-id').addClass('d-none')
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

    function deleteFeedback(id) {
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
                    url: 'feedbackServerSide.php?action=delete&feedback_id=' + id,// replace with your backend endpoint
                    type: 'GET',
                    success: function(response) {
                        var responseJson = JSON.parse(response);
                        console.log(responseJson.success_code);
                        if(responseJson.success_code == 200) {
                            $('#loader-id').addClass('d-none')
                            Swal.fire({
                                title: "Deleted!",
                                text: "Feedback Has Been Deleted Successfully!",
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