<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team</title>
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
                <h2 class="mb-0">Tiffany Members</h2>
                    <button type="button" class="btn btn-theme btn-sm mb-0" onclick = "addEditTeamModal('', 'add')">
                        Add Members <i class="fas fa-plus fs-8 ms-2"></i>
                    </button>
                </div>
                <!-- DataTable -->
                <div class="card p-4 table-responsive">
                    <table id="team-member-table" class="table mt-3 w-100">
                        <thead>
                            <tr class="bg-light-primary">
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th>Introduction</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
    </section>
</body>
</html>

<div class="modal fade" id="add-edit-team-modal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-edit-team-label">Add Members</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="member_id" class="form-control form-control-sm mb-3 nput-clear-cls">
                <div class="row">
                    <div class="col-md-6">
                        <label class="mb-2">First Name  <span class ='text-danger'>*</span></label>
                        <input type="text" id="first_name" class="form-control form-control-sm mb-3 nput-clear-cls">
                    </div>
                    <div class="col-md-6">
                        <label class="mb-2">Middle Name <span class ='text-danger'>*</span></label>
                        <input type="text" id="middle_name" class="form-control form-control-sm mb-3 nput-clear-cls" required>
                    </div>
                    <div class="col-md-6">
                        <label class="mb-2">Last Name <span class ='text-danger'>*</span></label>
                        <input type="text" id="last_name" class="form-control form-control-sm mb-3 nput-clear-cls" required>
                    </div>
                    <div class="col-md-6">
                        <label class="mb-2">Email <span class ='text-danger'>*</span></label>
                        <input type="email" id="email" class="form-control form-control-sm mb-3 nput-clear-cls" required>
                    </div>
                    <div class="col-md-6">
                        <label class="mb-2">Designation <span class ='text-danger'>*</span></label>
                        <input type="text" id="designation" class="form-control form-control-sm mb-3 nput-clear-cls" required>
                    </div>
                    <div class="col-md-6">
                        <label class="mb-2">Gender <span class ='text-danger'>*</span></label>
                        <select class="form-control w-100 form-control-md mb-1" id="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="mb-2">Member Image <span class ='text-danger'>*</span></label>
                        <input class="form-control w-100 form-control-md mb-1 nput-clear-cls" id="member_image" type="file" required>
                    </div>
                </div>
                <label class="form-label mt-3"> Description</label>
                <textarea class="form-control nput-clear-cls" id="description" rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                <button type="submit" onclick = 'saveTeamMeberData()' class="btn btn-theme btn-sm">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    var dt
    $(document).ready(function() {
        window.dt = $('#team-member-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "teamServerSide.php?action=index",
            "type": "POST",
            "data": function(d) {
                d.draw = d.draw || 1;
            }
        },
        "columns": [
            {
            "data": "member_image"
            },
            {
                "data": null,
                "render": function(data, type, row) {
                    // Concatenate first_name, middle_name, and last_name
                    return row.first_name + ' ' + (row.middle_name ? row.middle_name + ' ' : '') + row.last_name;
                },
                "title": "Full Name"
            },

            {
            "data": "email"
            },
            {
            "data": "designation"
            },
            {
            "data": "description"
            },
            {
            "data": "action"
            }],
        });
    });

    function addEditTeamModal(id, type) {
        $('#loader-id').addClass('d-none')
        clearInputs()
        type == 'add' ? $('#add-edit-team-label').text('Add Member') :  $('#add-edit-team-label').text('Edit Member')
        $('#add-edit-team-modal').modal('show')
        if(type == 'edit') {
            $.ajax({
                url: 'teamServerSide.php?action=getSignleRecord',
                type: 'GET',
                data: { id: id }, 
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    if(responseJson.success_code == 200) {
                        var data = responseJson.data;
                        $('#member_id').val(data.member_id);
                        $('#first_name').val(data.first_name);
                        $('#middle_name').val(data.middle_name);
                        $('#last_name').val(data.last_name);
                        $('#email').val(data.email);
                        $('#designation').val(data.designation);
                        $('#gender').val(data.gender);
                        $('#description').val(data.description);
                    }
                    $('#loader-id').addClass('d-none')
                },
                error: function(error) {
                    $('#loader-id').addClass('d-none')
                    console.error('Error adding data:', error);
                }
            })
        }
    }

    function saveTeamMeberData() {
        $('#loader-id').removeClass('d-none')
        var member_id = $('#member_id').val();
        var memberFirstName = $('#first_name').val();
        var memberMiddleName = $('#middle_name').val();
        var memberLastEmail = $('#last_name').val();
        var memberEmail = $('#email').val();
        var memberDesignation = $('#designation').val();
        var memberGender = $('#gender').val();
        var memberImage = $('#member_image')[0].files[0];
        var memberIntrodunction = $('#description').val();

        var formDataObject = new FormData();
        formDataObject.append('memberFirstName', memberFirstName);
        formDataObject.append('memberMiddleName', memberMiddleName);
        formDataObject.append('memberLastEmail', memberLastEmail);
        formDataObject.append('memberEmail', memberEmail);
        formDataObject.append('memberDesignation', memberDesignation);
        formDataObject.append('memberGender', memberGender);
        formDataObject.append('memberImage', memberImage);
        formDataObject.append('memberIntrodunction', memberIntrodunction);

        if(member_id != '') {
            formDataObject.append('memberId', member_id);
        }

        $.ajax({
            url: member_id == '' ? 'teamServerSide.php?action=add' : 'teamServerSide.php?action=update',
            type: 'POST',
            contentType: false,
            processData: false,
            data: formDataObject,
            success: function(response) {
                var responseJson = JSON.parse(response);
                $('#loader-id').addClass('d-none')
                if (responseJson.success == true) {
                    window.dt.draw();
                     $('#add-edit-team-modal').modal('hide');
                    Swal.fire({
                        text: member_id == '' ? "Team Member Added Successfully!" : "Team Member Updated Successfully!" ,
                        icon: "success"
                    });
                    clearInputs();
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
    }

    function clearInputs() {
        $('.nput-clear-cls').val('');
    }

    function deleteTeamMember(id) {
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
                url: 'teamServerSide.php?action=delete&member_id=' + id,// replace with your backend endpoint
                type: 'GET',
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    $('#loader-id').addClass('d-none')
                    if(responseJson.success) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Team Member Has Been Deleted Successfully!",
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