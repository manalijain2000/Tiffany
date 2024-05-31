  function LAPsetInputValue(el) {
    var id_attr = $(el).attr('id')
    var value = $(el).val()
    id_attr == 'lap-interest-id' ? $('#lap-set-interest-loan-against-property').val(value) : id_attr == 'lap-tenure-id' ? $('#lap-set-tenur-loan-against-propertye').val(value) : $('#lap-set-amount-loan-against-property').val(parseFloat(value).toLocaleString('en-IN'));
    LAPemiCalculator()
  }
  
  function LAPsetInputUsFormat() {
    var usEnVal = $('#lap-set-amount-loan-against-property').val()
    var numericValue = parseFloat(usEnVal.replace(/,/g, ''));
    var amount = parseFloat(numericValue);
    if (!isNaN(amount)) {
      $('#lap-amount-id').val(amount)
      var formattedNumber = amount.toLocaleString('en-IN');
      $('#lap-set-amount-loan-against-property').val(formattedNumber);
    }
    LAPemiCalculator()
  }

  function LAPsetInputNormalForm() {
    var inputString = $('#lap-set-amount-loan-against-property').val();
    var numericValue = parseFloat(inputString.replace(/,/g, ''));
    if (!isNaN(numericValue)) {
      $('#lap-set-amount-loan-against-property').val(numericValue);
    }
    LAPemiCalculator()
  }

  function LAPsetInputRangeVal(el) {
    var idAttr = $(el).attr('id');
    if (idAttr == 'lap-set-tenur-loan-against-propertye') {
      $('#lap-tenure-id').val($('#lap-set-tenur-loan-against-propertye').val());
    } else {
      $('#lap-interest-id').val($('#lap-set-interest-loan-against-property').val());
    }
    LAPemiCalculator()
  }

  function LAPconvertMonthToYear(el) {
    var $element = $(el);
    var id_attr = $(el).attr('id')
    if (id_attr == 'lap-month-id') {
      if (!$element.hasClass('text-white bg-dark')) {
        $('#lap-year-id').removeClass('text-white bg-dark')
        $element.addClass('text-white bg-dark')
        var totalMonths = parseFloat($('#lap-set-tenur-loan-against-propertye').val()) * 12;
        $('#lap-tenure-id').attr('min', 0);
        $('#lap-tenure-id').attr('max', 144);
        if (totalMonths % 1 !== 0) {
          totalMonths = totalMonths.toFixed(2);
        }
        $('#lap-tenure-id').val(totalMonths);
        $('#lap-set-tenur-loan-against-propertye').val(totalMonths)
      }
    } else {
      if (!$element.hasClass('text-white bg-dark')) {
        $('#lap-month-id').removeClass('text-white bg-dark')
        $element.addClass('text-white bg-dark')
        var totalYear = parseFloat($('#lap-set-tenur-loan-against-propertye').val()) / 12;
        if (totalYear % 1 !== 0) {
          totalYear = totalYear.toFixed(2);
        }
        $('#lap-tenure-id').attr('min', 0);
        $('#lap-tenure-id').attr('max', 12);
        $('#lap-tenure-id').val(totalYear);
        $('#lap-set-tenur-loan-against-propertye').val(totalYear)
      }
    }
    LAPemiCalculator()
  }

  function LAPemiCalculator() {
    var amt_el = $('#lap-set-amount-loan-against-property').val();
    var amount = parseFloat(amt_el.replace(/,/g, ''));

    var tenure = $('#lap-set-tenur-loan-against-propertye').val();

    var interest = $('#lap-set-interest-loan-against-property').val();

    var monthlyInterestRate = (interest / 12) / 100;
    var numberOfInstallments = $('#lap-month-id').hasClass('text-white bg-dark') ? tenure : tenure * 12;

    // Calculate EMI using the formula
    var emi = (amount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, numberOfInstallments)) /
      (Math.pow(1 + monthlyInterestRate, numberOfInstallments) - 1);

    var totalPayable = emi * numberOfInstallments;

    var totalInterestPaid = totalPayable - amount;

    var totalAmountPaid = totalPayable;

    $('#lap-principal-amt-id').text(amount.toLocaleString('en-IN') + ' ' + 'Rs.')
    $('#lap-interest-amt-id').text(totalInterestPaid.toLocaleString('en-IN'))
    $('#lap-total-payble-amt-id').text(totalAmountPaid.toFixed(0).toLocaleString('en-IN') + ' ' + '')
    $('#lap-monthly-payble-amt-id').text(emi.toLocaleString('en-IN') + ' ' + 'Rs.')

    // var amountPaid = 5000;
    // var interestPaid = 1000;

    var lapdoughnutConfig = {
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


    var lapctx = document.getElementById('LAPdoughnutChart').getContext('2d');

    if (window.myDoughnutChart1) {
      window.myDoughnutChart1.destroy();
    }

    // Create the doughnut chart
    window.myDoughnutChart1 = new Chart(lapctx, lapdoughnutConfig);
    // Create the dough

  }
