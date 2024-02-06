<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant</title>
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
                    <h2 class="mb-0">Applicants</h2>
                    <button type="button" class="btn  btn-theme btn-sm mb-0" onclick = "applyForLoanApplication('', '', 'add')">
                        Add Applicant <i class="fas fa-plus fs-8 ms-2"></i>
                    </button>
                </div>
                <!-- DataTable -->
                <div class="card p-4 table-responsive">
                    <table id="loanApplicants" class="table mt-3 w-100">
                        <thead>
                            <tr class="bg-light-primary">
                                <th class = "white-space-no-wrap">Name</th>
                                <th class = "white-space-no-wrap">Email</th>
                                <th class = "white-space-no-wrap">Loan Type</th>
                                <th class = "white-space-no-wrap">Loan Status</th>
                                <th class = "white-space-no-wrap">Phone</th>
                                <th class = "white-space-no-wrap">Apply Loan Amount</th>
                                <th class = "white-space-no-wrap">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>   
            </div>
    </section>
</body>
</html>
<!-- Apply Now -->
<div class="modal fade" id="ApplynowSideNavigation" tabindex="-1" aria-labelledby="ApplynowLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 id = 'modal-heading-id'>Add Applicant</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body  ">
        <div>
        <div class="row">
            <input type="hidden" class="form-control input-clear-cls" id="loan_applicant_id" placeholder="Loan Applicant ID">
            <div class="mb-3  col-md-3">
                <label class="form-label">First Name <span class = "text-danger">*</span></label>
                <input type="text" class="form-control input-clear-cls" id="first_name" placeholder="First Name">
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control input-clear-cls" id="last_name" placeholder="Last Name">
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Phone <span class = "text-danger">*</span></label>
                <input type="number" class="form-control input-clear-cls" id="phone" placeholder="Phone">
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Email <span class = "text-danger">*</span></label>
                <input type="email" class="form-control input-clear-cls" id="email" placeholder="Email">
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Loan Type <span class = "text-danger">*</span></label>
                <select class="form-select me-3 h-40px input-clear-cls" id = "loan_type" aria-label="Default select example">
                    <option value="default">Select</option>
                    <option value="loan-against-property">loan-against-property</option>
                    <option value="home-construction-loan">home-construction-loan</option>
                    <option value="commercial-vehicle-loan">commercial-vehicle-loan</option>
                    <option value="personal-loan">personal-loan</option>
                    <option value="business-loan">business-loan</option>
                    <option value="education-loan">education-loan</option>
                </select>
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Desired Loan Amount <span class = "text-danger">*</span></label>
                <input type="number" class="form-control input-clear-cls" id="desired_loan_amount" placeholder="Desired Loan Amount">
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Annual Income</label>
                <input type="number" class="form-control input-clear-cls" id="annual_income" placeholder="Annual Income">
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Birth  Date</label>
                <input type="date" class="form-control input-clear-cls" id="birth_date" placeholder="Birth  Date">
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Marital Status</label>
                <select class="form-select me-3 h-40px input-clear-cls" id = "marital_status" aria-label="Default select example">
                    <option value = "default">Select Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Present Employer </label>
                <input type="text" class="form-control input-clear-cls" id="present_employer" placeholder="Present Employer">
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Occupation</label>
                <input type="text" class="form-control input-clear-cls" id="occupation" placeholder="Occupation">
            </div>
            <div class="mb-3  col-md-3">
                <label class="form-label">Loan Status</label>
                <select class="form-select me-3 h-40px input-clear-cls" id = "loan_status" aria-label="Default select example">
                    <option value="Processing">Processing</option>
                    <option value="rejected">Rejected</option>
                    <option value="approved">Approved</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Address <span class = "text-danger">*</span></label>
            <textarea class="form-control input-clear-cls" id="address" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">comments</label>
            <textarea class="form-control input-clear-cls" id="comments" rows="3"></textarea>
        </div>
        <button class="btn btn-theme btn-sm mt-2" onclick = "submitApplication()"> <a herf="javascript:void(0)">Save</a></button>
        </div>
        </div>
    </div>
    </div>
