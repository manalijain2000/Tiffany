<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investors</title>
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
                        <h2 class="mb-0">Investors</h2>
                        <!-- Add Product Button -->
                        <button type="button" class="btn btn-theme btn-sm mb-0" onclick="addEditModal('', 'add')">
                            Add Investor <i class="fas fa-plus fs-8 ms-2"></i>
                        </button>
                    </div>

                    <!-- DataTable -->
                    <div class="card p-4 table-responsive">
                        <table id="investor-table" class="table mt-3 w-100">
                            <thead>
                                <tr class="bg-light-primary">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Pincode</th>
                                    <th>Know About Us</th>
                                    <th>Accept terms & condition</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
        </section>
</body>

</html>

<div class="modal fade" id="investor-modal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedback-heading"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row justify-content-center">
            <input class='input-clear-cls' type="hidden" id='investor_id'>
                <div class="row ">
                    <div class="col-md-6 mb-2">
                    <label class="form-label">First Name </label>
                    <input class="form-control form-control-md input-clear-cls" id='investor_first_name' type="text" placeholder="Enter your First Name" aria-label="form-control-md example">
                    </div>
                    <div class="col-md-6 mb-2">
                    <label class="form-label">Last Name </label>
                    <input class="form-control form-control-md input-clear-cls" id='investor_last_name' type="text" placeholder="Enter your Last Name" aria-label="form-control-md example">
                    </div>
                    <div class="col-md-6 mb-2">
                    <label class="form-label">Contact Number </label>
                    <input class="form-control form-control-md input-clear-cls" id='investor_contact_number' type="number" placeholder="Enter your Contact Number" aria-label="form-control-md example">
                    </div>
                    <div class="col-md-6 mb-2">
                    <label class="form-label">Email </label>
                    <input class="form-control form-control-md input-clear-cls" id='investor_email' type="text" placeholder="example@gmail.com" aria-label="form-control-md example">
                    </div>
                    <div class="col-md-6 mb-2">
                    <label class="form-label">City</label>
                    <input class="form-control form-control-md input-clear-cls" id='investor_city' type="text" placeholder="Enter your City" aria-label="form-control-md example">
                    </div>
                    <div class="col-md-6 mb-2">
                    <label class="form-label">State </label>
                    <input class="form-control form-control-md input-clear-cls" id='investor_state' type="text" placeholder="Enter your State" aria-label="form-control-md example">
                    </div>
                    <div class="col-md-6 mb-2">
                    <label class="form-label">Pincode</label>
                    <input class="form-control form-control-md input-clear-cls" id='investor_pincode' type="text" placeholder="Enter your Pin code" aria-label="form-control-md example">
                    </div>
                    <div class="col-md-6 mb-2">
                    <label class="form-label">Where did you know about us?</label>
                    <select class="form-select" id='investor_know_about_us' aria-label="Default select example">
                        <option value="">Where did you know about us? </option>
                        <option value="Company Website">Company Website</option>
                        <option value="Referrals">Referrals</option>
                        <option value="Print Advertisement">Print Advertisement</option>
                        <option value="Hoardings">Hoardings</option>
                        <option value="Social media">social media</option>
                        <option value="Networking Events">Networking Events</option>
                        <option value="Other">Other</option>
                    </select>
                    </div>
                    <div class="col-md-6 mb-2">
                    <label class="form-label">Active / In Active</label>
                    <select class="form-select" id='investor_is_active' aria-label="Default select example">
                        <option value="Active"> Active </option>
                        <option value="Inactive">In Active</option>
                    </select>
                    </div>
                    <div class="form-check mt-3 w-100">
                    <input class="form-check-input" id='investor_AcceptTermsNCondtion' type="checkbox">
                    <label class="form-check-label"> I authorize Tiffany Finance and its representatives to contact me for above registration. </label>
                    </div>
                    <div class="text-center w-fit mt-3">
                    <button class="btn  btn-sm btn-theme header-btn" onclick='saveInvestorData()'>Save</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        var dt
        $(document).ready(function () {
            window.dt = $('#investor-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "investorServerSide.php?action=index",
                    "type": "POST",
                    "data": function (d) {
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
                        "data": "contact_number"
                    },
                    {
                        "data": "status",
                        "render": function (data, type, row, meta) {
                            // Assuming data contains the status text (e.g., 'Approved', 'Pending', 'Rejected')
                            var badgeClass = "";
                            switch (data.toLowerCase()) {
                                case 'active':
                                    badgeClass = 'bg-primary';
                                    break;
                                case 'inactive':
                                    badgeClass = 'bg-danger';
                                    break;
                                default:
                                    badgeClass = 'bg-secondary';
                            }

                            return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                        },
                    },
                    {
                        "data": "state"
                    },
                    {
                        "data": "city"
                    },
                    {
                        "data": "pincode"
                    },
                    {
                        "data": "know_about_us"
                    },
                    {
                        "data": "AcceptTermsNCondtion",
                        "render": function (data, type, row, meta) {
                            // Assuming data contains the status text (e.g., 'Approved', 'Pending', 'Rejected')
                            var badgeClass = "";
                            switch (data) {
                                case '1':
                                    text = 'yes'
                                    badgeClass = 'bg-primary';
                                    break;
                                case '0':
                                    text = 'No'
                                    badgeClass = 'bg-danger';
                                    break;
                                default:
                                    badgeClass = 'bg-secondary';
                            }

                            return '<span class="badge ' + badgeClass + '">' + text + '</span>';
                        },
                    },
                    {
                        "data": "action"
                    }
                ],
            });
        });

        function addEditModal(id, type) {
            $('#loader-id').removeClass('d-none')
            $('#investor-modal').modal('show')
            $('.input-clear-cls').val('')
            if (type == 'add') {
                $('#loader-id').addClass('d-none')
                $('#feedback-heading').text('Add Investor')
            } else {
                $('#feedback-heading').text('Edit Investor')
                $.ajax({
                    url: 'investorServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                    type: 'GET',
                    data: { id: id },
                    success: function (response) {
                        var responseJson = JSON.parse(response);
                        if (responseJson.success_code == 200) {
                            var data = responseJson.data;
                            $("#investor_id").val(data.investor_id);
                            $("#investor_first_name").val(data.first_name);
                            $("#investor_last_name").val(data.last_name);
                            $("#investor_email").val(data.email);
                            $("#investor_contact_number").val(data.contact_number);
                            $("#investor_city").val(data.city);
                            $("#investor_state").val(data.state);
                            $("#investor_pincode").val(data.pincode);
                            $("#investor_know_about_us").val(data.know_about_us);
                            data.AcceptTermsNCondtion == 1 ? $("#investor_AcceptTermsNCondtion").prop('checked', true) : $("#investor_AcceptTermsNCondtion").prop('checked', false);
                            data.status == 'Inactive' ? $("#investor_is_active").val(data.status) : $("#investor_is_active").val(data.status);
                        }
                        $('#loader-id').addClass('d-none')

                    },
                    error: function (error) {
                        $('#loader-id').addClass('d-none')
                        console.error('Error adding data:', error);
                    }
                });
            }
        }

        function saveInvestorData() {
            var firstName = document.getElementById('investor_first_name').value;
            var investor_id = document.getElementById('investor_id').value;
            var lastName = document.getElementById('investor_last_name').value;
            var email = document.getElementById('investor_email').value;
            var contact = document.getElementById('investor_contact_number').value;
            var city = document.getElementById('investor_city').value;
            var state = document.getElementById('investor_state').value;
            var pincode = document.getElementById('investor_pincode').value;
            var investor_AcceptTermsNCondtion = document.getElementById('investor_AcceptTermsNCondtion').checked ? 1 : 0;
            var investor_know_about_us = document.getElementById('investor_know_about_us').value;
            var investor_is_active = document.getElementById('investor_is_active').value;

            if (firstName == '') {
            Swal.fire({
                icon: 'error',
                title: 'First Name is required'
            });
            } else if (email == '') {
            Swal.fire({
                icon: 'error',
                title: 'Email is required'
            });
            } else if (contact == '') {
            Swal.fire({
                icon: 'error',
                title: 'Contact Number is required'
            });
            } else {
                
            var requestData = {
                firstName:firstName,
                lastName:lastName,
                email:email,
                contact:contact,
                city:city,
                state:state,
                pincode:pincode,
                investor_AcceptTermsNCondtion:investor_AcceptTermsNCondtion,
                investor_know_about_us:investor_know_about_us,
                investor_is_active:investor_is_active
            }

            if ($('#investor_id').val() != '') {
                requestData = { ...requestData, investor_id: investor_id }
            }
            $.ajax({
                url: $('#investor_id').val() == '' ? 'investorServerSide.php?action=add' : 'investorServerSide.php?action=update', // replace with your backend endpoint
                type: 'POST',
                data: requestData,
                success: function (response) {
                    var responseJson = JSON.parse(response);
                    if (responseJson.success) {
                        $('#loader-id').addClass('d-none')
                        $('#investor-modal').modal('hide');
                        window.dt.draw()
                        Swal.fire({
                            text: $('#investor_id').val() == '' ? "Investor Has Been Added Successfully!" : "Investor Has Been Updated Successfully!",
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
                error: function (error) {
                    $('#loader-id').addClass('d-none')
                    console.error('Error adding data:', error);
                }
            });
        }
        }

        function deleteInvestor(id) {
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
                        url: 'investorServerSide.php?action=delete&investor_id=' + id,// replace with your backend endpoint
                        type: 'GET',
                        success: function (response) {
                            var responseJson = JSON.parse(response);
                            console.log(responseJson.success_code);
                            if (responseJson.success_code == 200) {
                                $('#loader-id').addClass('d-none')
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Feedback Has Been Deleted Successfully!",
                                    icon: "success"
                                });
                                window.dt.draw();
                            }
                        },
                        error: function (error) {
                            $('#loader-id').addClass('d-none')
                            console.error('Error adding data:', error);
                        }
                    });
                }
            });
        }
    </script>