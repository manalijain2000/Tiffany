<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tiffany Finance Private Limited</title>
   <link rel="shortcut icon" href="img/dark-logo-sm.png">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="footer.css">
   <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css" />
   <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="slick/slick.css" />
   <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
</head>

<?php
// Include the database connection file
include("db_connection.php");
// SQL query to select all products from the 'products' table
$productSql = "SELECT * FROM products";
$customerReviewsSql = "SELECT * FROM customer_reviews ORDER BY customer_id DESC LIMIT 10";
$bankPartnerSql = "SELECT * FROM bank_partners ORDER BY bank_name";

$products = $conn->query($productSql);
$customerReviews = $conn->query($customerReviewsSql);
$bankPartners = $conn->query($bankPartnerSql);

$conn->close();
?>

<body>
   <!-- header -->
   <?php include('header.php') ?>

   <div class="container-fluid p-0 ">
      <div class=" header-slider home-slider  ">
         <div class="carousel-items">
            <img src="img/slider/umeed.jpeg" class="d-block w-100 img-height" alt="...">
            <div class="carousel-caption">
               <div class="header-box">
                  <div class="carusel-text">
                     <h5 class="inner-text">Kya aapko kabhi <strong>ummeed se zyada</strong> </h5>
                  </div>
                  <div class="carusel-text-inside">
                     <h5 class="inner-text mila-hai">loan  mila hai?</h5>
                     <a class="  btn btn-sm btn-theme-sec aapko <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
                        href="apply-now.php">Apply Now</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-items">
            <img src="img/slider/loan.png" class="d-block w-100 img-height" alt="...">
            <div class="carousel-caption  ">
               <div class="header-box">
                  <div class="carusel-text">
                     <h5 class="inner-text">Stop Dreaming, Start Living with
                     </h5>
                  </div>
                  <div class="carusel-text-inside">
                     <h5 class="inner-text second-line">our Loan Against Property</h5>
                     <a class="  btn btn-sm btn-theme-sec aapko <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
                        href="apply-now.php">Apply Now</a>
                  </div>
               </div>
            </div>
         </div>

         <div class="carousel-items">
            <img src="img/slider/vechile.png" class="d-block w-100 img-height" alt="...">
            <div class="carousel-caption  ">
               <div class="header-box">
                  <div class="carusel-text">
                     <h5 class="inner-text">Drive Your Dreams Forward with </h5>
                  </div>
                  <div class="carusel-text-inside">
                     <h5 class="inner-text second-line">Our Vehicle Loans</h5>
                     <a class="  btn btn-sm btn-theme-sec aapko <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
                        href="apply-now.php">Apply Now</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-items">
            <img src="img/slider/personal.png" class="d-block w-100 img-height" alt="...">
            <div class="carousel-caption  ">
               <div class="header-box">
                  <div class="carusel-text">
                     <h5 class="inner-text">Turning Plans into Action with</h5>
                  </div>
                  <div class="carusel-text-inside">
                     <h5 class="inner-text second-line">Our Personal Loans</h5>
                     <a class="  btn btn-sm btn-theme-sec aapko <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
                        href="apply-now.php">Apply Now</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-items">
            <img src="img/slider/business.png" class="d-block w-100 img-height" alt="...">
            <div class="carousel-caption  ">
               <div class="header-box">
                  <div class="carusel-text">
                     <h5 class="inner-text">Turning Visions into Ventures with </h5>
                  </div>
                  <div class="carusel-text-inside">
                     <h5 class="inner-text second-line">Our Business Loans </h5>
                     <a class="  btn btn-sm btn-theme-sec aapko <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
                        href="apply-now.php">Apply Now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container  mt-5">
      <h2 class=" text-center heading mb-5 ">Our Products</h2>
      <div class=" text-center">
         <div class="box-container">
            <div class="row w-100">
               <?php foreach ($products as $product_key => $product) { ?>
                  <?php if ($product_key == 0 || $product_key == 2 || $product_key == 4) { ?>
                     <div class="col-md-4">
                        <div class="box-item ">
                           <div class="flip-box flip-box-top">
                              <div class="flip-box-front flip-box-front-top text-center">
                                 <div class="inner ">
                                    <div class="img-box ">
                                       <?php $frontImagePath = ($product_key == 0) ? "img/loans.png" : (($product_key == 2) ? "img/two.png" : "img/edu.png" ); ?>
                                       <img src='<?=$frontImagePath ?>' alt="" class="product-image">
                                    </div><br>
                                    <h3 class="flip-box-header product-detail">
                                       <?= $product['product_title'] ?>
                                    </h3>
                                    <p class="product-detail">
                                       <?= $product['product_description'] ?>
                                    </p>
                                 </div>
                              </div>
                              <div class="flip-box-back flip-box-back-top  flip-card-back-top text-center"
                                 style="background-image: url('<?= $product['product_url'] ?>');">
                                 <div class="inner ">
                                    <div class="d-flex justify-content-center">
                                       <a class=" nav-link btn btn-sm btn-theme-sec me-3 <?= basename($_SERVER['REQUEST_URI']) == 'loan-against-property.php' ? 'active' : '' ?>"
                                          href="javascript:void(0)" onclick = "briefDescription('<?= $product['loan_category'] ?>')">Know More</a>
                                          <a class=" nav-link btn btn-sm btn-theme-sec <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
                                          href="javascript:void(0)" onclick = "redirectToApplyNowPage('<?= $product['loan_category'] ?>')">Apply Now</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php } else { ?>
                     <div class="col-md-4">
                        <div class="box-item">
                           <div class="flip-box">
                              <div class="flip-box-front text-center">
                                 <div class="inner ">
                                    <div class="img-box">
                                       <?php $frontImagePath = ($product_key == 1) ? "img/house.png" : (($product_key == 3) ? "img/truck.png" : "img/bl1.png"); ?>
                                       <img src='<?=$frontImagePath ?>' alt="" class="product-image">
                                    </div><br>
                                    <h3 class="flip-box-header product-detail">
                                       <?= $product['product_title'] ?>
                                    </h3>
                                    <p class="product-detail">
                                       <?= $product['product_description'] ?>
                                    </p>
                                    <!-- <img src="https://s25.postimg.cc/65hsttv9b/cta-arrow.png" alt="" class="flip-box-img"> -->
                                 </div>
                              </div>
                              <div class="flip-box-back text-center"
                                 style="background-image: url('<?= $product['product_url'] ?>'); ">
                                 <div class="inner ">
                                    <div class="d-flex justify-content-center">
                                       <a class=" nav-link btn btn-sm btn-theme-sec me-3 <?= basename($_SERVER['REQUEST_URI']) == 'home-construction-loan.php' ? 'active' : '' ?>"
                                          href="javascript:void(0)" onclick = "briefDescription('<?= $product['loan_category'] ?>')">Know More</a>
                                       <a class=" nav-link btn btn-sm btn-theme-sec <?= basename($_SERVER['REQUEST_URI']) == 'apply-now.php' ? 'active' : '' ?>"
                                          href="javascript:void(0)" onclick = "redirectToApplyNowPage('<?= $product['loan_category'] ?>')">Apply Now</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php } ?>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid mt-5 why-us-box  ">
      <div class="container   py-5">
         <h3 class="text-center heading mb-5 long-heading">Why People love Tiffany Finance?</h3>
         <p class="product-detail"> Because we are the first priority for our customers since 2017. Our customers trust on us and are
            happy with the services we are delivering. We help you achieve your milestones at different stages of life
            and be with you in all your aspirations and dreams. We believe that our team of experienced professionals
            listen to you and suggest the best possible solution to all your financial needs.

         </p>
         <div class="row mt-5">
            <div class="col-md-2 mb-3 mb-md-0">
               <div class="card-box text-center icon">
                  <img src="img/Icons/1_Customer Focused.png" alt="" width="50" height="50">
                  <h6 class="mt-2">Customer Focused </h6>
               </div>
            </div>
            <div class="col-md-2  mb-3 mb-md-0">
               <div class="card-box text-center icon">
                  <img src="img/Icons/2._Flexible Approach.png" alt=""width="50" height="50">
                  <h6 class="mt-2">Flexible Approach</h6>
               </div>
            </div>
            <div class="col-md-2  mb-3 mb-md-0">
               <div class="card-box text-center icon">
                  <img src="img/Icons/3._Transparent.png" alt=""width="50" height="50">
                  <h6 class="mt-2">Transparent</h6>
               </div>
            </div>
            <div class="col-md-2  mb-3 mb-md-0">
               <div class="card-box text-center icon">
                  <img src="img/Icons/4_Quick.png" alt="" width="50" height="50">
                  <h6 class="mt-2">Quick</h6>
               </div>
            </div>
            <div class="col-md-2  mb-3 mb-md-0">
               <div class="card-box text-center icon">
                  <img src="img/Icons/5_Reasonable.png" alt="" width="50" height="50">
                  <h6 class="mt-2">Reasonable</h6>
               </div>
            </div>
            <div class="col-md-2  mb-3 mb-md-0">
               <div class="card-box text-center icon">
                  <img src="img/Icons/6_Solution Oriented.png" alt="" width="50" height="50">
                  <h6 class="mt-2">Solution Oriented</h6>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Dynamic ready to fullfill dreams -->
   <?php include('enquiry.php') ?>
   <!-- end -->

   <div class="bg-lights mb-0 mt-5 py-3 d-none ">
      <h5 class="mt-4 text-center heading mt-5">People love us because we are- </h5>
   </div>
   <div class="container-fluid mt-0 Reason-box d-none py-5">
      <div class="container">
         <div class="row">
            <h4 class="heading text-center mb-5">Reason of Loan</h4>
            <div class="col-md-4 mb-3">
               <div class="card">
                  <div class="card-body p-5 h-100">
                     <!-- <img src="img/expenses.webp" alt=""> -->
                     <h3>Quick Disbursal</h3>
                     <p>Disbursed fund within 5 to 7 Days</p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 mb-3">
               <div class="card bg-transprant">
                  <div class="card-body p-5 h-100">
                     <!-- <img src="img/folders.webp" alt=""> -->
                     <h3>Easy Documents</h3>
                     <p>Less paperwork for a seamless disbursement process</p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 mb-3">
               <div class="card">
                  <div class="card-body p-5 h-100">
                     <!-- <img src="img/hand.webp" alt=""> -->
                     <h3>Customized Loan</h3>
                     <p>Wide variety of Mortgage loan and vehicle loan available</p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 mb-3">
               <div class="card">
                  <div class="card-body p-5 h-100">
                     <img src="img/interest-rate.webp" alt="">
                     <h3>Flexible rate of Interest</h3>
                     <p>We are offering best market rate as compare with market.</p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 mb-3">
               <div class="card">
                  <div class="card-body p-5 h-100">
                     <!-- <img src="img/user.webp" alt=""> -->
                     <h3>Check Loan Eligibility</h3>
                     <p>1. Net Monthly Income 2.Tenure(Years) 3.Interest Rate</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container-fluid px-5  my-5 vision-box d-none">
      <div class="row justify-content-center ">
         <div class="col-md-4 mb-4 mb-md-0">
            <div class="card h-100 ">
               <div class="card-body h-100">
                  <!-- <img src="img/mission-view.png" alt=""> -->
                  <h4>Our Mission
                  </h4>
                  <p>Our vision has always been to be the first choice for anyone seeking
                     capital in India. Our exclusive focus is to offer our clients a full spectrum of
                     Non-Banking services. Be a significant finance institution in improving the quality of lives of our
                     members.
                  </p>
               </div>
            </div>
         </div>
         <div class="col-md-4 ">
            <div class="card h-100">
               <div class="card-body  h-100">
                  <!-- <img src="img/view.png" alt=""> -->
                  <h4>Our Vision</h4>
                  <p>To work with vigour, dedication and innovation to achieve excellence
                     in service, quality, reliability, safety and customer care as the ultimate goal.
                     Our mission is to provide personal financial services of a superior quality,
                     chief concern being their financial well being.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid  mt-5 mb-5 py-5   ">
      <div class="container">
         <div class="Happy-Customers  ">
            <?php foreach ($customerReviews as $customerReview) { ?>
               <div>
                  <h3 class="heading mb-5 ms-md-5"> Happy Customers </h3>
                  <div class="row justify-content-center">
                     <div class="col-md-5 align-self-center">
                        <div class="img-box">
                           <div>
                              <img src=<?= $customerReview['customer_image'] ? $customerReview['customer_image'] : '"img/client2.png"' ?> alt="" class=" " >
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6   client-review-box ">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 130 78"
                              fill="none">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M52 0V52H26V78H0V0H52ZM130 0H78V78H104V52H130V0Z" fill="#2c2e53" />
                           </svg></span>
                        <p class="mb-0 mt-3  text-theme   name">
                           <?= $customerReview['customer_review'] ?>
                        </p>
                       
                        <div class="d-flex mb-3 flex-wrap justify-content-between">
                           <span class="fw-bold d-block text-theme  fs-5 mt-3 ">
                              <?= $customerReview['customer_name'] ?>
                           </span>
                        </div>
                        <span class="d-block text-end mt-4">
                           <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 130 78" fill="none"
                              style="transform: rotate(180deg);">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M52 0V52H26V78H0V0H52ZM130 0H78V78H104V52H130V0Z" fill="#2c2e53" />
                           </svg>
                        </span>
                     </div>

                  </div>
               </div>
            <?php } ?>
         </div>
      </div>
   </div>

   <div class="container py-5 mb-5 border-bottom">
      <h5 class="text-center heading">Our Partners</h5>
      <div class="row partner-box mt-5 pt-4 justify-content-center">
         <?php foreach ($bankPartners as $bankPartner) { ?>
            <div class="img-box img-direction">
               <img src="<?= $bankPartner['bank_image'] ?>" alt="" class="bank-partners">
            </div>
         <?php } ?>
      </div>
   </div>

   <!-- Loader -->
   <?php include 'footer.php';?>

   

   <!-- End of .container -->
</body>

</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script src="js/sweat-alert.js"></script>
<script src="js/chart.js"></script>
<script>
   let url
   function briefDescription(category) {
      $('#loader-id').addClass('d-block')
      if (category == 'loan-against-property') {
         url = 'loan-against-property.php'
      } else if (category == 'home-construction-loan') {
         url = 'home-construction-loan.php'
      } else if (category == 'commercial-vehicle-loan') {
         url = 'commercial-vehicle-loan.php'
      } else if (category == 'personal-loan') {
         url = 'personal-loan.php'
      } else if (category == 'business-loan') {
         url = 'business-loan.php'
      } else if (category == 'education-loan') {
         url = 'loan-against-property.php'
      }
      window.location.href = url;
   }

   function redirectToAboutPage() {
      url = 'About.php'
      window.location.href = url;
   }

   $('#caroasal-item-1').on('click', function () {
      console.log('dksnjd')
   })

   $(document).ready(function(){
    $('.header-slider').carousel();
    
    // Set different intervals for each slide
    $('.carousel-item:nth-child(1)').delay(10000).queue(function(next){
        $(this).addClass('active');
        next();
    });
    $('.carousel-item:nth-child(2)').delay(10000).queue(function(next){
        $(this).addClass('active');
        next();
    });
    $('.carousel-item:nth-child(3)').delay(10000).queue(function(next){
        $(this).addClass('active');
        next();
    });
    $('.carousel-item:nth-child(4)').delay(10000).queue(function(next){
        $(this).addClass('active');
        next();
    });
    $('.carousel-item:nth-child(5)').delay(10000).queue(function(next){
        $(this).addClass('active');
        next();
    });
    // Add more slides and adjust the delay for each as needed
});


   // jQuery('.slick-slider').on('click', '.slick-slide', function (e) {
   //    e.stopPropagation();
   //    // console.log(e)
   //    // window.location.href = 'apply-now.php?loanType=';
   // })
   // $('.slick-slider').on('click', function(event, slick, direction){
   //    console.log('edge was hit', event)
   // });

   emiCalculator()
   //    $(document).ready(function(){
   //     $('.slick-slider').slick();

   //     // Previous button click handler
   //     $('.prev-button').click(function(){
   //         $('.slick-slider').slick('slickPrev');
   //     });

   //     // Next button click handler
   //     $('.next-button').click(function(){
   //         $('.slick-slider').slick('slickNext');
   //     });
   // });

</script>