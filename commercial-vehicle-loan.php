<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commercial Vehicle Loan- Tiffany Finance Private Limited</title>
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
      <h3 class="heading">Commercial Vehicle Loan</h3>
    </div>
  </div>
  <div class="container-fluid">
    <div class="products-header-cvl ">
      <div class="row">
        <div class="col-md-6 p-5 ">
          <h4 class="fs-2 fw-bolder products-header-h4">Commercial Vehicle Loan </h4>
          <p class="text-dark fs-6">On the Road to Prosperity: Let Our CV Loan Accelerate Your Growth </p>
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
                        <span class="input-group-text">Rs </span>
                      </div>
                    </div>
                  </div>
                  <div class="range">
                    <input onchange='LAPsetInputValue(this)' id="lap-amount-id" type="range" min="10000  " max="150000"
                      value='1000000' />
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
  <?php include ('enquiry.php') ?>
  <!-- end -->

  <div class="container mt-4">
    <div class="menu">
      <div class="menu-item"><a href="#overview" class="nav-link1 fw-bolder fs-5 active">Overview</a></div>
      <div class="menu-item"><a href="#eligibilty" class="nav-link1 fw-bolder fs-5">Eligibility</a></div>
      <div class="menu-item"><a href="#document" class="nav-link1 fw-bolder fs-5">Documentation</a></div>
      <div class="menu-item"><a href="#howtoapply" class="nav-link1 fw-bolder fs-5">How To Apply</a></div>
      <!-- Add more items here -->
    </div>
  </div>
  <div class="container mt-5" id="overview">
    <div class="row ">
      <div class="col-md-7 ">

        <p class="text-dark">Self-Start your journey with your own commercial vehicle and grab opportunity now to earn
          your independent income. You don’t have to be dependent on anyone to make your living, freedom and flexibility
          is what you can get with your own commercial vehicle.
        </p>
        <p class="text-dark">If you are self-employed and have your own transport business or are planning to start
          something of your own, Tiffany Finance’s commercial vehicle loan is best for you as we offer loan for various
          types of commercial vehicles from light to heavy like Autos, Mini Trucks and Tractors.
        </p>
        <p class="text-dark">Self-Employes individuals can apply this loan to buy a new vehicle, to buy a used vehicle
          and to refinance of commercial vehicle. </p>
      </div>
      <div class="col-md-5 text-end mt-4 ">
        <div class="image-container ms-5">
          <img src="img/ocvl.jpg" class="img-fluid">
        </div>
      </div>
    </div>
  </div>


  <div class="container mt-5">
    <div class="row feature ">
      <h4 class=" mb-4 fw-bolder text-center bottom-line">Features & Benefits for Commercial Vehicle Loan</h4>
      <div class="featuresandbenefits">
        <div class="text-center mt-5 mb-5">
          <img src="img/fbcvl.jpg" class="img-fluid  ">
        </div>
        <!-- <div class=" text-center mt-5 mb-5">
          <img src="img/PL5.jpg" class="img-fluid me-5 ">
        </div> -->
        <div class="mt-5 fbc">
          <div class="d-flex align-items-start mb-4 ">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong> Flexible Loan Tenure and Amounts : </strong> Loan tenure up to 60 months with amounts starting
              from ₹50,000* onwards up to ₹5 lakhs.
            </div>
          </div>

          <div class="d-flex align-items-start mb-4">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong> Attractive Interest Rates : </strong> Enjoy rates ranging from 12% to 22%.
            </div>
          </div>

          <div class="d-flex align-items-start mb-4">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong> Comfortable EMI Installments : </strong> Tailored as per your feasibility.
            </div>
          </div>

          <div class="d-flex align-items-start mb-4">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong> Inclusive Loan Options : </strong> Available for first-time purchasers and buyers with no
              income
              proof.
            </div>
          </div>

          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong> Additional Benefits : </strong> Vehicle insurance cover options available and loans up to 90%
              of
              the asset's value.
            </div>
          </div>
          <br>
          <!-- <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Quick Disbursal :</strong>Smooth and timely loan approval with minimal documentation hassle.
            </div>
          </div> -->
        </div>
      </div>
      <!-- <p class="text-danger">
        <i>*Terms & Conditions Apply</i>
      </p> -->
    </div>
  </div>
  <div class="container mt-5" id="eligibilty">
    <div class="row feature ">
      <h4 class="fw-bolder bottom-line  mb-5 text-center">Eligibility Criteria for Commercial Vehicle Loan</h4>
      <p class="paragraph">Whether you're expanding your fleet or purchasing your first commercial vehicle, our loan options are
          designed to make the process easy and affordable. To ensure you can access the financing you need, we've
          outlined the key eligibility criteria for both new and used commercial vehicle loans below:</p>
      <div class="container mt-3 ">
        <h5 class="fw-bolder">Eligibility for New Commercial Vehicle Loan:</h5><br>
        
        <div class="table-responsive-sm table-responsive-md">
          <table class="table table-bordered mb-0">
            <thead>
              <tr>
                <th style="background-color: #2c2e53; color :white;">Criteria </th>
                <th style="background-color: #2c2e53; color :white;">Details</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Employment Requirement</th>
                <td>Salaried: 2 years employment; Self-employed: 2 years business experience</td>

              </tr>
              <tr>
                <th>Employment Type (Salaried)</th>
                <td>Private/Limited companies, Partnership companies, trusts, associations, societies</td>

              </tr>
              <tr>
                <th>Company Operation Duration</th>
                <td>Minimum 2 years</td>

              </tr>
              <tr>
                <th>Financial Statements</th>
                <td>Minimum 2 years of audited financial statements</td>


              </tr>
              <tr>
                <th>Guarantors Requirement</th>
                <td>May be required; waived with good CIBIL Score and repayment history</td>


              </tr>
              <tr>
                <th>Residence Requirement</th>
                <td>Minimum 2 years at current address</td>


              </tr>
              <tr>
                <th>Driving Experience (First-Time Purchasers)</th>
                <td>Minimum 3 years</td>


              </tr>
              <tr>
                <th>Property Requirement (Specific Vehicle Loans)</th>
                <td>Own house required for light commercial vehicles, multi-utility vehicles, and tractor loans</td>


              </tr>
            </tbody>
          </table>
        </div>
        <br>
        <h5 class="fw-bolder">Eligibility for Used Commercial Vehicle Loan:</h5><br>
        <div class="container mt-3 d-flex justify-content-center">
        <div class="table-responsive-sm table-responsive-md w-70">
          <table class="table table-bordered mb-0">
            <thead>
              <tr>
                <th style="background-color: #2c2e53; color :white;">Criteria </th>
                <th style="background-color: #2c2e53; color :white;">Details</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Prior Experience</th>
                <td>3-5 years running commercial vehicles</td>

              </tr>
              <tr>
                <th>Credit History</th>
                <td>Good credit history and satisfactory repayment track</td>

              </tr>
              <tr>
                <th>Residence Stability</th>
                <td>Stability in current place (city, village, town)</td>

              </tr>
              <tr>
                <th>Credit Policies</th>
                <td>Must fulfill Tiffany Finance credit policies</td>


              </tr>
              <tr>
                <th>Vehicle Ownership</th>
                <td>Must own minimum 2 vehicles for at least one year</td>


              </tr>



            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row mt-5 feature" id="document">

      <h4 class="fw-bolder bottom-line  mb-5 text-center">Documents Required for Commercial Vehicle Loan</h4>
      <br>

      <div class="accordion mt-3" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
              aria-expanded="true" aria-controls="collapseOne">
              Photo Identity Proof <sup class="ms-2 fs-4 mt-3"></sup>
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
              <!-- <span class="text-dark mt-3">( <sup>*</sup> Any 2)</span> -->

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
              data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Address Proof <sup class="ms-2 fs-4 mt-3"></sup>
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
                <!-- <span class="text-dark mt-3">( <sup>*</sup> Any 2)</span> -->

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
      <p class="text-dark mt-3">
        <b>Note</b>: This is just an indicative list additional criteria and documents may be required at the time of
        loan application.Self-attested copy of relevant documents.
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
          <a href="mailto:customercare@tiffanyfinance.com">Email us on customercare@tiffanyfinance.com and we will get
            in touch
            with
            you.</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/whatsappp.png" class="mt-3" width="50px" height="50px">
          <br>

          <p class="text-dark mt-2 ">Through Whatsapp</p>
          <a class="loan-apply-btn " href="https://wa.me/6377965063">Apply Now</a>
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