</div>
<script>
    var dt
    $(document).ready(function() {
        window.dt = $('#loanApplicants').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "loanApplicantServerSide.php?action=index",
            "type": "POST",
            "data": function(d) {
                d.draw = d.draw || 1;
            }
        },
        "columns": [
            {
            "data": "full_name"
            },
            {
                "data": "email",
                "render": function (data, type, row, meta) {
                    return '<a class="text-primary" title="Mail to' + row['full_name'] + '" href="mailto:' + row['email'] + '">' + row['email'] + '</a>';
                }
            },
            {
            "data": "loan_type"
            },
            {
                "data": "loan_status",
                "render": function (data, type, row, meta) {
                    // Assuming data contains the status text (e.g., 'Approved', 'Pending', 'Rejected')
                    var badgeClass = "";
                    switch (data.toLowerCase()) {
                        case 'processing':
                            badgeClass = 'bg-primary';
                            break;
                        case 'pending':
                            badgeClass = 'bg-warning';
                            break;
                        case 'rejected':
                            badgeClass = 'bg-danger';
                            break;
                        case 'approved':
                            badgeClass = 'bg-success';
                            break;
                        default:
                            badgeClass = 'bg-secondary';
                    }

                    return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                }
            },

            {
            "data": "phone"
            },
            {
            "data": "desired_loan_amount"
            },
            {
            "data": "action"
            }
        ],
        });
    });

    

    function applyForLoanApplication(loanType, id, addOREdit) {
        $('#loader-id').removeClass('d-none')
        $('#ApplynowSideNavigation').modal('show')
        $('.input-clear-cls').val('')
        $('#marital_status').val('default')
        loanType == '' ? $('#loan_type').val('default') : $('#loan_type').val(loanType)
        loanType == '' ? $('#loan_type').prop('disabled', false) : $('#loan_type').prop('disabled', true)
        if(addOREdit == 'edit') {
            $('#modal-heading-id').text('Edit Applicant')
            $.ajax({
                url: 'loanApplicantServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                type: 'GET',
                data: { id: id }, 
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    if(responseJson.success_code == 200) {
                        $('#loader-id').addClass('d-none')
                        var data = responseJson.data;
                        $('#loan_applicant_id').val(data.loan_applicant_id)
                        $('#occupation').val(data.occupation)
                        $('#marital_status').val(data.marital_status)
                        $('#loan_type').val(data.loan_type)
                        $('#loan_status').val(data.loan_status)
                        $('#last_name').val(data.last_name)
                        $('#first_name').val(data.first_name)
                        $('#email').val(data.email)
                        $('#desired_loan_amount').val(data.desired_loan_amount)
                        $('#birth_date').val(data.birth_date)
                        $('#annual_income').val(data.annual_income)
                        $('#comments').val(data.comments)
                        $('#address').val(data.address)
                        $('#phone').val(data.phone)
                        $('#present_employer').val(data.present_employer)
                    }
                },
                error: function(error) {
                    console.error('Error adding data:', error);
                }
            });
        } else {
            $('#loader-id').addClass('d-none')
            $('#modal-heading-id').text('Add Applicant')
        }
    }

    function submitApplication() { 
        $('#loader-id').removeClass('d-none')
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var loan_type = $('#loan_type').val();
        var annual_income = $('#annual_income').val();
        var birth_date = $('#birth_date').val();
        var marital_status = $('#marital_status').val();
        var address = $('#address').val();
        var present_employer = $('#present_employer').val();
        var occupation = $('#occupation').val();
        var comments = $('#comments').val();
        var loan_status = $('#loan_status').val();
        var desired_loan_amount = $('#desired_loan_amount').val();

        if (!first_name || !phone || !email || !loan_type || !desired_loan_amount || !address) {
            $('#loader-id').addClass('d-none')
            Swal.fire({
                text: "Please fill in all required fields. Required fields marked as *",
                icon: "error"
            });
            return; // Stop further execution if validation fails
        }

        // first_name phone email loan type desired loan amoutn address
        var requestData = {
            first_name: first_name,
            last_name: last_name,
            phone: phone,
            email: email,
            loan_type: loan_type,
            annual_income: annual_income,
            birth_date: birth_date,
            marital_status: marital_status,
            address: address,
            present_employer: present_employer,
            occupation: occupation,
            comments: comments,
            loan_status: loan_status,
            desired_loan_amount: desired_loan_amount
        };

        if ($('#loan_applicant_id').val() == '') {
            requestData = requestData;
        } else {
            requestData = { ...requestData, loan_applicant_id: $('#loan_applicant_id').val() };
        }
        
        $.ajax({
                url: $('#loan_applicant_id').val() == '' ? 'loanApplicantServerSide.php?action=addLoanApplicant' : 'loanApplicantServerSide.php?action=update', // replace with your backend endpoint
                type: 'POST',
                data: requestData, 
                success: function(response) {
                    $('#loader-id').addClass('d-none')
                    var responseJson = JSON.parse(response);
                    if(responseJson.success) {
                    $('.input-clear-cls').val('')
                    $('#ApplynowSideNavigation').modal('hide');
                    window.dt.draw()
                    Swal.fire({
                        text: "Your Loan Applicantion Has Been Successfully Added!",
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

    function deleteLoanApplicant(id) {
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
                url: 'loanApplicantServerSide.php?action=delete&loan_applicant_id=' + id,// replace with your backend endpoint
                type: 'GET',
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    $('#loader-id').addClass('d-none')
                    if(responseJson.success_code == 200) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Application Has Been Deleted Successfully!",
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

