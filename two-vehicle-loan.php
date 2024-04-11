<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Two-Wheeler Loan- Tiffany Finance Private Limited</title>
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

<?php
// Include the database connection file
include ("db_connection.php");
// SQL query to select all products from the 'products' table
$faqsSql = "SELECT * FROM faq_section where category = 'commercial-vehicle-loan'";
$faqs = $conn->query($faqsSql);

$conn->close();
?>

<body>
  <?php include ('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/tifinay1.png" class="d-block w-100" alt="Privacy-policy">
      <h3 class="heading">Two-Wheeler Loan</h3>
    </div>
  </div>
  <div class="container-fluid">
    <div class="products-header-twl ">
      <div class="row">
        <div class="col-md-6 p-5 ">
          <h4 class="fs-2 fw-bolder products-header-h4">Two-Wheeler Loan</h4>
          <p class="text-dark fs-6">Feel the Freedom: Let Our Two-Wheeler Loan Be Your Wings </p>
          <a class="product-apply-now <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
            href="apply-now.php">Apply Now</a>
        </div>
        <div class="col-md-6 col-lg-6 p-5">
          <div class="product-emi-box ps-3 pt-4">
            <h3 class="fs-4 fw-bolder">Calculate EMI</h3>
            <div class="row">
              <div class="col-md-6 p-4">
                <div class="wrapper mb-2 ">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="mb-0 paragraph me-5">Amount</p>
                    <div class="input-group w-fit-200">
                      <input onfocusout="LAPsetInputUsFormat()" onfocusin="LAPsetInputNormalForm()" type="text"
                        value="10,00,000" id='lap-set-amount-loan-against-property'
                        class="form-control form-control-sm">
                      <div class="input-group-append  d-flex">
                        <span class="input-group-text">RS </span>
                      </div>
                    </div>
                  </div>
                  <div class="range">
                    <input onchange='LAPsetInputValue(this)' id="lap-amount-id" type="range" min="10000  "
                      max="150000" value='1000000' />
                  </div>
                  <div class="d-flex justify-content-between">
                    <div>10000 </div>
                    <div>150000</div>
                  </div>
                </div>
                <br>
                <div class="wrapper mb-2 ">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="mb-0 paragraph me-5">Tenure</p>
                    <div class="input-group w-fit-200">
                      <input type="text" onfocusout='LAPsetInputRangeVal(this)' value="60"
                        id='lap-set-tenur-loan-against-propertye' class="form-control form-control-sm">
                      <div class="input-group-append d-flex">
                        <span onclick='LAPconvertMonthToYear(this)' id="lap-month-id"
                          class="input-group-text text-white bg-dark">Mo</span>

                      </div>
                    </div>
                  </div>
                  <div class="range">
                    <input onchange='LAPsetInputValue(this)' id="lap-tenure-id" type="range" min="12" max="48"
                      value='60' />
                  </div>
                  <div class="d-flex justify-content-between">
                    <div>12 Months</div>
                    <div>48 Months</div>
                  </div>
                </div>
                <br>
                <div class="wrapper mb-2 ">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="mb-0 paragraph me-5">Interest</p>
                    <div class="input-group w-fit-200">
                      <input type="text" onfocusout='LAPsetInputRangeVal(this)' value="18"
                        id='lap-set-interest-loan-against-property' class="form-control form-control-sm">
                      <div class="input-group-append d-flex">
                        <span class="input-group-text ">% </span>
                      </div>
                    </div>
                  </div>
                  <div class="range">
                    <input onchange='LAPsetInputValue(this)' id="lap-interest-id" type="range" min="16" max="30"
                      value="18" />
                  </div>
                  <div class="d-flex justify-content-between">
                    <div>16%</div>
                    <div>30%</div>
                  </div>
                </div>
              </div>
              <div class=" col-lg-6 p-4">
                <img src="img/calculator.png" class="product-emi-box-image">
                <br>
                <br>
                <h3 class="mt-4 fs-4 ms-1">Your EMI (Monthly)</h3>
                <br>
                <div class="d-flex justify-content-start">
                  <img src="img/rupee.jpg" width="40px" height="40px">
                  <p id="lap-total-payble-amt-id" class="fw-bold mb-0 paragraph fs-4 mt-1">343420</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid mt-4">
    <div class="menu">
      <div class="menu-item"><a href="#overview" class="fw-bolder fs-4 ms-3">Overview</a></div>
      <div class="menu-item"><a href="#eligibilty" class="fw-bolder fs-4">Eligibility</a></div>
      <div class="menu-item"><a href="#document" class="fw-bolder fs-4">Document</a></div>
      <div class="menu-item"><a href="#howtoapply" class="fw-bolder fs-4">How To Apply</a></div>

      <!-- Add more items here -->
    </div>
  </div>
  <div class="container mt-5" id="overview">
    <div class="row">
      <div class="col-md-7 ">
        
        <p class="text-dark">Want To Buy your Dream New Bike or Scooter? We offer a quick two-wheeler loan at attractive interest rates to make your commute comfortable and faster. Now, no need to wait for public transports to commute, ride and travel at your own convenience whenever and wherever you want. 
        </p>
        <p class="text-dark">You can explore a bike or scooter of your choice and use our Two-Wheeler EMI Calculator to plan your budget accordingly. We provide a flexible tenure from 12 months to 60 months for repayment of your EMIs so that you can very comfortably repay without any burden.
        </p>
        <p class="text-dark">Be the owner of your dream bike and apply today at Tiffany Finance for your two-wheeler loan. </p>
      </div>
      <div class="col-md-5 text-end mt-4 ">
        <div class="image-container ms-5">
          <img src="img/otvl.jpg" class="img-fluid">
        </div>
      </div>
    </div>
  </div>



  <div class="container mt-5">
    <div class="row">
      <h4 class="heading mb-3 text-center">Features & Benefits for Two Wheeler Loan</h4>
      <div class="featuresandbenefits">
        <div class="text-center ">
          <img src="img/fbtwl.jpg" class="img-fluid me-5 mt-5 ">
        </div>
        <div class="mt-5">
          <p class="text-dark fs-6">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">Flexible Loan Tenure from 12 months to 60
            months
          </p>
          <p class="text-dark fs-6">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">Attractive Interest Rates ranging from 12% to
            22%
          </p>

          <p class="text-dark">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">Fast Processing
          </p>
          <p class="text-dark">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">Quick Loan Approval
          </p>
          <p class="text-dark">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">Loan amount starting from ₹50,000* onwards up
            to ₹2 lakhs
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5" id="eligibilty">
    <div class="row feature">

      <h4 class="fw-bolder bottom-line  mb-5 text-center">Eligibility Criteria for Two-Wheeler Loan</h4>
      <div class="col-md-12">
        <div class=" p-2">

          <p class="text-dark">
            At Tiffany Finance, we understand that how much a
            two-wheeler matters at every household in India,
            hence owning one gives a lot of comfort, convenience and
            a sense of independence. Looking at eligibility criteria is important because
            if you meet all the criteria, your chances of loan approval are maximized. </p>
          <p class="text-dark">Check whether you are eligible for a Two-Wheeler Loan from below checklist:</p>
          <ul style="list-style-type:disc;">
            <li> You must be an Indian resident</li>
            <li> Your age should be at least 18 years when you apply for loan and maximum 65 years at the timeyour loan
              matures.</li>
            <li> Co-applicant is compulsory if your age is between 18-20 years.</li>

            <li> Your CIBIL Score matters a lot, a CIBIL Score above 650 is qualified for the loan.</li>


          </ul>
        </div>
      </div>


    </div>
    <div class="row mt-5 feature" id="document">
      <div class="col">
        <h4 class="fw-bolder bottom-line  mb-5 text-center">Documents Required for Two Wheeler Loan</h4>
        <br>
        <div class="accordion mt-3" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                Photo Identity Proof <sup class="ms-2 fs-4 mt-3">*</sup>
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <ul style="list-style-type:disc;">
                  <li>Passport</li>
                  <li>Pan Card</li>
                  <li>Voter Identity Card</li>
                  <li>Driving License</li>
                  <li>Aadhar Card </li>
                </ul>
                <span class="text-dark mt-3">( <sup>*</sup> Any 2)</span>

              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Address Proof <sup class="ms-2 fs-4 mt-3">*</sup>
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <ul style="list-style-type:disc;">
                  <li>Passport</li>
                  <li>Electricity Bill</li>
                  <li>Bank Account Statement</li>
                  <li>Telephne Bill</li>
                  <li>Ration Card</li>
                  <li>Aadhaar Card</li>
                  <li>Sale Deed/Property Purchase Agreement (for owned properties)</li>
                  <li>Driving License</li>
                  <br>
                  <span class="text-dark mt-3">( <sup>*</sup> Any 2)</span>

                </ul>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Income Proof
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <ul style="list-style-type:disc;">
                  <li>Bank Statement</li>
                  <br>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Business Proof
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
              data-bs-parent="#accordionExample">
              <div class="accordion-body">


                <ul style="list-style-type:disc;">
                  <li>Qualification Certificate/Certificate of Practice (COP)</li>
                  <li>Shop Act License/ MOA & AOA/ Sales Tax/ Vat registration/ Partnership Deed</li>

                </ul>
              </div>
            </div>
          </div>
        </div>
 <p class="text-danger mt-3">
          <i>*Terms & Conditions Apply</i>
        </p>
        <span class="text-dark">
          <b>Note:</b> This is just an indicative list additional criteria and documents may be required at the time of
          loan
          application.Self-attested copy of relevant documents <sup class="">*</sup>

        </span>
        
      </div>

    </div>
  </div>
  <div class="container mt-5" id="howtoapply">
    <div class="row feature ">
      <h4 class="fw-bolder bottom-line mb-5 text-center">How To Apply</h4>
      <p class="text-dark mt-3 mb-5">Process of applying for loan against property is easy and fast with us. Some of the
        ways
        you can apply for loan are :</p>
      <br>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/website.png" class="mt-3" width="50px" height="50px">
          <br>

          <p class="text-dark mt-2 ">Through website</p>
          <a class="loan-apply-btn <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
            href="apply-now.php">Apply Now</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/call.png" class="mt-3 mb-2" width="40px" height="40px">
          <br>
          <br>
          <a href="tel:1800-890-6544">You can call us on our customer care number @ 1800-890-6544</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/email.png" class="mt-3 " width="50px" height="40px">
          <br>
          <br>
          <a href="mailto:support@tiffanyfinance.com">Email us on support@tiffanyfinance.com and we will get in touch
            with
            you.</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/whatsappp.png" class="mt-3" width="50px" height="50px">
          <br>
          <br>
          <a href="https://wa.me/6377965063">Through Whatsapp </a>
        </div>
      </div>
    </div>
  </div>


  <div class="container mt-5">
    <h4 class="heading mb-5"> FAQs </h4>
    <?php foreach ($faqs as $faq) { ?>
      <div class="accordion mb-2" id="accordionExample<?= $faq['faq_id'] ?>">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne<?= $faq['faq_id'] ?>">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseOne<?= $faq['faq_id'] ?>" aria-expanded="false"
              aria-controls="collapseOne<?= $faq['faq_id'] ?>">
              <?= $faq['question'] ?>
            </button>
          </h2>
          <div id="collapseOne<?= $faq['faq_id'] ?>" class="accordion-collapse collapse"
            aria-labelledby="headingOne<?= $faq['faq_id'] ?>" data-bs-parent="#accordionExample<?= $faq['faq_id'] ?>">
            <div class="accordion-body">
              <p class="paragraph">
                <?= $faq['answer'] ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <!-- Remove the container if you want to extend the Footer to full width. -->
  <?php include ('footer.php') ?>
</body>

</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/commonEmi.js"></script>
<script>
  $(document).ready(function () {
    LAPemiCalculator()
    emiCalculator()
  });
</script>