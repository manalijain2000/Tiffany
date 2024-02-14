
   // const header = document.querySelector(".page-header");
   // const toggleClass = "is-sticky";

   // window.addEventListener("scroll", () => {
   //    const currentScroll = window.pageYOffset;
   //    if (currentScroll > 150) {
   //       header.classList.add(toggleClass);
   //    } else {
   //       header.classList.remove(toggleClass);
   //    }
   // });
   

   $('.home-slider').slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      autoplay: true,
      autoplaySpeed: 3000
   });

   $('.team-slider , .customer-slider').slick({
      
    slidesToShow:2,
    slidesToScroll: 1,
    dots: true,
    responsive: [
       {
          breakpoint: 768,
          settings: {
             arrows: false,
             centerMode: true,
             centerPadding: '40px',
             slidesToShow: 1
          }
       },
       {
          breakpoint: 480,
          settings: {
             arrows: false,
             centerMode: true,
             centerPadding: '40px',
             slidesToShow: 1
          }
       }
    ]
   
   
 });
 
   // $('.partner-box').slick({
   //    centerPadding: '60px',
   //    slidesToShow: 5,
   //    autoplay: true,
   //    autoplaySpeed: 400,
   //    responsive: [
   //       {
   //          breakpoint: 768,
   //          settings: {
   //             arrows: false,
   //             centerMode: true,
   //             centerPadding: '40px',
   //             slidesToShow: 3
   //          }
   //       },
   //       {
   //          breakpoint: 480,
   //          settings: {
   //             arrows: false,
   //             centerMode: true,
   //             centerPadding: '40px',
   //             slidesToShow: 1
   //          }
   //       }
   //    ]
   // });


   $('.Happy-Customers').slick({
      dots: false,
      infinite: false,
      arrows:true,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [{
         breakpoint: 1024,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
         }
      }, {
         breakpoint: 600,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1
         }
      }, {
         breakpoint: 480,
         settings: {
            slidesToShow: 1,
            slidesToScroll: 1
         }
      }
      ]
   });

   // var P, R, N, pie, line;
   // var loan_amt_slider = document.getElementById("loan-amount");
   // var int_rate_slider = document.getElementById("interest-rate");
   // var loan_period_slider = document.getElementById("loan-period");

   // // update loan amount
   // loan_amt_slider.addEventListener("input", (self) => {
   //    document.querySelector("#loan-amt-text").innerText =
   //       parseInt(self.target.value).toLocaleString("en-US") + " Rs";
   //    P = parseFloat(self.target.value);
   //    displayDetails();
   // });

   // // update Rate of Interest
   // int_rate_slider.addEventListener("input", (self) => {
   //    document.querySelector("#interest-rate-text").innerText =
   //       self.target.value + "%";
   //    R = parseFloat(self.target.value);
   //    displayDetails();
   // });

   // // update loan period
   // loan_period_slider.addEventListener("input", (self) => {
   //    document.querySelector("#loan-period-text").innerText =
   //       self.target.value + " years";
   //    N = parseFloat(self.target.value);
   //    displayDetails();
   // });

   // calculate total Interest payable
   // function calculateLoanDetails(p, r, emi) {
   //    /*
   //    p: principal
   //    r: rate of interest
   //    emi: monthly emi
   //    */
   //    let totalInterest = 0;
   //    let yearlyInterest = [];
   //    let yearPrincipal = [];
   //    let years = [];
   //    let year = 1;
   //    let [counter, principal, interes] = [0, 0, 0];
   //    while (p > 0) {
   //       let interest = parseFloat(p) * parseFloat(r);
   //       p = parseFloat(p) - (parseFloat(emi) - interest);
   //       totalInterest += interest;
   //       principal += parseFloat(emi) - interest;
   //       interes += interest;
   //       if (++counter == 12) {
   //          years.push(year++);
   //          yearlyInterest.push(parseInt(interes));
   //          yearPrincipal.push(parseInt(principal));
   //          counter = 0;
   //       }
   //    }
   //    line.data.datasets[0].data = yearPrincipal;
   //    line.data.datasets[1].data = yearlyInterest;
   //    line.data.labels = years;
   //    return totalInterest;
   // }

   // calculate details
   // function displayDetails() {
   //    let r = parseFloat(R) / 1200;
   //    let n = parseFloat(N) * 12;

   //    let num = parseFloat(P) * r * Math.pow(1 + r, n);
   //    let denom = Math.pow(1 + r, n) - 1;
   //    let emi = parseFloat(num) / parseFloat(denom);

   //    let payabaleInterest = calculateLoanDetails(P, r, emi);

   //    let opts = '{style: "decimal", currency: "US"}';

   //    document.querySelector("#cp").innerText =
   //       parseFloat(P).toLocaleString("en-US", opts) + " Rs";

   //    document.querySelector("#ci").innerText =
   //       parseFloat(payabaleInterest).toLocaleString("en-US", opts) + " Rs";

   //    document.querySelector("#ct").innerText =
   //       parseFloat(parseFloat(P) + parseFloat(payabaleInterest)).toLocaleString(
   //          "en-US",
   //          opts
   //       ) + " Rs";

   //    document.querySelector("#price").innerText =
   //       parseFloat(emi).toLocaleString("en-US", opts) + " Rs";

   //    pie.data.datasets[0].data[0] = P;
   //    pie.data.datasets[0].data[1] = payabaleInterest;
   //    pie.update();
   //    line.update();
   // }

   // Initialize everything
   // function initialize() {
   //    document.querySelector("#loan-amt-text").innerText = parseInt(loan_amt_slider.value).toLocaleString("en-US") + " Rs";
   //    P = parseFloat(document.getElementById("loan-amount").value);

   //    document.querySelector("#interest-rate-text").innerText = int_rate_slider.value + "%";
   //    R = parseFloat(document.getElementById("interest-rate").value);

   //    document.querySelector("#loan-period-text").innerText = loan_period_slider.value + " years";
   //    N = parseFloat(document.getElementById("loan-period").value);

   //    line = new Chart(document.getElementById("lineChart"), {
   //       data: {
   //          datasets: [
   //             {
   //                type: "line",
   //                label: "Yearly Principal paid",
   //                borderColor: "rgb(54, 162, 235)",
   //                data: []
   //             },
   //             {
   //                type: "line",
   //                label: "Yearly Interest paid",
   //                borderColor: "rgb(255, 99, 132)",
   //                data: []
   //             }
   //          ],
   //          labels: []
   //       },
   //       options: {
   //          plugins: {
   //             title: {
   //                display: true,
   //                text: "Yearly Payment Breakdown"
   //             }
   //          },
   //          scales: {
   //             x: {
   //                title: {
   //                   color: "grey",
   //                   display: true,
   //                   text: "Years Passed"
   //                }
   //             },
   //             y: {
   //                title: {
   //                   color: "grey",
   //                   display: true,
   //                   text: "Money in Rs."
   //                }
   //             }
   //          }
   //       }
   //    });

   //    pie = new Chart(document.getElementById("pieChart"), {
   //       type: "doughnut",
   //       data: {
   //          labels: ["Principal", "Interest"],
   //          datasets: [
   //             {
   //                label: "Home Loan Details",
   //                data: [0, 0],
   //                backgroundColor: ["rgb(54, 162, 235)", "rgb(255, 99, 132)"],
   //                hoverOffset: 4
   //             }
   //          ]
   //       },
   //       options: {
   //          plugins: {
   //             title: {
   //                display: true,
   //                text: "Payment Breakup"
   //             }
   //          }
   //       }
   //    });
   //    displayDetails();
   // }
   // initialize();

   $( document ).ready(function() {
      $('.navbar-toggler').click(function(){ 
       if($('.navbar-toggler').hasClass('collapsed')){
         $('.navbar-toggler .fas').removeClass('fa-times');
         $('.navbar-toggler .fas').addClass('fa-bars');
       }else{
         $('.navbar-toggler  .fas').removeClass('fa-bars');
         $('.navbar-toggler  .fas').addClass('fa-times');
       }
      });
    });