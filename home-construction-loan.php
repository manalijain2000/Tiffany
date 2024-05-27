<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Construction Loan - Tiffany Finance Private Limited</title>
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
$faqsSql = "SELECT * FROM faq_section where category = 'home-construction-loan'";
$faqs = $conn->query($faqsSql);

$conn->close();
?>

<body>
  <?php include ('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/tifinay1.png" class="d-block w-100" alt="Privacy-policy">
      <h3 class="heading">Home Construction Loan</h3>
    </div>
  </div>
  
  <div class="container-fluid">
    <div class="products-header-hcl ">
      <div class="row">
        <div class="col-md-6 p-5 ">
          <h4 class="fs-2 fw-bolder products-header-h4">Home Construction Loan</h4>
          <p class="text-dark fs-6">Crafting Homes, Crafting Dreams: Building Your Dream Home Together	 </p>
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
                  <img src="img/rupee.jpg" width="40px" height="33px">
                  <p id="lap-total-payble-amt-id" class="fw-bold mb-0 paragraph fs-4 ">343420</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

   <!-- Dynamic ready to fullfill dreams -->
   <?php include('enquiry.php') ?>
   <!-- end -->
   
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
        
        <p class="text-dark">Our specialized home construction loan transforms your dream home into reality. Our construction loan is tailored for new builds, releasing funds in stages to align with construction progress. 
        </p>
        <p class="text-dark">You pay interest only on the amount used per phase, easing financial management. This loan caters to diverse needs: plot purchase, custom design, material procurement, remodeling, upgrades, tear-downs, rebuilds, and masonry services.
        </p>
        <p class="text-dark">Benefit from competitive rates, minimal documentation, fast approvals, and quick disbursals. Use our EMI Calculator for effective planning. Start building your dream home today. Contact us for seamless construction financing. </p>
       
      </div>
      <div class="col-md-5 text-end mt-3 ">
        <div class="image-container ms-5">
          <img src="img/ohcl.jpg" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row feature">
      <h4 class=" mb-4 fw-bolder text-center bottom-line">Features & Benefits for Home Construction Loan</h4>
    </div>
    <div class="featuresandbenefits">
        <div class="text-center mt-5 mb-5">
          <img src="img/fbhcl.jpg" class="img-fluid me-5  ">
        </div>
        <div class="mt-5 ms-5 ">
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Phased Disbursements  :</strong>Funds released gradually as construction progresses.
            </div>
          </div>
         
          <!-- <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Interest-Only Payments :</strong>During construction, pay interest only on the disbursed
              amount, aiding in managing initial expenses.
            </div>
          </div> -->
          <BR>
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Interest-Only Payments  :</strong>Pay interest only on the disbursed funds and ease upfront costs.
             
            </div>
          </div>
          <BR>
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Flexible Loan Tenure  :</strong>Up to 12 years for building your dream home.
            </div>
          </div>
          <br>
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Top-Up Options :</strong>Access additional funds to cover rising construction costs.
            </div>
          </div>
          <BR>
          
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Loan Amount  :</strong>Starting from ₹2 lakhs up to ₹30 lakhs*.
            </div>
          </div>
          <br>
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Attractive Interest Rates :</strong>Beginning at 15% per annum*.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container mt-5" id="eligibilty">
    <div class="row feature">
      <div class="col-md-12">
        <h4 class="fw-bolder bottom-line  mb-5 text-center">Eligibility Criteria for Home Construction Loan</h4>
        <br>
        <ul style="list-style-type:disc;">
          <li>Your age should be 21 at the time of loan application and 65 at the time of loan maturity. </li>
          <li>Minimum loan tenure is 2 year and maximum are 12 years. </li>
          <li>For salaried individuals, ₹30,000 salary monthly and a minimum of three-year work experience is required.
          </li>
          <li>For self-employed professionals, business vintage of at least three year is required. </li>
          <li>CIBIL Score must be 650 or above.</li>
          <li>Minimum loan amount value is ₹2 lakhs</li>
        </ul>
      </div>
    </div>
  </div>


  <div class="container mt-5" id="document">
    <div class="row feature">
      <div class="col">

        <h4 class="fw-bolder bottom-line  mb-4 text-center">Documents Required for Home Construction Loan</h4>
        <br>

      </div>
    </div>
    <div class="row">

      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
              aria-expanded="true" aria-controls="collapseOne">
              Photo Identity Proof
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
              </ul>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Address Proof
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
                <li>Copy of original Sale deed</li>
                <li>Aadhaar Card</li>
                <li>Allotment-Possession Letter</li>
                <li>Driving License</li>
                <li>NOC from Society</li>

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
                <li>Last 6 months Bank Statement(Mandatory)</li>
                <li>Latest ITR <sup>*</sup></li>
                <li>Latest Audited Financial <sup>*</sup></li>
                <li>Latest GST Returns <sup>*</sup></li>
              </ul>
              ( * If available)
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
              <h5>Any Business Registration Proof</h5>
              <br>
              <ul style="list-style-type:disc;">
                <li>Shop Act Certificate</li>
                <li>MSME Act Certificate</li>
                <li>GST Registration</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              Property Proof
            </button>
          </h2>
          <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <ul style="list-style-type:disc;">
                <li>Title Deed</li>
                <li>Latest Tax Receipt</li>
                <li>Sanction Plan/Approved Map</li>
              </ul>
            </div>
          </div>
        </div>


      </div>
<p class="text-danger mt-3">
        <i>*Terms & Conditions Apply</i>
      </p>
      <p class="text-dark mt-3">
        <b>Note</b>: This is just an indicative list additional criteria and documents may be required at the time of
        loan application.Self-attested copy of relevant documents <sup>*</sup>
      </p>
      
    </div>
  </div>

  <div class="container mt-5" id="howtoapply">
    <div class="row feature ">
      <h4 class="fw-bolder bottom-line mb-4 text-center">How To Apply</h4>
      <p class="text-dark mt-3 mb-5">Process of applying for loan against property is easy and fast with us. Some of the
        ways
        you can apply for loan are :</p>
      <br>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/website.png" class="mt-3" width="50px" height="50px">
          <br>

          <p class="text-dark mt-3 ">Through Website</p>
          <a class="loan-apply-btn <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
            href="apply-now.php">Apply Now</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/call.png" class="mt-3 mb-4" width="40px" height="40px">
          <br>
          
          <a href="tel:1800-890-6544">You can call us on <br>our customer care number <br>@ 1800-890-6544</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-2">
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

          <p class="text-dark mt-2 ">Through Whatsapp</p>
          <a class="loan-apply-btn "
            href="https://wa.me/6377965063">Apply Now</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5 feature">
  <h4 class="fw-bolder bottom-line  mb-5 text-center">FAQ</h4>
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
  <!-- End of .container -->
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