<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About - Tiffany Finance Private Limited</title>
  <link rel="shortcut icon" href="img/dark-logo-sm.png">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="style.css">

  <!-- <link rel="stylesheet" href="bootstrap/font-awesome-min.css"> -->
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css" />
  <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" />
  <!-- <link rel="stylesheet" type="text/css" href="custom-bootstrap/bootstrap.css" /> -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <script src="js/chart.js"></script>
</head>

<?php
// Include the database connection file
include ("db_connection.php");
// SQL query to select all products from the 'products' table
$teamMembersSql = "SELECT * FROM members";
$teamMembers = $conn->query($teamMembersSql);

$conn->close();
?>

<body>
  <?php include ('header.php') ?>
  <div class="container-fluid p-0 banner-header mt-0">
    <div class=" header-slider ">
      <img src="img/tifinay1.png" class="d-block w-100 loan-header " alt="...">

      <div class="top-left">
        <h2>Your <span class="tfpl">T</span>rusted <span class="tfpl">F</span>inancial <span
            class="tfpl">P</span>referred <span class="tfpl">L</span>ender</h2>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 me-0 pe-0 ">
        <div class="who-we-are-content  pb-0">
          <h4 class="mb-4 fw-bolder fs-2 text-dark mt-5 ps-5"><img src="img/TIF.jpg" width="30px" height="30px"
              class="me-2">Who We Are</h4>
          <div id="carouselExampleControls" class="carousel slide pe-0 pb-1" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <p class="text-dark p-5">Incorporated in 2017, Tiffany Finance is a fast-growing NBFC (Non-Banking
                  Finance
                  Company) based out of Bhilwara, Rajasthan with a niche leadership in retail financing.
                  We are a Non-Banking Financial Company – Non-Systemically Important Non-Deposit taking Company
                  (NBFC-ND), registered with Reserve Bank of India (“RBI”) under section 45- IA of the Reserve Bank of
                  India Act, 1934.

                  The company is managed by two dynamic entrepreneurs Mr. Virendra Prakash Ranka and Mr. Ronak Jain
                  with a
                  primary focus to reach and lend to the unorganized market. </p>

              </div>
              <div class="carousel-item">
                <p class="text-dark p-5 ">
                  Micro small and medium businesses (MSMEs) especially catering to semi-urban and rural areas.Our Core
                  Offerings include Loan Against Property, Home Construction Loan, Vehicle Loan, Personal Loan and
                  Business Loan.<br>
                  <br>
                  We are known for dedicated customer service and safe and fair business practices. Our services are
                  efficient and trusted by diverse range of customers. The process of applying for loans is fast and
                  easy
                  with a quick disbursement of funds within 5-7 days.
                </p>
              </div>
            </div>
            <!-- Custom Carousel Dots -->
            <div class="carousel-dots-who mb-2">
              <span class="dot-who active" onclick="goToSlide(0)"></span>
              <span class="dot-who" onclick="goToSlide(1)"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 ms-0 ps-0">
        <div class="who-we-are-content-image">
          <img src="img/who-we-are-image.jpg" alt="Who We Are Image">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="our-story-image">
          <img src="img/logo.jpeg" alt="our story">
        </div>
      </div>
      <div class="col-md-6 p-5">
        <h4 class="mb-4 fw-bolder fs-2 text-dark mt-3"><img src="img/TIF.jpg" width="30px" height="30px"
            class="me-1">Our Logo Story</h4>
        <p Class="text-dark pe-5 ourlogostory">Our logo features a sleek, upward-pointing arrow, poised to ascend
          towards the sky. The
          arrow represents the journey of growth and advancement that our customers embark upon with our support. Its
          sharp lines convey precision and determination, reflecting our commitment to helping our customers overcome
          obstacles and soar to new heights. As they navigate their path to success, we stand by them as a trusted
          partner, providing the support and resources they need to thrive.
          Our logo is more than just a visual representation; it is a symbol of our values, our
          mission, and our unwavering dedication to supporting our customers on their journey towards success.</p>
      </div>
    </div>
  </div>
  </div>
  <div class="container text-center" id="our-values">
    <h4 class="heading text-center  mt-5 mb-5 ">Our Values</h4>
    <div class="row">
      <div class="col-md-6  ">
        <p class="text-dark p-5 d-flex justify-content-center align-items-center mt-5 ">At Tiffany Finance, our core
          values are the guiding principles that underpin our
          commitment to excellence. Rooted in our vision to lead the financial industry through innovation and uphold
          unwavering integrity, our mission drives us to serve the underserved while aspiring to be India's most trusted
          financier. These values shape our identity and dictate every aspect of our operations, ensuring transparency,
          trust, and customer-centricity in all our endeavors.</p>
      </div>
      <div class="col-md-6">
        <img src="img/values.png" class="values">
      </div>
    </div>
  </div>
  <div class="container-fluid" id="vision-n-mission">
    <div class="container-fluid">
      <div class="row justify-content-center  mt-3 py-5">
        <h4 class="heading text-center mb-5">Our Vision & Mission</h4>
        <div class="col-md-12 col-lg-6 p-4 bg-theme vission-mission d-flex justify-content-center align-items-center">
          <!-- Changed col-md-5 to col-md-12 and added col-lg-6 -->
          <img src="img/values/vission.jpg" class="vision-img  ">

        </div>
        <div class="col-md-12 col-lg-6 p-5 vission-content "> <!-- Changed col-md-5 to col-md-12 and added col-lg-6 -->
          <h4 class="mb-4 fw-bolder fs-2 text-dark mt-5"><img src="img/headpoint.png" width="30px" height="30px"
              class="me-2">Vision</h4>
          <p class="d-flex justify-content-center align-items-center ps-2 pe-5 text-dark ourlogostory">We strive to lead the
            way in financial innovation. Our commitment to adopting new technologies and modern approaches allows us to
            better serve our customers. Upholding the highest standards of ethics and integrity is fundamental to our
            operations. We ensure that all financial dealings are conducted with utmost transparency. Our goal is to
            build and maintain trust with our customers, regulators, and stakeholders. By focusing on innovation, we aim
            to enhance the customer experience continually. Ethical conduct is at the core of everything we do. We are
            dedicated to maintaining transparency in all transactions. Trust and reliability are the cornerstones of our
            relationships. Our vision is to be recognized as the most trusted and innovative financial institution in
            the industry.</p>
        </div>
        <div class="col-md-12 col-lg-6 p-5 vission-content "> <!-- Changed col-md-5 to col-md-12 and added col-lg-6 -->
          <h4 class="mb-4 fw-bolder fs-2 text-dark mt-5"><img src="img/headpoint.png" width="30px" height="30px"
              class="me-2">Mission</h4>
          <p class="d-flex justify-content-center align-items-center pe-5  text-dark ourlogostory">Our mission at Tiffany
            Finance Pvt. Ltd. is to provide essential financial services to underserved markets, striving for
            inclusivity and empowerment. We aspire to become India's most trusted financier, serving a vast customer
            base with integrity and reliability. Through transparency, empathy, and professionalism, we aim to earn the
            trust of every client we serve. Our commitment to ethical conduct and customer satisfaction guides our
            actions at every step. By understanding and addressing the unique needs of our customers, we endeavor to
            make a meaningful impact on their financial well-being. Tiffany Finance Pvt. Ltd. is dedicated to fostering
            economic growth and prosperity, building lasting relationships grounded in trust and integrity.</p>
        </div>
        <div class="col-md-12 col-lg-6 p-3 bg-theme vission-mission d-flex justify-content-center align-items-center">
          <!-- Changed col-md-5 to col-md-12 and added col-lg-6 -->
          <img src="img/values/mission.jpg" class="mission-img ps-5 mt-4 ">

        </div>

      </div>
    </div>
  </div>



  <div class="container" id='our-team'>
    <div class="row mt-5 meet-team-box justify-content-between">
      <h4 class="heading text-center mb-5 ">Meet The Team</h4>
      <?php foreach ($teamMembers as $teamMember) { ?>
        <div class="col-md-3 p-3 img-team-box">
          <div class="team-img"
            onclick="viewDetail('<?= $teamMember['first_name'] . ($teamMember['middle_name'] ? " " . $teamMember['middle_name'] : '') . ($teamMember['last_name'] ? " " . $teamMember['last_name'] : '') ?>', '<?= $teamMember['designation'] ?>', '<?= $teamMember['member_image'] ? $teamMember['member_image'] : 'img/client3.png' ?>', '<?= $teamMember['description'] ?>')">
            <img src="<?= $teamMember['member_image'] ? $teamMember['member_image'] : 'img/client3.png' ?>" alt="">
            <div class="mt-3">
              <h6>
                <?= $teamMember['first_name'] . ($teamMember['middle_name'] ? " " . $teamMember['middle_name'] : '') . ($teamMember['last_name'] ? " " . $teamMember['last_name'] : '') ?>
              </h6>
              <label class="team-position fw-bold"><?= $teamMember['designation'] ?></label>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- Modal -->
      <div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="userDetailModalLabel">
                <div class="d-flex align-items-center">
                  <h6 class="mb-0 fs-6" id='member-name'>Mr. Virendra Prakash Ranka</h6>
                  <label class="ms-3 mb-0 border-start ps-3 fs-6" id='member-designation'>Managing Director</label>
                </div>
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="team-img" data-bs-toggle="modal" data-bs-target="#userDetailModal">
                    <img src="img/client3.png" id='member-image' alt="" class="w-100">
                  </div>
                </div>
                <div class="col-md-9">
                  <p id='member-description'></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Remove the container if you want to extend the Footer to full width. -->
  <?php include ('footer.php') ?>
</body>

</html>
<script type="text/javascript" src="custom-bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script>
  function viewDetail(name, designation, image, description) {
    document.getElementById('member-name').innerText = name;
    document.getElementById('member-designation').innerText = designation;
    document.getElementById('member-image').src = image;
    document.getElementById('member-description').innerText = description;
    var myModal = new bootstrap.Modal(document.getElementById('userDetailModal'));
    myModal.show();
  }

  $(document).ready(function () {
    emiCalculator()
    var hashValue = window.location.hash;
    var valueAfterHash = hashValue.substring(1);
    if (valueAfterHash) {
      var targetDiv = document.getElementById(valueAfterHash);
      if (targetDiv) {
        var offset = window.innerWidth < 768 ? 20 : 200;
        window.scrollTo({
          top: targetDiv.offsetTop - offset,
          behavior: 'smooth'
        });
      }
    }


  });

  function goToSlide(slideIndex) {
    // Get the carousel instance
    var carousel = document.getElementById('carouselExampleControls');
    var carouselInstance = bootstrap.Carousel.getInstance(carousel);

    // Set the active slide based on the slide index
    carouselInstance.to(slideIndex);
  }

</script>