<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Business Loan - Tiffany Finance Private Limited</title>
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
$faqsSql = "SELECT * FROM faq_section where category = 'business-loan'";
$faqs = $conn->query($faqsSql);

$conn->close();
?>

<body>
  <?php include('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/about.jpg" class="d-block w-100" alt="Privacy-policy">
      <h3 class="heading">Business Loan </h3>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row justify-content-between">
      <div class="col-md-7">
        <p>Tiffany Finance’s business loan provides the capital needed to start or expand your business. Whether you're
          launching a startup or seeking to grow an existing enterprise, our business loan can finance essential assets,
          equipment, or facilities. We provide both secured and unsecured business loan options, allowing your business
          to accessfinancing of up to ₹90 lakhs*.</p>
        <p>With our business loan, you can also fulfill all your working capital needs to maintain your daily operations
          and cover short-term expenses. You can comfortably use it for your inventory management, marketing and
          advertising, hiring and payroll, buying equipment and for expansion and growth. </p>
        <p>Tiffany Finance offers customized financing, you can choose a loan tailored to your specific needs such as
          term loans, lines of credit, or equipment financing.</p>
      </div>
      <div class="col-md-4 ">
        <img src="img/commercial-vehicle.webp" class="w-100" alt="">
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <h4 class="heading mb-3 text-center">Features & Benefits</h4>
      <img src="img/feature-loan.png" alt="">
      <p class="text-danger">
        <i>*Terms & Conditions Apply</i>
      </p>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <div class="card p-2 h-100">
          <h5> Eligibility Criteria for Business Loan </h5>
          <ul>
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
      <div class="col-md-6">
        <div class="card p-2 h-100">
          <h5>Documents Required for Business Loan</h5>
          <ul>
            <li>Tiffany Finance Loan Application Form filled and signed by the borrower</li>
            <li>KYC (Know Your Customer) documents for identity and address verification: <ul>
                <li>Identity Proof: PAN Card, Passport, Driver's License, Voter ID, Aadhar Card </li>
                <li>Address Proof: Rental Agreement, Utility Bills, Passport</li>
              </ul>
            </li>
            <li>Business existence proof like GST Certificate, certificate of incorporation, etc</li>
            <li>Bank statements covering the last 6 months. </li>
            <li>Financial documents including last six months GST returns, income tax returns and audited financial
              statements of last 2 years. </li>
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
    <h4 class="heading"> Business Loan Fees & Charges</h4>
    <div class="card">
      <div class="card-body p-0 pt-2 table-responsive">
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
              <td>Upto 60 months</td>
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
    <p>Our Business Loan EMI Calculator is a valuable tool for businesses to plan their finances, understand the impact
      of loan terms, and make informed decisions about loan agreements. It helps you assess whether the monthly
      repayment is manageable within your budget and financial objectives. Businesses can experiment with various loan
      amounts, interest rates, and tenures to analyze different loan scenarios. This helps in choosing the most suitable
      loan terms.</p>
    <div class="modal-content pb-3 mb-4">
      <div class="modal-header">
        <h4>EMI Calculator</h4>
      </div>
      <div class="text-center">
        <div class="container mt-3">
          <div class="row">
            <div class="col-md-5">
              <div class="wrapper mb-2 ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="mb-0">Amount</p>
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
                  <p class="mb-0">Tenure</p>
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
                  <input onchange='LAPsetInputValue(this)' id="lap-tenure-id" type="range" min="12" max="60" value='36' />
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
                  <input onchange='LAPsetInputValue(this)' id="lap-interest-id" type="range" min="12" max="35" value="18" />
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
    <p> Disclaimer: This EMI Calculator gives approximate amount of EMI (Equated Monthly Installment), loan amount and
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
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $faq['faq_id'] ?>"
                        aria-expanded="false" aria-controls="collapseOne<?= $faq['faq_id'] ?>"> <?= $faq['question'] ?> </button>
                </h2>
                <div id="collapseOne<?= $faq['faq_id'] ?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?= $faq['faq_id'] ?>"
                    data-bs-parent="#accordionExample<?= $faq['faq_id'] ?>">
                    <div class="accordion-body">
                        <p> <?= $faq['answer'] ?> </p>
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