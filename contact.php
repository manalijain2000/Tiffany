<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact us</title>
  <link rel="shortcut icon" href="img/dark-logo-sm.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="footer.css">
  <!-- <link rel="stylesheet" href="bootstrap/font-awesome-min.css"> -->
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css" />
  <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <script src="js/chart.js"></script>
</head>

<body>
  <?php include ('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/tifinay1.png" class="d-block w-100" alt="Privacy-policy">
      <h3 class="heading">Contact Us </h3>
    </div>
  </div>
  <div class="container-fluid contact-us-content">
    <img src="img/contacttiffany.jpg" class="image-fluid contact-tiffany-image">
    <h4 class="fs-1 fw-bolder">Contact Us</h4>
    <p class="text-dark fs-4">We're Here To Assist You</p>
  </div>
  <div class="container-fluid p-0 py-3  contact-box">
    <ul class="nav nav-pills pt-3 mb-3 justify-content-center " id="pills-tab" role="tablist">
      <li class="nav-item fs-4 tabs-reach-us" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
          type="button" role="tab" aria-controls="pills-home" aria-selected="true">Reach Us</button>
      </li>
      <li class="nav-item fs-4" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
          type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Branch Locator</button>
      </li>
      <li class="nav-item fs-4" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
          type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Suggestions/Feedback</button>
      </li>
      <!-- <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-g-tab" data-bs-toggle="pill" data-bs-target="#pills-g" type="button"
          role="tab" aria-controls="pills-g" aria-selected="false">Grievance Redressal/ Complaints</button>
      </li> -->
    </ul>
    <div class="tab-content px-5" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <h5 class="text-center mb-4">Reach Us</h5>
        <div class="row">
          <div class="col-md-4">
            <div class="card  h-100">
              <div class="card-header"> Call Us </div>
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <i class="fas fa-phone-alt"></i>
                  <p class="mb-0 ms-4 paragraph">Toll Free <a href="tel:+1800-890-6544"
                      class="d-block text-dark">1800-890-6544</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card  h-100">
              <div class="card-header"> Email Us </div>
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <i class="fas fa-envelope"></i>
                  <p class="mb-0 ms-4">
                    <a href="mailto:info@tiffanyfinance.com" class="text-dark">info@tiffanyfinance.com</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <div class="card-header"> Head Office </div>
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <i class="fas fa-map-marker-alt"></i>
                  <p class="mb-0 ms-4 paragraph"> 1 st Floor, Tiffany Finance, Tiffany Tower, Bhilwara, Rajasthan,
                    311001 </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <h5 class="text-center mb-4 ms-2">Select Nearest Tiffany Branch</h5>
        <div class="branch-selection">
          <select class="form-select me-3 h-40px select-branch-contact" aria-label="Default select example">
            <option selected>Select State</option>
            <option value="1">Rajasthan</option>

          </select>
          <select class="form-select me-3 h-40px select-branch-contact" aria-label="Default select example">
            <option selected>Select Branch</option>
            <option value="1">Bhilwara</option>
            <option value="2">Gangapur</option>

          </select>
          <div class="input-group me-3 h-40px select-branch-contact ">
            <div class="input-group-text bg-white py-0 search-input-filed">
              <i class="fas fa-search"></i>
              <input type="text" class="form-control border-0 form-control-sm " aria-label="Text input with checkbox">
            </div>
          </div>
        </div>
      </div>
      <!-- feedback form -->


      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <!-- <h5 class="mb-4 text-center">Suggestions/Feedback</h5> -->
        <div class="mx-auto custom-form-wrapper">
          <div class="mb-3">

            <input type="text" class="form-control input-clear-cls" id="feedback-name" placeholder="Enter Your Name">
          </div>
          <div class="mb-3">

            <input type="number" class="form-control input-clear-cls" id="feedback-phone_number"
              placeholder="Enter Your Contact Number">
          </div>
          <div class="mb-3">

            <input type="number" class="form-control input-clear-cls" id="feedback-loan_acc_number"
              placeholder="Enter Your Loan Account Number">
          </div>
          <div class="mb-3">

            <input type="email" class="form-control input-clear-cls" id="feedback-email"
              placeholder="example@email.com">
          </div>
          <div class="mb-3">

            <select id="feedback-state" class="form-select select-form ">
              <option value="" disabled selected>Select State</option>
              <option value="Rajasthan">Rajasthan</option>
              <option value="others">Other</option>
            </select>
          </div>
          <div class="mb-3">

            <input type="text" class="form-control input-clear-cls" id="feedback-city" placeholder="Enter Your City">
          </div>
          <div class="mb-3">

            <textarea class="form-control input-clear-cls" id="feedback-message" rows="3"></textarea>
          </div>
          <div class="w-100 text-center">
            <button class="btn btn-theme btn-sm mt-2" onclick="saveFeedBackData()">Submit</button>
          </div>
        </div>
      </div>

      <!-- Complaints -->
      <!-- <div class="tab-pane fade" id="pills-g" role="tabpanel" aria-labelledby="pills-g-tab">
        <h5 class="text-center mb-4"> Grievance Redressal/ Complaints </h5>
        <div>
          <div class="row justify-content-center">
            <div class="mb-3 col-md-6">
              <label class="form-label">Name</label>
              <div class="input-group mb-1">
                <span class="input-icon"><i class=" fas fa-solid fa-user"></i></span>
                <input type="text" class="form-control input-clear-cls" id="name" placeholder="Enter Your Name">
              </div>
            </div>
            <div class="mb-3  col-md-6">
              <label class="form-label">Email ID</label>
              <div class="input-group mb-1">
                <span class="input-icon"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control input-clear-cls" id="email" placeholder="example@gmail.com">
              </div>
            </div>
            <div class="mb-3  col-md-6">
              <label class="form-label">Contact No</label>
              <div class="input-group mb-1">
                <span class="input-icon"><i class="fas fa-id-badge"></i></span>
                <input type="number" class="form-control input-clear-cls" id="phone_number"
                  placeholder="Enter Your Contact Number">
              </div>
            </div>
            <div class="mb-3  col-md-6">
              <label class="form-label">Loan Account No</label>
              <div class="input-group mb-1">
                <span class="input-icon">
                  <i class="fas fa-sort-numeric-up-alt"></i></span>
                <input type="number" class="form-control input-clear-cls" id="loan_acc_number"
                  placeholder="Enter Your Loan Account Number">
              </div>
            </div>
            <div class="mb-3  col-md-6">
              <label class="form-label">State <span class='text-danger'>*</span></label>
              <select id="state" class="form-select">
                <option value="Rajasthan">Rajasthan</option>
                <option value="others">Other</option>
              </select>
            </div>
            <div class="mb-3  col-md-6">
              <label class="form-label">City</label>
              <div class="input-group mb-1">
                <span class="input-icon">
                  <i class="fas fa-map-marker"></i></span>
                <input type="text" class="form-control input-clear-cls" id="city" placeholder="Enter Your City">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
            <div class="input-group mb-1">
              <span class="input-icon">
                <i class="fas fa-comment-alt"></i></span>
              <textarea class="form-control input-clear-cls" id="message" rows="3"></textarea>
            </div>
          </div>
          <div class="w-100 ">
            <button class="btn btn-theme btn-sm mt-2" onclick="saveCompaintData()"> Submit </button>
          </div>

        </div>
        <p class="mt-4"> Submit the above details, we will examine the complaint and get back to you as soon as
          possible. Our grievance redressal team tries to resolve your complaint in 15 working days. </p>
        <p> If the compliant remains unsolved, visit your nearest Tiffany Finance Branch and register
          your compliant there. Our team will get back to you with their final resolution. If you
          are still not satisfied with the solution, email us on: <a
            href="mailto:info@tiffanyfinance.com">info@tiffanyfinance.com</a> or call us on
          <a href="tel:+9184325-63335" class="text-primary "> 9184325-63335</a>
          .
        </p>
      </div> -->
    </div>
  </div>

  <!-- Remove the container if you want to extend the Footer to full width. -->
  <?php include ('footer.php') ?>
</body>

</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script src="js/sweat-alert.js"></script>

<script>
  function saveCompaintData() {
    var name = $("#name").val();
    var email = $("#email").val();
    var phone_number = $("#phone_number").val();
    var loan_acc_number = $("#loan_acc_number").val();
    var state = $("#state").val();
    var city = $("#city").val();
    var status = 'register';
    var message = $("#message").val();

    if (!name || !email || !phone_number || !loan_acc_number || !state || !status) {
      Swal.fire({
        text: "Please fill in all required fields. Required fields marked as *",
        icon: "error"
      });
      return;
    }

    // first_name phone email loan type desired loan amoutn address
    var requestData = {
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
      url: "addUsersData.php?action=complaintRegister",
      type: 'POST',
      data: requestData,
      success: function (response) {
        var responseJson = JSON.parse(response);
        if (responseJson.success) {
          $('.input-clear-cls').val('')
          Swal.fire({
            text: "Compalint Has Been Registered Successfully. We shortly connected with you!",
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

  function saveFeedBackData() {
    var name = $("#feedback-name").val();
    var email = $("#feedback-email").val();
    var phone_number = $("#feedback-phone_number").val();
    var loan_acc_number = $("#feedback-loan_acc_number").val();
    var state = $("#feedback-state").val();
    var city = $("#feedback-city").val();
    var message = $("#feedback-message").val();

    if (!name || !email || !phone_number || !loan_acc_number || !state) {
      Swal.fire({
        text: "Please fill in all required fields. Required fields marked as *",
        icon: "error"
      });
      return;
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

    $.ajax({
      url: "addUsersData.php?action=feedbackRegister",
      type: 'POST',
      data: requestData,
      success: function (response) {
        var responseJson = JSON.parse(response);
        if (responseJson.success) {
          $('.input-clear-cls').val('')
          Swal.fire({
            text: "Thank you for your valuable feedback!",
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

  $(document).ready(function () {
    emiCalculator()
  });
</script>