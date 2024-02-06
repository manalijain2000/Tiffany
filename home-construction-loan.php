<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Construction Loan - Tiffany Finance Private Limited</title>
   <link rel="shortcut icon" href="img/dark-logo-sm.png">
 <link rel="stylesheet" href="style.css">
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
$faqsSql = "SELECT * FROM faq_section where category = 'home-construction-loan'";
$faqs = $conn->query($faqsSql);

$conn->close();
?>

<body>
  <?php include('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/about.jpg" class="d-block w-100" alt="Privacy-policy">
      <h3 class="heading">Home Construction Loan</h3>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row align-items-center">
      <div class="col-md-8">
        <p>Our home construction loan makes your dream home a reality. Unlike traditional mortgages for existing homes,
          a construction loan is tailored for building a brand-new house from the scratch. It works in stages, with
          funds released at every stage of construction. You don’t have to manage a lot of funds together as you get
          funds in installments as per your requirement. You pay interest only on the amount you've borrowed for each
          construction phase. With our home construction loan, you can fulfill all your financial needs like purchasing
          a new plot, customdesigned construction, procurement of raw materials, re-modelling, upgrades, complete
          tear-down and rebuild, covering the costs of masonry services and more. Get competitive interest rates with
          minimum documentation, fast approvals and quick disbursals so that you don’t get any hurdles in between your
          construction. Use our EMI Calculator and contact us today</p>
      </div>
      <div class="col-md-4 text-end">
        <img src="img/homeconstructin.webp" class="w-70" alt="">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <h4 class="heading mb-4 text-center">Features & Benefits of Home Construction Loan</h4>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Phased Disbursements</h5>
            <p> Funds are released in stages as the construction progresses, ensuring that money is available when
              needed</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Interest-Only Payments </span>
            </h5>
            <p> During construction, you often pay interest only on the disbursed amount, which can help manage
              early-stage expenses.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Flexible Loan Tenure</h5>
            <p>Construct the home you want with flexible tenure of up to 12 years.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Top-Up Options on Existing Loan </h5>
            <p>Construction costs can increase anytime, so these rising costs can develop the need for more funds. You
              can get our top up loan and refinance your current loan </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Multiple payment modes</h5>
            <p>You can pay your EMIs through E-NACH/ACH/ECS and various other modes.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Customized Loan Options</h5>
            <p> Our offerings are tailored to meet the unique needs of your construction projects. </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Loan amount</h5>
            <p>We offer loan amount starting @ ₹2 lakhs up to ₹30 lakhs <span class="text-danger">*</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Attractive interest rates</h5>
            <p>Get interest rates starting @15% per annum <span class="text-danger">*</span>
            </p>
          </div>
        </div>
      </div>
      <p class="text-danger">
        <i>*Terms & Conditions Apply</i>
      </p>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">


        <h4 class="heading">Eligibility Criteria for Home Construction Loan</h4>
        <ul>
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


  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <h4 class="heading">Documents Required for Home Construction Loan</h4>
        <p>Below is the list of documents required for home construction loan: </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="card p-2 h-100">
          <h5>KYC Documents</h5>
          <ul>
            <li>PAN Card is compulsory</li>
            <li>Identity Proof: Passport, Aadhar Card, Driving License, Voter ID, PAN Card</li>
            <li>Address Proof: Rent Agreement, Utility Bills, Passport, Aadhar Card, Voter ID, Driving License</li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-2 h-100">
          <h5>Income Proof</h5>
          <span>Salaried</span>
          <ul>
            <li>Form 16</li>
            <li>Salary Certificate</li>
            <li>Salary Slips of last 3 months</li>
          </ul>
          <span>Self- Employed</span>
          <ul>
            <li>GST Returns/ Income Tax Returns</li>
            <li>Audited financial statements of last 3 years</li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-2 h-100">
          <h5>Other Documents</h5>
          <ul>
            <li>Tiffany Finance Loan Application Form filled and signed by the borrower</li>
            <li>Passport size photographs</li>
            <li>Cheque for processing fee</li>
            <li>Bank Statement covering last 6 months</li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card p-2 h-100">
          <h5>Property Documents</h5>
          <ul>
            <li>Property Title Deeds</li>
            <li>Evidence of a Clear Title with No Encumbrances</li>
            <li>Copy of the Building Plans Approved by Local Authorities</li>
            <li>Construction Cost Estimate Prepared by an Architect or Civil Engineer</li>
          </ul>
        </div>
      </div>
      <p class="text-danger">
        <i>*Terms & Conditions Apply</i>
      </p>
      <p>
        <b>Note</b>: This is just an indicative list. Additional criteria and documents may be required at the time of
        loan application
      </p>
    </div>
  </div>

  <div class="container">
    <h4 class="heading">EMI Calculator for Home Construction Loan</h4>
    <p>Our Home Construction Loan EMI Calculator is a versatile tool that empowers you to make informed financial
      decisions when seeking a construction loan. It simplifies the loan planning process and helps ensure that the loan
      is aligned with your financial goals</p>
    <p>You can use the calculator to determine the loan amount that you can comfortably afford based on your monthly
      budget.</p>
    <div class=" mt-5">
      <div class="modal-content pb-3 mb-4">
        <div class="modal-header">
          <!-- <h5 class="bg-danger text-white">Insert these values in calculator – 2 lakhsto 30 lakhs, 2 yearsto 12 years,
            15-24% </h5> -->
          <h4>EMI Calculator</h4>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        </div>
        <div class="text-center">
          <!-- <div class="container">
            <div class="container mt-3">
              <div class="row">
                <div class="col-md-7">
                  <div class="wrapper mb-2 ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <p class="mb-0">Amount</p>
                      <div class="input-group w-fit-200">
                        <input disabled=true onfocusout="setInputRangeLoanAgainstProperty()" type="text" value="1000000"
                          id='set-amount-loan-against-property' class="form-control form-control-sm">
                        <div class="input-group-append  d-flex">
                          <span class="input-group-text">RS </span>
                        </div>
                      </div>
                    </div>
                    <div class="range">
                      <input type="range" />
                    </div>
                  </div>
                  <div class="wrapper mb-2 ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <p class="mb-0">Tenure</p>
                      <div class="input-group w-fit-200">
                        <input disabled=true type="text" value="60" id='set-tenur-loan-against-propertye'
                          class="form-control form-control-sm">
                        <div class="input-group-append d-flex">
                          <span class="input-group-text">Mo </span>
                        </div>
                      </div>
                    </div>
                    <div class="range">
                      <input type="range" />
                    </div>
                  </div>
                  <div class="wrapper mb-2 ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <p class="mb-0">Interest</p>
                      <div class="input-group w-fit-200">

                        <input disabled=true type="text" value="18" id='set-interest-loan-against-property'
                          class="form-control form-control-sm">
                        <div class="input-group-append d-flex">
                          <span class="input-group-text ">% </span>
                        </div>
                      </div>
                    </div>
                    <div class="range">
                      <input type="range" />
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="card p-4 bg-theme">
                    <div class='chart-details d-flex align-items-center mb-2 text-start border-bottom'>
                      <p class="fs-6 w-150px mb-0">Principal</p>
                      <p id="principal-amt-id" class="fw-bold mb-1 pb-1">2342</p>
                    </div>
                    <div class='chart-details d-flex align-items-center mb-2 text-start border-bottom'>
                      <p class="fs-6 w-150px mb-0">Interest</p>
                      <p id="interest-amt-id" class="fw-bold mb-1 pb-1 ">2%</p>
                    </div>
                    <div class='chart-details d-flex align-items-center mb-2 text-start border-bottom'>
                      <p class="fs-6 w-150px mb-0">Total Payable</p>
                      <p id="total-payble-amt-id" class="fw-bold mb-1 pb-1">343420</p>
                    </div>
                    <div class='chart-details d-flex align-items-center mb-0 text-start'>
                      <p class="fs-6 w-150px mb-0">
                        Monthly Payable
                      </p>
                      <p id="monthly-payble-amt-id" class="fw-bold mb-1 pb-1">343420</p>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <div class="loan-details  d-flex flex-wrap flex-row w-100  mt-5 ">
                </div>
              </div>
            </div>
            <div>
            </div>
          </div> -->

          <div class="container mt-3">
          <div class="row">
            <div class="col-md-5">
              <div class="wrapper mb-2 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="mb-0">Amount</p>
                  <div class="input-group w-fit-200">
                    <input onfocusout="LAPsetInputUsFormat()" onfocusin="LAPsetInputNormalForm()" type="text"
                      value="15,00,000" id='lap-set-amount-loan-against-property' class="form-control form-control-sm">
                    <div class="input-group-append  d-flex">
                      <span class="input-group-text">RS </span>
                    </div>
                  </div>
                </div>
                <div class="range">
                  <input onchange='LAPsetInputValue(this)' id="lap-amount-id" type="range" min="200000" max="3000000"
                    value='1500000' />
                </div>
              </div>
              <div class="wrapper mb-2 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="mb-0">Tenure</p>
                  <div class="input-group w-fit-200">
                    <input type="text" onfocusout='LAPsetInputRangeVal(this)' value="60"
                      id='lap-set-tenur-loan-against-propertye' class="form-control form-control-sm">
                    <div class="input-group-append d-flex">
                      <span onclick='LAPconvertMonthToYear(this)' id="lap-month-id"
                        class="input-group-text text-white bg-dark">Mo</span>
                      <span onclick='LAPconvertMonthToYear(this)' id="lap-year-id" class="input-group-text">Yr</span>
                    </div>
                  </div>
                </div>
                <div class="range">
                  <input onchange='LAPsetInputValue(this)' id="lap-tenure-id" type="range" min="24" max="144" value='60' />
                </div>
              </div>
              <div class="wrapper mb-2 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="mb-0">Interest</p>
                  <div class="input-group w-fit-200">
                    <input type="text" onfocusout='LAPsetInputRangeVal(this)' value="18"
                      id='lap-set-interest-loan-against-property' class="form-control form-control-sm">
                    <div class="input-group-append d-flex">
                      <span class="input-group-text ">% </span>
                    </div>
                  </div>
                </div>
                <div class="range">
                  <input onchange='LAPsetInputValue(this)' id="lap-interest-id" type="range" min="15" max="24" value="17" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="h-100 rounded py-3 px-4 pt-4 bg-lights">
                <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                  <p class="fs-6 calculator-label me-3  mb-0">Principal</p>
                  <p id="lap-principal-amt-id" class="fw-bold mb-0">2342</p>
                </div>
                <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                  <p class="fs-6  calculator-label  me-3  mb-0">Interest</p>
                  <p id="lap-interest-amt-id" class="fw-bold mb-0 ">2%</p>
                </div>
                <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                  <p class="fs-6  calculator-label me-3  mb-0">Total Payable</p>
                  <p id="lap-total-payble-amt-id" class="fw-bold mb-0">343420</p>
                </div>
                <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                  <p class="fs-6 calculator-label  me-3  mb-0">
                    Monthly Payable
                  </p>
                  <p id="lap-monthly-payble-amt-id" class="fw-bold mb-0">343420</p>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div>
                <canvas id="LAPdoughnutChart" width="200" height="200"></canvas>
              </div>
            </div>
          </div>
          <div>
            <div class="loan-details  d-flex flex-wrap flex-row w-100  mt-5 ">
            </div>
          </div>
        </div>
          <button type="button" class="btn btn-theme btn-sm mt-4"
            onclick="redirectToApplyNowPage('home-construction-loan')"><a herf="javascript:void(0)">Apply
              Now</a></button>
        </div>
      </div>
    </div>
    <p>
      <b>Disclaimer</b>: This EMI Calculator gives approximate amount of EMI (Equated Monthly Installment), loan
      amount and interest which you will pay. Actual values may change based on your loan application and our
      company’s policies. Above EMI calculation results are just for your idea and by no means can replace the results
      and advice of our professional team. T&C Apply
    </p>
  </div>

  </div>
  <div class="container mt-5">
    <div class="row mt-5">
      <div class="col-md-8">
        <h4>Benefits of Home Construction Loan EMI Calculator</h4>
        <ol>
          <li>
            <b>Easier Decision-Making:</b> With accurate EMI information, you can make informed decisions about your
            home loan.
          </li>
          <li>Customized Planning: Borrowers can adjust loan amounts, tenures, and interest rates to tailor the loan to
            their specific needs. </li>
          <li>
            <b>Budgeting:</b> Users can determine if the calculated EMI amount aligns with their budget and financial
            goals
          </li>
          <li>
            <b>Transparency:</b> It offers complete transparency in the loan process, helping borrowers understand the
            financial commitment.
          </li>
          <li>
            <b>Goal Alignment:</b> Borrowers can ensure that the loan aligns with their financial goals and long-term
            plans
          </li>
        </ol>
      </div>
      <div class="col-md-4 text-end">
        <img src="img/LoanAgainst-Property.webp" class="w-70" alt="">
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-4">
        <img src="img/how-to-use-catr.webp" class="w-100" alt="">
      </div>
      <div class="col-md-8">
        <h4>How to use Home Construction Loan EMI Calculator?</h4>
        <p>Using a Home Construction Loan EMI Calculator is straightforward. Here are the steps to use it: </p>
        <span>
          <b>Enter Loan Details:</b>
        </span>
        <ol>
          <li> Loan Amount: Input the total loan amount you plan to borrow for your home construction.</li>
          <li>Interest Rate: Enter the annual interest rate i.e., between 15%-24%.</li>
          <li>Now an online form is opened which will ask you to fill basic details.</li>
          <li>Loan Tenure: Enter the loan tenure that aligns with your financial planning. Our loan tenure is minimum 2
            years and maximum 12 years. </li>
        </ol>
        <span>
          <b>Click Calculate</b>After entering the loan details, click the "Calculate" button on the calculator. </span>
        <span>
          <b>View Results : </b>The calculator will provide you with the Equated Monthly Installment (EMI) amount, which
          is the monthly payment you need to make to repay the loan. </span>
        <span>
          <b>Analyze the Results : </b>
        </span>
        <ol>
          <li>Examine the EMI amount to assess whether it fits within your budget and financial capabilities. </li>
          <li>Check the total interest amount you'll pay over the loan tenure to understand the cost of the loan. </li>
          <li>Examine the amortization schedule if provided. This schedule shows how your EMI payments are distributed
            between principal and interest over time.</li>
        </ol>
        <span>
          <b>Adjust Parameters:</b>If the initial results don't meet your requirements, you can adjust the loan amount,
          interest rate, or tenure to see how these changes impact your EMI </span>
        <span>
          <b>Plan Your Finances:</b>Use the EMI amount and the total interest cost to plan your finances and ensure that
          the loan is manageable within your budget. </span>
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
              <p>
                <?= $faq['answer'] ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <!-- Remove the container if you want to extend the Footer to full width. -->
  <?php include('footer.php') ?>
  <!-- End of .container -->
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