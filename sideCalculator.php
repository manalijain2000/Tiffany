<div class="side-calculate">
  <div class="emi-box ">
    <button type="button" class="btn  emi-btn float-right" data-bs-toggle="modal" data-bs-target="#CalculateEMI">
      <img src="img/values/calc.png" class="side-clc">
      <span>Calculate EMI</span>
    </button>
    <button type="button" class="btn  emi-btn" onclick="redirectToApplyNowPage('')">
      <img src="img/values/apply.png" class="side-clc">
      <span>Apply Now</span>
    </button>
    <button type="button" class="btn  emi-btn float-right" onclick='redirectToAnotherPage("pay-emi.php")'>
      <img src="img/values/pay.png" class="side-icon">
      <span>Pay EMI</span>
    </button>
    <button type="button" class="btn emi-btn" onclick="window.location.href = 'tel:1800-890-6544'">
      <img src="img/values/phone.png" class="side-icon1">
      <span>Contact Us</span>
    </button>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="CalculateEMI" tabindex="-1" aria-labelledby="CalculateEMILabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered custom-modal-size">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Calculate EMI</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body  text-center">
          <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="BusinessLoan-tab" data-bs-toggle="tab" data-bs-target="#BusinessLoan"
                type="button" role="tab" aria-controls="BusinessLoan" aria-selected="true">Loan Against
                Property</button>
            </li>
          </ul> -->
          <div class="tab-pane fade show active" id="BusinessLoan" role="tabpanel" aria-labelledby="BusinessLoan-tab">
            <div class="container mt-1">
              <div class="row">
                <div class="col-md-6 p-4">
                  <div class="wrapper mb-2 ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <p class="mb-0 paragraph fs-5">Loan Amount</p>
                      <div class="input-group w-fit-200">
                        <input onfocusout="setInputUsFormat()" onfocusin="setInputNormalForm()" type="text"
                          value="10,00,000" id='set-amount-loan-against-property' class="form-control form-control-sm">
                        <div class="input-group-append  d-flex">
                          <span class="input-group-text">Rs </span>
                        </div>
                      </div>
                    </div>
                    <div class="range">
                      <input onchange='setInputValue(this)' id="amount-id" type="range" min="500000" max="50000000"
                        value='1000000' />
                    </div>
                    <div class="d-flex justify-content-between">
                      <div>500000</div>
                      <div>50000000</div>
                    </div>
                  </div>
                  <br>
                  <div class="wrapper mb-2 ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <p class="mb-0 paragraph fs-5">Tenure</p>
                      <div class="input-group w-fit-200">
                        <input type="text" onfocusout='setInputRangeVal(this)' value="60"
                          id='set-tenur-loan-against-propertye' class="form-control form-control-sm">
                        <!-- <div class="input-group-append d-flex">
                          <span onclick='convertMonthToYear(this)' id="month-id"
                            class="input-group-text text-white bg-dark">Mo</span>
                        </div> -->
                        <div class="input-group-append  d-flex">
                          <span class="input-group-text">Rs </span>
                        </div>
                      </div>
                    </div>
                    <div class="range">
                      <input onchange='setInputValue(this)' id="tenure-id" type="range" min="12" max="120 "
                        value='60' />
                    </div>
                    <div class="d-flex justify-content-between">
                      <div>12 Months</div>
                      <div>120 Months</div>
                    </div>
                  </div>
                  <br>
                  <div class="wrapper mb-2 ">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <p class="mb-0 paragraph fs-5">Interest</p>
                      <div class="input-group w-fit-200">
                        <input type="text" onfocusout='setInputRangeVal(this)' value="18"
                          id='set-interest-loan-against-property' class="form-control form-control-sm">
                        <div class="input-group-append d-flex">
                          <span class="input-group-text ">% </span>
                        </div>
                      </div>
                    </div>
                    <div class="range">
                      <input onchange='setInputValue(this)' id="interest-id" type="range" min="11.99" max="36"
                        value="18" />
                    </div>
                    <div class="d-flex justify-content-between">
                      <div>11.99%</div>
                      <div>36%</div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-4">
                  <div class="h-100 rounded py-3 px-4 pt-4 bg-lights">
                    <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                      <p class="fs-6 calculator-label me-3  mb-0 paragraph">Principal</p>
                      <p id="principal-amt-id" class="fw-bold mb-0 paragraph">2342</p>
                    </div>
                    <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                      <p class="fs-6  calculator-label  me-3  mb-0 paragraph">Interest</p>
                      <p id="interest-amt-id" class="fw-bold mb-0 paragraph ">2%</p>
                    </div>
                    <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                      <p class="fs-6  calculator-label me-3  mb-0 paragraph">Total Payable</p>
                      <p id="total-payble-amt-id" class="fw-bold mb-0 paragraph">343420</p>
                    </div>
                    <div class='chart-details mb-3 d-flex align-items-center  text-start '>
                      <p class="fs-6 calculator-label  me-3  mb-0 paragraph">
                        Monthly Payable
                      </p>
                      <p id="monthly-payble-amt-id" class="fw-bold mb-0 paragraph">343420</p>
                    </div>
                  </div>
                </div> -->
                <div class="col-md-6">
                  <img src="img/calculator.png" class="product-emi-box-image-sideemi">
                  <br>

                  <h3 class="mt-4 fs-4 ms-1">Your EMI (Monthly)</h3>

                  <div class="d-flex justify-content-start emi-box-ruppes">
                    <img src="img/rupee.png" width="40px" height="33px">
                    <p id="total-payble-amt-id" class="fw-bold mb-0 paragraph fs-4 ">343420</p>
                  </div>
                  <br>
                  <a class="product-apply-now <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
                    href="apply-now.php">Apply Now</a>
                </div>
              </div>
              <div>
                <div class="loan-details  d-flex flex-wrap flex-row w-100  mt-5 ">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

