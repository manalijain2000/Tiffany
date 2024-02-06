<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applicants</title>
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
                        <h2 class="mb-0">Job Applicants</h2>
                        <button type="button" class="btn btn-theme btn-sm mb-0" onclick="addEditModal('', 'add')">
                            Add Job Applicants <i class="fas fa-plus fs-8 ms-2"></i>
                        </button>
                    </div>
                    <div class="modal fade" id="job-applicants" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="job-applicants-heading">Gallery</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input class="form-control form-control-md input-clear-cls" id="job_applicant_id" type="hidden" placeholder="First Name" aria-label="form-control-md example">
                                    <div class="row">
                                        <div class="col-md-6 mb-2 align-self-end">
                                            <select class="form-select" aria-label="Default select example">
                                            <option selected>Select</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            </select>
                                        </div>
                                        <!-- Input fields -->
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">First Name </label>
                                            <input class="form-control form-control-md input-clear-cls" id="first_name" type="text" placeholder="First Name" aria-label="form-control-md example">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Last Name </label>
                                            <input class="form-control form-control-md input-clear-cls" id="last_name" type="text" placeholder="Last Name" aria-label="form-control-md example">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Phone </label>
                                            <input class="form-control form-control-md input-clear-cls" id="phone" type="number" placeholder="Phone number" aria-label="form-control-md example">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-md input-clear-cls" id="email" type="text" placeholder="Email" aria-label="form-control-md example">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Current Designation</label>
                                            <input class="form-control form-control-md input-clear-cls" id="current_designation" type="text" placeholder="Current Designation" aria-label="form-control-md example">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Last/Current Company</label>
                                            <input class="form-control form-control-md input-clear-cls" id="last_current_company" type="text" placeholder="Last/Current Company" aria-label="form-control-md example">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Designation Applying For</label>
                                            <input class="form-control form-control-md input-clear-cls" id="designation_applying_for" type="text" placeholder="Designation Applying For" aria-label="form-control-md example">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Preferred Location</label>
                                            <input class="form-control form-control-md input-clear-cls" id="preferred_location" type="text" placeholder="Preferred Location" aria-label="form-control-md example">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label class="form-label">Current CTC</label>
                                            <input class="form-control form-control-md input-clear-cls" id="current_ctc" type="text" placeholder="Current CTC" aria-label="form-control-md example">
                                        </div>
                                        <div class="mb-3 w-100">
                                            <input class="form-control w-100 form-control-md mb-1" id="resume_location" accept="application/pdf" type="file">
                                            <label for="formFileSm" class="form-label text-dark fw-bold">Upload Resume</label>
                                        </div>
                                        <button class="btn mx-3 w-fit btn-theme header-btn" onclick="saveJobApplicantData()">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card p-4 table-responsive">
                        <table id="job-applicant-table" class="table mt-3 w-100">
                            <thead>
                                <tr class="bg-light-primary">
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Apply For Designation</th>
                                    <th>Preferred Location</th>
                                    <th>Current CTC</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>


