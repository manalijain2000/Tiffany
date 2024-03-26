<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Loan - Tiffany Finance Private Limited</title>
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
$faqsSql = "SELECT * FROM faq_section where category = 'personal-loan'";
$faqs = $conn->query($faqsSql);

$conn->close();
?>

<body>
  <?php include('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/tifinay1.png" class="d-block w-100" alt="Privacy-policy">
      <h3 class="heading">Personal Loan </h3>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row justify-content-between">
      <div class="col-md-7">
        <p class="paragraph">Dreams do come true! You can achieve whatever you have wished for. Your dream university, dream wedding,
          dream destination to travel, you can make these dreams a reality with our personal loan.</p>
        <p class="paragraph">Tiffany Finance offers secure financing for all your immediate financial objectives, including travel,
          education, weddings, healthcare crisis, business needs, shopping, and more.</p>
        <p class="paragraph">Our tailored solutions are designed according to your specific requirements with minimal documentation,
          appealing interest rates, and a flexible loan repayment period. Personal loans are unsecured, meaning no
          collateral is required.</p>
      </div>
      <div class="col-md-4 text-end ">
        <img src="img/commercial-vehicle.webp" class="w-70" alt="">
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <h4 class="heading mb-3 text-center">Features & Benefits</h4>
      <!-- <img src="img/Featuresvehicle-loan-des.webp" class="w-100 my-4 d-none d-md-block" alt="">
    <img src="img/Featuresvehicle-loan-mob.webp" class="w-100 d-md-none" alt=""> -->
      <img src="img/feature-loan.png" alt="">
      <p class="text-danger">
        <i>*Terms & Conditions Apply</i>
      </p>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="">
        <div class=" p-2 h-100">
        <h4 class="heading mb-3 text-center">Eligibility Criteria for Personal Loan</h4>
          <ul style="list-style-type:disc;">
            <li>Indian residency is a mandatory requirement.</li>
            <li>To apply for a personal loan, you need to be between 21 years at the time of loan application and 60
              years at the time of loan maturity. </li>
            <li>You should have a status of either a salaried individual or a self-employed professional.</li>
            <li>A minimum work experience of one year is necessary </li>
            <li>Your CIBIL Score must surpass 650, with a commendable credit history.</li>
            <li>First time purchasers must have minimum three years of driving experience.</li>
            <li>Loan repayment tenure ranges from a minimum of 12 months to a maximum of 60 months.</li>
          </ul>
        </div>
      </div>
      <div class="">
        <div class=" p-2 h-100">
          <h5>Documents Required for Personal Loan</h5>
          <ul>
            <li>Tiffany Finance Loan Application Form filled and signed by the borrower</li>
            <li>KYC (Know Your Customer) documents for identity and address verification: <ul>
                <li>Identity Proof: PAN Card, Passport, Driver's License, Voter ID, Aadhar Card </li>
                <li>Address Proof: Rental Agreement, Utility Bills, Passport</li>
              </ul>
            </li>
            <li>Bank statements covering the last 6 months.</li>
            <li>For salaried individuals, the last 3 months' salary slips. </li>
            <li>Self-employed professionals should provide their audited financial statements for the past 2 years.</li>
            <li>Income tax returns or Form 16.</li>
          </ul>
        </div>
      </div>
      <p class="text-danger">
        <i>*Terms & Conditions Apply</i>
      </p>
      <span>
        <b>Note:</b> This is just an indicative list. Additional criteria and documents may be required at the time of
        loan application. </span>
    </div>
  </div>
  <div class="container mt-5">
    <h4 class="heading"> Personal Loan Fees & Charges </h4>
    <div class="card">
      <div class="card-body p-0 pt-2  table-responsive" >
        <table class="table table-striped table-hover mt-3 table-primary">
          <thead>
            <tr>
              <th>Charges Description</th>
              <th>Fees / Charges</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>ROI </td>
              <td>16% - 35% </td>
            </tr>
            <tr>
              <td>Tenure</td>
              <td>Tenure</td>
            </tr>
            <tr>
              <td>rocessing fees (Non-Refundable)</td>
              <td>Upto 3.5% of Loan Amount</td>
            </tr>
            <tr>
              <td>Documentation Charges</td>
              <td>Upto INR 2000/-</td>
            </tr>
            <tr>
              <td>Stamp Duty</td>
              <td>As per applicable laws of the state</td>
            </tr>
            <tr>
              <td>EMI Return</td>
              <td>Upto INR 1000/- per EMI bounce</td>
            </tr>
            <tr>
              <td>Cheque/ECS Swap</td>
              <td>Upto INR 1000/- per transaction</td>
            </tr>
            <tr>
              <td>EMI Pickup/Collection Charge</td>
              <td>Upto INR 500/-</td>
            </tr>
            <tr>
              <td>Duplicate NOC</td>
              <td>Upto INR 500/- per instance</td>
            </tr>
            <tr>
              <td>Physical Statement of Account/Repayment Schedule</td>
              <td>Upto INR 500/- per statement</td>
            </tr>
            <tr>
              <td>Foreclosure</td>
              <td>Allowed after payment of 6 or more EMI’s or 6 months whichever is later. 5% foreclosure charges
                applicable on principal outstanding </td>
            </tr>
            <tr>
              <td>Document retrieval charges (per retrieval)</td>
              <td>Upto INR 500/- per instance</td>
            </tr>
            <tr>
              <td>Part Payment Charges (only for Smart PL) </td>
              <td>Upto 5%-part payment charges are applicable on partial payment. Part Payment to be made from customers
                own funds. Part payment is not allowed for customers who have opted for Simple Personal
                Loan/Pre-approved Personal Loan.</td>
            </tr>
            <tr>
              <td>Loan Cancellation </td>
              <td> Loan cancellation allowed only within first 15 days from date of loan disbursal with nil charges.
                After first 15 days, foreclosure clause will be applied. For Digital Personal Loans, it can be cancelled
                within 3 days at no charge. Post 3 days of freelook period, the loan will be treated as standard
                foreclosure with upto 5% charge </td>
            </tr>
            <tr>
              <td>Late payment/Penal charges/ Default interest/Overdue (per month)</td>
              <td>3% of the unpaid EMI </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <h4 class="heading"> EMI Calculator </h4>
    <p class="paragraph">Our Personal Loan EMI Calculator empowers you to make informed decisions, plan your finances efficiently, and
      ensure that your loan obligations are manageable and aligned with your financial goals. By adjusting variables
      like the loan amount, interest rate, and tenure, you can visualize various repayment options. This enables you to
      choose a loan structure that aligns with your financial capabilities.</p>
    <div class="modal-content pb-3 mb-4">
      <div class="modal-header">
        <!-- <h5 class="bg-danger text-white">Insert these values in calculator - 50,000 to 5 lakhs, 12 to 60 months, 16-35%
        </h5> -->
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
        </div>
        <div>
        </div> -->
        <div class="container mt-3">
          <div class="row">
            <div class="col-md-5">
              <div class="wrapper mb-2 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="mb-0 paragraph">Amount</p>
                  <div class="input-group w-fit-200">
                    <input onfocusout="LAPsetInputUsFormat()" onfocusin="LAPsetInputNormalForm()" type="text"
                      value="1,00,000" id='lap-set-amount-loan-against-property' class="form-control form-control-sm">
                    <div class="input-group-append  d-flex">
                      <span class="input-group-text">RS </span>
                    </div>
                  </div>
                </div>
                <div class="range">
                  <input onchange='LAPsetInputValue(this)' id="lap-amount-id" type="range" min="50000" max="500000"
                    value='100000' />
                </div>
              </div>
              <div class="wrapper mb-2 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="mb-0 paragraph">Tenure</p>
                  <div class="input-group w-fit-200">
                    <input type="text" onfocusout='LAPsetInputRangeVal(this)' value="36"
                      id='lap-set-tenur-loan-against-propertye' class="form-control form-control-sm">
                    <div class="input-group-append d-flex">
                      <span onclick='LAPconvertMonthToYear(this)' id="lap-month-id"
                        class="input-group-text text-white bg-dark">Mo</span>
                      <span onclick='LAPconvertMonthToYear(this)' id="lap-year-id" class="input-group-text">Yr</span>
                    </div>
                  </div>
                </div>
                <div class="range">
                  <input onchange='LAPsetInputValue(this)' id="lap-tenure-id" type="range" min="12" max="60"
                    value='36' />
                </div>
              </div>
              <div class="wrapper mb-2 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="mb-0 paragraph">Interest</p>
                  <div class="input-group w-fit-200">
                    <input type="text" onfocusout='LAPsetInputRangeVal(this)' value="18"
                      id='lap-set-interest-loan-against-property' class="form-control form-control-sm">
                    <div class="input-group-append d-flex">
                      <span class="input-group-text ">% </span>
                    </div>
                  </div>
                </div>
                <div class="range">
                  <input onchange='LAPsetInputValue(this)' id="lap-interest-id" type="range" min="16" max="35"
                    value="18" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="h-100 rounded py-3 px-4 pt-4 bg-lights">
                <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                  <p class="fs-6 calculator-label me-3  mb-0 paragraph">Principal</p>
                  <p id="lap-principal-amt-id" class="fw-bold mb-0 paragraph">2342</p>
                </div>
                <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                  <p class="fs-6  calculator-label  me-3  mb-0 paragraph">Interest</p>
                  <p id="lap-interest-amt-id" class="fw-bold mb-0 paragraph">2%</p>
                </div>
                <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                  <p class="fs-6  calculator-label me-3  mb-0 paragraph">Total Payable</p>
                  <p id="lap-total-payble-amt-id" class="fw-bold mb-0 paragraph">343420</p>
                </div>
                <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                  <p class="fs-6 calculator-label  me-3  mb-0 paragraph">
                    Monthly Payable
                  </p>
                  <p id="lap-monthly-payble-amt-id" class="fw-bold mb-0 paragraph">343420</p>
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
    <p class="paragraph"> Disclaimer: This EMI Calculator gives approximate amount of EMI (Equated Monthly Installment), loan amount and
      interest which you will pay. Actual values may change based on your loan application and our company’s policies.
      Above EMI calculation results are just for your idea and by no means can replace the results and advice of our
      professional team. T&C Apply. </p>
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
  $(document).ready(function () {
    LAPemiCalculator()
    emiCalculator()
  });
</script>