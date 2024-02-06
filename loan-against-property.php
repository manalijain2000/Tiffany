<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loan Against Property - Tiffany Finance Private Limited</title>
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
$faqsSql = "SELECT * FROM faq_section where category = 'loan-against-property'";
$faqs = $conn->query($faqsSql);

$conn->close();
?>

<body>
  <?php include('header.php') ?>
  <div class="container-fluid p-0 banner-header">
    <div class=" header-slider">
      <img src="img/about.jpg" class="d-block w-100" alt="Privacy-policy">
      <h3 class="heading">Loan Against Property</h3>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-7">
        <h4 class="heading mb-3"> Know About Tiffany Finance Loan Against Property </h4>
        <p>Loan Against Property (LAP) can be used for both your business and personal needs. With Tiffany Finance
          Property Loan, you can manage to do it all including funding your children education, wedding expenses,
          medical treatment, business requirements or construction/renovation</p>
        <p>Tiffany Finance provides customized loans against all kinds of residential and commercial properties to
          salary and self-employed individuals as well as to small and medium enterprises. Your property comes under
          your most valuable asset and you can make use of it to take easy and quick loan to fulfil your requirements.
        </p>
        <p>Apply for Property Loan today via website or directly contacting our support team via email, chat or phone.
          If you have any query or you need any information, feel free to contact our team. Our streamlined process with
          minimum documentation ensures a hassle-free experience for every customer.</p>
      </div>
      <div class="col-md-5 text-end ">
        <img src="img/LoanAgainst-Property.webp" class="w-70" alt="">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <h4 class="heading mb-3 "> Calculate The Maximum Loan Amount You Can Get? </h4>
    <p>Find out how much loan amount you can get on your property with our loan to value calculator based on the market
      value and nature of the property you have, your monthly dues and income.</p>

  </div>

  <div class="container mt-5">
    <div class="row">
      <h4 class="heading mb-3 text-center">Features & Benefits of LAP</h4>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Loan for both commercial and residential properties with high LTV</h5>
            <p> If you are mortgaging your residential property, you can get loan amount of 60% of the property’s value
              and if you are mortgaging commercial property, you can get loan amount of 70% of the property’s value.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Loan Tenure Up To 12 years <span class="text-danger">*</span>
            </h5>
            <p>: Tiffany Finance gives you advantage of repaying your loan till 12 years. You don’t have to worry about
              repaying the principal amount faster. Enjoy tenure of 12 years and fulfill your goals with ease.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Property insurance and life credit shield options available</h5>
            <p>For your safety and convenience we also offer insurance for your property and other credit shield options
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Loan starting from Rs.1 lakh onwards <span class="text-danger">*</span>
            </h5>
            <p>Now get loan starting from just Rs.1 lakh onwards. You can effectively use your collateral to get even a
              small loan amount. </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Transparency in process</h5>
            <p>We ensure complete transparency in whole loan process, there are no hidden charges or fees. Our aim is to
              offer competitive interest rates with transparency in everything we do.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Customized Products</h5>
            <p>We offer customized loans if a customer demands in any situation and even fulfill requirements on
              individual basis. </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5>Quick Loan Disbursal with hassle free documentation</h5>
            <p>With our quick and transparent processes, we make sure that you get your loan amount smoothly and on time
              with easy documentation</p>
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
      <h4 class="heading">Eligibility Criteria For LAP</h4>
      <p>Tiffany Finance provides Loan Against Property to all the salaried, self-employed individuals and SMEs and
        there is a customized loan for each category you belong to. There is a product based on your needs and
        requirements. How much loan amount you can avail, depends upon the valuation of your property. Like, if you are
        mortgaging your residential property, you can get loan amount of 60% of the property’s value and if you are
        mortgaging commercial property, you can get loan amount of 70% of the property’s value. Apart from this, loan
        amount will depend on certain factors like your age, income, nature of work, the documents you can provide,
        CIBIL score, your repayment history and other obligations. </p>
      <div class="card">
      <h6 class="text-secondary mb-0">Understand the below table to know in detail about eligibility criteria for
            LAP</h6>
        <div class="card-body p-0 pt-2 table-responsive">
          
          <table class="table table-striped table-hover mt-3 table-primary">
            <thead>
              <tr>
                <th>Criteria</th>
                <th>Salaried</th>
                <th>Self-Employed</th>
                <th>SMEs</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ownership of Property</td>
                <td>Must be Self-Occupied </td>
                <td>Must be Self-Occupied</td>
                <td>Must be Self-Occupied</td>
              </tr>
              <tr>
                <td> Age </td>
                <td>Minimum 21 years - 65 years at the time of loan maturity</td>
                <td>Minimum 25 years - 65 years at the time of loan maturity</td>
                <td>2 Years Old</td>
              </tr>
              <tr>
                <td>CIBIL Score</td>
                <td>650+</td>
                <td>650+</td>
                <td>Over the last 2 years, financials of the firm should reflect a steady source of profits and the
                  statements must be audited and authorised by a Chartered Accountant.</td>
              </tr>
              <tr>
                <td> Nationality </td>
                <td>Indian and must be a resident of India</td>
                <td>Indian and must be a resident of India </td>
                <td>Registered as Indian SME and must have operations in India.</td>
              </tr>
              <tr>
                <td>Documents Required</td>
                <td>KYC Documents Bank statement of last 6 months and salary slips of last 3 months Form 16 Property
                  Related Documents ITR (Income Tax Returns) of Last 3 years</td>
                <td> KYC Documents Bank statement of last 6 months Form 16 Property Related Documents ITR (Income Tax
                  Returns) of Last 3 years Latest Audited Financial Statements Business Registration Proof Latest GST
                  Returns </td>
                <td> KYC Documents Bank statement of last 6 months Form 16 Property Related Documents ITR (Income Tax
                  Returns) of Last 3 years Latest Audited Financial Statements Business Registration Proof Latest GST
                  Returns </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
        <h4 class="heading">Documents Required For LAP</h4>
        <p>Tiffany Finance documentation process is simple and hassle free. There are minimum documents required to
          complete the application process like documents which shows proof of your age, address, name, income source
          and property documents which you are giving on mortgage. </p>
        <div class="">
          <h4>The list of documents to apply for loan against property</h4>
          <ul class="mb-0">
            <li>Customer Application Form</li>
            <li>A Recent Passport Size Photograph</li>
            <li>Photo Identity Proof (Passport/ Driving License/ PAN Card/ Voter ID/ Aadhar Card)</li>
            <li>Address Proof (Passport/ Bank Account Statement/ Electricity Bill/ Telephone Bill/ Rent Agreement/
              Aadhaar Card/ Driving License/ Ration Card)</li>
            <li>Form 16</li>
            <li>Bank statement of last 6 months</li>
            <li>ITR (Income Tax Returns) of Last 3 years </li>
            <li>Post Dated Cheques </li>
            <li>Property Proof (Original Sale Deed/ NOC from society/ Possession Letter/ Sanction Plan or Map)</li>
          </ul>
          <span>
            <b>Note: All the documents must be self-attested.</b>
          </span>
        </div>
      </div>
      <div class="col-md-4">
        <img src="img/Documents-Required.webp" class="w-100 rounded-3" alt="">
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-4">
        <div class="card p-2 mb-2 h-100">
          <h6>For Salaried Individuals</h6>
          <ul class="mb-0">
            <li>Salary slips of last 3 months</li>
            <li>Employment or offer letter</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-2 mb-2 h-100">
          <h6>For Self-Employed</h6>
          <ul class="mb-0">
            <li>Last 2 years Income Statements and other financials signed by a CA.</li>
            <li>Business Proof (GST Registration/ Shop Act Certificate)</li>
            <li>Company details</li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-2 mb-2 h-100">
          <h6>For SMEs</h6>
          <ul class="mb-0">
            <li>Last 2 years Audited Financial Statements.</li>
            <li>Business Proof (MSME Act Certificate/ GST Registration/ Shop Act Certificate)</li>
          </ul>
        </div>
      </div>
    </div>
    <p class="text-danger mb-1">
      <i>*Terms & Conditions Apply</i>
    </p>
    <p>
      <b>Note</b>: This is just an indicative list. Additional criteria and documents may be required at the time of
      loan application.
    </p>
  </div>


  <div class="container mt-5">
    <h4 class="heading text-center"> Loan Against Property Fees and Charges </h4>
    <div class="table-responsive">
    <table class="table table-striped table-hover mt-3 table-primary">
      <thead>
        <tr>
          <th>S. No</th>
          <th>Particulars</th>
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Login Fee</td>
          <td>Up to ₹5000/- + GST to be paid with application <b>(Non-Refundable)</b>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Processing Fee</td>
          <td>Up to 3.5 % + GST to be collected before disbursement or deducted from first disbursement</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Legal Opinion Charges, SRO Search Charges, ROC Search Charges, Non-Encumbrance Certificate from SRO
            charges (as applicable), Technical Valuation, RCU & FI</td>
          <td>As per Actual </td>
        </tr>
        <tr>
          <td>4</td>
          <td>CERSAI Fees</td>
          <td>
            <ul>
              <li>₹50/- + applicable taxes for Loans uptoRs. 5.00 lacs (original filling and for modification)</li>
              <li>₹100/- + applicable taxes for Loans above Rs. 5.00 lacs (original filling and for modification) </li>
              <li>₹250/- + applicable taxes for any satisfaction of the original filling </li>
            </ul>
          </td>
        </tr>
        <tr>
          <td>5</td>
          <td>PDC / ECS/ACH Dishonor Charges</td>
          <td>₹1000/- + GST for each PDC/ECS/ACH bounce</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Late Payment Charges</td>
          <td>36% per annum of Outstanding EMI</td>
        </tr>
        <tr>
          <td>7</td>
          <td>PDC/ECS Swapping charges</td>
          <td>Up to ₹1000/- + GST per instance</td>
        </tr>
        <tr>
          <td>8</td>
          <td>Foreclosure Statement Charges</td>
          <td>Up to ₹1000/- + GST </td>
        </tr>
        <tr>
          <td>9</td>
          <td>Photocopy of Property Documents</td>
          <td>Up to ₹1000/- + GST</td>
        </tr>
        <tr>
          <td>10</td>
          <td>Document Retrieval Charges</td>
          <td>₹2,000/- + GST </td>
        </tr>
        <tr>
          <td>11</td>
          <td>Duplicate Annual Account Statement / Provisional Certificate</td>
          <td>Up to ₹1000/- + GST </td>
        </tr>
        <tr>
          <td>12</td>
          <td>Cheque/ECS/NACH/EMI Cycle Change </td>
          <td>₹1,000/- + GST</td>
        </tr>
        <tr>
          <td>13</td>
          <td>Property Swap Charges</td>
          <td>2% of Principal Amount Outstanding + GST</td>
        </tr>
        <tr>
          <td>14</td>
          <td>Statement of Account</td>
          <td>Up to ₹1000/- + GST </td>
        </tr>
        <tr>
          <td>15</td>
          <td>Each Personal Visit to Customer's Place for Collection of Dues</td>
          <td>₹500/- per visit + GST</td>
        </tr>
        <tr>
          <td>16</td>
          <td>Loan Cancellation Charges</td>
          <td>Up to ₹2,000/- + GST + Rate of Interest from the date of disbursement till the date of request for
            cancellation</td>
        </tr>
        <tr>
          <td>17</td>
          <td>Disbursement Cancellation Charges</td>
          <td>₹5,000/- + GST + Rate of Interest from the date of disbursement till the date of request for cancellation
          </td>
        </tr>
        <tr>
          <td>18</td>
          <td>Recovery Charges (Legal / Repossession & Incidental)</td>
          <td>As per actual </td>
        </tr>
        <tr>
          <td>19</td>
          <td>Custodian Fee for keeping property documents in closed loans beyond 1 month of closure</td>
          <td>₹500/- per month + GST </td>
        </tr>
        <tr>
          <td>20</td>
          <td>Charges for EMI Missed Due date</td>
          <td>₹250/- + GST </td>
        </tr>
        <tr>
          <td>21</td>
          <td>Miscellaneous</td>
          <td>Borrower is bound to pay the charges i.e. processing fees, insurance charges etc. separately by cheque to
            the company prior/at the time of disbursement. If the Borrower is not able to bring these charges than at
            the request of the Borrower, the company will deduct the same from the Disbursed Loan amount and the
            borrower agrees to pay the interest on full disbursed amount. </td>
        </tr>
      </tbody>
    </table>
    </div>
    <p>
      <b>Note: </b> Stamp duty, Other Stamp, MODT, e-filing charges, GST, Fee, Taxes and other statutory dues applicable
      on the Security documents or Transaction documents may vary depending on the location and will be charged from the
      borrower in addition to processing fees.
    </p>
  </div>

  <div class="container mt-5">
    <div class="modal-content pb-3 mb-4">
      <div class="modal-header">
        <!-- <h5 class="bg-danger text-white">Insert these values in calculator – 1 lakh to 50 lakhs, 3 yearsto 15 years,
          14-26%</h5> -->
        <h4>EMI Calculator</h4>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
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
                      value="10,00,000" id='lap-set-amount-loan-against-property' class="form-control form-control-sm">
                    <div class="input-group-append  d-flex">
                      <span class="input-group-text">RS </span>
                    </div>
                  </div>
                </div>
                <div class="range">
                  <input onchange='LAPsetInputValue(this)' id="lap-amount-id" type="range" min="100000" max="5000000"
                    value='1000000' />
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
                  <input onchange='LAPsetInputValue(this)' id="lap-tenure-id" type="range" min="36" max="180" value='60' />
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
                  <input onchange='LAPsetInputValue(this)' id="lap-interest-id" type="range" min="14" max="26" value="18" />
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
          onclick="redirectToApplyNowPage('loan-against-property')"><a herf="javascript:void(0)">Apply Now</a></button>
      </div>
    </div>
    <p> Disclaimer: This EMI Calculator gives approximate amount of EMI (Equated Monthly Installment), loan amount and
      interest which you will pay. Actual values may change based on your loan application and our company’s policies.
      Above EMI calculation results are just for your idea and by no means can replace the results and advice of our
      professional team. T&C Apply. </p>
  </div>

  <div class="container mt-5">
    <div class="row">
      <h4>What is an EMI?</h4>
      <p>EMI is Equated Monthly Installments that you are going to pay monthly till the duration of your loan. The
        amount includes the principal and the interest that you are going to pay on the value of the loan. </p>
      <h4>What is EMI Calculator and its benefits?</h4>
      <p>EMI Calculator is used to calculate the approximate amount you have to pay each month based on the loan amount,
        tenure and interest rate. Benefits of using Tiffany Finance Property Loan EMI Calculator:</p>
      <ul>
        <li>This calculator is transparent, simple and easy to understand. There is no hidden fees or charges, this is a
          smart calculator which takes into account all the taxes and charges and makes sure the calculated amount is
          complete transparent.</li>
        <li>This calculator is convenient to use and you can use it on web, mobile and from any place you want. It is
          simple, convenient and easy to understand. </li>
        <li>It is error free as it is automatically calculated within seconds and you can utilize this to plan your
          goals in a better way.</li>
      </ul>
    </div>
    <div class="row mt-5">
      <div class="col-md-8">
        <h4>How to use EMI Calculator?</h4>
        <p>You can calculate the amount very easily. Just enter the three things:</p>
        <ol>
          <li>Loan Amount: The amount which you want to borrow. Example: 10 Lakhs, you can enter the value up to Rs. 50
            lakhs. </li>
          <li>Tenure: This is the duration in which you are going to repay the loan. Example: 5 Years, repayment tenure
            can be up to 15 years. </li>
          <li>Rate of Interest: The rate you can enter is between 14% to 26%. Example: 18%</li>
        </ol>
        <p>So, as per the above example your calculated EMI comes to: Rs.25,393 per month</p>
        <p>You can hit and try different values in the EMI calculator and can play with it to get the best option
          available as per your profile. With this calculator you will get your EMI amount calculated within no time.
        </p>
        <p>This gives you the facility to adjust your EMI amount on higher or lower side by just changing the tenure and
          loan amount. You can also plan your finance goals in a better way with this calculator.</p>
        <p>EMI and amount of loan offered will also depend on factors like your current obligations, your source of
          income, etc.</p>
        <span>
          <i>For any queries, contact support team of Tiffany Finance via mail, phone or chat or visit our nearest
            branch. </i>
        </span>
      </div>
      <div class="col-md-4 text-end">
        <img src="img/how-to-app.webp" class="w-70" alt="">
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-4">
        <img src="img/how.webp" class="w-70" alt="">
      </div>
      <div class="col-md-8">
        <h4>How To Apply for LAP</h4>
        <p>Process of applying for loan against property is easy and fast with us. Some of the ways you can apply for
          loan are:</p>
        <span>
          <b>Steps to apply for Property Loan through our website: </b>
        </span>
        <ol>
          <li> Click on Apply Now Button on the website.</li>
          <li>Enter your mobile number and the OTP which you will receive.</li>
          <li>Now an online form is opened which will ask you to fill basic details.</li>
          <li>Choose your employment type, enter your name, email, DOB, City, Pin Code and type of loan you want. Tick
            the check box and click on apply now. </li>
          <li>After this, you will get your reference ID and a Tiffany representative will check your eligibility and
            will contact you shortly. </li>
        </ol>
        <ul>
          <li>You can call us on our customer care number @ 1800-890-6544 </li>
          <li>You can email us on info@tiffanyfinance.com and we will get in touch with you.</li>
          <li>Visit our nearest branch to get support directly from our executives. </li>
        </ul>
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