</div>


<div class="whatsapp">
  <a href="https://wa.me/6377965063"><img src="img/whatsapp.png" alt=""></a>
</div>
<script>

  function redirectToContactUsPage() {
    window.location.href = 'sideBarContactUs.php';
  }

  function redirectToApplyNowPage(withLoanType) {
    var encodedLoanType = encodeURIComponent(withLoanType);
    var newUrl = 'apply-now.php?loanType=' + encodedLoanType;
    window.location.href = newUrl;
  }

  function redirectToAnotherPage(page) {
    window.location.href = page;
  }

  function emiCalculator() {
    var amt_el = $('#set-amount-loan-against-property').val();
    var amount = parseFloat(amt_el.replace(/,/g, ''));

    var tenure = $('#set-tenur-loan-against-propertye').val();

    var interest = $('#set-interest-loan-against-property').val();

    var monthlyInterestRate = (interest / 12) / 100;
    var numberOfInstallments = $('#month-id').hasClass('text-white bg-dark') ? tenure : tenure * 12;

    // Calculate EMI using the formula
    var emi = (amount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, numberOfInstallments)) /
      (Math.pow(1 + monthlyInterestRate, numberOfInstallments) - 1);

    var totalPayable = emi * numberOfInstallments;

    var totalInterestPaid = totalPayable - amount;

    var totalAmountPaid = totalPayable;

    $('#principal-amt-id').text(amount.toLocaleString('en-IN') + ' ' + '')
    $('#interest-amt-id').text(totalInterestPaid.toLocaleString('en-IN') + ' ' + '')
    $('#total-payble-amt-id').text(totalAmountPaid.toFixed(2).toLocaleString('en-IN') + ' ' + '')
    $('#monthly-payble-amt-id').text(emi.toLocaleString('en-IN') + ' ' + '')

    // var amountPaid = 5000;
    // var interestPaid = 1000;

    var doughnutConfig = {
      type: 'doughnut',
      data: {
        labels: ['Amount Paid', 'Interest Paid'],
        datasets: [{
          data: [amount, totalInterestPaid],
          backgroundColor: ['#2c2e53', '#FFCE56'],
        }]
      },
      options: {
        responsive: false,
        maintainAspectRatio: false,
        cutoutPercentage: 60, // Adjust the cutout percentage for a smaller chart
        legend: {
          display: true,
          position: 'right', // You can adjust the position as needed
          labels: {
            generateLabels: function (chart) {
              var data = chart.data;
              if (data.labels.length && data.datasets.length) {
                return data.labels.map(function (label, i) {
                  var meta = chart.getDatasetMeta(0);
                  var ds = data.datasets[0];
                  var arc = meta.data[i];
                  var value = ds.data[i];
                  var percentage = parseFloat((value / ds._meta[0].total) * 100).toFixed(2) + '%';

                  return {
                    text: label + ': ' + value + ' (' + percentage + ')',
                    fillStyle: ds.backgroundColor[i],
                    strokeStyle: '#fff',
                    lineWidth: 2,
                    hidden: isNaN(ds.data[i]) || meta.data[i].hidden,
                    index: i
                  };
                });
              } else {
                return [];
              }
            }
          }
        },
        title: {
          display: true,
          text: 'Amount and Interest Total Paid',
        },
        animation: {
          animateScale: true,
          animateRotate: true,
        },
      },
    };


    var ctx = document.getElementById('doughnutChart').getContext('2d');

    if (window.myDoughnutChart) {
      window.myDoughnutChart.destroy();
    }

    // Create the doughnut chart
    window.myDoughnutChart = new Chart(ctx, doughnutConfig);
    // Create the dough

  }

  function convertMonthToYear(el) {
    var $element = $(el);
    var id_attr = $(el).attr('id')
    if (id_attr == 'month-id') {
      if (!$element.hasClass('text-white bg-dark')) {
        $('#year-id').removeClass('text-white bg-dark')
        $element.addClass('text-white bg-dark')
        var totalMonths = parseFloat($('#set-tenur-loan-against-propertye').val()) * 12;
        console.log(totalMonths);
        $('#tenure-id').attr('min', 0);
        $('#tenure-id').attr('max', 144);
        if (totalMonths % 1 !== 0) {
          totalMonths = totalMonths.toFixed(2);
        }
        $('#tenure-id').val(totalMonths);
        $('#set-tenur-loan-against-propertye').val(totalMonths)
      }
    } else {
      if (!$element.hasClass('text-white bg-dark')) {
        $('#month-id').removeClass('text-white bg-dark')
        $element.addClass('text-white bg-dark')
        var totalYear = parseFloat($('#set-tenur-loan-against-propertye').val()) / 12;
        if (totalYear % 1 !== 0) {
          totalYear = totalYear.toFixed(2);
        }
        $('#tenure-id').attr('min', 0);
        $('#tenure-id').attr('max', 12);
        $('#tenure-id').val(totalYear);
        $('#set-tenur-loan-against-propertye').val(totalYear)
      }
    }
    emiCalculator()
  }

  function setInputRangeVal(el) {
    var idAttr = $(el).attr('id');
    if (idAttr == 'set-tenur-loan-against-propertye') {
      $('#tenure-id').val($('#set-tenur-loan-against-propertye').val());
    } else {
      $('#interest-id').val($('#set-interest-loan-against-property').val());
    }
    emiCalculator()
  }

  function setInputUsFormat() {
    var usEnVal = $('#set-amount-loan-against-property').val()
    var numericValue = parseFloat(usEnVal.replace(/,/g, ''));
    var amount = parseFloat(numericValue);
    if (!isNaN(amount)) {
      $('#amount-id').val(amount)
      var formattedNumber = amount.toLocaleString('en-IN');
      $('#set-amount-loan-against-property').val(formattedNumber);
    }
    emiCalculator()
  }

  function setInputNormalForm() {
    var inputString = $('#set-amount-loan-against-property').val();
    var numericValue = parseFloat(inputString.replace(/,/g, ''));
    if (!isNaN(numericValue)) {
      $('#set-amount-loan-against-property').val(numericValue);
    }
    emiCalculator()
  }

  function setInputValue(el) {
    var id_attr = $(el).attr('id')
    var value = $(el).val()
    id_attr == 'interest-id' ? $('#set-interest-loan-against-property').val(value) : id_attr == 'tenure-id' ? $('#set-tenur-loan-against-propertye').val(value) : $('#set-amount-loan-against-property').val(parseFloat(value).toLocaleString('en-IN'));
    emiCalculator()
  }



  function applyForLoanApplication(loanType) {
    $('#ApplynowSideNavigation').modal('show')
    $('.input-clear-cls').val('')
    $('#marital_status').val('default')
    $('#loan_status').val('Processing')
    loanType == '' ? $('#loan_type').val('default') : $('#loan_type').val(loanType)
    loanType == '' ? $('#loan_type').prop('disabled', false) : $('#loan_type').prop('disabled', true)
  }

  function submitApplication() {
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var loan_type = $('#loan_type').val();
    var annual_income = $('#annual_income').val();
    var birth_date = $('#birth_date').val();
    var marital_status = $('#marital_status').val();
    var address = $('#address').val();
    var present_employer = $('#present_employer').val();
    var occupation = $('#occupation').val();
    var comments = $('#comments').val();
    var loan_status = 'Processing';
    var desired_loan_amount = $('#desired_loan_amount').val();

    if (!first_name || !phone || !email || !loan_type || !desired_loan_amount || !address) {
      Swal.fire({
        text: "Please fill in all required fields. Required fields marked as *",
        icon: "error"
      });
      return; // Stop further execution if validation fails
    }

    // first_name phone email loan type desired loan amoutn address
    var requestData = {
      first_name: first_name,
      last_name: last_name,
      phone: phone,
      email: email,
      loan_type: loan_type,
      annual_income: annual_income,
      birth_date: birth_date,
      marital_status: marital_status,
      address: address,
      present_employer: present_employer,
      occupation: occupation,
      comments: comments,
      loan_status: loan_status,
      desired_loan_amount: desired_loan_amount
    };

    $.ajax({
      url: 'addUsersData.php?action=addLoanApplicant', // replace with your backend endpoint
      type: 'POST',
      data: requestData,
      success: function (response) {
        var responseJson = JSON.parse(response);
        if (responseJson.success) {
          $('.input-clear-cls').val('')
          $('#ApplynowSideNavigation').modal('hide');
          Swal.fire({
            text: "Your Loan Applicantion Has Been Successfully Added!",
            icon: "success"
          });
        } else {
          Swal.fire({
            text: responseJson.message,
            icon: "error"
          });
        }
      },
      error: function (error) {
        console.error('Error adding data:', error);
      }
    });
  }

  // function saveContactData() {
  //   var contact_id = $("#contact_id").val();
  //   var name = $("#contact-name").val();
  //   var email = $("#contact-email").val();
  //   var phone_number = $("#contact-phone_number").val();
  //   var loan_acc_number = $("#contact-loan_acc_number").val();
  //   var state = $("#contact-state").val();
  //   var city = $("#contact-city").val();
  //   var message = $("#contact-message").val();

  //   if (!name || !email || !phone_number || !loan_acc_number || !state) {
  //     Swal.fire({
  //       text: "Please fill in all required fields. Required fields marked as *",
  //       icon: "error"
  //     });
  //     return; // Stop further execution if validation fails
  //   }

  //   // first_name phone email loan type desired loan amoutn address
  //   var requestData = {
  //     name: name,
  //     email: email,
  //     phone_number: phone_number,
  //     loan_acc_number: loan_acc_number,
  //     state: state,
  //     city: city,
  //     message: message,
  //   };

  //   $.ajax({
  //     url: 'addUsersData.php?action=addContact', // replace with your backend endpoint
  //     type: 'POST',
  //     data: requestData,
  //     success: function (response) {
  //       var responseJson = JSON.parse(response);
  //       if (responseJson.success) {
  //         $('#ContactUs').modal('hide');
  //         Swal.fire({
  //           text: "Record has been successfully recorded! Thank You",
  //           icon: "success"
  //         });
  //         $('.input-clear-cls').val('')
  //       } else {
  //         Swal.fire({
  //           text: responseJson.message,
  //           icon: "error"
  //         });
  //       }
  //     },
  //     error: function (error) {
  //       console.error('Error adding data:', error);
  //     }
  //   });
  // }

</script>