<script>
    var dt
    $(document).ready(function() {
        window.dt = $('#job-applicant-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "jobApplicantServerSide.php?action=index",
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
            "data": "phone",
            },
            {
            "data": "email"
            },
            {
            "data": "designation_applying_for"
            },
            {
            "data": "preferred_location"
            },
            {
            "data": "current_ctc"
            },
            {
            "data": "action"
            }
        ],
        });
    });

    function viewLoanApplicant(url) {
        var currentURL = window.location;
        var currentURL = window.location.href;
        var urlObject = new URL(currentURL);
        var basePath = urlObject.protocol + '//' + urlObject.host + urlObject.pathname.split('/').slice(0, -2).join('/');
        var pdfUrl = basePath + '/' + url;
        window.open(pdfUrl, '_blank');
    }

    function addEditModal(id, type) {
        $('#loader-id').removeClass('d-none')
        $('#job-applicants').modal('show')
        $('.input-clear-cls').val('')
        type == 'add' ? $('#resume_location').prop('disabled', false) : $('#resume_location').prop('disabled', true)
        if(type == 'edit') {
            $('#job-applicants-heading').text('Edit Applicant')
            $.ajax({
                url: 'jobApplicantServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                type: 'GET',
                data: { id: id }, 
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    console.log(responseJson);
                    if(responseJson.success_code == 200) {
                        var data = responseJson.data;
                        $('#job_applicant_id').val(data.job_applicant_id)
                        $('#first_name').val(data.first_name)
                        $('#last_name').val(data.last_name)
                        $('#phone').val(data.phone)
                        $('#email').val(data.email)
                        $('#current_designation').val(data.current_designation)
                        $('#last_current_company').val(data.last_current_company)
                        $('#designation_applying_for').val(data.designation_applying_for)
                        $('#preferred_location').val(data.preferred_location)
                        $('#current_ctc').val(data.current_ctc)
                        
                    }
                    $('#loader-id').addClass('d-none')
                },
                error: function(error) {
                    $('#loader-id').addClass('d-none')
                    console.error('Error adding data:', error);
                }
            });
        } else {
            $('#job-applicants-heading').text('Add Applicant')
            $('#loader-id').addClass('d-none')
        }
    }
    
    function saveJobApplicantData() {
        $('#loader-id').removeClass('d-none')
        var firstName = document.getElementById('first_name').value;
        var phone = document.getElementById('phone').value;
        var email = document.getElementById('email').value;
        var resumeFile = document.getElementById('resume_location').files[0];

        if (!firstName) {
            $('#loader-id').addClass('d-none')
            Swal.fire({
                icon: 'error',
                title: 'First Name is required',
            });
        } else if (!phone) {
            $('#loader-id').addClass('d-none')
            Swal.fire({
                icon: 'error',
                title: 'Contact Number is required',
            });
        } else if (!email) {
            $('#loader-id').addClass('d-none')
            Swal.fire({
                icon: 'error',
                title: 'Email is required',
            });
        } // Remove extra closing parenthesis here

        var formData = new FormData();
        formData.append('first_name', document.getElementById('first_name').value);
        formData.append('last_name', document.getElementById('last_name').value);
        formData.append('phone', document.getElementById('phone').value);
        formData.append('email', document.getElementById('email').value);
        formData.append('current_designation', document.getElementById('current_designation').value);
        formData.append('last_current_company', document.getElementById('last_current_company').value);
        formData.append('designation_applying_for', document.getElementById('designation_applying_for').value);
        formData.append('preferred_location', document.getElementById('preferred_location').value);
        formData.append('current_ctc', document.getElementById('current_ctc').value);
        formData.append('resume_location', document.getElementById('resume_location').files[0]);

        if($('#job_applicant_id').val() == '') {
                if (resumeFile == undefined) {
                $('#loader-id').addClass('d-none')
                Swal.fire({
                    icon: 'error',
                    title: 'File is required',
                    text: 'File size exceeds the allowed limit (' + '300' + ' KB)',
                });
            } else {
                var file_size = resumeFile.size / 1024;
                if (file_size >= 300) {
                    $('#loader-id').addClass('d-none')
                    Swal.fire({
                        icon: 'error',
                        title: 'File Size Error',
                        text: 'File size exceeds the allowed limit (' + '300' + ' KB)',
                    });
                }
            }
        }

        if($('#job_applicant_id').val() != '') {
            formData.append('job_applicant_id', $('#job_applicant_id').val());
        }

        $.ajax({
            url: $('#job_applicant_id').val() == '' ? 'jobApplicantServerSide.php?action=addJobApplicant' : 'jobApplicantServerSide.php?action=update',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                    var responseJson = JSON.parse(response);
                    if(responseJson.success) {
                        $('.input-clear-cls').val('')
                        $('#job-applicants').modal('hide')
                        $('#loader-id').addClass('d-none')
                        Swal.fire({
                            text: "Job Applicant Has Been Updated Successfully!",
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            text: responseJson.message,
                            icon: "error"
                        });
                    }
                    window.dt.draw()
            },
            error: function (error) {
                $('#loader-id').addClass('d-none')
                console.error(error);
            }
        });
  }

  function deleteJobApplicant(id) {
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
                    url: 'jobApplicantServerSide.php?action=delete&job_applicant_id=' + id,// replace with your backend endpoint
                    type: 'GET',
                    success: function(response) {
                        var responseJson = JSON.parse(response);
                        if(responseJson.success) {
                        $('#loader-id').addClass('d-none')
                        Swal.fire({
                            title: "Deleted!",
                            text: "Applicant Has Been Deleted Successfully!",
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