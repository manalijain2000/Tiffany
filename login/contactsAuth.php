<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
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
                <h2 class="mb-0">Contacts</h2>
                <!-- Add Product Button -->
                <button type="button" class="btn btn-theme btn-sm mb-0" onclick="addEditModal('', 'add')"> Add Contact <i class="fas fa-plus fs-8 ms-2"></i>
                </button>
                </div>
                <!-- DataTable -->
                <div class="card p-4 table-responsive">
                <table id="contact-table" class="table mt-3 w-100">
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
        <div class="modal fade" id="contact-modal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contact-heading"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                <input class='input-clear-cls' type="hidden" id='contact_id'>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control input-clear-cls" id="contact-name" placeholder="Name">
                </div>
                <div class="mb-3  col-md-6">
                    <label class="form-label">Email ID</label>
                    <input type="email" class="form-control input-clear-cls" id="contact-email" placeholder="Email ID">
                </div>
                <div class="mb-3  col-md-6">
                    <label class="form-label">Contact No</label>
                    <input type="number" class="form-control input-clear-cls" id="contact-phone_number" placeholder="Contact No">
                </div>
                <div class="mb-3  col-md-6">
                    <label class="form-label">Loan Account No</label>
                    <input type="number" class="form-control input-clear-cls" id="contact-loan_acc_number" placeholder="Loan Account No">
                </div>
                <div class="mb-3  col-md-6">
                    <label class="form-label">State <span class='text-danger'>*</span>
                    </label>
                    <select id="contact-state" class="form-select">
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="others">Other</option>
                    </select>
                </div>
                <div class="mb-3  col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control input-clear-cls" id="contact-city" placeholder="City">
                </div>
                </div>
                <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea class="form-control input-clear-cls" id="contact-message" rows="3"></textarea>
                </div>
                <button class="btn btn-theme btn-sm mt-2" onclick="saveContactData()"> Submit </button>
            </div>
            </div>
        </div>
        </div>
</body>
</html>



<script>
    var dt
    $(document).ready(function() {
        window.dt = $('#contact-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "contactsAuthServerSide.php?action=index",
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
            "data": "message"
            },
            {
            "data": "action"
            }],
        });
    });

    function addEditModal(id, type) {
        $('#loader-id').removeClass('d-none')
        $('#contact-modal').modal('show')
        $('.input-clear-cls').val('')
        if(type == 'add') {
            $('#loader-id').addClass('d-none')
            $('#contact-heading').text('Add Contact')
        } else {
            $('#contact-heading').text('Edit Contact')
            $.ajax({
                    url: 'contactsAuthServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                    type: 'GET',
                    data: { id: id }, 
                    success: function(response) {
                        var responseJson = JSON.parse(response);
                            if(responseJson.success_code == 200) {
                                var data = responseJson.data;
                                $("#contact_id").val(data.contact_id);
                                $("#contact-name").val(data.name);
                                $("#contact-email").val(data.email);
                                $("#contact-phone_number").val(data.phone_number);
                                $("#contact-loan_acc_number").val(data.loan_acc_number);
                                $("#contact-state").val(data.state);
                                $("#contact-city").val(data.city);
                                $("#contact-message").val(data.message);

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

    function saveContactData() {
        $('#loader-id').removeClass('d-none')
        var contact_id = $("#contact_id").val();
        var name = $("#contact-name").val();
        var email = $("#contact-email").val();
        var phone_number = $("#contact-phone_number").val();
        var loan_acc_number = $("#contact-loan_acc_number").val();
        var state = $("#contact-state").val();
        var city = $("#contact-city").val();
        var message = $("#contact-message").val();

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
            message: message,
        };

        if($('#contact_id').val() != '') {
            requestData = {...requestData, contact_id: contact_id}
        }

        $.ajax({
                url: $('#contact_id').val() == '' ? 'contactsAuthServerSide.php?action=add' : 'contactsAuthServerSide.php?action=update', // replace with your backend endpoint
                type: 'POST',
                data: requestData, 
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    if(responseJson.success) {
                        $('#contact-modal').modal('hide');
                        window.dt.draw()
                        Swal.fire({
                            text: $('#contact_id').val() == '' ? "Contact Has Been Added Successfully!" : "Contact Has Been Updated Successfully!",
                            icon: "success"
                        });
                        $('.input-clear-cls').val('')
                    } else {
                        Swal.fire({
                            text: responseJson.message,
                            icon: "error"
                        });
                     }
                    $('#loader-id').addClass('d-none')
                },
                error: function(error) {
                    $('#loader-id').addClass('d-none')
                    console.error('Error adding data:', error);
                }
        });
    }

    function deleteContact(id) {
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
                url: 'contactsAuthServerSide.php?action=delete&contact_id=' + id,// replace with your backend endpoint
                type: 'GET',
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    console.log(responseJson.success_code);
                    if(responseJson.success_code == 200) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Contact Has Been Deleted Successfully!",
                            icon: "success"
                        });
                        window.dt.draw();
                        $('#loader-id').addClass('d-none')
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