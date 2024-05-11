<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply Now</title>
  <link rel="shortcut icon" href="img/dark-logo-sm.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css" />
  <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <script src="js/sweat-alert.js"></script>
</head>

<body>
  <?php include ('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/tifinay1.png" class="d-block w-100" alt="Privacy-policy">
      <h3 class="heading">Business Loan </h3>
    </div>
  </div>
  <h4 class="fs-4 fw-bolder ms-4 mt-5">Let’s start!</h4>
  <div class="container-fluid  pt-5 mb-5">
    <div class=" container ">
      <div id='before-loan-message'>
        <div class="card p-4  ">
          <div class="row">

            <input type="hidden" class="form-control input-clear-cls" id="loan_applicant_id"
              placeholder="Loan Applicant ID">
            <div class="mb-3  col-md-6">
              <label class="form-label"> Name <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class=" fas fa-solid fa-user"></i></span>
                <input type="text" class="form-control input-clear-cls" id="first_name" placeholder=" Name">
              </div>
            </div>
            <!-- <div class="mb-3  col-md-3">
              <label class="form-label">Last Name</label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class=" fas fa-solid fa-user"></i></span>
                <input type="text" class="form-control input-clear-cls" id="last_name" placeholder="Last Name">
              </div>
            </div> -->
            <div class="mb-3  col-md-6">
              <label class="form-label">Phone <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-phone-alt"></i></span>

                <input type="number" class="form-control input-clear-cls" id="phone" placeholder="Phone">
              </div>
            </div>
            <div class="mb-3  col-md-6">
              <label class="form-label">Email <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control input-clear-cls" id="email" placeholder="Email">
              </div>
            </div>

            <div class="mb-3  col-md-6">
              <label class="form-label">City </label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-map-marker"></i></span>
                <input type="email" class="form-control input-clear-cls" id="apply-now-city" placeholder="City">
              </div>
            </div>
            <!-- <div class="mb-3  col-md-3">
              <label class="form-label">District </label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-map-marker"></i></span>
                <input type="apply-now-city" class="form-control input-clear-cls" id="apply-now-district"
                  placeholder="District">
              </div>
            </div> -->
            <div class="mb-3  col-md-6">
              <label class="form-label">State </label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-map-marker"></i></span>
                <input type="apply-now-city" class="form-control input-clear-cls" id="apply-now-state"
                  placeholder="State">
              </div>
            </div>
            <!-- <div class="mb-3  col-md-3">
              <label class="form-label">Present Employer </label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-briefcase"></i></span>
                <input type="text" class="form-control input-clear-cls" id="present_employer"
                  placeholder="Present Employer">
              </div>
            </div> -->
            <!-- <div class="mb-3  col-md-3">
              <label class="form-label">Self employed </label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-briefcase"></i></span>
                <input type="text" class="form-control input-clear-cls" id="present_employer"
                  placeholder="Self employed ">
              </div>
            </div> -->
            <div class="mb-3  col-md-6">
              <label class="form-label">Loan Type <span class="text-danger">*</span></label>
              <select class="form-select me-3 h-40px input-clear-cls" id="loan_type_select"
                aria-label="Default select example">
                <option value="default">Select</option>
                <option value="loan-against-property">Loan Against Property</option>
                <option value="home-construction-loan">Home Construction Loan</option>
                <option value="commercial-vehicle-loan">Commercial Vehicle Loan</option>
                <option value="personal-loan">Personal Loan</option>
                <option value="business-loan">Business Loan</option>
              </select>
            </div>

            <div class="g-recaptcha" data-sitekey="6LcCncMpAAAAABDV0lQvwABFq7GuOoR5rHkEgSA8"></div>
            <!-- <div class="mb-3  col-md-3">
              <label class="form-label">Desired Loan Amount <span class="text-danger">*</span></label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-receipt"></i></span>

                <input type="number" class="form-control input-clear-cls" id="desired_loan_amount"
                  placeholder="Desired Loan Amount">
              </div>
            </div> -->
            <!-- <div class="mb-3  col-md-3">
              <label class="form-label">Annual Income</label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-hand-holding-usd"></i></span>
                <input type="number" class="form-control input-clear-cls" id="annual_income"
                  placeholder="Annual Income">
              </div>
            </div> -->
            <!-- <div class="mb-3  col-md-4">
              <label class="form-label">Birth Date</label>
              <div class="input-group mb-3">
                <input type="date" class="form-control input-clear-cls" id="birth_date" placeholder="Birth  Date">
              </div>
            </div> -->
            <!-- <div class="mb-4  col-md-4">
              <label class="form-label">Marital Status</label>
              <select class="form-select me-3 h-40px input-clear-cls" id="marital_status"
                aria-label="Default select example">
                <option value="default">Select Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
              </select>
            </div> -->

            <!-- <div class="mb-4  col-md-4">
              <label class="form-label">Occupation</label>
              <div class="input-group mb-3">
                <span class="input-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <input type="text" class="form-control input-clear-cls" id="occupation" placeholder="Occupation">
              </div>
            </div> -->

            <!-- <div class="mb-3 col-md-6">
              <label for="exampleFormControlTextarea1" class="form-label">Address Line 1</label>
              <div class="input-group mb-3"> -->
            <!-- <span class="input-icon"><i class="fas fa-map-marker"></i></span> -->
            <!-- <textarea class="form-control input-clear-cls" id="address" rows="2"></textarea>
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="exampleFormControlTextarea1" class="form-label">Address Line 2</label>
              <div class="input-group mb-3"> -->
            <!-- <span class="input-icon"><i class="fas fa-map-marker"></i></span> -->
            <!-- <textarea class="form-control input-clear-cls" id="apply-now-address1" rows="2"></textarea>
              </div>
            </div> -->

          </div>
          <!-- <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
            <div class="input-group mb-3">
              <span class="input-icon"><i class="fas fa-comment-alt"></i></span>
              <textarea class="form-control input-clear-cls" id="comments" rows="3"></textarea>
            </div>
          </div> -->
          <p class="text-dark mt-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              I authorize Tiffany Finance representatives to call, SMS or email me towards the above application and
              other Tiffany Finance’s products/services.
            </label>
          </p>
          <div class="d-flex justify-content-center align-items-center">
            <button class="btn btn-theme btn-sm mt-2" onclick="submitApplication()"> <a
                herf="javascript:void(0)">Save</a></button>
          </div>

        </div>
      </div>

    </div>
    <div class="d-none card p-5 m-5   text-center mt-5" id='after-loan-message'>

    </div>
  </div>
  <?php include ('footer.php') ?>
</body>

</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var urlParams = new URLSearchParams(window.location.search);
    var loanType = urlParams.get('loanType');
    $('#loan_type_select').val(loanType)
    loanType == '' ? $('#loan_type_select').val('default') : $('#loan_type_select').val(loanType)
    loanType == '' ? $('#loan_type_select').prop('disabled', false) : $('#loan_type_select').prop('disabled', true)
  });

  function submitApplication() {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var loan_type = $('#loan_type_select').val();
    var annual_income = $('#annual_income').val();
    var birth_date = $('#birth_date').val();
    var marital_status = $('#marital_status').val();
    var address = $('#address').val();
    var address1 = $('#apply-now-address1').val();
    var present_employer = $('#present_employer').val();
    var occupation = $('#occupation').val();
    var comments = $('#comments').val();
    var loan_status = 'Processing';
    var desired_loan_amount = $('#desired_loan_amount').val();
    var city = $('#apply-now-city').val();
    var district = $('#apply-now-district').val();
    var state = $('#apply-now-state').val();

    if (birth_date == '') {
      Swal.fire({
        text: "Birth Date is Mandatory!",
        icon: "error"
      });
      return; // Stop further execution if validation fails
    }

    if (!first_name || !phone || !email || !loan_type || !desired_loan_amount || !address) {
      Swal.fire({
        text: "Please fill in all required fields. Required fields marked as *",
        icon: "error"
      });
      return; // Stop further execution if validation fails
    }

    var refNum = generateReferenceNumber(first_name, birth_date)
    // first_name phone email loan type desired loan amoutn address

    var requestData = {
      first_name: 'first_name',
      last_name: 'last_name',
      phone: 'phone',
      email: 'email',
      loan_type: 'loan_type',
      annual_income: 'annual_income',
      birth_date: 'birth_date',
      marital_status: 'marital_status',
      address: 'address',
      present_employer: 'present_employer',
      occupation: 'occupation',
      comments: 'comments',
      loan_status: 'loan_status',
      desired_loan_amount: 'desired_loan_amount',
      address1: 'address1',
      city: 'city',
      district: 'district',
      state: 'state',
      referenceNumber: 'refNum',
      recaptchaResponse: grecaptcha.getResponse(),
    };

    $.ajax({
      url: 'addUsersData.php?action=addLoanApplicant', // replace with your backend endpoint
      type: 'POST',
      data: requestData,
      success: function (response) {
        var responseJson = JSON.parse(response);
        if (responseJson.success) {
          $('.input-clear-cls').val('')
          $('#ApplynowSideNavigation').modal('hide');
          $('#before-loan-message').addClass('d-none');
          $('#after-loan-message').removeClass('d-none');
          $('#after-loan-message').val('');
          Swal.fire({
            text: "Your Loan Applicantion Has Been Successfully Added!",
            icon: "success"
          });
          $('#after-loan-message').append(`<div class="card-body">
                <h5 class="card-title">Thank You for Applying for a Loan</h5>
                <p class="card-text fs-5 text-dark">Your Reference ID: <strong>${refNum}</strong></p>
                <p class="card-text">Thank you, <strong>${first_name}</strong>, for applying for the loan. We will connect with you shortly.</p>
            </div>`)
        } else {
          Swal.fire({
            text: responseJson.message,
            icon: "error"
          });
        }
      },
      error: function (error) {
        Swal.fire({
            text: error.message,
            icon: "error"
          });
      }
    });
  }

  function generateReferenceNumber(firstName, birthDatedate) {
    var number = birthDatedate.replace(/-/g, '');
    var firstNamePrefix = firstName.toUpperCase();
    var timestamp = new Date().getTime();
    var referenceNumber = number + firstNamePrefix + timestamp;
    return referenceNumber;

  }
</script>