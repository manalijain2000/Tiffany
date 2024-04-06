<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loan Against Property - Tiffany Finance Private Limited</title>
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
$faqsSql = "SELECT * FROM faq_section where category = 'loan-against-property'";
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
    <div class="products-header ">
      <div class="row">
        <div class="col-md-6 p-5 ">
          <h4 class="fs-2 fw-bolder products-header-h4">Loan Aganist Property</h4>
          <p class="text-dark fs-5">Turn Your Property into Cash with Ease with our Loan Against Property </p>
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
                    <input onchange='LAPsetInputValue(this)' id="lap-amount-id" type="range" min="500000 "
                      max="50000000" value='1000000' />
                  </div>
                  <div class="d-flex justify-content-between">
                    <div>500000</div>
                    <div>50000000</div>
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
                    <input onchange='LAPsetInputValue(this)' id="lap-tenure-id" type="range" min="12" max="180"
                      value='60' />
                  </div>
                  <div class="d-flex justify-content-between">
                    <div>12 Months</div>
                    <div>180 Months</div>
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
                  <input onchange='LAPsetInputValue(this)' id="lap-interest-id" type="range" min="9" max="24" value="18" />
                </div>
                <div class="d-flex justify-content-between">
                      <div>9%</div>
                      <div>24%</div>
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
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-7">
        <p class="text-dark">Unlock the potential of your property with Tiffany Finance Property Loans, serving both
          personal and business needs. With Tiffany Finance Property Loan, you can manage to do it all including funding
          your children education, wedding expenses, medical treatment, business requirements or
          construction/renovation.
        <p class="text-dark">Whether you're salaried, self-employed, or a small to medium enterprise, we offer loans
          against all types of properties. Utilize your most valuable asset for quick and easy loans tailored to your
          requirements.
        </p>
        <p class="text-dark">Apply today via our website or contact our support team via email, chat, or phone.
          Experience a hassle-free process with minimal documentation. Reach out for queries or assistance; our team is
          here to help. </p>
      </div>
      <div class="col-md-5 text-end ">
        <div class="image-container ms-3">
          <img src="img/olap.jpg" class="img-fluid">
        </div>
      </div>
    </div>
  </div>


  <div class="container mt-5">
    <div class="row feature ">
      <h4 class=" mb-4 fw-bolder text-center bottom-line">Features & Benefits for Loan Aganist Property</h4>

      <div class="featuresandbenefits">
        <div class="text-center mt-5 mb-5">
          <img src="img/fblap.jpg" class="img-fluid me-5  ">
        </div>
        <div class="mt-5 ms-5 ">
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong> High LTV:</strong>Get up to 60% loan for residential and 70% for commercial properties.
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
            <div><strong>12-Year* Loan Tenure :</strong>Enjoy a flexible repayment period spanning up to 12 years*.

            </div>
          </div>
          <BR>
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Insurance Options: </strong>Property insurance and credit shield available for added security.
            </div>
          </div>
          <br>
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong> Versatile Loan Options :</strong> Explore various options for customization and adjustment
              according to your needs.
            </div>
          </div>
          <BR>

          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Transparent Process :</strong>No hidden fees or charges throughout the loan procedure.
            </div>
          </div>
          <br>
          <div class="d-flex align-items-start">
            <img src="img/TIF.jpg" width="25px" height="25px" class="me-2">
            <div><strong>Quick Disbursal :</strong>Smooth and timely loan approval with minimal documentation hassle.
            </div>
          </div>
        </div>
      </div>





      <p class="text-danger">
        <i>*Terms & Conditions Apply</i>
      </p>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row feature ">
      <h4 class="fw-bolder bottom-line  mb-3 text-center">Eligibility Criteria for Loan Against Property</h4>
      <p class="paragraph">We provide Loan Against Property to all the salaried,
        self-employed individuals and SMEs and there is a customized loan for each
        category you belong to. There is a product based on your needs and requirements.
        How much loan amount you can avail, depends upon the valuation of your property.
        Like, if you are mortgaging your residential property, you can get loan amount
        of 60% of the property’s value and if you are mortgaging commercial property,
        you can get loan amount of 70% of the property’s value. Apart from this, loan
        amount will depend on certain factors like your age, income, nature of work,
        the documents
        you can provide, CIBIL score, your repayment history and other obligations.
      </p>
      <div class="container mt-3 ">
        <div class="table-responsive-sm table-responsive-md">
          <table class="table table-bordered mb-0">
            <thead>
              <tr>
                <th style="background-color: #2c2e53; color :white;">Criteria </th>
                <th style="background-color: #2c2e53; color :white;">Salaried</th>
                <th style="background-color: #2c2e53; color :white;">Self-Employed </th>
                <th style="background-color: #2c2e53; color :white;">SMEs</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th style="background-color: #2c2e53; color :white;">Ownership of Property</th>
                <td>Must be Self-Occupied</td>
                <td>Must be Self-Occupied </td>
                <td>Must be Self-Occupied</td>
              </tr>
              <tr>
                <th style="background-color: #2c2e53; color :white;">Age</th>
                <td>Minimum 21 years - 65<br>
                  years at the time of loan
                  maturity</td>
                <td>Minimum 25 years - 65<br>
                  years at the time of loan
                  maturity</td>
                <td>2 Years Old</td>
              </tr>
              <tr>
                <th style="background-color: #2c2e53; color :white;">CIBIL Score</th>
                <td>650+ </td>
                <td>650+</td>
                <td>Over the last 2 years,
                  financials <br>of the firm
                  should reflect a steady
                  source of profits<br> and the
                  statements must be
                  audited and authorised<br>
                  by a Chartered
                  Accountant.</td>
              </tr>
              <tr>
                <th style="background-color: #2c2e53; color :white;">Nationality</th>
                <td>Indian and must be a
                  resident of India</td>
                <td>Indian and must be a
                  resident of India</td>
                <td>Registered as Indian SME<br>
                  and must have
                  operations in India.</td>

              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h4 class="heading">Documents Required For LAP</h4>
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
            <b>Note</b>: This is just an indicative list additional criteria and documents may be required at the time
            of
            loan application.Self-attested copy of relevant documents <sup>*</sup>
          </p>

        </div>
      </div>

    </div>


    <p>
      <b>Note</b>: This is just an indicative list. Additional criteria and documents may be required at the time of
      loan application.
    </p>
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