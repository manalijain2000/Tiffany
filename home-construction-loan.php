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
  <!-- <div class="container">
    <div class="menu fs-5 fw-bolder">
      <div class="menu-item"><a href="#overview">Overview</a></div>
      <div class="menu-item"><a href="#eligibility">Eligibility</a></div>
      <div class="menu-item"><a href="#document">Documents</a></div>
      <div class="menu-item"><a href="#howtoapply">How To Apply</a></div>

     
    </div>
  </div> -->
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


  <div class="container mt-5" id="eligibility">
    <div class="row feature">
      <div class="col-md-12">
        <h4 class="fw-bolder bottom-line  mb-3 text-center">Eligibility Criteria for Home Construction Loan</h4>
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

        <h4 class="fw-bolder bottom-line  mb-3 text-center">Documents Required for Home Construction Loan</h4>
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
      <h4 class="fw-bolder bottom-line mb-3 text-center">How To Apply</h4>
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
          <br>
          <a href="https://wa.me/6377965063">Through Whatsapp </a>
        </div>
      </div>
    </div>
  </div>



  <div class="container mt-5">
    <h4 class="heading"> FAQs </h4>
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