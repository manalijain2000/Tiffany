<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Business Loan - Tiffany Finance Private Limited</title>
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
include("db_connection.php");
// SQL query to select all products from the 'products' table
$faqsSql = "SELECT * FROM faq_section where category = 'business-loan'";
$faqs = $conn->query($faqsSql);

$conn->close();
?>

<body>
  <?php include('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/tifinay1.png" class="d-block w-100" alt="Privacy-policy">
      <h3 class="heading">Business Loan </h3>
    </div>
  </div>
  <div class="container-fluid">
    <div class="products-header-bl ">
      <div class="row">
        <div class="col-md-6 p-5 ">
          <h4 class="fs-2 fw-bolder products-header-h4">Personal Loan</h4>
          <p class="text-dark fs-6">Every Dream Has a Beginning: Let Our Personal Loan Start Yours </p>
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
    <div class="row ">
      <div class="col-md-7 ">
        
        <p class="text-dark">Our business loan serves as a vital resource for entrepreneurs, whether they're launching a new venture or expanding an existing one. With funding options of up to ₹90 lakhs*, businesses can secure the necessary capital for essential assets, equipment, and facilities. 
        </p>
        <p class="text-dark">We provide both secured and unsecured loan options, ensuring flexibility and accessibility for businesses of all sizes and risk profiles. In addition to financing initial investments, our loan covers working capital needs, including inventory management, marketing, hiring, and equipment purchases, facilitating smooth daily operations and short-term growth. 
        </p>
        <p class="text-dark">What sets our financing apart is its customization; businesses can tailor their loan according to their specific needs, whether it's through term loans, lines of credit, or equipment financing.</p>
      </div>
      <div class="col-md-5 text-end ">
        <div class="image-container ms-5">
          <img src="img/obl.jpg" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row feature">
    <h4 class=" mb-4 fw-bolder text-center bottom-line">Features & Benefits for Business Loan</h4>
    <div class="featuresandbenefits">
        <div class="text-center me-5">
          <img src="img/fbbl.jpg" class="img-fluid me-5 mt-5 ">
        </div>
        <div class="mt-5 ">
        <div class="d-flex align-items-start">
              <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
              <div><strong>Collateral options :</strong>Choose between secured and unsecured loans to match your risk tolerance.
              </div>
            </div>
          <!-- <div class="d-flex align-items-start">
              <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
              <div><strong>Customized financing :</strong>Various loan types available including term loans, working capital loans, equipment loans, and trade finance tailored as per your needs.
              </div>
            </div> -->
            <div class="d-flex align-items-start mb-2">
              <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
              <div><strong>Versatile Repayment Periods :</strong>Repay over 12 to 60 months for added flexibility.</div>
            </div>
            <div class="d-flex align-items-start">
              <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
              <div><strong>Loan Amounts :</strong>Secure funding up to ₹90 lakhs* based on your credit and business profile.</div>
            </div>
            <div class="d-flex align-items-start mb-2">
              <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
              <div><strong>Competitive Interest Rates :</strong>Enjoy rates between 16% to 35% to minimize borrowing costs.</div>
            </div>
            <div class="d-flex align-items-start">
              <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
              <div><strong>Efficient Approval Process :</strong>Experience quick approval and streamlined procedures for prompt access to funds. 
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-5" id="eligibilty">
    <div class="row feature">
      <div class="">
        <div class=" p-2 h-100">
        
        <h4 class="fw-bolder bottom-line  mb-5 text-center">Eligibility Criteria for Business Loan</h4>
          <ul style="list-style-type:disc;">
            <li>
              <b> Nationality and Age Eligibility</b>: You must be an Indian resident with minimum 21 years old when
              applying for the loan and no older than 65 at the time the loan matures.
            </li>
            <li>
              <b>Eligible entities include</b>
              <ol>
                <li>Entities: Partnership Firms, Trusts, Limited Liability Partnerships (LLPs) and Private Limited
                  Companies.</li>
                <li> Self-employed professionals - Chartered Accountants, Doctors, Lawyers, Architects, Company
                  Secretaries and more </li>
                <li> Self-employed non-professionals – Retailers, Manufacturers, Traders, Sole Proprietors and Service
                  Providers </li>
              </ol>
            </li>
            <li>
              <b>Credit score:</b> Credit score should be at least 650 or above.
            </li>
            <li>
              <b>Business Annual Turnover:</b>Turnover of minimum Rs.10 lakhs is required annually
            </li>
            <li>
              <b>Business Vintage</b> Applicants must have a business vintage of minimum of 2 years with profits.
            </li>
            <li>
              <b>Loan Repayment Tenure : </b>You get maximum 60 months to repay the loan
            </li>
            <li>
              <b>Business Experience : </b>You should hold at least 3-year experience in your current business at same
              location with stable profits for last 2 years
            </li>
          </ul>
        </div>
      </div>
      <div class="">
        <div class=" p-2 h-100 feature" id="document">
        <h4 class="fw-bolder bottom-line  mb-5 text-center">Documents Required for Two Wheeler Loan</h4>
        <br> 
        <div class="accordion" id="accordionExample">
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
                    <li>Aadhar Card</li>
                    <br>
                    <span class="text-dark mt-3">( <sup>*</sup> Any 2)</span>
                  </ul>
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

                  <ul style="list-style-type:disc;">
                    <li>Qualification Certificate/Certificate of Practice (COP)</li>
                    <li>Shop Act License/ MOA & AOA/ Sales Tax/ Vat registration/ Partnership Deed</li>

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
        </div>
      </div>
      <p class="text-danger">
        <i>*Terms & Conditions Apply</i>
      </p>
      <span class="text-dark">
      <b>Note:</b> This is just an indicative list. Additional criteria and documents may be required at the time of
        loan application.Requirement of business loan documents might vary according to the scheme chosen
        <sup>*</sup>Requirement of business loan documents might vary according to the scheme chosen
        <sup>*</sup> </span>
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
          <a  class="loan-apply-btn <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"  href="apply-now.php">Apply Now</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/call.png" class="mt-3 mb-2" width="40px" height="40px">
          <br>
          <br>
          <a href="tel:1800-890-6544" >You can call us on our customer care number @ 1800-890-6544</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/email.png" class="mt-3 mb-4" width="50px" height="40px">
          <br>
          
          <a href="mailto:support@tiffanyfinance.com" >Email us on support@tiffanyfinance.com and we will get in touch with
            you.</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="how-to-apply-box text-center">
          <img src="img/whatsappp.png" class="mt-3" width="50px" height="50px" >
          <br>
          <br>
          <a href="https://wa.me/6377965063" >Through Whatsapp </a>
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
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $faq['faq_id'] ?>"
                        aria-expanded="false" aria-controls="collapseOne<?= $faq['faq_id'] ?>"> <?= $faq['question'] ?> </button>
                </h2>
                <div id="collapseOne<?= $faq['faq_id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?= $faq['faq_id'] ?>"
                    data-bs-parent="#accordionExample<?= $faq['faq_id'] ?>">
                    <div class="accordion-body">
                        <p class="paragraph"> <?= $faq['answer'] ?> </p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
  </div>
  <!-- Remove the container if you want to extend the Footer to full width. -->
  <?php include('footer.php') ?>
</body>

</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>

<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/commonEmi.js"></script>
<script>
  $(document).ready(function() {
    LAPemiCalculator()
    emiCalculator()
  });
</script>