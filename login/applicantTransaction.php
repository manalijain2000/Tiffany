<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../custom-bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../js/jquery-datatables.css" />
    <script type="text/javascript" src="../js/jquery-min.js"></script>
    <script type="text/javascript" src="../js/jquery-datatables.js"></script>
    <script src="../js/sweat-alert.js"></script>
    <script type="text/javascript" src="../custom-bootstrap/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-...">
</head>
<body>
<div class="container-fluid py-1">
<?php include('sideNavigation.php') ?>
    <section class="home-section">
        <div class="home-content">
            <div class="container-fluid pt-4 sidebar-content">
                <div class="d-flex mb-4 justify-content-between align-items-center">
                    <h2 class="mb-0">Transactions</h2>
                </div>
                <!-- DataTable -->
                <div class="card p-4 table-responsive">
                    <table id="transaction-table" class="table mt-3 w-100">
                        <thead>
                            <tr class="bg-light-primary">
                                <th>UPI Transaction Id</th>
                                <th>Customer Name</th>
                                <th>Contact Number</th>
                                <th>Loan Account Number</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Paid on</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>    
        </div>
    </section>
</body>
</html>

<div class="modal fade" id="transaction-modal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-modal-heading-label">Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Product Form -->
                <div class="row">
                    <input type="hidden"  id="transaction_id" class="form-control form-control-sm mb-3">
                    <div class="col-md-12">
                        <label class="mb-2">UPI transaction Id</label>
                        <input class="form-control w-100 form-control-md mb-1 input-clear-cls" id="upi_transaction_id" type="text" >
                    </div>
                    <div class="col-md-12">
                        <label class="mb-2">Customer Name</label>
                        <input class="form-control w-100 form-control-md mb-1 input-clear-cls" id="customer_name" type="text" >
                    </div>
                    <div class="col-md-12">
                        <label class="mb-2">Contact Number</label>
                        <input class="form-control w-100 form-control-md mb-1 input-clear-cls" id="contact_number" type="text" >
                    </div>
                    <div class="col-md-12">
                        <label class="mb-2">Loan Account Number</label>
                        <input class="form-control w-100 form-control-md mb-1 input-clear-cls" id="loan_account_number" type="text" >
                    </div>
                    <div class="col-md-12">
                        <label class="mb-2">Amount</label>
                        <input class="form-control w-100 form-control-md mb-1 input-clear-cls" id="amount" type="text" >
                    </div>
                    <div class="col-md-12">
                        <label class="mb-2">Status</label>
                        <select class="form-select w-100 form-control-md mb-1" id="status" >
                            <option value="paid">Paid</option>
                            <option value="pending">Pending</option>
                            <option value="not_received">Not Received</option>
                            <option value="received">Received</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" onclick = "saveEMITransactionData()" class="btn btn-theme btn-sm" value="Add Image">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var dt
    $(document).ready(function() {
        window.dt = $('#transaction-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "applicantTransactionServerSide.php?action=index",
            "type": "POST",
            "data": function(d) {
                d.draw = d.draw || 1;
            }
        },
        "columns": [
            {
            "data": "upi_transaction_id"
            },
            {
            "data": "customer_name"
            },
            {
            "data": "contact_number"
            },
            {
            "data": "loan_account_number"
            },
            {
            "data": "amount"
            },
            {
                "data": "status",
                "render": function (data, type, row, meta) {
                    // Assuming data contains the status text (e.g., 'Approved', 'Pending', 'Rejected')
                    var badgeClass = "";
                    switch (data.toLowerCase()) {
                        case 'paid':
                            badgeClass = 'bg-primary';
                            break;
                        case 'pending':
                            badgeClass = 'bg-warning';
                            break;
                        case 'not_received':
                            badgeClass = 'bg-danger';
                            break;
                        case 'received':
                            badgeClass = 'bg-success';
                            break;
                        default:
                            badgeClass = 'bg-secondary';
                    }

                    return '<span class="badge ' + badgeClass + '">' + data + '</span>';
                }
            },
            {
            "data": "created_at"
            },
            {
            "data": "action"
            }
        ],
        });
    });

    function addEditModal(type, id) {
        clearInputs()
        $('#loader-id').removeClass('d-none')
        $('#transaction-modal').modal('show')
        if(type == 'add') {
            $('#loader-id').addClass('d-none')
            $('#transaction-modal-heading-label').text('Add Transaction')
        } else {
            $('#transaction-modal-heading-label').text('Edit Transaction')
            $.ajax({
                url: 'applicantTransactionServerSide.php?action=getSignleRecord', // replace with your backend endpoint
                type: 'GET',
                data: { id: id }, 
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    if(responseJson.success_code == 200) {
                        var data = responseJson.data;
                        $('#loader-id').addClass('d-none')
                        $('#transaction_id').val(data.transaction_id)
                        $('#upi_transaction_id').val(data.upi_transaction_id)
                        $('#customer_name').val(data.customer_name)
                        $('#contact_number').val(data.contact_number)
                        $('#loan_account_number').val(data.loan_account_number)
                        $('#amount').val(data.amount)
                        $('#status').val(data.status)
                    }
                },
                error: function(error) {
                    $('#loader-id').addClass('d-none')
                    console.error('Error adding data:', error);
                }
            });
        }
    }

    function saveEMITransactionData() {
        $('#loader-id').removeClass('d-none')
        var transaction_id =  $('#transaction_id').val();
        var upi_transaction_id = $('#upi_transaction_id').val();
        var customer_name = $('#customer_name').val();
        var contact_number = $('#contact_number').val();
        var loan_account_number = $('#loan_account_number').val();
        var status = $('#status').val();
        var amount = $('#amount').val();
            if(upi_transaction_id == '' || customer_name == '' || contact_number == '' || loan_account_number == '' || amount == '') {
                $('#loader-id').addClass('d-none')
                Swal.fire({
                    text: "Please fill in all fields.",
                    icon: "error"
                });
                return; 
            }else {
                var requestData = {
                    transaction_id: transaction_id,
                    upi_transaction_id: upi_transaction_id,
                    customer_name: customer_name,
                    contact_number: contact_number,
                    loan_account_number: loan_account_number,
                    amount: amount,
                    status: status,
                };

            $.ajax({
                    url: 'applicantTransactionServerSide.php?action=update', // replace with your backend endpoint
                    type: 'POST',
                    data: requestData, 
                    success: function(response) {
                        var responseJson = JSON.parse(response);
                        if(responseJson.success) {
                        $('#loader-id').addClass('d-none')
                            $('.input-clear-cls').val('')
                            $('#transaction-modal').modal('hide');
                            Swal.fire({
                                text: "Transaction Has Been Updated Successfully!",
                                icon: "success"
                            });
                        } else {
                            Swal.fire({
                                text: responseJson.message,
                                icon: "error"
                            });
                        }
                        window.dt.draw();
                    },
                    error: function(error) {
                        $('#loader-id').addClass('d-none')
                        console.error('Error adding data:', error);
                    }
            });
            }
      }

    function clearInputs() {
        $('#gallary_id').val('')
        $('#gallery_image').val('')
    }

    function deleteTransaction(id) {
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
                url: 'applicantTransactionServerSide.php?action=delete&transaction_id=' + id,// replace with your backend endpoint
                type: 'GET',
                success: function(response) {
                    var responseJson = JSON.parse(response);
                    $('#loader-id').addClass('d-none')
                    if(responseJson.success) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Transaction Has Been Deleted Successfully!",
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
