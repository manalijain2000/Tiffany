<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pay Emi</title>
   <link rel="shortcut icon" href="img/dark-logo-sm.png">
 <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="footer.css">
  <!-- <link rel="stylesheet" href="bootstrap/font-awesome-min.css"> -->
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css" />
  <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" />
  <!-- <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" /> -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
</head>

<body>
<?php include('header.php') ?>
  
<div class="container-fluid bg-light mt-5 pt-5">
    <div class=" card p-4 container  ">
    <div class="row mt-5">
        <div class="col-md-6 mb-3">
        <label class="text-muted  white-space-no-wrap fw-bold me-3 mb-2">Name</label>
            <input type="text" onfocusout="qrCodeClassRemoveAdd()" id="customer_name"
              class="form-control form-control-sm input-clear-cls" placeholder="Enter Your Name">
        </div>
        <div class="col-md-6 mb-3">
        <label class="text-muted  white-space-no-wrap fw-bold me-3 mb-2">Contact Number</label>
            <input type="number" onfocusout="qrCodeClassRemoveAdd()" id="contact_number"
              class="form-control form-control-sm input-clear-cls" placeholder="1234567890">
        </div>

        <div class="col-md-6 mb-3">
        <label class="text-muted  white-space-no-wrap fw-bold me-3 mb-2">Loan Account Number</label>
            <input type="number" onfocusout="qrCodeClassRemoveAdd()" id="loan_account_number"
              class="form-control form-control-sm input-clear-cls" placeholder="1234567890">
        </div>

        <div class="col-md-6 mb-3">
        <label class="text-muted  white-space-no-wrap fw-bold me-3 mb-2">Due Amount</label>
            <input type="text" onfocusout="qrCodeClassRemoveAdd()" id="amount"
              class="form-control form-control-sm input-clear-cls" placeholder="589">
        </div>
       
      
        <span class="w-100 text-center " id='pay-emi-qr-code'>
          <svg width="250px" height="250px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M3 9h6V3H3zm1-5h4v4H4zm1 1h2v2H5zm10 4h6V3h-6zm1-5h4v4h-4zm1 1h2v2h-2zM3 21h6v-6H3zm1-5h4v4H4zm1 1h2v2H5zm15 2h1v2h-2v-3h1zm0-3h1v1h-1zm0-1v1h-1v-1zm-10 2h1v4h-1v-4zm-4-7v2H4v-1H3v-1h3zm4-3h1v1h-1zm3-3v2h-1V3h2v1zm-3 0h1v1h-1zm10 8h1v2h-2v-1h1zm-1-2v1h-2v2h-2v-1h1v-2h3zm-7 4h-1v-1h-1v-1h2v2zm6 2h1v1h-1zm2-5v1h-1v-1zm-9 3v1h-1v-1zm6 5h1v2h-2v-2zm-3 0h1v1h-1v1h-2v-1h1v-1zm0-1v-1h2v1zm0-5h1v3h-1v1h-1v1h-1v-2h-1v-1h3v-1h-1v-1zm-9 0v1H4v-1zm12 4h-1v-1h1zm1-2h-2v-1h2zM8 10h1v1H8v1h1v2H8v-1H7v1H6v-2h1v-2zm3 0V8h3v3h-2v-1h1V9h-1v1zm0-4h1v1h-1zm-1 4h1v1h-1zm3-3V6h1v1z" />
            <path fill="none" d="M0 0h24v24H0z" />
          </svg>
        </span>
        <div class="d-flex flex-wrap  w-50 m-auto align-items-center justify-content-evenly mb-2">
          
            <label class="text-muted  white-space-no-wrap fw-bold me-3 mb-2">Transaction Id:</label>
            <input type="text" onfocusout="qrCodeClassRemoveAdd()" id="upi_transaction_id"
              class="form-control form-control-sm input-clear-cls" placeholder="TCNI022000800424">
          
        
        </div>
        <div class="text-center">
          <button type="button" onclick="saveEMITransactionData()" class="btn btn-theme btn-sm mt-4">Submit</button>

        </div>
      </div>
      </div>
</div>


      <!-- Remove the container if you want to extend the Footer to full width. -->
      <?php include('footer.php') ?>
      <!-- End of .container -->
</body>

</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>

<!-- <script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script> -->
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/sweat-alert.js"></script>


<script>
  function saveEMITransactionData() {
    var upi_transaction_id = $('#upi_transaction_id').val();
    var customer_name = $('#customer_name').val();
    var contact_number = $('#contact_number').val();
    var loan_account_number = $('#loan_account_number').val();
    var amount = $('#amount').val();
    console.log(upi_transaction_id, customer_name, contact_number, loan_account_number, amount)
    if (upi_transaction_id == '' || customer_name == '' || contact_number == '' || loan_account_number == '' || amount == '') {
      Swal.fire({
        text: "Please fill in all fields.",
        icon: "error"
      });
      return;
    } else {
      var requestData = {
        upi_transaction_id: upi_transaction_id,
        customer_name: customer_name,
        contact_number: contact_number,
        loan_account_number: loan_account_number,
        amount: amount,
      };

      $.ajax({
        url: 'addUsersData.php?action=payLoanEmi', // replace with your backend endpoint
        type: 'POST',
        data: requestData,
        success: function (response) {
          var responseJson = JSON.parse(response);
          if (responseJson.success) {
            $('.input-clear-cls').val('')
            $('#payemi').modal('hide');
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
        error: function (error) {
          console.error('Error adding data:', error);
        }
      });
    }
  }


  function qrCodeClassRemoveAdd() {
    var upi_transaction_id = $('#upi_transaction_id').val();
    var customer_name = $('#customer_name').val();
    var contact_number = $('#contact_number').val();
    var loan_account_number = $('#loan_account_number').val();
    var amount = $('#amount').val();
    if (upi_transaction_id != '' && customer_name != '' && contact_number != '' && loan_account_number != '' && amount != '') {
      $('#pay-emi-qr-code').removeClass('d-none')
    } else {
      $('#pay-emi-qr-code').addClass('d-none')
    }
  }
</script>